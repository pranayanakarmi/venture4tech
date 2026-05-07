<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3'
import AppLayout from '@/layouts/AppLayout.vue'

const props = defineProps({ slide: Object })

const form = useForm({
  title: props.slide?.title ?? '',
  subtitle: props.slide?.subtitle ?? '',
  description: props.slide?.description ?? '',
  cta_text: props.slide?.cta_text ?? '',
  cta_url: props.slide?.cta_url ?? '',
  secondary_cta_text: props.slide?.secondary_cta_text ?? '',
  secondary_cta_url: props.slide?.secondary_cta_url ?? '',
  order: props.slide?.order ?? 0,
  is_active: props.slide?.is_active ?? true,
})

const submit = () => {
  if (props.slide) {
    form.put(`/admin/hero-slides/${props.slide.id}`)
  } else {
    form.post('/admin/hero-slides')
  }
}
</script>

<template>
  <AppLayout>
    <Head :title="slide ? 'Edit Hero Slide' : 'New Hero Slide'" />

    <div class="mb-6 flex items-center gap-4">
      <Link href="/admin/hero-slides" class="text-gray-500 hover:text-gray-700 text-sm">← Back</Link>
      <h1 class="text-2xl font-bold text-gray-900">{{ slide ? 'Edit Hero Slide' : 'New Hero Slide' }}</h1>
    </div>

    <form @submit.prevent="submit" class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 max-w-2xl space-y-5">
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Title <span class="text-red-500">*</span></label>
        <input v-model="form.title" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
        <p v-if="form.errors.title" class="text-red-500 text-xs mt-1">{{ form.errors.title }}</p>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Subtitle</label>
        <input v-model="form.subtitle" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
        <p v-if="form.errors.subtitle" class="text-red-500 text-xs mt-1">{{ form.errors.subtitle }}</p>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
        <textarea v-model="form.description" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        <p v-if="form.errors.description" class="text-red-500 text-xs mt-1">{{ form.errors.description }}</p>
      </div>

      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">CTA Button Text</label>
          <input v-model="form.cta_text" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
          <p v-if="form.errors.cta_text" class="text-red-500 text-xs mt-1">{{ form.errors.cta_text }}</p>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">CTA Button URL</label>
          <input v-model="form.cta_url" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
          <p v-if="form.errors.cta_url" class="text-red-500 text-xs mt-1">{{ form.errors.cta_url }}</p>
        </div>
      </div>

      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Secondary CTA Text</label>
          <input v-model="form.secondary_cta_text" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
          <p v-if="form.errors.secondary_cta_text" class="text-red-500 text-xs mt-1">{{ form.errors.secondary_cta_text }}</p>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Secondary CTA URL</label>
          <input v-model="form.secondary_cta_url" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
          <p v-if="form.errors.secondary_cta_url" class="text-red-500 text-xs mt-1">{{ form.errors.secondary_cta_url }}</p>
        </div>
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
          {{ slide ? 'Update Slide' : 'Create Slide' }}
        </button>
        <Link href="/admin/hero-slides" class="border border-gray-300 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-50">Cancel</Link>
      </div>
    </form>
  </AppLayout>
</template>
