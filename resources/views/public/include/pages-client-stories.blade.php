<main class="main-content testimonials">
    <section class="testimonials-slider js-testimonials-slider">
        @foreach($testimonialsForSlider as $item)
            <div class="testimonials-slide-item">
                <div id="first-screen" class="first-screen first-screen-697 flex-block ai-e"
                     style="background-image: url('{{ asset('storage/images/testimonials/'.$item->img_1) }}')">
                    <div class="wrapper">
                        <div class="fs-program-content">
                            <div class="fs-program-title">
                                {{$item->titleH1}}
                            </div>
                            <div class="fs-program-text">
                                <p>
                                    {{$item->description}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
    <section class="add-story-block">
        <div class="wrapper">
            <div class="add-story-text">
                I'd love to share your story
            </div>
            <div class="add-story-btn reg-btn js-modal-link" modal-taret="add-story-modal">Add your story</div>
        </div>
    </section>

    {!! $testimonialsPart !!}

    <section class="testimonials-fs">
        <div class="wrapper">
            <div class="tfs-text">
                Don’t wait any longer to break through the obstacles that have kept you from happiness.
            </div>
            <a href="{{route('public-pages',['alias' => 'free-30-minutes'])}}" class="simple-btn white-btn">book free
                session now</a>
        </div>
    </section>
    <section class="audio-recording">
        <div class="wrapper">
            <div class="ar-container">
                <div class="ar-title">
                    {{$page->datas->where('alias','audio_title')->first()->value}}
                </div>
                <div class="ar-text">
                    {{$page->datas->where('alias','audio_description')->first()->value}}
                </div>
                <div class="audio green-audio-player">
                    <div class="play-pause-btn" style="display: block">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="12" viewBox="0 0 18 24">
                            <path fill="#FAFDFF" fill-rule="evenodd" d="M18 12L0 24V0" class="play-pause-icon"
                                  id="playPause"/>
                        </svg>
                    </div>

                    <div class="controls">
                        <span class="current-time">0:00</span>
                        <div class="slider" data-direction="horizontal">
                            <div class="progress">
                                <div class="pin" id="progress-pin" data-method="rewind"></div>
                            </div>
                        </div>
                        <span class="total-time">0:00</span>
                    </div>

                    <div class="volume">
                        <div class="volume-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="14" viewBox="0 0 24 24">
                                <path fill="#FAFDFF" fill-rule="evenodd"
                                      d="M14.667 0v2.747c3.853 1.146 6.666 4.72 6.666 8.946 0 4.227-2.813 7.787-6.666 8.934v2.76C20 22.173 24 17.4 24 11.693 24 5.987 20 1.213 14.667 0zM18 11.693c0-2.36-1.333-4.386-3.333-5.373v10.707c2-.947 3.333-2.987 3.333-5.334zm-18-4v8h5.333L12 22.36V1.027L5.333 7.693H0z"
                                      id="speaker"/>
                            </svg>
                        </div>
                        <div class="volume-controls hidden">
                            <div class="slider" data-direction="vertical">
                                <div class="progress">
                                    <div class="pin" id="volume-pin" data-method="changeVolume"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <audio crossorigin>
                        <source src="{{asset('storage/audio/'.$page->datas->where('alias','audio_file')->first()->value)}}"
                                type="audio/mpeg">
                    </audio>
                </div>
                <div class="ar-post-scriptum">
                    {{$page->datas->where('alias','audio_author')->first()->value}}
                </div>
            </div>
        </div>
    </section>
    <section class="links__block flex-block">
        <a href="{{$page->datas->where('alias','url_page_1')->first()->value}}" class="links__item flex-block"
           style="background-image: url('{{ asset('storage/images/pages/'.$page->datas->where('alias','path_image_1')->first()->value) }}')">
            <div class="links__item-title">{{$page->datas->where('alias','link_image_1')->first()->value}}</div>
        </a>
        <a href="{{$page->datas->where('alias','url_page_2')->first()->value}}" class="links__item flex-block"
           style="background-image: url('{{ asset('storage/images/pages/'.$page->datas->where('alias','path_image_2')->first()->value) }}')">
            <div class="links__item-title">{{$page->datas->where('alias','link_image_2')->first()->value}}</div>
        </a>
        <a href="{{$page->datas->where('alias','url_page_3')->first()->value}}" class="links__item flex-block"
           style="background-image: url('{{ asset('storage/images/pages/'.$page->datas->where('alias','path_image_3')->first()->value) }}')">
            <div class="links__item-title">{{$page->datas->where('alias','link_image_3')->first()->value}}</div>
        </a>

    </section>
</main>