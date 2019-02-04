<main class="main-content gs-main-content">
    <section id="first-screen" class="gs-top flex-block ai-c">
        <div class="wrapper">
            <div class="content">
                <h1>FREE 30 Minute Session</h1>
                <p>
                    Tired of struggling with the same problems over and over again? I’ll help you overcome issues that other therapies failed to fix, so you can finally be free.
                </p>
                <a href="{{route('public-pages',['alias'=>'free-30-minutes'])}}" class="reg-btn first-btn {{--js-modal-link--}}" {{--modal-taret="sorry-modal"--}}>BOOK FREE SESSION</a>
                <a href="#" class="reg-btn second-btn js-modal-link" modal-taret="youtube-modal">WATCH VIDEO</a>
            </div>
        </div>
    </section>
    <section class="gs-middle flex-block ai-c">
        <div class="wrapper">
            <div class="content">
                <h2>The Ultimate Decision-Making Tool</h2>
                <p class="first-p">
                    Scared of making the wrong move? Escape ‘Analysis Paralysis’ once and for all.
                </p>
                <p class="second-p">
                    Move forward today with 100% confidence in 3 simple steps.
                </p>
                <a href="{{route('public-pages',['alias' => 'ultimate-desicion'])}}" class="reg-btn">GET CLARITY NOW</a>
            </div>
        </div>
    </section>
    <section class="gs-bottom">
        <div class="wrapper flex-block jc-sb">
            <img class="flex-order-1" src="images/gs-bg-bottom.jpg" alt="Изображение с девушкой">
            <div class="flex-order-2">
                <h2>Can I Be Hypnotized?</h2>
                <p class="first-p">
                    Only 10% of people are highly hypnotizable. Are you one of them? Find out now in less than 2 minutes.
                </p>
                <p class="second-p">
                    Intelligence and creativity magnify your chances.
                <p class="second-p">
                    <a href="{{route('public-pages',['alias' => 'quiz'])}}" class="reg-btn">TAKE THE QUIZ</a>
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
        <a href="{{$page->datas->where('alias','url_page_3')->first()->value}}" class="links__item flex-block"  style="background-image: url('{{ asset('storage/images/pages/'.$page->datas->where('alias','path_image_3')->first()->value) }}')">
            <div class="links__item-title">{{$page->datas->where('alias','link_image_3')->first()->value}}</div>
        </a>
    </section>
</main>
