<?php
namespace Database\Seeders;
use App\Models\FooterColumn;
use App\Models\FooterLink;
use Illuminate\Database\Seeder;
class FooterSeeder extends Seeder {
    public function run(): void {
        $col1 = FooterColumn::create(['title'=>'Services','order'=>1,'is_active'=>true]);
        $services = [['label'=>'Web Development','url'=>'/services/web-development'],['label'=>'Mobile Apps','url'=>'/services/mobile-app-development'],['label'=>'Cloud Solutions','url'=>'/services/cloud-solutions'],['label'=>'AI & ML','url'=>'/services/ai-ml'],['label'=>'UI/UX Design','url'=>'/services/ui-ux-design'],['label'=>'Cybersecurity','url'=>'/services/cybersecurity']];
        foreach ($services as $i => $s) FooterLink::create(array_merge($s, ['footer_column_id'=>$col1->id,'order'=>$i+1,'is_active'=>true,'open_in_new_tab'=>false]));

        $col2 = FooterColumn::create(['title'=>'Company','order'=>2,'is_active'=>true]);
        $company = [['label'=>'About Us','url'=>'/about'],['label'=>'Our Team','url'=>'/about#team'],['label'=>'Portfolio','url'=>'/portfolio'],['label'=>'Blog','url'=>'/blog'],['label'=>'Careers','url'=>'/careers'],['label'=>'Contact','url'=>'/contact']];
        foreach ($company as $i => $c) FooterLink::create(array_merge($c, ['footer_column_id'=>$col2->id,'order'=>$i+1,'is_active'=>true,'open_in_new_tab'=>false]));

        $col3 = FooterColumn::create(['title'=>'Legal','order'=>3,'is_active'=>true]);
        $legal = [['label'=>'Privacy Policy','url'=>'/privacy'],['label'=>'Terms of Service','url'=>'/terms'],['label'=>'Cookie Policy','url'=>'/cookies']];
        foreach ($legal as $i => $l) FooterLink::create(array_merge($l, ['footer_column_id'=>$col3->id,'order'=>$i+1,'is_active'=>true,'open_in_new_tab'=>false]));
    }
}
