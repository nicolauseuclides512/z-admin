@extends('layouts.app')

@section('title', 'Edit Banners')

@section('page_title', 'Edit Banners')

@section('page_breadcrumb')
@parent
<li>Informations</li>
<li><a href="/admin/ongkir/banners">Banners</a></li>
<li class="active">Edit</li>
@endsection

@section('content')
<div class="row">
    <form method="POST"
          action="/admin/ongkir/banners/{{$data['id']}}"
          enctype="multipart/form-data">

        <input type="hidden" name="_method" value="PUT"/>
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
                                               value="{{$data['title']}}"
                                               required/>
                                        <label class="form-control-placeholder">Title</label>
                                    </div>
                                    <div class="form-group">
                                        <label>Image</label>
                                        <div class="input-group">
                                            <div class="input-group-btn">
                                                <div class="btn btn-file"> Browse…
                                                    <input type="file"
                                                           name="image"
                                                           id="imgInp"
                                                    />
                                                </div>
                                            </div>
                                            <input type="text"
                                                   class="form-control"
                                                   name="image_url"
                                                   value="{{ $data['image_url'] }}"
                                                   readonly
                                            />
                                        </div>
                                        <div style="padding-top: 10px">
                                            <img id='img-upload'
                                                 class="img-thumbnail"
                                                 src="{{ $data['image_url'] }}"
                                                 style="max-width: 70%"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input id="target_url"
                                               name="target_url"
                                               type="text"
                                               class="form-control"
                                               value="{{$data['target_url']}}"
                                        />
                                        <label class="form-control-placeholder">Target URL</label>
                                    </div>
                                    <div class="form-group">
                                        <input id="event_name"
                                               name="event_name"
                                               type="text"
                                               class="form-control"
                                               value="{{$data['event_name']}}"/>
                                        <label class="form-control-placeholder">Event Name</label>
                                    </div>
                                </div>
                                <div class="container col-md-3 pull-right">
                                    <div class="most-access">
                                        <div class="col-md-6 pull-left">
                                            <label>Status</label>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="switch switch_type1 pull-right" role="switch">
                                                <input id="status"
                                                       name="status"
                                                       type="checkbox"
                                                       class="switch__toggle"
                                                    <?= $data['status'] ? 'checked' : ''; ?>
                                                >
                                                <span class="switch__label"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="most-access">
                                        <div class="col-md-6 pull-left">
                                            <label>Playstore</label>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="switch switch_type1 pull-right" role="switch">
                                                <input id="playstore"
                                                       name="playstore"
                                                       type="checkbox"
                                                       class="switch__toggle"
                                                    <?= $data['playstore'] ? 'checked' : ''; ?>
                                                >
                                                <span class="switch__label"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="most-access">
                                        <div class="col-md-6 pull-left">
                                            <label>Ord</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input id="sort"
                                                       name="sort"
                                                       type="text"
                                                       class="form-control text-center"
                                                       placeholder="Ord"
                                                       value="{{$data['sort']}}"
                                                       required/>
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
                            <span class="fa fa-chevron-left"></span> Cancel
                        </button>
                    </div>
                    <div class="col-md-2 pull-right">
                        <button type="submit"
                                class="btn btn-block">
                            <span class="fa fa-save"></span> Update
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
    let data = JSON.parse(`<?= json_encode($data); ?>`);
    let imgTag = $("#img-upload");

    if (data.image_url == null)
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
