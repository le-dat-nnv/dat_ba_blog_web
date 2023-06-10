@extends('admin.layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('admin.form.btn_form', [
            'url_add' => 'news/addNews',
            'url_edit' => 'news/addNew',
            'url_delete' => 'menu/deleteMenu',
            'url_duplicate' => 'news/addNew',
            'url_list' => 'menu/listMenu',
            'url_apply' => 'api/applymenu'
        ])
        <h1>Add Menu</h1>
            @include('admin.form.form', [
            'action' => 'menu/addMenus',
            'method' => 'POST',
            'titleType' => 'text',
            'titleValue' => old('title'),
            'inputCount' => 4,
            'inputNames' => ['name', 'is_published' , 'slug' , 'parent_id' , 'order' , 'icon_class'],
            'TitleNames' => ['Name' , 'Hiển thị' , 'Đường dẫn' , 'Kiểu' , 'Thứ tự' , 'Icon'],
            'inputTypes' => ['text', 'text', 'text', 'number', 'text', 'text'],
            'buttonText' => 'Add Menu'
        ])
    </div>
</div>
@endsection