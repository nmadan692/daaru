<x-portlets.base portlet-class="col-md-12" footer-class="m-portlet__foot--fit" :form=true form-action="{{ $data['form-action'] }}" form-method="{{ $data['form-method'] }}" :model="$data['cms_page']">
    <x-slot name="headTitle"> {{ $data['form-title'] }}</x-slot>
    <x-slot name="content">
        @if($errors->count())
            <div class="alert alert-danger" role="alert">
                Validation Errors! Please check out the form.
            </div>
        @endif


        <div class="form-group m-form__group row">
            <x-inputs.ckeditor form-class="col-lg-12" :errors="$errors" label="Terms and Conditions" labelfor="terms_and_conditions" name="terms_and_conditions" input-id="terms_and_conditions" value="{!! $data['cms_page'] ? $data['cms_page']->terms_and_conditions :  old('terms_and_conditions') ? old('terms_and_conditions') : null !!}"></x-inputs.ckeditor>
        </div>

        <div class="form-group m-form__group row">
            <x-inputs.ckeditor form-class="col-lg-12" :errors="$errors" label="Return Policy" labelfor="return_policy" name="return_policy" input-id="return_policy" value="{!! $data['cms_page'] ? $data['cms_page']->return_policy :  old('return_policy') ? old('return_policy') : null !!}"></x-inputs.ckeditor>
        </div>

        <div class="form-group m-form__group row">
            <x-inputs.ckeditor form-class="col-lg-12" :errors="$errors" label="Privacy Policy" labelfor="privacy_policy" name="privacy_policy" input-id="privacy_policy" value="{!! $data['cms_page'] ? $data['cms_page']->privacy_policy:  old('privacy_policy') ? old('privacy_policy') :  null !!}"></x-inputs.ckeditor>
        </div>



        <div class="form-group m-form__group row">
            <x-inputs.image form-class="col-lg-6" :errors="$errors" label="Banner Image" labelfor="image" name="image" value="{{  $data['cms_page']->image ?? old('image') ?? null }}"></x-inputs.image>
        </div>
    </x-slot>
    <x-slot name="footer">
        <div class="m-form__actions">
            <button type="submit" class="btn btn-primary">{{ $data['button-text'] }}</button>
            <button type="reset" class="btn btn-secondary">Cancel</button>
        </div>
    </x-slot>
</x-portlets.base>
