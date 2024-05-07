<script setup>
import { Head, Link } from '@inertiajs/vue3';
import BaseLayout from '@/Layouts/Base.vue';
import NavigationItems from '@/Components/NavigationItems.vue';
import Counter from '@/Components/Counter.vue';
import {provide, ref} from "vue";

let howMuch = ref(1)
provide('howMuch', howMuch)



defineProps({
    item: {
        type: Array,
    },
});

const NotExistInCart = ref(true);
const toCart = (item, howMuch) => {
    localStorage.setItem(item.id, JSON.stringify([item, howMuch]));
    NotExistInCart.value = false;
    // console.log(JSON.parse(localStorage.getItem()));
    //     for (let i = 0; i < localStorage.length; i++) {
    //         console.log(JSON.parse(localStorage.getItem(localStorage.key(i))));
    //     }
}

</script>

<template>
    <Head title="Натуральное мыло и косметика" />
    <BaseLayout>
        <!-- item -->
        <div class="lg:flex sm:mx-auto lg:mt-28 mb-28">
            <!-- NavigationItems -->
                <NavigationItems />
            <!-- NavigationItems -->
            <div>
                <div class="lg:flex justify-center cursor-default">
                    <div>
                        <p class="p-2 mb-3 font-light text-slate-700"><Link class="hover:text-slate-400 transition ease-out duration-700" :href="route('catalog')">магазин</Link> > {{ item[0].title }}</p>
                        <img class="shadow-2xl p-2 transition-all ease-out duration-700 hover:-translate-y-1" style="width: 33rem;" :src="item[0].image" alt="item">
                    </div>
                    <div class="ms-2 mt-10 lg:mt-0 lg:w-1/3 lg:ms-10">
                        <p class="text-2xl font-light mb-4">{{ item[0].title }}</p>
                        <p class="text-lg font-light text-slate-600 mb-4">{{ item[0].price }} руб.</p>
                        <div class="flex gap-2">
                            <Counter :countItem="Number(item[0].count)"/>
                            <div v-if="NotExistInCart">
                                <button @click="toCart(item[0],howMuch)" class="w-60 h-16 border px-12 py-5 bg-black text-slate-50 hover:bg-slate-400 active:bg-slate-600 mb-4 transition ease-out duration-700 p-2 hover:-translate-y-1">
                                    ДОБАВИТЬ
                                </button>
                            </div>
                            <div class="flex" v-else>
                                <Link :href="route('cart')" class="w-60 h-16 border px-8 py-5 bg-black text-slate-50 hover:bg-slate-400 active:bg-slate-600 mb-4 transition ease-out duration-700 p-2 hover:-translate-y-1">
                                    ПЕРЕЙТИ В КОРЗИНУ
                                </Link>
                            </div>
                        </div>

                        <p class="font-light text-slate-600 mb-4">В наличии: {{ item[0].count }} шт.</p>
                        <p class="font-light text-slate-600 mb-4">Вес кусочка 125 +/- 5 грамм</p>
                        <p class="font-light text-slate-600 mb-4">
                            {{ item[0].content }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- item -->
    </BaseLayout>
</template>
