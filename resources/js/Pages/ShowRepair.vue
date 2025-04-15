<script setup>
import { ref } from 'vue'
import Navbar from '@/Components/Navbar.vue';
import { Link } from '@inertiajs/vue3';
// Props
defineProps({
  repair: Object,
  appointments : Object
})

// Données réactives

</script>
<template>
    <Navbar/>
  <div class="text-center p-6">
    <h1 class="text-2xl font-bold text-blue-600 mb-4">Détail de la réparation</h1>

    <div class="bg-white rounded-lg shadow-md p-6 inline-block text-left">
      <h2 class="text-xl font-semibold">📱 Téléphone : {{ repair.repair_type }}</h2>
      <h3 class="text-lg text-gray-700 mb-4">💰 Prix : {{ repair.price }}€</h3>

      <label class="block mb-2 font-medium text-gray-700" for="date">
        Choisissez une date de rendez-vous :
      </label>

      <form @submit.prevent="confirmRdv" class="space-x-2">
        <input type="date" v-model="selectedDate" class="border p-2 rounded-lg mb-4">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
          Confirmer le rendez-vous
        </button>
      </form>

      <div class="mt-10">
  <h2 class="text-xl font-bold mb-4">📅 Vos rendez-vous</h2>
  <ul>
    <li v-if="appointments.length === 0" class="mb-5 text-gray-500 italic">
        Vous n'avez pas de rendez-vous de prévu.
    </li>
    <li v-else v-for="(appt, index) in appointments" :key="index" class="bg-gray-100 p-4 rounded-lg flex items-center space-x-4">
        <p>📱 {{ appt.repair_type }} — 🗓️ {{ appt.rdv_date }}</p>
        <button @click="deleteRdv(appt.id)" class="bg-red-500 text-white px-2 py-2 rounded-lg">
        Supprimer ce rdv
        </button>
    </li>
  </ul>
    <Link :href="route('repair')" class="bg-green-500 hover:bg-green-600 text-white px-2 py-2 rounded-lg">
          Revenir a la listes 
    </Link>

</div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
export default {
 

  data () {
    return {
        selectedDate: ''
    }
  },
  methods: {
    async confirmRdv() {
      if(this.selectedDate == "") {
        alert('Veuillez entrez une date')
      } 
      else {
        await axios.post('/appointment_check', {
        repair_type: this.repair.repair_type,
        selectedDate: this.selectedDate
      })
      alert("Rendez-vous confirmé !");
      window.location.reload()
      }
    },
    async deleteRdv(id) {
    try {
        await axios.delete(`/appointment_delete/${id}`);
        window.location.reload();
    } catch (error) {
        console.error(error.response?.data ?? error.message);
        alert('Erreur lors de la suppression du rendez-vous');
    }
}



  }
}
</script>
