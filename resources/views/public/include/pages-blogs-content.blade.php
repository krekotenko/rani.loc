@if($blogs && !$blogs->isEmpty())

        @foreach($blogs as $blog)
            <a href="{{route('public-blog-show',['blog'=>$blog->alias])}}" class="blog_item">
                <img src="{{ asset('storage/images/blog/'.'mini_'.$blog->banner) }}"
                     alt="{{$blog->titleH1}}" class="blog_item_img">
                <div class="blog_item_title">
                    {{$blog->titleH1}}
                </div>
                <div class="blog_item_text">
                    {!! str_limit($blog->text, 180, '...') !!}
                </div>
                <div class="blog_item_additionally clearfix">
                    <span class="review-read-more">READ MORE</span>
                    <div class="blog_item_comments_amount">
                        {{count($blog->commentsPub)}} comments
                    </div>
                </div>
            </a>
        @endforeach

        @if($blogs->lastPage() != 1 && $blogs->total() > 0 && $blogs->lastPage() != $blogs->currentPage())
            <div class="btn-wrapper-center">
                <button data-href="{{ $blogs->url($blogs->currentPage()+1) }}" class="transparent_load_more">load more
                </button>
            </div>
        @endif

@endif