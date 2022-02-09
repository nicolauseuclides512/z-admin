<?php $__env->startSection('title', 'Sales Channels'); ?>

<?php $__env->startSection('page_title', 'Sales Channels'); ?>

<?php $__env->startSection('page_breadcrumb'); ?>
    ##parent-placeholder-496e8e8c4b20239b6c61c5b0fb32d6e862d71ee4##
    <li xmlns:v-bind="http://www.w3.org/1999/xhtml">Stores</li>
    <li class="active">Sales Channels</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-action">
                    <a href="/admin/stores/sales-channels/create"><i class="fa fa-pencil"></i> Add Sales Channels</a>
                </div>
                <div class="card-content">
                    <table class="table table-light table-striped" id="dt_sales_channel">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Logo</th>
                            <th>Channel Name</th>
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
        me.url = '/admin/stores/sales-channels';
        me.csrf = $('meta[name=csrf-token]').attr("content");

        $(function () {
            me.dt = $('#dt_sales_channel').DataTable({
                processing: true,
                serverSide: true,
                ajax: me.url + '?use_dt=true',
                pageLength: 25,
                columns: [
                    {data: 'id', name: 'id',},
                    {data: 'logo', name: 'logo', render: function (logo) {
                            return `<img src="${logo}" class="img-thumbnail" style="max-width: 50px"/>`;
                        }},
                    {data: 'channel_name', name: 'channel_name'},
                    {
                        data: 'id',
                        name: 'id',
                        render: function (id) {
                            return `
                            <a href="/admin/stores/sales-channels/${id}/edit" style="color: dodgerblue" ><i class="fa fa-edit pull-left" style="margin-right: 30px"></i> </a>
                            <a href="javascript:;" onclick="deleteEvt(${id})" style="color: red"><i class="fa fa-times pull-left"></i> </a>
                        `;
                        }
                    }
                ],
                order: [[0, "asc"]]
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