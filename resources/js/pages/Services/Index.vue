<script setup>
import { Head, Link } from '@inertiajs/vue3'
import GuestLayout from '@/layouts/GuestLayout.vue'
import { ArrowRight, Code2, Smartphone, Cloud, Brain, Palette, Shield, GitBranch, TrendingUp } from 'lucide-vue-next'

const props = defineProps({ services: Array, settings: Object })

const iconMap = { Code2, Smartphone, Cloud, Brain, Palette, Shield, GitBranch, TrendingUp }
const getIcon = (name) => iconMap[name] ?? Code2
</script>

<template>
  <GuestLayout>
    <Head title="Our Services" />

    <div class="bg-gradient-to-br from-gray-900 via-blue-950 to-gray-900 py-24">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="text-blue-300 font-semibold text-sm uppercase tracking-wider">What We Do</span>
        <h1 class="mt-3 text-4xl sm:text-5xl font-bold text-white mb-6">Our Services</h1>
        <p class="text-xl text-gray-300 max-w-3xl mx-auto">Comprehensive IT services tailored to your unique business challenges and growth goals.</p>
      </div>
    </div>

    <section class="py-20 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <Link v-for="service in services" :key="service.id" :href="`/services/${service.slug}`"
            class="group bg-white rounded-2xl p-8 hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-gray-100">
            <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-6 group-hover:bg-[#1a56db] transition-colors">
              <component :is="getIcon(service.icon)" class="w-7 h-7 text-[#1a56db] group-hover:text-white transition-colors" />
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-3">{{ service.title }}</h3>
            <p class="text-gray-600 text-sm leading-relaxed mb-4">{{ service.short_description }}</p>
            <span class="text-[#1a56db] text-sm font-medium flex items-center gap-1 group-hover:gap-2 transition-all">
              Learn more <ArrowRight class="w-4 h-4" />
            </span>
          </Link>
        </div>
      </div>
    </section>

    <!-- CTA -->
    <section class="py-20 bg-[#1a56db]">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-white mb-4">Need a Custom Solution?</h2>
        <p class="text-blue-100 text-lg mb-8 max-w-xl mx-auto">Tell us about your project and we'll craft the perfect solution for your needs.</p>
        <Link href="/contact" class="inline-flex items-center gap-2 bg-white text-[#1a56db] px-8 py-3.5 rounded-xl font-bold hover:bg-blue-50 transition-colors">
          Contact Us Today <ArrowRight class="w-5 h-5" />
        </Link>
      </div>
    </section>
  </GuestLayout>
</template>
