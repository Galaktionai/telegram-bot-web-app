import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import { autoAnimatePlugin } from '@formkit/auto-animate/vue'

// require('./bootstrap.js')

const app = createApp(App)

app.use(router)
app.use(autoAnimatePlugin)

app.mount('#app')
