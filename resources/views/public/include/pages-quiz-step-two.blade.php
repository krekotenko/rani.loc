<main class="main-content quiz2-main-content">
    <div id="first-screen" class="quiz2-first-screen">
        <div class="wrapper">
            <div class="content">
                <h1>{{$page->titleH1}}</h1>
                <p>
                    {!!$page->text!!}
                </p>
            </div>
        </div>
    </div>
    <div class="wrapper thin-wrap">
        <form action="{{route('public-tests-result-store')}}"  class="quiz2-form-test">
            <div class="test-navigation clearfix">
                <a href="#question-1"class="test-navigation-item active">1</a>
                <a href="#question-2"class="test-navigation-item">2</a>
                <a href="#question-3"class="test-navigation-item">3</a>
                <a href="#question-4"class="test-navigation-item">4</a>
                <a href="#question-5"class="test-navigation-item">5</a>
                <a href="#question-6"class="test-navigation-item">6</a>
                <a href="#question-7"class="test-navigation-item">7</a>
            </div>
            <div class="test-visible-area padding-bottom">
                <div class="test-container">
                    <div id="question-1" class="test-question">
                        <p>
                            1. Think of a food that you really dislike that has made you sick. Or a drink that you drank way too much of that made you vomit. Now that you have that in your mind...if I was to describe the characteristics of that item; it's taste, the smell, how it feels in your mouth etc. etc. how clearly can you imagine it? Do you start to feel repulsed?
                        </p>
                        <input type="radio" id="vividly" name="be-repulsed" value="15">
                        <label for="vividly">Vividly</label>
                        <br>
                        <input type="radio" id="pretty-clearly" name="be-repulsed" value="10">
                        <label for="pretty-clearly">Pretty clearly</label>
                        <br>
                        <input type="radio" id="not-feeling-it" name="be-repulsed" value="5">
                        <label for="not-feeling-it">Not feeling it</label>
                    </div>
                    <div id="question-2" class="test-question">
                        <p>
                            2. Have you ever been driving a car on a familiar route, and had the feeling you are on autopilot because you don't remember driving there?
                        </p>
                        <input type="radio" id="never" name="autopilot" value="5">
                        <label for="never">Never</label>
                        <br>
                        <input type="radio" id="all-the-time" name="autopilot" value="15">
                        <label for="all-the-time">All the time</label>
                        <br>
                        <input type="radio" id="it-was" name="autopilot" value="10">
                        <label for="it-was">I’ve had that happen</label>
                    </div>
                    <div id="question-3" class="test-question">
                        <p>
                            3. Try this experiment sitting up. While keeping your head where it is (and NOT tilting it up), roll your eyes right up to look at the highest point on the ceiling, just as if you were trying to look up at your own eyebrows. Keeping you eyeballs rolled right up as far as you can, close your eyelids down, over the top of your upward-looking eyes. Touch your eyelids with your fingertips. Do you feel your eyes moving back and forth or fluttering?
                        </p>
                        <input type="radio" id="no" name="eyes" value="5">
                        <label for="no">Not at all</label>
                        <br>
                        <input type="radio" id="little" name="eyes" value="10">
                        <label for="little">Just a bit</label>
                        <br>
                        <input type="radio" id="yes" name="eyes" value="35">
                        <label for="yes">Yes, totally</label>
                    </div>
                    <div id="question-4" class="test-question">
                        <p>
                            4. Do you ever get so engrossed in work or whatever you’re doing that lose track of time? So caught up in what you are focussed on that you forgot to eat, drink some water, or even look up from what you are doing?
                        </p>
                        <input type="radio" id="yes-2" name="engrossed" value="15">
                        <label for="yes-2">All the time</label>
                        <br>
                        <input type="radio" id="it-was-2" name="engrossed" value="10">
                        <label for="it-was-2">That has happened to me</label>
                        <br>
                        <input type="radio" id="no-2" name="engrossed" value="5">
                        <label for="no-2">No, I would never</label>
                    </div>
                    <div id="question-5" class="test-question">
                        <p>
                            5. Are you the type of person that gets totally engrossed in a movie, book or Facebook etc., or do you find yourself getting distracted because it’s hard to be still for so long?
                        </p>
                        <input type="radio" id="yes-3" name="distracted" value="5">
                        <label for="yes-3">I get distracted</label>
                        <br>
                        <input type="radio" id="no-3" name="distracted" value="15">
                        <label for="no-3">I get totally engrossed</label>
                        <br>
                        <input type="radio" id="somewhere" name="distracted" value="10">
                        <label for="somewhere">Somewhere in between the two</label>
                    </div>
                    <div id="question-6" class="test-question">
                        <p>
                            6. If your doctor/accountant/mechanic/dentist gives you instructions on what to do, do you…
                        </p>
                        <input type="radio" id="follow" name="instructions" value="15">
                        <label for="follow">Follow the instructions, because after all, they are the expert</label>
                        <br>
                        <input type="radio" id="some" name="instructions" value="10">
                        <label for="some">Take some of it on board</label>
                        <br>
                        <input type="radio" id="yourself" name="instructions" value="5">
                        <label for="yourself">Figure out what to do independently, you don't need their advice</label>
                    </div>
                    <div id="question-7" class="test-question">
                        <p>
                            7. Do you get really engrossed in emotional scenes in movies?
                        </p>
                        <input type="radio" id="no-4" name="movies" value="5">
                        <label for="no-4">No way</label>
                        <br>
                        <input type="radio" id="once" name="movies" value="10">
                        <label for="once">Yeah, I have once or twice</label>
                        <br>
                        <input type="radio" id="yes-4" name="movies" value="0">
                        <label for="yes-4">Absolutely</label>
                    </div>
                </div>
            </div>
            <!-- <br> -->
            <input type="submit" class="reg-btn quiz2-test-btn" value="Show my results">
        </form>
    </div>
    <div class="test-result-block">
        <div class="wrapper thin-wrap">
            <div class="result-result-status"></div>
            <div class="result-result-description"></div>
            <div class="test-share-block">
                <span class="share">share:</span>
                <a data-layout="button" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=http://rani.bleecker.uk/making-tool.html','ventanacompartir', 'toolbar=0, status=0, width=650, height=450');" href="javascript: void(0);">
                    <svg version="1.1" id="test-facebook-share" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                            <g>
                                <g>
                                    <path d="M448,0H64C28.704,0,0,28.704,0,64v384c0,35.296,28.704,64,64,64h192V336h-64v-80h64v-64c0-53.024,42.976-96,96-96h64v80
                                        h-32c-17.664,0-32-1.664-32,16v64h80l-32,80h-48v176h96c35.296,0,64-28.704,64-64V64C512,28.704,483.296,0,448,0z"/>
                                </g>
                            </g>
                        </svg>
                </a>
            </div>
        </div>
    </div>
</main>