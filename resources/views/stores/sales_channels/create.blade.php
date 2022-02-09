@extends('layouts.app')

@section('title', 'Add Sales Channels')

@section('page_title', 'Add Sales Channels')

@section('page_breadcrumb')
@parent
<li>Stores</li>
<li><a href="/admin/stores/sales-channels">Sales Channel</a></li>
<li class="active">Add</li>
@endsection

@section('content')
<div class="row">
    <form method="POST"
          action="/admin/stores/sales-channels"
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
                                Add Sales Channel
                            </a>
                        </div>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input name="channel_name"
                                               type="text"
                                               class="form-control"
                                               required/>
                                        <label class="form-control-placeholder">Sales Channel Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
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