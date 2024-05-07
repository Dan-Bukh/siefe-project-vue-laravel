<script setup>
import { ref, inject } from 'vue'

let props = defineProps({
    countItem: {
        type: Number,
    },
});

let howMuch = inject('howMuch')
let MaxItemColor = ref(false);

const increment = () => {
    if (howMuch.value >= props.countItem) {
        howMuch.value = props.countItem
        MaxItemColor.value = true;
    } else {
        howMuch.value++
        MaxItemColor.value = false;
    }
}
const decrement = () => {
    MaxItemColor.value = false;
    if (howMuch.value <= 1) {
        howMuch.value = 1
        MaxItemColor.value = true;
    } else {
        howMuch.value--
    }
}
</script>

<template>
    <div class="flex justify-between items-center border w-60 sm:w-20 h-16 px-2" :class="[MaxItemColor ? 'border-red-500' : 'border-black']">
        <button @click="decrement" class="h-full transition-all ease-out duration-700 active:-translate-y-1">
            -
        </button>
        <span :class="[MaxItemColor ? 'text-red-500' : 'text-slate-700']">
            {{ howMuch }}
        </span>
        <button @click="increment" class="h-full transition-all ease-out duration-700 active:-translate-y-1">
            +
        </button>
    </div>
</template>
