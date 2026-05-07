<script setup>
import { Head, Link } from '@inertiajs/vue3'
import GuestLayout from '@/layouts/GuestLayout.vue'
import { ArrowRight, ArrowLeft, Code2, Smartphone, Cloud, Brain, Palette, Shield, GitBranch, TrendingUp } from 'lucide-vue-next'

const props = defineProps({ service: Object, relatedServices: Array, settings: Object })
const iconMap = { Code2, Smartphone, Cloud, Brain, Palette, Shield, GitBranch, TrendingUp }
const getIcon = (name) => iconMap[name] ?? Code2
</script>

<template>
  <GuestLayout>
    <Head :title="service.title" />

    <div class="bg-gradient-to-br from-gray-900 via-blue-950 to-gray-900 py-24">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <Link href="/services" class="inline-flex items-center gap-2 text-blue-300 hover:text-white transition-colors mb-8 text-sm">
          <ArrowLeft class="w-4 h-4" /> Back to Services
        </Link>
        <div class="flex items-center gap-6">
          <div class="w-16 h-16 bg-white/10 rounded-2xl flex items-center justify-center">
            <component :is="getIcon(service.icon)" class="w-8 h-8 text-white" />
          </div>
          <h1 class="text-4xl sm:text-5xl font-bold text-white">{{ service.title }}</h1>
        </div>
      </div>
    </div>

    <section class="py-20 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
          <div class="lg:col-span-2 prose max-w-none">
            <p class="text-xl text-gray-600 leading-relaxed mb-8">{{ service.short_description }}</p>
            <div class="text-gray-700 leading-relaxed whitespace-pre-wrap">{{ service.description }}</div>
          </div>
          <div class="space-y-6">
            <div class="bg-blue-50 rounded-2xl p-6 border border-blue-100">
              <h3 class="font-bold text-gray-900 mb-4">Ready to Get Started?</h3>
              <p class="text-sm text-gray-600 mb-4">Let's discuss how we can help you with {{ service.title }}.</p>
              <Link href="/contact" class="w-full bg-[#1a56db] text-white px-4 py-2.5 rounded-xl text-sm font-semibold flex items-center justify-center gap-2 hover:bg-blue-700 transition-colors">
                Get a Free Consultation <ArrowRight class="w-4 h-4" />
              </Link>
            </div>
            <div v-if="relatedServices?.length" class="bg-white rounded-2xl p-6 border border-gray-100">
              <h3 class="font-bold text-gray-900 mb-4">Related Services</h3>
              <div class="space-y-3">
                <Link v-for="s in relatedServices" :key="s.id" :href="`/services/${s.slug}`"
                  class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-50 transition-colors group">
                  <span class="text-sm font-medium text-gray-700 group-hover:text-[#1a56db]">{{ s.title }}</span>
                  <ArrowRight class="w-4 h-4 text-gray-400 group-hover:text-[#1a56db]" />
                </Link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </GuestLayout>
</template>
