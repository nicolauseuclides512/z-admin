<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('page_title', 'Dashboard'); ?>

<?php $__env->startSection('page_breadcrumb'); ?>
##parent-placeholder-496e8e8c4b20239b6c61c5b0fb32d6e862d71ee4##
<li><a href="#">Dashboard</a></li>
<li class="active">Data</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="dashboard-cards">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-4">
            <a href="/admin/ongkir/ro-api-keys" style="text-decoration: none;">
                <div class="card horizontal cardIcon waves-effect waves-dark">
                    <div class="card-image red">
                        <i class="material-icons dp48">lock</i>
                    </div>
                    <div class="card-stacked red">
                        <div class="card-content">
                            <h3 id="key-usage">0</h3>
                        </div>
                        <div class="card-action">
                            <strong>RO KEY USAGE</strong>
                        </div>
                    </div>
                </div>
            </a>

        </div>
        <!--        <div class="col-xs-12 col-sm-6 col-md-3">-->
        <!---->
        <!--            <div class="card horizontal cardIcon waves-effect waves-dark">-->
        <!--                <div class="card-image red">-->
        <!--                    <i class="material-icons dp48">import_export</i>-->
        <!--                </div>-->
        <!--                <div class="card-stacked red">-->
        <!--                    <div class="card-content">-->
        <!--                        <h3 id="key-usage">0</h3>-->
        <!--                    </div>-->
        <!--                    <div class="card-action">-->
        <!--                        <strong>KEY USAGE</strong>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!---->
        <!--        </div>-->
        <!--        <div class="col-xs-12 col-sm-6 col-md-3">-->
        <!--            <div class="card horizontal cardIcon waves-effect waves-dark">-->
        <!--                <div class="card-image orange">-->
        <!--                    <i class="material-icons dp48">shopping_cart</i>-->
        <!--                </div>-->
        <!--                <div class="card-stacked orange">-->
        <!--                    <div class="card-content">-->
        <!--                        <h3>36,540</h3>-->
        <!--                    </div>-->
        <!--                    <div class="card-action">-->
        <!--                        <strong>SALES</strong>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--        <div class="col-xs-12 col-sm-6 col-md-3">-->
        <!--            <div class="card horizontal cardIcon waves-effect waves-dark">-->
        <!--                <div class="card-image blue">-->
        <!--                    <i class="material-icons dp48">equalizer</i>-->
        <!--                </div>-->
        <!--                <div class="card-stacked blue">-->
        <!--                    <div class="card-content">-->
        <!--                        <h3>24,225</h3>-->
        <!--                    </div>-->
        <!--                    <div class="card-action">-->
        <!--                        <strong>PRODUCTS</strong>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--        <div class="col-xs-12 col-sm-6 col-md-3">-->
        <!--            <div class="card horizontal cardIcon waves-effect waves-dark">-->
        <!--                <div class="card-image green">-->
        <!--                    <i class="material-icons dp48">supervisor_account</i>-->
        <!--                </div>-->
        <!--                <div class="card-stacked green">-->
        <!--                    <div class="card-content">-->
        <!--                        <h3>88,658</h3>-->
        <!--                    </div>-->
        <!--                    <div class="card-action">-->
        <!--                        <strong>VISITS</strong>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <!-- /. ROW  -->
        <!--<div class="row">-->
        <!--    <div class="col-xs-12 col-sm-12 col-md-7">-->
        <!--        <div class="cirStats">-->
        <!--            <div class="row">-->
        <!--                <div class="col-xs-12 col-sm-6 col-md-6">-->
        <!--                    <div class="card-panel text-center">-->
        <!--                        <h4>Profit</h4>-->
        <!--                        <div class="easypiechart" id="easypiechart-blue" data-percent="82"><span-->
        <!--                                class="percent">82%</span>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="col-xs-12 col-sm-6 col-md-6">-->
        <!--                    <div class="card-panel text-center">-->
        <!--                        <h4>No. of Visits</h4>-->
        <!--                        <div class="easypiechart" id="easypiechart-red" data-percent="46"><span-->
        <!--                                class="percent">46%</span>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="col-xs-12 col-sm-6 col-md-6">-->
        <!--                    <div class="card-panel text-center">-->
        <!--                        <h4>Customers</h4>-->
        <!--                        <div class="easypiechart" id="easypiechart-teal" data-percent="84"><span-->
        <!--                                class="percent">84%</span>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="col-xs-12 col-sm-6 col-md-6">-->
        <!--                    <div class="card-panel text-center">-->
        <!--                        <h4>Sales</h4>-->
        <!--                        <div class="easypiechart" id="easypiechart-orange" data-percent="55"><span-->
        <!--                                class="percent">55%</span>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>
        <!--    <div class="col-xs-12 col-sm-12 col-md-5">-->
        <!--        <div class="row">-->
        <!--            <div class="col-xs-12">-->
        <!--                <div class="card">-->
        <!--                    <div class="card-image donutpad">-->
        <!--                        <div id="morris-donut-chart"></div>-->
        <!--                    </div>-->
        <!--                    <div class="card-action">-->
        <!--                        <b>Donut Chart Example</b>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>
        <!--</div>-->
        <!---->
        <!--<div class="row">-->
        <!--    <div class="col-md-5">-->
        <!--        <div class="card">-->
        <!--            <div class="card-image">-->
        <!--                <div id="morris-line-chart"></div>-->
        <!--            </div>-->
        <!--            <div class="card-action">-->
        <!--                <b>Line Chart</b>-->
        <!--            </div>-->
        <!--        </div>-->
        <!---->
        <!--    </div>-->
        <!---->
        <!--    <div class="col-md-7">-->
        <!--        <div class="card">-->
        <!--            <div class="card-image">-->
        <!--                <div id="morris-bar-chart"></div>-->
        <!--            </div>-->
        <!--            <div class="card-action">-->
        <!--                <b> Bar Chart Example</b>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!---->
        <!--</div>-->
        <!---->
        <!--<div class="row">-->
        <!--    <div class="col-xs-12">-->
        <!--        <div class="card">-->
        <!--            <div class="card-image">-->
        <!--                <div id="morris-area-chart"></div>-->
        <!--            </div>-->
        <!--            <div class="card-action">-->
        <!--                <b>Area Chart</b>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!---->
        <!--</div>-->
        <!--<div class="row">-->
        <!--    <div class="col-md-12">-->
        <!---->
        <!--    </div>-->
        <!--</div>-->
        <!---->
        <!--<div class="row">-->
        <!--    <div class="col-md-4 col-sm-12 col-xs-12">-->
        <!--        <div class="card">-->
        <!--            <div class="card-action">-->
        <!--                <b>Tasks Panel</b>-->
        <!--            </div>-->
        <!--            <div class="card-image">-->
        <!--                <div class="collection">-->
        <!--                    <a href="#!" class="collection-item">Red<span class="new badge red"-->
        <!--                                                                  data-badge-caption="red">4</span></a>-->
        <!--                    <a href="#!" class="collection-item">Blue<span class="new badge blue"-->
        <!--                                                                   data-badge-caption="blue">4</span></a>-->
        <!--                    <a href="#!" class="collection-item"><span class="badge">1</span>Alan</a>-->
        <!--                    <a href="#!" class="collection-item"><span class="new badge">4</span>Alan</a>-->
        <!--                    <a href="#!" class="collection-item">Alan<span class="new badge blue"-->
        <!--                                                                   data-badge-caption="blue">4</span></a>-->
        <!--                    <a href="#!" class="collection-item"><span class="badge">14</span>Alan</a>-->
        <!--                    <a href="#!" class="collection-item">Custom Badge Captions<span class="new badge"-->
        <!--                                                                                    data-badge-caption="custom caption">4</span></a>-->
        <!--                    <a href="#!" class="collection-item">Custom Badge Captions<span class="badge"-->
        <!--                                                                                    data-badge-caption="custom caption">4</span></a>-->
        <!--                </div>-->
        <!--            </div>-->
        <!---->
        <!--        </div>-->
        <!---->
        <!--    </div>-->
        <!--    <div class="col-md-8 col-sm-12 col-xs-12">-->
        <!--        <div class="card">-->
        <!--            <div class="card-action">-->
        <!--                <b>User List</b>-->
        <!--            </div>-->
        <!--            <div class="card-image">-->
        <!--                <ul class="collection">-->
        <!--                    <li class="collection-item avatar">-->
        <!--                        <i class="material-icons circle green">track_changes</i>-->
        <!--                        <span class="title">Title</span>-->
        <!--                        <p>First Line <br>-->
        <!--                            Second Line-->
        <!--                        </p>-->
        <!--                        <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>-->
        <!--                    </li>-->
        <!--                    <li class="collection-item avatar">-->
        <!--                        <i class="material-icons circle">folder</i>-->
        <!--                        <span class="title">Title</span>-->
        <!--                        <p>First Line <br>-->
        <!--                            Second Line-->
        <!--                        </p>-->
        <!--                        <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>-->
        <!--                    </li>-->
        <!--                    <li class="collection-item avatar">-->
        <!--                        <i class="material-icons circle green">track_changes</i>-->
        <!--                        <span class="title">Title</span>-->
        <!--                        <p>First Line <br>-->
        <!--                            Second Line-->
        <!--                        </p>-->
        <!--                        <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>-->
        <!--                    </li>-->
        <!--                    <li class="collection-item avatar">-->
        <!--                        <i class="material-icons circle red">play_arrow</i>-->
        <!--                        <span class="title">Title</span>-->
        <!--                        <p>First Line <br>-->
        <!--                            Second Line-->
        <!--                        </p>-->
        <!--                        <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>-->
        <!--                    </li>-->
        <!--                </ul>-->
        <!--            </div>-->
        <!--        </div>-->
        <!---->
        <!---->
        <!--    </div>-->
        <!--</div>-->
        <!--<div class="fixed-action-btn horizontal click-to-toggle">-->
        <!--    <a class="btn-floating btn-large red">-->
        <!--        <i class="material-icons">menu</i>-->
        <!--    </a>-->
        <!--    <ul>-->
        <!--        <li><a class="btn-floating red"><i class="material-icons">track_changes</i></a></li>-->
        <!--        <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>-->
        <!--        <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>-->
        <!--        <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>-->
        <!--    </ul>-->
        <!--</div>-->

        <?php $__env->stopSection(); ?>


        <?php $__env->startPush('js'); ?>
        <script type="text/javascript">
            let me = {};
            me.url = '/admin';
            me.csrf = $('meta[name=csrf-token]').attr("content");

            $(document).ready(function () {
                getTotalKeyUsage();
            });

            let getTotalKeyUsage = function () {
                $.ajax({
                    url: me.url + '/ongkir/ro-api-keys/total-usage',
                    context: document.body
                }).done(function (resp) {
                    console.info(arguments);
                    $('#key-usage').text(resp.data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
                });
            };
        </script>
        <?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>