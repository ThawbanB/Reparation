<script setup>
    import { Head,Link } from '@inertiajs/vue3';
    import Navbar from '@/Components/Navbar.vue';
</script>
<template>
    <Head title="Repair"/>
    <Navbar />
    <div v-if="$page.props.repair.length === 0">
        <h1>
            Aucune réparation est disponible pour le moment
        </h1>
    </div>
    <div>
        <li v-for="(repair, index) in $page.props.repair" :key="index" class="flex items-center mt-4 justify-center">
        <div class="flex items-center">
            {{ repair.repair_type }} - {{ repair.price }}€ 
        <button @click="showRepair(repair.repair_type)" class="bg-blue-400 p-2 mx-2 rounded-lg">Prendre rendez-vous</button>
        </div>
    </li>
    </div>
</template>

<script>
    export default {
        methods: {
            showRepair(repair_type) {
                this.$inertia.visit(`/showrepair/${repair_type}`);
        }
    }
}

</script>
