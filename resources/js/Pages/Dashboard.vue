<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

let props = defineProps({
    orders: {
        type: Object,
    },
});

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Доска Заказов</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-slate-400 shadow-sm sm:rounded-lg">
                    <div class="text-red-900 p-2 text-md font-medium">Для удаления нужно нажать крестик два раза!</div>
                    <div class="p-6 text-gray-900 text-2xl font-medium">Заказы:</div>
                    <div class="flex flex-wrap">
                        <div v-for="order in orders" :key="order.id" class="bg-white w-1/3 mx-3 mb-10 shadow-2xl p-2 hover:opacity-85 transition-all ease-out duration-700 hover:-translate-y-2 hover:scale-100 rounded-lg">
                                <div>
                                    <span>Номер Заказа: {{ order.id }} / Дата: {{ order.created_at }}</span>
                                    <div>
                                        <Link as="button" :href="route('order.destroy', order)" method="delete" class="bg-red-700 w-10 text-center active:bg-green-800">
                                            X
                                        </Link>
                                    </div>
                                </div>
                                <div class="flex justify-around">
                                    <p class="text-lg font-light">Имя: {{ order.first_name }}</p>
                                    <p class="text-md font-light">Фамилия: {{ order.last_name }}</p>
                                </div>
                                <div class="flex justify-around">
                                    <p class="text-md font-light">Почта: {{ order.email }}</p>
                                    <p class="text-md font-light">Номер: {{ order.number }}</p>
                                </div>
                                <div v-for="item in order.items" :key="item.id" class="flex flex-col border-2 border-black rounded-lg mb-2 p-2">
                                    <p class="flex justify-center text-md font-light"><span class="font-medium">Кол-во: </span>{{ item[1] }}</p>
                                    <p class="flex justify-center text-md font-light"><span class="font-medium">Название: </span>{{ item[0] }}</p>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
