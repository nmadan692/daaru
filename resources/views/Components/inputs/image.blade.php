<div class="{{ $formClass ?? '' }}">
    @if($label)
        <label for="{{$labelFor}}">{{ $label }}</label>
    @endif
        <input type="file" class="form-control m-input m-input--air {{ $inputClass ?? '' }}" id="{{ $inputId ?? ''}}" name="{{$name}}"  onchange="showMyImage(this)" style="display: none;" />
        <div class="image-div">
            <img class="input-image" id="preview-image"  src="{{ getImageUrl($value) }}" alt="image" onclick="clickImage()" />
        </div>
        @if($helpText)
        <span class="m-form__help {{ $helpClass }}">{{ $helpText }}</span>
    @endif
    @if($errors)
        <span class="error">{{ $errors->first($name) }}</span>
    @endif
</div>

@push('style')
    <style>
        .input-image {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
        }
        .image-div {
            margin-top: 10px;
            width: 400px;
            height: 280px;
            background: #bfd4db;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
@endpush
@push('script')
    <script>
            function clickImage() {
                $("input[type='file']").click();
            }

            function showMyImage(fileInput) {
                var files = fileInput.files;
                for (var i = 0; i < files.length; i++) {
                    var file = files[i];
                    var img=document.getElementById("preview-image");
                    img.file = file;
                    var reader = new FileReader();
                    reader.onload = (function(aImg) {
                        return function(e) {
                            aImg.src = e.target.result;
                        };
                    })(img);
                    reader.readAsDataURL(file);
                }
            }
    </script>
@endpush
