<script setup>
import { ref, onMounted, onUnmounted } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'
import { Menu, X, ChevronDown, Phone, Mail, Linkedin, Twitter, Facebook, Instagram, Github } from 'lucide-vue-next'

const page = usePage()
const isMenuOpen = ref(false)
const isScrolled = ref(false)

const navItems = [
  { label: 'Home', href: '/' },
  { label: 'About', href: '/about' },
  { label: 'Services', href: '/services' },
  { label: 'Portfolio', href: '/portfolio' },
  { label: 'Contact', href: '/contact' },
]

const handleScroll = () => { isScrolled.value = window.scrollY > 20 }
onMounted(() => window.addEventListener('scroll', handleScroll))
onUnmounted(() => window.removeEventListener('scroll', handleScroll))
</script>

<template>
  <div class="min-h-screen flex flex-col bg-background text-foreground">
    <!-- Topbar -->
    <div class="hidden md:block bg-[#1a56db] text-white text-sm py-2">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
        <div class="flex items-center gap-6">
          <a href="mailto:info@venture4tech.com" class="flex items-center gap-1.5 hover:opacity-80 transition-opacity">
            <Mail class="w-3.5 h-3.5" /><span>info@venture4tech.com</span>
          </a>
          <a href="tel:+919876543210" class="flex items-center gap-1.5 hover:opacity-80 transition-opacity">
            <Phone class="w-3.5 h-3.5" /><span>+91 98765 43210</span>
          </a>
        </div>
        <div class="flex items-center gap-3">
          <a href="https://linkedin.com/company/venture4tech" target="_blank" class="hover:opacity-80 transition-opacity"><Linkedin class="w-4 h-4" /></a>
          <a href="https://twitter.com/venture4tech" target="_blank" class="hover:opacity-80 transition-opacity"><Twitter class="w-4 h-4" /></a>
          <a href="https://github.com/venture4tech" target="_blank" class="hover:opacity-80 transition-opacity"><Github class="w-4 h-4" /></a>
        </div>
      </div>
    </div>

    <!-- Header -->
    <header :class="['sticky top-0 z-50 transition-all duration-300', isScrolled ? 'bg-white shadow-md' : 'bg-white/95 backdrop-blur-sm']">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
          <!-- Logo -->
          <Link href="/" class="flex items-center gap-2">
            <div class="w-9 h-9 bg-[#1a56db] rounded-lg flex items-center justify-center">
              <span class="text-white font-bold text-lg">V4</span>
            </div>
            <div class="hidden sm:block">
              <div class="font-bold text-gray-900 text-sm leading-tight">Sangam</div>
              <div class="text-[#1a56db] text-xs font-medium">Technology</div>
            </div>
          </Link>

          <!-- Desktop nav -->
          <nav class="hidden md:flex items-center gap-1">
            <Link v-for="item in navItems" :key="item.href" :href="item.href"
              class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-[#1a56db] rounded-lg hover:bg-blue-50 transition-colors">
              {{ item.label }}
            </Link>
          </nav>

          <!-- CTA -->
          <div class="hidden md:flex items-center gap-3">
            <Link href="/contact" class="bg-[#1a56db] text-white px-5 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition-colors">
              Get a Quote
            </Link>
          </div>

          <!-- Mobile menu button -->
          <button @click="isMenuOpen = !isMenuOpen" class="md:hidden p-2 rounded-lg text-gray-700 hover:bg-gray-100">
            <Menu v-if="!isMenuOpen" class="w-6 h-6" />
            <X v-else class="w-6 h-6" />
          </button>
        </div>
      </div>

      <!-- Mobile menu -->
      <div v-if="isMenuOpen" class="md:hidden bg-white border-t border-gray-100 px-4 py-4">
        <nav class="flex flex-col gap-1">
          <Link v-for="item in navItems" :key="item.href" :href="item.href" @click="isMenuOpen=false"
            class="px-4 py-3 text-sm font-medium text-gray-700 hover:text-[#1a56db] rounded-lg hover:bg-blue-50 transition-colors">
            {{ item.label }}
          </Link>
          <Link href="/contact" @click="isMenuOpen=false" class="mt-2 bg-[#1a56db] text-white px-4 py-3 rounded-lg text-sm font-medium text-center">
            Get a Quote
          </Link>
        </nav>
      </div>
    </header>

    <!-- Flash messages -->
    <div v-if="page.props.flash?.success || page.props.flash?.error" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-4 w-full">
      <div v-if="page.props.flash?.success" class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg text-sm">
        {{ page.props.flash.success }}
      </div>
      <div v-if="page.props.flash?.error" class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg text-sm">
        {{ page.props.flash.error }}
      </div>
    </div>

    <!-- Main content -->
    <main class="flex-1">
      <slot />
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
          <!-- Brand -->
          <div class="lg:col-span-1">
            <Link href="/" class="flex items-center gap-2 mb-4">
              <div class="w-10 h-10 bg-[#1a56db] rounded-lg flex items-center justify-center">
                <span class="text-white font-bold text-xl">V4</span>
              </div>
              <div>
                <div class="font-bold text-white text-sm">Sangam</div>
                <div class="text-[#1a56db] text-xs font-medium">Pvt. Ltd.</div>
              </div>
            </Link>
            <p class="text-sm leading-relaxed mb-6 text-gray-400">Building digital solutions that drive business growth. Your trusted technology partner since 2017.</p>
            <div class="flex gap-3">
              <a href="https://linkedin.com/company/venture4tech" target="_blank" class="w-9 h-9 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-[#1a56db] transition-colors"><Linkedin class="w-4 h-4" /></a>
              <a href="https://twitter.com/venture4tech" target="_blank" class="w-9 h-9 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-[#1a56db] transition-colors"><Twitter class="w-4 h-4" /></a>
              <a href="https://github.com/venture4tech" target="_blank" class="w-9 h-9 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-[#1a56db] transition-colors"><Github class="w-4 h-4" /></a>
              <a href="https://instagram.com/venture4tech" target="_blank" class="w-9 h-9 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-[#1a56db] transition-colors"><Instagram class="w-4 h-4" /></a>
            </div>
          </div>

          <!-- Services -->
          <div>
            <h4 class="font-semibold text-white mb-4">Services</h4>
            <ul class="space-y-2 text-sm">
              <li><Link href="/services/web-development" class="hover:text-[#1a56db] transition-colors">Web Development</Link></li>
              <li><Link href="/services/mobile-app-development" class="hover:text-[#1a56db] transition-colors">Mobile Apps</Link></li>
              <li><Link href="/services/cloud-solutions" class="hover:text-[#1a56db] transition-colors">Cloud Solutions</Link></li>
              <li><Link href="/services/ai-ml" class="hover:text-[#1a56db] transition-colors">AI & Machine Learning</Link></li>
              <li><Link href="/services/ui-ux-design" class="hover:text-[#1a56db] transition-colors">UI/UX Design</Link></li>
              <li><Link href="/services/cybersecurity" class="hover:text-[#1a56db] transition-colors">Cybersecurity</Link></li>
            </ul>
          </div>

          <!-- Company -->
          <div>
            <h4 class="font-semibold text-white mb-4">Company</h4>
            <ul class="space-y-2 text-sm">
              <li><Link href="/about" class="hover:text-[#1a56db] transition-colors">About Us</Link></li>
              <li><Link href="/portfolio" class="hover:text-[#1a56db] transition-colors">Portfolio</Link></li>
              <li><Link href="/contact" class="hover:text-[#1a56db] transition-colors">Contact Us</Link></li>
            </ul>
          </div>

          <!-- Contact -->
          <div>
            <h4 class="font-semibold text-white mb-4">Contact</h4>
            <ul class="space-y-3 text-sm">
              <li class="flex items-start gap-2"><Mail class="w-4 h-4 mt-0.5 text-[#1a56db] shrink-0" /><a href="mailto:info@venture4tech.com" class="hover:text-[#1a56db] transition-colors">info@venture4tech.com</a></li>
              <li class="flex items-start gap-2"><Phone class="w-4 h-4 mt-0.5 text-[#1a56db] shrink-0" /><a href="tel:+919876543210" class="hover:text-[#1a56db] transition-colors">+91 98765 43210</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 flex flex-col sm:flex-row justify-between items-center gap-4 text-sm text-gray-500">
          <p>© 2025 Sangam Pvt. Ltd. All rights reserved.</p>
          <div class="flex gap-4">
            <Link href="/privacy" class="hover:text-[#1a56db] transition-colors">Privacy Policy</Link>
            <Link href="/terms" class="hover:text-[#1a56db] transition-colors">Terms of Service</Link>
          </div>
        </div>
      </div>
    </footer>
  </div>
</template>
