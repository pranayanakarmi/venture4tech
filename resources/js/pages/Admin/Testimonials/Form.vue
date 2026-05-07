<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3'
import AppLayout from '@/layouts/AppLayout.vue'

const props = defineProps({ testimonial: Object })

const form = useForm({
  name: props.testimonial?.name ?? '',
  position: props.testimonial?.position ?? '',
  company: props.testimonial?.company ?? '',
  content: props.testimonial?.content ?? '',
  rating: props.testimonial?.rating ?? 5,
  order: props.testimonial?.order ?? 0,
  is_active: props.testimonial?.is_active ?? true,
})

const submit = () => {
  if (props.testimonial) {
    form.put(`/admin/testimonials/${props.testimonial.id}`)
  } else {
    form.post('/admin/testimonials')
  }
}
</script>

<template>
  <AppLayout>
    <Head :title="testimonial ? 'Edit Testimonial' : 'New Testimonial'" />

    <div class="mb-6 flex items-center gap-4">
      <Link href="/admin/testimonials" class="text-gray-500 hover:text-gray-700 text-sm">← Back</Link>
      <h1 class="text-2xl font-bold text-gray-900">{{ testimonial ? 'Edit Testimonial' : 'New Testimonial' }}</h1>
    </div>

    <form @submit.prevent="submit" class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 max-w-2xl space-y-5">
      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Name <span class="text-red-500">*</span></label>
          <input v-model="form.name" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
          <p v-if="form.errors.name" class="text-red-500 text-xs mt-1">{{ form.errors.name }}</p>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Position</label>
          <input v-model="form.position" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
          <p v-if="form.errors.position" class="text-red-500 text-xs mt-1">{{ form.errors.position }}</p>
        </div>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Company</label>
        <input v-model="form.company" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
        <p v-if="form.errors.company" class="text-red-500 text-xs mt-1">{{ form.errors.company }}</p>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Content <span class="text-red-500">*</span></label>
        <textarea v-model="form.content" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        <p v-if="form.errors.content" class="text-red-500 text-xs mt-1">{{ form.errors.content }}</p>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Rating <span class="text-red-500">*</span></label>
        <div class="flex items-center gap-1">
          <button v-for="n in 5" :key="n" type="button" @click="form.rating = n"
            :class="['text-2xl transition-colors', n <= form.rating ? 'text-yellow-400' : 'text-gray-300 hover:text-yellow-300']">
            ★
          </button>
          <span class="ml-2 text-sm text-gray-600">{{ form.rating }} / 5</span>
        </div>
        <p v-if="form.errors.rating" class="text-red-500 text-xs mt-1">{{ form.errors.rating }}</p>
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
          {{ testimonial ? 'Update Testimonial' : 'Create Testimonial' }}
        </button>
        <Link href="/admin/testimonials" class="border border-gray-300 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-50">Cancel</Link>
      </div>
    </form>
  </AppLayout>
</template>
