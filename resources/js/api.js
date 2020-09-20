import Vue from 'vue';
import ApiDocumentation from "./components/ApiDocumentation.vue";

new Vue({
    el : '#api',
    render(h) {
        return h('ApiDocumentation');
    },
    components : {
        ApiDocumentation
    }
});
