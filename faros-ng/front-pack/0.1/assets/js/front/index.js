import './components/index';

import 'bootstrap';

import { createApp } from 'vue';
import VuePlugin from './libs/Vue/index';

if (document.querySelector('#app')) {
  createApp()
    .use(VuePlugin, {})
    .mount('#app');
}
