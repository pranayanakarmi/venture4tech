<script setup>
import { Head, Link, router } from '@inertiajs/vue3'
import AppLayout from '@/layouts/AppLayout.vue'
import { Plus, Pencil, Trash2 } from 'lucide-vue-next'

const props = defineProps({ slides: Array })

const destroy = (id) => {
  if (confirm('Are you sure you want to delete this slide?')) {
    router.delete(`/admin/hero-slides/${id}`)
  }
}
</script>

<template>
  <AppLayout>
    <Head title="Hero Slides" />

    <div class="mb-6 flex items-center justify-between">
      <div>
        <h1 class="text-2xl font-bold text-gray-900">Hero Slides</h1>
        <p class="text-gray-500 text-sm mt-1">{{ slides.length }} slide{{ slides.length !== 1 ? 's' : '' }}</p>
      </div>
      <Link href="/admin/hero-slides/create" class="bg-[#1a56db] text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition-colors flex items-center gap-2">
        <Plus class="w-4 h-4" /> Add Slide
      </Link>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
      <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-100">
          <tr>
            <th class="px-6 py-3 text-left font-semibold text-gray-600">Title</th>
            <th class="px-6 py-3 text-left font-semibold text-gray-600 hidden md:table-cell">Subtitle</th>
            <th class="px-6 py-3 text-left font-semibold text-gray-600 hidden sm:table-cell">Order</th>
            <th class="px-6 py-3 text-left font-semibold text-gray-600">Status</th>
            <th class="px-6 py-3 text-right font-semibold text-gray-600">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
          <tr v-for="slide in slides" :key="slide.id" class="hover:bg-gray-50 transition-colors">
            <td class="px-6 py-4 font-medium text-gray-900">{{ slide.title }}</td>
            <td class="px-6 py-4 text-gray-600 hidden md:table-cell truncate max-w-xs">{{ slide.subtitle }}</td>
            <td class="px-6 py-4 text-gray-600 hidden sm:table-cell">{{ slide.order }}</td>
            <td class="px-6 py-4">
              <span v-if="slide.is_active" class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Active</span>
              <span v-else class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-600">Inactive</span>
            </td>
            <td class="px-6 py-4">
              <div class="flex items-center justify-end gap-2">
                <Link :href="`/admin/hero-slides/${slide.id}/edit`" class="p-2 hover:bg-blue-50 rounded-lg transition-colors">
                  <Pencil class="w-4 h-4 text-[#1a56db]" />
                </Link>
                <button @click="destroy(slide.id)" class="p-2 hover:bg-red-50 rounded-lg transition-colors">
                  <Trash2 class="w-4 h-4 text-red-500" />
                </button>
              </div>
            </td>
          </tr>
          <tr v-if="!slides.length">
            <td colspan="5" class="px-6 py-8 text-center text-gray-400">No hero slides yet.</td>
          </tr>
        </tbody>
      </table>
    </div>
  </AppLayout>
</template>
