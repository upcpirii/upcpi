<h3>{{ __('app.u_contact_details') }}</h3>
<hr class="hr-line-solid">
<form accept-charset="UTF-8" class="form-horizontal" id="contact_details_form">
    <div class="form-group">
        <label class="col-md-2 control-label">{{ __('app.u_personal_email') }}</label>
        <div class="col-md-4">
            <p class="form-control-static">{{ $member->personal_email }}</p>
        </div>
        <label class="col-md-2 control-label">{{ __('app.u_home_phone') }}</label>
        <div class="col-md-4">
            <p class="form-control-static">{{ $member->home_phone }}</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">{{ __('app.u_mobile_phone') }}</label>
        <div class="col-md-4">
            <p class="form-control-static">{{ $member->mobile_phone  }}</p>
        </div>
    </div>
</form>
<hr class="hr-line-dashed">
