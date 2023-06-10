@extends('admin.layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('admin.form.btn_form', [
            'url_add' => 'news/addNews',
            'url_edit' => 'news/addNew',
            'url_delete' => 'news/addNew',
            'url_duplicate' => 'news/addNew',
            'url_list' => 'product/listProduct'
        ])
        <h1>Add Products</h1>
        @include('admin.form.form', [
            'action' => 'product/addProduct',
            'method' => 'POST',
            'titleType' => 'text',
            'titleValue' => old('title'),
            'inputCount' => 4,
            'inputNames' => ['name', 'description' , 'brand' , 'category'],
            'TitleNames' => ['Name', 'Description' , 'Brand' , 'Category'],
            'inputTypes' => ['text', 'textarea', 'text', 'select', 'text', 'text', 'text', 'text', 'text'],
            'buttonText' => 'Add Product'
        ])
    </div>
</div>
@endsection