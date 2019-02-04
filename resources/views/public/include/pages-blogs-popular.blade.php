@if($popular)
    <ol class="ol_type_1 clearfix">
        @foreach($popular as $item)
            <li class="flex-block fb-nowrap ai-c"><a
                        href="{{route('public-blog-show',['blog'=>$item->alias])}}">
                    {{$item->titleH1}}
                </a>
            </li>
        @endforeach
    </ol>
@endif