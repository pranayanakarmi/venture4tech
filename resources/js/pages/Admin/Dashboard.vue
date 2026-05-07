<script setup>
import { Head, Link } from '@inertiajs/vue3'
import AppLayout from '@/layouts/AppLayout.vue'
import { MessageSquare, Briefcase, Star, Wrench, Eye } from 'lucide-vue-next'

const props = defineProps({
  stats: Object,
  recentContacts: Array,
})
</script>

<template>
  <AppLayout>
    <Head title="Admin Dashboard" />

    <div class="mb-8">
      <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
      <p class="text-gray-500 text-sm mt-1">Welcome to Venture Four Technology Admin Panel</p>
    </div>

    <!-- Stats cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
      <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
        <div class="flex items-center justify-between mb-4">
          <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
            <Wrench class="w-5 h-5 text-[#1a56db]" />
          </div>
          <span class="text-2xl font-bold text-gray-900">{{ stats.services }}</span>
        </div>
        <p class="text-sm font-medium text-gray-600">Services</p>
      </div>
      <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
        <div class="flex items-center justify-between mb-4">
          <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center">
            <Briefcase class="w-5 h-5 text-indigo-600" />
          </div>
          <span class="text-2xl font-bold text-gray-900">{{ stats.projects }}</span>
        </div>
        <p class="text-sm font-medium text-gray-600">Projects</p>
      </div>
      <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
        <div class="flex items-center justify-between mb-4">
          <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center">
            <Star class="w-5 h-5 text-yellow-600" />
          </div>
          <span class="text-2xl font-bold text-gray-900">{{ stats.testimonials }}</span>
        </div>
        <p class="text-sm font-medium text-gray-600">Testimonials</p>
      </div>
      <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
        <div class="flex items-center justify-between mb-4">
          <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
            <MessageSquare class="w-5 h-5 text-green-600" />
          </div>
          <div class="text-right">
            <span class="text-2xl font-bold text-gray-900">{{ stats.contacts }}</span>
            <span v-if="stats.unread_contacts > 0" class="ml-2 text-xs bg-red-100 text-red-600 px-2 py-0.5 rounded-full">{{ stats.unread_contacts }} new</span>
          </div>
        </div>
        <p class="text-sm font-medium text-gray-600">Messages</p>
      </div>
    </div>

    <!-- Recent contacts -->
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm">
      <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
        <h2 class="font-bold text-gray-900">Recent Messages</h2>
        <Link href="/admin/contacts" class="text-sm text-[#1a56db] hover:underline">View all</Link>
      </div>
      <div class="divide-y divide-gray-50">
        <div v-for="contact in recentContacts" :key="contact.id" class="px-6 py-4 flex items-center justify-between hover:bg-gray-50 transition-colors">
          <div>
            <div class="flex items-center gap-2">
              <p class="font-medium text-gray-900 text-sm">{{ contact.name }}</p>
              <span v-if="!contact.is_read" class="w-2 h-2 bg-[#1a56db] rounded-full"></span>
            </div>
            <p class="text-xs text-gray-500 mt-0.5">{{ contact.email }}</p>
            <p class="text-xs text-gray-600 mt-1 truncate max-w-xs">{{ contact.message }}</p>
          </div>
          <Link :href="`/admin/contacts/${contact.id}`" class="p-2 hover:bg-gray-100 rounded-lg transition-colors">
            <Eye class="w-4 h-4 text-gray-400" />
          </Link>
        </div>
        <div v-if="!recentContacts?.length" class="px-6 py-8 text-center text-gray-400 text-sm">No messages yet.</div>
      </div>
    </div>
  </AppLayout>
</template>
