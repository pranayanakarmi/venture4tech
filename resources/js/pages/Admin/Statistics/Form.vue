<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3'
import AppLayout from '@/layouts/AppLayout.vue'

const props = defineProps({ statistic: Object })

const form = useForm({
  label: props.statistic?.label ?? '',
  value: props.statistic?.value ?? '',
  suffix: props.statistic?.suffix ?? '',
  icon: props.statistic?.icon ?? '',
  order: props.statistic?.order ?? 0,
  is_active: props.statistic?.is_active ?? true,
})

const submit = () => {
  if (props.statistic) {
    form.put(`/admin/statistics/${props.statistic.id}`)
  } else {
    form.post('/admin/statistics')
  }
}
</script>

<template>
  <AppLayout>
    <Head :title="statistic ? 'Edit Statistic' : 'New Statistic'" />

    <div class="mb-6 flex items-center gap-4">
      <Link href="/admin/statistics" class="text-gray-500 hover:text-gray-700 text-sm">← Back</Link>
      <h1 class="text-2xl font-bold text-gray-900">{{ statistic ? 'Edit Statistic' : 'New Statistic' }}</h1>
    </div>

    <form @submit.prevent="submit" class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 max-w-lg space-y-5">
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Label <span class="text-red-500">*</span></label>
        <input v-model="form.label" type="text" placeholder="e.g. Projects Completed" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
        <p v-if="form.errors.label" class="text-red-500 text-xs mt-1">{{ form.errors.label }}</p>
      </div>

      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Value <span class="text-red-500">*</span></label>
          <input v-model="form.value" type="text" placeholder="e.g. 150" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
          <p v-if="form.errors.value" class="text-red-500 text-xs mt-1">{{ form.errors.value }}</p>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Suffix</label>
          <input v-model="form.suffix" type="text" placeholder="e.g. +" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
          <p v-if="form.errors.suffix" class="text-red-500 text-xs mt-1">{{ form.errors.suffix }}</p>
        </div>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Icon Name</label>
        <input v-model="form.icon" type="text" placeholder="e.g. TrendingUp" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
        <p v-if="form.errors.icon" class="text-red-500 text-xs mt-1">{{ form.errors.icon }}</p>
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
          {{ statistic ? 'Update Statistic' : 'Create Statistic' }}
        </button>
        <Link href="/admin/statistics" class="border border-gray-300 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-50">Cancel</Link>
      </div>
    </form>
  </AppLayout>
</template>
