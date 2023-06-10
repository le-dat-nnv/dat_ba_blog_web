<div class="row btn_header">
    <div class="col-md-6 form_gap">
        <a href="{{ URL::to($url_add) }}" type="button" class="btn btn-primary">Thêm</a>
        <a href="{{ URL::to($url_edit) }}" type="button" class="btn btn-secondary">Sửa</a>
        <button ref="deleteButton" id="{{ $url_delete }}" @click.prevent="deleteSelected" type="button" class="btn btn-success">Xóa</button>
        <a href="{{ URL::to($url_duplicate) }}" type="button" class="btn btn-danger">Duplicate</a>
        <a href="{{ URL::to($url_list) }}" type="button" class="btn btn-danger">List</a>
        <button ref="applyButton" id="{{ URL::to($url_apply) }}" @click.prevent="apply" type="button" class="btn btn-danger">Apply</button>
    </div>
</div>
