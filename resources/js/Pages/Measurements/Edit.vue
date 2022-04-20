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
    measurement: Object,
    clients: Object
})

let form = useForm({
    weight_kg: props.measurement.weight_kg,
    fat_percentage: props.measurement.fat_percentage,
    'blood_pressure': props.measurement.blood_pressure,
    'client_id': props.measurement.client_id,
})

let submit = () => {
    form.put(route('measurements.update', { id: props.measurement.id }), {
        onFinish: () => form.reset('weight_kg', 'fat_percentage', 'blood_pressure', 'client_id'),
    });
}

</script>

<template>
    <AppLayout title="Measurement - Create">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Measurements
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-6 px-8">
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
                                <JetInput id="weight_kg" v-model="form.weight_kg" type="text" class="mt-1 block w-full"
                                    autofocus />
                                <JetInputError :message="form.errors.weight_kg" class="mt-2" />
                            </div>

                            <!-- Fat percentage -->
                            <div class="col-span-6 sm:col-span-4">
                                <JetLabel for="fat_percentage" value="Fat %" />
                                <JetInput id="fat_percentage" v-model="form.fat_percentage" type="text"
                                    class="mt-1 block w-full" autofocus />
                                <JetInputError :message="form.errors.fat_percentage" class="mt-2" />
                            </div>

                            <!-- Fat percentage -->
                            <div class="col-span-6 sm:col-span-4">
                                <JetLabel for="blood_pressure" value="Blood Pressure" />
                                <JetInput id="blood_pressure" v-model="form.blood_pressure" type="text"
                                    class="mt-1 block w-full" autofocus />
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
                                Updated.
                            </JetActionMessage>

                            <JetButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Update
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
