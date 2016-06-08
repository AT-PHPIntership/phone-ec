<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Backend\Permission;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the Permissions.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data'] = Permission::all();
        return view('backend.permissions.index')->with($data);
    }

    /**
     * Show the form for creating a new Permissions.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules['modules'] = $this->getModule();
        return view('backend.permissions.create')->with($modules);
    }

    /**
     * Store a newly created Permissions in storage.
     *
     * @param \Illuminate\Http\Request $request request create
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // check permission is exists?
        if (!$this->checkPermissionExisted($request)) {
            
            // set permission and create Permission
            $arrRole = $this->getRequestPermission($request);
            $newRole = new Permission($arrRole);
            $newRole->module = $request->module;

            if ($newRole->save()) {
                $request->session()->flash('message', trans('messages.add_role_ok'));
            } else {
                $request->session()->flash('message', trans('messages.add_role_not_ok'));
            }
        } else {
            $request->session()->flash('message', trans('messages.role_exists'));
        }
        return redirect()->route('admin.permissions.index');
    }

    /**
     * Show the form for editing the specified Permissions.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['modules']    = $this->getModule() ;
        $data['permission'] = Permission::findOrFail($id);

        return view('backend.permissions.edit')->with($data);
    }

    /**
     * Update the specified Permissions in storage.
     *
     * @param \Illuminate\Http\Request $request request
     * @param int                      $id      id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$this->checkPermissionExisted($request)) {
            // get permission with id
            $role = Permission::findOrFail($id);
            $role->module = $request->module;

            // set permission
            $arrRole = $this->getRequestPermission($request);
                       
            // check save successfull?
            if ($role->update($arrRole)) {
                $request->session()->flash('message', trans('messages.edit_role_ok'));
            } else {
                $request->session()->flash('message', trans('messages.edit_role_not_ok'));
            }
        } else {
            $request->session()->flash('message', trans('messages.role_exists'));
        }
        return redirect()->route('admin.permissions.index');
    }

    /**
     * Remove the specified Permissions from storage.
     *
     * @param int                      $id      id
     * @param \Illuminate\Http\Request $request request for delete
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $permission = Permission::findOrFail($id);

        // check delete permission ok?
        if ($permission->delete()) {
            $request->session()->flash('message', trans('messages.delete_role_ok'));
        } else {
            $request->session()->flash('message', trans('messages.delete_role_not_ok'));
        }

        return redirect()->route('admin.permissions.index');
    }

    /**
     * Auto get list Module.
     *
     * @return \Illuminate\Http\Response
     */
    private function getModule()
    {
        $modules = [];
        $pathController = config('app.path_controllers');
        $filesInFolder = \File::files($pathController);

        foreach ($filesInFolder as $path) {
            // get name of controller
            $controller = pathinfo($path)['filename'];
            // remove string Controller in controller name
            $module     = str_replace('Controller', '', $controller);
            $modules[]  = $module;
        }
        // remove module except without array
        $modules = array_diff($modules, config('app.except_module'));
        return $modules;
    }

    /**
     * Check permission is exists.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    private function checkPermissionExisted($request)
    {
        // set condition where
        $arrRole = $this->getRequestPermission($request);
        $check  = Permission::where('module', $request->module)
            ->where('see', $arrRole['see'])
            ->where('insert', $arrRole['insert'])
            ->where('edit', $arrRole['edit'])
            ->where('destroy', $arrRole['destroy'])
           ->first();
        return !is_null($check) ;
    }

    /**
     * Set permission.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    private function getRequestPermission($request)
    {
        // set permission
        $permissions   = config('app.arr_permissions');

        $arrRole = array();

        foreach ($permissions as $per) {
            $arrRole[$per] = $request->has($per);
        }
        return $arrRole;
    }
}
