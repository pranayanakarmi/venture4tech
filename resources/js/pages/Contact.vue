<script setup>
import { Head, useForm } from '@inertiajs/vue3'
import GuestLayout from '@/layouts/GuestLayout.vue'
import { Mail, Phone, MapPin, Send, Clock } from 'lucide-vue-next'

const props = defineProps({ settings: Object })

const form = useForm({
  name: '',
  email: '',
  phone: '',
  company: '',
  subject: '',
  message: '',
})

const submit = () => {
  form.post('/contact', {
    onSuccess: () => form.reset(),
  })
}
</script>

<template>
  <GuestLayout>
    <Head title="Contact Us" />

    <div class="bg-gradient-to-br from-gray-900 via-blue-950 to-gray-900 py-24">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="text-blue-300 font-semibold text-sm uppercase tracking-wider">Get In Touch</span>
        <h1 class="mt-3 text-4xl sm:text-5xl font-bold text-white mb-6">Contact Us</h1>
        <p class="text-xl text-gray-300 max-w-2xl mx-auto">Have a project in mind? We'd love to hear about it. Get in touch and let's create something amazing together.</p>
      </div>
    </div>

    <section class="py-20 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-12">
          <!-- Contact Info -->
          <div class="lg:col-span-2 space-y-8">
            <div>
              <h2 class="text-2xl font-bold text-gray-900 mb-6">Let's Start a Conversation</h2>
              <p class="text-gray-600 leading-relaxed">Whether you're starting from scratch or want to improve an existing product, our team is ready to collaborate with you.</p>
            </div>

            <div class="space-y-4">
              <div class="flex items-start gap-4 p-4 bg-blue-50 rounded-xl">
                <div class="w-10 h-10 bg-[#1a56db] rounded-lg flex items-center justify-center shrink-0">
                  <Mail class="w-5 h-5 text-white" />
                </div>
                <div>
                  <p class="font-semibold text-gray-900 text-sm">Email Us</p>
                  <a href="mailto:info@venture4tech.com" class="text-[#1a56db] text-sm hover:underline">info@venture4tech.com</a>
                </div>
              </div>
              <div class="flex items-start gap-4 p-4 bg-blue-50 rounded-xl">
                <div class="w-10 h-10 bg-[#1a56db] rounded-lg flex items-center justify-center shrink-0">
                  <Phone class="w-5 h-5 text-white" />
                </div>
                <div>
                  <p class="font-semibold text-gray-900 text-sm">Call Us</p>
                  <a href="tel:+919876543210" class="text-[#1a56db] text-sm hover:underline">+91 98765 43210</a>
                </div>
              </div>
              <div class="flex items-start gap-4 p-4 bg-blue-50 rounded-xl">
                <div class="w-10 h-10 bg-[#1a56db] rounded-lg flex items-center justify-center shrink-0">
                  <MapPin class="w-5 h-5 text-white" />
                </div>
                <div>
                  <p class="font-semibold text-gray-900 text-sm">Visit Us</p>
                  <p class="text-gray-600 text-sm">4th Floor, Tech Park, Hyderabad,<br>Telangana 500081, India</p>
                </div>
              </div>
              <div class="flex items-start gap-4 p-4 bg-blue-50 rounded-xl">
                <div class="w-10 h-10 bg-[#1a56db] rounded-lg flex items-center justify-center shrink-0">
                  <Clock class="w-5 h-5 text-white" />
                </div>
                <div>
                  <p class="font-semibold text-gray-900 text-sm">Business Hours</p>
                  <p class="text-gray-600 text-sm">Mon – Fri: 9:00 AM – 6:00 PM IST</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Contact Form -->
          <div class="lg:col-span-3">
            <form @submit.prevent="submit" class="bg-gray-50 rounded-2xl p-8 border border-gray-100 space-y-6">
              <h3 class="text-xl font-bold text-gray-900">Send Us a Message</h3>

              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1.5">Full Name *</label>
                  <input v-model="form.name" type="text" required placeholder="John Doe"
                    class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#1a56db] focus:border-transparent bg-white"
                    :class="{ 'border-red-300': form.errors.name }" />
                  <p v-if="form.errors.name" class="mt-1 text-xs text-red-600">{{ form.errors.name }}</p>
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1.5">Email Address *</label>
                  <input v-model="form.email" type="email" required placeholder="john@example.com"
                    class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#1a56db] focus:border-transparent bg-white"
                    :class="{ 'border-red-300': form.errors.email }" />
                  <p v-if="form.errors.email" class="mt-1 text-xs text-red-600">{{ form.errors.email }}</p>
                </div>
              </div>

              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1.5">Phone Number</label>
                  <input v-model="form.phone" type="tel" placeholder="+91 98765 43210"
                    class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#1a56db] focus:border-transparent bg-white" />
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1.5">Company</label>
                  <input v-model="form.company" type="text" placeholder="Your Company"
                    class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#1a56db] focus:border-transparent bg-white" />
                </div>
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Subject</label>
                <input v-model="form.subject" type="text" placeholder="How can we help you?"
                  class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#1a56db] focus:border-transparent bg-white" />
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Message *</label>
                <textarea v-model="form.message" required rows="5" placeholder="Tell us about your project..."
                  class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#1a56db] focus:border-transparent bg-white resize-none"
                  :class="{ 'border-red-300': form.errors.message }"></textarea>
                <p v-if="form.errors.message" class="mt-1 text-xs text-red-600">{{ form.errors.message }}</p>
              </div>

              <button type="submit" :disabled="form.processing"
                class="w-full bg-[#1a56db] text-white px-8 py-3.5 rounded-xl font-semibold flex items-center justify-center gap-2 hover:bg-blue-700 transition-colors disabled:opacity-60 disabled:cursor-not-allowed">
                <Send class="w-5 h-5" />
                {{ form.processing ? 'Sending...' : 'Send Message' }}
              </button>
            </form>
          </div>
        </div>
      </div>
    </section>
  </GuestLayout>
</template>
