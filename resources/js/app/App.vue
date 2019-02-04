<template>
    <div class="root-el">
        <section class="t-section-step t-section-step-1">
            <div class="wrapper">
                <div class="t-content t-content-wrapper">
                    <h2>Step 1. What Are My Options?</h2>
                    <p>
                        Lay out ALL VERSIONS of the potential plans that you are considering. If one of the options has a few different variables, you need to separate them out into its own option. <br>
                        Eg. <br>
                        Option 1: <span>Quit work now, travel, then start masters degree in August in Manchester.</span> <br>
                        Option 2: <span>Quit work now, travel, then start masters degree in August in Madrid.</span> <br>
                        Option 3: <span>Accept new job opportunity in London (no travel, no masters).</span> <br>
                    </p>
                    <div class="t-input-group">

                        <div 
                            class="one-col__item"
                            v-for="(step, index) in steps"   
                            :key="step.id"              
                        >                        
                            <div class="t-step-option">                                
                                <input 
                                    type="text" 
                                    class="form-input t-input t-input-step" 
                                    placeholder="Eg. Moving to New York"                          
                                    v-model="steps[index].title"
                                >
                                <span class="t-step-option__count">Option {{index + 1}}:</span>
                            </div>                            
                        </div>

                        <div class="one-col__item">
                            <div class="t-step-option-add">
                                <button 
                                    class="step-option-add t-option-add button-step"
                                    @click="addStep"
                                >
                                    &#43; Add another option
                                </button>
                                <transition name="show-el">
                                    <span
                                        v-if="showMessageNextStepTitle"
                                        class="title-message"
                                    >Please fill in two first options</span>
                                </transition>
                            </div>      
                        </div>
                    </div>
                    <div class="center-wrap">
                        <button 
                            @click="nextStep('step-2')"                  
                            class="button-step step-add"
                            v-scroll-to="{
                                el: '#step-2',
                                container: 'body',
                                duration: 1100,
                                easing: 'linear'                                
                            }"
                        >
                            I'm ready for Step 2
                        </button>
                    </div>
                    <transition name="show-el">
                        <div
                            v-if="showMessageNextStep"
                            class="step-2-message">At least two fields required
                        </div> 
                    </transition>
                </div>
            </div>
       </section>
       <div id="step-2"></div>
       <transition name="show-el">
            <section 
                    v-if="showStep2"
                    class="t-section-step t-section-step-2" >
                    <div class="wrapper">
                        <div class="t-content t-content-wrapper">
                            <h2>Step 2. Evaluating The Good and Bad, and the Ugly</h2>
                            <p>
                                List out the pros and cons of each option. Then, give each item an IMPORTANCE rating out of ten.
                            </p>
                            <p>
                                Opportunity to travel might be an 8/10, and missing out on family events might only rate a 3/10 (sorry Mum!). This is your life, so include everything that is significant to you. When working through one of your options, try to have around same amount of pros and cons.                        
                            </p>

                            <div 
                                class="answers-block t-box"
                                v-for="(step, index) in steps"
                                :key="step.id"
                            >
                                <h3>Option {{index + 1}}: {{ steps[index].title }}</h3>
                                <div class="answers-group">
                                    <div class="flex-block">
                                        <div class="two-col__item">
                                            <h4>Pros</h4>
                                            <div 
                                                class="answers-item pros-item"
                                                v-for="(pros, prosIndex) in step.proses"
                                                :key="pros.id"  
                                            >
                                                <input type="text" class="form-input t-input t-input-answers" placeholder="Eg. Spending more time with the kids">
                                                <div class="answers-rating answers-rating-pros inline-list ">
                                                    <ul>                                   
                                                        <li 
                                                            v-for="(r, i) in 10"                     
                                                            @click="valueRaitingPros(i+1, index, prosIndex)"                    
                                                            class="js-answers-pros"     
                                                            v-bind:data-value="i"
                                                            :key="i" 
                                                        >
                                                            {{ r }}
                                                        </li>
                                                    </ul>                                   
                                                </div>
                                            </div>                                   
                                            <button 
                                                class="answers-option-add t-option-add button-step"
                                                @click="addPros(index)"
                                            >
                                                &#43; Add another
                                            </button>
                                        </div>
                                        <div class="two-col__item">
                                            <h4>Cons</h4>        
                                            <div 
                                                class="answers-item cons-item"
                                                v-for="(cons, consIndex) in step.conses"
                                                :key="cons.id"
                                            >
                                                <input type="text" class="form-input t-input t-input-answers" placeholder="Eg. No network there yet to promote my new biz">
                                                <div class="answers-rating answers-rating-cons inline-list">
                                                    <ul>                                   
                                                        <li
                                                            v-for="(r, i) in 10"      
                                                            @click="valueRaitingCons(i+1, index, consIndex)"
                                                            class="js-answers-cons"
                                                            v-bind:data-value="i"
                                                            :key="i"
                                                        >
                                                            {{ r }}                                                    
                                                        </li>
                                                    </ul>                                                                     
                                                </div>                                       
                                            </div>
                                            <button 
                                                class="answers-option-add t-option-add button-step cons-color"
                                                @click="addCons(index)"
                                            >
                                                &#43; Add another
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>                   

                            <div class="center-wrap">
                                <button 
                                    @click.once="nextStep('step-3')"
                                    class="button-step step-add"
                                    v-scroll-to="{
                                        el: '#step-3',
                                        container: 'body',
                                        duration: 1100,
                                        easing: 'linear'                                
                                    }"                                  
                                >I'm ready for Step 3</button>
                            </div>
                        </div>
                    </div>
            </section>
       </transition>
       <div id="step-3"></div>
       <transition name="show-el">
            <section 
                    v-if="showStep3"
                    class="t-section-step t-section-step-3">
                    <div class="wrapper">
                        <div class="t-content t-content-wrapper">
                            <h2>Step 3. The Results Speak For Themselves</h2>
                            <p>So, here you have it! Here is the low-down on where you're at.</p>
                            <p>
                                Now that you have a very clear picture of where you stand, you can stop the repetition of turning it over in your mind. Allow yourself the space to come to a clear and conscious decision with absolute certainty.
                            </p>                   

                            <div class="result-group">
                                <div class="flex-block">                    
                                    <div 
                                        v-for="(step, index) in steps"
                                        class="result-block t-box three-col__item"
                                        :key="step.id"
                                    >
                                        <h5>{{ steps[index].title }}</h5>
                                        <div class="result-diagram"> 
                                            <svg                                     
                                                v-bind:class="{ pros: valueSignP(index), cons: valueSignM(index) }"
                                                
                                                class="progress noselect" 
                                                x="0px" y="0px" viewBox="0 0 80 80">
                                                <path class="track" d="M5,40a35,35 0 1,0 70,0a35,35 0 1,0 -70,0" />
                                                <path 
                                                    v-bind:style="{'stroke-dashoffset': dashoffset(index)}"
                                                    class="fill" d="M5,40a35,35 0 1,0 70,0a35,35 0 1,0 -70,0" />                                          
                                            </svg>
                                            <div class="result-diagram-text">
                                                <span v-if="valueSignP(index)">+</span>
                                                <span v-else-if="valueSignM(index)">-</span>    
                                                {{ valueRaiting(index) }}                          
                                            </div>
                                        </div>
                                        <div class="flex-block jc-sb">
                                            <div class="result-count">
                                                <div class="result-count-name">Pros</div>
                                                <div class="result-count result-pos">+{{ step.resultRaitingPros }}</div>
                                            </div>
                                            <div class="result-count">
                                                <div class="result-count-name">Cons</div>
                                                <div class="result-count result-cons ">-{{ step.resultRaitingCons }}</div>
                                            </div>
                                        </div>
                                    </div>        
                                </div>
                            </div>
                            <p>I hope the above tool helped you in your decision-making! Please share on Facebook.                             
                                <a 
                                    data-layout="button" 
                                    onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=http://rani.bleecker.uk/the-ultimate-decision-making-tool.html','ventanacompartir', 'toolbar=0, status=0, width=650, height=450');"                                       
                                    class="t-link" 
                                    href="javascript: void(0);">
                                    <svg version="1.0" width="30px" height="30px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"     viewBox="0 0 32 32" enable-background="new 0 0 32 32" xml:space="preserve"><path fill="#3B5998" d="M16,0c8.8,0,16,7.2,16,16c0,8.8-7.2,16-16,16S0,24.8,0,16C0,7.2,7.2,0,16,0z"/><path fill="#FFFFFF" d="M17.9,11H20V8h-2.4v0C14.6,8.1,14,9.7,14,11.5h0V13h-2v3h2v8h3v-8h2.5l0.5-3H17v-0.9    C17,11.5,17.4,11,17.9,11z"/></svg>
                                </a>
                            </p>
                            <p>And, if you're ready to take action in your life, don't wait any longer. Go ahead and book a free 30 minute on-on-one private session with me now.</p>
                            <div class="center-wrap">
                                <a v-bind:href="getRoute('public-pages',['free-30-minutes'])" class="reg-btn t-book-btn">BOOK FREE SESSION</a>
                            </div>
                        </div>
                    </div>
                </section>
        </transition>
    </div>
