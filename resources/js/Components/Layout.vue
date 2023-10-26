<script setup>
    import Gear from "../Icones/Gear.vue";
    import NewsPaper from "../Icones/NewsPaper.vue";
    import Home from "../Icones/Home.vue";
    import SidebarItem from "./SidebarItem.vue";
</script>

<template>
    <div class="grid grid-cols-12 h-screen overflow-hidden">
        <div class="col-span-2 bg-slate-600">
            <sidebar-item label="Dashboard" link="home">
                <home/>
            </sidebar-item>
            <sidebar-item label="Campagnes" link="campaign.index">
                <news-paper/>
            </sidebar-item>
            <sidebar-item label="Propriétés" link="property.index">
                <gear/>
            </sidebar-item>
        </div>
        <div class="col-span-10 overflow-auto">
            <div class="px-12 pt-12">
                <slot/>
            </div>
        </div>
    </div>
</template>