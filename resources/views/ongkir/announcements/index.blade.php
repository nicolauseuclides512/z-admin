@extends('layouts.app')

@section('title', 'Announcement')

@section('page_title', 'Announcement')

@section('page_breadcrumb')
@parent
<li>Informations</li>
<li class="active">Announcement</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-action">
                <a href="/admin/ongkir/announcements/create"><i class="fa fa-pencil"></i> Add Announcement</a>
            </div>
            <div class="card-content">
                <table class="table table-light table-striped" id="dt_announcements">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>title</th>
                        <th>Event</th>
                        <th>Exp</th>
                        <th>Playstore</th>
                        <th>status</th>
                        <th>Action</th>
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
    me.url = '/admin/ongkir/announcements';
    me.csrf = $('meta[name=csrf-token]').attr("content");

    $(function () {
        me.dt = $('#dt_announcements').DataTable({
            "aoColumnDefs": [
                {"bSearchable": false, "aTargets": [0]},
                {"bSearchable": false, "aTargets": [2]},
                {"bSearchable": false, "aTargets": [4]},
                {"bSearchable": false, "aTargets": [6]}
            ],
            processing: true,
            serverSide: true,
            ajax: me.url+ '?use_dt=true',
            pageLength: 25,
            columns: [
                {
                    data: 'image_url',
                    name: 'image_url',
                    render: function (img) {
                        return `<img src="${img}" class="img-thumbnail" style="max-width: 100px"/>`;
                    }
                },
                {data: 'title', name: 'title'},
                {data: 'event_name', name: 'event_name'},
                {data: 'expired_date', name: 'expired_date'},
                {data: 'playstore', name: 'playstore'},
                {data: 'status', name: 'status'},
                {
                    data: 'id',
                    name: 'id',
                    render: function (id) {
                        return `
                            <a href="/admin/ongkir/announcements/${id}/edit" style="color: dodgerblue" ><i class="fa fa-edit pull-left" style="margin-right: 30px"></i> </a>
                            <a href="javascript:;" onclick="deleteEvt(${id})" style="color: red"><i class="fa fa-times pull-left"></i> </a>
                        `;
                    }
                }
            ],
            order: [[3, "desc"]]
        });
    });

    let deleteEvt = function (id) {
        swal("Do you want to remove this data?", {
            buttons: {
                no: 'No',
                yes: 'Yes',
            },
        })
            .then((value) => {
                switch (value) {
                    case "yes":
                        let request = $.ajax({
                            url: me.url + "/" + id + '?_token=' + me.csrf,
                            method: "DELETE",
                            dataType: "json"
                        });

                        request.done(function (response, status, message) {
                            if (response.code === 200) {
                                swal(response.message);
                                me.dt.clear().draw();
                            }
                        });

                        request.fail(function (jqXHR, textStatus) {
                            console.info('fail', arguments);
                            swal(jqXHR.statusText);
                        });
                        break;
                    default:
                        console.log("Got away safely!");
                }
            });
    };
</script>
@endpush


