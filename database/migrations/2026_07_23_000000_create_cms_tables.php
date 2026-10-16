<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Settings
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone_raw')->nullable();
            $table->string('email')->nullable();
            $table->string('whatsapp')->nullable();
            $table->text('address')->nullable();
            $table->string('guru_name')->nullable();
            $table->string('experience_years')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('hero_badge')->nullable();
            $table->string('hero_title')->nullable();
            $table->string('hero_quote')->nullable();
            $table->text('hero_description')->nullable();
            $table->string('hero_trust_1')->nullable();
            $table->string('hero_trust_2')->nullable();
            $table->string('hero_trust_3')->nullable();
            $table->text('about_short')->nullable();
            $table->string('stat_gems')->nullable();
            $table->string('stat_poojas')->nullable();
            $table->string('stat_countries')->nullable();
            $table->string('cta_title')->nullable();
            $table->string('cta_subtitle')->nullable();
            $table->text('footer_desc')->nullable();
            $table->string('logo_path')->nullable();
            $table->string('favicon_path')->nullable();
            $table->text('google_map')->nullable();
            $table->text('analytics_code')->nullable();
            $table->text('custom_css')->nullable();
            $table->text('custom_js')->nullable();
            $table->string('smtp_host')->nullable();
            $table->string('smtp_port')->nullable();
            $table->string('smtp_username')->nullable();
            $table->string('smtp_password')->nullable();
            $table->string('smtp_encryption')->nullable();
            $table->string('smtp_from_address')->nullable();
            $table->string('smtp_from_name')->nullable();
            $table->longText('seo_tags')->nullable();
            $table->timestamps();
        });

        // 2. Service Categories
        Schema::create('service_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_hindi')->nullable();
            $table->string('slug')->unique();
            $table->string('icon')->nullable();
            $table->string('color_class')->nullable();
            $table->integer('sort_order')->default(0);
            $table->longText('seo_tags')->nullable();
            $table->string('alt_image')->nullable();
            $table->timestamps();
        });

        // 3. Services
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('service_categories')->onDelete('cascade');
            $table->string('title');
            $table->string('title_hindi')->nullable();
            $table->string('slug')->unique();
            $table->string('icon')->nullable();
            $table->string('color_class')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('full_description')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->boolean('show_on_home')->default(false);
            $table->boolean('is_active')->default(true);
            $table->string('image')->nullable();
            $table->string('alt_image')->nullable();
            $table->longText('seo_tags')->nullable();
            $table->timestamps();
        });

        // 4. Testimonials
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('location')->nullable();
            $table->text('quote');
            $table->string('initials', 4)->nullable();
            $table->string('avatar_color')->nullable();
            $table->integer('rating')->default(5);
            $table->string('image')->nullable();
            $table->string('alt_image')->nullable();
            $table->timestamps();
        });

        // 5. Gallery Items
        Schema::create('gallery_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('icon')->nullable();
            $table->string('gradient_colors')->nullable();
            $table->string('category')->nullable();
            $table->boolean('is_span2')->default(false);
            $table->integer('sort_order')->default(0);
            $table->string('image')->nullable();
            $table->string('alt_image')->nullable();
            $table->longText('seo_tags')->nullable();
            $table->timestamps();
        });

        // 6. Blogs
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable();
            $table->longText('content');
            $table->string('thumb_icon')->nullable();
            $table->string('thumb_gradient')->nullable();
            $table->string('category')->nullable();
            $table->integer('view_count')->default(0);
            $table->string('image')->nullable();
            $table->string('alt_image')->nullable();
            $table->longText('seo_tags')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });

        // 7. Banners (Slider)
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image_url');
            $table->string('link_url')->nullable();
            $table->string('alt_image')->nullable();
            $table->timestamps();
        });

        // 8. Inquiries (CRM Leads)
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->time('time_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('language')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->text('concern')->nullable();
            $table->string('subject')->nullable();
            $table->string('form_type'); // 'Consultation' or 'Contact'
            $table->string('status')->default('New'); // 'New', 'Contacted', 'Closed'
            $table->text('admin_notes')->nullable();
            $table->timestamps();
        });

        // 9. Horoscopes
        Schema::create('horoscopes', function (Blueprint $table) {
            $table->id();
            $table->string('zodiac_sign');
            $table->string('symbol')->nullable();
            $table->text('daily_forecast')->nullable();
            $table->timestamps();
        });

        // 10. FAQs
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->text('answer');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        // 11. Pages
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('content')->nullable();
            $table->string('image')->nullable();
            $table->string('alt_image')->nullable();
            $table->longText('seo_tags')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
        Schema::dropIfExists('faqs');
        Schema::dropIfExists('horoscopes');
        Schema::dropIfExists('inquiries');
        Schema::dropIfExists('banners');
        Schema::dropIfExists('blogs');
        Schema::dropIfExists('gallery_items');
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('services');
        Schema::dropIfExists('service_categories');
        Schema::dropIfExists('settings');
    }
};
