// Central data store for AstroVastuPooja static website

const SITE_SETTINGS = {
    SiteName: "AstroVastuPooja",
    Phone: "+91 98683 40066",
    PhoneRaw: "919868340066",
    Email: "shiv.astro@yahoo.com",
    WhatsApp: "919868340066",
    Address: "Shop No 21, Spectrum Mall, Phase 1 Sector 75, Noida (Inside Malhotra Jewels)",
    GuruName: "Pt. Dhiraj Baluni",
    ExperienceYears: "29",
    FacebookUrl: "https://www.facebook.com/profile.php?id=61588491608493&locale=hi_IN",
    InstagramUrl: "https://www.instagram.com/AstroVastuPooja/",
    TwitterUrl: "https://x.com/Dhir28481Prasad",
    LinkedInUrl: "https://www.linkedin.com/feed/",
    HeroBadge: "Best Astrologer in Noida — Trusted by 10,000+ Clients",
    HeroTitle: "Reshape Your Life Through Vedic Astrology, Vastu & Sacred Pooja",
    HeroQuote: "Don't lose hope — happiness can come again in your life",
    HeroDescription: "Pt. Dhiraj Baluni brings 29+ years of mastery in Vedic astrology, Vastu Shastra, and Karmkand rituals. Get in-depth horoscope analysis with personalized remedies.",
    HeroTrust1: "29+ Years Experience",
    HeroTrust2: "ICAS Certified",
    HeroTrust3: "Online & In-Person",
    AboutShort: "Belongs to a revered Brahmin family. Studied Jyotish Praveen and Jyotish Visharadh from ICAS under the guidance of renowned astrologers late Shri M.N. Kedar and Pradeep Chaturvedi.",
    StatGems: "50",
    StatPoojas: "10000",
    StatCountries: "100",
    CtaTitle: "We Will Transform Your Life & Give You the Best Solution",
    CtaSubtitle: "Talk to Pt. Dhiraj Baluni and get your problems solved today",
    FooterDesc: "The most reliable destination for Vedic Astrology, Vastu Shastra, Karmkand rituals and Gem consultation. Trusted by 10,000+ clients across 100+ countries."
};

const SERVICE_CATEGORIES = [
    { id: 1, name: "Astrology Services", nameHindi: "ज्योतिष सेवाएं", slug: "astrology", icon: "🔮", colorClass: "saffron-mist", sortOrder: 1 },
    { id: 2, name: "Pooja Path Services", nameHindi: "पूजा पाठ सेवाएं", slug: "pooja-path", icon: "🔔", colorClass: "teal-mist", sortOrder: 2 },
    { id: 3, name: "Vastu Shastra", nameHindi: "वास्तु शास्त्र", slug: "vastu", icon: "🏡", colorClass: "gold-pale", sortOrder: 3 },
    { id: 4, name: "Gems & Numerology", nameHindi: "रत्न और अंक ज्योतिष", slug: "gems-numerology", icon: "💎", colorClass: "maroon-mist", sortOrder: 4 }
];

