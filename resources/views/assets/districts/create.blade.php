@extends('layouts.app')

@section('title', 'Add Disricts')

@section('page_title', 'Add Disricts')

@section('page_breadcrumb')
@parent
<li>Assets</li>
<li><a href="/admin/assets/regions">Disricts</a></li>
<li class="active">Add</li>
@endsection

@section('content')
<div class="row">
    <form method="POST"
          action="/admin/assets/regions"
          enctype="multipart/form-data">
        @csrf
        <div class="col-md-8">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <a data-toggle="collapse"
                               data-parent="#accordion"
                               href="#collapseOne">
                                <span class="fa fa-edit"></span>
                                Add Disricts
                            </a>
                        </div>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input name="name"
                                               type="text"
                                               class="form-control"
                                               placeholder="Name"
                                               required/>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <label for="code">Code</label>
                                            <input id="code"
                                                   name="code"
                                                   type="text"
                                                   class="form-control"
                                                   placeholder="Code"
                                                   required/>
                                        </div>
                                        <div class="input-field col s6">
                                            <label for="priority">Priority</label>
                                            <input id="priority"
                                                   name="priority"
                                                   type="number"
                                                   class="form-control"
                                                   placeholder="Priority"
                                                   required/>

                                        </div>
                                    </div>
                                    <p>
                                        <input type="checkbox"
                                               name="is_shipping_cost_on"
                                               id="is_shipping_cost">
                                        <label for="is_shipping_cost">Show in Shipping Cost</label>
                                    </p>
                                    <p>
                                        <input type="checkbox"
                                               name="is_track_shipment_on"
                                               id="is_track_shipment">
                                        <label for="is_track_shipment">Show in Track Shipment</label>
                                    </p>
                                    <p>
                                        <input type="checkbox"
                                               name="is_default"
                                               id="is_default">
                                        <label for="is_default">Show Default</label>
                                    </p>
                                    <p>
                                        <input type="checkbox"
                                               name="status"
                                               checked="checked"
                                               id="is_active">
                                        <label for="is_active">Is Active</label>
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit"
                                                class="btn btn-block">
                                            <span class="fa fa-save"></span> Save
                                        </button>
                                    </div>

                                    <div class="form-group">
                                        <label for="image_feature">Logo</label>
                                        <input id="logo_image"
                                               name="logo_image"
                                               class="input-file"
                                               type="file">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection


