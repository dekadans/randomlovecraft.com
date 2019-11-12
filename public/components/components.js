Vue.component('Sentence', {
    props : ['text', 'book', 'year'],
    template: `
        <div id="sentence">
            <h1 class="cover-heading">{{ text }}</h1>
            <p class="lead">&mdash; {{ book }} ({{ year }})</p>
        </div>
    `
});

Vue.component('Longform', {
    props : ['paragraphs'],
    template: `
        <div id="text">
            <p v-for="text in paragraphs">{{ text }}</p>
            
            <p>
                <button id="paragraph" class="btn btn-sm btn-outline-secondary shadow-none">Add paragraph</button>
            </p>
        </div>
    `
});


Vue.component('Switcher', {
    template: `
        <div id="switch" class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-secondary active shadow-none" v-on:click="$emit('mode','sentence')">
                <input type="radio" name="switch" data-id="sentence" autocomplete="off" checked> Sentence
            </label>
            <label class="btn btn-secondary shadow-none" v-on:click="$emit('mode','text')">
                <input type="radio" name="switch" data-id="text" autocomplete="off"> Text
            </label>
        </div>
    `
});


Vue.component('Refresh', {
    props : ['refreshTexts'],
    template: `
        <button v-on:click="refreshTexts()" class="btn btn-secondary shadow-none">Refresh</button>
    `
});


const app = new Vue({
    data : {
        initiated : false,
        mode : 'sentence',
        sentence : {
            sentence : 'Test',
            book : {
                id : '0000',
                name : 'Test',
                year : '1900'
            }
        },
        paragraphs : [
            'Text 1',
            'Text 2'
        ]
    },
    methods : {
        refreshSentence : async function() {
            const response = await fetch('/api/sentences?key=hej');
            const myJson = await response.json();
            this.sentence = myJson.data[0];
            this.initiated = true;
        }
    },
    mounted : function() {
        this.refreshSentence();
    },
    el: '#app'
});
