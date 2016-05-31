<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests\Backend\AdminRequest;
use App\Http\Controllers\Controller;
use App\Models\Backend\Admin;
use App\Models\Backend\AdminGroup;
use App\Models\Backend\Group;
use DB;

class AccountsController extends Controller
{
    /**
     * Display a listing of the admin users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all infor of admins
        $adminUsers  = Admin::select('admin.id', 'admin.name', 'email', 'active')->get();
        
        // get all admin groups
        $adminGroups = DB::table('admin')
                ->select('admin.id', 'groups.name as group')
                ->join('admin_groups', 'admin.id', '=', 'admin_id')
                ->join('groups', 'groups.id', '=', 'group_id')
                ->get();

        return view('backend.admin_users.index', compact('adminUsers', 'adminGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // get goup permission
        $groupPermission = DB::table('group_permissions')
                        ->selectRaw('name, module, see, addNew, edit, destroy')
                        ->join('groups', 'groups.id', '=', 'group_permissions.group_id')
                        ->join('permissions', 'permissions.id', '=', 'group_permissions.permission_id')
                        ->get();

        // get name, id of all group
        $group = Group::select('name', 'id')->get()->toArray();

        return view('backend.admin_users.create', compact('groupPermission', 'group'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request request create
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
        // create new admin
        $adminUser = new Admin;

        // set infor for new admin
        $adminUser->name     = trim($request->name);
        $adminUser->email    = trim($request->email);
        $adminUser->password = bcrypt($request->password);
        $adminUser->address  = trim($request->address);
        $adminUser->phone    = $request->phone;
        $adminUser->active   = $request->active;

        // check save admin new?
        if (!$adminUser->save()) {
            $request->session()->flash('message', 'Wrong count\'t created admin user, please try againt!');
        } else {
            // get name all group
            $group = Group::select('name')->get()->toArray();

            foreach ($group as $value) {

                // convert name of group from 'first last' to 'first_last'
                // because format name group in request is 'first_last'
                $nameGroups = str_replace(' ', '_', $value['name']);

                // check name group of array group match name group of request (name group of request into keys)
                if (array_key_exists($nameGroups, $request->all())) {
                    // create new admin group
                    $adminGroup = new AdminGroup;

                    // set infor admin group new
                    $adminGroup->admin_id = $adminUser->id;
                    $adminGroup->group_id = $request->all()[$nameGroups];
                    
                    // check save admin group new?
                    if ($adminGroup->save()) {
                        $request->session()->flash('message', 'Admin user was created successfully!');
                    } else {
                        // if save is fail then break loop, delete admin new before, and send message error
                        $adminUser->delete();
                        $request->session()->flash('message', 'Wrong count\'t created admin user, please try againt!');
                        break;
                    }
                }
            }
        }
        return redirect()->route('admin.accounts.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id request update
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get admin with id
        $adminUser = Admin::findOrFail($id);

        // get name group of admin with id (1 admin can have many group)
        $adminGroups = DB::table('admin')
                ->select('groups.name as group')
                ->join('admin_groups', 'admin.id', '=', 'admin_id')
                ->join('groups', 'groups.id', '=', 'group_id')
                ->where('admin.id', $id)
                ->get();

        // get permission
        $groupPermission = DB::table('group_permissions')
                        ->selectRaw('groups.id, name, module, see, addNew, edit, destroy')
                        ->join('groups', 'groups.id', '=', 'group_permissions.group_id')
                        ->join('permissions', 'permissions.id', '=', 'group_permissions.permission_id')
                        ->get();

        // get name all group
        $group = Group::select('name', 'id')->get()->toArray();

        return view('backend.admin_users.edit', compact('adminUser', 'group', 'groupPermission', 'adminGroups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request update
     * @param int                      $id      id admin users
     *
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRequest $request, $id)
    {
        // delete group permission if user choice none.
        if (!$this->deleteAdminGroup($request, $id)) {
            // show message if delete unsuccessfull.
            $request->session()->flash('message', 'Wrong count\'t edit admin, please try againt!');
            return redirect()->route('admin.accounts.index');
        }

        // create admin group if user choice new group
        if (!$this->addAdminGroup($request, $id)) {
            // show message if add unsuccessfull.
            $request->session()->flash('message', 'Wrong count\'t edit admin, please try againt!');
            return redirect()->route('admin.accounts.index');
        }

        $adminUser = Admin::findOrFail($id);

        $adminUser->name     = trim($request->name);
        $adminUser->email    = trim($request->email);
        $adminUser->address  = trim($request->address);
        $adminUser->phone    = $request->phone;
        $adminUser->active   = $request->active;

        if ($request->has('password')) {
            $adminUser->password = bcrypt($request->password);
        }

        if (!$adminUser->save()) {
            $request->session()->flash('message', 'Wrong count\'t edit admin user, please try againt!');
        } else {
            $request->session()->flash('message', 'Admin user was created successfully!');
        }
        return redirect()->route('admin.accounts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int                      $id      id user
     * @param \Illuminate\Http\Request $request request for delete
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        if (Admin::find($id)->delete()) {
            $request->session()->flash('message', 'Admin user was delete successfully!');
        } else {
            $request->session()->flash('message', 'Wrong count\'t delete admin user, please try againt!');
        }
        return redirect()->route('admin.accounts.index');
    }

    /**
     * Remove data in table admin group, when edit admin.
     *
     * @param \Illuminate\Http\Request $request request for delete
     * @param int                      $id      id admin
     *
     * @return \Illuminate\Http\Response
     */
    private function deleteAdminGroup($request, $id)
    {
        // get group permission with id
        $data = $this->getAdminGroup($id);
        foreach ($data as $value) {

            // convert name of group from 'first last' to 'first_last'
            // because format name group in request is 'first_last'
            $nameGroups = str_replace(' ', '_', $value->name);
            // check key of array request match group in array data?
            if (!array_key_exists($nameGroups, $request->all())) {
                $where = "group_id = $value->groupid and admin_id = $id";
                $adminGroup = AdminGroup::whereRaw($where)->first();

                // check delete successfull?
                if (!$adminGroup->delete()) {
                    return false;
                }
            }
        }
        return true;
    }

