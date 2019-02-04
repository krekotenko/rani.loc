<!-- Page header -->
<form class="form-validate-jquery" enctype="multipart/form-data" method="post"  action="{{route('pages.update',['page'=>$page->id])}}">
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">{{$title}}</span></h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
        <div class="header-elements d-none">
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-success btn-labeled btn-labeled-left btn-lg legitRipple "><b><i class="icon-pin-alt"></i></b>{{__('admin.pages_form_submit_label')}}</button>
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
            <form class="form-validate-jquery" enctype="multipart/form-data" method="post"  action="{{route('pages.update',['page'=>$page->id])}}">
                @method('PUT')
                @csrf
                <fieldset class="mb-3">
                    <legend class="text-uppercase font-size-sm font-weight-bold">{{__('admin.pages_form_common_info')}}</legend>

                    <div  class="form-group row">
                        <label class="col-form-label col-lg-2">{{__('admin.pages_form_title_label')}}<span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="title" required class="form-control" value="{{$page->title}}" placeholder="{{__('admin.pages_form_title_label')}}">
                            </div>
                        </div>
                    </div>

                    <div  class="form-group row">
                        <label class="col-form-label col-lg-2">{{__('admin.pages_form_titleH1_label')}}<span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="titleH1" required class="form-control" value="{{$page->titleH1}}" placeholder="{{__('admin.pages_form_titleH1_label')}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">{{__('admin.pages_form_description_label')}} <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <textarea rows="5" cols="5" name="description" class="form-control" required placeholder="{{__('admin.pages_form_description_label')}}">{{$page->description}}</textarea>
                        </div>
                    </div>

                    <div  class="form-group row">
                        <label class="col-form-label col-lg-2">{{__('admin.pages_form_alias_label')}}<span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input readonly type="text" name="alias" required class="form-control" value="{{$page->alias}}" placeholder="{{__('admin.pages_form_alias_label')}}">
                            </div>
                        </div>
                    </div>
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">{{__('admin.pages_form_text_label')}}</h5>
                    </div>
                    <div class="mb-3">
                        <textarea rows="5" cols="5" name="text" id="text" class="editor" required placeholder="{{__('admin.pages_form_text_label')}}">{!!  $page->text !!}</textarea>
                    </div>

                </fieldset>

                <fieldset class="mb-3">
                    <legend class="text-uppercase font-size-sm font-weight-bold">{{__('admin.pages_form_fields_info')}}</legend>
                    @if($page->datas->where('field_id', '<>', '9'))
                        @foreach($page->datas->where('field_id', '<>', '9') as $data)
                            @if($data->field)
                                <div  class="form-group row">
                                    <label class="col-form-label col-lg-2">{{ $data->title }}<span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <div class="input-group">
                                            <input @if ($data->field->alias !='file') required @endif type="{{ $data->field->alias }}" name="fields[{{ $data->alias }}]" class="form-control" value="{{ $data->value }}" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div  class="form-group row">
                                    @if($data->field->alias == 'file' && $data->value && $data->alias != 'audio_file')
                                        <label class="col-form-label col-lg-2">{{__('admin.pages_form_fields_uploaded_image')}}</label>
                                        <div class="col-lg-10">
                                            <div class="input-group">
                                                <img style="height: 100px;" src="{{ asset('storage/images/pages/'.$data->value) }}">
                                            </div>
                                        </div>
                                    @endif
                                    @if($data->field->alias == 'file' && $data->value && $data->alias == 'audio_file')
                                        <label class="col-form-label col-lg-2">Uploaded audio</label>
                                        <div class="col-lg-10">
                                            <div class="input-group">
                                                <input required type="text" name="" readonly class="form-control" value="{{ $data->value }}" placeholder="Uploaded audio">
                                            </div>
                                        </div>
                                    @endif

                                </div>
                            @endif
                        @endforeach
                        <!-- said lines section -->
                        @foreach($said_lines = $page->multifields('said_lines%')->get() as $key => $data)
                            @if ($key == 0)
                                <div  class="form-group row" data-count ="{{count($said_lines)}}" data-alias = "{{$data->alias}}" data-title = "{{$data->title}}">
                                    <label class="col-form-label col-lg-2">{{ $data->title }}</label>
                                    <div class="col-lg-10">
                                        <div  id='row{{$data->id}}'  class="input-group">
                                            <input type="{{ $data->field->alias }}" name="fields[{{ $data->alias }}]" class="form-control" value="{{ $data->value }}" placeholder="">
                                            <button class="btn btn-light bootstrap-touchspin-up legitRipple btn_add" type="button">+</button>
                                        </div>
                            @else
                                <div id='row{{$data->id}}'  class="input-group">
                                    <input type="{{ $data->field->alias }}" name="fields[{{ $data->alias }}]" class="form-control" value="{{ $data->value }}" placeholder="">
                                    @if ($data->field->alias == 'multiple_input')
                                        <button id="{{$data->id}}" class="btn btn-light bootstrap-touchspin-down legitRipple btn_remove" type="button">–</button>
                                    @endif
                                </div>
                            @endif
                            @if(count($said_lines) == $key+1)
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <!-- what_you_get -->
                        @foreach($what_you_get = $page->multifields('what_you_get%')->get() as $key => $data)
                            @if ($key == 0)
                                <div  class="form-group row"  data-alias = "{{$data->alias}}" data-title = "{{$data->title}}">
                                    <label class="col-form-label col-lg-2">{{ $data->title }}</label>
                                    <div class="col-lg-10">
                                        <div  id='row{{$data->id}}'  class="input-group">
                                            <input type="{{ $data->field->alias }}" name="fields[{{ $data->alias }}]" class="form-control" value="{{ $data->value }}" placeholder="">
                                            <button class="btn btn-light bootstrap-touchspin-up legitRipple btn_add" type="button">+</button>
                                        </div>
                            @else
                                <div id='row{{$data->id}}'  class="input-group">
                                    <input type="{{ $data->field->alias }}" name="fields[{{ $data->alias }}]" class="form-control" value="{{ $data->value }}" placeholder="">
                                    @if ($data->field->alias == 'multiple_input')
                                        <button id="{{$data->id}}" class="btn btn-light bootstrap-touchspin-down legitRipple btn_remove" type="button">–</button>
                                    @endif
                                </div>
                            @endif
                            @if(count($what_you_get) == $key+1)
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <!-- slider_text -->
                        @foreach($slider_texts = $page->multifields('slider_text%')->get() as $key => $data)
                            @if ($key == 0)
                                <div  class="form-group row"  data-alias = "{{$data->alias}}" data-title = "{{$data->title}}">
                                    <label class="col-form-label col-lg-2">{{ $data->title }}</label>
                                    <div class="col-lg-10">
                                        <div  id='row{{$data->id}}'  class="input-group">
                                            <input type="{{ $data->field->alias }}" name="fields[{{ $data->alias }}]" class="form-control" value="{{ $data->value }}" placeholder="">
                                            <button class="btn btn-light bootstrap-touchspin-up legitRipple btn_add" type="button">+</button>
                                        </div>
                            @else
                                <div id='row{{$data->id}}'  class="input-group">
                                    <input type="{{ $data->field->alias }}" name="fields[{{ $data->alias }}]" class="form-control" value="{{ $data->value }}" placeholder="">
                                    @if ($data->field->alias == 'multiple_input')
                                        <button id="{{$data->id}}" class="btn btn-light bootstrap-touchspin-down legitRipple btn_remove" type="button">–</button>
                                    @endif
                                </div>
                            @endif
                            @if(count($slider_texts) == $key+1)
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </fieldset>
                <!-- Testimonials block -->
                @if ($testimonialsAll)
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">Testimonials section</legend>
                            @if (count($testimonials))
                                <?php  ?>
                                @php
                                    $countTestimonials = count($testimonials)
                                @endphp
                                @foreach($testimonials as $key => $testimonialItem)
                                    <div class="form-group">
                                        <label class="d-block">Section {{$testimonialItem->pivot->section_id}} | Position {{$testimonialItem->pivot->position_id}}</label>
                                        <select name='testimonials[]' class="form-control select-fixed-single" data-fouc>
                                            <option value="">Select testimonial</option>
                                            @foreach($testimonialsAll as $testimonial)
                                                <option @if($testimonialItem->id == $testimonial->id) selected @endif value="{{$page->id}}|{{$testimonial->id}}">{{$testimonial->titleH1}}</option>
                                            @endforeach
                                        </select>
                                        @if ($key == 0)
                                            <button class="btn btn-light bootstrap-touchspin-up legitRipple btn_add_test" type="button">+</button>
                                        @else
                                            <button class="btn btn-light bootstrap-touchspin-down legitRipple btn_remove_test" type="button">–</button>
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
                                                <option @if($key == 1) selected @endif value="{{$page->id}}|{{$testimonial->id}}">{{$testimonial->titleH1}}</option>
                                            @endforeach
                                    </select>
                                    <button class="btn btn-light bootstrap-touchspin-up legitRipple btn_add_test" type="button">+</button>
                                    <button class="btn btn-light bootstrap-touchspin-down legitRipple btn_remove_test" type="button">–</button>
                                </div>
                            @endif
                    </fieldset>
                @endif
                <button type="submit" class="btn btn-success btn-labeled btn-labeled-left btn-lg legitRipple "><b><i class="icon-pin-alt"></i></b>{{__('admin.pages_form_submit_label')}}</button>



        </div>
    </div>
    <!-- /input group addons -->

