<script setup>
import { Head, Link } from '@inertiajs/vue3';
import BaseLayout from '@/Layouts/Base.vue';
import NavigationItems from '@/Components/NavigationItems.vue';
import Counter from '@/Components/Counter.vue';
import {provide, ref} from "vue";

defineProps({
    item: {
        type: Array,
    },
});

let howMuch = ref(1)
provide('howMuch', howMuch)

const NotExistInCart = ref(true);
const toCart = (item, howMuch) => {
    localStorage.setItem(item.id, JSON.stringify([item, howMuch]));
    NotExistInCart.value = false;
}

let CurrentImage = ref(0);

</script>

<template>
    <Head title="Natürliche Seife und Kosmetik" />
    <BaseLayout>
        <!-- item -->
        <div class="lg:flex sm:mx-auto lg:mt-28 mb-28">
            <!-- NavigationItems -->
                <NavigationItems />
            <!-- NavigationItems -->
            <div>
                <div class="lg:flex justify-center cursor-default">
                    <div>
                        <p class="p-2 mb-3 font-light text-slate-700"><Link class="hover:text-slate-400 transition ease-out duration-700" :href="route('catalog')">Geschäft</Link>  >  {{ item[0].title }}</p>
                        <div
                            id="carouselExampleCaptions"
                            class="relative shadow-2xl p-2 transition-all ease-out duration-700 hover:-translate-y-1 w-auto"
                            data-twe-carousel-init
                            data-twe-ride="carousel">
                            <!--Carousel indicators-->
                            <div
                                class="absolute bottom-0 left-0 right-0 z-[2] mx-[15%] mb-4 flex list-none justify-center p-0"
                                data-twe-carousel-indicators>
                                <button v-for="(image, key) in item[0]['image']" :key="key"
                                    @click="(e) => {
                                        CurrentImage = e.target.attributes[2].nodeValue;
                                    }"
                                    type="button"
                                    data-twe-target="#carouselExampleCaptions"
                                    :data-twe-slide-to="key"
                                    class="mx-[3px] box-content h-[30px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent hover:bg-white bg-clip-padding p-0 -indent-[999px] opacity-80 transition-all duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
                                    :class="(CurrentImage == key) ? 'bg-white' : 'bg-slate-900'"
                                    aria-current="true"
                                    aria-label="Slide 1"></button>
                            </div>

                            <!--Carousel items-->
                            <div
                                class="relative w-full overflow-hidden after:clear-both after:block after:content-['']">
                                <!--First item-->
                                <div
                                    v-for="(image, key) in item[0]['image']" :key="key"
                                    class="relative float-left -mr-[100%] w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
                                    :class="(CurrentImage == key) ? 'block' : 'hidden'"
                                    data-twe-carousel-active
                                    data-twe-carousel-item
                                    style="backface-visibility: hidden">
                                    <img
                                        :src="image"
                                        class="block w-full"
                                        style="width: 33rem;"
                                        alt="..." />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ms-2 mt-10 lg:mt-0 lg:w-1/3 lg:ms-10">
                        <p class="text-2xl font-light mb-4">{{ item[0].title }}</p>
                        <div class="flex gap-2">
                            <Counter :countItem="Number(item[0].count)"/>
                            <div v-if="NotExistInCart">
                                <button @click="toCart(item[0],howMuch)" class="w-60 h-16 border px-12 py-5 bg-black text-slate-50 hover:bg-slate-400 active:bg-slate-600 mb-4 transition ease-out duration-700 p-2 hover:-translate-y-1">
                                    HINZUFÜGEN
                                </button>
                            </div>
                            <div class="flex" v-else>
                                <Link :href="route('cart')" class="w-60 h-16 border px-8 py-5 bg-black text-slate-50 hover:bg-slate-400 active:bg-slate-600 mb-4 transition ease-out duration-700 p-2 hover:-translate-y-1">
                                    ZUM EINKAUFSKORB
                                </Link>
                            </div>
                        </div>
                        <p class="text-lg font-light text-slate-600 mb-4">{{ item[0].price }} €.</p>
                        <p class="font-light text-slate-600 mb-4">Auf Lager: {{ item[0].count }} Stück.</p>
                        <p v-for="(text, key) in item[0].content[0]" :key="key" class="font-light text-slate-600 mb-4">
                            {{ text }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- item -->
    </BaseLayout>
</template>
