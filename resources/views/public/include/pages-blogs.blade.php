<main class="main-content blog_page">
    @if($first)
        <section id="first-screen" class="first-screen first-screen-697 flex-block ai-c"
                 style="background-image: url('{{ asset('storage/images/blog/'.$first->banner) }}')">
            <div class="wrapper">
                <div class="fs-program-content">
                    <div class="fs-program-title fs-program-title_white-color">
                        {{$first->titleH1}}
                    </div>
                    <div class="fs-program-text fs-program-title_white-color">
                        {!! '<p>'.trim(str_limit($first->text, 180, '...'),'</p>').'</p>' !!}
                    </div>
                    <a href="{{route('public-blog-show',['blog'=>$first->alias])}}" class="review-read-more fs-18">READ
                        MORE</a>
                </div>
            </div>
        </section>
    @endif


    <section class="blog_items">
        <div class="wrapper">
            <div class="blog_top_picks">
                <div class="btp_title">Top Picks</div>
                {!! $blogsPopular !!}
            </div>
            <div class="blog_items_list">
                {!! $blogsContent !!}
            </div>
        </div>
    </section>
</main>