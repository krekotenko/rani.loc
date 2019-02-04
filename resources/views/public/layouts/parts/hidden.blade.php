<div class="signature-modal" style="background-color: #fff; margin: auto; position: relative;">
    <div class="box-modal_close arcticmodal-close"></div>
    <div class="modal-title center-wrap"></div>
    <div class="modal-body">Add a signature</div>
    <div class="modal-footer center-wrap">
        <canvas id="tablet"></canvas>
        <button type="button" class="reg-btn reg-btn_empty" id="clear" name="clear">Clear</button>
        <input id="save_canvas_signature" type="submit" class="reg-btn" value="Save">
    </div>
</div>

<div class="freee-30-min-modal" style="background-color: #fff; margin: auto; position: relative;">
    <div class="box-modal_close arcticmodal-close"></div>
    <div class="modal-title center-wrap js-freee-30-min__title">
            Do you want to make an appointment on the <span class="js-freee-30-min__day"></span>th&nbsp;of&nbsp;<span class="js-freee-30-min__month"></span>&nbsp;at&nbsp;<span class="js-freee-30-min__time"></span>?            
        <div class="freee-30-min__buttons">
            <a href="#" class="btn dark-btn js-freee-30-min__yes">yes</a>
            <a href="#" class="btn dark-btn js-freee-30-min__no">no</a>
        </div>
    </div>
</div>
<div class="thanks-comment-modal" style="background-color: #fff; margin: auto; position: relative;">
    <div class="box-modal_close arcticmodal-close"></div>
    <div class="modal-title center-wrap">
        Thank you! Your comment will be published after moderation
    </div>
</div>
<div class="thanks-audio-modal" style="background-color: #fff; margin: auto; position: relative;">
    <div class="box-modal_close arcticmodal-close"></div>
    <div class="modal-title center-wrap">
        It's on its way!
    </div>
</div>
<div class="timezone-modal" style="background-color: #fff; margin: auto; position: relative;">
    <div class="box-modal_close arcticmodal-close"></div>
    <div class="modal-title center-wrap">
        Please choose your timezone
    </div>
</div>
<div class="youtube-modal" style="background-color: #fff; margin: auto; position: relative;">
    <div class="box-modal_close arcticmodal-close"></div>
    <div class="modal-title center-wrap">
        <div class="video-wrap">
            <iframe width="100%" src="{{$video ?? null}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
</div>
<div class="signup-modal">
    <div class="box-modal">
        <div class="box-modal_close arcticmodal-close"></div>
        <form class="signup-form" role="form" action="{{route('public-subscribe')}}" novalidate="novalidate">
            <div class="modal-title center-wrap">Become part of our<br> inspiring community!</div>
            <div class="modal-body">
                <div class="form-wrap">
                    <div class="one-col-item">
                        <input type="text" class="form-input form-input_transparent" placeholder="Name" name="name">
                    </div>
                    <div class="one-col-item">
                        <input type="email" class="form-input form-input_transparent" placeholder="Email" name="email">
                    </div>
                    <div class="one-col-item">
                        <input type="email" class="form-input form-input_transparent" placeholder="Repeat Email" name="email2">
                    </div>
                </div>
                <div class="one-col-item">
                    <label class="checkbox-label">
                        <input type="checkbox" checked name="freebies"  value="1" class="checkbox-input"><span>You’ll also get some other awesome freebies from me soon (or unsubscribe if that’s not your thing). BTW, I’m anti-spam.</span>
                    </label>
                    <label class="checkbox-label">
                        <input type="checkbox" class="checkbox-input js-agree-checkbox"><span>I agree to the <a href="#">Terms & Conditions</a> and <a href="#">Privacy Policy</a></span>
                    </label>
                </div>
            </div>
            <div class="modal-footer center-wrap">
                <button class="reg-btn" disabled>join</button>
            </div>
        </form>
    </div>
