<main class="main-content">
    <section id="first-screen" class="about-header__block flex-block">
        <div class="about-header__inner center-wrap">
            <!-- <div class="main-title color_wht">Want a Fulfilled Life?</div>
            <div class="about-title color_wht">I’ll Help You BE <span>THERE</span> NOW</div> -->
            <div class="main-title color_wht contact-title">contact</div>
        </div>
    </section>
    <section class="contact-section flex-block">
        <aside class="contact-aside contact-el">
            <nav class="contact-nav">
                <ul>
                    <li class="active"><a href="{{route('public-pages',['alias' =>'contact'])}}">CONTACT me</a></li>
                    <li><a href="{{route('public-pages',['alias' =>'about'])}}">about rani</a></li>
                    <li><a href="{{route('public-pages',['alias' =>'privacy-policy'])}}">privacy policy</a></li>
                    <li><a href="{{route('public-pages',['alias' =>'terms-and-conditions'])}}">terms & conditions</a></li>
                </ul>
            </nav>
        </aside>
        <div class="contact-block">
            <div class="contact-info">
                <h3>Message me</h3>
                <form id="contact-form" action="{{route('public-applications-contact-store')}}" class="message-me" novalidate>
                    <div class="name-email-wrapper clearfix">
                        <input type="text" name="fullname" placeholder="Full Name&#42;" required>
                        <input type="email" name="email" placeholder="Email Address&#42;" required>
                    </div>
                    <div class="select-title">
                        What's the best way of contacting you?
                    </div>

                    <select id="way-contact" name="contact_method" class="select-list">
                        <option value="" data-display="Choose one">Choose one</option>
                        <option value="Zoom">Zoom</option>
                        <option value="WhatsApp">WhatsApp</option>
                        <option value="FaceTime">FaceTime</option>
                        <option value="WeChat">WeChat</option>
                        <option value="Skype">Skype</option>
                    </select>
                    <input class="selected-option" type="text" name="contact_method_login" placeholder="">
                    <textarea name="text" cols="30" rows="1" placeholder="Your message&#42;" required></textarea>
                    <label>
                        <input class="checkbox" type="checkbox" name="" checked="checked">
                        <span class="checkbox-custom"></span>
                        <span class="label-custom">
                                I’d love to be part of the insiders community
                            </span>
                    </label>
                    <label>
                        <input class="checkbox js-checkbox-agree" type="checkbox" name="" checked="checked">
                        <span class="checkbox-custom"></span>
                        <span class="label-custom">
                                I agree to the <a class="agree-links" href="#">Terms & Conditions</a> and <a class="agree-links" href="#">Privacy Policy</a>
                            </span>
                    </label>
                    <input type="submit" value="Send">
                    <div class="notice"></div>
                </form>
                <!--                     <div class="contact-info__item">
                                        <h3>Face-To-Face in Bali</h3>
                                        <div class="contact__descr">My general hours are 8:00am to 5:00pm Indonesia Central Time.</div>
                                    </div>
                                    <div class="contact-info__item">
                                        <h3>One-On-One Over the Internet</h3>
                                        <div class="contact__descr">I normally schedule my international clients as follows:</div>
                                        <ul class="contact-info__item-list">
                                            <li>Australia / Asia – business hours your time</li>
                                            <li>UK / Europe / South Africa – start of your business day</li>
                                            <li>West Coast North America – end of your business day</li>
                                            <li>East Coast North America – evenings (or start of your business day)</li>
                                        </ul>
                                        <div class="contact__descr">Appointments are face-to-face in Bali, or via the internet on Zoom, WhatsApp, FaceTime, WeChat or Skype.</div>
                                    </div> -->
            </div>
        </div>
    </section>


    <!-- <section class="about-form__block">
        <div class="wrapper wrapper_min">
            <div class="about-form__inner">
                <div class="thin-wrap">
                    <div class="main-subtitle center-wrap">Get in Touch</div>
                    <form action="#" class="about-form__form" novalidate="novalidate">
                        <div class="flex-block form-wrap">
                            <div class="two-col__item">
                                <input name="name" type="text" class="form-input" placeholder="Your name">
                                <input name="email" type="email" class="form-input" placeholder="Your email address">
                                <input name="email2" type="email" class="form-input" placeholder="Please repeat your email address">
                            </div>
                            <div class="two-col__item">
                                <textarea name="message" class="form-input" placeholder="Your message to me"></textarea>
                            </div>
                        </div>
                        <div class="center-wrap form-bottom"><button class="reg-btn">send</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="about-nums__block">
        <div class="wrapper wrapper_min">
            <div class="thin-wrap">
                <ol class="about-nums__list">
                    <li class="about-nums__item">
                        <div class="about-nums__title">Face-To-Face in Bali</div>
                        <div class="about-nums__text">My general hours are 8:00am to 5:00pm Indonesia Central Time.</div>
                    </li>
                    <li class="about-nums__item">
                        <div class="about-nums__title">One-On-One Over the Internet</div>
                        <div class="about-nums__text">I normally schedule my international clients as follows:</div>
                        <div class="about-nums__feats flex-block">
                            <div class="about-nums__feat">
                                <div class="about-nums__feat-title">Australia / Asia – </div>
                                <div class="about-nums__feat-text">business hours your time</div>
                            </div>
                            <div class="about-nums__feat">
                                <div class="about-nums__feat-title">UK / Europe / South Africa – </div>
                                <div class="about-nums__feat-text">start of your business day</div>
                            </div>
                            <div class="about-nums__feat">
                                <div class="about-nums__feat-title">West Coast North America – </div>
                                <div class="about-nums__feat-text">end of your business day</div>
                            </div>
                            <div class="about-nums__feat">
                                <div class="about-nums__feat-title">East Coast North America – </div>
                                <div class="about-nums__feat-text">evenings (or start of your business day)</div>
                            </div>
                        </div>
                        <div class="about-nums__text">Via the internet on Zoom, WhatsApp, FaceTime, WeChat or Skype. Whatever suits you!</div>
                    </li>
                </ol>
            </div>
        </div>
    </section>
    <section class="join__block">
        <div class="wrapper">
            <div class="join__title center-wrap">Don’t miss out on becoming part of our inspiring community. </div>
            <div class="center-wrap"><a href="" class="reg-btn reg-btn_empty js-modal-link" modal-taret="signup-modal">join free now</a></div>
        </div>
    </section> -->
</main>