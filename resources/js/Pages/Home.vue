<script setup>
import { Head, Link } from '@inertiajs/vue3';
import BaseLayout from '@/Layouts/Base.vue';
</script>

<template>
    <Head title="Натуральное мыло и косметика" />
    <BaseLayout>
             <!-- shop link -->
        <div class="flex justify-center items-center w-full h-[58rem] mt-7 bg-cover bg-center" style="background-image: url('images/bg.jpeg');">
            <div class="flex-col">
                <div class="w-80">
                    <p class="text-center text-3xl font-normal text-slate-50 tracking-wide pt-56">Натуральное мыло и природная косметика</p>
                    <div class="flex justify-center mt-16">
                        <Link class="px-5 border text-slate-50 text-lg font-mono hover:bg-slate-50 transition ease-out duration-700 hover:bg-opacity-50 rounded-lg" :href="route('catalog')">
                            В магазин ->
                        </Link>
                    </div>
                </div>
            </div>
        </div>
        <!-- shop link -->
    </BaseLayout>
</template>