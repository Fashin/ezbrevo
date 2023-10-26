<script setup>
    const { label } = defineProps({
        label: String
    })
</script>

<template>
    <div class="bg-slate-600 text-white cursor-pointer hover:bg-white hover:text-slate-600 flex items-center p-4">
        <slot/>
        <p class="text-xl ml-4 mb-1">{{ label }}</p>
    </div>
</template>