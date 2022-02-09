@extends('layouts.app')

@section('title', 'Ro Api Keys')

@section('page_title', 'Ro Api Keys')

@section('page_breadcrumb')
@parent
<li>Informations</li>
<li class="active">Ro Api Keys</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-content">
                <table class="table table-light"
                       id="dt_roapikeys">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Key</th>
                        <th>Count</th>
                        <th>Used At</th>
                        <th>Is Active</th>
                        <th>Reset Date</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap.min.css"/>
<style>
    div.container {
        width: 80%;
    }
</style>
@endpush

@push('js')

<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    let me = {};
    me.url = '/admin/ongkir/ro-api-keys';
    me.csrf = $('meta[name=csrf-token]').attr("content");

    $(function () {
        me.dt = $('#dt_roapikeys').DataTable({
            "aoColumnDefs": [
                {"bSearchable": false, "aTargets": [0]},
            ],
            processing: true,
            serverSide: true,
            pageLength: 25,
            ajax: me.url + '?use_dt=true',
            columns: [
                {data: 'name', name: 'name'},
                {data: 'api_key', name: 'api_key'},
                {data: 'counter', name: 'counter'},
                {data: 'used_at', name: 'used_at'},
                {data: 'is_active', name: 'is_active'},
                {data: 'reset_at', name: 'reset_at'},
            ],
            order: [[3, "desc"]]
        });
    });
</script>
@endpush


