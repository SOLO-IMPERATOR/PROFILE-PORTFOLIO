<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // ── Skill Categories ──────────────────────────────────────────
        $categoryAbillityNames = [
            1 => 'Backend',
            2 => 'Frontend',
            3 => 'Databases',
            4 => 'Servers & DevOps',
            5 => 'Artificial Intelligence',
            6 => 'Other',
        ];
        foreach ($categoryAbillityNames as $id => $nameEn) {
            DB::table('category_abillities')->where('id', $id)->update(['name_en' => $nameEn]);
        }

        // ── Abilities (most are already in English — copy name as-is) ─
        DB::table('abillities')->whereNull('name_en')->update(['name_en' => DB::raw('name')]);

        // ── Project Categories ─────────────────────────────────────────
        $projectCategoryNames = [
            1 => 'E-Commerce',
            2 => 'WordPress',
            3 => 'Web Application',
            4 => '1C-Bitrix',
            5 => 'Corporate Website',
            6 => 'Customization',
            7 => 'Frontend Development',
        ];
        foreach ($projectCategoryNames as $id => $nameEn) {
            DB::table('project_categories')->where('id', $id)->update(['name_en' => $nameEn]);
        }

        // ── Project Tags (mostly English, update Russian ones) ─────────
        $tagNames = [
            21 => 'Customization',
            23 => 'AsPro',
        ];
        foreach ($tagNames as $id => $nameEn) {
            DB::table('project_tags')->where('id', $id)->update(['name_en' => $nameEn]);
        }
        // All other tags are already in English — copy them
        DB::table('project_tags')->whereNull('name_en')->update(['name_en' => DB::raw('name')]);

        // ── Projects ──────────────────────────────────────────────────
        $projects = [
            1 => [
                'name_en' => 'Rabbit Tattoo Studio',
                'description_en' => '<p>Migration of a tattoo studio website from React to WordPress to resolve SEO issues. Pixel-perfect layouts based on Figma designs with custom sliders (Swiper), animations, and AmoCRM form integration.</p>',
            ],
            2 => [
                'name_en' => '"Hochu Stul" Furniture Online Store',
                'description_en' => '<p>Development of a furniture online store on WordPress + WooCommerce based on Figma designs. Bitrix24 integration, Telegram bot, Yandex.Market feed. SEO optimization and SMM-driven markup. T-Bank payment integration.</p>',
            ],
            3 => [
                'name_en' => 'SteelCraft — Manufacturing Website',
                'description_en' => '<p>WordPress implementation using ACF for a ready-made markup. Fixed multiple layout issues and finalized the corporate website.</p>',
            ],
            4 => [
                'name_en' => 'Aerdyn — Turnkey Site Migration',
                'description_en' => '<p>Full migration of an existing website to WordPress: content migration, custom template development, and deployment.</p>',
            ],
            5 => [
                'name_en' => 'Podpop — Outdoor Accessories Online Store',
                'description_en' => '<p>Full online store development based on Figma designs. Business logic setup, variable products, and payment integration.</p>',
            ],
            6 => [
                'name_en' => 'Rehaus — Real Estate Sales Website',
                'description_en' => '<p>WordPress markup implementation. Custom filtering, ACF data population, and layout fixes.</p>',
            ],
            7 => [
                'name_en' => 'Interactive Map of Russia',
                'description_en' => '<p>The client provided a ready-made map with region selection. Implemented a tourism list and brand categorization by region, managed from 1C-Bitrix via a lightweight API and JSON data exchange.</p>',
            ],
            8 => [
                'name_en' => 'Anti-Cancer Movement Website',
                'description_en' => '<p>Migration from an old JS framework to 1C-Bitrix. News section implementation and blog post display via an external API.</p>',
            ],
            9 => [
                'name_en' => 'Originalmeet — Festival Website',
                'description_en' => '<p>Implemented a data submission form with email delivery.</p>',
            ],
            10 => [
                'name_en' => 'DELL-RU — Server Hardware Online Store',
                'description_en' => '<p>Visual fixes and development of a custom server configurator for WooCommerce per client specifications.</p>',
            ],
            11 => [
                'name_en' => 'Arbat — Antique Gallery Website',
                'description_en' => '<p>Migration from Joomla to WordPress. Catalog migration.</p>',
            ],
            12 => [
                'name_en' => 'Steam Balance Top-Up Service',
                'description_en' => '<p>Pixel-perfect markup based on Figma design. Implemented submission scripts.</p>',
            ],
            13 => [
                'name_en' => 'Dobry Dom Kolomna — Corporate Website',
                'description_en' => '<p>Corporate informational website on 1C-Bitrix with an interactive map of two territories.</p>',
            ],
            14 => [
                'name_en' => 'Symbol of Health — Clinic Website',
                'description_en' => '<p>Homepage layout implementation, AsPro integration for clinic information display.</p>',
            ],
            15 => [
                'name_en' => 'GasUfa — Subscriber Service Website',
                'description_en' => '<p>Full website maintenance: layout, responsiveness, cross-browser compatibility. 1C-Bitrix integration. Business logic for meter verification search by district.</p>',
            ],
            16 => [
                'name_en' => 'Umdgroup — Medical Equipment Catalog',
                'description_en' => '<p>Full website development: Figma to code, responsive, cross-browser. WordPress with ACF.</p>',
            ],
            17 => [
                'name_en' => 'Cellar Configurator',
                'description_en' => '<p>Cellar configurator built with 1C-Bitrix and Vue.js. Server-side PDF generation via Puppeteer. Tagged caching and a lightweight API on the 1C-Bitrix side for Vue data exchange. PDF sent by email and data forwarded to Bitrix24.</p>',
            ],
            18 => [
                'name_en' => 'Off-Road Vehicle Configurator',
                'description_en' => '<p>Off-road vehicle configurator on 1C-Bitrix with React.js. Caching and lightweight API on 1C-Bitrix side, React frontend. PDF generation, email delivery, and Bitrix24 integration.</p>',
            ],
            19 => [
                'name_en' => 'ZUMFA — Pump Manufacturing Website',
                'description_en' => '<p>Long-term collaboration implementing fixes and new features. Main page and catalog pages development. Business logic for parsing Excel tables into functional website blocks.</p>',
            ],
        ];

        foreach ($projects as $id => $data) {
            DB::table('projects')->where('id', $id)->update($data);
        }
    }

    public function down(): void
    {
        DB::table('category_abillities')->update(['name_en' => null]);
        DB::table('abillities')->update(['name_en' => null]);
        DB::table('project_categories')->update(['name_en' => null]);
        DB::table('project_tags')->update(['name_en' => null]);
        DB::table('projects')->update(['name_en' => null, 'description_en' => null]);
    }
};
