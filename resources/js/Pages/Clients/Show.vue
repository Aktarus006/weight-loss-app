<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import ClientMeasurementsTable from '../Measurements/Partials/ClientMeasurementsTable.vue';
import ClientCard from './Partials/ClientCard.vue';

let props = defineProps({
    client: Object,
    measurements: Object,
})
</script>

<template>
    <AppLayout title="Client">
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    <div class="w-full px-12 pt-8 md:w-1/3">
                        <ClientCard :client="client" />

                    </div>
                    <div class="w-full border-l md:w-2/3">
                        <ClientMeasurementsTable :measurements="measurements" />

                    </div>

                </div>
            </div>
        </div>
    </AppLayout>
</template>



<style lang="scss" scoped>
</style>
