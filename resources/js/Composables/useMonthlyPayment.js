import { computed, isRef } from "vue";

export const useMonthlyPayment = (totalPrice, intrestRate, duration) => {
    const monthlyPayment = computed(() => {
        const principal = isRef(totalPrice) ? totalPrice.value : totalPrice;
        const rate =
            (isRef(intrestRate) ? intrestRate.value : intrestRate) / 100 / 12;
        const n = (isRef(duration) ? duration.value : duration) * 12;
        const monthlyPayment =
            (principal * rate) / (1 - Math.pow(1 + rate, -n));
        return monthlyPayment;
    });

    const totalPaid = computed(() => {
        return (
            monthlyPayment.value *
            (isRef(duration) ? duration.value : duration) *
            12 *
            monthlyPayment.value
        );
    });

    const totalInterest = computed(() => {
        return (
            totalPaid.value -
            (isRef(totalPrice) ? totalPrice.value : totalPrice)
        );
    });

    return { monthlyPayment, totalPaid, totalInterest };
};
