import './bootstrap';
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import ToastPlugin from 'vue-toast-notification';
import VueTailwindDatepicker from "vue-tailwind-datepicker";

// css
import 'vue-toast-notification/dist/theme-bootstrap.css';
import "vue-material-time-picker/dist/style.css";
import "vue-multiselect/dist/vue-multiselect.css";

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    return pages[`./Pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ToastPlugin)
      .use(VueTailwindDatepicker)
      .mount(el)
  },
})