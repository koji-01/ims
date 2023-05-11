<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Quantity;
use App\Models\Company;
use App\Models\Cart;




class QuantityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ProductQuantityList(Request $request)
    {
        $quantities = DB::table('quantities')
            ->join('products', 'quantities.product_id', '=', 'products.id')
            ->join('companies', 'products.company_id', '=', 'companies.id')
            ->select('products.id', 'companies.company_name', 'products.product_name', 'quantities.total_quantity', 'quantities.remaining_quantity')
            ->get();
        return view('backend.quantity.list_quantity', compact('quantities'));
    }

}