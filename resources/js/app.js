import './bootstrap';
import {createApp} from 'vue';

import { library } from '@fortawesome/fontawesome-svg-core';
import {faPlus, faTrash} from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import App from './components/App.vue'

library.add(faPlus, faTrash);

const app = createApp(App)
app.component('font-awesome-icon', FontAwesomeIcon)

app.mount('#app')