<?php

namespace App\Http\Controllers\Admin;

use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() {
        $totalUser = User::count();
        $totalOrder = Order::where('status', OrderStatus::ORDER_SUCCESS)->count();
        $totalRevenue = Order::where('status', OrderStatus::ORDER_SUCCESS)->sum('total');

        $datetime = Carbon::now()->subMonth();
        $dataChart = Order::selectRaw('DAY(created_at) as day, SUM(total) as total')
            ->whereDate('created_at', '>', $datetime)
            ->where('status', OrderStatus::ORDER_SUCCESS)
            ->groupBy(DB::raw('DAY(created_at)'))
            ->get();
        $dataRevenueMonth = [];
        for ($day = 1; $day <= date('d'); $day++) {
            $temp = (object)[
                'day' => $day,
                'total' => 0
            ];
            foreach ($dataChart as $item) {
                if ($item->day == $day) {
                    $temp->total = $item->total;
                }
            }
            array_push($dataRevenueMonth, $temp);
        }

        return view('admin.home.index', [
            'totalUser' => $totalUser,
            'totalOrder' => $totalOrder,
            'totalRevenue' => $totalRevenue,
            'dataRevenueMonth' => $dataRevenueMonth,
        ]);
    }
}
