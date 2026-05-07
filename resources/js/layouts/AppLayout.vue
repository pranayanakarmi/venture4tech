<script setup>
import { ref } from 'vue'
import { Link, router, usePage } from '@inertiajs/vue3'
import {
  LayoutDashboard, MessageSquare, Settings, LogOut,
  Menu, X, ChevronDown, Bell
} from 'lucide-vue-next'

const page = usePage()
const sidebarOpen = ref(false)

const navItems = [
  { label: 'Dashboard', href: '/admin', icon: LayoutDashboard },
  { label: 'Messages', href: '/admin/contacts', icon: MessageSquare },
]

const logout = () => router.post('/logout')
</script>

<template>
  <div class="min-h-screen bg-gray-50 flex">
    <!-- Sidebar -->
    <aside :class="['fixed inset-y-0 left-0 z-50 w-64 bg-gray-900 transform transition-transform duration-300 lg:translate-x-0 lg:static lg:inset-auto', sidebarOpen ? 'translate-x-0' : '-translate-x-full']">
      <div class="flex flex-col h-full">
        <!-- Logo -->
        <div class="h-16 flex items-center px-6 border-b border-gray-800">
          <Link href="/admin" class="flex items-center gap-2">
            <div class="w-8 h-8 bg-[#1a56db] rounded-lg flex items-center justify-center">
              <span class="text-white font-bold text-sm">V4</span>
            </div>
            <span class="text-white font-semibold text-sm">Admin Panel</span>
          </Link>
        </div>

        <!-- Nav -->
        <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
          <Link v-for="item in navItems" :key="item.href" :href="item.href"
            class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-gray-400 hover:text-white hover:bg-gray-800 transition-colors">
            <component :is="item.icon" class="w-5 h-5" />
            {{ item.label }}
          </Link>
        </nav>

        <!-- User -->
        <div class="px-4 py-4 border-t border-gray-800">
          <div class="flex items-center gap-3 px-3 py-2 mb-1">
            <div class="w-8 h-8 bg-[#1a56db] rounded-full flex items-center justify-center">
              <span class="text-white text-xs font-bold">{{ page.props.auth?.user?.name?.charAt(0) ?? 'A' }}</span>
            </div>
            <div class="flex-1 min-w-0">
              <p class="text-sm font-medium text-white truncate">{{ page.props.auth?.user?.name ?? 'Admin' }}</p>
              <p class="text-xs text-gray-400 truncate">{{ page.props.auth?.user?.email }}</p>
            </div>
          </div>
          <button @click="logout" class="flex items-center gap-3 w-full px-3 py-2 rounded-lg text-sm text-gray-400 hover:text-white hover:bg-gray-800 transition-colors">
            <LogOut class="w-5 h-5" />
            Logout
          </button>
        </div>
      </div>
    </aside>

    <!-- Overlay for mobile -->
    <div v-if="sidebarOpen" @click="sidebarOpen=false" class="fixed inset-0 bg-black/50 z-40 lg:hidden" />

    <!-- Main -->
    <div class="flex-1 flex flex-col min-w-0">
      <!-- Top bar -->
      <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-6 sticky top-0 z-30">
        <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden p-2 rounded-lg text-gray-500 hover:bg-gray-100">
          <Menu class="w-5 h-5" />
        </button>
        <div class="flex items-center gap-3 ml-auto">
          <Link href="/" target="_blank" class="text-sm text-gray-500 hover:text-gray-700">View Site</Link>
        </div>
      </header>

      <!-- Flash -->
      <div v-if="page.props.flash?.success || page.props.flash?.error" class="px-6 pt-4">
        <div v-if="page.props.flash?.success" class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg text-sm">
          {{ page.props.flash.success }}
        </div>
        <div v-if="page.props.flash?.error" class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg text-sm">
          {{ page.props.flash.error }}
        </div>
      </div>

      <!-- Content -->
      <main class="flex-1 p-6">
        <slot />
      </main>
    </div>
  </div>
</template>
