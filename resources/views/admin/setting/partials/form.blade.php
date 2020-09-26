<x-portlets.base portlet-class="col-md-12" footer-class="m-portlet__foot--fit" :form=true form-action="{{ $data['form-action'] }}" form-method="{{ $data['form-method'] }}" :model="$data['setting']">
    <x-slot name="headTitle"> {{ $data['form-title'] }}</x-slot>
    <x-slot name="content">
        @if($errors->count())
            <div class="alert alert-danger" role="alert">
                Validation Errors! Please check out the form.
                @if($errors->first('city_id'))
                    <p>You can not create more than one settings for the same location.</p>
                @endif
            </div>
        @endif
        <div class="form-group m-form__group row">
            <input type="hidden" value="{{ defaultCity('id') }}" name="city_id">
            <x-inputs.text form-class="col-lg-6" :errors="$errors" label="Company Name" labelfor="name" name="name" type="text" value="{{  $data['setting']->name ?? old('name') ?? null }}"></x-inputs.text>
            <x-inputs.text form-class="col-lg-6" :errors="$errors" label="Phone" labelfor="phone" name="phone" type="number" value="{{  $data['setting']->phone ?? old('phone') ?? null }}"></x-inputs.text>

        </div>

        <div class="form-group m-form__group row">
            <x-inputs.text form-class="col-lg-6" :errors="$errors" label="Viber" labelfor="viber" name="viber" type="number" value="{{  $data['setting']->viber ?? old('viber') ?? null }}"></x-inputs.text>
            <x-inputs.text form-class="col-lg-6" :errors="$errors" label="Email" labelfor="email" name="email" type="email" value="{{  $data['setting']->email ?? old('email') ?? null }}"></x-inputs.text>
        </div>

        <div class="form-group m-form__group row">
            <x-inputs.text form-class="col-lg-6" :errors="$errors" label="Address" labelfor="address" name="address" type="text" value="{{  $data['setting']->address ?? old('address') ?? null }}"></x-inputs.text>
            <x-inputs.text form-class="col-lg-6" :errors="$errors" label="Delivery Start Hour" labelfor="delivery_start_hour" name="delivery_start_hour" type="time" value="{{  $data['setting']->delivery_start_hour ?? old('delivery_start_hour') ?? null }}"></x-inputs.text>
        </div>

        <div class="form-group m-form__group row">
            <x-inputs.text form-class="col-lg-6" :errors="$errors" label="Delivery End Hour" labelfor="delivery_end_hour" name="delivery_end_hour" type="time" value="{{  $data['setting']->delivery_end_hour ?? old('delivery_end_hour') ?? null }}"></x-inputs.text>
            <x-inputs.text form-class="col-lg-6" :errors="$errors" label="Facebook Link" labelfor="facebook" name="facebook" type="text" value="{{  $data['setting']->facebook ?? old('facebook') ?? null }}"></x-inputs.text>
        </div>

        <div class="form-group m-form__group row">
            <x-inputs.text form-class="col-lg-6" :errors="$errors" label="Instagram Link" labelfor="instagram" name="instagram" type="text" value="{{  $data['setting']->instagram ?? old('instagram') ?? null }}"></x-inputs.text>
            <x-inputs.text form-class="col-lg-6" :errors="$errors" label="Twitter Link" labelfor="twitter" name="twitter" type="text" value="{{  $data['setting']->twitter ?? old('twitter') ?? null }}"></x-inputs.text>
        </div>

        <div class="form-group m-form__group row">
            <x-inputs.image form-class="col-lg-6" :errors="$errors" label="Logo" labelfor="logo" name="logo" type="file" value="{{  $data['setting']->logo ?? old('logo') ?? null }}"></x-inputs.image>
        </div>




    </x-slot>
    <x-slot name="footer">
        <div class="m-form__actions">
            <button type="submit" class="btn btn-primary">{{ $data['button-text'] }}</button>
            <button type="reset" class="btn btn-secondary">Cancel</button>
        </div>
    </x-slot>
</x-portlets.base>
