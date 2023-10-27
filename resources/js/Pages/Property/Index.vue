<script setup>
    import { reactive, computed } from "vue"
    import { router,usePage } from "@inertiajs/vue3"
    import {useToast} from 'vue-toast-notification';
    import Layout from "../../Components/Layout.vue"
    import CustomButton from "../../Components/CustomButton.vue";
    import Modal from "../../Components/Modal.vue"
    import Cloud from "../../Icones/Cloud.vue";
    import Check from "../../Icones/Check.vue";
    import Loader from "../../Icones/Loader.vue";

    const page = usePage()
    const $toast = useToast()

    const user = computed(() => page.props.user)

    const props = defineProps({
        brevo_key: "",
        maxLeads: 0,
        currentLeads: 0
    })
    console.log(user.value)
    const form = reactive({
        brevo_key: props.brevo_key
    })
    let state = reactive({
        isVisible: false,
        lineColor: user.value.has_first_sync_leads ? 'green' : 'slate',
        maxLeads: props.maxLeads,
        currentLeads: props.currentLeads
    })

    const submitBrevoKey = () => {
        router.put(
            route('property.update_brevo_key'),
            form,
            {
                onSuccess: () => {
                    $toast.success('Votre clef Brevo à bien été mise à jour')
                }
            }
        );
    }

    const runSyncLeads = () => {
        state.isVisible = true

        router.post(route('property.sync_leads'), {}, {
            onSuccess: () => {
                state.isVisible = false
                state.lineColor = 'green'
            }
        })
    }

    const getCurrentLeads = () => {
        setTimeout(() => {
            router.post(route('property.get_sync_leads'), { maxLeads: state.maxLeads }, {
                onSuccess: (response) => {
                    const { props } = response

                    state = {
                        ...state,
                        currentLeads: props.currentLeads,
                        maxLeads: props.maxLeads,
                    }

                    if (props.stop_loop == "0")
                        getCurrentLeads()
                    else
                        state = {
                            ...state,
                            isVisible: false,
                            lineColor: 'green'
                        }
                }
            })
        }, 1000)
        
    }
</script>

<template>
    <layout>
        <div class="flex flex-col">
            <form @submit.prevent="submitBrevoKey" class="flex flex-col">
                <label class="mb-2 text-lg" for="brevo_key">Clef de connexion Brevo</label>
                <input class="border rounded h-8 pl-2" name="brevo_key" type="text" v-model="form.brevo_key">
                <div class="flex justify-end mt-4">
                    <button type="submit" class="bg-slate-600 text-white rounded px-4 py-2">Mettre à jour</button>
                </div>
            </form>
            <div v-if="brevo_key" class="flex justify-between mt-6">
                <p :class="'text-' + state.lineColor + '-600'">Synchronization de vos contacts</p>
                <custom-button :color="'bg-' + state.lineColor + '-600'" @onClick="runSyncLeads">
                    <cloud v-if="state.lineColor == 'slate'"/>
                    <check v-else/>
                </custom-button>
            </div>
        </div>
        <modal v-model:visible="state.isVisible" :hasClose="false">
            <div class="flex flex-col justify-center items-center">
                <loader class="text-sky-400 h-20 w-20"/>
            </div>
        </modal>
    </layout>
</template>