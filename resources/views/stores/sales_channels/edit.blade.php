@extends('layouts.app')

@section('title', 'Edit Sales Channels')

@section('page_title', 'Edit Sales Channels')

@section('page_breadcrumb')
@parent
<li>Stores</li>
<li><a href="/admin/stores/sales-channels">Sales Channels</a></li>
<li class="active">Edit</li>
@endsection

@section('content')
<div class="row">
    <form method="POST"
          action="/admin/stores/sales-channels/{{ $data['id'] }}"
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
                            </span> Edit Sales Channel</a>
                        </div>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="channel_name">sales Channel Name</label>
                                        <input id="channel_name"
                                               name="channel_name"
                                               value="{{ $data['channel_name'] }}"
                                               type="text"
                                               class="form-control"
                                               placeholder="Sales Channel Name"
                                               required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
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