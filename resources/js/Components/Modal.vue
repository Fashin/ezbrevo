<script setup>
    defineProps({
        visible: {
            type: Boolean,
            required: true,
            default: false
        },
        hasValidate: {
            type: Boolean,
            required: false,
            default: false
        },
        hasClose: {
            type: Boolean,
            required: false,
            default: true
        }
    })
    defineEmits(['onClose', 'onValidate'])
</script>

<template>
    <transition class="modal" name="fade">
        <div v-if="visible">
            <div @click="$emit('onClose', false)" class="absolute bg-black opacity-70 inset-0 z-0"></div>
            <div class="w-full max-w-lg p-3 relative mx-auto my-auto rounded-xl shadow-lg bg-white">
                <div>
                    <div class="text-center p-3 flex-auto justify-center leading-6">
                        <slot/>
                        <div class="p-3 mt-2 text-center space-x-4 md:block">
                            <button v-if="hasClose" @click="$emit('onClose', false)"  class="mb-2 md:mb-0 bg-slate-500 border border-slate-500 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-md hover:shadow-lg hover:bg-slate-600">
                                Fermer
                            </button>
                            <button v-if="hasValidate"
                                @click="$emit('onValidate')"
                                class="mb-2 md:mb-0 bg-green-500 border border-green-500 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-md hover:shadow-lg hover:bg-green-600"
                            >
                                Valider
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<style>
.fade-enter,
.fade-leave-to {
  opacity: 0;
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 500ms ease-out;
}
</style>