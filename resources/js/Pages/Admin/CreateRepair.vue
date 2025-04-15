<script setup>
  import Navbar from "@/Components/Navbar.vue";
</script>
<template>
    <Navbar />
    <div class="max-w-md mx-auto p-4 bg-white shadow rounded">
      <h2 class="text-xl font-bold mb-4">Ajouter un service de réparation</h2>
      <form @submit.prevent="submitRepair">
        <div class="mb-4">
          <label class="block mb-1 font-semibold">Type de réparation</label>
          <input v-model="repair.repair_type" type="text" class="w-full border p-2 rounded" required />
        </div>
        <div class="mb-4">
          <label class="block mb-1 font-semibold">Description</label>
          <textarea v-model="repair.description" class="w-full border p-2 rounded"></textarea>
        </div>
        <div class="mb-4">
          <label class="block mb-1 font-semibold">Prix (€)</label>
          <input v-model="repair.price" type="number" step="0.01" class="w-full border p-2 rounded" required />
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-red-700">Ajouter</button>
      </form>
   
      <div v-if="successMessage" class="mt-4 text-green-600">
        {{ successMessage }}
      </div>
    </div>
    <div>
    <ul>
      <li v-for="(repair, index) in $page.props.repair" :key="index" class="p-2 bg-gray-100 rounded">
        <strong>{{ repair.id }} - {{ repair.repair_type }} - {{ repair.price }} €</strong><br />
        
        <!-- Boutons pour éditer et supprimer -->
        <button @click="editRepair(repair.id)" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-700">Edit</button>
        <button @click="deleteRepair(repair.id)" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-700">Delete</button>
      </li>
    </ul>

    <!-- Afficher un message de confirmation après suppression -->
    <div v-if="successMessage" class="mt-4 text-green-600">
      {{ successMessage }}
    </div>
  </div>
  </template>
  
  <script>
  import axios from 'axios';
  import Navbar from '@/Components/Navbar.vue';
  export default {
    data() {
      return {
        repair: {
          repair_type: '',
          description: '',
          price: null,
        },
        successMessage: '',
      };
    },
    methods: {
      async deleteRepair(id) {
      try {
        await axios.delete(`/create/delete/${id}`);  // La route DELETE
        setTimeout(() => {
          window.location.reload();
        }, 0);
      } catch (error) {
        console.error('Erreur lors de la suppression de la réparation:', error);
      }
    },
      editRepair(id) {
        this.$inertia.visit(`/create/edit/${id}`);
      },
      async submitRepair() {
      try {
        const response = await axios.post('/create', this.repair);
        this.repair = { repair_type: '', description: '', price: null }; // Reset form

        // 🔄 Recharge la page après l'ajout
        setTimeout(() => {
          window.location.reload();
        }, 0); // délai pour afficher le message pendant 1 seconde
      } catch (error) {
        console.error('Erreur lors de l\'ajout du service de réparation:', error);
      }
    }

    }
  };
  </script>
  