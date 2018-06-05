@extends('layouts.app')

@section('title', 'Member List')

@section('page-header')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>{{ __('app.u_members') }}</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li class="active">
                    <strong>
                        <a href="{{ route('member.index') }}">{{ __('app.u_members') }}</a>
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
                    <div class="ibox-title">
                        <h5>List of members registered</h5>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example"
                                   id="users-table">
                                <thead>
                                <tr>
                                    <th>{{ __('app.u_name') }}</th>
                                    <th>{{ __('app.u_department') }}</th>
                                    <th>{{ __('app.u_email') }}</th>
                                    <th>{{ __('app.u_mobile_phone') }}</th>
                                    <th>{{ __('app.u_date_of_birth') }}</th>
                                    <th>{{ __('app.u_last_fellowship') }}</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>{{ __('app.u_name') }}</th>
                                    <th>{{ __('app.u_department') }}</th>
                                    <th>{{ __('app.u_email') }}</th>
                                    <th>{{ __('app.u_mobile_phone') }}</th>
                                    <th>{{ __('app.u_date_of_birth') }}</th>
                                    <th>{{ __('app.u_last_fellowship') }}</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://rawgit.com/moment/moment/2.22.2/min/moment.min.js" type="text/javascript"></script>
    <script src="{!! mix('js/jquery.dataTables.min.js') !!}" type="text/javascript"></script>

    <script>
        $(function () {
            $('#users-table').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                processing: true,
                serverSide: true,
                ajax: '{!! route('member.datatable.index') !!}',
                buttons: [
                    {extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'Member list'},
                    {extend: 'pdf', title: 'Member list'},
                    {
                        extend: 'print',
                        customize: function (win) {
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ],
                columns: [
                    {
                        data: 'display_name', render: function (data, type, full, meta) {
                            return '<a title="' + data + '" href="/members/' + full.uuid + '">' + data + '</a>';
                        }
                    },
                    {data: 'department', name: 'department'},
                    {data: 'personal_email', name: 'personal_email'},
                    {data: 'mobile_phone', name: 'mobile_phone'},
                    {
                        data: 'date_of_birth', render: function (data, type, full, meta) {
                            return moment(data).format('MMMM D, YYYY');
                        }, name: 'date_of_birth'
                    },
                    {
                        data: 'last_attended_at', render: function (data, type, full, meta) {
                            return moment(data).fromNow();
                        }, name: 'last_attended_at'
                    },
                ]
            });
        });
    </script>
@endpush