</div>
<div class="thanx-modal">
    <div class="box-modal">
        <div class="box-modal_close arcticmodal-close"></div>
        <form class="signup-form" role="form" action="">
            <div class="modal-title center-wrap">You’re In!</div>
            <div class="modal-text">
                <p>I’m so happy you’ve joined our community. Expect to get some awesome freebies from me soon. </p>
                <p>Meanwhile, add me now on social media for insider tips and to keep in touch with more inspiring stuff.</p>
            </div>
            <div class="social-block center-wrap">
                <a target="_blank" href="https://www.facebook.com/ranimaree">
                    <svg version="1.0" width="38px" height="38px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"     viewBox="0 0 32 32" enable-background="new 0 0 32 32" xml:space="preserve"><path fill="#3B5998" d="M16,0c8.8,0,16,7.2,16,16c0,8.8-7.2,16-16,16S0,24.8,0,16C0,7.2,7.2,0,16,0z"/><path fill="#FFFFFF" d="M17.9,11H20V8h-2.4v0C14.6,8.1,14,9.7,14,11.5h0V13h-2v3h2v8h3v-8h2.5l0.5-3H17v-0.9    C17,11.5,17.4,11,17.9,11z"/></svg>

                </a>
                <a target="_blank" href="https://www.instagram.com/rani_maree">
                    <svg version="1.0" width="38px" height="38px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"     viewBox="0 0 473.4 473.4" enable-background="new 0 0 473.4 473.4" xml:space="preserve"><g id="Background_1_">            <radialGradient id="SVGID_1_" cx="-917.4675" cy="-80.8933" r="684.4449" gradientTransform="matrix(5.233596e-02 -0.9986 -0.8488 -4.448556e-02 -11.9994 -489.8003)" gradientUnits="userSpaceOnUse">        <stop  offset="0" style="stop-color:#FED576"/>        <stop  offset="0.2634" style="stop-color:#F47133"/>        <stop  offset="0.6091" style="stop-color:#BC3081"/>        <stop  offset="1" style="stop-color:#4C63D2"/>    </radialGradient>    <path fill="url(#SVGID_1_)" d="M0,230.7v12.8c3.3,122.4,101.9,220.7,219.2,229.9h36.1c118-9.3,214.9-108.5,218.1-230.1v-12.6        C470.2,106.9,369.9,6.5,249.1,0.3C119.1-6.3,3.6,98,0,230.7z"/></g><g id="Symbol">    <g>        <path fill="#FFFFFF" d="M237.8,118.9c37.7,0,42.2,0.1,57.1,0.8c13.8,0.6,21.2,3,26.2,4.9c6.6,2.6,11.3,5.7,16.2,10.7            c4.9,5,8,9.8,10.6,16.5c1.9,5.1,4.2,12.7,4.9,26.7c0.7,15.2,0.8,19.7,0.8,58.1s-0.1,42.9-0.8,58.1c-0.6,14-2.9,21.6-4.9,26.7            c-2.6,6.7-5.6,11.5-10.6,16.5c-4.9,5-9.6,8.1-16.2,10.7c-5,2-12.5,4.3-26.2,4.9c-14.9,0.7-19.4,0.8-57.1,0.8s-42.2-0.1-57.1-0.8            c-13.8-0.6-21.2-3-26.2-4.9c-6.6-2.6-11.3-5.7-16.2-10.7s-8-9.8-10.6-16.5c-1.9-5.1-4.2-12.7-4.9-26.7            c-0.7-15.2-0.8-19.7-0.8-58.1s0.1-42.9,0.8-58.1c0.6-14,2.9-21.6,4.9-26.7c2.6-6.7,5.6-11.5,10.6-16.5c4.9-5,9.6-8.1,16.2-10.7            c5-2,12.5-4.3,26.2-4.9C195.6,119.1,200.1,118.9,237.8,118.9 M237.8,93c-38.4,0-43.2,0.2-58.2,0.9c-15,0.7-25.3,3.1-34.3,6.7            c-9.3,3.7-17.2,8.6-25,16.6c-7.9,8-12.7,16-16.3,25.5c-3.5,9.1-5.9,19.6-6.6,34.9s-0.8,20.2-0.8,59.2s0.2,43.9,0.8,59.2            c0.7,15.3,3.1,25.7,6.6,34.9c3.6,9.4,8.4,17.5,16.3,25.5c7.9,8,15.7,12.9,25,16.6c9,3.6,19.3,6,34.3,6.7            c15.1,0.7,19.9,0.9,58.2,0.9s43.2-0.2,58.2-0.9c15-0.7,25.3-3.1,34.3-6.7c9.3-3.7,17.2-8.6,25-16.6c7.9-8,12.7-16,16.3-25.5            c3.5-9.1,5.9-19.6,6.6-34.9s0.8-20.2,0.8-59.2s-0.2-43.9-0.8-59.2c-0.7-15.3-3.1-25.7-6.6-34.9c-3.6-9.4-8.4-17.5-16.3-25.5            s-15.7-12.9-25-16.6c-9-3.6-19.3-6-34.3-6.7C281,93.2,276.1,93,237.8,93L237.8,93z"/>        <path fill="#FFFFFF" d="M237.8,162.9c-40.1,0-72.5,33-72.5,73.8s32.5,73.8,72.5,73.8s72.5-33,72.5-73.8S277.8,162.9,237.8,162.9z             M237.8,284.6c-26,0-47.1-21.4-47.1-47.9s21.1-47.9,47.1-47.9s47.1,21.4,47.1,47.9S263.8,284.6,237.8,284.6z"/>        <ellipse fill="#FFFFFF" cx="313.2" cy="160" rx="16.9" ry="17.2"/>    </g></g></svg>
                </a>
            </div>
        </form>
    </div>
</div>
<div class="thanx-modal-contact">
    <div class="box-modal">
        <div class="box-modal_close arcticmodal-close"></div>
        <form class="signup-form" role="form" action="">
            <div class="modal-title center-wrap">Thank you! I will get in touch with you shortly</div>
        </form>
    </div>
