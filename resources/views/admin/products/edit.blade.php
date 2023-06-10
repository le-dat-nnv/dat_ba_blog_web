@extends('admin.layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Add Products</h1>
        @include('admin.form.form', [
            'action' => 'product/updateProduct',
            'method' => 'POST',
            'titleType' => 'text',
            'titleValue' => old('title'),
            'inputCount' => 4,
            'inputNames' => ['name', 'description' , 'id_brand' , 'id_category'],
            'buttonText' => 'Add Product'
        ])
    </div>
</div>
@endsection