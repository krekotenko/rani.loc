import jQuery from 'jquery';
import TypeIt from './typeit.min';
import slick from './slick.min';
import './audio-player.js';


import route from './routes';

window.jQuery = jQuery;
window.$ = jQuery;

require('imports-loader?window.jQuery=jquery!./jquery.arcticmodal-0.3.min');
require('imports-loader?window.jQuery=jquery!./jquery.nice-select.min');
require('imports-loader?window.jQuery=jquery!./datepicker/datepicker.min');
require('imports-loader?window.jQuery=jquery!./datepicker/i18n/datepicker.en');


import selectize from './selectize.min';

import 'fullcalendar';
require('./gcal');


jQuery(document).ready(function ($) {


    if ($('select').length) {
        $('select').not('.js-search-select').niceSelect();
    }    


    // setTimeout(function() {

    //     $.getJSON('/js/timezones.json', function(timezones) {
    //         $.each(timezones, function(i, timezone) {
    //             if (timezone != 'UTC') { // UTC is already in the list
    //                 $('#timezone-selector').append(
    //                     $("<option/>").text(timezone).attr('value', timezone)
    //                 );
    //             }
    //             $('#timezone-selector').niceSelect('update');
    //         });
    //     });

    // }, 0);

    if(sessionStorage.getItem('statusPopup') == 1) {
        $('.thanx-modal-contact').arcticmodal({
            beforeOpen: function(data, el) {
                $('.main-header').addClass('modal-open');
            },
            afterClose: function(data, el) {
                $('.main-header').removeClass('modal-open');
            },
        });
        sessionStorage.removeItem('statusPopup');
        $('html, body').scrollTop(0);
    }
    

    $('#timezone-selector').on('change', function() {
        $('#calendar').fullCalendar('option', 'timezone', this.value || false);
    });


    $('.js-send-data').on('submit',function(e) {

        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var formFields = document.querySelectorAll('.js-send-data input');
        var fData = new FormData();

        formFields.forEach(function(elem) {
            if(elem.type == "file") {
                if(elem.files) {
                    for(var i = 0; i < elem.files.length; i++) {
                        fData.append(elem.name+'[]', elem.files[i]);
                    }
                }
            }
            else if(elem.type == "text"){
                fData.append(elem.name, elem.value);

            }
        });
        //send ajax
        $.ajax({
            url: $(this).attr('action'),
            type: 'post',
            data : fData,
            processData: false,  // tell jQuery not to process the data
            contentType: false,  // tell jQuery not to set contentType
            dataType: 'json'
        })
            .done(function (html) {
                //if send is Ok
                if(html.status == 'success') {
                    formFields.forEach(function(item) {
                        if (item.type != 'submit') {
                            item.value = "";
                        }
                    });
                    $.arcticmodal('close');
                    //open modal
                    $('.thanx-modal-story').arcticmodal({
                        beforeOpen: function(data, el) {
                            $('.main-header').addClass('modal-open');
                        },
                        afterClose: function(data, el) {
                            $('.main-header').removeClass('modal-open');
                        },
                    });
                }
            });

        return false
    });

    $('body').on('click','.transparent_load_more',function() {

        var button = $(this);
        //ajax headers
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //send ajax
        $.ajax({
            url: $(this).data('uri'),
            type: 'get',
            dataType: 'json'
        })
            .done(function (html) {
                //if send is Ok
                if(html.status == 'success') {
                    button.closest('.people-reviews').after(html.html);
                    button.closest('.btn-wrapper-center').remove();

                }
            });

        return false;
    });

    $('.blog_items_list').on('click','.transparent_load_more',function(e) {

        //ajax headers
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //send ajax
        $.ajax({
            url: $(this).data('href'),
            //data: $(this).serialize(),
            type: 'get',
            dataType: 'json'
        })
            .done(function (html) {
                //if send is Ok
                if(html.status == 'success') {
                    $(e.target).closest('.btn-wrapper-center').remove();
                    $('.blog_items_list').append(html.blogsContent);
                }
            });

        return false;
    });

    var calendar = $('#calendar'),
        dateFreeSessionInput = $('.js-date-free-session');

    if(calendar.length) {

    calendar.fullCalendar({
        header: {
            left: 'prev ,next today',
            center: 'title',
            right: 'agendaWeek, agendaDay'
        },
        timezone : 'local',
        googleCalendarApiKey: 'AIzaSyD1UVuga8RToXRTDXvvXp0Pmvo7-_Lk3f4',
        events: {
            googleCalendarId: 'rani@ranimaree.com',
            className: 'gcal-event' // an option!
        },
        dayClick: function(date, jsEvent, view) {              
            
            dateFreeSessionInput.val(date.format("DD.MM.YYYY HH:mm:ss"));
            
            //alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
            //alert('Current view: ' + view.name);

            // change the day's background color just for fun
            //$(jsEvent.target).css('background-color', 'red');

        },
        defaultView: 'agendaWeek'
    });

}


    var monthList = [   
        'January',            
        'February',            
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November', 
        'December'
   ];

    var getMonth = function(month, list) {        
        return list[month - 1]
    };

    //  modal windows
    $('.js-modal-link').on('click', '.fc-body', function () {
        $.arcticmodal('close');

        var dateValue = dateFreeSessionInput.val(),
            date = dateValue.split(' ')[0],
            time = dateValue.split(' ')[1],

            day = date.split('.')[0],
            month = getMonth(date.split('.')[1], monthList),
            hours = time.split(':')[0] > 12 ? time.split(':')[0] - 12 : time.split(':')[0],
            minutes = time.split(':')[1],
            meridian = time.split(':')[0] >= 12 ? 'pm' : 'am',

            modalDay = $('.js-freee-30-min__day'),
            modalMonth = $('.js-freee-30-min__month'),
            modalTime = $('.js-freee-30-min__time');


        modalDay.text(day);
        modalMonth.text(month);
        modalTime.text( hours + ':' + minutes + ' ' + meridian );   
        
        var timezoneSelect = $('.js-timezone');   
        
        
    
            if(timezoneSelect.val() == '') {
                //open modal               
                $('.timezone-modal').arcticmodal({
                    beforeOpen: function(data, el) {
                        $('.main-header').addClass('modal-open');
                    },
                    afterClose: function(data, el) {
                        $('.main-header').removeClass('modal-open');
                    },
                });
            } else {                
                $('.freee-30-min-modal').arcticmodal({
                    beforeOpen: function (data, el) {
                        $('body').addClass('modal-open');
                    },
                    afterClose: function (data, el) {      
                        $('body').removeClass('modal-open');
                    }
                });
            }

        return false;
    });

    $('.js-freee-30-min__no').on('click', function() {
        $.arcticmodal('close');
        return false;
    })

    $('.js-freee-30-min__yes').on('click', function() {
        $.arcticmodal('close');

        // $('.js-calendar-block').hide();
        $('.js_fs_pd_other_fields').slideDown(900);

        setTimeout(function() {
            var top = $('.js_fs_pd_other_fields').offset().top -104;
            $('body,html').animate({scrollTop: top}, 1300);
        }, 10);        

        return false;   
    })

 

    


   

    if(document.getElementById('submit_free_session')) {
        document.getElementById('submit_free_session').addEventListener('click', function(e) {
            validateee(e.target);
        }, false);
    }

    $('input[name="addictions"],input[name="other_issues"]').on('change', function(e) {
        TextAreaHidden(e.target);
    });

    /////>>>>>
    var canvas, context, tool;

    document.getElementById('clear').addEventListener('click', function() {
        context.clearRect(0, 0, canvas.width, canvas.height);
    }, false);

    document.getElementById('save_canvas_signature').addEventListener('click', function() {
        $.arcticmodal('close');
    }, false);

    if(window.addEventListener) {
        window.addEventListener('load', function () {

            function img_update () {

                document.getElementById("canvasData").value = canvas.toDataURL("image/png");
            }


            function init () {

                canvas = document.getElementById('tablet');

                if (!canvas) {
                    console.log('Error Canvas!');
                    return;
                }

                if (!canvas.getContext) {
                    console.log('Error Canvas! Canvas.getContext');
                    return;
                }


                context = canvas.getContext('2d');
                context.strokeStyle = "#000000";
                context.lineJoin = "round";
                context.lineWidth = 4;
                if (!context) {
                    console.log('Error Canvas! Canvas.getContext');
                    return;
                }

                tool = new tool_pencil();
                canvas.addEventListener('mousedown', ev_canvas, false);
                canvas.addEventListener('mousemove', ev_canvas, false);
                canvas.addEventListener('mouseup',   ev_canvas, false);
            }


            function tool_pencil () {
                var tool = this;
                this.started = false;


                this.mousedown = function (ev) {
                    context.beginPath();
                    context.moveTo(ev._x, ev._y);
                    tool.started = true;
                };

                this.mousemove = function (ev) {
                    if (tool.started) {
                        context.lineTo(ev._x, ev._y);
                        context.stroke();
                    }
                };

                this.mouseup = function (ev) {
                    if (tool.started) {
                        tool.mousemove(ev);
                        tool.started = false;
                        img_update();
                    }
                };
            }

            function ev_canvas (ev) {
                /*if (ev.layerY < 500 && (ev.layerX || ev.layerX == 0)) { // Firefox
                    ev._x = ev.layerX;
                    ev._y = ev.layerY;
                } else if (ev.offsetX || ev.offsetX == 0) { // Opera*/
                    ev._x = ev.offsetX;
                    ev._y = ev.offsetY;
                /*}*/

                var func = tool[ev.type];
                if (func) {
                    func(ev);
                }
            }

            init();

        }, false); }

    /////<<<<<

    

    if ($('.js-search-select').length) {
        $('.js-search-select').selectize();
    }    

    // input free 30 min focus values
    $(".js-facebookMask").focus(function() {   
        $(this).val('https://www.facebook.com/')
    });
    $(".js-instagramMask").focus(function() {   
        $(this).val('@')
    })
    $(".js-whatsAppMask").focus(function() {   
        $(this).val('+')
    })

    // вызов календаря на английском языке
    if ($('.calendar').length) {
      
        $('.calendar').datepicker({language: 'en'});    
    }

//  modal windows
    $('.js-modal-link').on('click', function () {
        var t = $(this).attr('modal-taret');
        $.arcticmodal('close');
        $('.' + t).arcticmodal({
            beforeOpen: function (data, el) {

                $('body').addClass('modal-open');
            },
            afterClose: function (data, el) {
                // $.dateSelect.hide();
                $('body').removeClass('modal-open');
            }
        });
        return false;
    });


    // agree checkbox
    $('.js-agree-checkbox').on('change', function () {
        $(this).closest('form').find('.reg-btn').prop("disabled", !$(this).is(':checked'));
    });


//contact.html
    $.valHooks.textarea = {
        get: function (elem) {
            return elem.value.replace(/\r?\n/g, "\r\n");
        }
    };


    var contactForm = $('.message-me'),
        agreeCheckbox = contactForm.find('.js-checkbox-agree'),
        submitButton = contactForm.find('input[type=submit]');


    agreeCheckbox.on('change', function () {
        submitButton.prop("disabled", !$(this).is(':checked'));
    });


    contactForm.on('submit', function () {
        var requiredFields = $(this).find('input:required, textarea:required'),
            InputEmail = $(this).find('input[type=email]'),
            formNotice = $(this).find('.notice'),
            emailValue = InputEmail.val(),
            flag = false;

        if (requiredFields.length > 0) {

            requiredFields.each(function () {
                var InputValue = $(this).val();
                if (InputValue == '') {
                    flag = true;
                    $(this).addClass('no-valid');
                } else {
                    $(this).removeClass('no-valid');
                }
            });

            if (flag) {
                formNotice.finish().fadeIn(0).addClass('message-error');
                formNotice.text('All fields are required').delay(2500).fadeOut(800, function () {
                    $(this).removeClass('message-error');
                });
            } else if (emailValue != '' && !validateEmail(emailValue)) {
                InputEmail.addClass('no-valid');

                formNotice.finish().fadeIn(0).addClass('message-error');
                formNotice.text('Email is incorrect').delay(2500).fadeOut(800, function () {
                    $(this).removeClass('message-error');
                });

            } else {
                // send data, then clear form
                var formFields = $(this).find('input:not([type=submit]), textarea');

                //ajax headers
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                //send ajax
                $.ajax({
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    type: 'POST',
                    dataType: 'json'
                })
                    .done(function (html) {
                        //if send is Ok
                        if(html.status == 'success') {
                            formFields.each(function () {
                                $(this).val('');
                            });
                            //open modal
                            $('.thanx-modal-contact').arcticmodal({
                                beforeOpen: function(data, el) {
                                    $('.main-header').addClass('modal-open');
                                },
                                afterClose: function(data, el) {
                                    $('.main-header').removeClass('modal-open');
                                },
                            });
                        }
                    });
            }

        }
        return false;
    });


    // select choice
    var inputSelectedOption = $('.contact-info .selected-option');
    $('#way-contact').on('change', function () {
        $(".nice-select [data-value='0']").addClass('disabled');
        if ($(this).val() != '0') {
            var selectedItemText = $('#way-contact option:selected').text();
            inputSelectedOption.slideDown('slow');
            setTimeout(function () {
                inputSelectedOption.attr('placeholder', 'Your ' + selectedItemText + ' user name*').prop('required', true);
            }, 500);
        }
    });
    // select choice end
//contact.html end


    $('.signup-form').on('submit', function () {

        var form = $(this),
            name = form.find('[name="name"]'),
            email = form.find('[name="email"]'),
            email2 = form.find('[name="email2"]'),
            freebies = form.find('[name="freebies"]'),
            notEmpty = email.val() != '' || email2.val() != '' || name.val() != '';

        form.find('[name]').removeClass('err');
        form.find(".form-row-notify-text").remove();


        form.find('[name]').each(function () {
            if ($(this).val() == '') {
                $(this).addClass('err');
            }
        });

        //ajax headers
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        if (notEmpty && validateEmail(email.val()) && email.val() == email2.val()) {
            $.ajax({
                type: "POST",
                url: $(form).attr('action'),
                data: $(form).serialize(),
                dataType: 'json',
                success: function (response) {
                    if (response.status == 'success') {
                        form.find('[name]').val('');
                        form.find('.reg-btn').prop('disabled', true);
                        form.find('.checkbox-input').prop('checked', false);
                        $.arcticmodal('close');
                        $('.thanx-modal').arcticmodal({
                            beforeOpen: function (data, el) {

                                $('body').addClass('modal-open');
                            },
                            afterClose: function (data, el) {
                                // $.dateSelect.hide();
                                $('body').removeClass('modal-open');
                            }
                        });
                    } else if (response.status == 'error') {
                        throwNotify(form, ".form-wrap", response.message, true);
                    }
                }
            })
        }

        else if (!notEmpty) {
            throwNotify(form, ".form-wrap", "All fields are required", true);

        }
        else if (!validateEmail(email.val())) {
            email.addClass('err');
            throwNotify(form, ".form-wrap", "Email incorrect", true);
        }
        else if (email.val() != email2.val()) {
            email2.addClass('err');
            throwNotify(form, ".form-wrap", "Email addresses don\'t match", true);
        }

        return false;
    });


    $('.js-mt-form').on('submit', function () {
        var form = $(this),
            name = form.find('[name="name"]'),
            email = form.find('[name="email"]'),
            errorMessage = '',
            notEmpty = email.val() != '' || name.val() != '',
            re = /^[-a-z0-9!#$%&'*+/=?^_`{|}~]+(\.[-a-z0-9!#$%&'*+/=?^_`{|}~]+)*@([a-z0-9]([-a-z0-9]{0,61}[a-z0-9])?\.)*(aero|arpa|asia|biz|cat|com|coop|edu|gov|info|int|jobs|mil|mobi|museum|name|net|org|pro|tel|travel|[a-z][a-z])$/,
            emailInCorrect = !re.test(email.val());  
            

        name.each(function () {
            if ($(this).hasClass('error')) {
                $(this).removeClass('error');
            }
            if ($(this).val() == '') {
                $(this).addClass('error');
                errorMessage = 'Please fill out the fields above to continue';
            }
        });

        email.each(function () {
            if ($(this).hasClass('error')) {
                $(this).removeClass('error');
            }
            if ($(this).val() == '') {
                $(this).addClass('error');
                errorMessage = 'Please fill out the fields above to continue';
            }
        });

        if (errorMessage === '' && emailInCorrect) {            
            email.addClass('error');
            errorMessage = 'E-mail is incorrect';
        }
        if (errorMessage != '') {
            form.find(".errorMessage").remove();
            form.append('<div class="errorMessage">' + errorMessage + '</div>');
            let errorBlock = form.find(".errorMessage");
            errorBlock.fadeIn('fast');
            errorBlock.delay(3000).fadeOut(800, function () {
                $(this).remove();
            });
        } else {


            //ajax headers
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            //send ajax
            $.ajax({
                url: $(this).attr('action'),
                data: $(this).serialize(),
                type: 'post',
                dataType: 'json'
            })
            .done(function (html) {
                //if send is Ok
                if(html.status == 'success') {
                    name.val('');
                    email.val('');
                    if($('.js-t-section').length) {
                        $('.js-t-section').removeClass('t-section-full');
                        var top = $('.root-el').offset().top -104;
                        $('body,html').animate({scrollTop: top}, 1300);
                    } 
                }
            });

        }
        return false;
    });


    $('.quiz-form').on('submit', function () {
        var form = $(this),
            name = form.find('[name="name"]'),
            email = form.find('[name=email]'),
            errorMessage = '',
            notEmpty = email.val() != '' || name.val() != '',
            re = /^[-a-z0-9!#$%&'*+/=?^_`{|}~]+(\.[-a-z0-9!#$%&'*+/=?^_`{|}~]+)*@([a-z0-9]([-a-z0-9]{0,61}[a-z0-9])?\.)*(aero|arpa|asia|biz|cat|com|coop|edu|gov|info|int|jobs|mil|mobi|museum|name|net|org|pro|tel|travel|[a-z][a-z])$/,
            emailInCorrect = !re.test(email.val());
        // Проверяем наличие пустых полей
        form.find('[name]').each(function () {
            if ($(this).hasClass('error')) {
                $(this).removeClass('error');
            }
            if ($(this).val() == '') {
                $(this).addClass('error');
                errorMessage = 'Please fill out the fields above to continue';
            }
        });

        // Если пустых полей нет, тогда проверяем на корректность первый инпут с имейлом
        if (errorMessage === '' && emailInCorrect) {
            email.addClass('error');
            errorMessage = 'E-mail is incorrect';
        }

        // Выводим ошибку, если она была найдена
        if (errorMessage != '') {
            form.find(".errorMessage").remove();
            form.append('<div class="errorMessage">' + errorMessage + '</div>');
            form.css('position', 'relative');
            let errorBlock = form.find(".errorMessage");
            errorBlock.css({
                'position': 'absolute',
                'bottom': '-45px',
                'width': '100%',
                'text-align': 'center',
                'font-size': '17px',
                'color': '#c90808',
                'display': 'none',
            });
            errorBlock.fadeIn('fast');
            errorBlock.delay(3000).fadeOut(800, function () {
                $(this).remove();
            });
        }
        else {
            var user = { 'name': name.val(), 'email': email.val()};
            localStorage.setItem('user', JSON.stringify(user));
            location.href = '/quiz-step-two';            
        }
        return false;
    });

// take_the_quiz_2.html
    var testForm = $('.quiz2-form-test'),
        testVisibleArea = testForm.find('.test-visible-area'),
        testContainer = testVisibleArea.find('.test-container'),
        currentTestHeight = $('#question-1').height(),
        testNavigationItems = testForm.find('.test-navigation-item'),
        indexCurrentTest = 0,
        testContainerMargin = 0;

    testVisibleArea.height(currentTestHeight);
    var smallDevice = $(window).height() < 750;

    function testVisibleAreaPadding(indexNextTest1, indexNextTest) {
        if (indexNextTest == 0) {
            if (indexCurrentTest == testNavigationItems.length - 1) {
                testVisibleArea.addClass('padding-bottom');
            }
            testVisibleArea.removeClass('padding-top');
        }
        else if (indexNextTest == testNavigationItems.length - 1) {
            if (indexCurrentTest == 0 && !smallDevice) {
                testVisibleArea.addClass('padding-top');
            }
            testVisibleArea.removeClass('padding-bottom');
        } else {
            if (!testVisibleArea.hasClass('padding-top') && !smallDevice) {
                testVisibleArea.addClass('padding-top');
            }
            if (!testVisibleArea.hasClass('padding-bottom')) {
                testVisibleArea.addClass('padding-bottom');
            }
        }
    }

    function goToNextTestItem(indexNextTest, nextTestHeight) {
        if (indexCurrentTest > indexNextTest) {
            for (var i = indexCurrentTest - 1; i >= indexNextTest; i--) {
                testContainerMargin += $(testNavigationItems.eq(i).attr('href')).height();
            }
        } else {
            for (var i = indexCurrentTest; i < indexNextTest; i++) {
                testContainerMargin -= $(testNavigationItems.eq(i).attr('href')).height();
            }
        }
        testContainer.css('margin-top', testContainerMargin + 'px');
        indexCurrentTest = indexNextTest;
        currentTestHeight = nextTestHeight;
        testVisibleArea.height(currentTestHeight);
    }

    function comeBackToUnansweredTest(start, end) {
        for (var i = start; i < end; i++) {
            if (!testNavigationItems.eq(i).hasClass('done')) {
                var nextTestHeightId = testNavigationItems.eq(i).attr('href'),
                    nextTestHeight = $(nextTestHeightId).height();
                testVisibleAreaPadding(indexCurrentTest, i);
                testNavigationItems.eq(indexCurrentTest).removeClass('active');
                goToNextTestItem(i, nextTestHeight);
                testNavigationItems.eq(indexCurrentTest).addClass('active');
                break;
            }
        }
    }


    testNavigationItems.on('click', function () {

        testNavigationItems.eq(indexCurrentTest).removeClass('active');
        $(this).addClass('active');

        var indexNextTest = $(this).index(),
            nextTestHeightId = $(this).attr('href'),
            nextTestHeight = $(nextTestHeightId).height();

        testVisibleAreaPadding(indexCurrentTest, indexNextTest);

        if (indexNextTest != indexCurrentTest) {
            goToNextTestItem(indexNextTest, nextTestHeight);
        }
        return false;
    });


    var testRadioButton = testContainer.find('input:radio'),
        testAnswersCount = 0,
        testItemsCount = testNavigationItems.length,
        testRound = false;

    testRadioButton.on('change', function () {
        var testNumber = testForm.find('.test-navigation-item.active');

        if (!testNumber.hasClass('done')) {
            testNumber.addClass('done');
            testAnswersCount++;
        }

        if (indexCurrentTest < testItemsCount && !testRound) {
            if (!testNavigationItems.eq(indexCurrentTest + 1).hasClass('done') && testAnswersCount < testItemsCount) {
                testContainerMargin -= currentTestHeight;
                testContainer.css('margin-top', testContainerMargin + 'px');
                testVisibleAreaPadding(indexCurrentTest, indexCurrentTest + 1);
                testNavigationItems.eq(indexCurrentTest).removeClass('active');
                indexCurrentTest++;
                testNavigationItems.eq(indexCurrentTest).addClass('active');
                var currentTestHeightId = testNavigationItems.eq(indexCurrentTest).attr('href');
                currentTestHeight = $(currentTestHeightId).height();
                testVisibleArea.height(currentTestHeight);
            } else {
                comeBackToUnansweredTest(indexCurrentTest, testItemsCount);
            }
        }

        if (indexCurrentTest == testItemsCount || testRound) {
            testRound = true;
            comeBackToUnansweredTest(0, testItemsCount - 1);
        }

        if (testAnswersCount == testItemsCount) {
            var scrollTo = $('.quiz2-test-btn').offset().top;
            $('body, html').animate({scrollTop: scrollTo}, 'slow');
            $('.quiz2-test-btn').addClass('show');
        }
    });


    testForm.on('submit', function () {
        var testPointsNumber = 0;
        var checkedRadio = $(this).find('input[type=radio]:checked');
        checkedRadio.each(function () {
            testPointsNumber += +$(this).val();
        });
        var resultStatus = '',
            resultDescription = '';
        if (testPointsNumber <= 50) {
            resultStatus = "You Got: You're a Tough Nut to Crack — Not Easily Hypnotizable";
            resultDescription = "You're an independent thinker that is not easily swayed. Your mind is controlled and analytical, you don’t give yourself over to outside influences easily. It will be harder for you to let go, and learn to go with it, but with a skilled therapist and a desire to achieve results, hypnosis will still be a useful tool. There are specific techniques that can be used on those of us with a more analytical mind, that can overcome the challenge of low susceptibility to hypnosis. SHARE BADGE I got: ATough Nut to Crack — Not Easily Hypnotizable. Are you in the 10% of people that are highly hypnotizable. Intelligence and creativity better your chances."
        }
        if (testPointsNumber > 50 && testPointsNumber <= 100) {
            resultStatus = "You Got: You're in Good Company — Totally Hypnotizable."
            resultDescription = "Like the majority of the population, you're a good candidate for hypnosis. You may not be able to visualize a full scene in vibrant detail, but you’re still able to put yourself there and go with it. Your mind is creative, but sometimes analytical at the same time. Your openness to the idea of hypnosis will help you get results with this technique. Stay open and give yourself a chance to create a new reality for yourself with this powerful tool. SHARE BADGE I got: I’m in Good Company, Totally Hypnotizable. Are you in the 10% of people that are highly hypnotizable. Intelligence and creativity better your chances."
        }
        if (testPointsNumber > 100) {
            resultStatus = "You Got: The Best of the Best - Highly Hypnotizable."
            resultDescription = "People who are susceptible to hypnosis are often highly intelligent and creative. You’re a hypnotherapist's dream client. You have a natural ability to stay focused and find visualization easier than most people. With these skills in hand, you're well placed to achieve high levels of personal success; you‘re able to envision a goal, and then go for it. In fact, you are so highly suggestible that you owe it to yourself to make sure you are feeding yourself positive messages."
        }
        $('.result-result-status').text(resultStatus);
        $('.result-result-description').text(resultDescription);
        $('meta[property="og:title"]').attr('content', resultStatus);
        $('meta[property="og:description"]').attr('content', resultDescription);
        $('.test-result-block').slideDown('slow');

        setTimeout(function () {
            var scrollTo = $('.test-result-block').offset().top;
            $('body, html').animate({scrollTop: scrollTo}, 'slow');
        }, 600);

        // send data, then clear form
        var formFields = $(this).find('input:not([type=submit]), textarea');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var user = JSON.parse(localStorage.getItem('user'));
        $.ajax({
            url: $(this).attr('action'),
            data: {fullname:user.name,email:user.email, result:resultStatus},
            type: 'POST',
            dataType: 'json'
        });


        return false;
    });
// take_the_quiz_2.html end


// rapid_transformation.html
    // slider
    if ($('.slick-slider').length > 0) {
        $('.slick-slider').slick({
            dots: true,
        });
        $('.slick-slider').slick('slickGoTo', 2);
    }

    // Скрываем все панели, у которых нет класа "active"
    $('.accordeon dt').each(function () {
        var currentDT = $(this);
        if (!currentDT.hasClass('active')) {
            currentDT.next().hide();
        }
    });

    // Определяет вид/тип аккордеона и выполняет его
    $('.accordeon dt').on('click', function () {
        var currentAccordeonDT = $(this);
        var accordeon = $(this).parent().parent();
        var allAccordeonDT = accordeon.find('dt');
        if (!accordeon.hasClass('simple')) {
            allAccordeonDT.not(this).removeClass('active').next().slideUp();
        }
        if (currentAccordeonDT.hasClass('active')) {
            if (!accordeon.hasClass('one-visible') || accordeon.hasClass('simple'))
                currentAccordeonDT.removeClass('active').next().slideUp();
        } else {
            currentAccordeonDT.addClass('active').next().slideDown();
        }
    });

    // questions fade in
    if ($('.rt-main-content .questions').length > 0) {
        var questionsBlock = $('.rt-main-content .questions h2');
        var questionsItems = $('.rt-main-content .question-quote');
        var offset = questionsBlock.offset().top + questionsBlock.outerHeight(true);
        var duration = 300;

        function questionsFadeIn(item) {
            item.each(function (index) {
                $(this).addClass('show');
            });
        }

        if ($(window).scrollTop() + document.body.clientHeight >= offset) {
            questionsFadeIn(questionsItems);
        } else {
            $(window).scroll(function () {
                var scrolltop = $(this).scrollTop();
                if (scrolltop + document.body.clientHeight >= offset) {
                    questionsFadeIn(questionsItems);
                }
            });
        }
    }


    // form of popap message me
    $('.form-message-me').on('submit', function () {
        var requiredFields = $(this).find('input:required'),
            emailField = $(this).find('input[type=email]'),
            notificationBlock = $(this).find('.mm-notification'),
            errorMessage = '';

        if (requiredFields.length > 0) {
            requiredFields.each(function () {
                if ($(this).hasClass('err')) {
                    $(this).removeClass('err');
                }
                if ($(this).val() == '') {
                    $(this).addClass('err');
                    errorMessage = 'These fields are required';
                }
            });
            if (errorMessage == '' && !validateEmail(emailField.val())) {
                emailField.addClass('err');
                errorMessage = 'Email is incorrect';
            }
            if (errorMessage != '') {
                notificationBlock.text(errorMessage).finish().fadeIn(800).delay(2500).fadeOut(800);
            }
        }
            if (errorMessage == '') {
                //ajax headers
                var form = $(this);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                //send ajax
                $.ajax({
                    url: $(form).attr('action'),
                    data: $(form).serialize(),
                    type: 'POST',
                    dataType: 'json'
                })
                    .done(function (html) {
                        //if send is Ok
                        if (html.status == 'success') {
                            $.arcticmodal('close');
                            $('.thanx-modal-contact').arcticmodal({
                                beforeOpen: function(data, el) {
                                    $('.main-header').addClass('modal-open');
                                },
                                afterClose: function(data, el) {
                                    $('.main-header').removeClass('modal-open');
                                },
                            });

                        }
                    });
            }
        return false;
    });
// rapid_transformation.html end


// index.html
    if ($('#js-type-it').length > 0) {
        var stopp = 5000;
        new TypeIt('#js-type-it', {
            strings: ["there", "free", "healed", "whole", "enough", "you", "happy"],
            speed: 150,
            nextStringDelay: [150, 2500],
            breakLines: false,
            lifeLike: true,
            loop: true,
            loopDelay: 2800,
        });
    }

// index.html end


// testimonials.html

    var $testimonialsSlider = $('.js-testimonials-slider');
    if ($testimonialsSlider.length > 0) {
        $testimonialsSlider.slick({
            infinite: true,
            arrows: false,
            dots: true,
            autoplay: true,
            autoplaySpeed: 5000,
        });
    }

// testimonials.html end


    /* blog_inner_page.html */

    var $popularPostsSlider = $('.js_bip_pp_slider');
    if ($popularPostsSlider.length > 0) {
        $popularPostsSlider.slick({
            infinite: true,
            arrows: false,
            dots: true,
            autoplay: true,
            autoplaySpeed: 5000,
        });
    }

    /* blog_inner_page.html end */


    /* free_session.html */

    $('.js_fs_btn_next_step').on('click', function () {
        $('.error-message').hide();
        var error = null;

        if($('input[name="date_free_session"]').val() == "") {
            error = 'Please choose the date';
        }
        if($('input[name="city"]').val() == "") {
            error = 'Please choose the city';
        }
        if(!error) {
            $('.js_fs_pd_other_fields').slideDown(900);
        }
        else {
            $('.error-message').text(error).fadeIn(500);
        }
        return false;
    });

    /* free_session.html end */


    var hamburger = document.querySelector('.hamburger'),
        smallDeviceBody = document.querySelector('body');
    if (hamburger) {
        hamburger.addEventListener('click', function () {
            if (smallDeviceBody.classList.contains('small-device-menu')) {
                smallDeviceBody.classList.remove('small-device-menu');
                this.classList.remove('is-active');
            } else {
                smallDeviceBody.classList.add('small-device-menu');
                this.classList.add('is-active');
            }
        });
    }


    // email regExp valid
    function throwNotify(form, wrap, text, isErr) {
        var e = (isErr) ? ' err' : '';
        form.find(".form-row-notify-text").remove();
        form.find(wrap).append('<div class="form-row-notify-text' + e + '">' + text + '</div>');
        form.find(".form-row-notify-text").delay(2500).fadeOut(800, function () {
            $(this).remove()
        });
        return false;
    };
    // email regExp valid
    function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    };

    // Скрывает textarea по нажатию на checkbox
    function TextAreaHidden(obj) {
        var elemHide = document.getElementById(obj.id + '-ta');
        if (obj.checked) {            // если чекбокс выбран
            $(elemHide).slideDown();    // то разворачиваем наш элемент
        }
        else {
            $(elemHide).slideUp();      // иначе сворачиваем
        }
    };

    // $('#select-address').on('change', function(){
    //   $(".nice-select [data-value='0']").addClass('disabled');
    // });

    // В контейнер, где находится кнопка, на которую мы нажимаем, в конец добавляется элемент div с текстом и пропадает (становиться прозрачным) через 30000 милисекунд
    function createMessage(container, blockClass, message) {
        var msgElem = document.createElement('div');            // создаем блок, в который мы поместим наше сообщение
        if (container.lastChild.className == "error-message") { // если элемент с таким классом уже есть
            container.removeChild(container.lastChild);         // то удаляем его
        }
        msgElem.className = blockClass;                         // задаем блоку класс
        msgElem.innerHTML = message;                            // и записываем в него наше сообщение
        $(container.appendChild(msgElem)).fadeIn('slow');       // непосредственно добавляем наш элемент в контейнер
        container.lastChild.style.opacity = '1';
        $(container.lastChild).delay(3000).fadeOut('slow');     // по истечению 30000 милисекунд блок становится прозачным
    }

    function validateee(btn) {
        
        
        var allElems = document.getElementById('personalData').elements;      // берем id формы на которой находятся наши инпуты
        var flag = false;                                                     // флаг, если тру, то будем создавать и выводить сообщение
        document.querySelector('.fs-form-section .nice-select').classList.remove('input-error');
        for (var i = allElems.length - 1; i >= 0; i--) {                      // перебираем все элементы формы
            allElems[i].classList.remove('input-error');                                         // на тот случай, если у них уже был задан класс с ошибкой, то удаляем его
            if (allElems[i].hasAttribute('required') && !allElems[i].value) {   // если у блока есть атрибут required и он пустой
                allElems[i].classList.add('input-error');                            // добавляем ему класс, который сделаем ему красную рамку
                flag = true;                                                      // делаем флаг тру - говорим, что нужно вывести сообщение
            }
            if (allElems[i].value === '0' && allElems[i].id === 'select-address') { // проверяем список
                document.querySelector('.fs-form-section .nice-select').classList.add('input-error');             // select не отображается, вместо него отображается div ы классом nice-select, пожтому его и обрабатываем
                flag = true;
            }
        }
        
        if (flag) {                                                           // создаем наше сообщение
            createMessage(btn.parentNode, 'error-message', 'Please fill in the required fields on the page');
            setTimeout(function () {
                document.querySelector('.fs_form_about').scrollIntoView({behavior: "smooth", block: "start"});
            }, 1500);
            return;
        }
        // var correctEmail = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        var correctEmail = /^[-a-z0-9!#$%&'*+/=?^_`{|}~]+(\.[-a-z0-9!#$%&'*+/=?^_`{|}~]+)*@([a-z0-9]([-a-z0-9]{0,61}[a-z0-9])?\.)*(aero|arpa|asia|biz|cat|com|coop|edu|gov|info|int|jobs|mil|mobi|museum|name|net|org|pro|tel|travel|[a-z][a-z])$/;

        if (!correctEmail.test(allElems.email.value)) {                               // проверка имейла на правильность
            createMessage(btn.parentNode, 'error-message', 'E-mail is incorrect');      // если неправильно, то создаем сообщение
            allElems.email.classList.add('input-error');                                   // и задаем ему класс, который сделает ему рамку
            setTimeout(function () {
                document.querySelector('.fs_form_about').scrollIntoView({behavior: "smooth", block: "start"});
            }, 1500);
            return;
        };

        var emailConfirm = document.querySelector('input[name=confirm_email]');

        if (!correctEmail.test(emailConfirm.value)) {                               // проверка имейла на правильность
            createMessage(btn.parentNode, 'error-message', 'E-mail is incorrect');      // если неправильно, то создаем сообщение
            emailConfirm.classList.add('input-error');                                   // и задаем ему класс, который сделает ему рамку
            setTimeout(function () {
                document.querySelector('.fs_form_about').scrollIntoView({behavior: "smooth", block: "start"});
            }, 1500);
            return;
        };

        if(allElems.email.value !== emailConfirm.value) {
            createMessage(btn.parentNode, 'error-message', 'Email addresses don\'t match');
            allElems.email.classList.add('input-error');
            emailConfirm.classList.add('input-error');                                 
            setTimeout(function () {
                document.querySelector('.fs_form_about').scrollIntoView({behavior: "smooth", block: "start"});
            }, 1500);
            return;
        }    

        if($("#canvasData").val() == "") {
            createMessage(btn.parentNode, 'error-message', 'Please make a signature');
            return;
        }

        //ajax headers
        var formFields = $(this).find('input:not([type=submit]), textarea');
        var form = document.getElementById('personalData');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //send ajax
        $.ajax({
            url: $(form).attr('action'),
            data: $(form).serialize(),
            type: 'POST',
            dataType: 'json'
        })
        .done(function (html) {
            //if send is Ok
            if(html.status == 'success') {
                for (var i = allElems.length - 1; i >= 0; i--) {                              // если все данные введены правильно и нас не выкинуло с функции
                    allElems[i].value = '';                                                     // то мы очищаем форму
                }
                // createMessage(btn.parentNode, 'success-message', 'Thank you');                // и выводим сообщение об успешной операции
                //$('.thanx-modal-contact').arcticmodal();
                sessionStorage.setItem('statusPopup','1');
                window.location.reload();
            }
            else {}
        });

    }

    // program_quit_smoking.html

    if (document.querySelector('.sc-fotm')) {
        var savingCalculator = document.querySelector('.sc-fotm'),
            inputCigaretePackCost = savingCalculator.querySelector('.js-pack-cost'),
            inputPackPerDay = savingCalculator.querySelector('.js-pack-per-day'),
            calculateButton = savingCalculator.querySelector('.js-sc-submit');

        function getChar(event) {
            if (event.which == null) {
                if (event.keyCode < 32) return null;
                return String.fromCharCode(event.keyCode)
            }

            if (event.which != 0 && event.charCode != 0) {
                if (event.which < 32) return null;
                return String.fromCharCode(event.which);
            }

            return null;
        }

        inputCigaretePackCost.onkeypress = function (e) {

            if (this.classList.contains('input-error')) {
                this.classList.remove('input-error');
            }

            e = e || event;

            if (e.ctrlKey || e.altKey || e.metaKey) return;

            var chr = getChar(e);

            if (chr == null) return;

            if ((chr < '0' || chr > '9') && chr != '.') {
                return false;
            }
            if (chr == '.' && this.value.indexOf('.') >= 0 || chr == '.' && this.value.length <= 0) {
                return false;
            }
        };

        inputPackPerDay.onkeypress = function (e) {

            if (this.classList.contains('input-error')) {
                this.classList.remove('input-error');
            }

            e = e || event;

            if (e.ctrlKey || e.altKey || e.metaKey) return;

            var chr = getChar(e);

            if (chr == null) return;

            if ((chr < '0' || chr > '9') && chr != '.') {
                return false;
            }
            if (chr == '.' && this.value.indexOf('.') >= 0 || chr == '.' && this.value.length <= 0) {
                return false;
            }
        };

        calculateButton.onclick = function (event) {

            event = event || window.event;

            if (event.preventDefault) {
                event.preventDefault();
            } else {
                event.returnValue = false;
            }

            var cigaretePackCost = +inputCigaretePackCost.value,
                packPerDay = +inputPackPerDay.value,
                costsPerDay = cigaretePackCost * packPerDay,
                calculationResults = document.querySelectorAll('.sc-saving-result-number'),
                resultBlock = document.querySelector('.sc-saving-results'),
                notificationBlock = savingCalculator.querySelector('.js-notification'),
                notificationText = 'Please fill in the gaps';

            if (cigaretePackCost != 0 && packPerDay != 0) {
                for (var i = 0; i < calculationResults.length; i++) {
                    if (calculationResults[i].classList.contains('per-week')) {
                        calculationResults[i].innerHTML = Math.round(7 * costsPerDay);
                    }
                    if (calculationResults[i].classList.contains('per-month')) {
                        calculationResults[i].innerHTML = Math.round(31 * costsPerDay);
                    }
                    if (calculationResults[i].classList.contains('per-year')) {
                        calculationResults[i].innerHTML = Math.round(365 * costsPerDay);
                    }
                }
                resultBlock.classList.add('show');
            } else {
                if (cigaretePackCost == 0) {
                    inputCigaretePackCost.classList.add('input-error');
                }
                if (packPerDay == 0) {
                    inputPackPerDay.classList.add('input-error');
                }
                notificationBlock.innerHTML = notificationText;
                setTimeout(function () {
                    notificationBlock.innerHTML = '';
                }, 2500);
            }
        }
    }

    // program_quit_smoking.html end

    // index.html

    $('.main-content').on('click','.review-block',function(event) {
        event = event || window.event;
        if (event.preventDefault) {
            event.preventDefault();
        } else {
            event.returnValue = false;
        }

        var reviewItem = event.target.closest('.review-block');
        var detailedReview = reviewItem.querySelector('.detailed-review');
        detailedReview.style.display = "block";
        setTimeout(function () {
            detailedReview.classList.add('show');
        }, 100);

        reviewItem.style.marginBottom = 60 + detailedReview.offsetHeight + 'px';

        var closeButtons = detailedReview.querySelectorAll('.js-dt-close');
        closeButtons.forEach(function (closeButton) {
            closeButton.addEventListener('click', function () {
                detailedReview.classList.remove('show');
                setTimeout(function () {
                    detailedReview.style.display = "none";
                }, 400);
                setTimeout(function () {
                    reviewItem.style.marginBottom = '30px';
                }, 300);
            });
        });
    });

    // index.html end


    /* testimonials.html */

    var inputFile = document.querySelector('.js-fas-btn-upload');
    var previewUploadedImages = document.querySelector('.fas-uploaded-images');
    if (inputFile) {
        inputFile.style.opacity = 0;
        inputFile.addEventListener('change', updateImageDisplay);

        function updateImageDisplay() {

            var curFiles = inputFile.files;

            var fasImagesList = document.querySelector('.fas-images-list');
            var list;
            if (fasImagesList) {
                list = fasImagesList;
            } else {
                list = document.createElement('ol');
                list.className = 'fas-images-list clearfix';
            }

            previewUploadedImages.appendChild(list);

            for (var i = 0; i < curFiles.length; i++) {
                var buttonDeleteListItem = document.createElement('div');
                buttonDeleteListItem.className = 'fas-btn-delete-image';
                buttonDeleteListItem.innerHTML = '&times;';
                var listItem = document.createElement('li');
                listItem.className = 'fas-img-container';
                if (validFileType(curFiles[i])) {
                    var image = document.createElement('img');
                    image.src = window.URL.createObjectURL(curFiles[i]);

                    listItem.appendChild(image);
                    listItem.appendChild(buttonDeleteListItem);
                }
                list.appendChild(listItem);
            }
            var btnDeleteImage = document.querySelectorAll('.fas-btn-delete-image');
            btnDeleteImage.forEach(function (item) {
                item.addEventListener('click', deleteUploadedImage);
            });
        }
    }

    var fileTypes = [
        'image/jpeg',
        'image/pjpeg',
        'image/png'
    ]

    function validFileType(file) {
        for (var i = 0; i < fileTypes.length; i++) {
            if (file.type === fileTypes[i]) {
                return true;
            }
        }

        return false;
    }

    function returnFileSize(number) {
        if (number < 1024) {
            return number + 'bytes';
        } else if (number > 1024 && number < 1048576) {
            return (number / 1024).toFixed(1) + 'KB';
        } else if (number > 1048576) {
            return (number / 1048576).toFixed(1) + 'MB';
        }
    }

    function deleteUploadedImage() {
        var imageBlock = this.parentNode;
        imageBlock.parentNode.removeChild(imageBlock);
    }

    /* testimonials.html end */


    /* blog_inner_page.html */

// send audio form validation
    var sendAudioForm = document.querySelector('.bip_form_sa'),
        saHideNotify;
    if (sendAudioForm) {
        sendAudioForm.addEventListener('submit', function (event) {
            event = event || window.event;
            if (event.preventDefault) {
                event.preventDefault();
            } else {
                event.returnValue = false;
            }

            var emailInput = this.querySelector('input[name="email"]'),
                emailInputValue = emailInput.value,
                saFormNotification = this.querySelector('.bip_form_notification'),
                notifyText = '';

            if (saFormNotification.classList.contains('show')) {
                saFormNotification.classList.remove('show');
                clearTimeout(saHideNotify);
            }

            if (emailInputValue == "") {
                notifyText = 'The field is required';
            } else if (!validateEmail(emailInputValue)) {
                notifyText = 'Email is incorrect';
            } else {
                //ajax
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: $(sendAudioForm).attr('action'),
                    data: $(sendAudioForm).serialize(),
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 'success') {
                            emailInput.value = '';
                            $.arcticmodal('close');             
                            $('.thanks-audio-modal').arcticmodal({
                                beforeOpen: function(data, el) {
                                    $('.main-header').addClass('modal-open');
                                },
                                afterClose: function(data, el) {
                                    $('.main-header').removeClass('modal-open');
                                },
                            });
                        } else if (response.status == 'error') {
                            notifyText = response.message,
                            emailInput.value = '';
                            if (notifyText != '') {
                                saFormNotification.innerHTML = notifyText;
                                saFormNotification.classList.add('show');
                                saHideNotify = setTimeout(function () {
                                    saFormNotification.classList.remove('show');
                                }, 2500);
                            }
                        }
                    }
                });
            }
            if (notifyText != '') {
                saFormNotification.innerHTML = notifyText;
                saFormNotification.classList.add('show');
                saHideNotify = setTimeout(function () {
                    saFormNotification.classList.remove('show');
                }, 2500);
            }
        });
    }

