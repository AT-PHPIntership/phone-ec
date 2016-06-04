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
        $data = Permission::all();
        return view('backend.permissions.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new Permissions.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules = $this->getModule();
        return view('backend.permissions.create')->with('modules', $modules);
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
        if (!$this->checkExists($request)) {
            // create new permission
            $newRole = new Permission;
            $newRole->module = $request->module;
            
            // set permission
            $arrRole = $this->setPermission($request);
            $newRole->see     = $arrRole['see'];
            $newRole->addNew  = $arrRole['addNew'];
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
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modules = $this->getModule();
        $permission = Permission::findOrFail($id);
        return view('backend.permissions.edit')->with(['modules' => $modules, 'permission' => $permission]);
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
        if (!$this->checkExists($request)) {
            // get permission with id
            $role = Permission::findOrFail($id);
            $role->module = $request->module;

            // set permission
            $arrRole = $this->setPermission($request);
            $role->see     = $arrRole['see'];
            $role->addNew  = $arrRole['addNew'];
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
        $permission = Permission::findOrFail($id);

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

        foreach (\Route::getRoutes()->getRoutes() as $route) {

            // get list all routes
            $action = $route->getAction();
            
            // get route have string 'controller'
            if (array_key_exists(\Config::get('app.get_controller'), $action)) {
                
                // only get controller with action index
                if (strpos($action['controller'], \Config::get('app.get_controller_backend')) !== false) {
                    
                    // only get controller in folder Backend
                    if (strpos($action['controller'], \Config::get('app.get_action_index')) !== false) {
                        
                        // get route => App\Http\Controllers\Backend\BrandsController@index
                        $route = $action['controller'];
                        
                        // get position start name Controller
                        $positionStart = strrpos($route, \Config::get('app.get_controller_action')) + 1;

                        // get position end name Controller
                        $positionEnd   = strpos($route, \Config::get('app.get_length_controller')) + 1;

                        // get length of name Controller
                        $lengthController = $positionEnd - $positionStart;

                        // get controller => BrandsController
                        $controller = substr($route, $positionStart, $lengthController);

                        // length of module form first name Controller to position start string 'Controller'
                        $lengthModule = strpos($controller, \Config::get('app.get_module'));

                        // get modules in string controller (remove 'Controller') and set value for array modules
                        $modules[] = substr($controller, 0, $lengthModule);
                    }
                }
            }
        }
        // remove module except without array
        $modules = array_diff($modules, \Config::get('app.except_module'));
        
        return $modules;
    }

    /**
     * Check permission is exists.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    private function checkExists($request)
    {
        // set condition where
        $arrRole = $this->setPermission($request);

        $see  = $arrRole['see'];
        $add  = $arrRole['addNew'];
        $edit = $arrRole['edit'];
        $del  = $arrRole['destroy'];

        $where = "module = '$request->module' and see = $see and addNew = $add and edit = $edit and destroy = $del";
        
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
        $noPermission = \Config::get('app.no_permission');

        if ($request->has('see')) {
            $arrRole['see'] = $request->see;
        } else {
            $arrRole['see'] = $noPermission;
        }

        if ($request->has('create')) {
            $arrRole['addNew'] = $request->create;
        } else {
            $arrRole['addNew'] = $noPermission;
        }

        if ($request->has('update')) {
            $arrRole['edit'] = $request->update;
        } else {
            $arrRole['edit'] = $noPermission;
        }

        if ($request->has('delete')) {
            $arrRole['destroy'] = $request->delete;
        } else {
            $arrRole['destroy'] = $noPermission;
        }
        
        return $arrRole;
    }
}
