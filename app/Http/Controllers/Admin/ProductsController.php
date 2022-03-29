<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prize;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $search         = $request->get('search');
        $orderBy        = $request->get('sortBy') ?? 'id';
        $orderDirection = str_to_bool($request->get('descending')) ? 'desc' : 'asc';
        $paginator      = Product::search($search)
                               ->orderBy($orderBy, $orderDirection)
                               ->paginate()
        ;
        return compact('paginator');
    }
}
