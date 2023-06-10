@extends('admin.layouts.home')

@section('content')
@php
    // Các tiêu đề cần loại bỏ
    $excludedTitles = ["created_at", "updated_at"];

    // Lấy tất cả các tiêu đề của sản phẩm trong $data
    $list_title = [];
    foreach ($data as $product) {
        $list_title = array_merge($list_title, array_keys(get_object_vars($product)));
    }
    $list_title = array_unique($list_title);

    // Loại bỏ các tiêu đề không cần thiết
    $list_title = array_diff($list_title, $excludedTitles);
@endphp
<div class="container">
    @include('admin.form.btn_form', [
            'url_add' => 'news/addNews',
            'url_edit' => 'news/addNew',
            'url_delete' => 'menu/deleteMenu',
            'url_duplicate' => 'new/addNew',
            'url_list' => 'news/listNews',
            'url_apply' => 'api/applymenu'
        ])
    <div class="row justify-content-center">
        <h1>Add Menu</h1>
        @include('admin.form.formList', [
            'titleType' => 'text',
            'titleValue' => old('title'),
            'inputCount' => 5,
            'nameTitle' => ['Name' , 'Hiển thị' , 'Đường dẫn' , 'Kiểu' , 'Thứ tự' , 'Icon' , 'id'],
            'list' => $list_title,
            'url' => 'menu/editMenu',
            'url_delete' => 'menu/deleteMenu'
        ])
    </div>
</div>
@endsection