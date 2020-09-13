<x-portlets.base portlet-class="col-md-12" footer-class="m-portlet__foot--fit" :form=true form-action="{{ $data['form-action'] }}" form-method="{{ $data['form-method'] }}" :model="$data['subcategory']">
    <x-slot name="headTitle"> {{ $data['form-title'] }}</x-slot>
    <x-slot name="content">
        @if($errors->count())
            <div class="alert alert-danger" role="alert">
                Validation Errors! Please check out the form.
            </div>
        @endif
        <div class="form-group m-form__group row">
            <x-inputs.text form-class="col-lg-6" :errors="$errors" label="Name" labelfor="name" name="name" type="text" value="{{  $data['subcategory']->name ?? old('subcategory') ?? null }}"></x-inputs.text>
            <x-inputs.bootstrap-select form-class="col-lg-6" label="Category" labelfor="categoryname" name="parent_id"
                                       select-id="name" placeHolder="Select Category" :options="$categoryName" optionText="name"
                                       optionValue="id" :errors="$errors" value="{{  $data['subcategory']->category_id ?? old('category_id') ?? null }}">

            </x-inputs.bootstrap-select>
        </div>

    </x-slot>
    <x-slot name="footer">
        <div class="m-form__actions">
            <button type="submit" class="btn btn-primary">{{ $data['button-text'] }}</button>
            <button type="reset" class="btn btn-secondary">Cancel</button>
        </div>
    </x-slot>
</x-portlets.base>
