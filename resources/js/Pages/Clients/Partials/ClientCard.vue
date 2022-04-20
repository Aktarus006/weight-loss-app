<script setup>
import JetButton from '@/Jetstream/Button.vue';
import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue';
import JetDangerButton from '@/Jetstream/DangerButton.vue';

import { Link } from '@inertiajs/inertia-vue3';
let props = defineProps({
    client: Object,
})
</script>

<template>
    <div class="flex flex-col col-span-1 text-center bg-white divide-y divide-gray-200 rounded-lg shadow">
        <div class="flex flex-col flex-1 p-8">
            <img class="flex-shrink-0 w-32 h-32 mx-auto rounded-full" :src="client.profile_photo" alt="" />
            <h3 class="mt-6 text-sm font-medium text-gray-900">{{ client.first_name }}</h3>
            <dl class="flex flex-col justify-between flex-grow mt-1">
                <dt class="sr-only">Title</dt>
                <dd class="text-sm text-gray-500">{{ client.last_name }}</dd>
                <dt class="sr-only">Role</dt>
                <dd class="mt-3">
                    <a :href="`mailto:${client.email}`"
                        class="px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">{{
                            client.email
                        }}</a>
                </dd>
            </dl>
        </div>
        <div>
            <div class="flex -mt-px divide-x divide-gray-200">
                <div class="flex flex-1 w-0">
                    <p
                        class="relative inline-flex items-center justify-center flex-1 w-0 py-4 -mr-px text-sm font-medium text-gray-700 border border-transparent rounded-bl-lg">
                        <span class="ml-3">{{ client.length_cm }} cm</span>
                    </p>
                </div>
                <div class="flex flex-1 w-0 -ml-px">
                    <p
                        class="relative inline-flex items-center justify-center flex-1 w-0 py-4 text-sm font-medium text-gray-700 border border-transparent rounded-br-lg">
                        <span class="ml-3">{{ client.birthday }}</span>
                    </p>
                </div>
            </div>
        </div>

        <div class="relative py-4 pl-3 pr-4 space-x-4 text-sm font-medium text-right whitespace-nowrap sm:pr-6">
            <Link :href="route('clients.show', { client: client })">
            <JetButton>Show</JetButton>
            </Link>
            <Link :href="route('clients.edit', { client: client })">
            <JetSecondaryButton>Edit</JetSecondaryButton>
            </Link>
            <Link :href="route('clients.destroy', { client: client })" method="delete" as="button">
            <JetDangerButton>Delete</JetDangerButton>
            </Link>
        </div>
    </div>

</template>