</div>
</form>
<!-- /content area -->
    @if ($testimonialsAll)
        <script>
        var countTestimonials = {{$countTestimonials}};
        var maxTestimonials = {{$maxTestimonials}};
        var position = countTestimonials+1;
            $(document).on('click', '.btn_add_test', function(){
                if(maxTestimonials && countTestimonials == maxTestimonials ) {
                    return false;
                }
                if ((countTestimonials % 12) == 0){
                    position = 1;
                }
                countTestimonials++;
                section_id = Math.ceil(countTestimonials/12);
                var options = '';
                @foreach($testimonialsAll as $testimonial)
                    options += '<option value="{{$page->id}}|{{$testimonial->id}}">{{$testimonial->titleH1}}</option>';
                @endforeach
                var commonDiv =  $(this.closest('.mb-3'));
                var select =  commonDiv.find(".form-group:last");
                select.after('<div class="form-group">'
                                +'<label class="d-block">Section '+section_id+' | Position '+position+'</label>'
                                +'<select name="testimonials[]" class="form-control select-fixed-single" data-fouc>'
                                + options
                                +' </select>'
                                +'<button class="btn btn-light bootstrap-touchspin-down legitRipple btn_remove_test" type="button">–</button>'
                                +'</div>');

                $('.select-fixed-single').select2({
                    minimumResultsForSearch: Infinity,
                    width: 250
                });
                position++;
        });
            $(document).on('click', '.btn_remove_test', function(){
               $(this.closest('.form-group')).remove();
            });
    </script>
    @endif
    <script>
        var i='{{count($said_lines)}}';
        $(document).on('click', '.btn_add', function(){
            var commonDiv = $(this.closest('.form-group'));
            var alias = commonDiv.data('alias');
            var title = commonDiv.data('title');
            var i = commonDiv.find('.input-group').length;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
            var data = { page_id: '{{$page->id}}', field_id: '9',value: '', alias:alias+'_'+i+'', title: title+'_'+i };
            $.ajax({
                url: '/administrator/datas',
                data: data,
                type: 'POST',
                dataType: 'json'
            })
                .done(function (response) {
                    if (response.status == 'success') {
                        commonDiv.find('.input-group').last().after('<div id = "row'+response.id+'" class="input-group">'
                            +'<input type="multiple_input" name="fields['+alias+'_'+i+']" class="form-control" value="" placeholder="">'
                            +'<button id="'+response.id+'" class="btn btn-light bootstrap-touchspin-down legitRipple btn_remove" type="button">–</button>'
                            +'</div>');
                    }
                });
        });
        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id");

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
            $.ajax({
                url: '/administrator/datas/'+button_id,
                data:'',
                type: 'DELETE',
                dataType: 'json'
            })
                .done(function (response) {
                    if (response.status == 'success') {
                        $('#row'+button_id+'').remove();
                    }
                });
        });
    </script>
