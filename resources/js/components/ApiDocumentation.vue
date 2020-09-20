<template>
    <div class="cover-container w-100 h-100 p-3 mx-auto">
        <NavHeader></NavHeader>

        <div id="swagger"></div>
    </div>
</template>

<script>
import NavHeader from "./NavHeader.vue";
import SwaggerUI from "swagger-ui";
import 'swagger-ui/dist/swagger-ui.css';

export default {
    components : {
        NavHeader
    },
    mounted() {
        SwaggerUI({
            dom_id: '#swagger',
            url: "/openapi.yaml"
        });
    }
}
</script>

<style scoped>
    #swagger {
        background-color: #ffffff;
        padding: 5px;
        margin: 20px 0;
    }
</style>
