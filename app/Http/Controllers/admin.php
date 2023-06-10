<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class admin extends Controller
{
    public function index()
    {
        $data = DB::table('fs_menu_admin')->get();
        return view('admin.layouts.home', [
            'menuData' => $data,
        ]);
    }

    public function list()
    {
        dd('123');
    }
    //
}
