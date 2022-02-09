<?php $__env->startSection('title', 'Users'); ?>

<?php $__env->startSection('page_title', 'Users'); ?>

<?php $__env->startSection('page_breadcrumb'); ?>
##parent-placeholder-496e8e8c4b20239b6c61c5b0fb32d6e862d71ee4##
<li class="active">Users</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row" id="user_id" v-cloak>
    <div class="col-md-12">
        <!--   Kitchen Sink -->
        <div class="card">
            <div class="card-action">
              <select v-model="selected" @change="onChange($event)" style="display:inline;">
                <option value="all">Status All</option>
                <option value="active">Status Active</option>
                <option value="inactive">Status Inactive</option>
              </select>

                <input class="right"
                       type="text"
                       v-on:input="search"
                       v-model="meta.q"
                       placeholder="Search"
                       style="width: 30%"/>
            </div>
            <div class="clearfix"></div>
            <div class="card-content">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Created Date</th>
                            <th>Status</th>
                            <th>ID</th>
                            <th>Email</th>
                            <th>No Telephone</th>
                            <th>Username</th>
                            <th>Last LogIn</th>
                            <th>Access</th>
                            <th>Provider</th>
                        </tr>
                        </thead>
                        <tbody>
                        <template v-for="(user,i) in users">
                            <tr data-toggle="collapse"
                                v-bind:data-target="'#accordion-'+i"
                                class="clickable"
                                v-bind:class="{ status: user.status}"
                                style="cursor:pointer;">
                                <td>{{ (i + 1) + ((paginate.current_page -1) * meta.per_page) }}</td>
                                <td class="col-width-100">{{ user.created_at | datetime }}</td>
                                <td class="align-middle">
                                  <span v-if='user.status === true'>
                                    <i class="far fa-check-square"></i>
                                  </span>
                                  <span v-else>
                                    <i class="far fa-minus-square"></i>
                                  </span>
                                </td>
                                <td>{{ user.id }}</td>
                                <td>{{ user.email }}</td>
                                <td class="col-width-100">
                                  <span v-for="org in user.organizations">
                                      {{ org.phone }}
                                  </span>
                                </td>
                                <td>{{ user.username }}</td>
                                <td class="col-width-100">
                                  <span v-if='user.last_seen != null'>
                                    {{ user.last_seen | datetimeTimeStamp  }}
                                  </span>
                                </td>
                                <td>{{ user.access_type }}</td>
                                <td>
                                    <span v-for="(pro, j) in user.provider">
                                        <span v-if="j >= 1">
                                            , {{ pro | capitalize }}
                                        </span>
                                        <span v-else>
                                            {{ pro | capitalize }}
                                        </span>
                                    </span>
                                </td>
                            </tr>
                            <tr v-bind:id="'accordion-'+i" class="collapse" style="background: #eef8fb;">
                                <td colspan="7">
                                    <div class="title"
                                         style="text-decoration: underline; text-align: center;font-weight: bold">
                                        Organizations
                                    </div>
                                    <br/>
                                    <table class="table table-striped table-bordered" style="font-size: 9pt">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Application</th>
                                            <th>Role</th>
                                            <th>Portal</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="org in user.organizations">
                                            <td>{{ org.name }}</td>
                                            <td>{{ org.application }}</td>
                                            <td>{{ org.role }}</td>
                                            <td>{{ org.portal }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </template>
                        </tbody>
                    </table>
                    <div class="clearfix"></div>
                    <p class="pull-left">
                        Showing {{ (paginate.current_page - 1) * paginate.per_page + 1 }} to {{ paginate.current_page
                        * paginate.per_page - (paginate.per_page - paginate.count) }} of {{ paginate.total }}
                    </p>
                    <ul class="pagination pagination-sm pull-right">
                        <li v-bind:class="meta.page > 1 ?'':'disabled'">
                            <a href="javascript:;"
                               v-on:click="setPage(paginate.current_page - 1)">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                        </li>
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

<?php $__env->startPush('css'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap.min.css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<style>
    .dataTables_info {
        float: left;
        margin-right: 10px;
        text-align: center;
        line-height: 10px;
    }

    .grid-striped .row:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, .05);
    }

    .border {
        border: 1px solid #d8d0d0;
    }

    .table-bordered tbody tr td{
      border: 1px solid #bcb8b8;
    }

    .align-middle {
      text-align: center;
    }

    .col-width-100 {
      width: 100px;
    }

    .clickable {
      background-color: #ebeef0 !important;
    }

    .status {
      background-color: #bcf7cb !important;
    }

    @media (min-width: 1200px)
        .container {
            width: 0 !important;
        }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>

<script type="text/javascript">
    let me = {};
    me.url = '/admin/accounts/users';
    me.csrf = $('meta[name=csrf-token]').attr("content");

    Vue.filter('capitalize', function (value) {
        if (!value) return ''
        value = value.toString()
        return value.charAt(0).toUpperCase() + value.slice(1)
    });

    Vue.filter('datetime', function (value) {
        if (!value) return ''
        timestamp = new Date(value * 1000)
        tanggal = timestamp.getDate()
        tanggal_string = tanggal.toString()
        tahun = timestamp.getFullYear()
        jam = timestamp.getHours()
        menit = timestamp.getMinutes()
        bulan_bulan = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"]
        bulan = bulan_bulan[timestamp.getMonth()]
        final = tanggal_string.concat(" ", bulan, " ", tahun, " ", jam, ".", menit, " ", "WIB")
        return final
    });

    Vue.filter('datetimeTimeStamp', function (value) {
        if (!value) return ''
        timestamp = new Date(value)
        tanggal = timestamp.getDate()
        tanggal_string = tanggal.toString()
        tahun = timestamp.getFullYear()
        jam = timestamp.getHours()
        menit = timestamp.getMinutes()
        bulan_bulan = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"]
        bulan = bulan_bulan[timestamp.getMonth()]
        final = tanggal_string.concat(" ", bulan, " ", tahun, " ", jam, ".", menit, " ", "WIB")
        return final
    });

    new Vue({
        el: '#user_id',
        data() {
            return {
                users: null,
                meta: {
                    q: '',
                    page: 1,
                    per_page: 100,
                    filter: 'all',
                    sort: 'created_at.desc',
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
                },
                selected: 'all'
            }
        },
        mounted() {
            this.fetch();
        },
        methods: {
            fetch: function () {
              r = encodeURIComponent(this.meta.q);
                axios
                    .get(me.url
                        + "?_token="
                        + me.csrf
                        + `&q=${r}&page=${this.meta.page}&per_page=${this.meta.per_page}&filter=${this.meta.filter}&sort=${this.meta.sort}`)
                    .then(response => {
                        if (response.status === 200 && response.data.code === 200) {
                            console.info(response.data)
                            this.users = response.data.data;
                            this.paginate = response.data.paginate;
                        }
                    })
            },
            setPage: function (page) {
                this.meta.page = page;
                this.fetch();
            },
            search: function () {
                if (this.meta.q.length > 2 || this.meta.q.length < 1)
                    this.fetch();
            },
            onChange(event) {
                this.meta.filter = event.target.value;
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