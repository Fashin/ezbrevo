<script setup>
    import Gear from "../Icones/Gear.vue";
    import NewsPaper from "../Icones/NewsPaper.vue";
    import SidebarItem from "./SidebarItem.vue";
</script>

<template>
    <div class="grid grid-cols-12 h-screen overflow-hidden">
        <div class="col-span-2 bg-slate-600">
            <sidebar-item label="Campagnes">
                <news-paper/>
            </sidebar-item>
            <sidebar-item label="Propriétés">
                <gear/>
            </sidebar-item>
        </div>
        <div class="col-span-10 overflow-auto">

        </div>
    </div>
</template>