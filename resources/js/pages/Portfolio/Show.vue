<script setup>
import { Head, Link } from '@inertiajs/vue3'
import GuestLayout from '@/layouts/GuestLayout.vue'
import { ArrowLeft, ExternalLink, ArrowRight } from 'lucide-vue-next'

const props = defineProps({ project: Object, settings: Object })
</script>

<template>
  <GuestLayout>
    <Head :title="project.title" />

    <div class="bg-gradient-to-br from-gray-900 via-blue-950 to-gray-900 py-24">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <Link href="/portfolio" class="inline-flex items-center gap-2 text-blue-300 hover:text-white transition-colors mb-8 text-sm">
          <ArrowLeft class="w-4 h-4" /> Back to Portfolio
        </Link>
        <div class="flex items-start justify-between flex-wrap gap-4">
          <div>
            <span class="text-blue-300 text-sm font-medium">{{ project.category }}</span>
            <h1 class="text-4xl font-bold text-white mt-1">{{ project.title }}</h1>
          </div>
          <a v-if="project.url" :href="project.url" target="_blank"
            class="inline-flex items-center gap-2 bg-white/10 text-white border border-white/20 px-5 py-2.5 rounded-xl text-sm font-medium hover:bg-white/20 transition-colors">
            View Live <ExternalLink class="w-4 h-4" />
          </a>
        </div>
      </div>
    </div>

    <section class="py-20 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
          <div class="lg:col-span-2">
            <div class="h-64 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mb-8">
              <span class="text-white text-8xl font-bold opacity-30">{{ project.title.charAt(0) }}</span>
            </div>
            <p class="text-xl text-gray-600 leading-relaxed mb-6">{{ project.short_description }}</p>
            <p class="text-gray-700 leading-relaxed whitespace-pre-wrap">{{ project.description }}</p>
          </div>
          <div class="space-y-6">
            <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
              <h3 class="font-bold text-gray-900 mb-4">Project Details</h3>
              <dl class="space-y-3 text-sm">
                <div v-if="project.client">
                  <dt class="text-gray-500">Client</dt>
                  <dd class="font-medium text-gray-900">{{ project.client }}</dd>
                </div>
                <div v-if="project.year">
                  <dt class="text-gray-500">Year</dt>
                  <dd class="font-medium text-gray-900">{{ project.year }}</dd>
                </div>
                <div v-if="project.category">
                  <dt class="text-gray-500">Category</dt>
                  <dd class="font-medium text-gray-900">{{ project.category }}</dd>
                </div>
              </dl>
            </div>
            <div v-if="project.technologies?.length" class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
              <h3 class="font-bold text-gray-900 mb-4">Technologies Used</h3>
              <div class="flex flex-wrap gap-2">
                <span v-for="tech in project.technologies" :key="tech"
                  class="bg-blue-100 text-blue-700 text-xs font-medium px-3 py-1 rounded-full">{{ tech }}</span>
              </div>
            </div>
            <div class="bg-blue-50 rounded-2xl p-6 border border-blue-100">
              <h3 class="font-bold text-gray-900 mb-3">Like what you see?</h3>
              <p class="text-sm text-gray-600 mb-4">Let us build something amazing for your business too.</p>
              <Link href="/contact" class="w-full bg-[#1a56db] text-white px-4 py-2.5 rounded-xl text-sm font-semibold flex items-center justify-center gap-2 hover:bg-blue-700 transition-colors">
                Start a Project <ArrowRight class="w-4 h-4" />
              </Link>
            </div>
          </div>
        </div>
      </div>
    </section>
  </GuestLayout>
</template>
