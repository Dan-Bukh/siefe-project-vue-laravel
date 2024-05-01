<script setup>
import {ref, inject, provide} from 'vue'

let props = defineProps({

    howMuch: {
        type: Number,
    },
    countItem: {
        type: Number,
    },

    item: {
        type: Array,
    },
});

let count = ref(props.howMuch);

const SetNewItemCount = () => {
    localStorage.setItem(props.item[0].id, JSON.stringify([props.item[0], count.value]));
}

let MaxItemColor = ref(false);
const increment = () => {
    if (count.value >= props.countItem) {
        count.value = props.countItem
        MaxItemColor.value = true;
    } else {
        count.value++
        MaxItemColor.value = false;
        location.reload();
    }
    SetNewItemCount();

}
const decrement = () => {
    MaxItemColor.value = false;
    if (count.value <= 1) {
        count.value = 1
        MaxItemColor.value = true;
    } else {
        count.value--
        location.reload();
    }
    SetNewItemCount();
}
</script>

<template>
    <div class="flex justify-between items-center border w-20 h-16 px-2" :class="[MaxItemColor ? 'border-red-500' : 'border-black']">
        <button @click="decrement" class="h-full transition-all ease-out duration-700 active:-translate-y-1">
            -
        </button>
        <span :class="[MaxItemColor ? 'text-red-500' : 'text-slate-700']">
            {{ count }}
        </span>
        <button @click="increment" class="h-full transition-all ease-out duration-700 active:-translate-y-1">
            +
        </button>
    </div>
</template>
