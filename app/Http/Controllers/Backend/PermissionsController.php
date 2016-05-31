<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Backend\Permission;
use Route;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Permission::all();
        return view('backend.permissions.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules = $this->getModule();
        return view('backend.permissions.create', compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request request create
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        // check permission is exists?
        if (!$this->checkExists($request)) {

            $permission = new Permission;

            $permission->module = $request->module;

            if ($request->see) {
                $permission->see = $request->see;
            } else {
                $permission->see = 0;
            }

            if ($request->create) {
                $permission->addNew = $request->create;
            } else {
                $permission->addNew = 0;
            }

            if ($request->update) {
                $permission->edit = $request->update;
            } else {
                $permission->edit = 0;
            }

            if ($request->delete) {
                $permission->destroy = $request->delete;
            } else {
                $permission->destroy = 0;
            }
            
            if ($permission->save()) {
                $request->session()->flash('message', 'Permission was created successfully!');
            } else {
                $request->session()->flash('message', 'Wrong count\'t created Permission, please try againt!');
            }
        } else {
            $request->session()->flash('message', 'Permission was exists, please try againt!');
        }
        return redirect()->route('admin.permissions.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modules = $this->getModule();
        $permission = Permission::findOrFail($id);

        return view('backend.permissions.edit', compact('modules', 'permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     * @param int                      $id      id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$this->checkExists($request)) {

            $permission = Permission::findOrFail($id);

            $permission->module = $request->module;

            if ($request->see) {
                $permission->see = $request->see;
            } else {
                $permission->see = 0;
            }

            if ($request->create) {
                $permission->addNew = $request->create;
            } else {
                $permission->addNew = 0;
            }

            if ($request->update) {
                $permission->edit = $request->update;
            } else {
                $permission->edit = 0;
            }

            if ($request->delete) {
                $permission->destroy = $request->delete;
            } else {
                $permission->destroy = 0;
            }
            
            if ($permission->save()) {
                $request->session()->flash('message', 'Permission was Edit successfully!');
            } else {
                $request->session()->flash('message', 'Wrong count\'t Edit Permission, please try againt!');
            }
        } else {
            $request->session()->flash('message', 'Permission was exists, please try againt!');
        }
        return redirect()->route('admin.permissions.index');
    }

    /**
     * Remove the specified resource from storage.
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
            $request->session()->flash('message', 'Permission was delete successfully!');
        } else {
            $request->session()->flash('message', 'Wrong count\'t delete Permission, please try againt!');
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

        foreach (Route::getRoutes()->getRoutes() as $route) {

            // get list all routes
            $action = $route->getAction();

            // get route have string 'controller'
            if (array_key_exists('controller', $action)) {

                // only get controller in folder Backend
                if (strpos($action['controller'], 'Backend') != false) {
                    // get module
                    $arrContro = explode('\\', explode('@', $action['controller'])[0]);
                    $modules[] = substr(end($arrContro), 0, strpos(end($arrContro), "Controller"));
                }
            }
        }
        // array have value is only
        $modules = array_unique($modules);
        $modules = array_diff($modules, array('Auth', 'Dashboard'));
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
        $see    = "and see = 0";
        $create = "and addNew = 0";
        $update = "and edit = 0";
        $delete = "and destroy = 0";

        if ($request->has('see')) {
            $see = "and see = 1";
        }

        if ($request->has('create')) {
            $create = "and addNew = 1";
        }

        if ($request->has('update')) {
            $update = "and edit = 1";
        }

        if ($request->has('delete')) {
            $delete = "and destroy = 1";
        }
        
        // check permission is exists?
        $check = Permission::whereRaw("module = '{$request->module}' {$see} {$create} {$update} {$delete}")->get();

        return (count($check)) ? true : false;
    }
}
