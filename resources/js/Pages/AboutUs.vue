<script setup>
import { Head } from '@inertiajs/vue3';
import BaseLayout from '@/Layouts/Base.vue';
let props = defineProps({
    imageBg: {
        type: String,
    },
});
</script>

<template>
    <Head title="Natürliche Seife und Kosmetik" />
    <BaseLayout>
        <!-- about us -->
        <div>
            <div class="flex justify-center bg-slate-100 w-full my-6">
                <div class="flex flex-wrap justify-around w-5/6">
                    <div class="flex flex-col lg:w-1/2">
                        <h2 class="my-5 font-mono text-3xl">über das Projekt</h2>
                        <p class="font-light tracking-wider mb-5">
                            Ziegenmilch, Honig, Obst und Gemüse, Wildkräuter, Meersalz, Ton, Kiefernnadeln, Quellwasser, natives Olivenöl extra, Mandelöl, Sesamöl, Avocadoöl, Kokosöl, Kakaobutter, Kakaobohnen, Kaffee, Haferflocken – Zutaten, aus denen wir Seife und Kosmetika herstellen. <br/> <br/>
                            Das Sortiment hängt weitgehend von der Jahreszeit ab. Der Frühling ist die Zeit zarter Blumenaromen, der Sommer ist die Zeit der Kräuter, der Herbst ist die Zeit der Ernte, was viele Gemüse- und Fruchtsäfte bedeutet, der Winter ist wärmende Gewürze und Zitrusfrüchte.<br/> <br/>
                            All Soul Badezimmerseifen durchlaufen eine Reifezeit von 4-6 Wochen bis sechs Monaten. Kosmetika hingegen werden in sehr kleinen Mengen, fast auf Bestellung, hergestellt. <br/> <br/>
                            Wir versuchen, die Umwelt so weit wie möglich zu schonen und halten uns an die Grundsätze einer umweltfreundlichen Produktion.<br/> <br/>
                            Deshalb werden unsere Balsame, Peelings, Badesalze, Soufflés und Körperbutter in Glasgefäßen oder Aluminiumbehältern verkauft.
                        </p>
                    </div>
                    <div class="w-96">
                        <img class="object-contain" :src="props.imageBg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- about us -->
    </BaseLayout>
</template>
