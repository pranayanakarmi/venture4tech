<script setup>
import { Head, Link } from '@inertiajs/vue3'
import AppLayout from '@/layouts/AppLayout.vue'
import { ArrowLeft } from 'lucide-vue-next'

const props = defineProps({ contact: Object })
</script>

<template>
  <AppLayout>
    <Head :title="`Message from ${contact.name}`" />

    <div class="mb-6">
      <Link href="/admin/contacts" class="inline-flex items-center gap-2 text-gray-500 hover:text-gray-700 text-sm mb-4">
        <ArrowLeft class="w-4 h-4" /> Back to Messages
      </Link>
      <h1 class="text-2xl font-bold text-gray-900">Message from {{ contact.name }}</h1>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
      <div class="lg:col-span-2 bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
        <h3 class="font-semibold text-gray-900 mb-4">Message</h3>
        <p v-if="contact.subject" class="text-sm font-medium text-gray-700 mb-3">Re: {{ contact.subject }}</p>
        <p class="text-gray-700 leading-relaxed whitespace-pre-wrap">{{ contact.message }}</p>
      </div>
      <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
        <h3 class="font-semibold text-gray-900 mb-4">Sender Details</h3>
        <dl class="space-y-3 text-sm">
          <div><dt class="text-gray-500">Name</dt><dd class="font-medium text-gray-900">{{ contact.name }}</dd></div>
          <div><dt class="text-gray-500">Email</dt><dd><a :href="`mailto:${contact.email}`" class="text-[#1a56db] hover:underline">{{ contact.email }}</a></dd></div>
          <div v-if="contact.phone"><dt class="text-gray-500">Phone</dt><dd class="font-medium text-gray-900">{{ contact.phone }}</dd></div>
          <div v-if="contact.company"><dt class="text-gray-500">Company</dt><dd class="font-medium text-gray-900">{{ contact.company }}</dd></div>
          <div><dt class="text-gray-500">Received</dt><dd class="font-medium text-gray-900">{{ new Date(contact.created_at).toLocaleString() }}</dd></div>
        </dl>
        <a :href="`mailto:${contact.email}?subject=Re: ${contact.subject ?? 'Your inquiry'}`"
          class="mt-6 w-full bg-[#1a56db] text-white px-4 py-2.5 rounded-xl text-sm font-semibold flex items-center justify-center gap-2 hover:bg-blue-700 transition-colors">
          Reply by Email
        </a>
      </div>
    </div>
  </AppLayout>
</template>
