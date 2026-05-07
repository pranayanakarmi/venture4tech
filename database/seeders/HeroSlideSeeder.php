<?php
namespace Database\Seeders;
use App\Models\HeroSlide;
use Illuminate\Database\Seeder;
class HeroSlideSeeder extends Seeder {
    public function run(): void {
        $slides = [
            ['title'=>'Transforming Ideas Into Digital Reality','subtitle'=>'Full-Stack Software Development','description'=>'We craft scalable web & mobile applications, cloud infrastructure, and AI-powered solutions that help businesses grow faster in the digital era.','cta_text'=>'Explore Our Services','cta_url'=>'/services','secondary_cta_text'=>'View Portfolio','secondary_cta_url'=>'/portfolio','order'=>1,'is_active'=>true],
            ['title'=>'Cloud Solutions & DevOps Excellence','subtitle'=>'Scalable. Secure. Reliable.','description'=>'From AWS and Azure to GCP — we design, deploy, and manage cloud infrastructure that scales with your business needs and keeps your data secure.','cta_text'=>'Cloud Services','cta_url'=>'/services/cloud-solutions','secondary_cta_text'=>'Get Consultation','secondary_cta_url'=>'/contact','order'=>2,'is_active'=>true],
            ['title'=>'AI & Machine Learning Solutions','subtitle'=>'Intelligent Automation for the Future','description'=>'Harness the power of artificial intelligence and machine learning to automate workflows, gain insights from data, and build smarter products.','cta_text'=>'AI Solutions','cta_url'=>'/services/ai-ml','secondary_cta_text'=>'Learn More','secondary_cta_url'=>'/about','order'=>3,'is_active'=>true],
        ];
        foreach ($slides as $slide) HeroSlide::create($slide);
    }
}
