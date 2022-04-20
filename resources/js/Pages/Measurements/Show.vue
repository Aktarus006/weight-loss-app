<template>
    <AppLayout title="Measurement">
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    <div class="w-full px-12 py-8 md:w-1/3">
                        <ClientCard :client="client" />
                    </div>
                    <div class="w-full border-l md:w-2/3">
                        <MeasurementCard :measurement="measurement" />
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import ClientCard from '../Clients/Partials/ClientCard.vue';
import MeasurementCard from './Partials/MeasurementCard.vue';

let props = defineProps({
    measurement: Object,
    client: Object
})


</script>

<style lang="scss" scoped>
</style>
