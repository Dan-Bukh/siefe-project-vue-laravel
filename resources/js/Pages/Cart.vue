<script setup>
import { Head, Link } from '@inertiajs/vue3';
import BaseLayout from '@/Layouts/Base.vue';
import CartCounter from '@/Components/CartCounter.vue';
import { ref} from "vue";

let ItemsArray = [];
const getAllItems = () => {
        for (let i = 0; i < localStorage.length; i++) {
            ItemsArray.push(JSON.parse(localStorage.getItem(localStorage.key(i))));
        }
}
getAllItems();

const deleteItem = (id) => {
    localStorage.removeItem(id);
    location.reload();
}

let SumAllItems = 0;
const GetSumAllItems = () => {
    ItemsArray.forEach((value) => (SumAllItems += (value[0].price * value[1])));
}
GetSumAllItems();
</script>

<template>
    <Head title="Корзина" />
    <BaseLayout>
        <div class="flex flex-wrap justify-center">
            <div class="w-4/5 mt-10">
                <h1 class="text-2xl font-light tracking-widest mb-5">Корзина</h1>
                <div v-if="ItemsArray.length > 0" class="flex border-b">
                    <p class="text-slate-400 text-sm w-2/5">Продукт</p>
                    <p class="text-slate-400 text-sm text-center w-1/5">Цена</p>
                    <p class="text-slate-400 text-sm text-center w-1/5">Количество</p>
                    <p class="text-slate-400 text-sm text-center w-1/5">Сумма</p>
                </div>
                <div v-else>
                    <h2>Товары еще не добавлены!</h2>
                </div>
            </div>
            <div v-for="item in ItemsArray" :key="item[0].id" class="w-4/5">
                <div class="flex items-center border-b h-24">
                        <div class="flex items-center w-2/5 gap-6">
                            <a :href="route('item', item[0].id)" target="_blank"><img class="object-fill h-16 w-16" :src="item[0].image" alt="item"></a>
                            <a :href="route('item', item[0].id)" target="_blank"><p>{{ item[0].title }}</p></a>
                        </div>
                    <p class="w-1/5 text-center">{{ item[0].price }} pуб.</p>
                    <div class="flex justify-center w-1/5">
                        <CartCounter :item="item" :howMuch="Number(item[1])" :countItem="Number(item[0].count)"/>
                    </div>
                    <p class="w-1/5 text-center">{{ Number(item[0].price) * item[1] }} pуб.</p>
                    <button @click="deleteItem(item[0].id)" class="transition ease-in-out hover:-translate-y-1 hover:scale-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                    </button>
                </div>
            </div>
<!--            <div class="w-4/5">-->
<!--                <div class="flex items-center border-b h-24">-->
<!--                    <div class="flex items-center w-2/5 gap-6">-->
<!--                        <img class="object-fill h-16 w-16" src="/images/soap2.jpg" alt="">-->
<!--                        <p>Мыло "Инжир и йогурт"</p>-->
<!--                    </div>-->
<!--                    <p class="w-1/5 text-center">400 pуб.</p>-->
<!--                    <div class="flex justify-center w-1/5">-->
<!--                        <Counter :countItem="2"/>-->
<!--                    </div>-->
<!--                    <p class="w-1/5 text-center">400 pуб.</p>-->
<!--                    <button class="transition ease-in-out hover:-translate-y-1 hover:scale-100">-->
<!--                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">-->
<!--                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />-->
<!--                        </svg>-->
<!--                    </button>-->
<!--                </div>-->
<!--            </div>-->
            <div class="w-4/5 mt-2">
                <div v-if="ItemsArray.length > 0" class="flex items-center">
                    <p class="w-4/5 text-sm font-light tracking-widest">Общая стоимость заказа/покупки:</p>
                    <p class="w-1/5 text-center">{{ SumAllItems }} pуб.</p>
                </div>
            </div>
            <!-- Personal Information Form -->
            <div>
                <div class="mx-auto max-w-7xl px-4 py-24 sm:px-6 sm:py-32 lg:px-8">
                    <div class="mx-auto max-w-2xl border p-2 shadow-xl">
                        <form>
                            <div class="space-y-12">
                                <div class="border-b border-gray-900/10 pb-12">
                                    <h2 class="text-base font-semibold leading-7 text-gray-900">Personal Information</h2>
                                    <p class="mt-1 text-sm leading-6 text-gray-600">Use a permanent address where you can receive mail.</p>

                                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                        <div class="sm:col-span-3">
                                            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">First name</label>
                                            <div class="mt-2">
                                                <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                            </div>
                                        </div>

                                        <div class="sm:col-span-3">
                                            <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Last name</label>
                                            <div class="mt-2">
                                                <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                            </div>
                                        </div>

                                        <div class="sm:col-span-4">
                                            <label for="number" class="block text-sm font-medium leading-6 text-gray-900">Number</label>
                                            <div class="mt-2">
                                                <input id="number" name="number" type="tel" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 flex items-center justify-end gap-x-6">
                                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                                <button type="submit" class="rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Personal Information Form -->
        </div>
    </BaseLayout>
</template>
