<script setup>
    import { reactive, onMounted } from 'vue';
    import { store } from '../composables/useStore';
    import Routing from 'routing';

    import Loading from './Loading'

    const state = reactive({
        loading: false
    })

    const props = defineProps({
        
    })

    onMounted(() => {
        state.loading = true
        setTimeout(function(){
            state.loading = false
        }, 5000)
    });

</script>

<template>
    <loading v-if="state.loading"></loading>
    <div v-else class="text-center">
        This is my first Vue 3 component
    </div>
</template>
