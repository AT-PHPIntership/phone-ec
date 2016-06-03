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
    public function index($condition = 'DAYNAME')
    {
        // create array save data report
        $data = array();

        // check condition group by.
        // only group by with condition = DAYNAME or MONTHNAME of created_at
        // if condition != DAYNAME or MONTHNAME then group by with DAYNAME
        if ($condition == 'DAYNAME' or $condition == 'MONTHNAME') {
            $data['order']   = $this->getReportOrder($condition);
            $data['user']    = $this->getReportUser($condition);
            $data['product'] = $this->getReportProduct($condition);
        } else {
            $data['order']   = $this->getReportOrder('DAYNAME');
            $data['user']    = $this->getReportUser('DAYNAME');
            $data['product'] = $this->getReportProduct('DAYNAME');
        }
        
        return view('backend.dashboard.index', compact('data'));
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
            ->take(3)->get();
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
            ->take(3)->get();
    }
}
