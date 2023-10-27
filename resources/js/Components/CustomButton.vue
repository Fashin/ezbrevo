<script setup>
    defineEmits(['onClick'])

    const props = defineProps(['color'])
</script>

<template>
    <button @click="$emit('onClick')" :class="color + ' text-white rounded px-4 py-2'">
        <slot/>
    </button>
</template>