const SERVICES = [
    // Astrology Services
    {
        id: 1,
        categoryId: 1,
        title: "Horoscope",
        titleHindi: "जन्म कुंडली",
        shortDescription: "Complete birth chart analysis and 10-year predictions",
        fullDescription: "ज्योतिष शास्त्र एक प्राचीन वेदांग है, जिसे 'वेद का चक्षु' कहा गया है। यह ज्ञान ऋषि भृगु और पराशर द्वारा प्रदान किया गया था। ज्योतिष शास्त्र ग्रहों, नक्षत्रों और अन्य खगोलीय पिंडों की स्थिति और उनके प्रभावों का अध्ययन करता है। Get in-depth horoscope analysis with 10-year predictions covering career, marriage, health, wealth and all life aspects.",
        slug: "horoscope",
        icon: "🔮",
        colorClass: "saffron-mist",
        sortOrder: 1,
        isFeatured: true,
        showOnHome: true,
        isActive: true
    },
    {
        id: 2,
        categoryId: 1,
        title: "Marriage Matching",
        titleHindi: "विवाह कुंडली मिलान",
        shortDescription: "Kundli matching for compatibility and harmony",
        fullDescription: "विवाह संस्कार 16 संस्कारो में से एक मुख्य संस्कार है। भारतीय संस्कृति में विवाह के दौरान की जाने वाली पूजा एक धार्मिक प्रक्रिया है। We perform detailed Kundli matching (Ashtakoot Milan) to ensure compatibility between partners for a harmonious married life.",
        slug: "marriage-matching",
        icon: "💑",
        colorClass: "maroon-mist",
        sortOrder: 2,
        isFeatured: true,
        showOnHome: true,
        isActive: true
    },
    {
        id: 3,
        categoryId: 1,
        title: "Educational Astrology",
        titleHindi: "शिक्षा से संबंधित ज्योतिषीय सलाह",
        shortDescription: "Career and education path guidance through astrology",
        fullDescription: "शिक्षा एक ऐसी प्रक्रिया है जिसके माध्यम से व्यक्ति ज्ञान, कौशल, मूल्यों, और विचारों को अर्जित करता है। Astrology helps identify the best educational streams, competitive exam timing, and career paths based on your birth chart.",
        slug: "educational-astrology",
        icon: "🎓",
        colorClass: "teal-mist",
        sortOrder: 3,
        isFeatured: false,
        showOnHome: true,
        isActive: true
    },
    {
        id: 4,
        categoryId: 1,
        title: "Business & Career",
        titleHindi: "व्यवसाय एवं कैरियर से संबंधित सलाह",
        shortDescription: "Business timing, job changes and career direction",
        fullDescription: "वर्तमान समय मे यह प्रश्न सबसे ज्यादा पूछा जाने वाला प्रश्न है कि नौकरी करनी चाहिए या बिजनेस करे, या कुंडली के अनुसार कौन सा बिजनेस करना चाहिए कब करना चाहिए। Get expert guidance on business partnerships, expansion timing, and career transitions.",
        slug: "business-career",
        icon: "💼",
        colorClass: "gold-pale",
        sortOrder: 4,
        isFeatured: false,
        showOnHome: true,
        isActive: true
    },
    {
        id: 5,
        categoryId: 1,
        title: "Wealth & Finance",
        titleHindi: "धन आगमन ज्योतिषीय सलाह",
        shortDescription: "Financial prosperity and wealth accumulation guidance",
        fullDescription: "मानव जीवन मे जीविकोपार्जन के लिए धन या लक्ष्मी की परम आवश्यकता होती है। बिना धन के दरिद्रता का वास होता है। Vedic astrology identifies wealth yogas in your chart and provides remedies to enhance financial prosperity.",
        slug: "wealth-finance",
        icon: "💰",
        colorClass: "saffron-mist",
        sortOrder: 5,
        isFeatured: false,
        showOnHome: true,
        isActive: true
    },
    {
        id: 6,
        categoryId: 1,
        title: "Property & Real Estate",
        titleHindi: "संपत्ति संबंधित प्रश्न",
        shortDescription: "Property and land astrological advice",
        fullDescription: "भू सम्पत्ति, अचल संपत्ति या पैतृक संपत्ति के संबंध में ज्योतिषीय विश्लेषण — जन्म कुंडली और प्रारब्ध कर्मानुसार हमारी कुंडली निर्मित होती है। Get guidance on property purchase timing, land disputes, and real estate investments.",
        slug: "property-real-estate",
        icon: "🏠",
        colorClass: "teal-mist",
        sortOrder: 6,
        isFeatured: false,
        showOnHome: true,
        isActive: true
    },
    {
        id: 7,
        categoryId: 1,
        title: "Court Case & Disputes",
        titleHindi: "कोर्ट केस से संबंधित प्रश्न",
        shortDescription: "Legal disputes and court case astrological solutions",
        fullDescription: "मंगल ज्योतिष में ऊर्जा का कारक है। कई बार इसका अशुभ प्रभाव झगड़ों और कोर्ट केस का मुख्य कारण हो सकता है। यह आक्रामकता और टकराव को बढ़ाता है। Get astrological remedies for ongoing litigation, property disputes, and divorce cases.",
        slug: "court-case",
        icon: "⚖️",
        colorClass: "maroon-mist",
        sortOrder: 7,
        isFeatured: false,
        showOnHome: true,
        isActive: true
    },
    {
        id: 8,
        categoryId: 1,
        title: "Auspicious Time Selection",
        titleHindi: "शुभ मुहूर्त चयन",
        shortDescription: "Muhurat selection for ceremonies, business launches & events",
        fullDescription: "शुभ मुहूर्त का शाब्दिक अर्थ है किसी कार्य को प्रारंभ करने के लिए एक ऐसा समय जो ज्योतिषीय दृष्टि से शुभ और लाभकारी हो। यह वह समय होता है जब ग्रहों और नक्षत्रों की स्थिति अनुकूल होती है। We provide muhurat for marriages, grih pravesh, business launches, and all important ceremonies.",
        slug: "auspicious-time",
        icon: "🕐",
        colorClass: "gold-pale",
        sortOrder: 8,
        isFeatured: false,
        showOnHome: true,
        isActive: true
    },

    // Pooja Path Services
    {
        id: 9,
        categoryId: 2,
        title: "Rudra Abhishek",
        titleHindi: "रुद्राभिषेक / शिव पूजा",
        shortDescription: "Sacred Shiva pooja for blessings and obstacle removal",
        fullDescription: "रुद्राभिषेक भगवान शिव की परम प्रिय पूजा है। यह भगवान शिव को पाने का एक अत्यंत पवित्र और शक्तिशाली माध्यम है। This sacred Shiva pooja removes obstacles, brings peace, and blesses devotees with health, wealth, and spiritual growth.",
        slug: "rudra-abhishek",
        icon: "🔔",
        colorClass: "teal-mist",
        sortOrder: 1,
        isFeatured: false,
        showOnHome: false,
        isActive: true
    },
    {
        id: 10,
        categoryId: 2,
        title: "Durga Saptashati",
        titleHindi: "दुर्गा सप्तशती पूजा",
        shortDescription: "Powerful Durga pooja for divine protection and strength",
        fullDescription: "दुर्गा सप्तशती पाठ माँ दुर्गा की कृपा पाने के लिए एक अत्यंत पवित्र और शक्तिशाली साधना है। यह मार्कण्डेय पुराण का एक महत्वपूर्ण हिस्सा है, जिसमें देवी महात्म्य के 700 श्लोक हैं। इसे चंडी पाठ भी कहा जाता है।",
        slug: "durga-saptashati",
        icon: "🔔",
        colorClass: "saffron-mist",
        sortOrder: 2,
        isFeatured: false,
        showOnHome: false,
        isActive: true
    },
    {
        id: 11,
        categoryId: 2,
        title: "Satyanarayan Vrat & Pooja",
        titleHindi: "सत्यनारायण पूजा",
        shortDescription: "Vishnu pooja for prosperity, peace & harmony",
        fullDescription: "सत्यनारायण पूजा भगवान विष्णु की आराधना का एक अत्यंत पवित्र और शुभ पूजा विधि है। यह पूजा विशेष रूप से सुख, शांति, समृद्धि, और सौभाग्य की प्राप्ति के लिए की जाती है। Performed on auspicious occasions for divine blessings.",
        slug: "satyanarayan",
        icon: "🔔",
        colorClass: "gold-pale",
        sortOrder: 3,
        isFeatured: false,
        showOnHome: false,
        isActive: true
    },
    {
        id: 12,
        categoryId: 2,
        title: "Mangal Dosh Nivaran",
        titleHindi: "मांगलिक दोष निवारण पूजा",
        shortDescription: "Remedial pooja for Manglik Dosh in kundli",
        fullDescription: "मंगल दोष जिसे मांगलिक दोष भी कहा जाता है, ज्योतिष में एक महत्वपूर्ण ग्रह मंगल है जिसको सेनापति की संज्ञा प्राप्त है। अगर मंगल जन्म पत्रिका में अच्छे भाव मे योगकारक है तो जीवन मे बहुत उन्नति और सफलता देता है।",
        slug: "mangal-dosh",
        icon: "🔔",
        colorClass: "maroon-mist",
        sortOrder: 4,
        isFeatured: false,
        showOnHome: false,
        isActive: true
    },
    {
        id: 13,
        categoryId: 2,
        title: "Kaal Sarp Dosh Nivaran",
        titleHindi: "काल सर्प दोष निवारण पूजा",
        shortDescription: "Powerful remedy for Kaal Sarp Dosh effects",
        fullDescription: "कालसर्प दोष एक ऐसी ज्योतिषीय स्थिति है जो तब बनती है जब किसी व्यक्ति की कुंडली में सभी ग्रह राहु और केतु के बीच आ जाते हैं। इसे एक अशुभ योग माना जाता, जो व्यक्ति के जीवन में कठिनाइयाँ, बाधाएँ, और संकट ला सकता है।",
        slug: "kaal-sarp-dosh",
        icon: "🔔",
        colorClass: "teal-mist",
        sortOrder: 5,
        isFeatured: false,
        showOnHome: false,
        isActive: true
    },
    {
        id: 14,
        categoryId: 2,
        title: "Grih Pravesh",
        titleHindi: "गृह प्रवेश पूजा",
        shortDescription: "Housewarming ceremony and new home blessings",
        fullDescription: "सनातन धर्म मे गृह प्रवेश का बहुत बड़ा महत्व है। वास्तु शास्त्र के अनुसार जब भी हम नए घर मे प्रवेश करें तो कुछ विधान और नियमावली है। यदि हम उन नियमों का पालन करते है तो घर मे सुख, शांति, और समृद्धि का वास होता है।",
        slug: "grih-pravesh",
        icon: "🏡",
        colorClass: "saffron-mist",
        sortOrder: 6,
        isFeatured: false,
        showOnHome: false,
        isActive: true
    },
    {
        id: 15,
        categoryId: 2,
        title: "Birthday & Navgrah Pooja",
        titleHindi: "जन्म दिवस, नवग्रह पूजा",
        shortDescription: "Birthday blessings and planetary peace rituals",
        fullDescription: "जन्म दिवस पर पूजा का विशेष महत्व है क्योंकि यह दिन व्यक्ति के जीवन में नई ऊर्जा, सकारात्मकता और आध्यात्मिक उन्नति का प्रतीक होता है। जन्म दिवस पूजा से शांति, सुख, समृद्धि और सौभाग्य की प्राप्ति होती है।",
        slug: "birthday-navgrah",
        icon: "🎂",
        colorClass: "gold-pale",
        sortOrder: 7,
        isFeatured: false,
        showOnHome: false,
        isActive: true
    },
    {
        id: 16,
        categoryId: 2,
        title: "Marriage & Ring Ceremony",
        titleHindi: "विवाह, हल्दी, सगाई पूजा",
        shortDescription: "Complete wedding and engagement ritual services",
        fullDescription: "विवाह संस्कार 16 संस्कारो में से एक मुख्य संस्कार है। सगाई हिंदू संस्कृति में विवाह संस्कार की पहली महत्वपूर्ण रस्म मानी जाती है। यह रस्म वर और वधू के परिवारों के बीच रिश्ते को औपचारिक रूप से स्वीकार करने का प्रतीक है।",
        slug: "marriage-ceremony",
        icon: "💒",
        colorClass: "maroon-mist",
        sortOrder: 8,
        isFeatured: false,
        showOnHome: false,
        isActive: true
    },
    {
        id: 17,
        categoryId: 2,
        title: "Deepawali & Lakshmi Pooja",
        titleHindi: "दीपावली, लक्ष्मी पूजा",
        shortDescription: "Diwali celebrations and wealth pooja for Lakshmi blessings",
        fullDescription: "दीपावली हिंदू धर्म का एक प्रमुख पंच दिवसीय पर्व है। इसे प्रकाश का पर्व भी कहा जाता है। यह त्योहार अंधकार पर प्रकाश की, अज्ञान पर ज्ञान की और बुराई पर अच्छाई की विजय का प्रतीक है।",
        slug: "deepawali",
        icon: "🪔",
        colorClass: "teal-mist",
        sortOrder: 9,
        isFeatured: false,
        showOnHome: false,
        isActive: true
    },
    {
        id: 18,
        categoryId: 2,
        title: "Mahamrityunjay Mantra Jap",
        titleHindi: "महा मृत्युंजय जप",
        shortDescription: "Sacred chanting for health, protection and longevity",
        fullDescription: "महामृत्युंजय मंत्र हिंदू धर्म का एक अत्यंत शक्तिशाली और पवित्र मंत्र है। यह भगवान शिव की स्तुति और कृपा प्राप्त करने के लिए किया जाता है। इसे 'अमृत संजीवनी' मंत्र भी कहा जाता है।",
        slug: "mahamrityunjay",
        icon: "🔔",
        colorClass: "saffron-mist",
        sortOrder: 10,
        isFeatured: false,
        showOnHome: false,
        isActive: true
    },
    {
        id: 19,
        categoryId: 2,
        title: "Santan Gopal Mantra Jap",
        titleHindi: "संतान गोपाल मंत्र जप पूजा",
        shortDescription: "Pooja for child blessings and progeny",
        fullDescription: "यह मंत्र भगवान श्रीकृष्ण को समर्पित है और संतान प्राप्ति, संतान की रक्षा, और उनकी उन्नति के लिए जपा जाता है। यह गोपाल स्वरूप (बालकृष्ण) की आराधना के लिए है और इसे अत्यंत फलदायी माना गया है।",
        slug: "santan-gopal",
        icon: "🔔",
        colorClass: "gold-pale",
        sortOrder: 11,
        isFeatured: false,
        showOnHome: false,
        isActive: true
    },
    {
        id: 20,
        categoryId: 2,
        title: "Pinddan & Pitri Pooja",
        titleHindi: "पिंडदान, पितृ पूजा, गरुड़ पुराण पाठ",
        shortDescription: "Ancestral rites, Garud Puran Path and Pitri blessings",
        fullDescription: "हिंदू धर्म में पितरों (पूर्वजों) को श्रद्धांजलि और सम्मान देने की विशेष परंपरा है। इसे श्राद्ध कर्म, तर्पण, और पिंडदान के रूप में जाना जाता है। यह पूजा श्राद्ध पक्ष (पितृ पक्ष) के दौरान की जाती है।",
        slug: "pinddan",
        icon: "🔔",
        colorClass: "maroon-mist",
        sortOrder: 12,
        isFeatured: false,
        showOnHome: false,
        isActive: true
    },
    {
        id: 21,
        categoryId: 2,
        title: "Mundan Pooja",
        titleHindi: "चूड़ाकर्म संस्कार / मुंडन",
        shortDescription: "Sacred first head shaving ceremony for children",
        fullDescription: "चूड़ाकर्म संस्कार 16 संस्कारों में एक महत्वपूर्ण संस्कार है, जिसमें बच्चे के जन्म के बाल काटने (मुंडन) की विधि संपन्न की जाती है। इसे शारीरिक और आध्यात्मिक शुद्धि का प्रतीक माना जाता है।",
        slug: "mundan",
        icon: "🔔",
        colorClass: "teal-mist",
        sortOrder: 13,
        isFeatured: false,
        showOnHome: false,
        isActive: true
    },

    // Vastu
    {
        id: 22,
        categoryId: 3,
        title: "Home Vastu",
        titleHindi: "घर का वास्तु",
        shortDescription: "Residential Vastu analysis and corrections",
        fullDescription: "Create a balanced and positive environment in your home with professional Vastu Shastra services. We analyze room placement, directions, entrance positions, and energy flow to ensure health, prosperity, and harmony for your family.",
        slug: "home-vastu",
        icon: "🏠",
        colorClass: "teal-mist",
        sortOrder: 1,
        isFeatured: false,
        showOnHome: false,
        isActive: true
    },
    {
        id: 23,
        categoryId: 3,
        title: "Office & Factory Vastu",
        titleHindi: "ऑफिस, फैक्ट्री वास्तु",
        shortDescription: "Commercial space Vastu for business success",
        fullDescription: "Optimize your workplace energy with Vastu consultation for offices, factories, and commercial spaces. Proper Vastu alignment in business premises enhances productivity, employee harmony, and financial growth.",
        slug: "office-vastu",
        icon: "🏢",
        colorClass: "gold-pale",
        sortOrder: 2,
        isFeatured: false,
        showOnHome: false,
        isActive: true
    },
    {
        id: 24,
        categoryId: 3,
        title: "Plot Vastu",
        titleHindi: "भूखंड वास्तु",
        shortDescription: "Land and plot selection based on Vastu principles",
        fullDescription: "Before purchasing a plot or constructing a building, Vastu analysis of the land is essential. We evaluate plot shape, slope, surroundings, and directional alignment to ensure the land brings prosperity and positive energy.",
        slug: "plot-vastu",
        icon: "🌍",
        colorClass: "saffron-mist",
        sortOrder: 3,
        isFeatured: false,
        showOnHome: false,
        isActive: true
    },
    {
        id: 25,
        categoryId: 3,
        title: "Vastu Dosh Shanti",
        titleHindi: "वास्तु दोष शांति पूजा",
        shortDescription: "Vastu defect remedial pooja and corrections",
        fullDescription: "Vastu Shanti is performed to correct vaastu dosh (faults) and remove all defects if a house is not constructed according to Vastu Shastra. This puja improves health of family members, brings peace, and removes negative energy.",
        slug: "vastu-dosh",
        icon: "🔔",
        colorClass: "maroon-mist",
        sortOrder: 4,
        isFeatured: false,
        showOnHome: false,
        isActive: true
    },

    // Gems & Numerology
    {
        id: 26,
        categoryId: 4,
        title: "Gem Stone Consultation",
        titleHindi: "ज्योतिषीय रत्न सलाहकार",
        shortDescription: "Astrological gem selection for planetary balance and prosperity",
        fullDescription: "रत्न ज्योतिष एक विज्ञान है — हम ज्योतिषीय पद्धति द्वारा रत्नों का चयन करते है, जिसमें ग्रहों और नक्षत्रों के प्रभाव को संतुलित करने और जीवन के विभिन्न पहलुओं को सुधारने के लिए रत्नों का उपयोग किया जाता है।",
        slug: "gem-stone",
        icon: "💎",
        colorClass: "saffron-mist",
        sortOrder: 1,
        isFeatured: false,
        showOnHome: false,
        isActive: true
    },
    {
        id: 27,
        categoryId: 4,
        title: "Numerology",
        titleHindi: "अंक ज्योतिष",
        shortDescription: "Name and number analysis for success in life",
        fullDescription: "Discover how numbers influence your life and destiny. Our numerology services provide personalized insights into your strengths, challenges, and opportunities, helping you make informed decisions for a brighter future. Lucky numbers, name corrections, and business name suggestions.",
        slug: "numerology",
        icon: "🔢",
        colorClass: "teal-mist",
        sortOrder: 2,
        isFeatured: false,
        showOnHome: false,
        isActive: true
    }
];

