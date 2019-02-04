<main class="main-content @if($program->show_calculator)quit_smoking @else big_shifts @endif">
    <section id="first-screen" class="first-screen first-screen-697 flex-block ai-e" style="background-image: url('{{ asset('storage/images/programs/'.$program->background_img) }}')">
        <div class="wrapper">
            <div class="fs-program-content">
                <div class="fs-program-title">
                    {{$program->titleH1}}
                    @if ($program->subtitle)
                        <div class="fs-program-small-title">
                            {{$program->subtitle}}
                        </div>
                    @endif
                </div>
                <div class="fs-program-text">
                    {!!$program->text !!}
                </div>
                <a href="{{route('public-pages',['alias' => 'free-30-minutes'])}}" class="reg-btn">BOOK A FREE 30 MINUTE SESSION</a>
            </div>
        </div>
    </section>
    <section class="benefit-ultimate">
        <div class="wrapper">
            <h2 class="programs-h2 benefit-ultimate-title">
                {!! $program->icon_block_title !!}
            </h2>
            <div class="ultimate-advantages flex-block jc-c">
                <div class="advantage-item">
                    <div class="advantage-image">
                        <img src="{{ asset('storage/images/programs/'.$program->icon_1) }}" alt="">                
                    </div>
                    <div class="advantage-text">
                        {{$program->icon_text_1}}
                    </div>
                </div>
                <div class="advantage-item">
                    <div class="advantage-image">
                        <img src="{{ asset('storage/images/programs/'.$program->icon_2) }}" alt="">              
                    </div> 
                    <div class="advantage-text">
                        {{$program->icon_text_2}}
                    </div>
                </div>
                <div class="advantage-item">
                    <div class="advantage-image">
                        <img src="{{ asset('storage/images/programs/'.$program->icon_3) }}" alt="">           
                    </div>
                    <div class="advantage-text">
                        {{$program->icon_text_3}}
                    </div>
                </div>
                <div class="advantage-item">
                    <div class="advantage-image">
                        <img src="{{ asset('storage/images/programs/'.$program->icon_4) }}" alt="">         
                    </div>
                    <div class="advantage-text">
                        {{$program->icon_text_4}}
                    </div>
                </div>
                <div class="advantage-item">
                    <div class="advantage-image">
                        <img src="{{ asset('storage/images/programs/'.$program->icon_5) }}" alt="">              
                    </div>
                    <div class="advantage-text">
                        {{$program->icon_text_5}}
                    </div>
                </div>
                <div class="advantage-item">
                    <div class="advantage-image">
                        <img src="{{ asset('storage/images/programs/'.$program->icon_6) }}" alt="">                       
                    </div>
                    <div class="advantage-text">
                        {{$program->icon_text_6}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if($program->who_title_1)
        <section class="program-for">
        <div class="wrapper wrapper_big">
            <h2 class="programs-h2 program-for-title">
                Who is the program for?
            </h2>
            <div class="program-for-container flex-block jc-c">
                @if($program->who_title_1)
                    <div class="program-for-item">
                        <div class="program-elem-title item-title">
                            {{$program->who_title_1}}
                        </div>
                        <div class="item-text">
                            {{$program->who_text_1}}
                        </div>
                    </div>
                @endif
                @if($program->who_title_2)
                    <div class="program-for-item">
                        <div class="program-elem-title item-title">
                            {{$program->who_title_2}}
                        </div>
                        <div class="item-text">
                            {{$program->who_text_2}}
                        </div>
                    </div>
                @endif
                @if($program->who_title_3)
                    <div class="program-for-item">
                        <div class="program-elem-title item-title">
                            {{$program->who_title_3}}
                        </div>
                        <div class="item-text">
                            {{$program->who_text_3}}
                        </div>
                    </div>
                @endif
                @if($program->who_title_4)
                    <div class="program-for-item">
                        <div class="program-elem-title item-title">
                            {{$program->who_title_4}}
                        </div>
                        <div class="item-text">
                            {{$program->who_text_4}}
                        </div>
                    </div>
                @endif
                @if($program->who_title_5)
                    <div class="program-for-item">
                        <div class="program-elem-title item-title">
                            {{$program->who_title_5}}
                        </div>
                        <div class="item-text">
                            {{$program->who_text_5}}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    @endif
    @if($program->when_title_1)
    <section class="no-program">
        <div class="wrapper wrapper_big">
            <h2 class="programs-h2 no-program-title">
                When might the program not be a good fit?
            </h2>
            <div class="no-program-container flex-block jc-c">
                <div class="no-program-item-container">
                    <div class="no-program-item">
                        <div class="program-elem-title no-program-item-title">
                            {{$program->when_title_1}}
                        </div>
                        <div class="no-program-item-text">
                            {{$program->when_text_1}}
                        </div>
                    </div>
                </div>
                <div class="no-program-item-container">
                    <div class="no-program-item">
                        <div class="program-elem-title no-program-item-title">
                            {{$program->when_title_2}}
                        </div>
                        <div class="no-program-item-text">
                            {{$program->when_text_2}}
                        </div>
                    </div>
                </div>
                <div class="no-program-item-container">
                    <div class="no-program-item">
                        <div class="program-elem-title no-program-item-title">
                            {{$program->when_title_3}}
                        </div>
                        <div class="no-program-item-text">
                            {{$program->when_text_3}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    @if($program->sets_title_1)
        <section class="program-sets">
        <div class="wrapper wrapper-967">
            <h2 class="programs-h2 program-sets-title">
                What sets
                <div class="title-medium">
                    {{$program->title_green}}
                </div>
                apart from any other program?
            </h2>
            <div class="pr-sets-container qs-sets-container flex-block fb-nowrap">
                <ol class="pr-sets-list">
                    @if($program->sets_title_1)
                        <li class="pr-set-item">
                                <span class="program-elem-title bs-set-title">
                                    {{$program->sets_title_1}}
                                </span>
                            <div class="pr-set-text">
                                {{$program->sets_text_1}}
                            </div>
                        </li>
                    @endif
                    @if($program->sets_title_2)
                        <li class="pr-set-item">
                                <span class="program-elem-title bs-set-title">
                                    {{$program->sets_title_2}}
                                </span>
                            <div class="pr-set-text">
                                {{$program->sets_text_2}}
                            </div>
                        </li>
                    @endif
                    @if($program->sets_title_3)
                        <li class="pr-set-item">
                                <span class="program-elem-title bs-set-title">
                                    {{$program->sets_title_3}}
                                </span>
                            <div class="pr-set-text">
                                {{$program->sets_text_3}}
                            </div>
                        </li>
                    @endif
                    @if($program->sets_title_4)
                        <li class="pr-set-item">
                                <span class="program-elem-title bs-set-title">
                                    {{$program->sets_title_4}}
                                </span>
                            <div class="pr-set-text">
                                {{$program->sets_text_4}}
                            </div>
                        </li>
                    @endif
                </ol>
                @if($program->show_calculator)
                    <div class="saving-calculator flex-shrink-0">
                    <div class="sc-title">
                        FIND OUT WHAT YOU  COULD SAVE
                    </div>
                    <div class="sc-content">
                        <form action="#" class="sc-fotm" novalidate>
                            <label>
                                <div class="sc-form-label">How much is a pack of cigarettes?</div>
                                <input class="sc-input js-pack-cost" type="text" placeholder="e.g. 2">
                            </label>
                            <label>
                                <div class="sc-form-label">How much do you smoke per day?</div>
                                <input class="sc-input js-pack-per-day" type="text" placeholder="e.g. 1.5">
                            </label>
                            <input class="sc-submit reg-btn dark-btn js-sc-submit" type="submit" value="Calculate">
                            <div class="sc-notification-block js-notification"></div>
                        </form>
                        <div class="sc-saving-results">
                            <div class="sc-saving-results-title">
                                You could save:
                            </div>
                            <div class="sc-saving-results-container">
                                <div class="sc-saving-result-item">
                                    <div class="sc-saving-result-number per-week"></div>
                                    <div class="sc-saving-result-period">per<br>week</div>
                                </div>
                                <div class="sc-saving-result-item">
                                    <div class="sc-saving-result-number per-month"></div>
                                    <div class="sc-saving-result-period">per<br>month</div>
                                </div>
                                <div class="sc-saving-result-item">
                                    <div class="sc-saving-result-number per-year"></div>
                                    <div class="sc-saving-result-period">per<br>year</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
    @endif
    <section class="join-block program-join-block">
        <div class="wrapper">
            <div class="join-block-text">
                {{$program->button_text}}
            </div>
            <a href="{{route('public-pages',['alias' => 'free-30-minutes'])}}" class="reg-btn">{{$program->button_inner_text}}</a>
        </div>
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
                                          <a href="#" class="review-read-more">READ MORE</a>
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
    @endif
    <section class="links__block flex-block">
        <a href="{{$program->url_page_1}}" class="links__item flex-block" style="background-image: url('{{ asset('storage/images/programs/'.$program->path_image_1) }}')">
            <div class="links__item-title">{{$program->link_image_1}}</div>
        </a>
        <a href="{{$program->url_page_2}}" class="links__item flex-block" style="background-image: url('{{ asset('storage/images/programs/'.$program->path_image_2) }}')">
            <div class="links__item-title">{{$program->link_image_2}}</div>
        </a>
        <a href="{{$program->url_page_3}}" class="links__item flex-block" style="background-image: url('{{ asset('storage/images/programs/'.$program->path_image_3) }}')">
            <div class="links__item-title">{{$program->link_image_3}}</div>
        </a>
    </section>
</main>