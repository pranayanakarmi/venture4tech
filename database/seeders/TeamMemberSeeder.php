<?php
namespace Database\Seeders;
use App\Models\TeamMember;
use Illuminate\Database\Seeder;
class TeamMemberSeeder extends Seeder {
    public function run(): void {
        $members = [
            ['name'=>'Pranay Nakarmi','position'=>'Founder & CEO','department'=>'Leadership','bio'=>'Pranay founded Venture Four Technology with a vision to make world-class software development accessible to businesses of all sizes. With 12+ years in tech, he leads the company strategy and client relations.','order'=>1],
            ['name'=>'Ananya Reddy','position'=>'Chief Technology Officer','department'=>'Engineering','bio'=>'Ananya oversees all engineering operations and technical strategy. She specializes in cloud architecture, distributed systems, and leads our AI/ML initiatives.','order'=>2],
            ['name'=>'Kiran Patel','position'=>'Head of Design','department'=>'Design','bio'=>'Kiran leads our UI/UX team with a passion for human-centered design. With expertise in Figma and design systems, he ensures every product we build is beautiful and intuitive.','order'=>3],
            ['name'=>'Meera Krishnan','position'=>'Lead Backend Engineer','department'=>'Engineering','bio'=>'Meera is our PHP and Laravel specialist with deep expertise in API design, database optimization, and microservices architecture.','order'=>4],
            ['name'=>'Arjun Bose','position'=>'Lead Frontend Engineer','department'=>'Engineering','bio'=>'Arjun specializes in Vue.js and React development, building performant SPAs and PWAs. He champions accessibility and performance best practices across all frontend projects.','order'=>5],
            ['name'=>'Divya Menon','position'=>'DevOps Engineer','department'=>'Infrastructure','bio'=>'Divya manages our cloud infrastructure on AWS and Azure, implementing CI/CD pipelines, container orchestration with Kubernetes, and infrastructure-as-code with Terraform.','order'=>6],
        ];
        foreach ($members as $m) TeamMember::create(array_merge($m, ['is_active'=>true]));
    }
}
