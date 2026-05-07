<?php
namespace Database\Seeders;
use App\Models\Partner;
use Illuminate\Database\Seeder;
class PartnerSeeder extends Seeder {
    public function run(): void {
        $partners = [
            ['name'=>'MedCare Group','type'=>'client','order'=>1],
            ['name'=>'EduTech Pvt. Ltd.','type'=>'client','order'=>2],
            ['name'=>'InvestWise Capital','type'=>'client','order'=>3],
            ['name'=>'RetailMax India','type'=>'client','order'=>4],
            ['name'=>'FastMove Logistics','type'=>'client','order'=>5],
            ['name'=>'DataSafe Corp','type'=>'client','order'=>6],
            ['name'=>'AWS Partner','type'=>'technology_partner','order'=>7],
            ['name'=>'Microsoft Azure','type'=>'technology_partner','order'=>8],
        ];
        foreach ($partners as $p) Partner::create(array_merge($p, ['is_active'=>true]));
    }
}
