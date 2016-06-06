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
            // create new permission
            $newRole = new Permission;
            $newRole->module = $request->module;
            
            // set permission
            $arrRole = $this->setPermission($request);
            $newRole->see     = $arrRole['see'];
            $newRole->inset   = $arrRole['inset'];
            $newRole->edit    = $arrRole['edit'];
            $newRole->destroy = $arrRole['destroy'];

            // check save successfull?
            if ($newRole->save()) {
                $request->session()->flash('message', trans('labels.MessageAddRoleOk'));
            } else {
                $request->session()->flash('message', trans('labels.MessageAddRoleNotOk'));
            }
        } else {
            $request->session()->flash('message', trans('labels.MessageRoleExists'));
        }
        return redirect()->route('admin.permissions.index');
    }

    /**
     * Show the form for editing the specified Permissions.
     *
     * @param int                      $id      id
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $data['modules']    = $this->getModule();
        $data['permission'] = Permission::find($id);

        // check permission is exists
        if (empty($data['permission'])) {
            $request->session()->flash('message', trans('labels.LabelError'));
            return redirect('admin/permissions');
        }

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
            $role = Permission::find($id);

            // check role is exists?
            if (empty($role)) {
                $request->session()->flash('message', trans('labels.LabelError'));
                return redirect('admin/permissions');
            }
            
            $role->module = $request->module;

            // set permission
            $arrRole = $this->setPermission($request);
            $role->see     = $arrRole['see'];
            $role->inset   = $arrRole['inset'];
            $role->edit    = $arrRole['edit'];
            $role->destroy = $arrRole['destroy'];
            
            // check save successfull?
            if ($role->save()) {
                $request->session()->flash('message', trans('labels.MessageEditRoleOk'));
            } else {
                $request->session()->flash('message', trans('labels.MessageEditRoleNotOk'));
            }
        } else {
            $request->session()->flash('message', trans('labels.MessageRoleExists'));
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
        $permission = Permission::find($id);

        // check permission is exists?
        if (empty($permission)) {
            $request->session()->flash('message', trans('labels.LabelError'));
            return redirect('admin/permissions');
        }

        // check delete permission ok?
        if ($permission->delete()) {
            $request->session()->flash('message', trans('labels.MessageDelRoleOk'));
        } else {
            $request->session()->flash('message', trans('labels.MessageDelRoleNotOk'));
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
        $routes = \Route::getRoutes()->getRoutes();

        foreach ($routes as $route) {

            // get list all routes
            $action     = $route->getAction();
            $controller = config('app.get_controller');
            
            // get route have string 'controller'
            if (array_key_exists($controller, $action)) {
                
                // only get controller in folder Backend
                $backend = config('app.get_controller_backend');

                if (strpos($action['controller'], $backend) !== false) {
                    
                    // only get controller with action index
                    $index = config('app.get_action_index');
                    
                    if (strpos($action['controller'], $index) !== false) {
                        
                        // get route => App\Http\Controllers\Backend\BrandsController@index
                        $route = $action['controller'];
                        
                        // get position start name Controller
                        $positionStart = strrpos($route, config('app.get_controller_action')) + 1;

                        // get position end name Controller
                        $positionEnd   = strpos($route, config('app.get_length_controller')) + 1;

                        // get length of name Controller
                        $lengthController = $positionEnd - $positionStart;

                        // get controller => BrandsController
                        $controller = substr($route, $positionStart, $lengthController);

                        // length of module form first name Controller to position start string 'Controller'
                        $lengthModule = strpos($controller, config('app.get_module'));

                        // get modules in string controller (remove 'Controller') and set value for array modules
                        $modules[] = substr($controller, 0, $lengthModule);
                    }
                }
            }
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
        $arrRole = $this->setPermission($request);

        $see  = $arrRole['see'];
        $add  = $arrRole['inset'];
        $edit = $arrRole['edit'];
        $del  = $arrRole['destroy'];

        $where = "module = '$request->module' and see = $see and inset = $add and edit = $edit and destroy = $del";
        
        // check permission is exists?
        $check = Permission::whereRaw($where)->get();
        
        return (count($check)) ? true : false;
    }

    /**
     * Set permission.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    private function setPermission($request)
    {
        // create array
        $arrRole = array();

        // set permission
        $noPermission  = config('app.no_permission');
        $hasPermission = config('app.has_permission');

        switch ($request->see) {
            case $hasPermission:
                $arrRole['see'] = $request->see;
                break;
            default:
                $arrRole['see'] = $noPermission;
                break;
        }

        switch ($request->create) {
            case $hasPermission:
                $arrRole['inset'] = $request->create;
                break;
            default:
                $arrRole['inset'] = $noPermission;
                break;
        }

        switch ($request->update) {
            case $hasPermission:
                $arrRole['edit'] = $request->update;
                break;
            default:
                $arrRole['edit'] = $noPermission;
                break;
        }

        switch ($request->delete) {
            case $hasPermission:
                $arrRole['destroy'] = $request->delete;
                break;
            default:
                $arrRole['destroy'] = $noPermission;
                break;
        }
        
        return $arrRole;
    }
}
