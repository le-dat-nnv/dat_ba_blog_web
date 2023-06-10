@extends('admin.layouts.home')

@section('content')
<div class="container">
    @include('admin.form.btn_form', [
            'url_add' => 'news/addNews',
            'url_edit' => 'news/addNew',
            'url_delete' => 'news/addNew',
            'url_duplicate' => 'news/addNew',
            'url_list' => 'news/listNews'
        ])
    <div class="row justify-content-center">
        <h1>Add News</h1>
        @include('admin.form.form', [
            'action' => 'news/updateNews',
            'method' => 'POST',
            'titleType' => 'text',
            'titleValue' => old('title'),
            'inputCount' => 4,
            'inputNames' => ['title', 'content' , 'author' , 'category_id' , 'tags' , 'description' , 'source_url' , 'is_featured' , 'is_published'],
            'TitleNames' => ['Title' , 'Content' , 'Author' , 'Thể loại' , 'Tags' , 'Miêu Tả' , 'Đường dẫn gốc' , 'Bài Viết Nổi Bật' , 'Hiển thị'],
            'inputTypes' => ['text', 'textarea', 'text', 'select', 'text', 'text', 'text', 'text', 'text'],
            'buttonText' => 'Update News'
        ])
    </div>
</div>
@endsection