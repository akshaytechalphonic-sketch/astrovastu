<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Setting;
use App\Models\ServiceCategory;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\GalleryItem;
use App\Models\Blog;
use App\Models\Banner;
use App\Models\Inquiry;
use App\Models\Horoscope;
use App\Models\Faq;
use App\Models\Page;
use App\Models\Section;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Admin User
        User::updateOrCreate(
            ['email' => 'admin@astrovastupooja.com'],
            [
                'name' => 'Pt. Dhiraj Baluni',
                'password' => Hash::make('admin123'),
            ]
        );

        // 2. Settings
        Setting::updateOrCreate(
            ['id' => 1],
            [
                'site_name' => "AstroVastuPooja",
                'phone' => "+91 98683 40066",
                'phone_raw' => "919868340066",
                'email' => "shiv.astro@yahoo.com",
                'whatsapp' => "919868340066",
                'address' => "Shop No 21, Spectrum Mall, Phase 1 Sector 75, Noida (Inside Malhotra Jewels)",
                'guru_name' => "Pt. Dhiraj Baluni",
                'experience_years' => "29",
                'facebook_url' => "https://www.facebook.com/profile.php?id=61588491608493&locale=hi_IN",
                'instagram_url' => "https://www.instagram.com/AstroVastuPooja/",
                'twitter_url' => "https://x.com/Dhir28481Prasad",
                'linkedin_url' => "https://www.linkedin.com/feed/",
                'hero_badge' => "Best Astrologer in Noida — Trusted by 10,000+ Clients",
                'hero_title' => "Reshape Your Life Through Vedic Astrology, Vastu & Sacred Pooja",
                'hero_quote' => "Don't lose hope — happiness can come again in your life",
                'hero_description' => "Pt. Dhiraj Baluni brings 29+ years of mastery in Vedic astrology, Vastu Shastra, and Karmkand rituals. Get in-depth horoscope analysis with personalized remedies.",
                'hero_trust_1' => "29+ Years Experience",
                'hero_trust_2' => "ICAS Certified",
                'hero_trust_3' => "Online & In-Person",
                'about_short' => "Belongs to a revered Brahmin family. Studied Jyotish Praveen and Jyotish Visharadh from ICAS under the guidance of renowned astrologers late Shri M.N. Kedar and Pradeep Chaturvedi.",
                'stat_gems' => "50",
                'stat_poojas' => "10000",
                'stat_countries' => "100",
                'cta_title' => "We Will Transform Your Life & Give You the Best Solution",
                'cta_subtitle' => "Talk to Pt. Dhiraj Baluni and get your problems solved today",
                'footer_desc' => "The most reliable destination for Vedic Astrology, Vastu Shastra, Karmkand rituals and Gem consultation. Trusted by 10,000+ clients across 100+ countries.",
                'logo_path' => null,
                'favicon_path' => null,
                'google_map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m13!1d3503.7436814674697!2d77.36868847614041!3d28.57746197569472!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cefdf066144e5%3A0xc47bead8a213e4b7!2sMalhotra%20Jewels!5e0!3m2!1sen!2sin!4v1710500000000!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'seo_tags' => "<!-- Meta Tags -->\n<title>Best Astrologer in Noida | Pt. Dhiraj Baluni | AstroVastuPooja</title>\n<meta name=\"description\" content=\"Pt. Dhiraj Baluni is the best Vedic Astrologer and Vastu Shastra Consultant in Noida, offering horoscope analysis, matching, pooja services, and gemstones.\">"
            ]
        );

        // 3. Service Categories
        $categories = [
            [ 'id' => 1, 'name' => "Astrology Services", 'name_hindi' => "ज्योतिष सेवाएं", 'slug' => "astrology", 'icon' => "🔮", 'color_class' => "saffron-mist", 'sort_order' => 1 ],
            [ 'id' => 2, 'name' => "Pooja Path Services", 'name_hindi' => "पूजा पाठ सेवाएं", 'slug' => "pooja-path", 'icon' => "🔔", 'color_class' => "teal-mist", 'sort_order' => 2 ],
            [ 'id' => 3, 'name' => "Vastu Shastra", 'name_hindi' => "वास्तु शास्त्र", 'slug' => "vastu", 'icon' => "🏡", 'color_class' => "gold-pale", 'sort_order' => 3 ],
            [ 'id' => 4, 'name' => "Gems & Numerology", 'name_hindi' => "रत्न और अंक ज्योतिष", 'slug' => "gems-numerology", 'icon' => "💎", 'color_class' => "maroon-mist", 'sort_order' => 4 ]
        ];
        foreach ($categories as $c) {
            ServiceCategory::updateOrCreate(['id' => $c['id']], $c);
        }

        // 4. Services
        $services = [
            // Astrology Services
            [
                'id' => 1,
                'category_id' => 1,
                'title' => "Horoscope",
                'title_hindi' => "जन्म कुंडली",
                'slug' => "horoscope",
                'icon' => "🔮",
                'color_class' => "saffron-mist",
                'short_description' => "Complete birth chart analysis and 10-year predictions",
                'full_description' => "<h4>Vedic Significance</h4><p>ज्योतिष शास्त्र एक प्राचीन वेदांग है, जिसे 'वेद का चक्षु' कहा गया है। यह ज्ञान ऋषि भृगु और पराशर द्वारा प्रदान किया गया था। ज्योतिष शास्त्र ग्रहों, नक्षत्रों और अन्य खगोलीय पिंडों की स्थिति और उनके प्रभावों का अध्ययन करता है।</p><h4>What You Get</h4><ul><li>In-depth analysis of 12 houses of your Kundli.</li><li>Detailed predictions for the next 10 years covering health, wealth, marriage, and family.</li><li>Easy remedies (Mantra, Daan, Stone) for afflicted planets.</li></ul>",
                'sort_order' => 1,
                'is_featured' => true,
                'show_on_home' => true,
                'is_active' => true
            ],
            [
                'id' => 2,
                'category_id' => 1,
                'title' => "Marriage Matching",
                'title_hindi' => "विवाह कुंडली मिलान",
                'slug' => "marriage-matching",
                'icon' => "💑",
                'color_class' => "maroon-mist",
                'short_description' => "Kundli matching for compatibility and harmony",
                'full_description' => "<h4>Vedic Significance</h4><p>विवाह संस्कार 16 संस्कारो में से एक मुख्य संस्कार है। भारतीय संस्कृति में विवाह के दौरान की जाने वाली पूजा एक धार्मिक प्रक्रिया है।</p><h4>Compatibility Analysis</h4><p>We perform detailed Kundli matching (Ashtakoot Milan) to ensure compatibility between partners for a harmonious married life. Check Gana, Bhakoot, Nadi, and Mangal Dosh compatibility.</p>",
                'sort_order' => 2,
                'is_featured' => true,
                'show_on_home' => true,
                'is_active' => true
            ],
            [
                'id' => 3,
                'category_id' => 1,
                'title' => "Educational Astrology",
                'title_hindi' => "शिक्षा से संबंधित ज्योतिषीय सलाह",
                'slug' => "educational-astrology",
                'icon' => "🎓",
                'color_class' => "teal-mist",
                'short_description' => "Career and education path guidance through astrology",
                'full_description' => "<h4>Vedic Significance</h4><p>शिक्षा एक ऐसी प्रक्रिया है जिसके माध्यम से व्यक्ति ज्ञान, कौशल, मूल्यों, और विचारों को अर्जित करता है।</p><h4>Astrological Guidance</h4><p>Astrology helps identify the best educational streams, competitive exam timing, and career paths based on your birth chart's 5th house and planetary aspects.</p>",
                'sort_order' => 3,
                'is_featured' => false,
                'show_on_home' => true,
                'is_active' => true
            ],
            [
                'id' => 4,
                'category_id' => 1,
                'title' => "Business & Career",
                'title_hindi' => "व्यवसाय एवं कैरियर से संबंधित सलाह",
                'slug' => "business-career",
                'icon' => "💼",
                'color_class' => "gold-pale",
                'short_description' => "Business timing, job changes and career direction",
                'full_description' => "<h4>Career Choice</h4><p>वर्तमान समय मे यह प्रश्न सबसे ज्यादा पूछा जाने वाला प्रश्न है कि नौकरी करनी चाहिए या बिजनेस करे, या कुंडली के अनुसार कौन सा बिजनेस करना चाहिए कब करना चाहिए।</p><p>Get expert guidance on business partnerships, expansion timing, and career transitions based on 10th house planetary configurations.</p>",
                'sort_order' => 4,
                'is_featured' => false,
                'show_on_home' => true,
                'is_active' => true
            ],
            [
                'id' => 5,
                'category_id' => 1,
                'title' => "Wealth & Finance",
                'title_hindi' => "धन आगमन ज्योतिषीय सलाह",
                'slug' => "wealth-finance",
                'icon' => "💰",
                'color_class' => "saffron-mist",
                'short_description' => "Financial prosperity and wealth accumulation guidance",
                'full_description' => "<h4>Wealth Yogas</h4><p>मानव जीवन मे जीविकोपार्जन के लिए धन या लक्ष्मी की परम आवश्यकता होती है। बिना धन के दरिद्रता का वास होता है।</p><p>Vedic astrology identifies wealth yogas in your chart (such as Laxmi Yoga, Kuber Yoga) and provides remedies to enhance financial prosperity.</p>",
                'sort_order' => 5,
                'is_featured' => false,
                'show_on_home' => true,
                'is_active' => true
            ],
            [
                'id' => 6,
                'category_id' => 1,
                'title' => "Property & Real Estate",
                'title_hindi' => "संपत्ति संबंधित प्रश्न",
                'slug' => "property-real-estate",
                'icon' => "🏠",
                'color_class' => "teal-mist",
                'short_description' => "Property and land astrological advice",
                'full_description' => "<h4>Property Analysis</h4><p>भू सम्पत्ति, अचल संपत्ति या पैतृक संपत्ति के संबंध में ज्योतिषीय विश्लेषण — जन्म कुंडली और प्रारब्ध कर्मानुसार हमारी कुंडली निर्मित होती है। Get guidance on property purchase timing, land disputes, and real estate investments based on 4th house and Mars.</p>",
                'sort_order' => 6,
                'is_featured' => false,
                'show_on_home' => true,
                'is_active' => true
            ],
            [
                'id' => 7,
                'category_id' => 1,
                'title' => "Court Case & Disputes",
                'title_hindi' => "कोर्ट केस से संबंधित प्रश्न",
                'slug' => "court-case",
                'icon' => "⚖️",
                'color_class' => "maroon-mist",
                'short_description' => "Legal disputes and court case astrological solutions",
                'full_description' => "<h4>Legal Astrology</h4><p>मंगल ज्योतिष में ऊर्जा का कारक है। कई बार इसका अशुभ प्रभाव झगड़ों और कोर्ट केस का मुख्य कारण हो सकता है। यह आक्रामकता और टकराव को बढ़ाता है। Get astrological remedies for ongoing litigation, property disputes, and divorce cases.</p>",
                'sort_order' => 7,
                'is_featured' => false,
                'show_on_home' => true,
                'is_active' => true
            ],
            [
                'id' => 8,
                'category_id' => 1,
                'title' => "Auspicious Time Selection",
                'title_hindi' => "शुभ मुहूर्त चयन",
                'slug' => "auspicious-time",
                'icon' => "🕐",
                'color_class' => "gold-pale",
                'short_description' => "Muhurat selection for ceremonies, business launches & events",
                'full_description' => "<h4>Auspicious Timing</h4><p>शुभ मुहूर्त का शाब्दिक अर्थ है किसी कार्य को प्रारंभ करने के लिए एक ऐसा समय जो ज्योतिषीय दृष्टि से शुभ और लाभकारी हो। यह वह समय होता है जब ग्रहों और नक्षत्रों की स्थिति अनुकूल होती है। We provide muhurat for marriages, grih pravesh, business launches, and all important ceremonies.</p>",
                'sort_order' => 8,
                'is_featured' => false,
                'show_on_home' => true,
                'is_active' => true
            ],

            // Pooja Path Services
            [
                'id' => 9,
                'category_id' => 2,
                'title' => "Rudra Abhishek",
                'title_hindi' => "रुद्राभिषेक / शिव पूजा",
                'slug' => "rudra-abhishek",
                'icon' => "🔔",
                'color_class' => "teal-mist",
                'short_description' => "Sacred Shiva pooja for blessings and obstacle removal",
                'full_description' => "<h4>Shiva Rituals</h4><p>रुद्राभिषेक भगवान शिव की परम प्रिय पूजा है। यह भगवान शिव को पाने का एक अत्यंत पवित्र और शक्तिशाली माध्यम है। This sacred Shiva pooja removes obstacles, brings peace, and blesses devotees with health, wealth, and spiritual growth.</p>",
                'sort_order' => 1,
                'is_featured' => false,
                'show_on_home' => false,
                'is_active' => true
            ],
            [
                'id' => 10,
                'category_id' => 2,
                'title' => "Durga Saptashati",
                'title_hindi' => "दुर्गा सप्तशती पूजा",
                'slug' => "durga-saptashati",
                'icon' => "🔔",
                'color_class' => "saffron-mist",
                'short_description' => "Powerful Durga pooja for divine protection and strength",
                'full_description' => "<h4>Devi Pooja</h4><p>दुर्गा सप्तशती पाठ माँ दुर्गा की कृपा पाने के लिए एक अत्यंत पवित्र और शक्तिशाली साधना है। यह मार्कण्डेय पुराण का एक महत्वपूर्ण हिस्सा है, जिसमें देवी महात्म्य के 700 श्लोक हैं। इसे चंडी पाठ भी कहा जाता है।</p>",
                'sort_order' => 2,
                'is_featured' => false,
                'show_on_home' => false,
                'is_active' => true
            ],
            [
                'id' => 11,
                'category_id' => 2,
                'title' => "Satyanarayan Vrat & Pooja",
                'title_hindi' => "सत्यनारायण पूजा",
                'slug' => "satyanarayan",
                'icon' => "🔔",
                'color_class' => "gold-pale",
                'short_description' => "Vishnu pooja for prosperity, peace & harmony",
                'full_description' => "<h4>Satyanarayan Rituals</h4><p>सत्यनारायण पूजा भगवान विष्णु की आराधना का एक अत्यंत पवित्र और शुभ पूजा विधि है। यह पूजा विशेष रूप से सुख, शांति, समृद्धि, और सौभाग्य की प्राप्ति के लिए की जाती है। Performed on auspicious occasions for divine blessings.</p>",
                'sort_order' => 3,
                'is_featured' => false,
                'show_on_home' => false,
                'is_active' => true
            ],
            [
                'id' => 12,
                'category_id' => 2,
                'title' => "Mangal Dosh Nivaran",
                'title_hindi' => "मांगलिक दोष निवारण पूजा",
                'slug' => "mangal-dosh",
                'icon' => "🔔",
                'color_class' => "maroon-mist",
                'short_description' => "Remedial pooja for Manglik Dosh in kundli",
                'full_description' => "<h4>Manglik Dosh Shanti</h4><p>मंगल दोष जिसे मांगलिक दोष भी कहा जाता है, ज्योतिष में एक महत्वपूर्ण ग्रह मंगल है जिसको सेनापति की संज्ञा प्राप्त है। अगर मंगल जन्म पत्रिका में अच्छे भाव मे योगकारक है तो जीवन मे बहुत उन्नति और सफलता देता है।</p>",
                'sort_order' => 4,
                'is_featured' => false,
                'show_on_home' => false,
                'is_active' => true
            ],
            [
                'id' => 13,
                'category_id' => 2,
                'title' => "Kaal Sarp Dosh Nivaran",
                'title_hindi' => "काल सर्प दोष निवारण पूजा",
                'slug' => "kaal-sarp-dosh",
                'icon' => "🔔",
                'color_class' => "teal-mist",
                'short_description' => "Powerful remedy for Kaal Sarp Dosh effects",
                'full_description' => "<h4>Kaal Sarp Shanti</h4><p>कालसर्प दोष एक ऐसी ज्योतिषीय स्थिति है जो तब बनती है जब किसी व्यक्ति की कुंडली में सभी ग्रह राहु और केतु के बीच आ जाते हैं। इसे एक अशुभ योग माना जाता, जो व्यक्ति के जीवन में कठिनाइयाँ, बाधाएँ, और संकट ला सकता है।</p>",
                'sort_order' => 5,
                'is_featured' => false,
                'show_on_home' => false,
                'is_active' => true
            ],
            [
                'id' => 14,
                'category_id' => 2,
                'title' => "Grih Pravesh",
                'title_hindi' => "गृह प्रवेश पूजा",
                'slug' => "grih-pravesh",
                'icon' => "🏡",
                'color_class' => "saffron-mist",
                'short_description' => "Housewarming ceremony and new home blessings",
                'full_description' => "<h4>Housewarming Pooja</h4><p>सनातन धर्म मे गृह प्रवेश का बहुत बड़ा महत्व है। वास्तु शास्त्र के अनुसार जब भी हम नए घर मे प्रवेश करें तो कुछ विधान और नियमावली है। यदि हम उन नियमों का पालन करते है तो घर मे सुख, शांति, और समृद्धि का वास होता है।</p>",
                'sort_order' => 6,
                'is_featured' => false,
                'show_on_home' => false,
                'is_active' => true
            ],
            [
                'id' => 15,
                'category_id' => 2,
                'title' => "Birthday & Navgrah Pooja",
                'title_hindi' => "जन्म दिवस, नवग्रह पूजा",
                'slug' => "birthday-navgrah",
                'icon' => "🎂",
                'color_class' => "gold-pale",
                'short_description' => "Birthday blessings and planetary peace rituals",
                'full_description' => "<h4>Navgrah Shanti</h4><p>जन्म दिवस पर पूजा का विशेष महत्व है क्योंकि यह दिन व्यक्ति के जीवन में नई ऊर्जा, सकारात्मकता और आध्यात्मिक उन्नति का प्रतीक होता है। जन्म दिवस पूजा से शांति, सुख, समृद्धि और सौभाग्य की प्राप्ति होती है।</p>",
                'sort_order' => 7,
                'is_featured' => false,
                'show_on_home' => false,
                'is_active' => true
            ],
            [
                'id' => 16,
                'category_id' => 2,
                'title' => "Marriage & Ring Ceremony",
                'title_hindi' => "विवाह, हल्दी, सगाई पूजा",
                'slug' => "marriage-ceremony",
                'icon' => "💒",
                'color_class' => "maroon-mist",
                'short_description' => "Complete wedding and engagement ritual services",
                'full_description' => "<h4>Vedic Marriage Rites</h4><p>विवाह संस्कार 16 संस्कारो में से एक मुख्य संस्कार है। सगाई हिंदू संस्कृति में विवाह संस्कार की पहली महत्वपूर्ण रस्म मानी जाती है। यह रस्म वर और वधू के परिवारों के बीच रिश्ते को औपचारिक रूप से स्वीकार करने का प्रतीक है।</p>",
                'sort_order' => 8,
                'is_featured' => false,
                'show_on_home' => false,
                'is_active' => true
            ],
            [
                'id' => 17,
                'category_id' => 2,
                'title' => "Deepawali & Lakshmi Pooja",
                'title_hindi' => "दीपावली, लक्ष्मी पूजा",
                'slug' => "deepawali",
                'icon' => "🪔",
                'color_class' => "teal-mist",
                'short_description' => "Diwali celebrations and wealth pooja for Lakshmi blessings",
                'full_description' => "<h4>Diwali Pooja</h4><p>दीपावली हिंदू धर्म का एक प्रमुख पंच दिवसीय पर्व है। इसे प्रकाश का पर्व भी कहा जाता है। यह त्योहार अंधकार पर प्रकाश की, अज्ञान पर ज्ञान की और बुराई पर अच्छाई की विजय का प्रतीक है।</p>",
                'sort_order' => 9,
                'is_featured' => false,
                'show_on_home' => false,
                'is_active' => true
            ],
            [
                'id' => 18,
                'category_id' => 2,
                'title' => "Mahamrityunjay Mantra Jap",
                'title_hindi' => "महा मृत्युंजय जप",
                'slug' => "mahamrityunjay",
                'icon' => "🔔",
                'color_class' => "saffron-mist",
                'short_description' => "Sacred chanting for health, protection and longevity",
                'full_description' => "<h4>Mahamrityunjay</h4><p>महामृत्युंजय मंत्र हिंदू धर्म का एक अत्यंत शक्तिशाली और पवित्र मंत्र है। यह भगवान शिव की स्तुति और कृपा प्राप्त करने के लिए किया जाता है। इसे 'अमृत संजीवनी' मंत्र भी कहा जाता है।</p>",
                'sort_order' => 10,
                'is_featured' => false,
                'show_on_home' => false,
                'is_active' => true
            ],
            [
                'id' => 19,
                'category_id' => 2,
                'title' => "Santan Gopal Mantra Jap",
                'title_hindi' => "संतान गोपाल मंत्र जप पूजा",
                'slug' => "santan-gopal",
                'icon' => "🔔",
                'color_class' => "gold-pale",
                'short_description' => "Pooja for child blessings and progeny",
                'full_description' => "<h4>Santan Gopal</h4><p>यह मंत्र भगवान श्रीकृष्ण को समर्पित है और संतान प्राप्ति, संतान की रक्षा, और उनकी उन्नति के लिए जपा जाता है। यह गोपाल स्वरूप (बालकृष्ण) की आराधना के लिए है और इसे अत्यंत फलदायी माना गया है।</p>",
                'sort_order' => 11,
                'is_featured' => false,
                'show_on_home' => false,
                'is_active' => true
            ],
            [
                'id' => 20,
                'category_id' => 2,
                'title' => "Pinddan & Pitri Pooja",
                'title_hindi' => "पिंडदान, पितृ पूजा, गरुड़ पुराण पाठ",
                'slug' => "pinddan",
                'icon' => "🔔",
                'color_class' => "maroon-mist",
                'short_description' => "Ancestral rites, Garud Puran Path and Pitri blessings",
                'full_description' => "<h4>Ancestral Rituals</h4><p>हिंदू धर्म में पितरों (पूर्वजों) को श्रद्धांजलि और सम्मान देने की विशेष परंपरा है। इसे श्राद्ध कर्म, तर्पण, और पिंडदान के रूप में जाना जाता है। यह पूजा श्राद्ध पक्ष (पितृ पक्ष) के दौरान की जाती है।</p>",
                'sort_order' => 12,
                'is_featured' => false,
                'show_on_home' => false,
                'is_active' => true
            ],
            [
                'id' => 21,
                'category_id' => 2,
                'title' => "Mundan Pooja",
                'title_hindi' => "चूड़ाकर्म संस्कार / मुंडन",
                'slug' => "mundan",
                'icon' => "🔔",
                'color_class' => "teal-mist",
                'short_description' => "Sacred first head shaving ceremony for children",
                'full_description' => "<h4>Mundan Ceremony</h4><p>चूड़ाकर्म संस्कार 16 संस्कारों में एक महत्वपूर्ण संस्कार है, जिसमें बच्चे के जन्म के बाल काटने (मुंडन) की विधि संपन्न की जाती है। इसे शारीरिक और आध्यात्मिक शुद्धि का प्रतीक माना जाता है।</p>",
                'sort_order' => 13,
                'is_featured' => false,
                'show_on_home' => false,
                'is_active' => true
            ],

            // Vastu Shastra Services
            [
                'id' => 22,
                'category_id' => 3,
                'title' => "Home Vastu",
                'title_hindi' => "घर का वास्तु",
                'slug' => "home-vastu",
                'icon' => "🏠",
                'color_class' => "teal-mist",
                'short_description' => "Residential Vastu analysis and corrections",
                'full_description' => "<h4>Residential Vastu</h4><p>Create a balanced and positive environment in your home with professional Vastu Shastra services. We analyze room placement, directions, entrance positions, and energy flow to ensure health, prosperity, and harmony for your family.</p>",
                'sort_order' => 1,
                'is_featured' => false,
                'show_on_home' => false,
                'is_active' => true
            ],
            [
                'id' => 23,
                'category_id' => 3,
                'title' => "Office & Factory Vastu",
                'title_hindi' => "ऑफिस, फैक्ट्री वास्तु",
                'slug' => "office-vastu",
                'icon' => "🏢",
                'color_class' => "gold-pale",
                'short_description' => "Commercial space Vastu for business success",
                'full_description' => "<h4>Commercial Vastu</h4><p>Optimize your workplace energy with Vastu consultation for offices, factories, and commercial spaces. Proper Vastu alignment in business premises enhances productivity, employee harmony, and financial growth.</p>",
                'sort_order' => 2,
                'is_featured' => false,
                'show_on_home' => false,
                'is_active' => true
            ],
            [
                'id' => 24,
                'category_id' => 3,
                'title' => "Plot Vastu",
                'title_hindi' => "भूखंड वास्तु",
                'slug' => "plot-vastu",
                'icon' => "🌍",
                'color_class' => "saffron-mist",
                'short_description' => "Land and plot selection based on Vastu principles",
                'full_description' => "<h4>Plot Vastu</h4><p>Before purchasing a plot or constructing a building, Vastu analysis of the land is essential. We evaluate plot shape, slope, surroundings, and directional alignment to ensure the land brings prosperity and positive energy.</p>",
                'sort_order' => 3,
                'is_featured' => false,
                'show_on_home' => false,
                'is_active' => true
            ],
            [
                'id' => 25,
                'category_id' => 3,
                'title' => "Vastu Dosh Shanti",
                'title_hindi' => "वास्तु दोष शांति पूजा",
                'slug' => "vastu-dosh",
                'icon' => "🔔",
                'color_class' => "maroon-mist",
                'short_description' => "Vastu defect remedial pooja and corrections",
                'full_description' => "<h4>Vastu Remedial</h4><p>Vastu Shanti is performed to correct vaastu dosh (faults) and remove all defects if a house is not constructed according to Vastu Shastra. This puja improves health of family members, brings peace, and removes negative energy.</p>",
                'sort_order' => 4,
                'is_featured' => false,
                'show_on_home' => false,
                'is_active' => true
            ],

            // Gems & Numerology
            [
                'id' => 26,
                'category_id' => 4,
                'title' => "Gem Stone Consultation",
                'title_hindi' => "ज्योतिषीय रत्न सलाहकार",
                'slug' => "gem-stone",
                'icon' => "💎",
                'color_class' => "saffron-mist",
                'short_description' => "Astrological gem selection for planetary balance and prosperity",
                'full_description' => "<h4>Stone Therapy</h4><p>रत्न ज्योतिष एक विज्ञान है — हम ज्योतिषीय पद्धति द्वारा रत्नों का चयन करते है, जिसमें ग्रहों और नक्षत्रों के प्रभाव को संतुलित करने और जीवन के विभिन्न पहलुओं को सुधारने के लिए रत्नों का उपयोग किया जाता है।</p>",
                'sort_order' => 1,
                'is_featured' => false,
                'show_on_home' => false,
                'is_active' => true
            ],
            [
                'id' => 27,
                'category_id' => 4,
                'title' => "Numerology",
                'title_hindi' => "अंक ज्योतिष",
                'slug' => "numerology",
                'icon' => "🔢",
                'color_class' => "teal-mist",
                'short_description' => "Name and number analysis for success in life",
                'full_description' => "<h4>Number Analysis</h4><p>Discover how numbers influence your life and destiny. Our numerology services provide personalized insights into your strengths, challenges, and opportunities, helping you make informed decisions for a brighter future. Lucky numbers, name corrections, and business name suggestions.</p>",
                'sort_order' => 2,
                'is_featured' => false,
                'show_on_home' => false,
                'is_active' => true
            ]
        ];
        foreach ($services as $s) {
            Service::updateOrCreate(['id' => $s['id']], $s);
        }

        // 5. Testimonials
        $testimonials = [
            [ 'id' => 1, 'client_name' => "Ram Sharma", 'location' => "Noida, India", 'quote' => "Simply amazing! Dhiraj ji is not just an astrologer — they are a true guide. Their readings are astonishingly accurate, and they provided practical, actionable advice. I felt heard and genuinely cared for.", 'initials' => "RS", 'avatar_color' => "saffron", 'rating' => 5 ],
            [ 'id' => 2, 'client_name' => "Shyam Sharma", 'location' => "Delhi, India", 'quote' => "As a skeptic, I was hesitant, but a friend convinced me. Their predictions have been shockingly accurate — he helped me understand my own patterns and potential. Highly recommended for deep guidance.", 'initials' => "SS", 'avatar_color' => "teal", 'rating' => 5 ],
            [ 'id' => 3, 'client_name' => "Bheem", 'location' => "Ghaziabad, India", 'quote' => "मैंने कई ज्योतिषियों से सलाह ली, लेकिन धीरज जी एक अलग लीग में हैं। उनकी भविष्यवाणियाँ लगातार सही साबित हुई हैं। वास्तव में एक प्रतिभाशाली व्यक्ति!", 'initials' => "B", 'avatar_color' => "maroon", 'rating' => 5 ],
            [ 'id' => 4, 'client_name' => "Radha", 'location' => "India", 'quote' => "अविश्वसनीय रूप से सटीक भविष्यवाणियाँ और अद्भुत रूप से सहायक! धीरज जी सबसे अच्छे हैं। हमेशा स्पष्ट, सहायक मार्गदर्शन प्रदान करते हैं।", 'initials' => "R", 'avatar_color' => "saffron", 'rating' => 5 ]
        ];
        foreach ($testimonials as $t) {
            Testimonial::updateOrCreate(['id' => $t['id']], $t);
        }

        // 6. Gallery Items
        $gallery = [
            [ 'id' => 1, 'title' => "Pooja Ceremony", 'icon' => "🙏", 'gradient_colors' => "saffron-mist,teal-mist", 'category' => "Pooja", 'is_span2' => true, 'sort_order' => 1 ],
            [ 'id' => 2, 'title' => "Rudra Abhishek", 'icon' => "🔔", 'gradient_colors' => "teal-mist,gold-pale", 'category' => "Pooja", 'is_span2' => false, 'sort_order' => 2 ],
            [ 'id' => 3, 'title' => "Vastu Consultation", 'icon' => "🏡", 'gradient_colors' => "gold-pale,saffron-mist", 'category' => "Vastu", 'is_span2' => false, 'sort_order' => 3 ],
            [ 'id' => 4, 'title' => "Gem Stones", 'icon' => "💎", 'gradient_colors' => "maroon-mist,gold-pale", 'category' => "Gems", 'is_span2' => false, 'sort_order' => 4 ],
            [ 'id' => 5, 'title' => "Hawan Ceremony", 'icon' => "🔥", 'gradient_colors' => "saffron-mist,maroon-mist", 'category' => "Pooja", 'is_span2' => false, 'sort_order' => 5 ],
            [ 'id' => 6, 'title' => "Horoscope Analysis", 'icon' => "🔮", 'gradient_colors' => "teal-mist,saffron-mist", 'category' => "Astrology", 'is_span2' => false, 'sort_order' => 6 ],
            [ 'id' => 7, 'title' => "Marriage Pooja", 'icon' => "💒", 'gradient_colors' => "maroon-mist,gold-pale", 'category' => "Pooja", 'is_span2' => false, 'sort_order' => 7 ],
            [ 'id' => 8, 'title' => "Navgrah Pooja", 'icon' => "🌟", 'gradient_colors' => "gold-pale,teal-mist", 'category' => "Pooja", 'is_span2' => false, 'sort_order' => 8 ],
            [ 'id' => 9, 'title' => "Satyanarayan Pooja", 'icon' => "🪔", 'gradient_colors' => "teal-mist,maroon-mist", 'category' => "Pooja", 'is_span2' => false, 'sort_order' => 9 ],
            [ 'id' => 10, 'title' => "Grih Pravesh", 'icon' => "🏠", 'gradient_colors' => "saffron-mist,teal-mist", 'category' => "Pooja", 'is_span2' => false, 'sort_order' => 10 ]
        ];
        foreach ($gallery as $g) {
            GalleryItem::updateOrCreate(['id' => $g['id']], $g);
        }

        // 7. Blogs
        $blogs = [
            [
                'id' => 1,
                'title' => "Unlocking Your Destiny: The Power of Astrology",
                'slug' => "unlocking-your-destiny",
                'excerpt' => "Astrology holds the key to unlocking the mysteries of your future with precise predictions...",
                'content' => "<p>Astrology has traditionally been perceived as a directional force that determines the fate of an individual. Astrology helps to get clarity in all aspects of life, whether it is related to relationships, career, finance or personal growth.</p><p>At AstroVastuPooja, we provide in-depth analysis based on Vedic principles that can transform your understanding of life's challenges. Planets and stars exert a subtle influence on human psychology and life outcomes. By understanding this cosmic matrix, we can prepare better and seize the right opportunities.</p>",
                'thumb_icon' => "🔮",
                'thumb_gradient' => "saffron-mist,gold-pale",
                'category' => "Astrology",
                'view_count' => 145,
                'published_at' => now(),
            ],
            [
                'id' => 2,
                'title' => "Finding the Best Astrologer in Noida",
                'slug' => "best-astrologer-noida",
                'excerpt' => "Indian culture incorporates astrology as its main component since ages...",
                'content' => "<p>Indian culture incorporates astrology as its main component since ages. Astrology helps people to achieve better understanding in crucial life choices, wedding planning, and career advancement. Pt. Dhiraj Baluni has been serving the Noida community with authentic Vedic astrology services for over 25 years.</p><p>Finding a trusted guide in astrology is critical. Authenticity, certified qualifications (like ICAS certification), and a pure intention to guide clients towards happiness are what make Pt. Dhiraj Baluni the premier choice in Noida Sector 75 and surrounding NCR regions.</p>",
                'thumb_icon' => "🏡",
                'thumb_gradient' => "teal-mist,gold-pale",
                'category' => "Vastu",
                'view_count' => 98,
                'published_at' => now(),
            ],
            [
                'id' => 3,
                'title' => "Unlock Success with Business Astrology",
                'slug' => "business-astrology",
                'excerpt' => "Ancient astrology can significantly contribute to your business success...",
                'content' => "<p>In today's dynamic world, business requires proper strategy, market analysis, and informative choices. Vedic astrology provides insights into favorable timing, partnership compatibility, and financial trends based on planetary positions.</p><p>Whether to start a new venture or wait, which industry aligns with your birth chart (e.g. iron, textiles, real estate, software), and identifying the right business partners can all be guided by analyzing the 7th and 10th houses of your horoscope.</p>",
                'thumb_icon' => "💼",
                'thumb_gradient' => "gold-pale,saffron-mist",
                'category' => "Business",
                'view_count' => 120,
                'published_at' => now(),
            ],
            [
                'id' => 4,
                'title' => "Expert Horoscope Analysis Services",
                'slug' => "horoscope-analysis",
                'excerpt' => "Astrology has been indispensable for thousands of years, providing deep insights...",
                'content' => "<p>Astrology has been an indispensable part of human life for thousands of years by helping to promote deep insights into one's character, fate, and happenings in life.</p><p>A proper horoscope analysis provides a roadmap of your life's journey, indicating major trends in health, wealth, relationships, and spiritual realization. Through detailed analysis of Dasha systems and planetary transits, we help you prepare for what lies ahead.</p>",
                'thumb_icon' => "📊",
                'thumb_gradient' => "maroon-mist,teal-mist",
                'category' => "Horoscope",
                'view_count' => 84,
                'published_at' => now(),
            ],
            [
                'id' => 5,
                'title' => "Best Vastu Consultant in Noida",
                'slug' => "vastu-consultant-noida",
                'excerpt' => "Your all-in-one provider for Vastu, astrology, and pooja services...",
                'content' => "<p>Astro Vastu Puja is your all-in-one Vastu consultant, astrology, and pooja services provider in Noida, Delhi, and Ghaziabad.</p><p>Vastu Shastra balances the five elements (Panchbhoot) to create peace, health and prosperity. Our solutions are practical and avoid structural demolition, focusing on color therapy, metallic energy adjusters, and geometric alignments instead.</p>",
                'thumb_icon' => "🏡",
                'thumb_gradient' => "teal-mist,saffron-mist",
                'category' => "Vastu",
                'view_count' => 112,
                'published_at' => now(),
            ]
        ];
        foreach ($blogs as $b) {
            Blog::updateOrCreate(['id' => $b['id']], $b);
        }

        // 8. Banners
        $banners = [
            [ 'id' => 1, 'title' => "Numerology", 'image_url' => "images/banner-numerology.png", 'link_url' => "services.html?category=gems-numerology", 'page_slug' => 'home' ],
            [ 'id' => 2, 'title' => "Astrology", 'image_url' => "images/banner-astrology-en.png", 'link_url' => "services.html?category=astrology", 'page_slug' => 'home' ],
            [ 'id' => 3, 'title' => "Vastu Shastra", 'image_url' => "images/banner-vastu-en.png", 'link_url' => "services.html?category=vastu", 'page_slug' => 'home' ],
            [ 'id' => 4, 'title' => "Karmkand", 'image_url' => "images/banner-karmkand.png", 'link_url' => "services.html?category=pooja-path", 'page_slug' => 'home' ]
        ];
        foreach ($banners as $ba) {
            Banner::updateOrCreate(['id' => $ba['id']], $ba);
        }

        // 9. Horoscopes
        $horoscopes = [
            [ 'zodiac_sign' => "Aries", 'symbol' => "♈", 'daily_forecast' => "Today brings positive energy for Aries. Focus on your goals and trust the cosmic alignment." ],
            [ 'zodiac_sign' => "Taurus", 'symbol' => "♉", 'daily_forecast' => "Today brings positive energy for Taurus. Focus on your goals and trust the cosmic alignment." ],
            [ 'zodiac_sign' => "Gemini", 'symbol' => "♊", 'daily_forecast' => "Today brings positive energy for Gemini. Focus on your goals and trust the cosmic alignment." ],
            [ 'zodiac_sign' => "Cancer", 'symbol' => "♋", 'daily_forecast' => "Today brings positive energy for Cancer. Focus on your goals and trust the cosmic alignment." ],
            [ 'zodiac_sign' => "Leo", 'symbol' => "♌", 'daily_forecast' => "Today brings positive energy for Leo. Focus on your goals and trust the cosmic alignment." ],
            [ 'zodiac_sign' => "Virgo", 'symbol' => "♍", 'daily_forecast' => "Today brings positive energy for Virgo. Focus on your goals and trust the cosmic alignment." ],
            [ 'zodiac_sign' => "Libra", 'symbol' => "♎", 'daily_forecast' => "Today brings positive energy for Libra. Focus on your goals and trust the cosmic alignment." ],
            [ 'zodiac_sign' => "Scorpio", 'symbol' => "♏", 'daily_forecast' => "Today brings positive energy for Scorpio. Focus on your goals and trust the cosmic alignment." ],
            [ 'zodiac_sign' => "Sagittarius", 'symbol' => "♐", 'daily_forecast' => "Today brings positive energy for Sagittarius. Focus on your goals and trust the cosmic alignment." ],
            [ 'zodiac_sign' => "Capricorn", 'symbol' => "♑", 'daily_forecast' => "Today brings positive energy for Capricorn. Focus on your goals and trust the cosmic alignment." ],
            [ 'zodiac_sign' => "Aquarius", 'symbol' => "♒", 'daily_forecast' => "Today brings positive energy for Aquarius. Focus on your goals and trust the cosmic alignment." ],
            [ 'zodiac_sign' => "Pisces", 'symbol' => "♓", 'daily_forecast' => "Today brings positive energy for Pisces. Focus on your goals and trust the cosmic alignment." ]
        ];
        foreach ($horoscopes as $index => $h) {
            Horoscope::updateOrCreate(['id' => $index + 1], $h);
        }

        // 10. Inquiries
        $inquiries = [
            [ 'id' => 1, 'full_name' => "Rajesh Kumar", 'phone' => "9876543210", 'email' => "rajesh@gmail.com", 'concern' => "Need matching for daughter", 'form_type' => "Consultation", 'status' => "New" ],
            [ 'id' => 2, 'full_name' => "Amit Patel", 'phone' => "9911223344", 'email' => "amit@yahoo.com", 'concern' => "Vastu check for new office in Sector 62", 'form_type' => "Contact", 'status' => "Contacted" ]
        ];
        foreach ($inquiries as $i) {
            Inquiry::updateOrCreate(['id' => $i['id']], $i);
        }

        // 11. FAQs
        $faqs = [
            [ 'id' => 1, 'question' => "क्या आपके साथ रिश्तों से संबंधित समस्याएं हैं? / Are you suffering from relationship problems?", 'answer' => "जी हां, हम वैदिक ज्योतिष द्वारा आपके रिश्तों में समस्याओं का समाधान कर सकते हैं, ताकि आप अपने संबंधों को बेहतर बना सकें। Yes, through Vedic astrology we can identify the root causes of relationship issues and provide effective remedies.", 'sort_order' => 1 ],
            [ 'id' => 2, 'question' => "विवाह से संबंधित प्रश्न? / Marriage-related queries?", 'answer' => "We provide detailed Kundli matching (Ashtakoot Milan), Mangal Dosh analysis, and muhurat selection for marriages. हम विवाह के लिए कुंडली मिलान, मांगलिक दोष विश्लेषण, और शुभ मुहूर्त का चयन करते हैं।", 'sort_order' => 2 ],
            [ 'id' => 3, 'question' => "क्या आप व्यावसायिक समस्याओं से जूझ रहे हैं? / Business problems?", 'answer' => "Astrology can guide you on the right time for business expansion, partnerships, and investments. हम व्यवसाय के लिए शुभ समय, साझेदारी और निवेश के बारे में मार्गदर्शन प्रदान करते हैं।", 'sort_order' => 3 ],
            [ 'id' => 4, 'question' => "नकारात्मक ऊर्जा हटाना और बुरी नजर? / Negative energy removal?", 'answer' => "Through Vedic rituals and specific mantras, we can help remove negative energy and evil eye effects from your life and home. वैदिक अनुष्ठानों और विशेष मंत्रों द्वारा नकारात्मक ऊर्जा और बुरी नजर को दूर किया जा सकता है।", 'sort_order' => 4 ],
            [ 'id' => 5, 'question' => "How can I book an online pooja?", 'answer' => "You can book any pooja online through our consultation form or by calling +91 98683 40066 or WhatsApp. We perform poojas both in-person (Noida/Delhi NCR) and provide guidance for remote poojas.", 'sort_order' => 5 ],
            [ 'id' => 6, 'question' => "Do you provide services outside India?", 'answer' => "Yes! We serve clients in 100+ countries through video calls, phone consultations, and WhatsApp. All astrological analysis, Vastu consultation, and gem recommendations can be done remotely.", 'sort_order' => 6 ]
        ];
        foreach ($faqs as $f) {
            Faq::updateOrCreate(['id' => $f['id']], $f);
        }

        // 12. Pages
        $pages = [
            [
                'id' => 1,
                'title' => "About Us",
                'slug' => "about",
                'content' => "<p>Pt. Dhiraj Baluni has a great interest in Spiritualism, Occult Sciences, Astrology, Karmkanda and other religious rituals since the time of his late Grandfather Pt. Narendra Sharma. He studied Jyotish Praveen and Jyotish Visharadh from ICAS under the guidance of late Shri M.N. Kedar and Pradeep Chaturvedi.</p>"
            ],
            [
                'id' => 2,
                'title' => "Contact Us",
                'slug' => "contact",
                'content' => "<p>We'd love to hear from you. Fill out the form or reach us via phone or WhatsApp.</p>"
            ],
            [
                'id' => 6,
                'title' => "Our Services",
                'slug' => "services",
                'content' => "<p>Comprehensive astrology, Vastu, pooja path, gem stone and numerology services.</p>"
            ],
            [
                'id' => 7,
                'title' => "Gallery",
                'slug' => "gallery",
                'content' => "<p>Glimpses from our pooja ceremonies and consultations.</p>"
            ],
            [
                'id' => 8,
                'title' => "Blog & Insights",
                'slug' => "blog",
                'content' => "<p>Articles, tips and spiritual insights from Vedic wisdom.</p>"
            ]
        ];
        foreach ($pages as $p) {
            Page::updateOrCreate(['id' => $p['id']], $p);
        }

        // 13. Dynamic Landing Page (Vastu Consultant)
        $vastuPage = Page::updateOrCreate(
            ['slug' => 'vastu-consultant'],
            [
                'id' => 3,
                'title' => "Vastu Consultant",
                'seo_tags' => "<meta name='description' content='Best Vastu Shastra Consultant in Noida and Delhi NCR. Balance home and office energies with zero demolition.'>"
            ]
        );

        // Delete existing sections to avoid duplicates when running seeds multiple times
        $vastuPage->sections()->delete();

        // Create Sections
        $sections = [
            [
                'type' => 'hero',
                'title' => "Authentic Vastu Shastra Consultant",
                'subtitle' => "Balance the Five Elements (Panchbhootas)",
                'content' => "Professional Vastu analysis for houses, flats, offices, and plots by Pt. Dhiraj Baluni. Restoring cosmic harmony without any structural demolition.",
                'image_url' => "images/banner-vastu-en.png",
                'button_text' => "Book Consultation",
                'button_link' => "#contact_form",
                'sort_order' => 1
            ],
            [
                'type' => 'rich_text',
                'title' => "Why Vastu Matters for Your Space",
                'subtitle' => "Scientific Vedic Architecture",
                'content' => "<p>Vastu Shastra is the traditional Indian science of architecture and spatial design. By balancing the five key elements—Earth, Water, Fire, Air, and Space—Vastu aligns your living and working environments with cosmic energies to promote health, prosperity, and happiness.</p><p>We specialize in practical Vastu adjustments using color therapy, metal strips, pyramid energizers, and geo-magnetic alignments, ensuring zero demolition of your existing structures.</p>",
                'image_url' => "images/banner-vastu-en.png",
                'sort_order' => 2
            ],
            [
                'type' => 'features_three_col',
                'title' => "Our Vastu Consulting Pillars",
                'subtitle' => "Practical & Scientific Approach",
                'content' => "Zero Demolition — We correct energetic imbalances using metals, colors, and geometric alignments without breaking walls.\n\nResidential Vastu — Detailed layout analysis of entrance, kitchen, bedroom, and toilets for absolute peace of mind.\n\nCommercial Vastu — Strategic direction positioning for offices, factories, and retail shops to boost business growth and profits.",
                'sort_order' => 3
            ],
            [
                'type' => 'services_grid',
                'title' => "Explore Other Vedic Solutions",
                'subtitle' => "More than just Vastu",
                'sort_order' => 4
            ],
            [
                'type' => 'testimonials_slider',
                'title' => "Vastu Success Stories",
                'subtitle' => "Client Testimonials",
                'sort_order' => 5
            ],
            [
                'type' => 'contact_form',
                'title' => "Book Vastu site audit",
                'subtitle' => "Get In Touch Today",
                'sort_order' => 6
            ]
        ];

        foreach ($sections as $s) {
            $vastuPage->sections()->create($s);
        }

        // 14. Privacy Policy Page
        $privacyPage = Page::updateOrCreate(
            ['slug' => 'privacy-policy'],
            [
                'id' => 4,
                'title' => "Privacy Policy",
                'seo_tags' => "<meta name='description' content='Privacy Policy and data practices of Astro Vastu Pooja.'>"
            ]
        );
        $privacyPage->sections()->delete();
        $privacyPage->sections()->create([
            'type' => 'hero',
            'title' => "Privacy Policy",
            'subtitle' => "Legal & Data Protection",
            'content' => "Effective Date: July 27, 2026. Learn how we handle your personal information and birth details with absolute confidentiality.",
            'sort_order' => 1
        ]);
        $privacyPage->sections()->create([
            'type' => 'rich_text',
            'title' => "How We Protect Your Personal Information",
            'subtitle' => "Confidentiality Guidelines",
            'content' => "<p>Welcome to our website. We respect your privacy and are committed to protecting any personal data we collect from you. This Privacy Policy explains how we collect, use, and protect your information when you visit our website or use our services.</p>" .
                        "<h3>1. Information We Collect</h3>" .
                        "<p>We may collect personal information that you voluntarily provide to us when you fill out consultation forms, contact forms, or send inquiries. This information may include:</p>" .
                        "<ul>" .
                        "<li>Name, Email Address, and Phone Number</li>" .
                        "<li>Birth Details (Date of Birth, Time of Birth, Place of Birth, Gender) for astrological calculation purposes</li>" .
                        "<li>Any personal concerns or queries you choose to share with us</li>" .
                        "</ul>" .
                        "<h3>2. How We Use Your Information</h3>" .
                        "<p>We use the collected information for the following purposes:</p>" .
                        "<ul>" .
                        "<li>To analyze horoscopes and provide accurate consultation answers</li>" .
                        "<li>To respond to your messages, questions, and scheduling requests</li>" .
                        "<li>To maintain business records and improve our customer support</li>" .
                        "<li>To send periodic service updates (only if you have opted in)</li>" .
                        "</ul>" .
                        "<h3>3. Confidentiality and Security</h3>" .
                        "<p>Your birth details and personal inquiries are handled with <strong>100% confidentiality</strong>. We implement appropriate technical security measures to protect your data. We do not sell, rent, or trade your personal details with third-party marketing companies.</p>" .
                        "<h3>4. Cookies</h3>" .
                        "<p>We may use cookies on our website to enhance user experience, remember user preferences, and analyze website traffic. You can adjust your browser settings to refuse cookies, though some website features may not function optimally as a result.</p>" .
                        "<h3>5. Contact Us</h3>" .
                        "<p>If you have any questions or concerns regarding this Privacy Policy, please contact us.</p>",
            'sort_order' => 2
        ]);

        // 15. Terms and Conditions Page
        $termsPage = Page::updateOrCreate(
            ['slug' => 'terms-and-conditions'],
            [
                'id' => 5,
                'title' => "Terms & Conditions",
                'seo_tags' => "<meta name='description' content='Terms and Conditions and rules of use for Astro Vastu Pooja.'>"
            ]
        );
        $termsPage->sections()->delete();
        $termsPage->sections()->create([
            'type' => 'hero',
            'title' => "Terms & Conditions",
            'subtitle' => "Terms of Use & Agreement",
            'content' => "Effective Date: July 27, 2026. Please read these terms carefully before accessing our website or booking our Vedic services.",
            'sort_order' => 1
        ]);
        $termsPage->sections()->create([
            'type' => 'rich_text',
            'title' => "Rules and Legal Agreements",
            'subtitle' => "Terms of Service Guidelines",
            'content' => "<p>Welcome to our website. By accessing our website and utilizing our services, you agree to comply with and be bound by the following Terms and Conditions. Please review them carefully.</p>" .
                        "<h3>1. Astrological Consultations Disclaimer</h3>" .
                        "<p>Astrology, Vastu, and Pooja services provided on this website are based on traditional Vedic systems. By booking a consultation, you understand that:</p>" .
                        "<ul>" .
                        "<li>Astrology is a guide and is subjective. Outcomes depend on multiple planetary and personal factors.</li>" .
                        "<li>Our predictions and guidance are not a substitute for professional legal, medical, financial, or psychological advice.</li>" .
                        "<li>We do not guarantee 100% accuracy of predictions, as interpretation can vary, and personal choices play a critical role in one's life.</li>" .
                        "</ul>" .
                        "<h3>2. User Conduct</h3>" .
                        "<p>You agree to provide true, accurate, and complete information (such as birth dates, time, and location) when requesting consultations. Providing false information may lead to inaccurate astrological readings for which we are not responsible.</p>" .
                        "<h3>3. Booking and Payment</h3>" .
                        "<p>All consultation bookings and Pooja requests are subject to confirmation. Payments for premium services must be made in advance. Cancellation and refund policies for services will be detailed during your booking process.</p>" .
                        "<h3>4. Intellectual Property</h3>" .
                        "<p>The text, images, logo, layout, and content of this website are the intellectual property of our company. You may not copy, reproduce, or redistribute any materials without explicit written permission.</p>" .
                        "<h3>5. Limitation of Liability</h3>" .
                        "<p>Under no circumstances shall our website or Pt. Dhiraj Baluni be liable for any direct, indirect, incidental, or consequential damages resulting from the use or inability to use our website resources or consultation services.</p>" .
                        "<h3>6. Governing Law</h3>" .
                        "<p>These terms shall be governed by and construed in accordance with the laws of India. Any legal disputes arising from the use of our services shall be subject to the exclusive jurisdiction of the courts of Noida/Delhi NCR.</p>",
            'sort_order' => 2
        ]);

        // 16. About Us Page Sections
        $aboutPage = Page::where('slug', 'about')->first();
        if ($aboutPage) {
            $aboutPage->sections()->delete();
            
            // Section 1: Hero
            $aboutPage->sections()->create([
                'type' => 'hero',
                'title' => "Meet Pt. Dhiraj Baluni",
                'subtitle' => "About Us",
                'content' => "Best Online Astrologer in India — 29+ Years of Vedic Mastery — Since 1997",
                'image_url' => "images/banner-about.jpg",
                'sort_order' => 1
            ]);

            // Section 2: Legacy
            $aboutPage->sections()->create([
                'type' => 'about_legacy',
                'title' => "From a Revered Brahmin Family",
                'subtitle' => "Legacy of Vedic Wisdom",
                'content' => "<p>Pt. Dhiraj Baluni has a great interest in Spiritualism, Occult Sciences, Astrology, Karmkanda and other religious rituals since the time of his late Grandfather Pt. Narendra Sharma. He studied Jyotish Praveen and Jyotish Visharadh from ICAS under the guidance of late Shri M.N. Kedar and Pradeep Chaturvedi.</p>",
                'sort_order' => 2
            ]);

            // Section 3: Values
            $aboutPage->sections()->create([
                'type' => 'features_three_col',
                'title' => "Vedic Philosophy & Core Values",
                'subtitle' => "Our Pillars",
                'content' => "Vedic Purity (शुद्धता) — We perform all calculations and pooja services strictly according to authentic Parashara and Vedic principles without diluting sacred mantras.\n\nPractical Remedies (सरल उपाय) — Our Vastu solutions avoid structural demolition. We focus on natural energy adjusters, color therapy, gemstone recommendation, and mantras.\n\nAbsolute Confidentiality — All consultations, birth charts, family problems, and spiritual healing services remain 100% confidential under our Vedic ethics.",
                'sort_order' => 3
            ]);

            // Section 4: Credentials
            $aboutPage->sections()->create([
                'type' => 'about_credentials',
                'title' => "Certified Vedic Mastery",
                'subtitle' => "Credentials",
                'content' => "Pt. Dhiraj Baluni studied under late Shri M.N. Kedar and Pradeep Chaturvedi, earning credentials from the Indian Council of Astrological Sciences (ICAS). With decades of dedicated research, his mastery ensures professional-grade consultations.",
                'sort_order' => 4
            ]);
        }

        // 17. Services Page Sections
        $servicesPage = Page::where('slug', 'services')->first();
        if ($servicesPage) {
            $servicesPage->sections()->delete();
            $servicesPage->sections()->create([
                'type' => 'hero',
                'title' => "Vedic Solutions for Every Aspect of Life",
                'subtitle' => "Our Services",
                'content' => "Comprehensive astrology, Vastu, pooja path, gem stone and numerology services by Pt. Dhiraj Baluni — 29+ years of Vedic mastery",
                'image_url' => "images/banner-services.jpg",
                'sort_order' => 1
            ]);
        }

        // 18. Gallery Page Sections
        $galleryPage = Page::where('slug', 'gallery')->first();
        if ($galleryPage) {
            $galleryPage->sections()->delete();
            $galleryPage->sections()->create([
                'type' => 'hero',
                'title' => "Sacred Moments Gallery",
                'subtitle' => "Gallery",
                'content' => "Glimpses from our pooja ceremonies, Vastu audits, and Vedic astrology consultations.",
                'image_url' => "images/banner-gallery.jpg",
                'sort_order' => 1
            ]);
        }

        // 19. Blog Page Sections
        $blogPage = Page::where('slug', 'blog')->first();
        if ($blogPage) {
            $blogPage->sections()->delete();
            $blogPage->sections()->create([
                'type' => 'hero',
                'title' => "Vedic Knowledge Hub",
                'subtitle' => "Blog & Insights",
                'content' => "Sacred articles, remediation tips, and spiritual guidance written by Pt. Dhiraj Baluni.",
                'image_url' => "images/banner-blog.jpg",
                'sort_order' => 1
            ]);
        }

        // 20. Contact Page Sections
        $contactPage = Page::where('slug', 'contact')->first();
        if ($contactPage) {
            $contactPage->sections()->delete();
            $contactPage->sections()->create([
                'type' => 'hero',
                'title' => "Get In Touch",
                'subtitle' => "Contact Us",
                'content' => "Have questions or want to book a personal consultation or Vastu site audit? We are here to help.",
                'image_url' => "images/banner-contact.jpg",
                'sort_order' => 1
            ]);
        }
    }
}
