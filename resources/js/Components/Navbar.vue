<script setup>
  import { Link, usePage } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3'
  const { props } = usePage()
  const user = props.auth?.user || null
  
  </script>
<template>
    <nav class="flex items-center justify-between bg-white shadow p-4">
      <!-- Gauche -->
      <div class="flex items-center space-x-4">
        <Link :href="route('accueil')" class="text-lg font-bold text-blue-600 hover:underline">
          Accueil
        </Link>
      </div>
  
      <!-- Droite -->
      <div class="flex items-center space-x-4">
        <template v-if="user">
          <span class="text-gray-700">Bonjour, {{ user.name }}</span>
          <button
            @click="logout"
            class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition"
          >
            Se déconnecter
          </button>

        </template>
        <template v-else>
          <Link :href="route('login')" class="text-gray-600 hover:underline">
            Se connecter
          </Link>
          <Link :href="route('register')" class="text-red-600 hover:underline">
            S'inscrire
          </Link>
        </template>
      </div>
    </nav>
  </template>
  
<script>

export default {
  methods: {
    logout() {
      router.post(route('logout'))
    }
  }
}

</script>
  