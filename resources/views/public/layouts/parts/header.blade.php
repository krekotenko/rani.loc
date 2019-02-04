<div class="wrapper">
    <div class="flex-block jc-sb">
        <a href="/" class="main-logo"><img src="{{ asset('images/main-logo.png') }}" alt=""></a>
        <div class="header-navigation">
            <nav class="main-nav">
                <ul>
                    <li>
                        <a href="{{route('public-pages',['alias'=>'get-started'])}}">Get started</a>
                    </li>
                    <li>
                        <a href="{{route('public-pages',['alias'=>'rapid-transformation'])}}">Rapid Transformation</a>
                    </li>
                    <li class="has-submenu">
                        <span>Programs</span>                    
                        <ul class="submenu">
                            @foreach($programs as $program)
                                <li><a href="{{route('public-programs',['alias' => $program->alias])}}">{{$program->titleH1}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{route('public-blog')}}">Blog</a></li>
                    <li class="has-submenu">
                        <span>About</span>
                        <ul class="submenu">
                            <li><a href="{{route('public-pages',['alias'=>'about'])}}">About Rani</a></li>
                            <li><a href="{{route('public-pages',['alias'=>'giving-back'])}}">Giving Back</a></li>
                            <li><a href="{{route('public-client-stories-page')}}">Client Stories</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('public-pages',['alias'=>'contact'])}}">Contact</a>
                    </li>
                </ul>
            </nav>
            <a href="https://www.facebook.com/ranimaree/" class="header-social-links facebook" target="_blanck">
                <svg version="1.1" id="header-facebook-svg" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 32 32"
                     style="enable-background:new 0 0 32 32;" xml:space="preserve">
                            <style type="text/css">
                                .facebook-fill-1 {
                                    fill: #506098;
                                }

                                .facebook-fill-2 {
                                    fill: #FFFFFF;
                                }
                            </style>
                    <path class="facebook-fill-1"
                          d="M16,0c8.8,0,16,7.2,16,16c0,8.8-7.2,16-16,16S0,24.8,0,16C0,7.2,7.2,0,16,0z"/>
                    <path class="facebook-fill-2"
                          d="M17.9,11H20V8h-2.4v0C14.6,8.1,14,9.7,14,11.5h0V13h-2v3h2v8h3v-8h2.5l0.5-3H17v-0.9C17,11.5,17.4,11,17.9,11z"
                    />
                        </svg>
            </a>
            <a href="https://www.instagram.com/rani_maree/" class="header-social-links instagram" target="_blanck">
                <svg version="1.1" id="header-instagram-svg" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                     style="enable-background:new 0 0 512 512;" xml:space="preserve">
                            <style type="text/css">
                                .instagram-fill-1 {
                                    fill: url(#SVGID_1_);
                                }

                                .instagram-fill-2 {
                                    fill: #FFFFFF;
                                }
                            </style>
                    <g id="Background_1_">

                        <radialGradient id="SVGID_1_" cx="412.1736" cy="540.8811" r="684.4449"
                                        gradientTransform="matrix(5.233596e-02 -0.9986 -0.8488 -4.448556e-02 464.9746 885.0425)"
                                        gradientUnits="userSpaceOnUse">
                            <stop offset="0" style="stop-color:#FED576"/>
                            <stop offset="0.2634" style="stop-color:#F47133"/>
                            <stop offset="0.6091" style="stop-color:#BC3081"/>
                            <stop offset="1" style="stop-color:#4C63D2"/>
                        </radialGradient>
                        <path class="instagram-fill-1" d="M18.8,250.1v12.8C22.1,385.3,120.7,483.6,238,492.8h36.1c118-9.3,214.9-108.5,218.1-230.1v-12.6
                                    C489,126.3,388.7,25.9,267.9,19.7C137.9,13.1,22.4,117.4,18.8,250.1z"/>
                    </g>
                    <g id="Symbol">
                        <g>
                            <path class="instagram-fill-2" d="M256.6,138.3c37.7,0,42.2,0.1,57.1,0.8c13.8,0.6,21.2,3,26.2,4.9c6.6,2.6,11.3,5.7,16.2,10.7
                                        c4.9,5,8,9.8,10.6,16.5c1.9,5.1,4.2,12.7,4.9,26.7c0.7,15.2,0.8,19.7,0.8,58.1s-0.1,42.9-0.8,58.1c-0.6,14-2.9,21.6-4.9,26.7
                                        c-2.6,6.7-5.6,11.5-10.6,16.5c-4.9,5-9.6,8.1-16.2,10.7c-5,2-12.5,4.3-26.2,4.9c-14.9,0.7-19.4,0.8-57.1,0.8s-42.2-0.1-57.1-0.8
                                        c-13.8-0.6-21.2-3-26.2-4.9c-6.6-2.6-11.3-5.7-16.2-10.7s-8-9.8-10.6-16.5c-1.9-5.1-4.2-12.7-4.9-26.7
                                        c-0.7-15.2-0.8-19.7-0.8-58.1s0.1-42.9,0.8-58.1c0.6-14,2.9-21.6,4.9-26.7c2.6-6.7,5.6-11.5,10.6-16.5c4.9-5,9.6-8.1,16.2-10.7
                                        c5-2,12.5-4.3,26.2-4.9C214.4,138.5,218.9,138.3,256.6,138.3 M256.6,112.4c-38.4,0-43.2,0.2-58.2,0.9c-15,0.7-25.3,3.1-34.3,6.7
                                        c-9.3,3.7-17.2,8.6-25,16.6c-7.9,8-12.7,16-16.3,25.5c-3.5,9.1-5.9,19.6-6.6,34.9s-0.8,20.2-0.8,59.2s0.2,43.9,0.8,59.2
                                        c0.7,15.3,3.1,25.7,6.6,34.9c3.6,9.4,8.4,17.5,16.3,25.5c7.9,8,15.7,12.9,25,16.6c9,3.6,19.3,6,34.3,6.7
                                        c15.1,0.7,19.9,0.9,58.2,0.9s43.2-0.2,58.2-0.9c15-0.7,25.3-3.1,34.3-6.7c9.3-3.7,17.2-8.6,25-16.6c7.9-8,12.7-16,16.3-25.5
                                        c3.5-9.1,5.9-19.6,6.6-34.9s0.8-20.2,0.8-59.2s-0.2-43.9-0.8-59.2c-0.7-15.3-3.1-25.7-6.6-34.9c-3.6-9.4-8.4-17.5-16.3-25.5
                                        s-15.7-12.9-25-16.6c-9-3.6-19.3-6-34.3-6.7C299.8,112.6,294.9,112.4,256.6,112.4L256.6,112.4z"/>
                            <path class="instagram-fill-2" d="M256.6,182.3c-40.1,0-72.5,33-72.5,73.8s32.5,73.8,72.5,73.8s72.5-33,72.5-73.8S296.6,182.3,256.6,182.3z
                                         M256.6,304c-26,0-47.1-21.4-47.1-47.9s21.1-47.9,47.1-47.9s47.1,21.4,47.1,47.9S282.6,304,256.6,304z"/>
                            <ellipse class="instagram-fill-2" cx="332" cy="179.4" rx="16.9" ry="17.2"/>
                        </g>
                    </g>
                        </svg>
            </a>
            <button class="hamburger hamburger--slider" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
            </button>
        </div>
    </div>
</div>
