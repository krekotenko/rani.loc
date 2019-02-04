<main class="main-content quiz-block">
    <section id="first-screen" class="quiz-main-header">
        <div class="wrapper">
            <div class="content">
                <h1>{{$page->titleH1}}</h1>
                <p>
                    {!!$page->text!!}
                </p>
            </div>
        </div>
    </section>
    <div class="wrapper thin-wrap quiz-main-content">
        <h2>Can I Be Hypnotized?</h2>
        <p>Is your personality compatible with hypnosis? Find out now in less than 2 minutes.</p>
        <form action="#" class="quiz-form flex-block">
            <input type="text" placeholder="Name" name="name">
            <input type="text" placeholder="Email" name="email">
            <div class="btn-wrapper">
                <input type="submit" class="reg-btn start-now-btn" value="Start now">
            </div>
        </form>
    </div>
</main>