import DefaultComponent from './components/DefaultComponent';

const VuePlugin = {
  install (Vue, options) {
    Vue.provide('configuration', {
      ...options
    });
    Vue.component('default-component', DefaultComponent);
  }
};

if (typeof window !== 'undefined' && window.Vue) {
  window.Vue.use(VuePlugin);
}

export default VuePlugin;
