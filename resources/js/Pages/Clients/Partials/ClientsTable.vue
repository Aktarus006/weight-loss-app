<script setup>
import JetApplicationLogo from '@/Jetstream/ApplicationLogo.vue';
import JetButton from '@/Jetstream/Button.vue';
import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue';
import JetDangerButton from '@/Jetstream/DangerButton.vue';
import JetInput from '@/Jetstream/Input.vue';
import { Link } from '@inertiajs/inertia-vue3';
import Pagination from '@/Shared/Pagination.vue'
let props = defineProps({
    clients: Object,
});

</script>


<template>
    <div>
        <div class="p-6 bg-white border-b border-gray-200 sm:px-20">
            <div>
            </div>

            <div class="mt-8 text-2xl">
                Welcome to your Jetstream application!
            </div>

            <div class="mt-6 text-gray-500">
                Laravel Jetstream provides a beautiful, robust starting point for your next Laravel application. Laravel
                is designed
                to help you build your application using a development environment that is simple, powerful, and
                enjoyable. We believe
                you should love expressing your creativity through programming, so we have spent time carefully crafting
                the Laravel
                ecosystem to be a breath of fresh air. We hope you love it.
            </div>
        </div>

        <div class="bg-gray-200 bg-opacity-25">
            <div class="p-4 sm:p-6 lg:p-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-xl font-semibold text-gray-900">Users</h1>
                        <p class="mt-2 text-sm text-gray-700">A list of all the users in your account including their
                            name, title, email and role.</p>
                    </div>
                    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                        <Link :href="route('clients.create')">
                        <JetButton>
                            + Add User
                        </JetButton>
                        </Link>
                    </div>
                </div>
                <div class="flex flex-col mt-8">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                                Name</th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                Birthday
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Length
                                            </th>

                                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                                <span class="sr-only">Actions</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr v-for="client in clients.data" :key="client.email" class="group">
                                            <Link :href="route('clients.show', client.id)">
                                            <td class="py-4 pl-4 pr-3 text-sm whitespace-nowrap sm:pl-6">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 w-10 h-10">
                                                        <img class="w-10 h-10 transition-transform duration-200 ease-in-out rounded-full group-hover:scale-125"
                                                            :src="client.profile_photo" alt="" />
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="font-medium text-gray-900">{{ client.first_name }}
                                                            {{ client.last_name }}</div>
                                                        <div class="text-gray-500">{{ client.email }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            </Link>
                                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                <div class="text-gray-900">{{ client.birthday }}</div>
                                            </td>
                                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                <div class="text-gray-900">{{ client.length_cm }} cm</div>
                                            </td>
                                            <td
                                                class="relative py-4 pl-3 pr-4 space-x-4 text-sm font-medium text-right whitespace-nowrap sm:pr-6">
                                                <Link :href="route('clients.show', { client: client })">
                                                <JetButton>Show</JetButton>
                                                </Link>
                                                <Link :href="route('clients.edit', { client: client })">
                                                <JetSecondaryButton>Edit</JetSecondaryButton>
                                                </Link>
                                                <Link :href="route('clients.destroy', { client: client })"
                                                    method="delete" as="button">
                                                <JetDangerButton>Delete</JetDangerButton>
                                                </Link>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <Pagination :links="clients.links" class="flex justify-center py-4 mx-auto" />
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</template>
