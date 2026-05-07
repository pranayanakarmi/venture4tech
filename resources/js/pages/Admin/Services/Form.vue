<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3'
import AppLayout from '@/layouts/AppLayout.vue'

const props = defineProps({ service: Object })

const form = useForm({
  title: props.service?.title ?? '',
  slug: props.service?.slug ?? '',
  short_description: props.service?.short_description ?? '',
  description: props.service?.description ?? '',
  icon: props.service?.icon ?? '',
  order: props.service?.order ?? 0,
  is_active: props.service?.is_active ?? true,
  is_featured: props.service?.is_featured ?? false,
})

const submit = () => {
  if (props.service) {
    form.put(`/admin/services/${props.service.id}`)
  } else {
    form.post('/admin/services')
  }
}
</script>

<template>
  <AppLayout>
    <Head :title="service ? 'Edit Service' : 'New Service'" />

    <div class="mb-6 flex items-center gap-4">
      <Link href="/admin/services" class="text-gray-500 hover:text-gray-700 text-sm">← Back</Link>
      <h1 class="text-2xl font-bold text-gray-900">{{ service ? 'Edit Service' : 'New Service' }}</h1>
    </div>

    <form @submit.prevent="submit" class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 max-w-2xl space-y-5">
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Title <span class="text-red-500">*</span></label>
        <input v-model="form.title" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
        <p v-if="form.errors.title" class="text-red-500 text-xs mt-1">{{ form.errors.title }}</p>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Slug <span class="text-gray-400 font-normal">(auto-generated if empty)</span></label>
        <input v-model="form.slug" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
        <p v-if="form.errors.slug" class="text-red-500 text-xs mt-1">{{ form.errors.slug }}</p>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Short Description</label>
        <textarea v-model="form.short_description" rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        <p v-if="form.errors.short_description" class="text-red-500 text-xs mt-1">{{ form.errors.short_description }}</p>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Full Description</label>
        <textarea v-model="form.description" rows="5" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        <p v-if="form.errors.description" class="text-red-500 text-xs mt-1">{{ form.errors.description }}</p>
      </div>

      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Icon Name</label>
          <input v-model="form.icon" type="text" placeholder="e.g. Code2" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
          <p v-if="form.errors.icon" class="text-red-500 text-xs mt-1">{{ form.errors.icon }}</p>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Order</label>
          <input v-model="form.order" type="number" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
          <p v-if="form.errors.order" class="text-red-500 text-xs mt-1">{{ form.errors.order }}</p>
        </div>
      </div>

      <div class="flex items-center gap-6">
        <div class="flex items-center gap-3">
          <button type="button" @click="form.is_active = !form.is_active"
            :class="['relative inline-flex h-6 w-11 items-center rounded-full transition-colors', form.is_active ? 'bg-[#1a56db]' : 'bg-gray-300']">
            <span :class="['inline-block h-4 w-4 transform rounded-full bg-white transition-transform', form.is_active ? 'translate-x-6' : 'translate-x-1']" />
          </button>
          <label class="text-sm font-medium text-gray-700">Active</label>
        </div>
        <div class="flex items-center gap-3">
          <button type="button" @click="form.is_featured = !form.is_featured"
            :class="['relative inline-flex h-6 w-11 items-center rounded-full transition-colors', form.is_featured ? 'bg-[#1a56db]' : 'bg-gray-300']">
            <span :class="['inline-block h-4 w-4 transform rounded-full bg-white transition-transform', form.is_featured ? 'translate-x-6' : 'translate-x-1']" />
          </button>
          <label class="text-sm font-medium text-gray-700">Featured</label>
        </div>
      </div>

      <div class="flex items-center gap-3 pt-2">
        <button type="submit" :disabled="form.processing" class="bg-[#1a56db] text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition-colors disabled:opacity-50">
          {{ service ? 'Update Service' : 'Create Service' }}
        </button>
        <Link href="/admin/services" class="border border-gray-300 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-50">Cancel</Link>
      </div>
    </form>
  </AppLayout>
</template>