const TESTIMONIALS = [
    { clientName: "Ram Sharma", location: "Noida, India", quote: "Simply amazing! Dhiraj ji is not just an astrologer — they are a true guide. Their readings are astonishingly accurate, and they provided practical, actionable advice. I felt heard and genuinely cared for.", initials: "RS", avatarColor: "saffron", rating: 5 },
    { clientName: "Shyam Sharma", location: "Delhi, India", quote: "As a skeptic, I was hesitant, but a friend convinced me. Their predictions have been shockingly accurate — he helped me understand my own patterns and potential. Highly recommended for deep guidance.", initials: "SS", avatarColor: "teal", rating: 5 },
    { clientName: "Bheem", location: "Ghaziabad, India", quote: "मैंने कई ज्योतिषियों से सलाह ली, लेकिन धीरज जी एक अलग लीग में हैं। उनकी भविष्यवाणियाँ लगातार सही साबित हुई हैं। वास्तव में एक प्रतिभाशाली व्यक्ति!", initials: "B", avatarColor: "maroon", rating: 5 },
    { clientName: "Radha", location: "India", quote: "अविश्वसनीय रूप से सटीक भविष्यवाणियाँ और अद्भुत रूप से सहायक! धीरज जी सबसे अच्छे हैं। हमेशा स्पष्ट, सहायक मार्गदर्शन प्रदान करते हैं।", initials: "R", avatarColor: "saffron", rating: 5 }
];

