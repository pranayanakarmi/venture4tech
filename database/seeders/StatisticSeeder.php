<?php
namespace Database\Seeders;
use App\Models\Statistic;
use Illuminate\Database\Seeder;
class StatisticSeeder extends Seeder {
    public function run(): void {
        $stats = [
            ['label'=>'Projects Delivered','value'=>'150','suffix'=>'+','icon'=>'CheckCircle','order'=>1],
            ['label'=>'Happy Clients','value'=>'80','suffix'=>'+','icon'=>'Users','order'=>2],
            ['label'=>'Years of Experience','value'=>'8','suffix'=>'+','icon'=>'Award','order'=>3],
            ['label'=>'Team Members','value'=>'45','suffix'=>'+','icon'=>'UserCheck','order'=>4],
        ];
        foreach ($stats as $s) Statistic::create(array_merge($s, ['is_active'=>true]));
    }
}
