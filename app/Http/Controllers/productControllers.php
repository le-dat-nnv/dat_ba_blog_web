<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products as ProductModel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
class productControllers extends Controller
{
    public function list()
    {
        return view('admin.products.add');
    }

    public function addProducts(Request $request)
    {
        $product = new ProductModel([
            'name' => $request->name,
            'description' => $request->description,
            'id_brand' => $request->brand,
            'id_category' => $request->category,
            'price' => $request->price
        ]);

        $product->save();

        // return response()->json([
        //     'message' => 'Product created successfully',
        //     'data' => $product
        // ], 201);

        return redirect::to('product/listProduct');
    }

    public function getList()
    {
        $data = DB::table('fs_products')->get();
        return view('admin.products.list' , compact('data'));
    }

    public function editProduct($id)
    {
        $data = DB::table('fs_products')
        ->where('id', $id)
        ->first();
        return view('admin.products.edit' , compact('data'));      
    }

    public function updateProduct($id , request $request)
    {
        DB::table('fs_products')
        ->where('id', $id)
        ->update([
            'name' => $request->name,
            'description' => $request->description,
            'id_brand' => $request->brand,
            'id_category' => $request->category,
            'price' => $request->price
        ]);
        return redirect::to('product/listProduct'); 
    }

    public function deleteProduct($id)
    {
        // $post = ProductModel::find($id);
        $ids = explode(',' , $id);


        if (!$id) {
            return response()->json(['message' => 'Không tìm thấy bài viết'], 404);
        }

    // Xóa record khỏi database
        DB::table('fs_products')->whereIn('id', $ids)->delete();
        // $list = $sql->toSql();
        // var_dump($list);
        // $data_list = $sql->get();
        // var_dump($data_list);
        // return redirect::to('news/listNews'); 
        return response()->json(['message' => 'Đã xóa thành công']);
    }
}
