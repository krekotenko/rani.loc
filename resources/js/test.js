import Vue from 'vue'
import App from './app/App.vue'
import VueScrollTo from'vue-scrollto'
import UUID from 'vue-uuid'

Vue.use(VueScrollTo)
Vue.use(UUID)
if(document.getElementById('app')) {
    new Vue({
        el: '#app',
        render: function(h){
            return h(App);
        }
    });

    document.addEventListener('DOMContentLoaded', function(){

        var app = document.querySelector('.root-el');
        // add hover and click to raiting
        // mouseover
        app.addEventListener('mouseover', function(event){
            var target = event.target;
            if(target.classList.contains('js-answers-pros')){
                var listPros = target.parentElement.children,
                    listProsArray = [].slice.call(listPros),
                    targetValue = target.dataset.value;

                listProsArray.forEach(function(item){
                    if(targetValue >= item.dataset.value){
                        item.style.color = '#6eb1ba'
                    } else {
                        item.style.color = '#999999'
                    }
                });
            };
            if(target.classList.contains('js-answers-cons')){
                var listPros = target.parentElement.children,
                    listProsArray = [].slice.call(listPros),
                    targetValue = target.dataset.value;

                listProsArray.forEach(function(item){
                    if(targetValue >= item.dataset.value){
                        item.style.color = '#e7a29dcc'
                    } else {
                        item.style.color = '#999999'
                    }
                });
            }
        });
        // mouseout
        app.addEventListener('mouseout', function(event){
            var target = event.target;
            if(target.classList.contains('js-answers-pros')){
                var listPros = target.parentElement.children,
                    listProsArray = [].slice.call(listPros);

                listProsArray.forEach(function(item){
                    item.style.color = '#999999'
                });
            };
            if(target.classList.contains('js-answers-cons')){
                var listPros = target.parentElement.children,
                    listProsArray = [].slice.call(listPros);

                listProsArray.forEach(function(item){
                    item.style.color = '#999999'
                });
            };
        });
        // click
        app.addEventListener('click', function(event){
            var target = event.target;
            if(target.classList.contains('js-answers-pros')){
                var listPros = target.parentElement.children,
                    listProsArray = [].slice.call(listPros),
                    targetValue = target.dataset.value;

                listProsArray.forEach(function(item){
                    if(targetValue >= item.dataset.value){
                        item.classList.add('selected-pros')
                    } else {
                        item.classList.remove('selected-pros')
                    }
                });
            };
            if(target.classList.contains('js-answers-cons')){
                var listPros = target.parentElement.children,
                    listProsArray = [].slice.call(listPros),
                    targetValue = target.dataset.value;

                listProsArray.forEach(function(item){
                    if(targetValue >= item.dataset.value){
                        item.classList.add('selected-cons')
                    } else {
                        item.classList.remove('selected-cons')
                    }
                });
            }
        });
        // end
    })
}
