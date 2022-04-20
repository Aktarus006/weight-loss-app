<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm, Link } from '@inertiajs/inertia-vue3';
import JetFormSection from '@/Jetstream/FormSection.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetLabel from '@/Jetstream/Label.vue';
import JetCheckbox from '@/Jetstream/Checkbox.vue';
import JetButton from '@/Jetstream/Button.vue';
import JetInputError from '@/Jetstream/InputError.vue';
import JetActionMessage from '@/Jetstream/ActionMessage.vue';

let props = defineProps({
    clients: Object
})

let form = useForm({
    weight_kg: '',
    fat_percentage: '',
    'blood_pressure': '',
    'client_id': '',
})

let submit = () => {
    console.log(form.data)
    form.post(route('measurements.store'), {
        onFinish: () => form.reset('weight_kg', 'fat_percentage', 'blood_pressure', 'client_id'),
    });
}

</script>

<template>
    <AppLayout title="Measurement - Create">
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Measurements
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="px-8 py-6 overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    <JetFormSection @submitted="submit">
                        <template #title>
                            Add Measurement
                        </template>

                        <template #description>
                            Add a new measurement
                        </template>

                        <template #form>
                            <!-- Measurement Weight -->
                            <div class="col-span-6 sm:col-span-4">
                                <JetLabel for="weight_kg" value="Weight (Kg)" />
                                <JetInput id="weight_kg" v-model="form.weight_kg" type="text" class="block w-full mt-1"
                                    autofocus />
                                <JetInputError :message="form.errors.weight_kg" class="mt-2" />
                            </div>

                            <!-- Fat percentage -->
                            <div class="col-span-6 sm:col-span-4">
                                <JetLabel for="fat_percentage" value="Fat %" />
                                <JetInput id="fat_percentage" v-model="form.fat_percentage" type="text"
                                    class="block w-full mt-1" autofocus />
                                <JetInputError :message="form.errors.fat_percentage" class="mt-2" />
                            </div>

                            <!-- Fat percentage -->
                            <div class="col-span-6 sm:col-span-4">
                                <JetLabel for="blood_pressure" value="Blood Pressure" />
                                <JetInput id="blood_pressure" v-model="form.blood_pressure" type="text"
                                    class="block w-full mt-1" autofocus />
                                <JetInputError :message="form.errors.blood_pressure" class="mt-2" />
                            </div>

                            <!-- Client -->
                            <div class="col-span-6 sm:col-span-4">
                                <JetLabel for="client_id" value="Client" />
                                <select class="form-control" v-model="form.client_id">
                                    <option v-for="client in clients" :value="client.id" :key="client.id">
                                        {{ client.first_name }} {{ client.last_name }}
                                    </option>
                                </select>
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
