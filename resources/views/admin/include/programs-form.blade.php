<!-- Page header -->
<form class="form-validate-jquery" enctype="multipart/form-data" method="post"
      action="{{(isset($program)) ? route('programs.update',['id'=>$program->id])  : route('programs.store') }}">
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">{{$title}}</span></h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
            <div class="header-elements d-none">
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success btn-labeled btn-labeled-left btn-lg legitRipple "><b><i
                                    class="icon-pin-alt"></i></b>{{__('admin.pages_form_submit_label')}}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">

        <!-- Input group addons -->
        <div class="card">

            <div class="card-body">

                @if (isset($program))
                    @method('PUT')
                @endif
                @csrf
                <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">Texts on rapid transformation page</legend>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Type</label>
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <input type="text" name="type" required class="form-control"
                                           value="{{$program->type ?? old('type')}}"
                                           placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Title</label>
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <input type="text" name="name" required class="form-control"
                                           value="{{$program->name ?? old('name')}}"
                                           placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Subtitle</label>
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <input type="text" name="tagline" required class="form-control"
                                           value="{{$program->tagline ?? old('tagline')}}"
                                           placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Short description</label>
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <input type="text" name="short_description" required class="form-control"
                                           value="{{$program->short_description ?? old('short_description')}}"
                                           placeholder="">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                <fieldset class="mb-3">
                    <legend class="text-uppercase font-size-sm font-weight-bold">{{__('admin.pages_form_common_info')}}</legend>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Meta title<span
                                    class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="title" required class="form-control"
                                       value="{{$program->title ?? old('title')}}"
                                       placeholder="{{__('admin.pages_form_title_label')}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Meta description<span
                                    class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <textarea rows="5" cols="5" name="description" class="form-control" required
                                      placeholder="{{__('admin.pages_form_description_label')}}">{{ $program->description ?? old('description') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">{{__('admin.pages_form_titleH1_label')}}<span
                                    class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="titleH1" required class="form-control"
                                       value="{{$program->titleH1 ?? old('titleH1') }}"
                                       placeholder="{{__('admin.pages_form_titleH1_label')}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Subtitle</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="subtitle"  class="form-control"
                                       value="{{$program->subtitle ?? old('subtitle')}}"
                                       placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">{{__('admin.pages_form_alias_label')}}<span
                                    class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="alias" class="form-control"
                                       value="{{ $program->alias ?? old('alias') }}"
                                       placeholder="{{__('admin.pages_form_alias_label')}}">
                            </div>
                            @if ($errors->has('alias'))
                                <label class="validation-invalid-label">{{ $errors->first('alias') }}</label>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Banner image</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="file" name="background_img" class="form-control"
                                       value="{{$program->background_img ?? old('background_img')}}" placeholder="">
                            </div>
                        </div>
                        @if (($program->background_img ?? false) && file_exists(public_path().'/storage/images/programs/'.$program->background_img))
                            <label class="col-form-label col-lg-2">{{__('admin.pages_form_fields_uploaded_image')}}</label>
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <img style="height: 100px;"
                                         src="{{ asset('storage/images/programs/'.$program->background_img) }}">
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Short description</h5>
                    </div>
                    <div class="mb-3">
                        <textarea rows="5" cols="5" name="text" id="text" class="editor" required
                                  placeholder="{{__('admin.pages_form_text_label')}}">{{ $program->text ?? old('text') }}</textarea>
                    </div>

                </fieldset>
                <fieldset class="mb-3">
                    <legend class="text-uppercase font-size-sm font-weight-bold">Icon block</legend>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Title</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="icon_block_title" required class="form-control"
                                       value="{{$program->icon_block_title ?? old('icon_block_title')}}" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Item 1 title</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="icon_text_1" class="form-control"
                                       value="{{$program->icon_text_1 ?? old('icon_text_1')}}" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Item 1 Image</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="file" name="icon_1" class="form-control"
                                       value="{{$program->icon_1 ?? old('icon_1')}}" placeholder="">
                            </div>
                        </div>
                        @if (($program->icon_1 ?? false) && file_exists(public_path().'/storage/images/programs/'.$program->icon_1))
                            <label class="col-form-label col-lg-2">{{__('admin.pages_form_fields_uploaded_image')}}</label>
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <img style="height: 100px;"
                                         src="{{ asset('storage/images/programs/'.$program->icon_1) }}">
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Item 2 title</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="icon_text_2" class="form-control"
                                       value="{{$program->icon_text_2 ?? old('icon_text_2')}}" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Item 2 Image</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="file" name="icon_2" class="form-control"
                                       value="{{$program->icon_2 ?? old('icon_2')}}" placeholder="">
                            </div>
                        </div>
                        @if (($program->icon_2 ?? false) && file_exists(public_path().'/storage/images/programs/'.$program->icon_2))
                            <label class="col-form-label col-lg-2">{{__('admin.pages_form_fields_uploaded_image')}}</label>
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <img style="height: 100px;"
                                         src="{{ asset('storage/images/programs/'.$program->icon_2) }}">
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Item 3 title</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="icon_text_3" class="form-control"
                                       value="{{$program->icon_text_3 ?? old('icon_text_3')}}" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Item 3 Image</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="file" name="icon_3" class="form-control"
                                       value="{{$program->icon_3 ?? old('icon_3')}}" placeholder="">
                            </div>
                        </div>
                        @if (($program->icon_3 ?? false) && file_exists(public_path().'/storage/images/programs/'.$program->icon_3))
                            <label class="col-form-label col-lg-2">{{__('admin.pages_form_fields_uploaded_image')}}</label>
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <img style="height: 100px;"
                                         src="{{ asset('storage/images/programs/'.$program->icon_3) }}">
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Item 4 title</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="icon_text_4" class="form-control"
                                       value="{{$program->icon_text_4 ?? old('icon_text_4')}}" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Item 4 Image</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="file" name="icon_4" class="form-control"
                                       value="{{$program->icon_4 ?? old('icon_4')}}" placeholder="">
                            </div>
                        </div>
                        @if (($program->icon_4 ?? false) && file_exists(public_path().'/storage/images/programs/'.$program->icon_4))
                            <label class="col-form-label col-lg-2">{{__('admin.pages_form_fields_uploaded_image')}}</label>
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <img style="height: 100px;"
                                         src="{{ asset('storage/images/programs/'.$program->icon_4) }}">
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Item 5 title</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="icon_text_5" class="form-control"
                                       value="{{$program->icon_text_5 ?? old('icon_text_5')}}" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Item 5 Image</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="file" name="icon_5" class="form-control"
                                       value="{{$program->icon_5 ?? old('icon_5')}}" placeholder="">
                            </div>
                        </div>
                        @if (($program->icon_5 ?? false) && file_exists(public_path().'/storage/images/programs/'.$program->icon_5))
                            <label class="col-form-label col-lg-2">{{__('admin.pages_form_fields_uploaded_image')}}</label>
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <img style="height: 100px;"
                                         src="{{ asset('storage/images/programs/'.$program->icon_5) }}">
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Item 6 title</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="icon_text_6" class="form-control"
                                       value="{{$program->icon_text_6 ?? old('icon_text_6')}}" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Item 6 Image</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="file" name="icon_6" class="form-control"
                                       value="{{$program->icon_6 ?? old('icon_6')}}" placeholder="">
                            </div>
                        </div>
                        @if (($program->icon_6 ?? false) && file_exists(public_path().'/storage/images/programs/'.$program->icon_6))
                            <label class="col-form-label col-lg-2">{{__('admin.pages_form_fields_uploaded_image')}}</label>
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <img style="height: 100px;"
                                         src="{{ asset('storage/images/programs/'.$program->icon_6) }}">
                                </div>
                            </div>
                        @endif
                    </div>
                </fieldset>
                <fieldset class="mb-3">
                    <legend class="text-uppercase font-size-sm font-weight-bold">Who is block</legend>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Item 1 title</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="who_title_1" class="form-control"
                                       value="{{$program->who_title_1 ?? old('who_title_1')}}" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Item 1 text</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="who_text_1" class="form-control"
                                       value="{{$program->who_text_1 ?? old('who_text_1')}}" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Item 2 title</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="who_title_2" class="form-control"
                                       value="{{$program->who_title_2 ?? old('who_title_2')}}" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Item 2 text</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="who_text_2" class="form-control"
                                       value="{{$program->who_text_2 ?? old('who_text_2')}}" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Item 3 title</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="who_title_3" class="form-control"
                                       value="{{$program->who_title_3 ?? old('who_title_3')}}" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Item 3 text</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="who_text_3" class="form-control"
                                       value="{{$program->who_text_3 ?? old('who_text_3')}}" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Item 4 title</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="who_title_4" class="form-control"
                                       value="{{$program->who_title_4 ?? old('who_title_4')}}" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Item 4 text</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="who_text_4" class="form-control"
                                       value="{{$program->who_text_4 ?? old('who_text_4')}}" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Item 5 title</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="who_title_5" class="form-control"
                                       value="{{$program->who_title_5 ?? old('who_title_5')}}" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Item 5 text</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="who_text_5" class="form-control"
                                       value="{{$program->who_text_5 ?? old('who_text_5')}}" placeholder="">
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="mb-3">
                    <legend class="text-uppercase font-size-sm font-weight-bold">Not be a good block</legend>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Item 1 title</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="when_title_1" class="form-control"
                                       value="{{$program->when_title_1 ?? old('when_title_1')}}" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Item 1 text</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="when_text_1" class="form-control"
                                       value="{{$program->when_text_1 ?? old('when_text_1')}}" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Item 2 title</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="when_title_2" class="form-control"
                                       value="{{$program->when_title_2?? old('when_title_2')}}" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Item 2 text</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="when_text_2" class="form-control"
                                       value="{{$program->when_text_2 ?? old('when_text_2')}}" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Item 3 title</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="when_title_3" class="form-control"
                                       value="{{$program->when_title_3?? old('when_title_3')}}" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Item 3 text</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="when_text_3" class="form-control"
                                       value="{{$program->when_text_3 ?? old('when_text_3')}}" placeholder="">
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="mb-3">
                    <legend class="text-uppercase font-size-sm font-weight-bold">Sets block</legend>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Tittle for green block</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="title_green" class="form-control"
                                       value="{{$program->title_green ?? old('title_green')}}" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Item 1 title</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="sets_title_1" class="form-control"
                                       value="{{$program->sets_title_1 ?? old('sets_title_1')}}" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Item 1 text</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="sets_text_1" class="form-control"
                                       value="{{$program->sets_text_1 ?? old('sets_text_1')}}" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Item 2 title</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="sets_title_2" class="form-control"
                                       value="{{$program->sets_title_2 ?? old('sets_title_2')}}" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Item 2 text</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="sets_text_2" class="form-control"
                                       value="{{$program->sets_text_2 ?? old('sets_text_2')}}" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Item 3 title</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="sets_title_3" class="form-control"
                                       value="{{$program->sets_title_3 ?? old('sets_title_3')}}" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Item 3 text</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="sets_text_3" class="form-control"
                                       value="{{$program->sets_text_3 ?? old('sets_text_3')}}" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Item 4 title</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="sets_title_4" class="form-control"
                                       value="{{$program->sets_title_4 ?? old('sets_title_4')}}" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Item 4 text</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="sets_text_4" class="form-control"
                                       value="{{$program->sets_text_4 ?? old('sets_text_4')}}" placeholder="">
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="mb-3">
                    <legend class="text-uppercase font-size-sm font-weight-bold">Button block</legend>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Text</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="button_text" class="form-control"
                                       value="{{$program->button_text ?? old('button_text')}}" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Text in button</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="button_inner_text" class="form-control"
                                       value="{{$program->button_inner_text ?? old('button_inner_text')}}"
                                       placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Url</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="button_link" class="form-control"
                                       value="{{$program->button_link ?? old('button_link')}}" placeholder="">
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="mb-3">
                    <legend class="text-uppercase font-size-sm font-weight-bold">Other data</legend>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Text image 1</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="link_image_1" class="form-control"
                                       value="{{$program->link_image_1 ?? old('link_image_1')}}" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Url image 1</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="url_page_1" class="form-control"
                                       value="{{$program->url_page_1 ?? old('url_page_1')}}" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Image 1</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="file" name="path_image_1" class="form-control"
                                       value="{{$program->path_image_1 ?? old('path_image_1')}}" placeholder="">
                            </div>
                        </div>
                        @if (($program->path_image_1 ?? false) && file_exists(public_path().'/storage/images/programs/'.$program->path_image_1))
                            <label class="col-form-label col-lg-2">{{__('admin.pages_form_fields_uploaded_image')}}</label>
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <img style="height: 100px;"
                                         src="{{ asset('storage/images/programs/'.$program->path_image_1) }}">
                                </div>
                            </div>
                        @endif

                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Text image 2</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="link_image_2" class="form-control"
                                       value="{{$program->link_image_2 ?? old('link_image_21')}}" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Url image 2</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="url_page_2" class="form-control"
                                       value="{{$program->url_page_2 ?? old('url_page_2')}}" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Image 2</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="file" name="path_image_2" class="form-control"
                                       value="{{$program->path_image_2 ?? old('path_image_2')}}" placeholder="">
                            </div>
                        </div>
                        @if (($program->path_image_2 ?? false) && file_exists(public_path().'/storage/images/programs/'.$program->path_image_2))
                            <label class="col-form-label col-lg-2">{{__('admin.pages_form_fields_uploaded_image')}}</label>
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <img style="height: 100px;"
                                         src="{{ asset('storage/images/programs/'.$program->path_image_2) }}">
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Text image 3</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="link_image_3" class="form-control"
                                       value="{{$program->link_image_3 ?? old('link_image_3')}}" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Url image 3</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="url_page_3" class="form-control"
                                       value="{{$program->url_page_3 ?? old('url_page_3')}}" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Image 3</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="file" name="path_image_3" class="form-control"
                                       value="{{$program->path_image_3 ?? old('path_image_3')}}" placeholder="">
                            </div>
                        </div>
                        @if (($program->path_image_3 ?? false) && file_exists(public_path().'/storage/images/programs/'.$program->path_image_3))
                            <label class="col-form-label col-lg-2">{{__('admin.pages_form_fields_uploaded_image')}}</label>
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <img style="height: 100px;"
                                         src="{{ asset('storage/images/programs/'.$program->path_image_3) }}">
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="form-check form-check-inline form-check-right">
                        <label class="form-check-label">Show pop-up on Rapid Transformation page
                            <input type="hidden" name="show_message" value="0">
                            <span><input type="checkbox" name="show_message" value="1" class="form-check-input-styled"
                                         @if((isset($program->show_message) && $program->show_message ==='1') || old('show_message') === '1') checked="checked"
                                         @endif data-fouc=""></span>
                        </label>
                    </div>
                    <div class="form-check form-check-inline form-check-right">
                        <label class="form-check-label">Show calculator
                            <input type="hidden" name="show_calculator" value="0">
                            <span><input type="checkbox" name="show_calculator" value="1"
                                         class="form-check-input-styled"
                                         @if((isset($program->show_calculator) && $program->show_calculator ==='1') || old('show_calculator') === '1') checked="checked"
                                         @endif data-fouc=""></span>
                        </label>
                    </div>

                </fieldset>
                <!-- Testimonials block -->
                @if (isset($testimonialsAll) && isset($program))
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">Testimonials section</legend>
                        @if (count($testimonials))
                            <?php  ?>
                            @php
                                $countTestimonials = count($testimonials)
                            @endphp
                            @foreach($testimonials as $key => $testimonialItem)
                                <div class="form-group">
                                    <label class="d-block">Section {{$testimonialItem->pivot->section_id}} |
                                        Position {{$testimonialItem->pivot->position_id}}</label>
                                    <select name='testimonials[]' class="form-control select-fixed-single" data-fouc>
                                        <option value="">Select testimonial</option>
                                        @foreach($testimonialsAll as $testimonial)
                                            <option @if($testimonialItem->id == $testimonial->id) selected
                                                    @endif value="{{$program->id}}|{{$testimonial->id}}">{{$testimonial->titleH1}}</option>
                                        @endforeach
                                    </select>
                                    @if ($key == 0)
                                        <button class="btn btn-light bootstrap-touchspin-up legitRipple btn_add_test"
                                                type="button">+
                                        </button>
                                    @else
                                        <button class="btn btn-light bootstrap-touchspin-down legitRipple btn_remove_test"
                                                type="button">–
                                        </button>
                                    @endif
                                </div>
                            @endforeach
                        @else
                            @php
                                $countTestimonials = 1
                            @endphp
                            <div class="form-group">
                                <label class="d-block">Section 1 | Position 1</label>
                                <select name='testimonials[]' class="form-control select-fixed-single" data-fouc>
                                    @foreach($testimonialsAll as $key => $testimonial)
                                        <option @if($key == 1) selected
                                                @endif value="{{$program->id}}|{{$testimonial->id}}">{{$testimonial->titleH1}}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-light bootstrap-touchspin-up legitRipple btn_add_test"
                                        type="button">+
                                </button>
                                <button class="btn btn-light bootstrap-touchspin-down legitRipple btn_remove_test"
                                        type="button">–
                                </button>
                            </div>
                        @endif
                    </fieldset>
                @endif
                <button type="submit" class="btn btn-success btn-labeled btn-labeled-left btn-lg legitRipple "><b><i
                                class="icon-pin-alt"></i></b>{{__('admin.pages_form_submit_label')}}</button>


            </div>
        </div>
        <!-- /input group addons -->

    </div>
</form>
<!-- /content area -->

<!-- /content area -->
@if (isset($testimonialsAll) && isset($program))
    <script>
        var countTestimonials = {{$countTestimonials}};
        var position = countTestimonials + 1;
        $(document).on('click', '.btn_add_test', function () {
            if (countTestimonials == 6) {
                return false;
            }
            if ((countTestimonials % 12) == 0) {
                position = 1;
            }
            countTestimonials++;
            section_id = Math.ceil(countTestimonials / 12);
            var options = '';
            @foreach($testimonialsAll as $testimonial)
                options += '<option value="{{$program->id}}|{{$testimonial->id}}">{{$testimonial->titleH1}}</option>';
                    @endforeach
            var commonDiv = $(this.closest('.mb-3'));
            var select = commonDiv.find(".form-group:last");
            select.after('<div class="form-group">'
                + '<label class="d-block">Section ' + section_id + ' | Position ' + position + '</label>'
                + '<select name="testimonials[]" class="form-control select-fixed-single" data-fouc>'
                + options
                + ' </select>'
                + '<button class="btn btn-light bootstrap-touchspin-down legitRipple btn_remove_test" type="button">–</button>'
                + '</div>');

            $('.select-fixed-single').select2({
                minimumResultsForSearch: Infinity,
                width: 250
            });
            position++;
        });
        $(document).on('click', '.btn_remove_test', function () {
            $(this.closest('.form-group')).remove();
        });
    </script>
@endif