const GALLERY_ITEMS = [
    { title: "Pooja Ceremony", icon: "🙏", gradientColors: "saffron-mist,teal-mist", category: "Pooja", isSpan2: true, sortOrder: 1 },
    { title: "Rudra Abhishek", icon: "🔔", gradientColors: "teal-mist,gold-pale", category: "Pooja", sortOrder: 2 },
    { title: "Vastu Consultation", icon: "🏡", gradientColors: "gold-pale,saffron-mist", category: "Vastu", sortOrder: 3 },
    { title: "Gem Stones", icon: "💎", gradientColors: "maroon-mist,gold-pale", category: "Gems", sortOrder: 4 },
    { title: "Hawan Ceremony", icon: "🔥", gradientColors: "saffron-mist,maroon-mist", category: "Pooja", sortOrder: 5 },
    { title: "Horoscope Analysis", icon: "🔮", gradientColors: "teal-mist,saffron-mist", category: "Astrology", sortOrder: 6 },
    { title: "Marriage Pooja", icon: "💒", gradientColors: "maroon-mist,gold-pale", category: "Pooja", sortOrder: 7 },
    { title: "Navgrah Pooja", icon: "🌟", gradientColors: "gold-pale,teal-mist", category: "Pooja", sortOrder: 8 },
    { title: "Satyanarayan Pooja", icon: "🪔", gradientColors: "teal-mist,maroon-mist", category: "Pooja", sortOrder: 9 },
    { title: "Grih Pravesh", icon: "🏠", gradientColors: "saffron-mist,teal-mist", category: "Pooja", sortOrder: 10 }
];

