import { ref } from "vue";

export const timer = ref(0);

setInterval(() => {
    timer.value++;
}, 1000);
