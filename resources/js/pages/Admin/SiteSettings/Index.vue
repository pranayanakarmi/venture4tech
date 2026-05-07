<script setup>
import { Head, useForm } from '@inertiajs/vue3'
import AppLayout from '@/layouts/AppLayout.vue'

const props = defineProps({ settings: Object })

const form = useForm({
  company_name: props.settings?.company_name ?? '',
  company_tagline: props.settings?.company_tagline ?? '',
  company_email: props.settings?.company_email ?? '',
  company_phone: props.settings?.company_phone ?? '',
  company_address: props.settings?.company_address ?? '',
  company_about: props.settings?.company_about ?? '',
  social_linkedin: props.settings?.social_linkedin ?? '',
  social_twitter: props.settings?.social_twitter ?? '',
  social_facebook: props.settings?.social_facebook ?? '',
  social_instagram: props.settings?.social_instagram ?? '',
  social_github: props.settings?.social_github ?? '',
  footer_copyright: props.settings?.footer_copyright ?? '',
  footer_tagline: props.settings?.footer_tagline ?? '',
  meta_title: props.settings?.meta_title ?? '',
  meta_description: props.settings?.meta_description ?? '',
})

const submit = () => {
  form.put('/admin/site-settings')
}
</script>

<template>
  <AppLayout>
    <Head title="Site Settings" />

    <div class="mb-6">
      <h1 class="text-2xl font-bold text-gray-900">Site Settings</h1>
      <p class="text-gray-500 text-sm mt-1">Manage your website content and configuration</p>
    </div>

    <form @submit.prevent="submit" class="space-y-6 max-w-2xl">
      <!-- Company Info -->
      <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 space-y-4">
        <h2 class="text-base font-semibold text-gray-900 pb-2 border-b border-gray-100">Company Information</h2>

        <div class="grid grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Company Name</label>
            <input v-model="form.company_name" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
            <p v-if="form.errors.company_name" class="text-red-500 text-xs mt-1">{{ form.errors.company_name }}</p>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Tagline</label>
            <input v-model="form.company_tagline" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
            <p v-if="form.errors.company_tagline" class="text-red-500 text-xs mt-1">{{ form.errors.company_tagline }}</p>
          </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input v-model="form.company_email" type="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
            <p v-if="form.errors.company_email" class="text-red-500 text-xs mt-1">{{ form.errors.company_email }}</p>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
            <input v-model="form.company_phone" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
            <p v-if="form.errors.company_phone" class="text-red-500 text-xs mt-1">{{ form.errors.company_phone }}</p>
          </div>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
          <input v-model="form.company_address" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
          <p v-if="form.errors.company_address" class="text-red-500 text-xs mt-1">{{ form.errors.company_address }}</p>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">About / Description</label>
          <textarea v-model="form.company_about" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
          <p v-if="form.errors.company_about" class="text-red-500 text-xs mt-1">{{ form.errors.company_about }}</p>
        </div>
      </div>

      <!-- Social Links -->
      <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 space-y-4">
        <h2 class="text-base font-semibold text-gray-900 pb-2 border-b border-gray-100">Social Links</h2>

        <div class="grid grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">LinkedIn</label>
            <input v-model="form.social_linkedin" type="text" placeholder="https://linkedin.com/company/..." class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
            <p v-if="form.errors.social_linkedin" class="text-red-500 text-xs mt-1">{{ form.errors.social_linkedin }}</p>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Twitter / X</label>
            <input v-model="form.social_twitter" type="text" placeholder="https://twitter.com/..." class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
            <p v-if="form.errors.social_twitter" class="text-red-500 text-xs mt-1">{{ form.errors.social_twitter }}</p>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Facebook</label>
            <input v-model="form.social_facebook" type="text" placeholder="https://facebook.com/..." class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
            <p v-if="form.errors.social_facebook" class="text-red-500 text-xs mt-1">{{ form.errors.social_facebook }}</p>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Instagram</label>
            <input v-model="form.social_instagram" type="text" placeholder="https://instagram.com/..." class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
            <p v-if="form.errors.social_instagram" class="text-red-500 text-xs mt-1">{{ form.errors.social_instagram }}</p>
          </div>
          <div class="col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-1">GitHub</label>
            <input v-model="form.social_github" type="text" placeholder="https://github.com/..." class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
            <p v-if="form.errors.social_github" class="text-red-500 text-xs mt-1">{{ form.errors.social_github }}</p>
          </div>
        </div>
      </div>

      <!-- Footer -->
      <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 space-y-4">
        <h2 class="text-base font-semibold text-gray-900 pb-2 border-b border-gray-100">Footer</h2>

        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Copyright Text</label>
          <input v-model="form.footer_copyright" type="text" placeholder="© 2024 Company. All rights reserved." class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
          <p v-if="form.errors.footer_copyright" class="text-red-500 text-xs mt-1">{{ form.errors.footer_copyright }}</p>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Footer Tagline</label>
          <input v-model="form.footer_tagline" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
          <p v-if="form.errors.footer_tagline" class="text-red-500 text-xs mt-1">{{ form.errors.footer_tagline }}</p>
        </div>
      </div>

      <!-- SEO -->
      <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 space-y-4">
        <h2 class="text-base font-semibold text-gray-900 pb-2 border-b border-gray-100">SEO / Meta</h2>

        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Meta Title</label>
          <input v-model="form.meta_title" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
          <p v-if="form.errors.meta_title" class="text-red-500 text-xs mt-1">{{ form.errors.meta_title }}</p>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Meta Description</label>
          <textarea v-model="form.meta_description" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
          <p v-if="form.errors.meta_description" class="text-red-500 text-xs mt-1">{{ form.errors.meta_description }}</p>
        </div>
      </div>

      <div class="flex items-center gap-3">
        <button type="submit" :disabled="form.processing" class="bg-[#1a56db] text-white px-6 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition-colors disabled:opacity-50">
          Save Settings
        </button>
        <span v-if="form.recentlySuccessful" class="text-green-600 text-sm font-medium">Saved!</span>
      </div>
    </form>
  </AppLayout>
</template>
