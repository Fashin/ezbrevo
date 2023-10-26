<script setup>
    import Layout from "../../Components/Layout.vue"
</script>

<template>
    <layout>
        <div>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-400">
                    <thead class="text-xs text-white bg-slate-800">
                        <tr>
                            <th class="px-6 py-3 text-base">Nom</th>
                            <th class="px-6 py-3 text-base">Progression</th>
                            <th class="px-6 py-3 text-base">Date de début</th>
                            <th class="px-6 py-3 text-base">Date de fin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border bg-slate-600 border-gray-700 text-base text-white cursor-pointer hover:bg-slate-400 hover:text-slate-600">
                            <th class="px-6 py-4 font-medium whitespace-nowrap">
                                Test
                            </th>
                            <td class="px-6 py-4">
                                12/100
                            </td>
                            <td class="px-6 py-4">
                                10/10/2012
                            </td>
                            <td class="px-6 py-4">
                                10/10/2012
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </layout>
</template>