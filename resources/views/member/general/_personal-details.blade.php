<h3>Personal Details</h3>
<hr class="hr-line-solid">
<form accept-charset="UTF-8" class="form-horizontal" id="personal_details_form">
    <div class="form-group">
        <label class="col-md-2 control-label">{{ __('app.u_full_name') }}</label>
        <div class="col-md-4">
            <p class="form-control-static">{{ $member->display_name }}</p>
        </div>
        <label class="col-md-2 control-label">{{ __('app.u_salutation') }}</label>
        <div class="col-md-4">
            <p class="form-control-static">{{ $member->salutation }}</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">{{ __('app.u_gender') }}</label>
        <div class="col-md-4">
            <p class="form-control-static">{{ $member->gender == 'M' ? __('app.u_male') : __('app.u_female')  }}</p>
        </div>
        <label class="col-md-2 control-label">{{ __('app.u_marital_status') }}</label>
        <div class="col-md-4">
            <p class="form-control-static">{{ $member->marital_status }}</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">{{ __('app.u_uuid') }}</label>
        <div class="col-md-4">
            <p class="form-control-static">{{ $member->uuid  }}</p>
        </div>
        <label class="col-md-2 control-label">{{ __('app.u_status') }}</label>
        <div class="col-md-4">
            <p class="form-control-static"><span class="badge badge-info">{{ $member->status ? __('app.u_active') : __('app.u_inactive') }}</span></p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">{{ __('app.u_nickname') }}</label>
        <div class="col-md-4">
            <p class="form-control-static">{{ $member->nickname  }}</p>
        </div>
        <label class="col-md-2 control-label">{{ __('app.u_date_of_birth') }}</label>
        <div class="col-md-4">
            <p class="form-control-static">{{ $member->date_of_birth->toDateString() }}</p>
        </div>
    </div>
</form>
<hr class="hr-line-dashed">
