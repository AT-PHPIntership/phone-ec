<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Backend\Order;
use DB;

class DashboardController extends Controller
{
    /**
     * Index admmin
     *
     * @param string $condition this is of group by
     *
     * @return view index of admin
     */
    public function index($condition = null)
    {

        // create array save data report
        $data = array();
        
        // get conditon of report() define in config/app
        $getDay   = config('app.get_day');
        $getMonth = config('app.get_month');

        if (empty($condition)) {
            $condition = $getDay;
        }
       
        if ($condition != $getDay && $condition != $getMonth) {
            throw new \Exception(trans('labels.LabelWrong'));
        }

        $data['orders']   = $this->getReportOrder($condition);
        $data['users']    = $this->getReportUser($condition);
        $data['products'] = $this->getReportProduct($condition);
        
        return view('backend.dashboard.index')->with($data);
    }

    /**
     * Get report order with condition
     *
     * @param string $con is condition of group by (DAYNAME or MONTHNAME)
     *
     * @return view index of admin
     */
    private function getReportOrder($con)
    {
        return Order::selectRaw("$con(created_at) as $con, sum(total_price) as total")
                    ->groupBy(DB::raw("$con(created_at)"))
                    ->get()->toArray();
    }

    /**
     * Get report user with condition
     *
     * @param string $con is condition of group by (DAYNAME or MONTHNAME)
     *
     * @return view index of admin
     */
    private function getReportUser($con)
    {
        return DB::table('orders')
            ->selectRaw("name, sum(total_price) as total, $con(orders.created_at) as date")
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->groupBy(DB::raw("$con(orders.created_at)"), 'orders.user_id')
            ->orderBy(DB::raw("sum(total_price)"), 'desc')
            ->take(config('app.get_top_report'))->get();
    }

    /**
     * Get report product with condition
     *
     * @param string $con is condition of group by (DAYNAME or MONTHNAME)
     *
     * @return view index of admin
     */
    private function getReportProduct($con)
    {
        return DB::table('orderdetails')
            ->selectRaw("name, sum(price) as total, $con(orders.created_at) as date")
            ->join('orders', 'order_id', '=', 'orders.id')
            ->join('products', 'product_id', '=', 'products.id')
            ->groupBy(DB::raw("$con(orders.created_at)"), 'product_id')
            ->orderBy(DB::raw("sum(price)"), 'desc')
            ->take(config('app.get_top_report'))->get();
    }
}
