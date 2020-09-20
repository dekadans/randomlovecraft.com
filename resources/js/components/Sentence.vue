<template>
    <div id="sentence">
        <h1 class="cover-heading">{{ text }}</h1>
        <p class="lead">&mdash; {{ book }} ({{ year }})</p>
    </div>
</template>

<script>
export default {
    props : ['text', 'book', 'year']
}
</script>

<style scoped>

</style>
