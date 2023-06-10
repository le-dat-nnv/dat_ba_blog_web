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
    <div class="row justify-content-center">
        @include('admin.form.btn_form', [
            'url_add' => 'news/addNews',
            'url_edit' => 'news/addNew',
            'url_delete' => 'product/deleteProduct',
            'url_duplicate' => 'news/addNew',
            'url_list' => 'product/listProduct'
        ])
        <h1>Add Products</h1>
        @include('admin.form.formList', [
            'titleType' => 'text',
            'titleValue' => old('title'),
            'inputCount' => 5,
            'nameTitle' => ['name', 'description' ,'price', 'brand' , 'category' , 'image' , 'id'],
            'dataRender' => ['name', 'description' , 'brand' , 'category'],
            'list' => $list_title,
            'url' => 'product/editProduct',
            'url_delete' => 'product/deleteProduct'
        ])
    </div>
</div>
@endsection