const BLOG_POSTS = [
    {
        title: "Unlocking Your Destiny: The Power of Astrology",
        slug: "unlocking-your-destiny",
        excerpt: "Astrology holds the key to unlocking the mysteries of your future with precise predictions...",
        content: "<p>Astrology has traditionally been perceived as a directional force that determines the fate of an individual. Astrology helps to get clarity in all aspects of life, whether it is related to relationships, career, finance or personal growth.</p><p>At AstroVastuPooja, we provide in-depth analysis based on Vedic principles that can transform your understanding of life's challenges. Planets and stars exert a subtle influence on human psychology and life outcomes. By understanding this cosmic matrix, we can prepare better and seize the right opportunities.</p>",
        thumbIcon: "🔮",
        thumbGradient: "saffron-mist,gold-pale",
        category: "Astrology",
        publishedAt: "Jan 2025",
        viewCount: 145
    },
    {
        title: "Finding the Best Astrologer in Noida",
        slug: "best-astrologer-noida",
        excerpt: "Indian culture incorporates astrology as its main component since ages...",
        content: "<p>Indian culture incorporates astrology as its main component since ages. Astrology helps people to achieve better understanding in crucial life choices, wedding planning, and career advancement. Pt. Dhiraj Baluni has been serving the Noida community with authentic Vedic astrology services for over 25 years.</p><p>Finding a trusted guide in astrology is critical. Authenticity, certified qualifications (like ICAS certification), and a pure intention to guide clients towards happiness are what make Pt. Dhiraj Baluni the premier choice in Noida Sector 75 and surrounding NCR regions.</p>",
        thumbIcon: "🏡",
        thumbGradient: "teal-mist,gold-pale",
        category: "Vastu",
        publishedAt: "Jan 2025",
        viewCount: 98
    },
    {
        title: "Unlock Success with Business Astrology",
        slug: "business-astrology",
        excerpt: "Ancient astrology can significantly contribute to your business success...",
        content: "<p>In today's dynamic world, business requires proper strategy, market analysis, and informative choices. Vedic astrology provides insights into favorable timing, partnership compatibility, and financial trends based on planetary positions.</p><p>Whether to start a new venture or wait, which industry aligns with your birth chart (e.g. iron, textiles, real estate, software), and identifying the right business partners can all be guided by analyzing the 7th and 10th houses of your horoscope.</p>",
        thumbIcon: "💼",
        thumbGradient: "gold-pale,saffron-mist",
        category: "Business",
        publishedAt: "Jan 2025",
        viewCount: 120
    },
    {
        title: "Expert Horoscope Analysis Services",
        slug: "horoscope-analysis",
        excerpt: "Astrology has been indispensable for thousands of years, providing deep insights...",
        content: "<p>Astrology has been an indispensable part of human life for thousands of years by helping to promote deep insights into one's character, fate, and happenings in life.</p><p>A proper horoscope analysis provides a roadmap of your life's journey, indicating major trends in health, wealth, relationships, and spiritual realization. Through detailed analysis of Dasha systems and planetary transits, we help you prepare for what lies ahead.</p>",
        thumbIcon: "📊",
        thumbGradient: "maroon-mist,teal-mist",
        category: "Horoscope",
        publishedAt: "Dec 2024",
        viewCount: 84
    },
    {
        title: "Best Vastu Consultant in Noida",
        slug: "vastu-consultant-noida",
        excerpt: "Your all-in-one provider for Vastu, astrology, and pooja services...",
        content: "<p>Astro Vastu Puja is your all-in-one Vastu consultant, astrology, and pooja services provider in Noida, Delhi, and Ghaziabad.</p><p>Vastu Shastra balances the five elements (Panchbhoot) to create peace, health and prosperity. Our solutions are practical and avoid structural demolition, focusing on color therapy, metallic energy adjusters, and geometric alignments instead.</p>",
        thumbIcon: "🏡",
        thumbGradient: "teal-mist,saffron-mist",
        category: "Vastu",
        publishedAt: "Dec 2024",
        viewCount: 112
    }
];

