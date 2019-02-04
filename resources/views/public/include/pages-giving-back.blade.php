<main class="main-content">

    <section id="first-screen" class="bg-section difference-section" style="background-image: url('{{ asset('storage/images/pages/'.$page->datas->where('alias','banner_image')->first()->value) }}')">
        <div class="wrapper">
            <h1 class="difference-title">{{$page->titleH1}}</h1>
            <div class="difference-descr">{!!$page->text!!}</div>
        </div>
    </section>

    <section class="contribute-section">
        <div class="wrapper">
            <div class="contribute-group-first flex-block">
                <h2 class="contribute-title">Contribute to the kind of world you’d like to live in</h2>
                <div class="contribute-descr-first">
                    <p>When you invest in yourself through my work, you're also helping to give girls in rural China a chance to escape poverty.</p>
                    <p>Through your support, I'm able to donate from each and every purchase made by you.</p>
                    <p>When I was living in China, I ran a CSR project called <a href="http://chifanforcharity.org/" target="_blank"> Chi Fan for Charity</a>, dedicated to raising money for a variety of important causes.</p>
                    <p>It was there that I was deeply moved by the work of Educating Girls of Rural China (EGRC). I am now honoured to be a member of the advisory board of this amazing charity.</p>
                </div>
            </div>
        </div>
        <div class="contribute-group-second">
            <div class="contribute-img">
                    <span class="contribute-img__label">
                        842 Girls Educated, that would have missed out
                    </span>
                <img src="images/difference-1.jpg" alt="">
            </div>
            <div class="contribute-descr-second">
                <span>Educating Girls of Rural China empowers young women in the most desperate situations who are determined to change their lives through education. Thousands of lives have been touched by the work of EGRC, including the families and communities of the 366 EGRC university graduates.</span>
            </div>
        </div>
        <div class="center-wrap contribute-button">
            <a href="https://www.canadahelps.org/en/dn/6550" target="_blank" class="dark-btn">help a girl now</a>
        </div>
    </section>

    <section class="stories-section">
        <div class="wrapper">
            <h3 class="stories-title">Stories from a few of the girls…</h3>
            <div class="stories-group flex-block">
                <div class="stories-item stories-img">
                    <div class="box-effect2">
                        <div class="stories-img__card-outher multbg-top-to-bottom__dark">
                            <div class="stories-img__card-inner multbg-top-to-bottom__light">
                                <div class="stories-img__card">
                                    <img src="images/difference-2.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="stories-img__descr"><div>Jie Liu</div>Minxian No. 2 Middle School</div>
                </div>
                <div class="stories-item stories-descr">
                    When Jie was six, her father passed away. Her mother quickly remarried and left - and has never come back to visit her. She has been living with her grandparents who are farmers, struggling to keep Jie in school. As her grandparents aged, they were no longer able to do hard labour in the fields, so the family fell further into poverty. Jie’s aunty had been helping them as much as she can, but as she has a family of her own to support, it’s very hard for her to afford Jie’s tuition fees. It’s like a dream come true for Jie that EGRC is sponsoring her high school study. She hopes that her good grades can demonstrate just how much she appreciates the generosity of kind people who have helped her.
                </div>
            </div>

            <div class="stories-group flex-block">
                <div class="stories-item stories-img">
                    <div class="box-effect2">
                        <div class="stories-img__card-outher multbg-top-to-bottom__dark">
                            <div class="stories-img__card-inner multbg-top-to-bottom__light">
                                <div class="stories-img__card">
                                    <img src="images/difference-3.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="stories-img__descr"><div>Lili Zhao</div>Minxian No. 2 Middle School</div>
                </div>
                <div class="stories-item stories-descr">
                    Lili was given up for adoption when she was a baby. She will never know for sure, but she thinks it’s because she wasn’t a boy. Not long after adopting Lili, her adoptive mother left due to the extreme poverty faced by the family. Lili was very lucky to have a kind adoptive father and grandparents who loved her. Then, Lili lost two more loved ones when both her grandparents passed away in 2013. Lili’s father had been suffering serious knee pain due to years of hard labour. In order to afford Lili’s education, he sacrificed essential medical care. But with the support of EGRC, that no longer happens and he can get the medical care he needs. Lili says she will always take care of her dad as he is so important to her.
                </div>
            </div>

            <div class="stories-group flex-block">
                <div class="stories-item stories-img">
                    <div class="box-effect2">
                        <div class="stories-img__card-outher multbg-top-to-bottom__dark">
                            <div class="stories-img__card-inner multbg-top-to-bottom__light">
                                <div class="stories-img__card">
                                    <img src="images/difference-4.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="stories-img__descr"><div>Xiaojuan Hao</div>Minxian No. 2 Middle School</div>
                </div>
                <div class="stories-item stories-descr">
                    Three years ago, Xiaojuan’s parents divorced. Her mother took all the valuables, leaving them with nothing more than a half-furnished shack. For a long time, Xiaojuan kept the hope that her mum would come back for her one day - but she never did. Last year, a massive earthquake hit Xiaojuan’s hometown and their home was destroyed. At the time, Xiaojuan was just starting high school, but they could not afford to pay the tuition fees. Relatives were reluctant to lend them money, knowing they'd never be able to pay it back. Xiaojuan was on the brink of losing her chance at an education, but EGRC stepped in to help.
                </div>
            </div>
            <div class="center-wrap">
                <a href="http://egrc.ca/" target="_blank" class="reg-btn">GET INVOLVED</a>
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
        <a href="{{$page->datas->where('alias','url_page_3')->first()->value}}" class="links__item flex-block" style="background-image: url('{{ asset('storage/images/pages/'.$page->datas->where('alias','path_image_3')->first()->value) }}')">
            <div class="links__item-title">{{$page->datas->where('alias','link_image_3')->first()->value}}</div>
        </a>
    </section>

</main>