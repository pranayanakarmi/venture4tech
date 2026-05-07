<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3'
import AppLayout from '@/layouts/AppLayout.vue'

const props = defineProps({ member: Object })

const form = useForm({
  name: props.member?.name ?? '',
  position: props.member?.position ?? '',
  department: props.member?.department ?? '',
  bio: props.member?.bio ?? '',
  email: props.member?.email ?? '',
  linkedin: props.member?.linkedin ?? '',
  twitter: props.member?.twitter ?? '',
  order: props.member?.order ?? 0,
  is_active: props.member?.is_active ?? true,
})

const submit = () => {
  if (props.member) {
    form.put(`/admin/team-members/${props.member.id}`)
  } else {
    form.post('/admin/team-members')
  }
}
</script>

<template>
  <AppLayout>
    <Head :title="member ? 'Edit Team Member' : 'New Team Member'" />

    <div class="mb-6 flex items-center gap-4">
      <Link href="/admin/team-members" class="text-gray-500 hover:text-gray-700 text-sm">← Back</Link>
      <h1 class="text-2xl font-bold text-gray-900">{{ member ? 'Edit Team Member' : 'New Team Member' }}</h1>
    </div>

    <form @submit.prevent="submit" class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 max-w-2xl space-y-5">
      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Name <span class="text-red-500">*</span></label>
          <input v-model="form.name" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
          <p v-if="form.errors.name" class="text-red-500 text-xs mt-1">{{ form.errors.name }}</p>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Position <span class="text-red-500">*</span></label>
          <input v-model="form.position" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
          <p v-if="form.errors.position" class="text-red-500 text-xs mt-1">{{ form.errors.position }}</p>
        </div>
      </div>

      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Department</label>
          <input v-model="form.department" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
          <p v-if="form.errors.department" class="text-red-500 text-xs mt-1">{{ form.errors.department }}</p>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
          <input v-model="form.email" type="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
          <p v-if="form.errors.email" class="text-red-500 text-xs mt-1">{{ form.errors.email }}</p>
        </div>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Bio</label>
        <textarea v-model="form.bio" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        <p v-if="form.errors.bio" class="text-red-500 text-xs mt-1">{{ form.errors.bio }}</p>
      </div>

      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">LinkedIn URL</label>
          <input v-model="form.linkedin" type="text" placeholder="https://linkedin.com/in/..." class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
          <p v-if="form.errors.linkedin" class="text-red-500 text-xs mt-1">{{ form.errors.linkedin }}</p>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Twitter URL</label>
          <input v-model="form.twitter" type="text" placeholder="https://twitter.com/..." class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
          <p v-if="form.errors.twitter" class="text-red-500 text-xs mt-1">{{ form.errors.twitter }}</p>
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
          {{ member ? 'Update Member' : 'Create Member' }}
        </button>
        <Link href="/admin/team-members" class="border border-gray-300 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-50">Cancel</Link>
      </div>
    </form>
  </AppLayout>
</template>