</div>
<div class="thanx-modal-story">
    <div class="box-modal">
        <div class="box-modal_close arcticmodal-close"></div>
        <form class="signup-form" role="form" action="">
            <div class="modal-title center-wrap">Thank you for sharing!</div>
        </form>
    </div>
</div>
<div class="message-me-modal">
    <div class="box-modal" id="exampleModal">
        <div class="box-modal_close arcticmodal-close"></div>
        <div class="one-to-many">one-to-many</div>
        <div class="message-me-title">Growth for groups</div>
        <form action="{{route('public-power-store')}}" class="form-message-me" role="form" novalidate>
            <div class="mm-form-title">Power Transformations</div>
            <div class="mm-form-tooltip">
                Please fill out the form below and I will get back to you!
            </div>
            <div class="mm-form-fields clearfix">
                <input type="text" class="form-input new-cycle-ph form-input_transparent" placeholder="Name*" name="name" required>
                <input type="email" class="form-input new-cycle-ph form-input_transparent" placeholder="Email*" name="email" required>
                <input type="text" class="form-input new-cycle-ph form-input_transparent" placeholder="Phone number" name="phone">
                <input type="text" class="form-input new-cycle-ph form-input_transparent" placeholder="Company name*" name="company" required>
                <input type="text" class="form-input new-cycle-ph form-input_transparent" placeholder="Theme/Objective" name="theme">
                <input type="text" class="form-input new-cycle-ph form-input_transparent" placeholder="Number of people" name="number_of_people">
                <input type="text" class="form-input new-cycle-ph form-input_transparent" placeholder="Location" name="location">
                <input type="text" class="form-input new-cycle-ph form-input_transparent calendar" data-view="years" name="date" placeholder="Date">
            </div>
            <input type="text" class="form-input new-cycle-ph form-input_transparent tell-me-more" placeholder="Tell me more about your event ..." name="tell_me">
            <div class="center-wrap">
                <input type="submit" class="reg-btn" name="submit" value="Send">
                <div class="mm-notification"></div>
            </div>
        </form>
    </div>
</div>
<div class="add-story-modal js-add-story-modal">
    <div class="box-modal" id="exampleModal">
        <div class="box-modal_close arcticmodal-close"></div>
        <div class="as-modal-title">Your Story</div>
        <form enctype="multipart/form-data" action="{{route('public-add-story')}}" class="form-add-story js-send-data" role="form" novalidate>
            <div class="two-input-container clearfix">
                <div class="input-block ib-left">
                    <input type="text" class="form-input new-cycle-ph form-input_transparent" placeholder="Name" name="name">
                </div>
                <div class="input-block ib-right">
                    <input type="text" class="form-input new-cycle-ph form-input_transparent" placeholder="Location" name="location">
                </div>
            </div>
            <input type="text" class="form-input new-cycle-ph form-input_transparent" placeholder="What you do" name="what_do">
            <input type="text" class="form-input new-cycle-ph form-input_transparent" placeholder="The reason you booked a session" name="reason">
            <input type="text" class="form-input new-cycle-ph form-input_transparent" placeholder="How has working with me specifically impacted your life?" name="influence">
            <input type="text" class="form-input new-cycle-ph form-input_transparent" placeholder="Your key take-away from your session with me" name="take_away_key">
            <input type="text" class="form-input new-cycle-ph form-input_transparent" placeholder="Please describe your experience" name="experience">
            <input type="text" class="form-input new-cycle-ph form-input_transparent" placeholder="Who would you recommend this kind of work to and why?" name="recommendation">

            <div class="as-faforite-img">
                <div class="top-line">
                            <span class="text-info">
                                Please upload a few of your favourite photos here
                            </span>
                    <label class="dark-btn" for="asf_image_uploads">Upload</label>
                    <input class="js-fas-btn-upload" type="file" id="asf_image_uploads" name="image_uploads" accept=".jpg, .jpeg, .png" multiple>
                </div>
                <div class="fas-uploaded-images"></div>
            </div>

            <div class="as-agreement one-col-item">
                <label class="checkbox-label">
                    <input type="checkbox" name="freebies" checked class="checkbox-input"><span>You’ll also get some other awesome freebies from me soon (or unsubscribe if that’s not your thing). BTW, I’m anti-spam.</span>
                </label>
                <label class="checkbox-label">
                    <input type="checkbox" class="checkbox-input js-agree-checkbox-terms"><span>I agree to the <a href="{{route('public-pages',['alias'=>'terms-and-conditions'])}}">Terms & Conditions</a> and <a href="{{route('public-pages',['alias'=>'privacy-policy'])}}">Privacy Policy</a></span>
                </label>
            </div>

            <div class="center-wrap">
                <input type="submit" class="reg-btn" name="submit" value="Send">
                <!-- <div class="mm-notification"></div> -->
            </div>

            <div class="agree-checkbox-terms__message js-agree-checkbox-terms__message">You have to agree to the Terms and Conditions</div>
        </form>
    </div>
</div>