// comment form

    var commentsBlock = document.querySelector('.bip_comments');
    if (commentsBlock) {
        var postComments = commentsBlock.querySelectorAll('.js_add_comment'),
            blockNewComment = commentsBlock.querySelector('.bip_new_comment_block'),
            fieldWithCommentId = blockNewComment.querySelector('input[name="comment_id"]'),
            ncHideNotify;

        postComments.forEach(function (commentItem) {
            var replyButton;
            if (commentItem.classList.contains('reg-btn')) {
                replyButton = commentItem;
            } else {
                replyButton = commentItem.querySelector('.reply_btn');
            }
            if(replyButton) {
                replyButton.addEventListener('click', function (e) {                  
                    



                    if (fieldWithCommentId.value != commentItem.dataset.commentId ||
                        fieldWithCommentId.value == commentItem.dataset.commentId && !blockNewComment.classList.contains('show')) {

                        blockNewComment.querySelector('.bip_form_notification').classList.remove('show');
                        clearTimeout(ncHideNotify);
                        clearFormFields(blockNewComment.querySelectorAll('.bip_nc_field'));

                        if (blockNewComment.classList.contains('show')) {
                            blockNewComment.classList.remove('show');
                            blockNewComment.style.display = "none";
                            var prevComment = commentsBlock.querySelector('.js_add_comment[data-comment-id="' + fieldWithCommentId.value + '"]');
                            prevComment.classList.remove('animate');
                            prevComment.style.marginBottom = '55px';
                        }

                        fieldWithCommentId.value = commentItem.dataset.commentId;

                        var commentItemPosX = commentItem.offsetTop,
                            commentItemHeight = commentItem.offsetHeight;

                        blockNewComment.style.display = 'block';
                        setTimeout(function () {
                            blockNewComment.classList.add('show');
                        }, 100);
                        commentItem.classList.add('animate');

                        blockNewComment.style.top = commentItemPosX + commentItemHeight + 55 + 'px';
                        commentItem.style.marginBottom = blockNewComment.offsetHeight + 110 + 'px';
                    }

                    console.log(fieldWithCommentId.value);

                });
            }

        });

        blockNewComment.querySelector('.js_fnc_close_btn').addEventListener('click', function () {
            blockNewComment.classList.remove('show');
            blockNewComment.classList.add('animate');
            setTimeout(function () {
                blockNewComment.classList.remove('animate');
            }, 400);
            setTimeout(function () {
                blockNewComment.style.display = "none";
            }, 400);            
            var commentItem = commentsBlock.querySelector('.js_add_comment[data-comment-id="' + fieldWithCommentId.value + '"]');       
            setTimeout(function () {
                commentItem.style.marginBottom = '55px';
            }, 200);
        });

        var formNewComment = commentsBlock.querySelector('.bip_form_new_comment');
        if (formNewComment) {
            formNewComment.addEventListener('submit', function (event) {
                event = event || window.event;
                if (event.preventDefault) {
                    event.preventDefault();
                } else {
                    event.returnValue = false;
                }

                var formFileds = this.querySelectorAll('.bip_nc_field'),
                    emailField = this.querySelector('.bip_nc_field[type="email"]'),
                    ncFormNotification = this.querySelector('.bip_form_notification'),
                    notifyText = '';

                if (formFileds) {

                    if (ncFormNotification.classList.contains('show')) {
                        ncFormNotification.classList.remove('show');
                        clearTimeout(ncHideNotify);
                    }

                    formFileds.forEach(function (field) {
                        if (field.classList.contains('error')) {
                            field.classList.remove('error');
                        }
                        if (field.hasAttribute('required') && field.value == '') {
                            field.classList.add('error');
                            notifyText = 'These fields are required';
                        }
                    });

                    if (notifyText == '' && !validateEmail(emailField.value)) {
                        notifyText = 'Email is incorrect';
                        emailField.classList.add('error');
                    }

                    if (notifyText != '') {
                        ncFormNotification.innerHTML = notifyText;
                        ncFormNotification.classList.add('show');
                        ncHideNotify = setTimeout(function () {
                            ncFormNotification.classList.remove('show');
                        }, 2500);
                    } else {

                        //ajax headers
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        var fData = new FormData();

                        formFileds.forEach(function(elem) {
                            if(elem.type == "file") {
                                fData.append(elem.name, elem.files[0]);
                            }
                            else {
                                fData.append(elem.name, elem.value);

                            }
                        });
                        //send ajax
                        $.ajax({
                            url: $(event.target).closest('form').attr('action'),
                            data: fData,
                            type: 'post',
                            processData: false,  // tell jQuery not to process the data
                            contentType: false,  // tell jQuery not to set contentType
                            dataType: 'json'
                        })
                            .done(function (html) {
                                //if send is Ok
                                if(html.status == 'success') {
                                    setTimeout(clearFormFields, 800, formFileds);


                                    blockNewComment.classList.remove('show');
                                    blockNewComment.classList.add('animate');
                                    setTimeout(function () {
                                        blockNewComment.classList.remove('animate');
                                    }, 400);
                                    setTimeout(function () {
                                        blockNewComment.style.display = "none";
                                    }, 400);            
                                    var commentItem = commentsBlock.querySelector('.js_add_comment[data-comment-id="' + fieldWithCommentId.value + '"]');
                                    setTimeout(function () {
                                        commentItem.style.marginBottom = '55px';
                                    }, 200);

                                    $('.thanks-comment-modal').arcticmodal();
                                }
                            });

                        return false;

                    }
                }
            });
        }
    }

    function clearFormFields(fields) {
        fields.forEach(function (field) {
            if (field.classList.contains('error') && field.type != 'hidden') {
                field.classList.remove('error');
            }
            field.value = '';
        });
    }


    var agreeCheckboxTerms = $('.js-agree-checkbox-terms'),
        agreeCheckboxTermsMessage = $('.js-agree-checkbox-terms__message');

    if (agreeCheckboxTerms.length) {
        var addStoryModal = agreeCheckboxTerms.closest('.js-add-story-modal'),
            addStoryModalSubmit = addStoryModal.find('input[type=submit]');

        addStoryModalSubmit.on('click', function () {

            if (agreeCheckboxTerms.prop('checked')) {
                agreeCheckboxTermsMessage.fadeOut();
            } else {
                agreeCheckboxTermsMessage.fadeIn();
                return false;
            }
        })
    }

    var video = document.getElementsByTagName('video');

    Array.prototype.forEach.call(video, function (item) {
        if (video) {
            new Plyr(item, {
                settings: []
            });
        }
    })

    var firstScreen = $('#first-screen'),
        header = $('.js-header');

    if (firstScreen.length) {

        var firstScreenHeight = 0 //firstScreen.outerHeight();

        $(window).on('scroll', function (ev) {
            if ($(this).scrollTop() > firstScreenHeight) {
                header.removeClass('fadeOutUp fadeIn');
                header.addClass('fix-header fadeInDown');
            } else if ($(this).scrollTop() == 0) {
                header.removeClass('fix-header fadeOutUp');
                header.addClass('fadeIn');
            } else {
                header.removeClass('fadeInDown');
                header.addClass('fadeOutUp');
            }
        });
    };


    var inputUploadPhoto = $('.js-input-upload');

        inputUploadPhoto.on('change', function() {
            var fakeInputUpload = $(this).next();
            fakeInputUpload.val($(this).val());
        })



});   //jQuery end


/* blog_inner_page.html end */


// fix header

;(function () {


})();

// fix header end