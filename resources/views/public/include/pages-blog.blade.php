<main class="main-content blog_inner_page">
    <section id="first-screen" class="first-screen first-screen-697 has_opacity_filtrer flex-block ai-c"
             style="background-image: url('{{ asset('storage/images/blog/'.$blog->banner) }}')">
        <div class="wrapper">
            <div class="fs-program-content ta-center">
                <div class="fs-program-title fs-60">
                    {{$blog->titleH1}}
                </div>
                <!-- <div class="bip_comments_amoutn">
                    130 comments
                </div> -->
            </div>
        </div>
    </section>
    @if($blog->tips)
        <section class="bip_post_content article-top-picks js-article-content">
            <div class="blog_top_picks article_top_picks">
                <div class="btp_title">Top Tips</div>
                <ol class="ol_type_1 clearfix">
                    @foreach($blog->tips as $item)
                        <li class="flex-block fb-nowrap ai-c"><a>{{ $item->text }}</a></li>
                    @endforeach
                </ol>
            </div>
            <div class="wrapper bip_big_wrapper">
                <div class="has-top-picks">
                    {!! $blog->text !!}
                </div>
            </div>
        </section>
@endif
  <section class="bip_send_audio">
        <div class="bip_sa_title">
            Send me a free hypnosis audio
        </div>
        <form action="{{route('public-audio-subscribe')}}" class="bip_form_sa" novalidate>
            <input type="email" name="email" id="" placeholder="Email" required class="bip_form_sa_input">
            <div class="bip_form_notification"></div>
            <input type="submit" name="submit" value="send" class="reg-btn">
        </form>
    </section>
    <section class="bip_also_read">
        <div class="wrapper bip_small_wrapper">
            <h2 class="programs-h2">You may also like...</h2>
            <div class="popular_related_posts clearfix">
                @if($popular)
                    <div class="bip_popular_posts">
                        <div class="bip_pp_title">
                            Popular Posts
                        </div>
                        <div class="bip_pp_content">
                            <div class="bip_pp_slider js_bip_pp_slider">
                                @foreach($popular as $item)
                                    <a href="{{route('public-blog-show',['blog'=>$item->alias])}}" class="bip_pp_item"
                                       style="background: url({{ asset('storage/images/blog/'.'mini_'.$item->banner) }}) center center no-repeat; background-size: cover;">
                                        <div class="bip_pp_item_content">
                                            <div class="bip_pp_item_title">
                                                {{$item->titleH1}}
                                            </div>
                                            <span class="review-read-more fs-18">READ MORE</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                @if($blog->related)
                    <div class="bip_related_posts">
                        <div class="bip_rp_title">
                            Related Posts
                        </div>
                        <div class="bip_rp_content">
                            @foreach($blog->related as $item)
                                <a href="{{route('public-blog-show',['blog'=>$item->alias])}}" class="bip_rp_item">
                                    <div class="bip_rp_item_image"
                                         style="background: url({{ asset('storage/images/blog/'.'mini_'.$item->banner) }}) center center no-repeat; background-size: cover;">
                                    </div>
                                    <div class="bip_rp_item_text">
                                        {!! str_limit($item->text,50,'...') !!}
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <section class="bip_comments">
        <div class="wrapper bip_small_wrapper">
            <div class="programs-h2">Comments</div>
            <div class="bip_comments_amoutn">
                {{count($blog->commentsPub)}} comments
            </div>
            <button class="reg-btn bip_add_comment js_add_comment" data-comment-id="0">add a comment</button>

            @foreach($blog->commentsPub as $comment)
                @if($comment->comment_id)
                    @continue
                @endif
                <div class="bip_comment_item js_add_comment" data-comment-id="{{$comment->id}}">
                    <div class="bip_ci_avatar"
                         @if($comment->photo)
                         style="background: url({{ asset('storage/images/blog/'.$comment->photo) }}) center center no-repeat; background-size: cover"
                         @else
                         style="background: url({{ asset('storage/images/no-photo.png') }}) center center no-repeat; background-size: cover"
                         @endif
                    ></div>
                    <div class="bip_ci_content">
                        <div class="bip_ci_avatar_name">
                            {{$comment->name}}
                        </div>
                        <div class="bip_ci_text">
                            {{$comment->comment}}
                        </div>
                        <div class="reply_btn">Reply</div>
                    </div>
                </div>
                @if($comment->commentsPub)
                    @foreach($comment->commentsPub as $c)
                        <div style="margin-left:20px;" class="bip_comment_item js_add_comment"
                             data-comment-id="{{$c->id}}">
                            <div class="bip_ci_avatar"
                                 @if($c->photo)
                                    style="background: url({{ asset('storage/images/blog/'.$c->photo) }}) center center no-repeat; background-size: cover"
                                 @else
                                    style="background: url({{ asset('storage/images/no-photo.png') }}) center center no-repeat; background-size: cover"
                                 @endif
                            ></div>
                            <div class="bip_ci_content">
                                <div class="bip_ci_avatar_name">
                                    {{$c->name}}
                                </div>
                                <div class="bip_ci_text">
                                    {{$c->comment}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            @endforeach

            <div class="bip_new_comment_block">
                <form action="{{route('public-blog-comments-store',['blog' => $blog->alias])}}"
                      class="bip_form_new_comment" novalidate="novalidate">
                    <div class="bip_fnc_title">
                        Let us know what you have to say:
                    </div>
                    <div class="bip_fnc_additional_info">
                        Your email address will not be published. Required fields are marked *
                    </div>
                    <textarea name="comment" placeholder="Comment" class="bip_nc_field" required></textarea>
                    <div class="bip_fnc_user_data clearfix">
                        <input type="text" name="name" placeholder="Name" class="bip_fnc_input bip_nc_field" required>
                        <input type="email" name="email" placeholder="Email" class="bip_fnc_input  bip_nc_field"
                               required>
                        <input type="text" name="site" placeholder="Website" class="bip_fnc_input bip_nc_field">
                        <span class="input-upload-group bip_fnc_input bip_nc_field">
                            <span class="input-upload__icon">
                                <svg width="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 548.2 402"><path
                                            d="M524.3 224.3c-15.9-19.9-36.2-32.8-61-38.7 7.8-11.8 11.7-24.9 11.7-39.4 0-20.2-7.1-37.4-21.4-51.7-14.3-14.3-31.5-21.4-51.7-21.4-18.1 0-33.9 5.9-47.4 17.7-11.2-27.4-29.2-49.4-53.8-65.9C276.1 8.3 249 0 219.3 0 179 0 144.5 14.3 115.9 42.8c-28.6 28.5-42.8 63-42.8 103.4 0 2.5.2 6.6.6 12.3C51.2 169 33.4 184.7 20 205.6 6.7 226.5 0 249.3 0 274.1c0 35.2 12.5 65.3 37.5 90.4 25 25 55.2 37.5 90.4 37.5h310.6c30.3 0 56.1-10.7 77.5-32.1 21.4-21.4 32.1-47.2 32.1-77.5.1-25.5-7.9-48.2-23.8-68.1zm-161.6-7.7c-1.8 1.8-3.9 2.7-6.4 2.7h-64v100.5c0 2.5-.9 4.6-2.7 6.4-1.8 1.8-3.9 2.7-6.4 2.7h-54.8c-2.5 0-4.6-.9-6.4-2.7-1.8-1.8-2.7-3.9-2.7-6.4V219.3h-64c-2.7 0-4.9-.9-6.6-2.6-1.7-1.7-2.6-3.9-2.6-6.6 0-2.3.9-4.6 2.9-6.9L249.2 103c1.7-1.7 3.9-2.6 6.6-2.6 2.7 0 4.9.9 6.6 2.6l100.5 100.5c1.7 1.7 2.6 3.9 2.6 6.6-.1 2.5-1 4.7-2.8 6.5z"/></svg>
                            </span>
                            <input type="file" name="photo" placeholder="Website"
                                   class="js-input-upload input-upload__hidden bip_nc_field">
                            <input  type="text" class="input-upload" placeholder="Add your photo" readonly>
                        </span>
                    </div>
                    <div class="bip_form_notification"></div>
                    <input type="submit" value="post comment" class="dark-btn">
                    <div class="fnc_close_btn js_fnc_close_btn">&times;</div>
                    {{--<input type="text" name="comment_id">--}}
                    <input type="hidden" name="comment_id" value="{{null}}" class="bip_fnc_input bip_nc_field">
                </form>
            </div>
        </div>
    </section>
</main>