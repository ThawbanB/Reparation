<template>
    <div class="max-w-md mx-auto p-4 bg-white shadow rounded">
      <h2 class="text-xl font-bold mb-4">Modifier un service</h2>
      <form @submit.prevent="updateRepair(repair.id)">
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
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Mettre à jour</button>
      </form>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    props: {
      repair: Object,
    },
    methods: {
      async updateRepair(id) {
        try {
          await axios.put(`/create/update/${id}`, this.repair)
          window.location.href = '/create'

        } catch(error) {
          console.error('Erreur nul')
        }
      }
    }
  };
  </script>
  