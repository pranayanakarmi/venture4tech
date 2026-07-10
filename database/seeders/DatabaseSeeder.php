<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder {
    public function run(): void {
        $this->call([
            AdminUserSeeder::class,
            SiteSettingSeeder::class,
            MenuSeeder::class,
            HeroSlideSeeder::class,
            ServiceSeeder::class,
            TechnologySeeder::class,
            ProjectSeeder::class,
            TestimonialSeeder::class,
            TeamMemberSeeder::class,
            StatisticSeeder::class,
            PartnerSeeder::class,
            HomeSectionSeeder::class,
            FooterSeeder::class,
        ]);
    }
}
