@if(!$testimonials->isEmpty())
    <section class="people-reviews">
        <div class="wrapper reviews-wrapper">
            <div class="reviews-container flex-block ai-s jc-c">
                @foreach($testimonials as $key => $testimonial)
                    @php
                        $testimonial = $testimonials->where('pivot.position_id', $key+1)->first()
                    @endphp
                    @if ($testimonial)
                        <div class="review-block">
                            @php
                                $imageKey = [
                                    0 => 2,
                                    1 => 3,
                                    2 => 4,
                                    3 => 3,
                                    4 => 5,
                                    5 => 6,
                                    6 => 3,
                                    7 => 4,
                                    8 => 2,
                                    9 => 5,
                                    10 => 3,
                                    11 => 6,

                                ];
                                $clearFix = [
                                    0 => '',
                                    1 => 'clearfix',
                                    2 => '',
                                    3 => 'clearfix',
                                    4 => 'clearfix',
                                    5 => 'clearfix',
                                    6 => 'clearfix',
                                    7 => '',
                                    8 => '',
                                    9 => 'clearfix',
                                    10 => 'clearfix',
                                    11 => 'clearfix',

                                ];
                                $var = "img_{$imageKey[$key]}";
                            @endphp
                            <div class="review review-{{$key+1}} {{$clearFix[$key]}}">
                                <img class="review-img"
                                     src="{{ asset('storage/images/testimonials/'.$testimonial->$var)}}" alt="">
                                <div class="review-content">
                                    <div class="review-title">
                                        {{$testimonial->titleH1}}
                                    </div>
                                    <div class="review-text">
                                        {{$testimonial->short_description}}
                                    </div>
                                    <a {{$testimonials->where('pivot.position_id', $key+1)->first()->id}} href="#" class="review-read-more">READ MORE</a>
                                </div>
                            </div>
                            <div class="detailed-review">
                                <div class="dt-content">
                                    <div class="dt-top-content clearfix">
                                        <img class="dt-image"
                                             src="{{ asset('storage/images/testimonials/'.$testimonial->img_7) }}"
                                             alt="">
                                        <div class="dt-title"> {{$testimonial->titleH1}}</div>
                                        <div class="dt-first-text">
                                            {{$testimonial->description}}
                                        </div>
                                    </div>
                                    <div class="dt-bottom-content">
                                        {!! $testimonial->text !!}
                                        <div class="dt-name">
                                            {{$testimonial->client_name}}, {{$testimonial->client_position}}
                                        </div>
                                        <div class="dt-place">
                                            {{$testimonial->location}}
                                        </div>
                                    </div>
                                    <div class="dt-close-btn cross js-dt-close">&times;</div>
                                    <div class="dt-close-btn arrow js-dt-close"></div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            @if($section)
            <div class="btn-wrapper-center">
                <button data-uri="{{route('public-get-section',['section' => $section+1])}}" data-section="{{ $section }}" class="transparent_load_more">load more</button>
            </div>
            @endif
        </div>
    </section>
@endif