@extends('layouts.app')

@section('title', 'Edit Region')

@section('page_title', 'Edit Region')

@section('page_breadcrumb')
@parent
<li>Assets</li>
<li><a href="/admin/assets/regions">Region</a></li>
<li class="active">Edit</li>
@endsection

@section('content')
<div class="row">
    <form method="POST"
          action="/admin/assets/regions/{{ $data['id'] }}"
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
                            </span> Edit Region</a>
                        </div>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <label for="region_id">ID</label>
                                            <input id="region_id"
                                                   value="{{ $data['id'] }}"
                                                   type="text"
                                                   class="form-control"
                                                   placeholder="Region ID"
                                                   readonly/>
                                        </div>
                                        <div class="input-field col s5">
                                            <label for="type">Type</label>
                                            <input id="type"
                                                   name="type"
                                                   value="subdistrict"
                                                   type="text"
                                                   class="form-control"
                                                   placeholder="Type"
                                                   readonly/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="code">Code</label>
                                        <input id="code"
                                               name="code"
                                               value="{{ $data['code'] }}"
                                               type="text"
                                               class="form-control"
                                               placeholder="Code"
                                               required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input id="name"
                                               name="name"
                                               value="{{ $data['name'] }}"
                                               type="text"
                                               class="form-control"
                                               placeholder="Name"
                                               required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="zip">Zip</label>
                                        <input id="zip"
                                               name="zip"
                                               value="{{ $data['zip'] }}"
                                               type="text"
                                               class="form-control"
                                               placeholder="Zip"
                                               />
                                    </div>
                                    <div class="form-group">
                                        <label for="district_id">District ID</label>
                                        <input id="district_id"
                                               name="district_id"
                                               value="{{ $data['district_id'] }}"
                                               type="text"
                                               class="form-control"
                                               placeholder="District ID"
                                               required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="lion_parcel_id">Lion Parcel ID</label>
                                        <input id="lion_parcel_id"
                                               name="lion_parcel_id"
                                               value="{{ $data['lion_parcel_id'] }}"
                                               type="text"
                                               class="form-control"
                                               placeholder="Lion Parcel ID"
                                               required/>
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
                                    <p>
                                        <input type="hidden" name="is_priority" value="off"/>
                                        <input type="checkbox"
                                               name="is_priority"
                                               id="is_priority"
                                            <?= $data['is_priority']
                                                ? 'checked'
                                                : '';
                                            ?>
                                        >
                                        <label for="is_priority">Is Priority</label>
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


