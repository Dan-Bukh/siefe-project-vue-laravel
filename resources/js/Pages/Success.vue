<script setup>
import { Head } from '@inertiajs/vue3';
import BaseLayout from '@/Layouts/Base.vue';

</script>

<template>
    <Head title="Bestellung erfolgreich" />
    <BaseLayout>
        <div class="h-screen">
            <div class="flex justify-center items-center h-2/6">
                <p class="text-xl md:text-3xl text-slate-400 text-center">Bestellung erfolgreich abgeschlossen</p>
            </div>
            <div class="flex justify-center h-1/5">
                <p class="text-3xl md:text-6xl text-blue-400 text-center">Vielen Dank für die Bestellung!</p>
            </div>
        </div>
    </BaseLayout>
</template>
