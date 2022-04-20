<template>
    <AppLayout title="Measurements">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Measurements
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <MeasurementsTable :measurements="measurements" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import MeasurementsTable from './Partials/MeasurementsTable.vue';


let props = defineProps({
    measurements: Object,
})

</script>

<style lang="scss" scoped>
</style>
