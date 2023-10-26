<script setup>
    import { computed } from "vue"

    const { label, link } = defineProps({
        label: String,
        link: String
    })

    const linkToRoute = computed(() => (route(link)))
</script>

<template>
    <a :href="linkToRoute">
        <div class="bg-slate-600 text-white cursor-pointer hover:bg-white hover:text-slate-600 flex items-center p-4">
            <slot/>
            <p class="text-xl ml-4 mb-1">{{ label }}</p>
        </div>
    </a>
</template>