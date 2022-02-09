<?php $__env->startSection('title', 'Carriers'); ?>

<?php $__env->startSection('page_title', 'Carriers'); ?>

<?php $__env->startSection('page_breadcrumb'); ?>
##parent-placeholder-496e8e8c4b20239b6c61c5b0fb32d6e862d71ee4##
<li>Assets</li>
<li class="active">Carriers</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-action">
                <a href="/admin/assets/carriers/create"><i class="fa fa-pencil"></i> Add Carriers</a>
            </div>
            <div class="card-content">
                <table class="table table-light table-striped" id="dt_carriers">
                    <thead>
                    <tr>
                        <th>Logo</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Priority</th>
                        <th>Shipping Cost</th>
                        <th>Track Shipment</th>
                        <th>Default</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap.min.css"/>
<style>
    div.container {
        width: 80%;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    let me = {};
    me.url = '/admin/assets/carriers';
    me.csrf = $('meta[name=csrf-token]').attr("content");

    $(function () {
        me.dt = $('#dt_carriers').DataTable({
            "aoColumnDefs": [
                {"bSearchable": false, "aTargets": [0]},
                {"bSearchable": false, "aTargets": [3]},
                {"bSearchable": false, "aTargets": [4]},
                {"bSearchable": false, "aTargets": [5]},
                {"bSearchable": false, "aTargets": [6]},
                {"bSearchable": false, "aTargets": [7]}
            ],
            pageLength: 25,
            processing: true,
            serverSide: true,
            ajax: me.url+ '?use_dt=true',
            columns: [
                {
                    data: 'logo', name: 'logo', render: function (logo) {
                        return `<img src="${logo}" class="img-thumbnail" style="max-width: 50px"/>`;
                    }
                },
                {data: 'name', name: 'name'},
                {data: 'code', name: 'code'},
                {data: 'priority', name: 'priority'},
                {
                    data: 'is_shipping_cost_on', name: 'is_shipping_cost_on',
                    render: function (data) {
                        return data === "1";
                    }
                },
                {
                    data: 'is_track_shipment_on', name: 'is_track_shipment_on',
                    render: function (data) {
                        return data === "1";
                    }
                },
                {
                    data: 'is_default', name: 'is_default',
                    render: function (data) {
                        return data === "1";
                    }
                },
                {
                    data: 'id',
                    name: 'id',
                    render: function (id) {
                        return `
                            <a href="/admin/assets/carriers/${id}/edit" style="color: dodgerblue" ><i class="fa fa-edit pull-left" style="margin-right: 30px"></i> </a>
                            <a href="javascript:;" onclick="deleteEvt(${id})" style="color: red"><i class="fa fa-times pull-left"></i> </a>
                        `;
                    }
                }
            ],
            order: [[3, "asc"]]
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
<?php $__env->stopPush(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>