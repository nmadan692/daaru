<x-portlets.base portlet-class="col-md-12" footer-class="m-portlet__foot--fit" :form=true form-action="{{ $data['form-action'] }}" form-method="{{ $data['form-method'] }}" :model="$data['product']">
    <x-slot name="headTitle"> {{ $data['form-title'] }}</x-slot>
    <x-slot name="content">
        @if($errors->count())
            <div class="alert alert-danger" role="alert">
                Validation Errors! Please check out the form.
            </div>
        @endif
        <div class="form-group m-form__group row">
            <x-inputs.text form-class="col-lg-6" :errors="$errors" label="Name" labelfor="name" name="name" type="text" value="{{  old('name', $data['product']->name ?? null) }}"></x-inputs.text>
            <x-inputs.bootstrap-select form-class="col-lg-6" label="Brand" labelfor="brand" name="brand_id"
                                       select-id="brand" placeHolder="Select Brand" :options="$brandName" optionText="name"
                                       optionValue="id" :errors="$errors" value="{{  old('brand_id', $data['product']->brand_id ?? null) }}">
            </x-inputs.bootstrap-select>
        </div>

        <div class="form-group m-form__group row">
            <x-inputs.text form-class="col-lg-6" :errors="$errors" label="Volume" labelfor="volume" name="volume" type="text" value="{{  old('volume', $data['product']->volume ?? null) }}"></x-inputs.text>
            <x-inputs.text form-class="col-lg-6" :errors="$errors" label="Country" labelfor="country" name="country" type="text" value="{{  old('country', $data['product']->country ?? null) }}"></x-inputs.text>
        </div>

        <div class="form-group m-form__group row">
            <x-inputs.text form-class="col-lg-6" :errors="$errors" label="Alcohol" labelfor="alcohol" name="alcohol" type="text" value="{{  old('alcohol', $data['product']->alcohol ?? null) }}"></x-inputs.text>
            <x-inputs.text form-class="col-lg-6" :errors="$errors" label="Price" labelfor="price" name="price" type="number" value="{{  old('price', $data['product']->price ?? null) }}"></x-inputs.text>

        </div>

        <div class="form-group m-form__group row">
            <x-inputs.ckeditor form-class="col-lg-12" label="Description" labelfor="description" name="description" input-id="description" value="{!! old('description', $data['product']->description ?? null) !!}"></x-inputs.ckeditor>
        </div>

        <div class="form-group m-form__group row">
            <x-inputs.text form-class="col-lg-6" :errors="$errors" label="Discount" labelfor="discount" name="discount" type="text" value="{{  old('discount', $data['product']->discount ?? null) }}"></x-inputs.text>
            <x-inputs.text form-class="col-lg-6" :errors="$errors" label="Quantity" labelfor="quantity" name="quantity" type="number" value="{{  old('quantity', $data['product']->quantity ?? null) }}"></x-inputs.text>

        </div>
        <div class="form-group m-form__group row">
            <x-inputs.checkbox form-class="col-lg-6" :errors="$errors" label="Is Percent" labelfor="is_percent" name="is_percent" type="checkbox" value="{{  old('is_percent', $data['product']->is_percent ?? null) }}"></x-inputs.checkbox>

            <x-inputs.checkbox form-class="col-lg-6" :errors="$errors" label="Is Featured" labelfor="is_featured" name="is_featured" type="checkbox" value="{{  old('is_featured', $data['product']->is_featured ?? null) }}"></x-inputs.checkbox>
        </div>

        <div class="form-group m-form__group row">
        </div>

        <div class="form-group m-form__group row">
            <x-inputs.image form-class="col-lg-6" :errors="$errors" label="Image" labelfor="image" name="image" value="{{ old('image', $data['product']->image ?? null) }}"></x-inputs.image>
        </div>
    </x-slot>
    <x-slot name="footer">
        <div class="m-form__actions">
            <button type="submit" class="btn btn-primary">{{ $data['button-text'] }}</button>
            <button type="reset" class="btn btn-secondary">Cancel</button>
        </div>
    </x-slot>
</x-portlets.base>
