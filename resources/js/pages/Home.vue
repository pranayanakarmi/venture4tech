<script setup>
import { ref } from 'vue'
import { Head, Link } from '@inertiajs/vue3'
import GuestLayout from '@/layouts/GuestLayout.vue'
import { Swiper, SwiperSlide } from 'swiper/vue'
import { Autoplay, Pagination, Navigation, EffectFade } from 'swiper/modules'
import { ArrowRight, CheckCircle, Star, Code2, Smartphone, Cloud, Brain, Palette, Shield, GitBranch, TrendingUp, Award, Users, UserCheck } from 'lucide-vue-next'
import 'swiper/css'
import 'swiper/css/pagination'
import 'swiper/css/navigation'
import 'swiper/css/effect-fade'

const props = defineProps({
  heroSlides: Array,
  heroSection: Object,
  aboutSection: Object,
  servicesSection: Object,
  services: Array,
  projectsSection: Object,
  projects: Array,
  testimonialsSection: Object,
  testimonials: Array,
  statsSection: Object,
  statistics: Array,
  clientsSection: Object,
  partners: Array,
  ctaSection: Object,
  techSection: Object,
  technologies: Array,
  settings: Object,
})

const swiperModules = [Autoplay, Pagination, Navigation, EffectFade]
const activeFilter = ref('All')
const categories = ['All', 'Healthcare', 'Education', 'FinTech', 'E-Commerce', 'Logistics', 'Enterprise']

const filteredProjects = () => {
  if (activeFilter.value === 'All') return props.projects
  return props.projects?.filter(p => p.category === activeFilter.value)
}

const iconMap = {
  Code2, Smartphone, Cloud, Brain, Palette, Shield, GitBranch, TrendingUp,
  CheckCircle, Award, Users, UserCheck
}

const getIcon = (name) => iconMap[name] ?? Code2

const techColors = {
  'Frontend': 'bg-blue-100 text-blue-700',
  'Backend': 'bg-green-100 text-green-700',
  'Cloud': 'bg-purple-100 text-purple-700',
  'DevOps': 'bg-orange-100 text-orange-700',
  'Mobile': 'bg-pink-100 text-pink-700',
  'Database': 'bg-yellow-100 text-yellow-700',
  'AI/ML': 'bg-red-100 text-red-700',
}
</script>

