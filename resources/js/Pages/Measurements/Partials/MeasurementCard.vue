<script setup>
import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue';
import JetDangerButton from '@/Jetstream/DangerButton.vue';

import { Link } from '@inertiajs/inertia-vue3';

let props = defineProps({
    measurement: Object,
})
</script>

<template>
    <div>

        <dl class="grid grid-cols-1 gap-2 px-10 mt-5 sm:grid-cols-3">
            <div class="px-4 py-5 overflow-hidden bg-white rounded-lg shadow sm:p-6">
                <dt class="text-sm font-medium text-gray-500 truncate">
                    Weight
                </dt>
                <dd class="mt-1 text-3xl font-semibold text-gray-900">
                    {{ measurement.weight_kg }}
                </dd>
            </div>
            <div class="px-4 py-5 overflow-hidden bg-white rounded-lg shadow sm:p-6">
                <dt class="text-sm font-medium text-gray-500 truncate">
                    Fat %
                </dt>
                <dd class="mt-1 text-3xl font-semibold text-gray-900">
                    {{ measurement.fat_percentage }}
                </dd>
            </div>
            <div class="px-4 py-5 overflow-hidden bg-white rounded-lg shadow sm:p-6">
                <dt class="text-sm font-medium text-gray-500 truncate">
                    Blood pressure
                </dt>
                <dd class="mt-1 text-3xl font-semibold text-gray-900">
                    {{ measurement.blood_pressure }}
                </dd>
            </div>
        </dl>
        <h3 class="px-10 mt-8 text-xl text-right">added on {{ measurement.created_at }}</h3>
        <div class="relative py-4 pl-3 pr-4 space-x-4 text-sm font-medium text-right whitespace-nowrap sm:pr-6">
            <Link :href="route('measurements.edit', { measurement: measurement })">
            <JetSecondaryButton>Edit</JetSecondaryButton>
            </Link>
            <Link :href="route('measurements.destroy', { measurement: measurement })" method="delete" as="button">
            <JetDangerButton>Delete</JetDangerButton>
            </Link>
        </div>
    </div>

</template>
