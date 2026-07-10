<?php
namespace Database\Seeders;
use App\Models\SiteSetting;
use Illuminate\Database\Seeder;
class SiteSettingSeeder extends Seeder {
    public function run(): void {
        $settings = [
            'company_name' => 'Sangam Pvt. Ltd.',
            'company_tagline' => 'Innovating Tomorrow, Today',
            'company_email' => 'info@venture4tech.com',
            'company_phone' => '+91 98765 43210',
            'company_address' => '4th Floor, Tech Park, Hyderabad, Telangana 500081, India',
            'company_about' => 'Sangam Pvt. Ltd. is a leading IT solutions company delivering cutting-edge software development, cloud solutions, and digital transformation services. We help businesses scale with modern technology.',
            'social_linkedin' => 'https://linkedin.com/company/venture4tech',
            'social_twitter' => 'https://twitter.com/venture4tech',
            'social_facebook' => 'https://facebook.com/venture4tech',
            'social_instagram' => 'https://instagram.com/venture4tech',
            'social_github' => 'https://github.com/venture4tech',
            'footer_copyright' => '© 2025 Sangam Pvt. Ltd. All rights reserved.',
            'footer_tagline' => 'Building digital solutions that drive business growth.',
            'meta_title' => 'Sangam — IT Solutions & Software Development',
            'meta_description' => 'Sangam delivers world-class software development, cloud, AI/ML, and digital transformation services for enterprises and startups.',
        ];
        foreach ($settings as $key => $value) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
