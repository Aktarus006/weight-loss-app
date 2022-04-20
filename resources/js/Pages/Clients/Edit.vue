<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/inertia-vue3';
import JetButton from '@/Jetstream/Button.vue';
import JetLabel from '@/Jetstream/Label.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetInputError from '@/Jetstream/InputError.vue';
import JetActionMessage from '@/Jetstream/ActionMessage.vue';
import JetFormSection from '@/Jetstream/FormSection.vue';

let props = defineProps({
    client: Object
})

let form = useForm({
    first_name: props.client.first_name,
    last_name: props.client.last_name,
    birthday: props.client.birthday,
    length_cm: props.client.length_cm,
    email: props.client.email,
});

let submit = () => {
    form.put(route('clients.update', { id: client.id }), {});
}


</script>

<template>
    <AppLayout title="Client - create">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-6 px-8">
                    <JetFormSection @submitted="submit">
                        <template #title>
                            Edit Client
                        </template>

                        <template #description>
                            Edit a client
                        </template>

                        <template #form>
                            <!-- Client First Name -->
                            <div class="col-span-6 sm:col-span-4">
                                <JetLabel for="first_name" value="First Name" />
                                <JetInput id="first_name" v-model="form.first_name" type="text"
                                    class="mt-1 block w-full" autofocus />
                                <JetInputError :message="form.errors.first_name" class="mt-2" />
                            </div>

                            <!-- Client Last Name -->
                            <div class="col-span-6 sm:col-span-4">
                                <JetLabel for="last_name" value="Last Name" />
                                <JetInput id="last_name" v-model="form.last_name" type="text"
                                    class="mt-1 block w-full" />
                                <JetInputError :message="form.errors.last_name" class="mt-2" />
                            </div>

                            <!-- Client Birthday -->
                            <div class="col-span-6 sm:col-span-4">
                                <JetLabel for="birthday" value="Birthday" />
                                <JetInput id="birthday" v-model="form.birthday" type="date" class="mt-1 block w-full" />
                                <JetInputError :message="form.errors.birthday" class="mt-2" />
                            </div>

                            <!-- CLient Email -->
                            <div class="col-span-6 sm:col-span-4">
                                <JetLabel for="email" value="Email" />
                                <JetInput id="email" v-model="form.email" type="email" class="mt-1 block w-full" />
                                <JetInputError :message="form.errors.email" class="mt-2" />
                            </div>

                            <!-- Client Length-->
                            <div class="col-span-6 sm:col-span-4">
                                <JetLabel for="length_cm" value="Length (cm)" />
                                <JetInput id="length_cm" v-model="form.length_cm" type="text"
                                    class="mt-1 block w-full" />
                                <JetInputError :message="form.errors.length_cm" class="mt-2" />
                            </div>

                        </template>


                        <template #actions>
                            <JetActionMessage :on="form.recentlySuccessful" class="mr-3">
                                Edited.
                            </JetActionMessage>

                            <JetButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Edit
                            </JetButton>
                        </template>
                    </JetFormSection>
                </div>
            </div>
        </div>
    </AppLayout>
</template>




<style lang="scss" scoped>
</style>
