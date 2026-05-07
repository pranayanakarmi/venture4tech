<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3'
import AppLayout from '@/layouts/AppLayout.vue'

const props = defineProps({ technology: Object })

const form = useForm({
  name: props.technology?.name ?? '',
  category: props.technology?.category ?? '',
  order: props.technology?.order ?? 0,
  is_active: props.technology?.is_active ?? true,
})

const submit = () => {
  if (props.technology) {
    form.put(`/admin/technologies/${props.technology.id}`)
  } else {
    form.post('/admin/technologies')
  }
}
</script>

<template>
  <AppLayout>
    <Head :title="technology ? 'Edit Technology' : 'New Technology'" />

    <div class="mb-6 flex items-center gap-4">
      <Link href="/admin/technologies" class="text-gray-500 hover:text-gray-700 text-sm">← Back</Link>
      <h1 class="text-2xl font-bold text-gray-900">{{ technology ? 'Edit Technology' : 'New Technology' }}</h1>
    </div>

    <form @submit.prevent="submit" class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 max-w-lg space-y-5">
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Name <span class="text-red-500">*</span></label>
        <input v-model="form.name" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
        <p v-if="form.errors.name" class="text-red-500 text-xs mt-1">{{ form.errors.name }}</p>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
        <input v-model="form.category" type="text" placeholder="e.g. Frontend, Backend, DevOps" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
        <p v-if="form.errors.category" class="text-red-500 text-xs mt-1">{{ form.errors.category }}</p>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Order</label>
        <input v-model="form.order" type="number" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
        <p v-if="form.errors.order" class="text-red-500 text-xs mt-1">{{ form.errors.order }}</p>
      </div>

      <div class="flex items-center gap-3">
        <button type="button" @click="form.is_active = !form.is_active"
          :class="['relative inline-flex h-6 w-11 items-center rounded-full transition-colors', form.is_active ? 'bg-[#1a56db]' : 'bg-gray-300']">
          <span :class="['inline-block h-4 w-4 transform rounded-full bg-white transition-transform', form.is_active ? 'translate-x-6' : 'translate-x-1']" />
        </button>
        <label class="text-sm font-medium text-gray-700">Active</label>
      </div>

      <div class="flex items-center gap-3 pt-2">
        <button type="submit" :disabled="form.processing" class="bg-[#1a56db] text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition-colors disabled:opacity-50">
          {{ technology ? 'Update Technology' : 'Create Technology' }}
        </button>
        <Link href="/admin/technologies" class="border border-gray-300 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-50">Cancel</Link>
      </div>
    </form>
  </AppLayout>
</template>
