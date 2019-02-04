<!-- Page header -->
<form class="form-validate-jquery" enctype="multipart/form-data" method="post"
      action="{{(isset($testimonial)) ? route('testimonials.update',['id'=>$testimonial->id])  : route('testimonials.store') }}">
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

                @if (isset($testimonial))
                    @method('PUT')
                @endif
                @csrf
                <fieldset class="mb-3">
                    <legend class="text-uppercase font-size-sm font-weight-bold">{{__('admin.pages_form_common_info')}}</legend>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">{{__('admin.pages_form_title_label')}}<span
                                    class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="title" required class="form-control"
                                       value="{{$testimonial->title ?? old('title')}}"
                                       placeholder="{{__('admin.pages_form_title_label')}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Name</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="titleH1" required class="form-control"
                                       value="{{$testimonial->titleH1 ?? old('titleH1')}}"
                                       placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Short description</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="description" required class="form-control"
                                       value="{{$testimonial->description ?? old('description')}}"
                                       placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title">Text after Read more</h6>
                    </div>
                    <div class="mb-3">
                        <textarea rows="5" cols="5" name="text" id="text" class="editor" required
                                  placeholder="">{!! $testimonial->text ?? old('text') !!}</textarea>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Client Name</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="client_name" required class="form-control"
                                       value="{{$testimonial->client_name ?? old('client_name')}}"
                                       placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Client Position</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="client_position" class="form-control"
                                       value="{{$testimonial->client_position ?? old('client_position')}}"
                                       placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Location</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="location" required class="form-control"
                                       value="{{$testimonial->location ?? old('location')}}"
                                       placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Slider image(1440x697)</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="file" name="img_1" class="form-control"
                                       value="{{$testimonial->img_1 ?? old('img_1')}}" placeholder="">
                            </div>
                        </div>
                        @if (($testimonial->img_1 ?? false) && file_exists(public_path().'/storage/images/testimonials/'.$testimonial->img_1))
                            <label class="col-form-label col-lg-2">{{__('admin.pages_form_fields_uploaded_image')}}</label>
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <img style="height: 100px;"
                                         src="{{ asset('storage/images/testimonials/'.$testimonial->img_1) }}">
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Image 1(255x160)</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="file" name="img_2" class="form-control"
                                       value="{{$testimonial->img_2 ?? old('img_2')}}" placeholder="">
                            </div>
                        </div>
                        @if (($testimonial->img_2 ?? false) && file_exists(public_path().'/storage/images/testimonials/'.$testimonial->img_2))
                            <label class="col-form-label col-lg-2">{{__('admin.pages_form_fields_uploaded_image')}}</label>
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <img style="height: 100px;"
                                         src="{{ asset('storage/images/testimonials/'.$testimonial->img_2) }}">
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Image 2(255x340)</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="file" name="img_3" class="form-control"
                                       value="{{$testimonial->img_3 ?? old('img_3')}}" placeholder="">
                            </div>
                        </div>
                        @if (($testimonial->img_2 ?? false) && file_exists(public_path().'/storage/images/testimonials/'.$testimonial->img_3))
                            <label class="col-form-label col-lg-2">{{__('admin.pages_form_fields_uploaded_image')}}</label>
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <img style="height: 100px;"
                                         src="{{ asset('storage/images/testimonials/'.$testimonial->img_3) }}">
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Image 3(255x130)</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="file" name="img_4" class="form-control"
                                       value="{{$testimonial->img_4 ?? old('img_4')}}" placeholder="">
                            </div>
                        </div>
                        @if (($testimonial->img_4 ?? false) && file_exists(public_path().'/storage/images/testimonials/'.$testimonial->img_4))
                            <label class="col-form-label col-lg-2">{{__('admin.pages_form_fields_uploaded_image')}}</label>
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <img style="height: 100px;"
                                         src="{{ asset('storage/images/testimonials/'.$testimonial->img_4) }}">
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Image 4(327x340)</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="file" name="img_5" class="form-control"
                                       value="{{$testimonial->img_5 ?? old('img_5')}}" placeholder="">
                            </div>
                        </div>
                        @if (($testimonial->img_5 ?? false) && file_exists(public_path().'/storage/images/testimonials/'.$testimonial->img_5))
                            <label class="col-form-label col-lg-2">{{__('admin.pages_form_fields_uploaded_image')}}</label>
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <img style="height: 100px;"
                                         src="{{ asset('storage/images/testimonials/'.$testimonial->img_5) }}">
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Image 5(469x439)</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="file" name="img_6" class="form-control"
                                       value="{{$testimonial->img_6 ?? old('img_6')}}" placeholder="">
                            </div>
                        </div>
                        @if (($testimonial->img_6 ?? false) && file_exists(public_path().'/storage/images/testimonials/'.$testimonial->img_6))
                            <label class="col-form-label col-lg-2">{{__('admin.pages_form_fields_uploaded_image')}}</label>
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <img style="height: 100px;"
                                         src="{{ asset('storage/images/testimonials/'.$testimonial->img_6) }}">
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Image 6(256x270)</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="file" name="img_7" class="form-control"
                                       value="{{$testimonial->img_7 ?? old('img_7')}}" placeholder="">
                            </div>
                        </div>
                        @if (($testimonial->img_7 ?? false) && file_exists(public_path().'/storage/images/testimonials/'.$testimonial->img_7))
                            <label class="col-form-label col-lg-2">{{__('admin.pages_form_fields_uploaded_image')}}</label>
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <img style="height: 100px;"
                                         src="{{ asset('storage/images/testimonials/'.$testimonial->img_7) }}">
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="form-check form-check-inline form-check-right">
                        <label class="form-check-label">Show in slider
                            <input type="hidden" name="show_in_slider" value="0">
                            <span><input type="checkbox" name="show_in_slider" value="1" class="form-check-input-styled"
                                         @if((isset($testimonial->show_in_slider) && $testimonial->show_in_slider ==='1') || old('show_in_slider') === '1') checked="checked"
                                         @endif data-fouc=""></span>
                        </label>
                    </div>

                </fieldset>
                <button type="submit" class="btn btn-success btn-labeled btn-labeled-left btn-lg legitRipple "><b><i
                                class="icon-pin-alt"></i></b>{{__('admin.pages_form_submit_label')}}</button>


            </div>
        </div>
        <!-- /input group addons -->

    </div>
</form>
<!-- /content area -->