const BANNERS = [
    {
        title: "Numerology",
        imageUrl: "images/banner-numerology.png",
        linkUrl: "services.html?category=gems-numerology"
    },
    {
        title: "Astrology",
        imageUrl: "images/banner-astrology-en.png",
        linkUrl: "services.html?category=astrology"
    },
    {
        title: "Vastu Shastra",
        imageUrl: "images/banner-vastu-en.png",
        linkUrl: "services.html?category=vastu"
    },
    {
        title: "Karmkand",
        imageUrl: "images/banner-karmkand.png",
        linkUrl: "services.html?category=pooja-path"
    }
];

const HOROSCOPES = [
    { zodiacSign: "Aries", symbol: "♈", dailyForecast: "Today brings positive energy for Aries. Focus on your goals and trust the cosmic alignment." },
    { zodiacSign: "Taurus", symbol: "♉", dailyForecast: "Today brings positive energy for Taurus. Focus on your goals and trust the cosmic alignment." },
    { zodiacSign: "Gemini", symbol: "♊", dailyForecast: "Today brings positive energy for Gemini. Focus on your goals and trust the cosmic alignment." },
    { zodiacSign: "Cancer", symbol: "♋", dailyForecast: "Today brings positive energy for Cancer. Focus on your goals and trust the cosmic alignment." },
    { zodiacSign: "Leo", symbol: "♌", dailyForecast: "Today brings positive energy for Leo. Focus on your goals and trust the cosmic alignment." },
    { zodiacSign: "Virgo", symbol: "♍", dailyForecast: "Today brings positive energy for Virgo. Focus on your goals and trust the cosmic alignment." },
    { zodiacSign: "Libra", symbol: "♎", dailyForecast: "Today brings positive energy for Libra. Focus on your goals and trust the cosmic alignment." },
    { zodiacSign: "Scorpio", symbol: "♏", dailyForecast: "Today brings positive energy for Scorpio. Focus on your goals and trust the cosmic alignment." },
    { zodiacSign: "Sagittarius", symbol: "♐", dailyForecast: "Today brings positive energy for Sagittarius. Focus on your goals and trust the cosmic alignment." },
    { zodiacSign: "Capricorn", symbol: "♑", dailyForecast: "Today brings positive energy for Capricorn. Focus on your goals and trust the cosmic alignment." },
    { zodiacSign: "Aquarius", symbol: "♒", dailyForecast: "Today brings positive energy for Aquarius. Focus on your goals and trust the cosmic alignment." },
    { zodiacSign: "Pisces", symbol: "♓", dailyForecast: "Today brings positive energy for Pisces. Focus on your goals and trust the cosmic alignment." }
];

