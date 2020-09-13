<x-portlets.base portlet-class="col-md-12" footer-class="m-portlet__foot--fit" :form=true form-action="{{ $data['form-action'] }}" form-method="{{ $data['form-method'] }}" :model="$data['blog']">
    <x-slot name="headTitle"> {{ $data['form-title'] }}</x-slot>
    <x-slot name="content">
        @if($errors->count())
            <div class="alert alert-danger" role="alert">
                Validation Errors! Please check out the form.
            </div>
        @endif
        <div class="form-group m-form__group row">
            <x-inputs.text form-class="col-lg-6" :errors="$errors" label="Title" labelfor="name" name="name" type="text" value="{{  $data['blog']->name ?? old('name')  ?? null }}"></x-inputs.text>
            <x-inputs.bootstrap-select form-class="col-lg-6" label="Category" labelfor="category" name="blog_category_id"
                                       select-id="category" placeHolder="Select Category" :options="$blogCategory" optionText="name"
                                       optionValue="id" :errors="$errors" value="{{  $data['blog']->blog_category_id ?? old('blog_category_id') ?? null }}">

            </x-inputs.bootstrap-select>
        </div>


        <div class="form-group m-form__group row">

            <x-inputs.ckeditor form-class="col-lg-12" label="News" labelfor="news" name="description" input-id="description" value="{!! $data['blog'] ? $data['blog']->description:  old('description') ? old('description') : null !!}"></x-inputs.ckeditor>
            <x-inputs.image form-class="col-lg-6" :errors="$errors" label="Image" labelfor="image" name="image" value="{{  $data['blog']->image ?? old('image') ?? null }}"></x-inputs.image>

        </div>


    </x-slot>
    <x-slot name="footer">
        <div class="m-form__actions">
            <button type="submit" class="btn btn-primary">{{ $data['button-text'] }}</button>
            <button type="reset" class="btn btn-secondary">Cancel</button>
        </div>
    </x-slot>
</x-portlets.base>
