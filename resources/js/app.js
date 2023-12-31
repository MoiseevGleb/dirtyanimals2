import './bootstrap';
import { createApp } from 'vue/dist/vue.esm-bundler';
import Alpine from 'alpinejs'
import NewsComponent from "@/Components/NewsComponent.vue";

/*if (document.querySelector('#carousel')) {
    const carouselElement = document.querySelector('#carousel')

    const carousel = new bootstrap.Carousel(carouselElement, {
        interval: 2000,
        touch: true
    })
}*/

window.Alpine = Alpine
Alpine.start()

const app = createApp({})
app.component('news-component', NewsComponent)
app.mount("#app")
