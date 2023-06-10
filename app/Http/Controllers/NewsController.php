<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
class NewsController extends Controller
{
    public function list()
    {
        return view('admin.news.add');
    }

    public function addNew(Request $request)
    {
        $news = new NewsModel([
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author,
            'category_id' => $request->category_id,
            'tags' => $request->tags,
            'source_url' => $request->source_url,
            'is_featured' => $request->is_featured,
            'is_published' => $request->is_published,
            'description' => $request->description,
            'id_brand' => $request->brand,
            'id_category' => $request->category,
            'price' => $request->price
        ]);

        $news->save();

        return view('admin.news.add');
    }

    public function listNews()
    {
        $data = DB::table('fs_news')
        ->select('title' , 'content' , 'author' , 'category_id' , 'tags' , 'description' , 'source_url' , 'is_featured' , 'is_published' , 'id')
        ->get();
        return view('admin.news.list' , compact('data'));
    }

    public function editNews($id)
    {
        $data = DB::table('fs_news')
        ->where('id', $id)
        ->first();
        return view('admin.news.edit' , compact('data'));      
    }

    public function updateNews($id , request $request)
    {
        DB::table('fs_news')
        ->where('id', $id)
        ->update([
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author,
            'category_id' => $request->category_id,
            'tags' => $request->tags,
            'source_url' => $request->source_url,
            'is_featured' => $request->is_featured,
            'is_published' => $request->is_published,
            'description' => $request->description
        ]);
        return redirect::to('news/listNews'); 
    }

    public function deleteNews(Request $request , $id)
    {
        // $post = NewsModel::find($id);
        $ids = explode(',', $id);
        if (empty($id)) {
            return response()->json(['message' => 'Không tìm thấy bài viết'], 404);
        }

    // Xóa record khỏi database
        DB::table('fs_news')->whereIn('id', $ids)->delete();
        // $list = $sql->toSql();
        // var_dump($list);
        // $data_list = $sql->get();
        // var_dump($data_list);
        // return redirect::to('news/listNews'); 
        return response()->json(['message' => 'Đã xóa thành công']);
    }

}
