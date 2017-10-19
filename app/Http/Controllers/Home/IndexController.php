<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Services\Home\CarService;
use App\Services\Home\IndexService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    protected $index;
    protected $car;

    public function __construct(IndexService $index, CarService $car)
    {
        $this->index = $index;
        $this->car = $car;
    }

    public function index()
    {
        //获取商品
        $commodity_1 = $this->index->getByType(1, 10);
        $commodity_2 = $this->index->getByType(2, 10);
        $commodity_3 = $this->index->getByType(3, 10);
        $commodity_4 = $this->index->getByType(4, 10);

        return view('home.index.index', [
            'commodity_1' => $commodity_1,
            'commodity_2' => $commodity_2,
            'commodity_3' => $commodity_3,
            'commodity_4' => $commodity_4,
        ]);
    }

    public function search(Request $request)
    {
        $keyword = $request->get('keyword');

        if (empty($keyword)) {
            return view('home.index.search');
        }

        //记录到session
        $request->session()->push('search_keyword.', $keyword);

        //获取商品
        $commodities = $this->index->getSearch($keyword);

        return view('home.list.list', [
            'commodities' => $commodities,
        ]);
    }
}