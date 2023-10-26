<script setup>
    import VueTailwindDatepicker from "vue-tailwind-datepicker";
    import { TimePicker } from "vue-material-time-picker";
    import Layout from "../../Components/Layout.vue"
    import Modal from "../../Components/Modal.vue"
    import { reactive, ref } from "vue"

    const dateValue = ref([])
    const time = ref(null)
    const state = reactive({
        isVisible: false,
        name: "",
    })

    const onModalValidate = () => {

    }
</script>

<template>
    <layout>
        <div>
            <div class="mt-4">
                <button @click="state.isVisible = true">
                    Créer une nouvelle campagne
                </button>
            </div>
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
            <modal v-model:visible="state.isVisible"
                :hasValidate="true"
                @onClose="state.isVisible = false"
                @onValidate="onModalValidate"
            >
                <form @submit.prevent="null" class="flex flex-col">
                    <label for="name">Nom de la campagne</label>
                    <input name="name" type="text" v-model="state.name">

                    <label for="day_started_at">Jour du début de la campagne</label>
                    <!-- https://vue-tailwind-datepicker.com/theming-options.html -->
                    <vue-tailwind-datepicker v-model="dateValue" as-single />

                    <label for="hour_started_at">Heure du début de la campagne</label>
                    <!-- https://github.com/MatijaNovosel/vue-material-time-picker?ref=vuejsexamples.com -->
                    <time-picker v-model="time" hide-title="true" color="#475569" />

                    <label for="leads">Utilisateurs concernés</label>

                </form>
            </modal>
        </div>
    </layout>
</template>