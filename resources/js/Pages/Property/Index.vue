<script setup>
    import Layout from "../../Components/Layout.vue"
    import { reactive } from "vue"
    import { router } from "@inertiajs/vue3"
    import {useToast} from 'vue-toast-notification';

    const $toast = useToast()
    const { brevo_key } = defineProps({
        brevo_key: ""
    })

    const form = reactive({
        brevo_key
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
        </div>
    </layout>
</template>