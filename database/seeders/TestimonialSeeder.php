<?php
namespace Database\Seeders;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;
class TestimonialSeeder extends Seeder {
    public function run(): void {
        $testimonials = [
            ['name'=>'Rajesh Kumar','position'=>'CTO','company'=>'MedCare Group','content'=>'Sangam delivered our healthcare platform on time and within budget. Their technical expertise in Laravel and AWS is exceptional. The team was responsive and proactive throughout the project.','rating'=>5,'order'=>1],
            ['name'=>'Priya Sharma','position'=>'Product Manager','company'=>'EduTech Pvt. Ltd.','content'=>'Working with V4T was a game-changer for our e-learning platform. Their React and Node.js developers built a scalable solution that handles thousands of concurrent users without issues.','rating'=>5,'order'=>2],
            ['name'=>'Amir Hassan','position'=>'CEO','company'=>'InvestWise Capital','content'=>'The fintech dashboard V4T built for us processes millions of data points in real time. Their Python/FastAPI expertise and attention to data security gave us confidence in every feature they delivered.','rating'=>5,'order'=>3],
            ['name'=>'Sarah Thompson','position'=>'Founder','company'=>'RetailMax India','content'=>'Our e-commerce platform built by V4T has increased our conversion rate by 40%. The AI recommendation engine they integrated is incredibly accurate and has boosted average order value significantly.','rating'=>5,'order'=>4],
            ['name'=>'Vikram Singh','position'=>'VP Engineering','company'=>'FastMove Logistics','content'=>'The fleet tracking app developed by V4T is rock solid. Real-time GPS, push notifications, and route optimization — they nailed every feature. Our drivers love the mobile app.','rating'=>4,'order'=>5],
        ];
        foreach ($testimonials as $t) Testimonial::create(array_merge($t, ['is_active'=>true]));
    }
}
