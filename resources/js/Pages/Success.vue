<script setup>
import { Head, Link } from '@inertiajs/vue3';
import BaseLayout from '@/Layouts/Base.vue';

let props = defineProps({
    id: {
        type: Number,
    },
});
</script>

<template>
    <Head title="Заказ Успешен" />
    <BaseLayout>
        <div class="h-screen">
            <div class="flex justify-center items-center h-2/6">
                <p class="text-3xl text-slate-400">Заказ Успешно Оформлен</p>
            </div>
            <div class="flex justify-center h-1/5">
                <p class="text-6xl text-blue-400">Спасибо за заказ!</p>
            </div>
            <div class="flex justify-center h-2/6">
                <p class="text-xl text-slate-400">Номер вашего заказа {{ props.id }}</p>
            </div>
        </div>
<!--        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />-->
    </BaseLayout>
</template>
