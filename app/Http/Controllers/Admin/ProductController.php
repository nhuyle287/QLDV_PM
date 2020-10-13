<?php


namespace App\Http\Controllers\Admin;

use App\Business\ProductLogic;
use App\Business\UserLogic;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class ProductController extends AdminController
{
    public function index(Request $request)
    {
        $product_logic = new ProductLogic();
        $products = $product_logic->getListProduct($request);
        //dd($products);
        return view('admin.product.index', compact('products'));
    }
    public function entry(Request $request){
        return view('admin.product.edit-add');
    }
    public function show(Request $request){
        $product = Product::find($request->id);
        return view('admin.product.show', compact('product'));
    }
    public function destroy(Request $request)
    {
        try {
            $product = Product::find($request->id);

            if ($product == null) {
                throw new \Exception();
            }
            $product->delete();
            return redirect()->route('admin.products.index')->with('notification', 'Thành công');
        } catch (\Exception $e) {
            return redirect()->route('admin.products.index')->with('fail', 'Lỗi');
        }
    }
}
