<template>
    <div id="switch" class="btn-group btn-group-toggle" data-toggle="buttons">
        <label class="btn btn-secondary active shadow-none" @click="$emit('mode','sentence')">
            <input type="radio" name="switch" data-id="sentence" autocomplete="off" checked> Sentence
        </label>
        <label class="btn btn-secondary shadow-none" @click="$emit('mode','text')">
            <input type="radio" name="switch" data-id="text" autocomplete="off"> Text
        </label>
    </div>
</template>

<script>
export default {
    name: "Switcher"
}
</script>
