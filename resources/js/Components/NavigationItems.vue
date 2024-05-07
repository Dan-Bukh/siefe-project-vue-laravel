<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="text-2xl font-light tracking-widest mb-5 ms-5 md:ms-20 me-5 w-3/5 sm:w-1/5">
        <ul>
            <li><p class="leading-loose hover:text-slate-400 transition ease-out duration-700 hover:-translate-y-1 mb-3"><Link :href="route('catalog')" :data="{category: 'soap'}" preserve-scroll>Мыло</Link></p></li>
            <li><p class="leading-loose hover:text-slate-400 transition ease-out duration-700 hover:-translate-y-1 mb-3"><Link :href="route('catalog')" :data="{category: 'soap'}" preserve-scroll>Гидролаты</Link></p></li>
            <li><p class="leading-loose hover:text-slate-400 transition ease-out duration-700 hover:-translate-y-1 mb-3"><Link :href="route('catalog')" :data="{category: 'scrab'}" preserve-scroll >Скрабы</Link></p></li>
            <li><p class="leading-loose hover:text-slate-400 transition ease-out duration-700 hover:-translate-y-1 mb-3"><Link :href="route('catalog')" :data="{category: 'soap'}" preserve-scroll>Для Лица</Link></p></li>
            <li><p class="leading-loose hover:text-slate-400 transition ease-out duration-700 hover:-translate-y-1 mb-3"><Link :href="route('catalog')" :data="{category: 'soap'}" preserve-scroll>Для Волос</Link></p></li>
            <li><p class="leading-loose hover:text-slate-400 transition ease-out duration-700 hover:-translate-y-1 mb-3"><Link :href="route('catalog')" preserve-scroll>Все Товары</Link></p></li>
        </ul>
    </div>
</template>