// Initialize Local Storage if not present
if (!localStorage.getItem("avp_settings")) {
    localStorage.setItem("avp_settings", JSON.stringify(SITE_SETTINGS));
}
if (!localStorage.getItem("avp_services")) {
    localStorage.setItem("avp_services", JSON.stringify(SERVICES));
}
if (!localStorage.getItem("avp_testimonials")) {
    localStorage.setItem("avp_testimonials", JSON.stringify(TESTIMONIALS));
}
if (!localStorage.getItem("avp_blogs")) {
    localStorage.setItem("avp_blogs", JSON.stringify(BLOG_POSTS));
}
if (!localStorage.getItem("avp_inquiries")) {
    const initialInquiries = [
        { id: 1, fullName: "Rajesh Kumar", phone: "9876543210", email: "rajesh@gmail.com", concern: "Need matching for daughter", formType: "Consultation", status: "New", createdAt: "2026-07-14T08:00:00Z" },
        { id: 2, fullName: "Amit Patel", phone: "9911223344", email: "amit@yahoo.com", concern: "Vastu check for new office in Sector 62", formType: "Contact", status: "Contacted", createdAt: "2026-07-13T10:00:00Z" }
    ];
    localStorage.setItem("avp_inquiries", JSON.stringify(initialInquiries));
}

// Exposed helper functions to load active data from LocalStorage
const getDbSettings = () => JSON.parse(localStorage.getItem("avp_settings"));
const getDbServices = () => JSON.parse(localStorage.getItem("avp_services"));
const getDbTestimonials = () => JSON.parse(localStorage.getItem("avp_testimonials"));
const getDbBlogs = () => JSON.parse(localStorage.getItem("avp_blogs"));
const getDbInquiries = () => JSON.parse(localStorage.getItem("avp_inquiries"));

