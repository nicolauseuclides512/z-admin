@extends('layouts.app')

@section('title', 'Add Announcements')

@section('page_title', 'Add Announcements')

@section('page_breadcrumb')
@parent
<li>Informations</li>
<li><a href="/admin/ongkir/announcements">Announcements</a></li>
<li class="active">Add</li>
@endsection

@section('content')
<div class="row">
    <form method="POST"
          action="/admin/ongkir/announcements"
          enctype="multipart/form-data">
        @csrf
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-body">
                        <div class="row">
                            <div class="container col-md-12">
                                <div class="container col-md-8">
                                    <div class="form-group">
                                        <input id="title"
                                               name="title"
                                               type="text"
                                               class="form-control"
                                               required/>
                                        <label class="form-control-placeholder">Title</label>
                                    </div>
                                    <div class="form-group">
                                        <label>Image</label>
                                        <div class="input-group">
                                            <div class="input-group-btn">
                                                <div class="btn btn-file">
                                                    Browse… <input name="image"
                                                                   type="file"
                                                                   id="imgInp"
                                                                   required
                                                    />
                                                </div>
                                            </div>
                                            <input type="text"
                                                   class="form-control"
                                                   readonly/>
                                        </div>
                                        <div style="padding-top: 10px">
                                            <img id='img-upload'
                                                 class="img-thumbnail"
                                                 style="max-width: 70%"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input id="target_url"
                                               name="target_url"
                                               type="text"
                                               class="form-control"
                                               />
                                        <label class="form-control-placeholder">Target URL</label>
                                    </div>
                                    <div class="form-group">
                                        <input id="event_name"
                                               name="event_name"
                                               type="text"
                                               class="form-control"/>
                                        <label class="form-control-placeholder">Event Name</label>
                                    </div>
                                </div>
                                <div class="container col-md-4 pull-right">
                                    <div class="most-access">
                                        <div class="col-md-4">
                                            <label>Status</label>
                                        </div>
                                        <div class="col-md-8">
                                            <label class="switch switch_type1 pull-right" role="switch">
                                                <input id="status"
                                                       name="status"
                                                       type="checkbox"
                                                       class="switch__toggle">
                                                <span class="switch__label"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="most-access">
                                        <div class="col-md-4">
                                            <label>Playstore</label>
                                        </div>
                                        <div class="col-md-8">
                                            <label class="switch switch_type1 pull-right" role="switch">
                                                <input id="playstore"
                                                       name="playstore"
                                                       type="checkbox"
                                                       class="switch__toggle">
                                                <span class="switch__label"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="most-access">
                                        <div class="col-md-4">
                                            <label>Exp date</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-inline">
                                                <input type="date"
                                                       name="expired_date"
                                                       id="expired_date"
                                                       required
                                                />

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-2 pull-left">
                        <button id="cancel-btn"
                                type="reset"
                                class="btn btn-block" onClick="javascript:history.go(-1)">
                            <span class="fa fa-chevron-left"></span> cancel
                        </button>
                    </div>
                    <div class="col-md-2 pull-right">
                        <button type="submit"
                                class="btn btn-block">
                            <span class="fa fa-save"></span> Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

@push('js')
<script type="application/javascript">
    let imgTag = $("#img-upload");
    imgTag.hide();

    $(function () {
        $(document).on('change', '.btn-file :file', function () {
            imgTag.show();
            let input = $(this),
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [label]);
        });

        $('.btn-file :file').on('fileselect', function (event, label) {

            let input = $(this).parents('.input-group').find(':text'),
                log = label;

            if (input.length) {
                input.val(log);
            } else {
                if (log) alert(log);
            }

        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.onload = function (e) {
                    imgTag.attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function () {
            readURL(this);
        });
    });
</script>
@endpush
