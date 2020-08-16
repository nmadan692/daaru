<x-portlets.base portlet-class="col-md-12" footer-class="m-portlet__foot--fit" :form=true form-action="{{ $data['form-action'] }}" form-method="{{ $data['form-method'] }}" :model="$data['product']">
    <x-slot name="headTitle"> {{ $data['form-title'] }}</x-slot>
    <x-slot name="content">
        <div class="form-group m-form__group row">
            <x-inputs.text form-class="col-lg-6" :errors="$errors" label="Image" labelfor="image" name="image" type="file" value="{{  $data['product']->image ?? null }}"></x-inputs.text>
            <x-inputs.text form-class="col-lg-6" :errors="$errors" label="Name" labelfor="name" name="name" type="text" value="{{  $data['name']->name ?? null }}"></x-inputs.text>
        </div>

        <div class="form-group m-form__group row">
        <x-inputs.bootstrap-select form-class="col-lg-6" label="Brand" labelfor="brand" name="brand_id"
                                   select-id="brand" placeHolder="Select Brand" :options="$brandName" optionText="name"
                                   optionValue="id">

        </x-inputs.bootstrap-select>
        <x-inputs.text form-class="col-lg-6" :errors="$errors" label="Volume" labelfor="volume" name="volume" type="number" value="{{  $data['product']->volume ?? null }}"></x-inputs.text>
        </div>

        <div class="form-group m-form__group row">
            <x-inputs.text form-class="col-lg-6" :errors="$errors" label="Country" labelfor="country" name="country" type="text" value="{{  $data['product']->country ?? null }}"></x-inputs.text>
            <x-inputs.text form-class="col-lg-6" :errors="$errors" label="Alcohol" labelfor="alcohol" name="alcohol" type="number" value="{{  $data['name']->alcohol ?? null }}"></x-inputs.text>
        </div>

        <div class="form-group m-form__group row">
            <x-inputs.text form-class="col-lg-6" :errors="$errors" label="Price" labelfor="price" name="price" type="number" value="{{  $data['name']->price ?? null }}"></x-inputs.text>

        </div>

        <div class="form-group m-form__group row">
        <x-inputs.ckeditor form-class="col-lg-12" label="Description" labelfor="description" name="description" input-id="description" value="{!! $data['product'] ? $data['product']->description : null !!}"></x-inputs.ckeditor>
        </div>

        <div class="form-group m-form__group row">
            <x-inputs.text form-class="col-lg-6" :errors="$errors" label="Discount" labelfor="discount" name="discount" type="text" value="{{  $data['product']->discount ?? null }}"></x-inputs.text>
            <x-inputs.text form-class="col-lg-6" :errors="$errors" label="Quantity" labelfor="quantity" name="quantity" type="number" value="{{  $data['product']->quantity ?? null }}"></x-inputs.text>
        </div>
    </x-slot>
    <x-slot name="footer">
        <div class="m-form__actions">
            <button type="submit" class="btn btn-primary">{{ $data['button-text'] }}</button>
            <button type="reset" class="btn btn-secondary">Cancel</button>
        </div>
    </x-slot>
</x-portlets.base>
