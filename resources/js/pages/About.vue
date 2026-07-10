<script setup>
import { Head, Link } from '@inertiajs/vue3'
import GuestLayout from '@/layouts/GuestLayout.vue'
import { Linkedin, Twitter, Mail, ArrowRight, CheckCircle } from 'lucide-vue-next'

const props = defineProps({
  team: Array,
  statistics: Array,
  settings: Object,
})

const values = [
  { title: 'Innovation First', desc: 'We embrace emerging technologies and creative problem-solving to deliver future-ready solutions.' },
  { title: 'Client Partnership', desc: 'We treat every client relationship as a long-term partnership, not just a transaction.' },
  { title: 'Excellence in Delivery', desc: 'We are committed to quality, precision, and on-time delivery in every project we undertake.' },
  { title: 'Transparent Communication', desc: 'We keep clients informed at every stage with clear, honest communication and no surprises.' },
]
</script>

<template>
  <GuestLayout>
    <Head title="About Us" />

    <!-- Hero -->
    <div class="bg-gradient-to-br from-gray-900 via-blue-950 to-gray-900 py-24">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="text-blue-300 font-semibold text-sm uppercase tracking-wider">Who We Are</span>
        <h1 class="mt-3 text-4xl sm:text-5xl font-bold text-white mb-6">About Sangam</h1>
        <p class="text-xl text-gray-300 max-w-3xl mx-auto">A passionate team of technologists, designers, and strategists committed to building digital products that make a difference.</p>
      </div>
    </div>

    <!-- Story -->
    <section class="py-20 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
          <div>
            <span class="text-[#1a56db] font-semibold text-sm uppercase tracking-wider">Our Story</span>
            <h2 class="mt-2 text-3xl font-bold text-gray-900 mb-6">Founded on a Vision to Democratize Technology</h2>
            <p class="text-gray-600 leading-relaxed mb-4">Founded in 2017 in Hyderabad, Sangam started with a simple mission: make world-class software development accessible to businesses of all sizes. What began as a four-person startup has grown into a team of 45+ engineers, designers, and strategists.</p>
            <p class="text-gray-600 leading-relaxed mb-6">Today, we serve clients across India and internationally, delivering solutions in healthcare, fintech, education, e-commerce, logistics, and enterprise software. Our team brings deep expertise in modern technologies while maintaining the agility and personal attention of a boutique agency.</p>
            <Link href="/contact" class="inline-flex items-center gap-2 bg-[#1a56db] text-white px-6 py-3 rounded-xl font-semibold hover:bg-blue-700 transition-colors">
              Work With Us <ArrowRight class="w-4 h-4" />
            </Link>
          </div>
          <div class="grid grid-cols-2 gap-4">
            <div v-for="stat in statistics" :key="stat.id" class="bg-blue-50 rounded-2xl p-6 text-center">
              <div class="text-4xl font-bold text-[#1a56db]">{{ stat.value }}{{ stat.suffix }}</div>
              <div class="text-sm text-gray-600 mt-2 font-medium">{{ stat.label }}</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Values -->
    <section class="py-20 bg-gray-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
          <span class="text-[#1a56db] font-semibold text-sm uppercase tracking-wider">What We Stand For</span>
          <h2 class="mt-2 text-3xl font-bold text-gray-900">Our Core Values</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
          <div v-for="value in values" :key="value.title" class="bg-white rounded-2xl p-8 border border-gray-100">
            <div class="flex items-start gap-4">
              <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center shrink-0">
                <CheckCircle class="w-5 h-5 text-[#1a56db]" />
              </div>
              <div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">{{ value.title }}</h3>
                <p class="text-gray-600 leading-relaxed">{{ value.desc }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Team -->
    <section id="team" class="py-20 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
          <span class="text-[#1a56db] font-semibold text-sm uppercase tracking-wider">Our People</span>
          <h2 class="mt-2 text-3xl font-bold text-gray-900">Meet the Team</h2>
          <p class="mt-4 text-gray-600 max-w-2xl mx-auto">The talented individuals behind Sangam's success.</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
          <div v-for="member in team" :key="member.id" class="bg-gray-50 rounded-2xl p-8 text-center border border-gray-100">
            <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
              <span class="text-white text-3xl font-bold">{{ member.name.charAt(0) }}</span>
            </div>
            <h3 class="text-lg font-bold text-gray-900">{{ member.name }}</h3>
            <p class="text-[#1a56db] font-medium text-sm mb-1">{{ member.position }}</p>
            <p v-if="member.department" class="text-gray-500 text-xs mb-4">{{ member.department }}</p>
            <p v-if="member.bio" class="text-gray-600 text-sm leading-relaxed mb-5">{{ member.bio }}</p>
            <div class="flex justify-center gap-3">
              <a v-if="member.email" :href="`mailto:${member.email}`" class="w-8 h-8 bg-white rounded-lg flex items-center justify-center border border-gray-200 hover:bg-blue-50 transition-colors">
                <Mail class="w-4 h-4 text-gray-600" />
              </a>
              <a v-if="member.linkedin" :href="member.linkedin" target="_blank" class="w-8 h-8 bg-white rounded-lg flex items-center justify-center border border-gray-200 hover:bg-blue-50 transition-colors">
                <Linkedin class="w-4 h-4 text-gray-600" />
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </GuestLayout>
</template>