<template>
  <GuestLayout>
    <Head title="Home" />

    <!-- HERO SLIDER -->
    <section class="relative overflow-hidden">
      <Swiper
        :modules="swiperModules"
        :slides-per-view="1"
        :loop="true"
        effect="fade"
        :autoplay="{ delay: 5000, disableOnInteraction: false }"
        :pagination="{ clickable: true }"
        :navigation="true"
        class="hero-swiper"
      >
        <SwiperSlide v-for="slide in heroSlides" :key="slide.id">
          <div class="relative min-h-[90vh] flex items-center bg-gradient-to-br from-gray-900 via-blue-950 to-gray-900">
            <!-- Background decoration -->
            <div class="absolute inset-0 overflow-hidden">
              <div class="absolute -top-40 -right-40 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl"></div>
              <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-indigo-500/10 rounded-full blur-3xl"></div>
            </div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
              <div class="max-w-3xl">
                <span v-if="slide.subtitle" class="inline-block bg-blue-500/20 text-blue-300 text-sm font-medium px-4 py-1.5 rounded-full mb-6 border border-blue-500/30">
                  {{ slide.subtitle }}
                </span>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight mb-6">
                  {{ slide.title }}
                </h1>
                <p class="text-lg text-gray-300 leading-relaxed mb-10 max-w-2xl">
                  {{ slide.description }}
                </p>
                <div class="flex flex-wrap gap-4">
                  <Link v-if="slide.cta_url" :href="slide.cta_url"
                    class="inline-flex items-center gap-2 bg-[#1a56db] text-white px-8 py-3.5 rounded-xl font-semibold hover:bg-blue-600 transition-all hover:shadow-lg hover:shadow-blue-500/30 hover:-translate-y-0.5">
                    {{ slide.cta_text }}
                    <ArrowRight class="w-5 h-5" />
                  </Link>
                  <Link v-if="slide.secondary_cta_url" :href="slide.secondary_cta_url"
                    class="inline-flex items-center gap-2 bg-white/10 text-white border border-white/20 px-8 py-3.5 rounded-xl font-semibold hover:bg-white/20 transition-all backdrop-blur-sm">
                    {{ slide.secondary_cta_text }}
                  </Link>
                </div>
              </div>
            </div>
          </div>
        </SwiperSlide>
      </Swiper>
    </section>

    <!-- ABOUT SECTION -->
    <section v-if="aboutSection" class="py-20 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
          <div>
            <span v-if="aboutSection.label" class="text-[#1a56db] font-semibold text-sm uppercase tracking-wider">{{ aboutSection.label }}</span>
            <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-gray-900 leading-tight">{{ aboutSection.title }}</h2>
            <p class="mt-6 text-lg text-gray-600 leading-relaxed">{{ aboutSection.description }}</p>
            <div class="mt-8 grid grid-cols-2 gap-4">
              <div v-for="stat in statistics?.slice(0,4)" :key="stat.id" class="bg-blue-50 rounded-xl p-4">
                <div class="text-2xl font-bold text-[#1a56db]">{{ stat.value }}{{ stat.suffix }}</div>
                <div class="text-sm text-gray-600 mt-1">{{ stat.label }}</div>
              </div>
            </div>
            <Link v-if="aboutSection.cta_url" :href="aboutSection.cta_url"
              class="mt-8 inline-flex items-center gap-2 bg-[#1a56db] text-white px-6 py-3 rounded-xl font-semibold hover:bg-blue-700 transition-colors">
              {{ aboutSection.cta_text }} <ArrowRight class="w-4 h-4" />
            </Link>
          </div>
          <div class="relative">
            <div class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-2xl p-8 text-white">
              <h3 class="text-2xl font-bold mb-6">Why Choose Us?</h3>
              <ul class="space-y-4">
                <li v-for="item in ['Expert team of 45+ engineers', 'Agile development methodology', 'On-time, on-budget delivery', 'Post-launch support & maintenance', 'Transparent communication', 'Cutting-edge technology stack']" :key="item" class="flex items-center gap-3">
                  <CheckCircle class="w-5 h-5 text-blue-300 shrink-0" />
                  <span>{{ item }}</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- SERVICES SECTION -->
    <section v-if="servicesSection" class="py-20 bg-gray-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-14">
          <span v-if="servicesSection.label" class="text-[#1a56db] font-semibold text-sm uppercase tracking-wider">{{ servicesSection.label }}</span>
          <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-gray-900">{{ servicesSection.title }}</h2>
          <p v-if="servicesSection.description" class="mt-4 text-lg text-gray-600">{{ servicesSection.description }}</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
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
        <div class="text-center mt-12">
          <Link href="/services" class="inline-flex items-center gap-2 border-2 border-[#1a56db] text-[#1a56db] px-8 py-3 rounded-xl font-semibold hover:bg-[#1a56db] hover:text-white transition-colors">
            View All Services <ArrowRight class="w-4 h-4" />
          </Link>
        </div>
      </div>
    </section>

    <!-- STATS SECTION -->
    <section v-if="statistics?.length" class="py-16 bg-[#1a56db]">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
          <div v-for="stat in statistics" :key="stat.id" class="text-center text-white">
            <div class="text-4xl sm:text-5xl font-bold">{{ stat.value }}{{ stat.suffix }}</div>
            <div class="mt-2 text-blue-200 font-medium">{{ stat.label }}</div>
          </div>
        </div>
      </div>
    </section>

    <!-- PROJECTS SECTION -->
    <section v-if="projectsSection" class="py-20 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-10">
          <span v-if="projectsSection.label" class="text-[#1a56db] font-semibold text-sm uppercase tracking-wider">{{ projectsSection.label }}</span>
          <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-gray-900">{{ projectsSection.title }}</h2>
          <p v-if="projectsSection.description" class="mt-4 text-lg text-gray-600">{{ projectsSection.description }}</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <Link v-for="project in projects" :key="project.id" :href="`/portfolio/${project.slug}`"
            class="group bg-white rounded-2xl overflow-hidden border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
            <div class="h-48 bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center">
              <span class="text-white text-4xl font-bold opacity-30">{{ project.title.charAt(0) }}</span>
            </div>
            <div class="p-6">
              <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-medium bg-blue-100 text-blue-700 px-3 py-1 rounded-full">{{ project.category }}</span>
                <span class="text-xs text-gray-400">{{ project.year }}</span>
              </div>
              <h3 class="text-lg font-bold text-gray-900 mb-2">{{ project.title }}</h3>
              <p class="text-sm text-gray-600 leading-relaxed mb-4">{{ project.short_description }}</p>
              <div class="flex flex-wrap gap-1 mb-4">
                <span v-for="tech in project.technologies?.slice(0,3)" :key="tech" class="text-xs bg-gray-100 text-gray-600 px-2 py-0.5 rounded">{{ tech }}</span>
              </div>
              <span class="text-[#1a56db] text-sm font-medium flex items-center gap-1 group-hover:gap-2 transition-all">
                View Project <ArrowRight class="w-4 h-4" />
              </span>
            </div>
          </Link>
        </div>
        <div class="text-center mt-12">
          <Link href="/portfolio" class="inline-flex items-center gap-2 border-2 border-[#1a56db] text-[#1a56db] px-8 py-3 rounded-xl font-semibold hover:bg-[#1a56db] hover:text-white transition-colors">
            View All Projects <ArrowRight class="w-4 h-4" />
          </Link>
        </div>
      </div>
    </section>

    <!-- TECHNOLOGIES SECTION -->
    <section v-if="techSection" class="py-20 bg-gray-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-14">
          <span v-if="techSection.label" class="text-[#1a56db] font-semibold text-sm uppercase tracking-wider">{{ techSection.label }}</span>
          <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-gray-900">{{ techSection.title }}</h2>
        </div>
        <div class="flex flex-wrap justify-center gap-3">
          <span v-for="tech in technologies" :key="tech.id"
            :class="['px-5 py-2.5 rounded-xl text-sm font-semibold border-2 border-transparent', techColors[tech.category] ?? 'bg-gray-100 text-gray-700']">
            {{ tech.name }}
            <span class="ml-1 text-xs opacity-60">{{ tech.category }}</span>
          </span>
        </div>
      </div>
    </section>

    <!-- TESTIMONIALS SECTION -->
    <section v-if="testimonialsSection" class="py-20 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-14">
          <span v-if="testimonialsSection.label" class="text-[#1a56db] font-semibold text-sm uppercase tracking-wider">{{ testimonialsSection.label }}</span>
          <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-gray-900">{{ testimonialsSection.title }}</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <div v-for="testimonial in testimonials" :key="testimonial.id" class="bg-gray-50 rounded-2xl p-8 border border-gray-100">
            <div class="flex gap-1 mb-4">
              <Star v-for="i in testimonial.rating" :key="i" class="w-4 h-4 fill-yellow-400 text-yellow-400" />
            </div>
            <p class="text-gray-700 leading-relaxed mb-6 italic">"{{ testimonial.content }}"</p>
            <div class="flex items-center gap-3">
              <div class="w-10 h-10 bg-[#1a56db] rounded-full flex items-center justify-center">
                <span class="text-white font-bold text-sm">{{ testimonial.name.charAt(0) }}</span>
              </div>
              <div>
                <p class="font-semibold text-gray-900 text-sm">{{ testimonial.name }}</p>
                <p class="text-xs text-gray-500">{{ testimonial.position }}, {{ testimonial.company }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA SECTION -->
    <section v-if="ctaSection" class="py-20 bg-gradient-to-br from-blue-600 to-indigo-700">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span v-if="ctaSection.label" class="text-blue-200 font-semibold text-sm uppercase tracking-wider">{{ ctaSection.label }}</span>
        <h2 class="mt-3 text-3xl sm:text-5xl font-bold text-white mb-6">{{ ctaSection.title }}</h2>
        <p class="text-xl text-blue-100 mb-10 max-w-2xl mx-auto">{{ ctaSection.description }}</p>
        <Link :href="ctaSection.cta_url ?? '/contact'"
          class="inline-flex items-center gap-2 bg-white text-[#1a56db] px-10 py-4 rounded-xl font-bold text-lg hover:bg-blue-50 transition-colors hover:shadow-xl">
          {{ ctaSection.cta_text ?? 'Get In Touch' }} <ArrowRight class="w-5 h-5" />
        </Link>
      </div>
    </section>
  </GuestLayout>
</template>

<style>
.hero-swiper { height: 90vh; }
.hero-swiper .swiper-button-next,
.hero-swiper .swiper-button-prev { color: white; }
.hero-swiper .swiper-pagination-bullet { background: white; opacity: 0.7; }
.hero-swiper .swiper-pagination-bullet-active { opacity: 1; }
</style>
