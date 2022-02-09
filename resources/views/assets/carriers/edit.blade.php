@extends('layouts.app')

@section('title', 'Edit Carrier')

@section('page_title', 'Edit Carrier')

@section('page_breadcrumb')
@parent
<li>Assets</li>
<li><a href="/admin/assets/carriers">Carries</a></li>
<li class="active">Edit</li>
@endsection

@section('content')
<div class="row">
    <form method="POST"
          action="/admin/assets/carriers/{{ $data['id'] }}"
          enctype="multipart/form-data">

        <input type="hidden" name="_method" value="PUT"/>
        @csrf
        <div class="col-md-8">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span
                                    class="fa fa-edit">
                            </span> Edit Carrier</a>
                        </div>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input id="name"
                                               name="name"
                                               value="{{ $data['name'] }}"
                                               type="text"
                                               class="form-control"
                                               placeholder="Code"
                                               required/>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <label for="code">Code</label>
                                            <input id="code"
                                                   name="code"
                                                   value="{{ $data['code'] }}"
                                                   type="text"
                                                   class="form-control"
                                                   placeholder="Code"
                                                   required/>
                                        </div>
                                        <div class="input-field col s6">
                                            <label for="priority">Priority</label>
                                            <input id="priority"
                                                   name="priority"
                                                   value="{{ $data['priority'] }}"
                                                   type="number"
                                                   class="form-control"
                                                   placeholder="Priority"
                                                   required/>

                                        </div>
                                    </div>
                                    <p>
                                        <input type="hidden" name="is_shipping_cost_on" value="off"/>
                                        <input type="checkbox"
                                               name="is_shipping_cost_on"
                                               id="is_shipping_cost"
                                            <?= $data['is_shipping_cost_on']
                                                ? 'checked'
                                                : '';
                                            ?>
                                        >
                                        <label for="is_shipping_cost">Show in Shipping Cost</label>
                                    </p>
                                    <p>
                                        <input type="hidden" name="is_track_shipment_on" value="off"/>
                                        <input type="checkbox"
                                               name="is_track_shipment_on"
                                               id="is_track_shipment"
                                            <?= $data['is_track_shipment_on']
                                                ? 'checked'
                                                : '';
                                            ?>
                                        >
                                        <label for="is_track_shipment">Show in Track Shipment</label>
                                    </p>
                                    <p>
                                        <input type="hidden" name="is_default" value="off"/>
                                        <input type="checkbox"
                                               name="is_default"
                                               id="is_default"
                                            <?= $data['is_default']
                                                ? 'checked'
                                                : '';
                                            ?>
                                        >
                                        <label for="is_default">Show Default</label>
                                    </p>
                                    <p>
                                        <input type="hidden" name="status" value="off"/>
                                        <input type="checkbox"
                                               name="status"
                                               id="is_active"
                                            <?= $data['status']
                                                ? 'checked'
                                                : '';
                                            ?>
                                        >
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
                                        <button type="submit" class="btn btn-block">
                                            <span class="fa fa-save"></span> Update
                                        </button>
                                    </div>

                                    <div class="form-group">
                                        <label for="image_feature">Logo</label>
                                        <input id="logo"
                                               name="logo_image"
                                               class="input-file"
                                               type="file">
                                    </div>
                                    <input type="hidden" name="logo_url" value="{{$data['logo']}}"/>

                                    <img src="{{$data['logo']}}" class="img-thumbnail"/>

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


