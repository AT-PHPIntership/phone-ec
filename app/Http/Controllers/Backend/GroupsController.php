<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Backend\GroupsRequest;
use App\Http\Controllers\Controller;

use App\Models\Backend\Group;
use App\Models\Backend\Permission;
use App\Models\Backend\GroupPermission;
use DB;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data  = $this->getGroupPermission();
        $group = Group::all();
        return view('backend.group_roles.index', compact('data', 'group'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('backend.group_roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request request group
     *
     * @return \Illuminate\Http\Response
     */
    public function store(GroupsRequest $request)
    {
        $group = new Group;
        $group->name = $request->name;
        // check save new group name.
        if ($group->save()) {

            foreach (array_values($request->all()) as $value) {

                // get permission id which user choice.
                if (is_numeric($value)) {

                    // create new group permission.
                    $groupPermission = new GroupPermission;
                    $groupPermission->permission_id = $value;
                    $groupPermission->group_id      = $group->id;

                    // check save new group permission.
                    if (!$groupPermission->save()) {
                        $request->session()->flash('message', 'Wrong count\'t created group role, please try againt!');
                        // if save error then delete group new create.
                        $group->delete();
                        break;
                    }
                }
            }
            $request->session()->flash('message', 'Group role was created successfully!');

        } else {
            $request->session()->flash('message', 'Wrong count\'t created group role, please try againt!');
        }

        return redirect()->route('admin.groups.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id id group
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get data table group permission with id group.
        $data  = $this->getGroupPermission($id);
        // get all permission.
        $permissions = Permission::all();

        return view('backend.group_roles.edit', compact('data', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request update
     * @param int                      $id      id group
     *
     * @return \Illuminate\Http\Response
     */
    public function update(GroupsRequest $request, $id)
    {
        // delete group permission if user choice none.
        if (!$this->deleteGroupPermission($request, $id)) {
            // show message if delete unsuccessfull.
            $request->session()->flash('message', 'Wrong count\'t edit group role, please try againt!');
            return redirect()->route('admin.groups.index');
        }

        // update group permission if user choice differrent permission
        if (!$this->editGroupPermission($request, $id)) {
            // show message if edit unsuccessfull.
            $request->session()->flash('message', 'Wrong count\'t edit group role, please try againt!');
            return redirect()->route('admin.groups.index');
        }

        // create group permission if user choice new permission
        if (!$this->addGroupPermission($request, $id)) {
            // show message if add unsuccessfull.
            $request->session()->flash('message', 'Wrong count\'t edit group role, please try againt!');
            return redirect()->route('admin.groups.index');
        }

        // update name group if user change name
        $group = Group::findOrFail($id);
        $group->name = $request->name;
        
        if ($group->save()) {
            // show message and redirect to index if edit successfully
            $request->session()->flash('message', 'Group was edit successfully!');
        } else {
            $request->session()->flash('message', 'Wrong count\'t edit group role, please try againt!');
        }
        
        return redirect()->route('admin.groups.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int                      $id      id group
     * @param \Illuminate\Http\Request $request request for show message
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $group = Group::findOrFail($id);

        if ($group->delete()) {
            $request->session()->flash('message', 'Group was delete successfully!');
        } else {
            $request->session()->flash('message', 'Wrong count\'t delete Group, please try againt!');
        }

        return redirect()->route('admin.groups.index');
    }

    /**
     * Remove data in table group permission, when edit goup role.
     *
     * @param \Illuminate\Http\Request $request request for delete
     * @param int                      $id      id group
     *
     * @return \Illuminate\Http\Response
     */
    private function deleteGroupPermission($request, $id)
    {
        // get group permission with id
        $data = $this->getGroupPermission($id);
        
        foreach ($data as $value) {

            // check key of array request match module in array data?
            if (!array_key_exists($value->module, $request->all())) {
                $where = "permission_id = $value->permissionid and group_id = $id";
                $groupPermission = GroupPermission::whereRaw($where)->first();

                // check delete successfull?
                if (!$groupPermission->delete()) {
                    return false;
                }
            }
        }
        return true;
    }

    /**
     * Edit data in table group permission, when edit goup role.
     *
     * @param \Illuminate\Http\Request $request request for edit
     * @param int                      $id      id group
     *
     * @return \Illuminate\Http\Response
     */
    private function editGroupPermission($request, $id)
    {

        // get group permission with id
        $data = $this->getGroupPermission($id);

        foreach ($data as $value) {

            // check key of array request match module in array data?
            if (array_key_exists($value->module, $request->all())) {

                // check permission id in request equal permission id in data
                if ($request->all()[$value->module] != $value->permissionid) {
                    // if not equal => edit group permission
                    $where = "permission_id = $value->permissionid and group_id = $id";
                    $groupPermission = GroupPermission::whereRaw($where)->first();
                    $groupPermission->permission_id = $request->all()[$value->module];

                    // check edit successfull?
                    if (!$groupPermission->save()) {
                        return false;
                    }
                }
            }
        }
        return true;
    }

    /**
     * Add data in table group permission, when edit goup role.
     *
     * @param \Illuminate\Http\Request $request request for add
     * @param int                      $id      id group
     *
     * @return \Illuminate\Http\Response
     */
    private function addGroupPermission($request, $id)
    {
        // get group permission with id
        $data = $this->getGroupPermission($id);

        // get array module in data
        $moduleData = array();
        foreach ($data as $value) {
            $moduleData[] = $value->module;
        }

        // get array module in request
        $moduleRequest = array_keys($request->all());

        // get array module not exists in data
        $moduleNotData = array_diff($moduleRequest, $moduleData);
        
        // get list modules
        $modules = Permission::select('module')->groupBy('module')->get()->toArray();

        // add group permission
        foreach ($modules as $value) {
            if (in_array($value['module'], $moduleNotData)) {
                // check value of module in request is empty
                if (!empty($request[$value['module']])) {
                    // if not empty, create new permission for group
                    $groupPermission = new GroupPermission;
                    $groupPermission->permission_id = $request[$value['module']];
                    $groupPermission->group_id      = $id;

                    // check add successfull?
                    if (!$groupPermission->save()) {
                        return false;
                    }
                }
            }
        }
        return true;
    }

    /**
     * Get GroupPermission data.
     *
     * @param int $id id group
     *
     * @return \Illuminate\Http\Response
     */
    private function getGroupPermission($id = null)
    {
        // set condition for where, if where = 1 => get all()
        $where = "1";
        if (!is_null($id)) {
            $where = "groups.id = {$id}";
        }

        // set select
        $select = 'groups.id as groupid, name, permissions.id as permissionid,module, see, addNew, edit, destroy';
        
        // get data with condition where
        return DB::table('group_permissions')
                ->selectRaw($select)
                ->join('groups', 'group_permissions.group_id', '=', 'groups.id')
                ->join('permissions', 'group_permissions.permission_id', '=', 'permissions.id')
                ->whereRaw($where)
                ->get();
    }
}
