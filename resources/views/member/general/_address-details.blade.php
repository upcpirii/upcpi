<h3>{{ __('app.u_address_details') }}</h3>
<hr class="hr-line-solid">
<form accept-charset="UTF-8" class="form-horizontal" id="address_details_form">
    <div class="form-group">
        <label class="col-md-2 control-label">{{ __('app.u_address_1') }}</label>
        <div class="col-md-4">
            <p class="form-control-static">{{ $member->address_1 }}</p>
        </div>
        <label class="col-md-2 control-label">{{ __('app.u_address_2') }}</label>
        <div class="col-md-4">
            <p class="form-control-static">{{ $member->address_2 }}</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">{{ __('app.u_city') }}</label>
        <div class="col-md-4">
            <p class="form-control-static">{{ $member->city  }}</p>
        </div>
        <label class="col-md-2 control-label">{{ __('app.u_province') }}</label>
        <div class="col-md-4">
            <p class="form-control-static">{{ $member->province }}</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">{{ __('app.u_postcode') }}</label>
        <div class="col-md-4">
            <p class="form-control-static">{{ $member->postcode }}</p>
        </div>
        <label class="col-md-2 control-label">{{ __('app.u_country') }}</label>
        <div class="col-md-4">
            <p class="form-control-static">{{ $member->country  }}</p>
        </div>
    </div>
</form>
