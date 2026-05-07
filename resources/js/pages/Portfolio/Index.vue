<script setup>
import { ref, computed } from 'vue'
import { Head, Link } from '@inertiajs/vue3'
import GuestLayout from '@/layouts/GuestLayout.vue'
import { ArrowRight } from 'lucide-vue-next'

const props = defineProps({ projects: Array, settings: Object })

const activeFilter = ref('All')
const categories = computed(() => {
  const cats = [...new Set(props.projects?.map(p => p.category).filter(Boolean))]
  return ['All', ...cats]
})

const filteredProjects = computed(() =>
  activeFilter.value === 'All' ? props.projects : props.projects?.filter(p => p.category === activeFilter.value)
)
</script>

<template>
  <GuestLayout>
    <Head title="Portfolio" />

    <div class="bg-gradient-to-br from-gray-900 via-blue-950 to-gray-900 py-24">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="text-blue-300 font-semibold text-sm uppercase tracking-wider">Our Work</span>
        <h1 class="mt-3 text-4xl sm:text-5xl font-bold text-white mb-6">Portfolio</h1>
        <p class="text-xl text-gray-300 max-w-3xl mx-auto">A showcase of our best work — solutions that drove real results for real businesses.</p>
      </div>
    </div>

    <section class="py-20 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Filter tabs -->
        <div class="flex flex-wrap justify-center gap-2 mb-12">
          <button v-for="cat in categories" :key="cat" @click="activeFilter = cat"
            :class="['px-5 py-2 rounded-lg text-sm font-medium transition-colors', activeFilter === cat ? 'bg-[#1a56db] text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200']">
            {{ cat }}
          </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <Link v-for="project in filteredProjects" :key="project.id" :href="`/portfolio/${project.slug}`"
            class="group bg-white rounded-2xl overflow-hidden border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
            <div class="h-48 bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center">
              <span class="text-white text-5xl font-bold opacity-30">{{ project.title.charAt(0) }}</span>
            </div>
            <div class="p-6">
              <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-medium bg-blue-100 text-blue-700 px-3 py-1 rounded-full">{{ project.category }}</span>
                <span class="text-xs text-gray-400">{{ project.year }}</span>
              </div>
              <h3 class="text-lg font-bold text-gray-900 mb-2">{{ project.title }}</h3>
              <p class="text-sm text-gray-600 leading-relaxed mb-4">{{ project.short_description }}</p>
              <div v-if="project.client" class="text-xs text-gray-500 mb-4">Client: <span class="font-medium">{{ project.client }}</span></div>
              <div class="flex flex-wrap gap-1 mb-4">
                <span v-for="tech in project.technologies?.slice(0,4)" :key="tech" class="text-xs bg-gray-100 text-gray-600 px-2 py-0.5 rounded">{{ tech }}</span>
              </div>
              <span class="text-[#1a56db] text-sm font-medium flex items-center gap-1 group-hover:gap-2 transition-all">
                View Project <ArrowRight class="w-4 h-4" />
              </span>
            </div>
          </Link>
        </div>
      </div>
    </section>
  </GuestLayout>
</template>
