<?php
namespace Database\Seeders;
use App\Models\HomeAboutSection;
use App\Models\HomeServicesSection;
use App\Models\HomeProjectsSection;
use App\Models\HomeTestimonialsSection;
use App\Models\HomeStatsSection;
use App\Models\HomeClientsSection;
use App\Models\HomeContactCtaSection;
use App\Models\HomeTechnologiesSection;
use Illuminate\Database\Seeder;
class HomeSectionSeeder extends Seeder {
    public function run(): void {
        HomeAboutSection::create(['label'=>'Who We Are','title'=>'Your Trusted Technology Partner','description'=>'Venture Four Technology Pvt. Ltd. is a full-service IT company based in Hyderabad, India. Since 2017, we have helped 80+ businesses — from startups to enterprises — transform their ideas into powerful digital products. Our multidisciplinary team of engineers, designers, and strategists collaborates closely with clients to deliver solutions that are not just functional, but impactful.','cta_text'=>'Learn More About Us','cta_url'=>'/about','is_active'=>true]);
        HomeServicesSection::create(['label'=>'What We Do','title'=>'Comprehensive IT Services','description'=>'From web and mobile development to cloud infrastructure and AI solutions, we offer end-to-end technology services tailored to your business needs.','is_active'=>true]);
        HomeProjectsSection::create(['label'=>'Our Work','title'=>'Featured Projects','description'=>'Explore some of our most impactful work — solutions built with precision, creativity, and a deep understanding of our clients\' goals.','is_active'=>true]);
        HomeTestimonialsSection::create(['label'=>'Client Stories','title'=>'What Our Clients Say','description'=>'Don\'t just take our word for it. Here\'s what our clients have to say about working with Venture Four Technology.','is_active'=>true]);
        HomeStatsSection::create(['label'=>'By The Numbers','title'=>'Our Impact in Numbers','description'=>'Eight years of delivering excellence, one project at a time.','is_active'=>true]);
        HomeClientsSection::create(['label'=>'Trusted By','title'=>'Companies That Trust Us','description'=>'We are proud to partner with industry-leading companies across healthcare, finance, education, and more.','is_active'=>true]);
        HomeContactCtaSection::create(['label'=>'Get In Touch','title'=>'Ready to Build Something Great?','description'=>'Let\'s discuss your project. Whether you have a clear vision or just an idea, our team is here to help you bring it to life.','cta_text'=>'Start a Project','cta_url'=>'/contact','is_active'=>true]);
        HomeTechnologiesSection::create(['label'=>'Our Stack','title'=>'Technologies We Master','description'=>'We work with the best tools and frameworks in the industry to deliver modern, maintainable, and performant solutions.','is_active'=>true]);
    }
}
