<script setup>
import { Link } from '@inertiajs/vue3';

let AddedItemsInCart = localStorage.length ? localStorage.length : '';
const pathnameChecked = (path) => {
    return location.pathname == path;
}

</script>

<template>
    <header class="bg-slate-100">
    <div class="fixed top-6 right-10 cursor-pointer z-20 transition ease-in-out hover:-translate-y-1 hover:scale-100">
                <Link :href="route('cart')">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                        <span>{{ AddedItemsInCart }}</span>
                    </div>
                </Link>
            </div>

            <div class="flex justify-center">
                <div class="flex">
                </div>
            </div>
            <div class="mt-4">
                <nav>
                    <ul class="flex justify-center text-md sm:text-lg font-light sm:font-mono sm:tracking-widest ">
                        <li class="leading-loose mx-4 hover:text-slate-400 transition ease-out duration-300" :class="pathnameChecked('/catalog') ? 'text-slate-400' : ''"><Link :href="route('catalog')">Geschäft</Link></li>
                        <li class="leading-loose mx-4 hover:text-slate-400 transition ease-out duration-300" :class="pathnameChecked('/about-us') ? 'text-slate-400' : ''"><Link :href="route('AboutUs')">über das Projekt</Link></li>
                    </ul>
                </nav>
                <hr class="mt-3">
            </div>
        </header>

        <slot />

        <footer>
            <div class="w-full  bg-slate-100">
                <div>
                    <hr class="mb-3">
                        <p class="text-center text-slate-500">Natürliche Seife und Kosmetik</p>
                    <hr class="mt-3">
                </div>
            </div>
        </footer>
</template>
