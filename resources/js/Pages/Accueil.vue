<script setup>
import Navbar from "@/Components/Navbar.vue";
import { usePage, Head, Link } from "@inertiajs/vue3";

const page = usePage()
</script>


<template>
  <Navbar/>
  <div class="min-h-screen bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto text-center">
      <h1 class="text-4xl font-bold mb-4 text-blue-600">Bienvenue chez <span class="text-black">JabssPhone</span></h1>
      <p class="text-lg text-gray-700 mb-6">
        Réparation rapide, efficace et garantie de vos téléphones. À domicile ou en point relais, nous sommes là pour vous aider.
      </p>

!
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        <div class="bg-white p-4 rounded-lg shadow">
          <h2 class="text-xl font-semibold text-blue-500">📱 Écran cassé</h2>
          <p class="text-gray-600">Remplacement express de vos écrans fissurés ou brisés.</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow">
          <h2 class="text-xl font-semibold text-blue-500">🔋 Batterie faible</h2>
          <p class="text-gray-600">On change votre batterie en un éclair !</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow">
          <h2 class="text-xl font-semibold text-blue-500">💧 Téléphone mouillé</h2>
          <p class="text-gray-600">Sauvetage rapide des téléphones tombés dans l'eau.</p>
        </div>
      </div>
      <Link :href="route('repair')" class="text-lg font-bold text-blue-600  rounded-lg px-3 py-1 hover:underline"
      >
          Voir nos offres
      </Link>
    </div>
  </div>
  
</template>
