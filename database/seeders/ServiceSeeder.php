<?php
namespace Database\Seeders;
use App\Models\Service;
use Illuminate\Database\Seeder;
class ServiceSeeder extends Seeder {
    public function run(): void {
        $services = [
            ['title'=>'Web Development','slug'=>'web-development','short_description'=>'Modern, responsive web applications built with the latest frameworks and best practices.','description'=>'We build high-performance web applications using React, Vue, Laravel, Node.js, and more. From simple websites to complex enterprise portals, we deliver solutions that are fast, secure, and scalable.','icon'=>'Code2','is_featured'=>true,'order'=>1],
            ['title'=>'Mobile App Development','slug'=>'mobile-app-development','short_description'=>'Native and cross-platform mobile apps for iOS and Android that users love.','description'=>'Our mobile development team builds native iOS and Android apps as well as cross-platform solutions using React Native and Flutter. We focus on performance, UX, and App Store optimization.','icon'=>'Smartphone','is_featured'=>true,'order'=>2],
            ['title'=>'Cloud Solutions','slug'=>'cloud-solutions','short_description'=>'AWS, Azure, and GCP cloud architecture, migration, and managed services.','description'=>'We help you migrate to the cloud, architect scalable infrastructure, and manage your cloud environment. Our DevOps engineers specialize in containerization, CI/CD, and cost optimization.','icon'=>'Cloud','is_featured'=>true,'order'=>3],
            ['title'=>'AI & Machine Learning','slug'=>'ai-ml','short_description'=>'Custom AI models, NLP, computer vision, and data analytics solutions.','description'=>'From predictive analytics to NLP chatbots and computer vision systems, we build AI-powered products that give your business a competitive edge. We work with TensorFlow, PyTorch, and OpenAI APIs.','icon'=>'Brain','is_featured'=>true,'order'=>4],
            ['title'=>'UI/UX Design','slug'=>'ui-ux-design','short_description'=>'User-centered design that converts visitors into loyal customers.','description'=>'Our design team creates intuitive, beautiful interfaces using Figma and modern design systems. We conduct user research, prototyping, and usability testing to ensure your product delights users.','icon'=>'Palette','is_featured'=>true,'order'=>5],
            ['title'=>'Cybersecurity','slug'=>'cybersecurity','short_description'=>'Comprehensive security audits, penetration testing, and security consulting.','description'=>'Protect your digital assets with our comprehensive security services — vulnerability assessments, penetration testing, security architecture review, and incident response planning.','icon'=>'Shield','is_featured'=>true,'order'=>6],
            ['title'=>'DevOps & CI/CD','slug'=>'devops-cicd','short_description'=>'Streamline your development pipeline with automated testing and deployment.','description'=>'We implement robust CI/CD pipelines using GitHub Actions, Jenkins, and ArgoCD. Our DevOps services include infrastructure-as-code with Terraform, monitoring with Prometheus/Grafana, and container orchestration with Kubernetes.','icon'=>'GitBranch','is_featured'=>false,'order'=>7],
            ['title'=>'Digital Transformation','slug'=>'digital-transformation','short_description'=>'End-to-end digital transformation consulting and implementation.','description'=>'We guide enterprises through their digital transformation journey — from legacy system modernization to process automation and data-driven decision making. Our consultants have deep experience across industries.','icon'=>'TrendingUp','is_featured'=>false,'order'=>8],
        ];
        foreach ($services as $s) Service::create(array_merge($s, ['is_active'=>true]));
    }
}
