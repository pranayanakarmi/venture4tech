<script setup>
import { Head, useForm } from '@inertiajs/vue3'
import { Eye, EyeOff } from 'lucide-vue-next'
import { ref } from 'vue'

const showPassword = ref(false)
const form = useForm({
  email: '',
  password: '',
  remember: false,
})
const submit = () => form.post('/login')
</script>

<template>
  <Head title="Login" />
  <div class="min-h-screen bg-gradient-to-br from-gray-900 via-blue-950 to-gray-900 flex items-center justify-center p-4">
    <div class="w-full max-w-md">
      <div class="text-center mb-8">
        <div class="w-16 h-16 bg-[#1a56db] rounded-2xl flex items-center justify-center mx-auto mb-4">
          <span class="text-white font-bold text-2xl">V4</span>
        </div>
        <h1 class="text-2xl font-bold text-white">Admin Login</h1>
        <p class="text-gray-400 text-sm mt-1">Venture Four Technology</p>
      </div>

      <form @submit.prevent="submit" class="bg-white rounded-2xl p-8 shadow-2xl space-y-6">
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
          <input v-model="form.email" type="email" required autocomplete="email" placeholder="admin@venture4tech.com"
            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#1a56db]" />
          <p v-if="form.errors.email" class="mt-1 text-xs text-red-600">{{ form.errors.email }}</p>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1.5">Password</label>
          <div class="relative">
            <input v-model="form.password" :type="showPassword ? 'text' : 'password'" required autocomplete="current-password"
              class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm pr-12 focus:outline-none focus:ring-2 focus:ring-[#1a56db]" />
            <button type="button" @click="showPassword = !showPassword" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
              <Eye v-if="!showPassword" class="w-5 h-5" />
              <EyeOff v-else class="w-5 h-5" />
            </button>
          </div>
          <p v-if="form.errors.password" class="mt-1 text-xs text-red-600">{{ form.errors.password }}</p>
        </div>
        <div class="flex items-center gap-2">
          <input v-model="form.remember" type="checkbox" id="remember" class="rounded border-gray-300 text-[#1a56db]" />
          <label for="remember" class="text-sm text-gray-600">Remember me</label>
        </div>
        <button type="submit" :disabled="form.processing"
          class="w-full bg-[#1a56db] text-white py-3 rounded-xl font-semibold hover:bg-blue-700 transition-colors disabled:opacity-60">
          {{ form.processing ? 'Signing in...' : 'Sign In' }}
        </button>
      </form>
    </div>
  </div>
</template>