</template>

<script>

import r from '../routes';

export default {
    data: function() {
        return{
            getRoute : r,
            steps: [
                {
                    title: '',
                    id: '9ed1a3b4-e7ec-11e8-9f32-f2801f1b9fd1',
                    proses: [{
                        raitingProsValue: 1,
                        id: '9ed1a9ea-e7ec-11e8-9f32-f2801f1b9fd1'
                    }],                
                    raitingPros: [1],
                    resultRaitingPros: 1,                

                    conses: [{
                        raitingConsValue: 1,
                        id: '9ed1ab52-e7ec-11e8-9f32-f2801f1b9fd1'                
                    }],                  
                    raitingCons: [1],
                    resultRaitingCons: 1,

                    resultRaitingAll: 0,
                    dashoffsetValue: 0,
                },
                {
                    title: '',
                    id: '9ed1a698-e7ec-11e8-9f32-f2801f1b9fd1',
                    proses: [{
                        raitingProsValue: 1,
                        id: '9ed1ac88-e7ec-11e8-9f32-f2801f1b9fd1'
                    }],                
                    raitingPros: [1],
                    resultRaitingPros: 1,                

                    conses: [{
                        raitingConsValue: 1,
                        id: '9ed1aee0-e7ec-11e8-9f32-f2801f1b9fd1'
                    }],                 
                    raitingCons: [1],
                    resultRaitingCons: 1,

                    resultRaitingAll: 0,
                    dashoffsetValue: 0,
                },            
            ],
            showStep2: false,
            showStep3: false,
            showMessageNextStepTitle: false,
            showMessageNextStep: false,
        }        
    },
    methods: {
        addStep: function(){
            if(this.steps[0].title != '' && this.steps[1].title != ''){
                this.showMessageNextStepTitle = false;
                this.showMessageNextStep = false;
                this.steps.push({
                    title: '',
                    id: this.$uuid.v1(),
                    proses: [{
                        raitingProsValue: 1,
                        id: this.$uuid.v1(),
                    }],
                    raitingProsValue: 1, 
                    raitingPros: [1],
                    resultRaitingPros: 1,

                    conses: [{
                        raitingConsValue: 1,
                        id: this.$uuid.v1(),
                    }],  
                    raitingConsValue: 1,               
                    raitingCons: [1],
                    resultRaitingCons: 1,

                    resultRaitingAll: 0,
                    dashoffsetValue: 0,
                });
            } else{
                this.showMessageNextStep = false;
                this.showMessageNextStepTitle = true;
            }
        },
        addPros: function(index){    
            this.steps[index].proses.push({
                raitingProsValue: 1,
            });
            this.steps[index].resultRaitingPros++;      
        },
        addCons: function(index){
            this.steps[index].conses.push({
                raitingConsValue: 1,
            });            
            this.steps[index].resultRaitingCons++;   
        },
        valueRaitingPros: function(i, index, prosIndex){
            this.steps[index].proses[prosIndex].raitingProsValue = i;       
            this.steps[index].raitingPros[prosIndex] = this.steps[index].proses[prosIndex].raitingProsValue;
            this.steps[index].resultRaitingPros = this.steps[index].raitingPros.reduce(function(sum, current) {
                return sum + current;
            }, 0);            
        },
        valueRaitingCons: function(i, index, consIndex){
            this.steps[index].conses[consIndex].raitingConsValue = i;       
            this.steps[index].raitingCons[consIndex] = this.steps[index].conses[consIndex].raitingConsValue;
            this.steps[index].resultRaitingCons = this.steps[index].raitingCons.reduce(function(sum, current) {
                return sum + current;
            }, 0);            
        },
        valueRaiting: function(index){
            return this.steps[index].resultRaitingAll = Math.abs(this.steps[index].resultRaitingPros - this.steps[index].resultRaitingCons);
        },
        valueSignP: function(index){            
            return this.steps[index].resultRaitingPros > this.steps[index].resultRaitingCons;
        },
        valueSignM: function(index){            
            return this.steps[index].resultRaitingPros < this.steps[index].resultRaitingCons;
        },
        dashoffset: function(index){
            var max = -219.99078369140625,
                k = 0;  
            (this.steps[index].conses.length > this.steps[index].proses.length) ? k = this.steps[index].conses.length*10 : k = this.steps[index].proses.length*10;
            return this.steps[index].dashoffsetValue = ((100 - (100*this.steps[index].resultRaitingAll)/k) / 100) * max;
        },
        nextStep: function(st) {
            if(st == 'step-2' && this.steps[0].title != '' && this.steps[1].title != ''){
                this.showStep2 = true;
                this.showMessageNextStep = false;
                this.showMessageNextStepTitle = false;
            } else{
                this.showMessageNextStepTitle = false;
                this.showMessageNextStep = true;
            }; 
            
            if(st == 'step-3'){
                this.showStep3 = true;
                this.showMessageNextStep = false;
                this.showMessageNextStepTitle = false;        
            }            
        },
    }
};
</script>
