<script setup>
    import VueTailwindDatepicker from "vue-tailwind-datepicker";
    import { TimePicker } from "vue-material-time-picker";
    import Layout from "../../Components/Layout.vue"
    import Modal from "../../Components/Modal.vue"
    import CustomButton from "../../Components/CustomButton.vue"
    import { reactive, ref } from "vue"

    const dateValue = ref([])
    const time = ref(null)
    const dateFormatter = ref({
        date: 'DD / MM / YYYY'
    })
    const state = reactive({
        isVisible: false,
        isVisibleTime: false,
        name: "",
        template_id: ""
    })

    const onModalValidate = () => {

    }
</script>

<template>
    <layout>
        <div>
            <div class="mt-4 flex justify-end">
                <custom-button @onClick="state.isVisible = true" color="bg-slate-600" class="mb-4">
                    Créer une nouvelle campagne
                </custom-button>
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
                <form @submit.prevent="null" class="flex flex-col items-start w-full">
                    <label for="name" class="mb-2">Nom de la campagne</label>
                    <input name="name" type="text" v-model="state.name" class="w-full rounded mb-4">

                    <label for="template_id" class="mb-2">ID du template</label>
                    <input type="text" name="template_id" v-model="state.template_id" class="w-full rounded mb-4">

                    <div class="mb-4 w-full flex flex-col items-start">
                        <label for="day_started_at" class="mb-2">Jour du début de la campagne</label>
                        <!-- https://vue-tailwind-datepicker.com/theming-options.html -->
                        <vue-tailwind-datepicker v-model="dateValue" :formatter="dateFormatter" as-single />
                    </div>

                    <div class="mb-4 w-full flex flex-col items-start">
                        <label for="hour_started_at" class="mb-2">Heure du début de la campagne</label>
                        <input type="text" name="hour_started_at" :value="time" class="w-full rounded" @click="state.isVisibleTime = true">
                        <!-- https://github.com/MatijaNovosel/vue-material-time-picker?ref=vuejsexamples.com -->
                        <div class="w-full flex justify-center">
                            <time-picker v-if="state.isVisibleTime"
                                v-model="time"
                                hide-title="true"
                                color="#475569"
                                @change="state.isVisibleTime = false"
                            />
                        </div>
                    </div>

                    <label for="leads">Utilisateurs concernés</label>

                </form>
            </modal>
        </div>
    </layout>
</template>