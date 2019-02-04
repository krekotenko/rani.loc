<main class="main-content rt-main-content">
    <section id="first-screen" class="first-screen first-screen-questions rt-main-header" style="background-image: url('{{ asset('storage/images/pages/'.$page->datas->where('alias','banner_image')->first()->value) }}">
        <div class="wrapper">
            <div class="content">
                <h1>{{$page->titleH1}}</h1>
                {!! $page->text !!}
            </div>
        </div>

    </section>
    <section class="questions">
        <div class="wrapper">
            <h2>
                Have you ever said ANYTHING along <br>
                the lines of…
            </h2>
            <div class="question-exaples clearfix">
                @foreach($said_lines = $page->multifields('said_lines%')->get() as $key => $data)
                    <div class="question-quote">
                       {{$data->value}}
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="rt-programs">
        <div class="wrapper wrapper_min">
            <h2>Programs</h2>

            <div class="programs-list flex-block">
                @foreach($programs as $program)
                    <a href="{{route('public-programs',['alias' => $program->alias])}}" class="program-item @if ($program->show_message) js-modal-link @endif" @if ($program->show_message) modal-taret="message-me-modal" @endif>
                        <div class="program-type">{{$program->type}}</div>
                        <div class="program-name">{{$program->name}}</div>
                        <div class="program-tagline">{{$program->tagline}}</div>
                        <p class="description">
                            {{$program->short_description}}
                        </p>
                        <div class="read-more-btn"> @if ($program->show_message) Message me @else Read more  @endif</div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    <section class="rt-about">
        <div class="wrapper">

            <p class="text">
                {{$page->datas->where('alias','text_1')->first()->value}}
            </p>
            <p class="solution">
                {{$page->datas->where('alias','text_2')->first()->value}}
            </p>
            <p class="text">
                {{$page->datas->where('alias','text_3')->first()->value}}
            </p>
        </div>
    </section>
    <section class="rt-magic">
        <div class="wrapper">
            <p class="text">
                It’s almost like waving a magic wand, suddenly turning all your personal barriers into dust.
            </p>
        </div>
    </section>
    <section class="rt-you-will-get">
        <div class="wrapper">
            <h2>What you’ll get is…</h2>
            <div class="skills-list flex-block">
                @foreach($said_lines = $page->multifields('what_you_get%')->get() as $key => $data)
                    @if ($key == 0)
                        <ol class="left-list">
                    @endif
                    <li>
                        <div class="hexagon"><span class="top"></span><span class="bottom"></span></div>
                        <span class="text">
                                {{$data->value}}
                            </span>
                    </li>
                    @if ($key == 4)
                        </ol>
                        <ol class="right-list">
                    @endif
                    @if ($key+1 == count($said_lines))
                        </ol>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <section class="rt-steps">
        <h2>How it works</h2>
        <div class="steps-list flex-block jc-c">
            <div class="step">
                <div class="step-number">1</div>
                <div class="step-name">DISCOVER</div>
                <p class="step-description">
                    {{$page->datas->where('alias','how_it_works_1')->first()->value}}
                </p>
            </div>
            <div class="step">
                <div class="step-number">2</div>
                <div class="step-name">REmedy</div>
                <p class="step-description">
                    {{$page->datas->where('alias','how_it_works_2')->first()->value}}
                </p>
            </div>
            <div class="step">
                <div class="step-number">3</div>
                <div class="step-name">TRANSFORM</div>
                <p class="step-description">
                    {{$page->datas->where('alias','how_it_works_3')->first()->value}}
                </p>
            </div>
            <div class="step">
                <div class="step-number">4</div>
                <div class="step-name">INTEGRATE</div>
                <p class="step-description">
                    {{$page->datas->where('alias','how_it_works_4')->first()->value}}
                </p>
            </div>
        </div>
    </section>
    <section class="rt-quote">
        <div class="wrapper">
            <blockquote> {{$page->datas->where('alias','change_thoughts')->first()->value}}</blockquote>
            <a href="#" class="facebook">
                <svg version="1.1" id="facebook-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve">
                        <path class="st0" d="M16,0c8.8,0,16,7.2,16,16c0,8.8-7.2,16-16,16S0,24.8,0,16C0,7.2,7.2,0,16,0z"/>
                    <path class="st1" d="M17.9,11H20V8h-2.4v0C14.6,8.1,14,9.7,14,11.5h0V13h-2v3h2v8h3v-8h2.5l0.5-3H17v-0.9C17,11.5,17.4,11,17.9,11z"
                    />
                    </svg>
            </a>
            <a href="#" class="twitter">
                <svg version="1.1" id="twitter-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve">
                        <g>
                            <g id="Twitter_1_">
                                <g id="Twitter">
                                    <circle id="BG" class="st0" cx="16" cy="16" r="16"/>
                                    <path id="Bird" class="st1" d="M22.1,12.1c0.7-0.4,1.2-1.1,1.4-1.8c-0.6,0.4-1.3,0.6-2.1,0.8c-0.6-0.6-1.5-1-2.4-1
                                        c-1.8,0-3.3,1.5-3.3,3.3c0,0.3,0,0.5,0.1,0.7c-2.7-0.1-5.2-1.4-6.8-3.4c-0.3,0.5-0.4,1.1-0.4,1.7c0,1.1,0.6,2.1,1.5,2.7
                                        c-0.5,0-1-0.2-1.5-0.4l0,0c0,1.6,1.1,2.9,2.6,3.2c-0.2,0-0.5,0.1-0.8,0.1c-0.2,0-0.4,0-0.6-0.1c0.4,1.3,1.6,2.3,3.1,2.3
                                        c-1.1,0.9-2.5,1.4-4.1,1.4c-0.3,0-0.5,0-0.8,0c1.4,0.9,3,1.4,4.7,1.5h0.8c5.7-0.3,8.9-5.1,8.9-9.3c0-0.1,0-0.3,0-0.4
                                        c0.6-0.5,1.2-1,1.6-1.7l0,0C23.4,11.8,22.8,12,22.1,12.1z"/>
                                </g>
                            </g>
                        </g>
                    </svg>
            </a>
        </div>
    </section>
    <section class="rt-slider">
        <div class="slick-slider">
            @foreach($slider_text = $page->multifields('slider_text%')->get() as $key => $data)
                @php
                    $words = explode('_',$data->value);
                @endphp
                <div class="slide-item">
                    <blockquote>
                        {!!isset($words[0]) ? $words[0] : ''!!}
                    </blockquote>
                    <div class="whose-quote">
                        {!!isset($words[1]) ? $words[1] : ''!!}
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <section class="rt-FAQ">
        <div class="wrapper">
            <h2>FAQ</h2>
            <div class="accordeon">
                @foreach ($faqs as $key => $faq)
                    <dl>
                        <dt @if($key == 1)  class="active" @endif><span>{{$faq->title}}</span></dt>
                        <dd>
                            {!! $faq->text !!}
                        </dd>
                    </dl>

                @endforeach
            </div>
        </div>
    </section>
    <section class="links__block flex-block">
        <a href="{{$page->datas->where('alias','url_page_1')->first()->value}}" class="links__item flex-block" style="background-image: url('{{ asset('storage/images/pages/'.$page->datas->where('alias','path_image_1')->first()->value) }}')">
            <div class="links__item-title">{{$page->datas->where('alias','link_image_1')->first()->value}}</div>
        </a>
        <a href="{{$page->datas->where('alias','url_page_2')->first()->value}}" class="links__item flex-block" style="background-image: url('{{ asset('storage/images/pages/'.$page->datas->where('alias','path_image_2')->first()->value) }}')">
            <div class="links__item-title">{{$page->datas->where('alias','link_image_2')->first()->value}}</div>
        </a>
        <a href="{{$page->datas->where('alias','url_page_3')->first()->value}}" class="links__item flex-block " style="background-image: url('{{ asset('storage/images/pages/'.$page->datas->where('alias','path_image_3')->first()->value) }}')">
            <div class="links__item-title">{{$page->datas->where('alias','link_image_3')->first()->value}}</div>
        </a>
    </section>
</main>