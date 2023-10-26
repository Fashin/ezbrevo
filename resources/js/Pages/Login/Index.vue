<script setup>
    import { reactive } from "vue"
    import { router } from "@inertiajs/vue3"

    const form = reactive({
        email: "",
        password: ""
    })

    const submit = () => {
        router.post('/login', form)
    }
</script>

<template>
    <div class="grid grid-cols-6">
        <div class="col-span-1"></div>
        <div class="bg-slate-600 col-span-4 h-screen flex justify-center">
            <form @submit.prevent="submit" class="flex flex-col w-full px-24 pt-12">
                <label for="email" class="text-white text-lg mb-2">Email</label>
                <input class="mb-6 h-8 rounded pl-2 focus:outline-none" type="email" name="email" v-model="form.email">

                <label for="password" class="text-white text-lg mb-2">Mot de passe</label>
                <input class="mb-6 h-8 rounded pl-2 focus:outline-none" type="password" name="password" v-model="form.password">

                <div class="flex justify-end">
                    <button type="submit" class="bg-white h-10 w-28 rounded-md">Valider</button>
                </div>
            </form>
        </div>
    </div>
</template>