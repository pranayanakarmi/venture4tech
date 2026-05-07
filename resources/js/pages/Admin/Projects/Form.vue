<script setup>
import { ref } from 'vue'
import { Head, Link, useForm } from '@inertiajs/vue3'
import AppLayout from '@/layouts/AppLayout.vue'
import { X, Plus } from 'lucide-vue-next'

const props = defineProps({ project: Object })

const form = useForm({
  title: props.project?.title ?? '',
  slug: props.project?.slug ?? '',
  short_description: props.project?.short_description ?? '',
  description: props.project?.description ?? '',
  client: props.project?.client ?? '',
  year: props.project?.year ?? '',
  url: props.project?.url ?? '',
  technologies: props.project?.technologies ?? [],
  category: props.project?.category ?? '',
  is_featured: props.project?.is_featured ?? false,
  is_active: props.project?.is_active ?? true,
  order: props.project?.order ?? 0,
})

const techInput = ref('')

const addTech = () => {
  const val = techInput.value.trim()
  if (val && !form.technologies.includes(val)) {
    form.technologies.push(val)
  }
  techInput.value = ''
}

const removeTech = (index) => {
  form.technologies.splice(index, 1)
}

const handleTechKeydown = (e) => {
  if (e.key === 'Enter' || e.key === ',') {
    e.preventDefault()
    addTech()
  }
}

const submit = () => {
  if (props.project) {
    form.put(`/admin/projects/${props.project.id}`)
  } else {
    form.post('/admin/projects')
  }
}
</script>

<template>
  <AppLayout>
    <Head :title="project ? 'Edit Project' : 'New Project'" />

    <div class="mb-6 flex items-center gap-4">
      <Link href="/admin/projects" class="text-gray-500 hover:text-gray-700 text-sm">← Back</Link>
      <h1 class="text-2xl font-bold text-gray-900">{{ project ? 'Edit Project' : 'New Project' }}</h1>
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
          <label class="block text-sm font-medium text-gray-700 mb-1">Client</label>
          <input v-model="form.client" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
          <p v-if="form.errors.client" class="text-red-500 text-xs mt-1">{{ form.errors.client }}</p>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Year</label>
          <input v-model="form.year" type="text" placeholder="e.g. 2024" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
          <p v-if="form.errors.year" class="text-red-500 text-xs mt-1">{{ form.errors.year }}</p>
        </div>
      </div>

      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">URL</label>
          <input v-model="form.url" type="text" placeholder="https://" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
          <p v-if="form.errors.url" class="text-red-500 text-xs mt-1">{{ form.errors.url }}</p>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
          <input v-model="form.category" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
          <p v-if="form.errors.category" class="text-red-500 text-xs mt-1">{{ form.errors.category }}</p>
        </div>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Technologies</label>
        <div class="flex flex-wrap gap-2 mb-2">
          <span v-for="(tech, i) in form.technologies" :key="i" class="inline-flex items-center gap-1 bg-blue-50 text-blue-700 text-xs px-2 py-1 rounded-full">
            {{ tech }}
            <button type="button" @click="removeTech(i)" class="hover:text-red-500"><X class="w-3 h-3" /></button>
          </span>
        </div>
        <div class="flex gap-2">
          <input v-model="techInput" @keydown="handleTechKeydown" type="text" placeholder="Add technology, press Enter" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
          <button type="button" @click="addTech" class="px-3 py-2 border border-gray-300 rounded-lg text-sm hover:bg-gray-50 flex items-center gap-1">
            <Plus class="w-4 h-4" /> Add
          </button>
        </div>
        <p v-if="form.errors.technologies" class="text-red-500 text-xs mt-1">{{ form.errors.technologies }}</p>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Order</label>
        <input v-model="form.order" type="number" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
        <p v-if="form.errors.order" class="text-red-500 text-xs mt-1">{{ form.errors.order }}</p>
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
          {{ project ? 'Update Project' : 'Create Project' }}
        </button>
        <Link href="/admin/projects" class="border border-gray-300 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-50">Cancel</Link>
      </div>
    </form>
  </AppLayout>
</template>
