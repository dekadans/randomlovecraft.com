import Vue from 'vue';
import NavHeader from "./components/NavHeader.vue";
import SwaggerUI from "swagger-ui";
import 'swagger-ui/dist/swagger-ui.css';

new Vue({
    el : '#api',
    render(h) {
        return h('NavHeader');
    },
    mounted() {
        SwaggerUI({
            dom_id: '#swagger',
            url: "/openapi.yaml"
        });
    },
    components : {
        NavHeader
    }
});
