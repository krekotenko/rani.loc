<main class="main-content home-page">
    <section id="first-screen" class="first-screen">
        <div class="first-screen-title">
            <span class="text-with-bg">Be</span> <span id="js-type-it"></span><span class="text-with-bg">now</span>
        </div>
    </section>
    <section class="hi-block flex-block ai-c">
        <img src="{{asset('images/home_page/rani-1.jpg')}}" alt="">
        <div class="hi-block-content">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                 y="0px"
                 viewBox="0 0 253.3 165" style="enable-background:new 0 0 253.3 165;" xml:space="preserve">
                    <style type="text/css">
                        .hi-svg {
                            fill: none;
                            stroke: #000000;
                            stroke-width: 6;
                            stroke-miterlimit: 10;
                        }
                    </style>
                <circle cx="75.3" cy="3.1" r="3.1"/>
                <circle cx="250.3" cy="137.3" r="3"/>
                <path class="hi-svg" d="M75.4,2.7l-57.2,159c-0.1,0.2-0.4,0.2-0.4-0.1c0.1-34.3-3-61.9-12.9-75.2c-0.4-0.5,0-1.2,0.6-1.1
                        c22.6,2.7,62.8-5.4,105.9-14.4c1.5,3.3,63.4-34,36.2-58.5c-18.8-17-62.3,136.3-39.9,143.7c13.9,4.6,38.4-16.1,38.4-16.1"/>
                <path class="hi-svg"
                      d="M142,143.1c23.6-16.8,37.3-28.3,47.9-34.9c4.6,4.4-18.5,29.3-11.8,39.7c6,9.2,33,3.7,72.5-10.8"/>
                <ellipse transform="matrix(0.4633 -0.8862 0.8862 0.4633 40.158 224.2009)" cx="205.2" cy="78.9"
                         rx="9.5" ry="4.3"/>
                </svg>
            <div class="hi-block-title">I’m Rani</div>
            <p>
                A hypnotherapist, coach and life strategist, devoted to helping you have the life you crave. If you
                could uncover a way to be more happy and fulfilled, would you pursue it?
            </p>
            <p>
                By harnessing the incredible power of your mind, I’ll help you unlock the secrets to creating the
                ultimate life of your dreams. Move past limits that have plagued your past, and reach for your
                utmost potential.
            </p>
            <a href="{{route('public-pages',['alias'=>'about'])}}" class="reg-btn">read more</a>
        </div>
    </section>
    <section class="quote-block">
        <blockquote class="wrapper wrapper-967px">
            "My work is about creating immediate and lasting change in your life; creating a deep sense of
            fulfilment, and relief from painful limitations. My unique and powerful strategies will get you where
            you want to be. BE THERE NOW!"
        </blockquote>
    </section>
    <section class="rani-toolkit">
        <div class="wrapper wrapper-967px">
            <div class="toolkit-text">
                My essential toolkit includes coaching, life strategy, psychotherapy, hypnotherapy and good
                old-fashioned life experience. I’ve developed tried-and-tested methods, to instantly create concrete
                outcomes to transform your life.
            </div>
            <a href="{{route('public-pages',['alias'=>'rapid-transformation'])}}" class="reg-btn">read more</a>
        </div>
    </section>
    <section class="hypnotizable-block">
        <div class="wrapper wrapper-967px">
            <div class="hypnotizable-text">
                Only 10% of People are Highly Hypnotizable, Are You One of Them?<br>
                Intelligence and Creativity Magnify Your Chances.
            </div>
        </div>
        <a href="{{route('public-pages',['alias'=>'quiz'])}}" class="reg-btn">take the quiz</a>
    </section>
    @if(!$testimonials->isEmpty())
        <section class="people-reviews">
        <div class="wrapper reviews-wrapper">
            <h2 class="programs-h2 reviews-title">
                What People Are Saying
            </h2>
            <div class="reviews-container flex-block ai-s jc-c">
                @foreach($testimonials as $key => $testimonial)
                    @if ($testimonials->where('pivot.position_id', $key+1)->first())
                        <div class="review-block">
                            @php
                                $imageKey = [
                                    0 => 2,
                                    1 => 3,
                                    2 => 4,
                                    3 => 3,
                                    4 => 5,
                                    5 => 6,

                                ];
                                $clearFix = [
                                    0 => '',
                                    1 => 'clearfix',
                                    2 => '',
                                    3 => 'clearfix',
                                    4 => 'clearfix',
                                    5 => 'clearfix',

                                ];
                                $var = "img_{$imageKey[$key]}";
                            @endphp
                            <div class="review review-{{$key+1}} {{$clearFix[$key]}}">
                                <img class="review-img" src="{{ asset('storage/images/testimonials/'.$testimonials->where('pivot.position_id', $key+1)->first()->$var)}}" alt="">
                                <div class="review-content">
                                    <div class="review-title">
                                        {{$testimonials->where('pivot.position_id', $key+1)->first()->titleH1}}
                                    </div>
                                    <div class="review-text">
                                        {{$testimonials->where('pivot.position_id', $key+1)->first()->short_description}}
                                    </div>
                                    <a data-id="{{$testimonials->where('pivot.position_id', $key+1)->first()->id}}" href="#" class="review-read-more">READ MORE</a>
                                </div>
                            </div>
                            <div class="detailed-review">
                                <div class="dt-content">
                                    <div class="dt-top-content clearfix">
                                        <img class="dt-image" src="{{ asset('storage/images/testimonials/'.$testimonials->where('pivot.position_id', $key+1)->first()->img_7) }}" alt="">
                                        <div class="dt-title"> {{$testimonials->where('pivot.position_id', $key+1)->first()->titleH1}}</div>
                                        <div class="dt-first-text">
                                            {{$testimonials->where('pivot.position_id', $key+1)->first()->description}}
                                        </div>
                                    </div>
                                    <div class="dt-bottom-content">
                                        {!! $testimonials->where('pivot.position_id', $key+1)->first()->text !!}
                                        <div class="dt-name">
                                            {{$testimonials->where('pivot.position_id', $key+1)->first()->client_name}}, {{$testimonials->where('pivot.position_id', 1)->first()->client_position}}
                                        </div>
                                        <div class="dt-place">
                                            {{$testimonials->where('pivot.position_id', $key+1)->first()->location}}
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
            <div class="btn-wrapper-center">
                <a href="{{route('public-client-stories-page')}}" class="reg-btn">read more</a>
            </div>
        </div>
    </section>
    @endif;
    <section class="join-block">
        <div class="wrapper">
            <div class="join-block-text">
                Don’t miss out on becoming part of our inspiring community.
            </div>
            <a href="#" class="reg-btn js-modal-link" modal-taret="signup-modal">JOIN FREE NOW!</a>
        </div>
    </section>
    @if($page->datas)
        <section class="links__block flex-block">
            <a href="{{$page->datas->where('alias','url_page_1')->first()->value}}" class="links__item flex-block" style="background-image: url('{{ asset('storage/images/pages/'.$page->datas->where('alias','path_image_1')->first()->value) }}')">
                <div class="links__item-title">{{$page->datas->where('alias','link_image_1')->first()->value}}</div>
            </a>
            <a href="{{$page->datas->where('alias','url_page_2')->first()->value}}" class="links__item flex-block" style="background-image: url('{{ asset('storage/images/pages/'.$page->datas->where('alias','path_image_2')->first()->value) }}')">
                <div class="links__item-title">{{$page->datas->where('alias','link_image_2')->first()->value}}</div>
            </a>
            <a href="{{$page->datas->where('alias','url_page_3')->first()->value}}" class="links__item flex-block" style="background-image: url('{{ asset('storage/images/pages/'.$page->datas->where('alias','path_image_3')->first()->value) }}')">
                <div class="links__item-title">{{$page->datas->where('alias','link_image_3')->first()->value}}</div>
            </a>
        </section>
    @endif
</main>