<script setup>
import { Head, Link, router } from '@inertiajs/vue3'
import AppLayout from '@/layouts/AppLayout.vue'
import { Eye, Trash2 } from 'lucide-vue-next'

const props = defineProps({ contacts: Object })

const deleteContact = (id) => {
  if (confirm('Are you sure you want to delete this message?')) {
    router.delete(`/admin/contacts/${id}`)
  }
}
</script>

<template>
  <AppLayout>
    <Head title="Messages" />

    <div class="mb-6">
      <h1 class="text-2xl font-bold text-gray-900">Contact Messages</h1>
      <p class="text-gray-500 text-sm mt-1">{{ contacts.total }} total messages</p>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
      <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-100">
          <tr>
            <th class="px-6 py-3 text-left font-semibold text-gray-600">Name</th>
            <th class="px-6 py-3 text-left font-semibold text-gray-600 hidden sm:table-cell">Email</th>
            <th class="px-6 py-3 text-left font-semibold text-gray-600 hidden md:table-cell">Subject</th>
            <th class="px-6 py-3 text-left font-semibold text-gray-600 hidden lg:table-cell">Date</th>
            <th class="px-6 py-3 text-right font-semibold text-gray-600">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
          <tr v-for="contact in contacts.data" :key="contact.id" class="hover:bg-gray-50 transition-colors">
            <td class="px-6 py-4">
              <div class="flex items-center gap-2">
                <span class="font-medium text-gray-900">{{ contact.name }}</span>
                <span v-if="!contact.is_read" class="w-2 h-2 bg-[#1a56db] rounded-full"></span>
              </div>
            </td>
            <td class="px-6 py-4 text-gray-600 hidden sm:table-cell">{{ contact.email }}</td>
            <td class="px-6 py-4 text-gray-600 hidden md:table-cell truncate max-w-xs">{{ contact.subject ?? contact.message.substring(0, 50) + '...' }}</td>
            <td class="px-6 py-4 text-gray-500 hidden lg:table-cell text-xs">{{ new Date(contact.created_at).toLocaleDateString() }}</td>
            <td class="px-6 py-4">
              <div class="flex items-center justify-end gap-2">
                <Link :href="`/admin/contacts/${contact.id}`" class="p-2 hover:bg-blue-50 rounded-lg transition-colors">
                  <Eye class="w-4 h-4 text-[#1a56db]" />
                </Link>
                <button @click="deleteContact(contact.id)" class="p-2 hover:bg-red-50 rounded-lg transition-colors">
                  <Trash2 class="w-4 h-4 text-red-500" />
                </button>
              </div>
            </td>
          </tr>
          <tr v-if="!contacts.data?.length">
            <td colspan="5" class="px-6 py-8 text-center text-gray-400">No messages yet.</td>
          </tr>
        </tbody>
      </table>
    </div>
  </AppLayout>
</template>
