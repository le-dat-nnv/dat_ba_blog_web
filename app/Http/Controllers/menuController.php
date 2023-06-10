<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\menuModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class menuController extends Controller
{

    public function __construct()
    {
        // $data = DB::table('fs_menu')
        // ->select('slug' , 'id')->get();
        // for ($i=0; $i < count($data) ; $i++) { 
        //     $data[$i]->slug = Str::slug($data[$i]->slug);
        //     DB::table('fs_menu')
        //     ->where('id', $data[$i]->id)
        //     ->update([
        //         'slug' => $data[$i]->slug
        //     ]);
        // }
    }

    public function list()
    {
        return view('admin.menus.add');
    }

    public function addMenus(Request $request)
    {
        $name_url = $request->name;
        $name_url = Str::slug($name_url);

        $slug_url = $request->slug;
        $slug_url = Str::slug($slug_url);

        if (isset($request->id_s) && !empty($request->id_s)) {
        // Cập nhật bản ghi đã có trong database
            // dd($request->slug);
            if(empty($request->slug)) {
                DB::table('fs_menu')
                ->where('id', $request->id_s)
                ->update([
                    'name' => $request->name,
                    'slug' => $name_url,
                    'parent_id' => $request->parent_id,
                    'order' => $request->order,
                    'icon_class' => $request->icon_class,
                    'link' => $request->link,
                    'is_published' => $request->is_published
                ]);
            }else {
                DB::table('fs_menu')
                ->where('id', $request->id_s)
                ->update([
                    'name' => $request->name,
                    'slug' => $slug_url,
                    'parent_id' => $request->parent_id,
                    'order' => $request->order,
                    'icon_class' => $request->icon_class,
                    'link' => $request->link,
                    'is_published' => $request->is_published
                ]);
            // $list = $sql->toSql();
            // var_dump($list);
            // $data_list = $sql->get();
            // var_dump($data_list);
            }
            
        } else {
        // Tạo mới một bản ghi với các dữ liệu đã lấy được
            if(empty($request->slug)) {
               $menu = new menuModel([
                'name' => $request->name,
                'slug' => $name_url,
                'parent_id' => $request->parent_id,
                'order' => $request->order,
                'icon_class' => $request->icon_class,
                'link' => $request->link,
                'is_featured' => $request->is_featured,
                'is_published' => $request->is_published,
                'description' => $request->description,
                'id_brand' => $request->brand,
                'id_category' => $request->category,
                'price' => $request->price
            ]); 
           } else {
            $menu = new menuModel([
                'name' => $request->name,
                'slug' => $slug_url,
                'parent_id' => $request->parent_id,
                'order' => $request->order,
                'icon_class' => $request->icon_class,
                'link' => $request->link,
                'is_featured' => $request->is_featured,
                'is_published' => $request->is_published,
                'description' => $request->description,
                'id_brand' => $request->brand,
                'id_category' => $request->category,
                'price' => $request->price
            ]);
        }

        $menu->save();
    }

    return view('admin.menus.add');
}

public function listMenus()
{
    $data = DB::table('fs_menu')
    ->select('name' , 'slug' , 'link' , 'icon_class', 'order' , 'is_published' , 'id')
    ->paginate(30);
    return view('admin.menus.list' , compact('data'));
}

public function editMenus($id)
{
    $data = DB::table('fs_menu')
    ->where('id', $id)
    ->first();
    return view('admin.menus.edit' , compact('data'));      
}

public function updateMenus($id , request $request)
{
    DB::table('fs_menu')
    ->where('id', $id)
    ->update([
        'name' => $request->name,
        'slug' => $request->slug,
        'parent_id' => $request->parent_id,
        'order' => $request->order,
        'icon_class' => $request->icon_class,
        'link' => $request->link,
        'is_featured' => $request->is_featured,
        'is_published' => $request->is_published,
        'description' => $request->description,
        'id_brand' => $request->brand,
        'id_category' => $request->category,
        'price' => $request->price
    ]);
    return redirect::to('menu/listMenus'); 
}

public function deleteMenus(Request $request , $id)
{
        // $post = NewsModel::find($id);
    $ids = explode(',', $id);
    if (empty($id)) {
        return response()->json(['message' => 'Không tìm thấy bài viết'], 404);
    }

    // Xóa record khỏi database
    DB::table('fs_menu')->whereIn('id', $ids)->delete();
        // $list = $sql->toSql();
        // var_dump($list);
        // $data_list = $sql->get();
        // var_dump($data_list);
        // return redirect::to('news/listNews'); 
    return response()->json(['message' => 'Đã xóa thành công']);
}

public function add(Request $request)
{
     // Lấy tất cả các dữ liệu được gửi lên từ request
    $data = $request->all();
        // dd($data['id']);
    // Kiểm tra xem request có chứa trường 'id' hay không
    if (!empty($data['id'])) {
        // Cập nhật bản ghi đã có trong database
        $menu = menuModel::where('id', $data['id'])->first();
        $menu->name = $data['name'];
        $menu->is_published = $data['is_published'];
        $menu->slug = $data['slug'];
        $menu->parent_id = $data['parent_id'];
        $menu->order = $data['order'];
        $menu->icon_class = $data['icon_class'];
        $menu->save();
        $latestRecord = DB::table('fs_menu')->latest()->first();
        dd('123');
    } else {
        // Tạo mới một bản ghi với các dữ liệu đã lấy được
        $menu = new menuModel([
            'name' => $data['name'],
            'is_published' => $data['is_published'],
            'slug' => $data['slug'],
            'parent_id' => $data['parent_id'],
            'order' => $data['order'],
            'icon_class' => $data['icon_class']
        ]);
        $menu->save();
        $latestRecord = DB::table('fs_menu')->latest()->first();
    }

    return response()->json([
        'message' => 'Record created successfully',
        'latest_record' => $latestRecord,
    ]);
}
}
