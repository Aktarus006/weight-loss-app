<template>
    <AppLayout title="Clients">
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Clients
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    <ClientsTable :clients="clients" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import ClientsTable from './Partials/ClientsTable.vue';


let props = defineProps({
    clients: Object,
})

</script>

<style lang="scss" scoped>
</style>
