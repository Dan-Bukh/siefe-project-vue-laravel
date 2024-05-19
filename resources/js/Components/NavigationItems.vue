<script setup>
import { Link } from '@inertiajs/vue3';
const categoryChecked = (category) => {
    if(category == '') {
        return location.search == category;
    }
    return location.search == '?category=' + category;
}
console.log(location.search);
</script>

<template>
    <div class="text-2xl font-light tracking-widest mb-5 ms-5 md:ms-20 me-5 w-3/5 sm:w-1/5">
        <ul>
            <li><p class="leading-loose hover:text-slate-400 transition ease-out duration-700 hover:-translate-y-1 mb-3" :class="categoryChecked('soap') ? 'text-slate-400' : ''"><Link :href="route('catalog')" :data="{category: 'soap'}" preserve-scroll>Seife</Link></p></li>
            <li><p class="leading-loose hover:text-slate-400 transition ease-out duration-700 hover:-translate-y-1 mb-3" :class="categoryChecked('shampoo') ? 'text-slate-400' : ''"><Link :href="route('catalog')" :data="{category: 'shampoo'}" preserve-scroll>Shampoo</Link></p></li>
            <li><p class="leading-loose hover:text-slate-400 transition ease-out duration-700 hover:-translate-y-1 mb-3" :class="categoryChecked('hair-balm') ? 'text-slate-400' : ''"><Link :href="route('catalog')" :data="{category: 'hair-balm'}" preserve-scroll >Haarbalsam</Link></p></li>
            <li><p class="leading-loose hover:text-slate-400 transition ease-out duration-700 hover:-translate-y-1 mb-3" :class="categoryChecked('') ? 'text-slate-400' : ''"><Link :href="route('catalog')" preserve-scroll>Alle Waren</Link></p></li>
        </ul>
    </div>
</template>
