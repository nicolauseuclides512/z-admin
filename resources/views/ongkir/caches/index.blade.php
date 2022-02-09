@extends('layouts.app')

@section('title', 'Caches')

@section('page_title', 'Caches')

@section('page_breadcrumb')
@parent
<li>Maintenance</li>
<li class="active">Caches</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-content">
                <input type="text" onkeyup="searchEvt(this.value)" placeholder="Search Key" style="width: 30%"/>

                <table class="table table-light table-striped"
                       id="dt_caches"
                       style="width: 100%;
                        word-break: break-word;
                         overflow-wrap: break-word;"
                >
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Key</th>
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
    .dataTables_filter {
        float: left !important;
    }

    div.container {
        width: 80%;
    }
</style>
@endpush

@push('js')

<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>

<script type="text/javascript">
    let me = {};
    me.url = '/admin/ongkir/caches';
    me.csrf = $('meta[name=csrf-token]').attr("content");

    $(function () {

        $.fn.dataTable.ext.buttons.alert = {
            className: 'btn btn-primary',

            action: function (e, dt, node, config) {
                alert(this.text());
            }
        };

        me.dt = $('#dt_caches').DataTable({
            dom: '<"top"il>Bfrtp',
            processing: true,
            serverSide: true,
            pageLength: 25,
            ajax: me.url + '?use_dt=true',
            columns: [
                {
                    data: 'key',
                    name: 'key',
                    render: function (key) {
                        return `
                            <a href="javascript:;" onclick="deleteEvt('${key}')" style="color: red">
                            <i class="fa fa-times pull-left"></i>
                             </a>
                        `;
                    }
                },
                {data: 'key', name: 'key'}
            ],
            order: [[1, "asc"]],
            buttons: [
                {
                    className: 'btn btn-default',
                    text: '<i class="fa fa-refresh"></i>',
                    action: function () {
                        me.dt.draw();
                    }
                },
                {
                    className: 'btn btn-danger right',
                    text: '<i class="fa fa-warning"></i> Clear All Cache',
                    action: function () {
                        flushEvt();
                    }
                }

            ]
        });

        $(".dataTables_filter").hide();


    });

    let deleteEvt = function (key) {
        swal("Do you want to remove this key?", {
            buttons: {
                no: 'No',
                yes: 'Yes',
            },
        }).then((value) => {
            switch (value) {
                case "yes":
                    let request = $.ajax({
                        url: me.url + "/remove/" + key + '?_token=' + me.csrf,
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

    let flushEvt = function () {
        swal("Do you really want to remove all cache?", {
            buttons: {
                no: 'No',
                yes: 'Yes',
            },
        }).then((value) => {
            switch (value) {
                case "yes":
                    let request = $.ajax({
                        url: me.url + "/flush" + '?_token=' + me.csrf,
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

    let searchEvt = function (value) {
        me.dt.search(value).draw();
    };
</script>
@endpush


