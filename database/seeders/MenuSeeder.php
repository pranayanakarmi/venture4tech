<?php
namespace Database\Seeders;
use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Database\Seeder;
class MenuSeeder extends Seeder {
    public function run(): void {
        $menu = Menu::create(['name'=>'Main Navigation','slug'=>'main-nav','is_active'=>true]);
        $items = [
            ['label'=>'Home','url'=>'/','order'=>1,'is_active'=>true,'open_in_new_tab'=>false],
            ['label'=>'About','url'=>'/about','order'=>2,'is_active'=>true,'open_in_new_tab'=>false],
            ['label'=>'Services','url'=>'/services','order'=>3,'is_active'=>true,'open_in_new_tab'=>false],
            ['label'=>'Portfolio','url'=>'/portfolio','order'=>4,'is_active'=>true,'open_in_new_tab'=>false],
            ['label'=>'Contact','url'=>'/contact','order'=>5,'is_active'=>true,'open_in_new_tab'=>false],
        ];
        foreach ($items as $item) {
            MenuItem::create(array_merge($item, ['menu_id'=>$menu->id]));
        }
        $footerMenu = Menu::create(['name'=>'Footer Navigation','slug'=>'footer-nav','is_active'=>true]);
        $footerItems = [
            ['label'=>'Privacy Policy','url'=>'/privacy','order'=>1,'is_active'=>true,'open_in_new_tab'=>false],
            ['label'=>'Terms of Service','url'=>'/terms','order'=>2,'is_active'=>true,'open_in_new_tab'=>false],
        ];
        foreach ($footerItems as $item) MenuItem::create(array_merge($item, ['menu_id'=>$footerMenu->id]));
    }
}
