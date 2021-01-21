<template>
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <NavHeader></NavHeader>
        <main role="main" class="inner cover my-4 text-center">
            <Sentence
                v-if="initiated && mode === 'sentence'"
                :text="sentence.sentence"
                :book="sentence.book.name"
                :year="sentence.book.year">
            </Sentence>
            <Longform
                v-if="initiated && mode === 'text'"
                :paragraphs="paragraphs"
                :max="maxNumberOfParagraphs"
                @add-paragraph="refreshText()">
            </Longform>
            <p v-if="!initiated" class="lead">
                Loading...
            </p>
        </main>

        <footer class="mastfoot mt-auto text-center">
            <div class="inner">
                <Switcher @mode="mode = $event"></Switcher>

                <Refresh :refresh-texts="refresh"></Refresh>
            </div>
        </footer>
    </div>
</template>

<script>
import NavHeader from "./components/NavHeader.vue";
import Longform from "./components/Longform.vue";
import Sentence from "./components/Sentence.vue";
import Switcher from "./components/Switcher.vue";
import Refresh from "./components/Refresh.vue";

export default {
    data : function () {
        return {
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
        }
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
            const response = await fetch('/api/sentences?limit=' + numberOfSentences);
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
    components : {
        NavHeader,
        Sentence,
        Longform,
        Switcher,
        Refresh
    }
}
</script>
