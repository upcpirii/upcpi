@extends('layouts.app')

@section('title', 'Member List')

@section('page-header')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>{{ __('app.u_search') }}</h2>
            <ol class="breadcrumb">
                <li class="active">
                    <strong>
                        {{ __('app.u_search_results') }}
                    </strong>
                </li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <h2>
                            {{ $members->total() }} results found for: <span class="text-navy">“{{ request('q') }}”</span>
                        </h2>
                        <small>Request time  (0.23 seconds)</small>

                        <div class="search-form">
                            <form action="index.html" method="get">
                                <div class="input-group">
                                    <input type="text" placeholder="Admin Theme" name="search" class="form-control input-lg">
                                    <div class="input-group-btn">
                                        <button class="btn btn-lg btn-primary" type="submit">
                                            Search
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="hr-line-dashed"></div>

                        @foreach($members as $member)
                        <div class="search-result">
                            <h3><a href="{{ route('member.show', $member['uuid']) }}">{!! $member['_highlightResult']['display_name']['value'] !!}</a></h3>
                            <a href="#" class="search-link">{{ $member['department'] }}</a>
                            <p>

                            </p>
                        </div>
                        <div class="hr-line-dashed"></div>
                        @endforeach
                        <div class="text-center">
                            {!! $members->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush
