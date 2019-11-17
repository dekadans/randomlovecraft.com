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
    props : ['paragraphs', 'max'],
    template: `
        <div id="text">
            <p v-for="text in paragraphs">{{ text }}</p>
            
            <p v-if="paragraphs.length < max">
                <button @click="$emit('add-paragraph')" id="paragraph" class="btn btn-sm btn-outline-secondary shadow-none">Add paragraph</button>
            </p>
        </div>
    `
});


Vue.component('Switcher', {
    template: `
        <div id="switch" class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-secondary active shadow-none" @click="$emit('mode','sentence')">
                <input type="radio" name="switch" data-id="sentence" autocomplete="off" checked> Sentence
            </label>
            <label class="btn btn-secondary shadow-none" @click="$emit('mode','text')">
                <input type="radio" name="switch" data-id="text" autocomplete="off"> Text
            </label>
        </div>
    `
});


Vue.component('Refresh', {
    props : ['refreshTexts'],
    template: `
        <button @click="refreshTexts()" class="btn btn-secondary shadow-none">Refresh</button>
    `
});


const app = new Vue({
    data : {
        apiKey : apiKey,
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
        paragraphs : [],
        sentencesPerParagraph : 4,
        maxNumberOfParagraphs : 3
    },
    methods : {
        refresh : function() {
            if (this.mode === 'sentence') {
                this.refreshSentence();
            } else {
                this.refreshText(false);
            }
        },
        refreshSentence : async function() {
            const response = await this.getSentences(1);
            this.sentence = response[0];
        },
        refreshText : async function(addToStack = true) {
            const response = await this.getSentences(this.sentencesPerParagraph);

            if (!addToStack) {
                this.paragraphs = [];
            }

            this.addParagraph(response);
        },
        getSentences : async function(numberOfSentences = 1) {
            const response = await fetch('/api/sentences?n=' + numberOfSentences, {
                headers : {
                    'X-Api-key' : this.apiKey
                }
            });
            const jsonResponse = await response.json();
            return jsonResponse.data;
        },
        addParagraph : function(sentences) {
            let paragraph = '';
            for (let i = 0; i < sentences.length; i++) {
                paragraph += ' ' + sentences[i].sentence;
            }
            this.paragraphs.push(paragraph);
        }
    },
    mounted : function() {
        const promise = this.getSentences(this.sentencesPerParagraph+1);
        promise.then((sentences)  => {
            this.sentence = sentences.pop();
            this.addParagraph(sentences);

            this.initiated = true;
        })
    },
    el: '#app'
});
