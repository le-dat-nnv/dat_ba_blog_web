<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class menuAdminController extends Controller
{
    //
    public function __construct()
    {
        $data = DB::table('fs_menu_admin')->get();
        return view('admin.layouts.home', [
            'menuData' => $data,
        ]);
    }

    public function list()
    {
        $data = DB::table('fs_menu_admin')->get();
        return response()->json($data);
    }
}
