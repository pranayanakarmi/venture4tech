<?php
namespace Database\Seeders;
use App\Models\Technology;
use Illuminate\Database\Seeder;
class TechnologySeeder extends Seeder {
    public function run(): void {
        $techs = [
            ['name'=>'Laravel','category'=>'Backend','order'=>1],
            ['name'=>'Vue.js','category'=>'Frontend','order'=>2],
            ['name'=>'React','category'=>'Frontend','order'=>3],
            ['name'=>'Node.js','category'=>'Backend','order'=>4],
            ['name'=>'Python','category'=>'Backend','order'=>5],
            ['name'=>'AWS','category'=>'Cloud','order'=>6],
            ['name'=>'Docker','category'=>'DevOps','order'=>7],
            ['name'=>'Kubernetes','category'=>'DevOps','order'=>8],
            ['name'=>'React Native','category'=>'Mobile','order'=>9],
            ['name'=>'Flutter','category'=>'Mobile','order'=>10],
            ['name'=>'PostgreSQL','category'=>'Database','order'=>11],
            ['name'=>'Redis','category'=>'Database','order'=>12],
            ['name'=>'TypeScript','category'=>'Frontend','order'=>13],
            ['name'=>'Next.js','category'=>'Frontend','order'=>14],
            ['name'=>'TensorFlow','category'=>'AI/ML','order'=>15],
            ['name'=>'Azure','category'=>'Cloud','order'=>16],
        ];
        foreach ($techs as $t) Technology::create(array_merge($t, ['is_active'=>true]));
    }
}
