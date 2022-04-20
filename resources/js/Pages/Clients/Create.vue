<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/inertia-vue3';
import JetButton from '@/Jetstream/Button.vue';
import JetLabel from '@/Jetstream/Label.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetInputError from '@/Jetstream/InputError.vue';
import JetActionMessage from '@/Jetstream/ActionMessage.vue';
import JetFormSection from '@/Jetstream/FormSection.vue';

let form = useForm({
    first_name: '',
    last_name: '',
    birthday: '',
    length_cm: '',
    email: '',
    profile_photo: '',
});


let submit = () => {
    form.post(route('clients.store'), {});
}

</script>

<template>
    <AppLayout title="Client - create">
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="px-8 py-6 overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    <JetFormSection @submitted="submit">
                        <template #title>
                            Add Client
                        </template>

                        <template #description>
                            Add a new client
                        </template>

                        <template #form>
                            <!-- Client First Name -->
                            <div class="col-span-6 sm:col-span-4">
                                <JetLabel for="first_name" value="First Name" />
                                <JetInput id="first_name" v-model="form.first_name" type="text"
                                    class="block w-full mt-1" autofocus />
                                <JetInputError :message="form.errors.first_name" class="mt-2" />
                            </div>

                            <!-- Client Last Name -->
                            <div class="col-span-6 sm:col-span-4">
                                <JetLabel for="last_name" value="Last Name" />
                                <JetInput id="last_name" v-model="form.last_name" type="text"
                                    class="block w-full mt-1" />
                                <JetInputError :message="form.errors.last_name" class="mt-2" />
                            </div>

                            <!-- Client Birthday -->
                            <div class="col-span-6 sm:col-span-4">
                                <JetLabel for="birthday" value="Birthday" />
                                <JetInput id="birthday" v-model="form.birthday" type="date" class="block w-full mt-1" />
                                <JetInputError :message="form.errors.birthday" class="mt-2" />
                            </div>

                            <!-- CLient Email -->
                            <div class="col-span-6 sm:col-span-4">
                                <JetLabel for="email" value="Email" />
                                <JetInput id="email" v-model="form.email" type="email" class="block w-full mt-1" />
                                <JetInputError :message="form.errors.email" class="mt-2" />
                            </div>

                            <!-- Client Length-->
                            <div class="col-span-6 sm:col-span-4">
                                <JetLabel for="length_cm" value="Length (cm)" />
                                <JetInput id="length_cm" v-model="form.length_cm" type="text"
                                    class="block w-full mt-1" />
                                <JetInputError :message="form.errors.length_cm" class="mt-2" />
                            </div>

                            <!-- Client Picture-->
                            <div class="col-span-6 sm:col-span-4">
                                <JetLabel for="profile_photo" value="Profile Photo" />
                                <input id="profile_photo" type="file" class="block w-full mt-1"
                                    @input="form.profile_photo = $event.target.files[0]" />
                                <JetInputError :message="form.errors.profile_photo" class="mt-2" />
                            </div>
                        </template>


                        <template #actions>
                            <JetActionMessage :on="form.recentlySuccessful" class="mr-3">
                                Created.
                            </JetActionMessage>

                            <JetButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Create
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
