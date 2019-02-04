<main class="main-content t-main-content">
    <section id="first-screen" class="t-section js-t-section t-section-full flex-block ai-c">
        <div class="wrapper">
            <div class="t-content t-content-main t-content-wrapper content">
                <h1>{{$page->titleH1}}</h1>
                {!! $page->text !!}
                <div class="t-form-container">
                    <form action="{{route('public-ultimate-decision-store')}}" class="t-form__form js-mt-form" novalidate="novalidate">
                        <div class="flex-block form-wrap test-form-group">
                            <div class="three-col__item">
                                <input name="name" type="text" class="form-input" placeholder="Name">
                            </div>
                            <div class="three-col__item">
                                <input name="email" type="email" class="form-input" placeholder="Email">
                            </div>
                            <div class="three-col__item">
                                <button class="reg-btn t-btn">I'm Ready</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div id="app"></div>
</main>