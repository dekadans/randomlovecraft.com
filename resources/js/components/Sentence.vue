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
    h1 {
        font-size: 1.75rem;
    }

    @media(max-width: 576px) {
        h1 {
            font-size: 1.25rem;
        }

        .lead {
            font-size: 1rem;
        }
    }
</style>
