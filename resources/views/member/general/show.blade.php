@extends('layouts.app')

@section('title', __('app.u_general_information'))

@section('page-header')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>{{ __('app.u_members') }}</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a href="{{ route('member.index') }}">{{ __('app.u_members') }}</a>
                </li>
                <li class="active">
                    <strong>
                        <a title="{{ $member->display_name }}"
                           href="{{ route('member.show', $member) }}">{{ $member->display_name }}</a>
                    </strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-3">
            <div class="title-action">
                <a href="#" class="btn btn-white"><i class="fa fa-pencil"></i> Edit </a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-2">
                <div class="ibox-content p-lg text-center">
                    <div class="m-b-md">
                        <h2 class="font-bold no-margins">
                            {{ $member->display_name }}
                        </h2>
                        <small>{{ $member->department }} {{ __('app.u_department') }}</small>
                    </div>
                    <img src="/images/avatars/{{ $image }}" width="140px" height="140px" class="img-circle circle-border m-b-md"
                         alt="profile">
                    <div>
                        <span><i class="fa fa-envelope-o"></i></span> |
                        <span><i class="fa fa-mobile-phone"></i></span> |
                        <span><i class="fa fa-phone"></i></span>
                    </div>
                </div>
                <div class="text-box no-padding">
                    <div class="p-m">
                        <h5>GENERAL</h5>
                        <h5>GENERAL</h5>
                        <h5>GENERAL</h5>
                        <h5>GENERAL</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-10">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <h2>{{ __('app.u_general_information') }}</h2>
                            <hr class="hr-line-dashed">

                            @include('member.general._personal-details')
                            @include('member.general._contact-details')
                            @include('member.general._address-details')
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
