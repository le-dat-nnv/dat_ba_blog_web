<table class="table">
    <thead>
        <tr>
            <td><input class="form-check-input" id="all" v-model="isChecked" @change="checkAll" type="checkbox"></td>
            <td>#</td>
            @foreach ($nameTitle as $lableName)
            <td>{{ $lableName }}</td>
            @endforeach
            <td>Sửa</td>
            <td>Xóa</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $index => $product)
        <tr>
            <td><input class="form-check-input" type="checkbox" value="" id="{{ $product->id }}" ref="{{ $product->id }}" ></td>
            <td>{{ $index + 1 }}</td>
            @foreach ($list as $title)
            <td>{!! $product->{$title} !!}</td>
            @endforeach
            <td><a href="{{ URL::to("$url/$product->id") }}" class="btn btn-danger">Sửa</a></td>
            <td>
                <form action="{{ URL::to("$url_delete/$product->id") }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $data->links() }}