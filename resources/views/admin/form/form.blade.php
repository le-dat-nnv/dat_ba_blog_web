<form ref="btn_form_submit" id="form_submit" action="{{ isset($data) ? URL::to($action.'/'.$data->id) : URL::to($action) }}" method="{{ $method }}">
    {{ csrf_field() }}
    <input id="id" type="hidden" name="id_s" value="{{ isset($data) ? $data->id : '' }}" >
    @foreach ($inputNames as $index => $inputName)
        <label class='mb-2 mt-4' for="{{ $inputName }}">{{ $TitleNames[$index] }}</label>
        @if ($inputTypes && $inputTypes[$index] === 'textarea')
            <textarea class="form-control" name="{{ $inputName }}" id="editor">{{ isset($data) ? $data->$inputName : old($inputName) }}</textarea>
        @elseif ($inputTypes && $inputTypes[$index] === 'select')
            <select class="form-control" name="{{ $inputName }}" id="{{ $inputName }}">
                <!-- insert options here -->
            </select>
        @else
            <input ref="{{ $inputName }}" class="form-control" type="{{ $inputTypes ? $inputTypes[$index] : 'text' }}" name="{{ $inputName }}" id="{{ $inputName }}" value="{{ isset($data) ? $data->$inputName : '' }}">
        @endif
    @endforeach

    @if (count($inputNames) == 1 && $inputNames[0] === 'content')
        <label class='mb-2' for="{{ $inputNames[0] }}">{{ $TitleNames[0] }}</label>
        <textarea class="form-control" name="{{ $inputNames[0] }}" id="editor">{{ old($inputNames[0]) }}</textarea>
        @if(isset($data) && isset($data->dulieu))
            <input type="hidden" name="trường" value="{{ $data->dulieu }}">
        @endif
    @endif

    <button class="btn btn-danger mt-4" type="submit">{{ $buttonText }}</button>
</form>