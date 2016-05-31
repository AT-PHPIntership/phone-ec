<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use DB;

class Authorization
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request request
     * @param \Closure                 $next    next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // get module and action in uri current
        $arrayUri = explode('.', \Request::route()->getName());

        if ($this->check($arrayUri)) {
            return $next($request);
        }

        // get permission of user login
        $data = $this->getData();//dd($data);
        $module = ucfirst($arrayUri[1]);
        $action = $arrayUri[2];

        // check permission
        if ($this->checkPermission($data, $module, $action)) {
            return $next($request);
        }

        // redirect back if user not have permission
        $request->session()->flash('message', 'You don\'t have permission!');
        return redirect()->back();
    }

    /**
     * Get permission of user login.
     *
     * @return data data
     */
    protected function getData()
    {
        return DB::table('admin')->select('module', 'see', 'addNew', 'edit', 'destroy')
                ->join('admin_groups', 'admin.id', '=', 'admin_id')
                ->join('groups', 'groups.id', '=', 'admin_groups.group_id')
                ->join('group_permissions', 'groups.id', '=', 'group_permissions.group_id')
                ->join('permissions', 'permissions.id', '=', 'permission_id')
                ->where('admin.id', Auth::guard('admin')->user()->id)
                ->get();
    }

    /**
     * The action witch user count use.
     *
     * @param \array $arrayUri arrayUri
     *
     * @return mixed
     */
    protected function check($arrayUri)
    {
        // if module is dashboard and action is index then continue
        if ($arrayUri[0] == 'dashboard' || $arrayUri[2] == 'index') {
            return true;
        }

        if ($arrayUri[2] == 'store' || $arrayUri[2] == 'update') {
            // if user pass create and edit then has permission store and update
            return true;
        }
        return false;
    }

    /**
     * Check permission of user login.
     *
     * @param \array  $data   data
     * @param \string $module module
     * @param \string $action action
     *
     * @return mixed
     */
    protected function checkPermission($data, $module, $action)
    {
        foreach ($data as $value) {
            if ($value->module == $module) {
                if ($this->checkAction($value, $action)) {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Check Action of user login.
     *
     * @param \object $value  value
     * @param \string $action action
     *
     * @return mixed
     */
    protected function checkAction($value, $action)
    {
        if ($value->see == 1 && $action == 'show') {
            return true;
        }

        if ($value->addNew == 1 && $action == 'create') {
            return true;
        }

        if ($value->edit == 1 && $action == 'edit') {
            return true;
        }

        if ($value->destroy == 1 && $action == 'destroy') {
            return true;
        }
    }
}
