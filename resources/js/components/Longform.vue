<template>
    <div id="text">
        <p><em>A generated text composed of random sentences from the works of H.P. Lovecraft.</em></p>

        <p v-for="text in paragraphs">{{ text }}</p>

        <p v-if="paragraphs.length < max">
            <button @click="$emit('add-paragraph')" id="paragraph" class="btn btn-sm btn-outline-secondary shadow-none">Add paragraph</button>
        </p>
    </div>
</template>

<script>
export default {
    props : ['paragraphs', 'max']
}
</script>

<style scoped>

</style>