    /**
     * Add data in table admin group, when edit admin.
     *
     * @param \Illuminate\Http\Request $request request for add
     * @param int                      $id      id admin
     *
     * @return \Illuminate\Http\Response
     */
    private function addAdminGroup($request, $id)
    {
        // get admin group with id
        $data = $this->getAdminGroup($id);

        // get array name group in data
        $nameGroupData = array();
        foreach ($data as $value) {
            $nameGroupData[] = str_replace(' ', '_', $value->name);
        }

        // get array name group in request
        $nameGroupRequest = array_keys($request->all());

        // get array name group not exists in data
        $nameGroupNotData = array_diff($nameGroupRequest, $nameGroupData);
        
        $groups = Group::all()->toArray();

        foreach ($groups as $value) {
            $value['name'] = str_replace(' ', '_', $value['name']);
            if (in_array($value['name'], $nameGroupNotData)) {
                $adminGroup = new AdminGroup;
                $adminGroup->group_id = $value['id'];
                $adminGroup->admin_id = $id;

                // check add successfull?
                if (!$adminGroup->save()) {
                    return false;
                }
            }
        }
        return true;
    }

    /**
     * Get AdminGroup data.
     *
     * @param int $id id admin
     *
     * @return \Illuminate\Http\Response
     */
    private function getAdminGroup($id = null)
    {
        // set condition for where, if where = 1 => get all()
        $where = "1";
        if (!is_null($id)) {
            $where = "admin.id = {$id}";
        }

        // get data with condition where
        return DB::table('admin_groups')
                ->selectRaw('groups.id as groupid, groups.name, admin.id as adminid')
                ->join('groups', 'group_id', '=', 'groups.id')
                ->join('admin', 'admin_id', '=', 'admin.id')
                ->whereRaw($where)
                ->get();
    }
}
