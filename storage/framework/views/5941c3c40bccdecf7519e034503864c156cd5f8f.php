<?php $__env->startSection('title', 'Regions'); ?>

<?php $__env->startSection('page_title', 'Regions'); ?>

<?php $__env->startSection('page_breadcrumb'); ?>
##parent-placeholder-496e8e8c4b20239b6c61c5b0fb32d6e862d71ee4##
<li xmlns:v-bind="http://www.w3.org/1999/xhtml">Assets</li>
<li class="active">Region</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row" id="region_id" v-cloak>
    <div class="col-md-12">
        <!--   Kitchen Sink -->
        <div class="card">
            <div class="card-action">
                <a href="/admin/assets/regions/create"><i class="fa fa-pencil"></i> Add Regions</a>
                <input class="right" type="text" v-on:input="search" v-model="meta.q" placeholder="Search"
                       style="width: 30%"/>

            </div>
            <div class="card-content">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Priority</th>
                            <th>District</th>
                            <th>LPID</th>
                            <th>Status</th>
                            <th>Code</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="region in regions">
                            <td>{{ region.id }}</td>
                            <td>{{ region.name }}</td>
                            <td>{{ region.type }}</td>
                            <td>{{ region.is_priority }}</td>
                            <td>{{ region.district_id }}</td>
                            <td>{{ region.lion_parcel_id }}</td>
                            <td>{{ region.status }}</td>
                            <td>{{ region.code }}</td>
                            <td>
                                <a v-bind:href="'/admin/assets/regions/'+region.id+'/edit'"
                                   style="color: dodgerblue"><i
                                        class="fa fa-edit pull-left" style="margin-right: 30px"></i> </a>
                                <a href="javascript:;" v-on:click="remove(region.id)" style="color: red"><i
                                        class="fa fa-times pull-left"></i> </a>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                    <div class="clearfix"></div>
                    <p class="pull-left">
                        Showing {{ paginate.current_page }} to {{ paginate.last_page }} of {{ paginate.total }}
                    </p>
                    <ul class="pagination pagination-sm pull-right">
                        <li v-bind:class="meta.page > 1 ?'':'disabled'">
                            <a href="javascript:;"
                               v-on:click="setPage(paginate.current_page - 1)">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                        </li>
                        <!--                        <li v-bind:class="paginate.current_page === i ? 'active':''"-->
                        <!--                            v-for="i in paginate.current_page + 2" v-if="paginate.current_page > i + 2 ">-->
                        <!--                            <a href="javascript:;" v-on:click="setPage(i)"> {{ i }}</a>-->
                        <!--                        </li>-->
                        <li v-bind:class="paginate.has_more_pages ?'':'disabled'">
                            <a href="javascript:;"
                               v-on:click="setPage(paginate.current_page + 1)">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
        <!-- End  Kitchen Sink -->
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>

<script type="text/javascript">
    let me = {};
    me.url = '/admin/assets/regions';
    me.csrf = $('meta[name=csrf-token]').attr("content");

    new Vue({
        el: '#region_id',
        data() {
            return {
                regions: null,
                meta: {
                    q: '',
                    page: 1,
                    per_page: 25,
                    filter: 'all',
                    sort: 'id.asc',
                    total: 0,

                },
                paginate: {
                    count: '',
                    current_page: 1,
                    current_page_url: "",
                    has_more_pages: true,
                    last_page: 0,
                    next_page_url: "",
                    per_page: 0,
                    prev_page_url: "",
                    total: 0,
                }
            }
        },
        mounted() {
            this.fetch();
        },
        methods: {
            fetch: function () {
                axios
                    .get(me.url + "?_token=" + me.csrf + `&q=${this.meta.q}&page=${this.meta.page}&per_page=${this.meta.per_page}&filter=${this.meta.filter}&sort=${this.meta.sort}`)
                    .then(response => {
                        if (response.status === 200 && response.data.code === 200) {
                            this.regions = response.data.data;
                            this.paginate = response.data.paginate;
                        }

                    })

                console.info(this.paginate);
            },
            setPage: function (page) {
                this.meta.page = page;
                this.fetch();
            },
            search: function () {
                if (this.meta.q.length > 2 || this.meta.q.length < 1)
                    this.fetch();
            },
            remove: function (id) {
                swal("Do you want to remove this data?", {
                    buttons: {
                        no: 'No',
                        yes: 'Yes',
                    },
                }).then((value) => {
                    switch (value) {
                        case "yes":
                            axios
                                .delete(me.url + "/" + id + '?_token=' + me.csrf)
                                .then(response => {
                                    if (response.status === 200 && response.data.code === 200)
                                        this.fetch();
                                });
                            break;
                        default:
                            console.log("Got away safely!");
                    }
                });
            }
        }
    });
</script>
<?php $__env->stopPush(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>