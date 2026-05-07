<?php
namespace Database\Seeders;
use App\Models\Project;
use Illuminate\Database\Seeder;
class ProjectSeeder extends Seeder {
    public function run(): void {
        $projects = [
            ['title'=>'HealthTrack Pro','slug'=>'healthtrack-pro','short_description'=>'Comprehensive healthcare management platform for clinics and hospitals.','client'=>'MedCare Group','year'=>'2024','technologies'=>['Laravel','Vue.js','MySQL','AWS'],'category'=>'Healthcare','is_featured'=>true,'order'=>1],
            ['title'=>'EduLearn Platform','slug'=>'edulearn-platform','short_description'=>'E-learning management system with video streaming and live classes.','client'=>'EduTech Pvt. Ltd.','year'=>'2024','technologies'=>['React','Node.js','MongoDB','Azure'],'category'=>'Education','is_featured'=>true,'order'=>2],
            ['title'=>'FinFlow Analytics','slug'=>'finflow-analytics','short_description'=>'Real-time financial analytics dashboard for investment firms.','client'=>'InvestWise Capital','year'=>'2023','technologies'=>['Python','FastAPI','React','PostgreSQL'],'category'=>'FinTech','is_featured'=>true,'order'=>3],
            ['title'=>'ShopSmart Commerce','slug'=>'shopsmart-commerce','short_description'=>'Multi-vendor e-commerce platform with AI-powered recommendations.','client'=>'RetailMax India','year'=>'2023','technologies'=>['Laravel','Vue.js','Redis','AWS'],'category'=>'E-Commerce','is_featured'=>true,'order'=>4],
            ['title'=>'LogiTrack Fleet','slug'=>'logitrack-fleet','short_description'=>'Fleet management and logistics tracking system with real-time GPS.','client'=>'FastMove Logistics','year'=>'2024','technologies'=>['React Native','Node.js','PostgreSQL','Google Maps API'],'category'=>'Logistics','is_featured'=>false,'order'=>5],
            ['title'=>'SecureVault Enterprise','slug'=>'securevault-enterprise','short_description'=>'Enterprise-grade document management and security compliance platform.','client'=>'DataSafe Corp','year'=>'2023','technologies'=>['Laravel','Vue.js','AWS S3','Elasticsearch'],'category'=>'Enterprise','is_featured'=>false,'order'=>6],
        ];
        foreach ($projects as $p) Project::create(array_merge($p, ['is_active'=>true,'description'=>$p['short_description']]));
    }
}
