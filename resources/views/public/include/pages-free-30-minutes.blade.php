<main class="main-content fs-main-content">
    <section id="first-screen" class="first-screen first-screen-free-session fs-main-header"
             style="background-image: url('{{ asset('storage/images/pages/'.$page->datas->where('alias','banner_image')->first()->value) }}">
        <div class="wrapper">
            <div class="content">
                <h1>{{$page->titleH1}}</h1>
                {!!  $page->text !!}
            </div>
        </div>
    </section>
    <section class="fs-form-section">
        <div class="wrapper thin-wrap">
            <form action="{{ route('public-applications-free-store') }}" id="personalData" class="fs_form"
                  novalidate="novalidate">
                <div class="js-calendar-block">
                <div class="fs_pd_first_filds flex-block jc-sb ai-e">
                    <div class="col-2">
                        <div class="select-title">
                            Timezone
                        </div>
                        <div class="flex-block jc-sb">
                            <select name="city" id='timezone-selector' class="search-select js-search-select js-timezone">                              
                                @foreach ($timezones as $key => $local)
                                    <option value="{{ $key }}">{{ $local }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="date_free_session" class="js-date-free-session" value="" required>

                <div class="calendar-block js-modal-link">
                    <div id='calendar'></div>
                </div>
                </div>               

                <!-- <div class="btn-wrapper-center fs_btn_next_step">
                    <button class="dark-btn js_fs_btn_next_step">next step</button>
                </div>

                <div class="error-message" style="opacity: 1; display: none;"></div> -->

                <div class="fs_pd_other_fields js_fs_pd_other_fields">
                    <div class="fs_form_about">
                        <h2>About You</h2>
                        <div class="flex-block jc-sb">
                            <input type="text" name="firstname" placeholder="First Name&#42;" class="must-have"
                                   required>
                            <input type="text" name="surname" placeholder="Surname&#42;" required>
                        </div>
                        <div class="flex-block jc-sb">
                            <input class="input_3_col calendar" name="dob" type="text" placeholder="Date of Birth&#42;"
                                   data-view="years" required>
                            <input class="input_3_col" name="occupation" type="text" placeholder="Occupation&#42;"
                                   required>
                            <input class="input_3_col" type="tel" name="phone" placeholder="Phone&#42;" required>
                        </div>
                        <div class="flex-block jc-sb">
                            <input class="input_3_col" name="email" type="email" placeholder="Email&#42;"
                                   required>
                            <input class="input_3_col" name="confirm_email" type="email" placeholder="Confirm Email&#42;"
                                   required>
                            
                            <input class="input_3_col" name="material_status" type="text" placeholder="Marital Status">

                            <input type="text" name="facebook" placeholder="Facebook" class="js-facebookMask">
                            <input type="text" name="instagram" placeholder="Instagram" class="js-instagramMask">
                            <input type="text" name="whats_app" placeholder="WhatsApp" class="js-whatsAppMask">
                            <input type="text" name="wechat" placeholder="Wechat" class="js-wechat">

                            <input type="text" name="mental_conditions" placeholder="Physical/Mental Conditions&#42;"
                                   required>
                            <input type="text" name="doctor_name" placeholder="Doctors Name">
                            <input type="text" name="date_of_last_check" placeholder="Date of Last Check-Up"
                                   class="calendar" data-view="years">
                            <input type="text" name="past_medications" placeholder="Current/Past Medications">
                        </div>
                    </div>
                    <div class="fs-check-blank">
                        <h2>Check any areas that are relevant to you<br>(now or in the past)</h2>
                        <div class="column">
                            <label>
                                <input id="addictions" class="checkbox" value="1" type="checkbox" name="addictions">
                                <span class="checkbox-custom"></span>
                                <span class="label-custom">Addictions</span>
                            </label>
                            <textarea name="addictions_ta" id="addictions-ta" cols="30" rows="1"
                                      placeholder="Please expand" class="hide"></textarea>
                            <label>
                                <input class="checkbox" value="1" type="checkbox" name="achieving_goals">
                                <span class="checkbox-custom"></span>
                                <span class="label-custom">Achieving Goals</span>
                            </label>
                            <label>
                                <input class="checkbox" value="1" type="checkbox" name="anorexia">
                                <span class="checkbox-custom"></span>
                                <span class="label-custom">Anorexia</span>
                            </label>
                            <label>
                                <input class="checkbox" value="1" type="checkbox" name="anxiety">
                                <span class="checkbox-custom"></span>
                                <span class="label-custom">Anxiety</span>
                            </label>
                            <label>
                                <input class="checkbox" value="1" type="checkbox" name="bulimia">
                                <span class="checkbox-custom"></span>
                                <span class="label-custom">Bulimia</span>
                            </label>
                            <label>
                                <input class="checkbox" value="1" type="checkbox" name="career">
                                <span class="checkbox-custom"></span>
                                <span class="label-custom">Career</span>
                            </label>
                            <label>
                                <input class="checkbox" value="1" type="checkbox" name="childhood_problems">
                                <span class="checkbox-custom"></span>
                                <span class="label-custom">Childhood Problems</span>
                            </label>
                            <label>
                                <input class="checkbox" value="1" type="checkbox" name="concentration">
                                <span class="checkbox-custom"></span>
                                <span class="label-custom">Concentration</span>
                            </label>
                            <label>
                                <input class="checkbox" value="1" type="checkbox" name="confidence">
                                <span class="checkbox-custom"></span>
                                <span class="label-custom">Confidence</span>
                            </label>
                            <label>
                                <input class="checkbox" value="1" type="checkbox" name="compulsive_behavior">
                                <span class="checkbox-custom"></span>
                                <span class="label-custom">Compulsive Behavior</span>
                            </label>
                            <label>
                                <input class="checkbox" value="1" type="checkbox" name="depression">
                                <span class="checkbox-custom"></span>
                                <span class="label-custom">Depression</span>
                            </label>
                            <label>
                                <input class="checkbox" value="1" type="checkbox" name="exams">
                                <span class="checkbox-custom"></span>
                                <span class="label-custom">Exams</span>
                            </label>
                            <label>
                                <input class="checkbox" value="1" type="checkbox" name="eating_problems">
                                <span class="checkbox-custom"></span>
                                <span class="label-custom">Eating Problems</span>
                            </label>
                            <label>
                                <input class="checkbox" value="1" type="checkbox" name="fears">
                                <span class="checkbox-custom"></span>
                                <span class="label-custom">Fears</span>
                            </label>
                            <label>
                                <input class="checkbox" value="1" type="checkbox" name="fertility">
                                <span class="checkbox-custom"></span>
                                <span class="label-custom">Fertility</span>
                            </label>
                        </div>
                        <div class="column">
                            <label>
                                <input class="checkbox" value="1" type="checkbox" name="guilt">
                                <span class="checkbox-custom"></span>
                                <span class="label-custom">Guilt</span>
                            </label>
                            <label>
                                <input class="checkbox" value="1" type="checkbox" name="mental_health_issues">
                                <span class="checkbox-custom"></span>
                                <span class="label-custom">Mental Health Issues</span>
                            </label>
                            <label>
                                <input class="checkbox" value="1" type="checkbox" name="motivation">
                                <span class="checkbox-custom"></span>
                                <span class="label-custom">Motivation</span>
                            </label>
                            <label>
                                <input class="checkbox" value="1" type="checkbox" name="memory">
                                <span class="checkbox-custom"></span>
                                <span class="label-custom">Memory</span>
                            </label>
                            <label>
                                <input class="checkbox" value="1" type="checkbox" name="nerves">
                                <span class="checkbox-custom"></span>
                                <span class="label-custom">Nerves</span>
                            </label>
                            <label>
                                <input class="checkbox" value="1" type="checkbox" name="pain_control">
                                <span class="checkbox-custom"></span>
                                <span class="label-custom">Pain Control</span>
                            </label>
                            <label>
                                <input class="checkbox" value="1" type="checkbox" name="panic_attacks">
                                <span class="checkbox-custom"></span>
                                <span class="label-custom">Panic Attacks</span>
                            </label>
                            <label>
                                <input class="checkbox" value="1" type="checkbox" name="phobias">
                                <span class="checkbox-custom"></span>
                                <span class="label-custom">Phobias</span>
                            </label>
                            <label>
                                <input class="checkbox" value="1" type="checkbox" name="public_speaking">
                                <span class="checkbox-custom"></span>
                                <span class="label-custom">Public Speaking</span>
                            </label>
                            <label>
                                <input class="checkbox" value="1" type="checkbox" name="relationships">
                                <span class="checkbox-custom"></span>
                                <span class="label-custom">Relationships</span>
                            </label>
                            <label>
                                <input class="checkbox" value="1" type="checkbox" name="relaxation">
                                <span class="checkbox-custom"></span>
                                <span class="label-custom">Relaxation</span>
                            </label>
                            <label>
                                <input class="checkbox" value="1" type="checkbox" name="stress">
                                <span class="checkbox-custom"></span>
                                <span class="label-custom">Stress</span>
                            </label>
                            <label>
                                <input class="checkbox" value="1" type="checkbox" name="self_esteem">
                                <span class="checkbox-custom"></span>
                                <span class="label-custom">Self Esteem</span>
                            </label>
                            <label>
                                <input class="checkbox" value="1" type="checkbox" name="sleep_problems">
                                <span class="checkbox-custom"></span>
                                <span class="label-custom">Sleep Problems</span>
                            </label>
                            <label>
                                <input class="checkbox" value="1" type="checkbox" name="sexual_problems">
                                <span class="checkbox-custom"></span>
                                <span class="label-custom">Sexual Problems</span>
                            </label>
                            <label>
                                <input id="other-issues" class="checkbox" value="1" type="checkbox" name="other_issues">
                                <span class="checkbox-custom"></span>
                                <span class="label-custom">Other Issues</span>
                            </label>
                            <textarea name="other_issues_ta" id="other-issues-ta" cols="30" rows="1"
                                      placeholder="Please expand" class="hide"></textarea>
                        </div>
                    </div>
                    <div class="fs-text-form">
                        <p>What's the MOST IMPORTANT ISSUE you'd like to resolve right now, and why?</p>
                        <textarea name="most_important_issue" id="" cols="30" rows="10"
                                  placeholder="Eg. Confidence, because I feel I'm holding myself back from some really great opportunities. It’s also affecting my relationship. I feel I don’t have a voice and I let all decisions be made by my partner."></textarea>
                        <p>If you no longer struggled with this issue, in what positive ways would your day-to-day life
                            be affected? Please be specific.</p>
                        <textarea name="if_you_no_longer" id="" cols="30" rows="10"></textarea>
                        <p>What's your greatest desire? What would you love to have more of in your life? Share with me
                            your greatest dream for your future. Don’t hold back!!!</p>
                        <textarea name="greatest_desire" id="" cols="30" rows="10" enable></textarea>
                    </div>
                    <div class="fs-information">
                        <p class="title">CANCELLATIONS</p>
                        <p>
                            For paid sessions, the full session fee is charged for missed appointments or cancellations
                            with less than a 24-hour notice.
                        </p>
                        <p class="title">CONFIDENTIALITY</p>
                        <p>
                            Sessions are confidential. Both verbal information and written records about a client cannot
                            be shared with another party without the written consent of the client or the client’s legal
                            guardian.<br>
                            Exceptions are as follows…<br>
                            <strong>Duty to Warn and Protect:</strong> When a client discloses an intention to harm
                            another person or implies a plan for suicide, the clinical hypnotherapist is required to
                            report this information to legal authorities.<br>
                            <strong>Abuse of Children and Vulnerable Adults:</strong> If a client states or suggests
                            that he or she is abusing, has recently abused or is in danger of abusing a child or
                            vulnerable adult, the clinical hypnotherapist is required to report this information to the
                            appropriate authorities.<br>
                            Case studies may be shared with full anonymity to the client and details changed to protect
                            the client's identity from recognition.
                        </p>
                        <div class="center-wrap">
                            <div class="simple-btn js-modal-link" modal-taret="signature-modal">add a signature</div>
                        </div>
                        <div class="center-wrap mt26">
                            <div id="submit_free_session" class="reg-btn">Submit</div>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="canvasData" name="signature"/>
            </form>
        </div>
    </section>
</main>
