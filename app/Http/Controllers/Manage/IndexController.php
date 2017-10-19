<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Services\Manage\CommodityService;
use App\Services\Manage\OrderService;
use App\Services\Manage\UserService;

class IndexController extends Controller
{
    public function index(CommodityService $commodity)
    {
        $commodities = $commodity->get(10);

        return view('manage.index.index', [
            'store_count' => 1,
            'manager_count' => 2,
            'order_count' => 3,
            'user_count' => 4,
            'today_count' => 5,
            'all_price' => 6,
            'lists' => $commodities,
        ]);
    }
}