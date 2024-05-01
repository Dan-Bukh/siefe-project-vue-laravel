<script setup>
import { Head, Link } from '@inertiajs/vue3';
import BaseLayout from '@/Layouts/Base.vue';
import NavigationItems from '@/Components/NavigationItems.vue';
import { ref, watch } from 'vue';
import { router } from '@inertiajs/vue3'

let props = defineProps({
    cards: {
        type: Object,
    },
    filters: {
        type: Object,
    }
});
let searchQuery = ref(props.filters.search);

watch(searchQuery, value => {
    router.get(route("catalog"), { search: value, category: props.filters.category }, {
        preserveState: true,
        replace: true,
        preserveScroll: true,
    });
});
</script>

<template>
    <Head title="Натуральное мыло и косметика" />
    <BaseLayout>
        <!-- items -->
        <div>
            <div class="flex justify-end mx-20 mt-4">
                <input v-model="searchQuery" class="rounded-xl" type="text" placeholder="Search..." />
            </div>
            <div class="lg:flex mt-5 mb-28">
                <!-- NavigationItems -->
                <NavigationItems />
                <!-- NavigationItems -->
                <div>
                    <div class="flex flex-wrap">
                            <div v-for="card in cards" :key="card.id" class="w-80 mx-3 mb-10 shadow-2xl p-2 hover:opacity-85 transition-all ease-out duration-700 hover:-translate-y-2 hover:scale-100">
                                <Link :href="route('item', card.id)">
                                    <div>
                                        <img :src="card.image" alt="">
                                    </div>
                                    <p class="text-lg font-light">{{ card.title }}</p>
                                    <p class="text-md font-light">{{ card.price }} руб.</p>
                                </Link>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- items -->
    </BaseLayout>
</template>
