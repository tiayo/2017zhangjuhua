<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Repositories\CommodityRepository;
use App\Services\Manage\CategoryService;

class ListController extends Controller
{
    protected $commodity, $category;

    public function __construct(CommodityRepository $commodity, CategoryService $category)
    {
        $this->commodity = $commodity;
        $this->category = $category;
    }

    public function categoryList()
    {

        return view('home.list.category', [
            'parents' => $this->category->getParent()
        ]);
    }

    public function view($category_id)
    {
        $commodities = $this->commodity->getByCategory($category_id);

        return view('home.list.view', [
            'commodities' => $commodities,
        ]);
    }
}