<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/astrovastupooja/favicon.png">
    <title>Vastu Consultant in Delhi NCR | Home, Office & Plot Vastu</title>
    <meta name="description" content="Consult an experienced Vastu expert for home, office, factory and plot Vastu. Serving Delhi, Noida, Gurgaon, Ghaziabad and Greater Noida.">
    <link href="/astrovastupooja/css/bootstrap.min.css" rel="stylesheet">  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet"> 
      <link href="/astrovastupooja/css/main.css" rel="stylesheet">  
      <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PBP6T986');</script>
<!-- End Google Tag Manager -->

</head>
<body>


<header class="astro-header">

    <div class="container">

        <nav class="astro-navbar">

            <!-- Logo -->

            <a href="#" class="astro-logo">

                <img src="/astrovastupooja/images/logo.webp" alt="Logo">

            </a>

            <!-- Desktop Menu -->

            <ul class="astro-menu">

                <li><a href="#home">Home</a></li>

                <li><a href="#services">Services</a></li>

                <li><a href="#process">Process</a></li>

                <li><a href="#testimonial">Reviews</a></li>

                <li><a href="#faq">FAQ</a></li>

                <li>
                    <a href="https://wa.me/919868340066?text=Hello%20I%20want%20to%20book%20a%20Vastu%20Consultation." target="_blank" class="menu-btn">
                        Book Consultation
                    </a>
                </li>

            </ul>

            <!-- Mobile Toggle -->

            <button class="menu-toggle">

                <i class="bi bi-list"></i>

            </button>

        </nav>

    </div>

</header>

<!-- Overlay -->

<div class="menu-overlay"></div>

<!-- Mobile Menu -->

<div class="mobile-menu">

    <div class="mobile-header">

        <img src="/astrovastupooja/images/logo.webp" alt="">

        <button class="close-menu">

            <i class="bi bi-x-lg"></i>

        </button>

    </div>

    <ul>

        <li><a href="#home">Home</a></li>

        <li><a href="#services">Services</a></li>

        <li><a href="#process">Process</a></li>

        <li><a href="#testimonial">Reviews</a></li>

        <li><a href="#faq">FAQ</a></li>

        <li>

            <a href="https://wa.me/919868340066?text=Hello%20I%20want%20to%20book%20a%20Vastu%20Consultation." target="_blank" class="mobile-book">

                Book Consultation

            </a>

        </li>

    </ul>

</div>




<!-- VASTU HERO SECTION -->
<section class="vcn-hero" id="home">

    <div class="container">
        <div class="row align-items-center g-4">

            <!-- LEFT CONTENT -->
            <div class="col-lg-7">

                <div class="vcn-content">

                    <h1 class="vcn-title">
                        Vastu Consultant
                        <span>in Delhi NCR</span>
                    </h1>

                    <h2 class="vcn-subtitle">
                        for Homes, Offices &amp; Plots
                    </h2>

                    <p class="vcn-description">
                        Get personalised Vastu consultation from
                        Pt. Dhiraj Baluni for residential, commercial
                        and industrial properties in
                        <strong>Delhi, Noida, Gurgaon, Ghaziabad
                        and Greater Noida.</strong>
                    </p>

                    <!-- CALL AND WHATSAPP BUTTONS -->
                    <div class="vcn-hero-buttons">

                        <a href="tel:+919868340066"
                           class="vcn-contact-btn vcn-call-btn">

                            <span class="vcn-btn-icon">
                                <i class="bi bi-telephone-fill"></i>
                            </span>

                            <span class="vcn-btn-text">
                                Call: +91 9868340066
                            </span>

                            <i class="bi bi-arrow-right vcn-btn-arrow"></i>

                        </a>

                        <a href="https://wa.me/919868340066?text=Hello%20I%20want%20to%20book%20a%20Vastu%20Consultation."
                           target="_blank"
                           rel="noopener noreferrer"
                           class="vcn-contact-btn vcn-whatsapp-btn">

                            <span class="vcn-btn-icon">
                                <i class="bi bi-whatsapp"></i>
                            </span>

                            <span class="vcn-btn-text">
                                Chat on WhatsApp
                            </span>

                            <i class="bi bi-arrow-right vcn-btn-arrow"></i>

                        </a>

                    </div>

                </div>

            </div>

            <!-- RIGHT CONSULTATION FORM -->
            <div class="col-lg-5">

                <div class="vcn-form-card">

                    <h2>Book a Vastu Consultation</h2>

                    <p class="vcn-form-description">
                        Share a few details to discuss your property
                        and consultation requirements.
                    </p>

                    <form id="vcnHeroForm" action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="Subject" value="Vastu Consultation Request - Delhi NCR Landing Page">

                        <!-- NAME -->
                        <div class="vcn-form-group">

                            <div class="vcn-input-wrap">
                                <span class="vcn-input-icon">
                                    <i class="bi bi-person-fill"></i>
                                </span>

                                <input type="text"
                                       name="name"
                                       placeholder="Name"
                                       aria-label="Name"
                                       autocomplete="name"
                                       required>
                            </div>

                        </div>

                        <!-- PHONE -->
                        <div class="vcn-form-group">

                            <div class="vcn-input-wrap">
                                <span class="vcn-input-icon">
                                    <i class="bi bi-telephone-fill"></i>
                                </span>

                                <input type="tel"
                                       name="phone"
                                       placeholder="Phone number"
                                       aria-label="Phone number"
                                       pattern="[0-9]{10}"
                                       minlength="10"
                                       maxlength="10"
                                       inputmode="numeric"
                                       required>
                            </div>

                        </div>

                        <!-- PROPERTY LOCATION -->
                        <div class="vcn-form-group">

                            <div class="vcn-select-wrap">

                                <span class="vcn-input-icon">
                                    <i class="bi bi-geo-alt-fill"></i>
                                </span>

                                <select name="location" required>

                                    <option value="" selected disabled>
                                        Property location
                                    </option>

                                    <option value="Delhi">Delhi</option>
                                    <option value="Noida">Noida</option>
                                    <option value="Gurgaon">Gurgaon</option>
                                    <option value="Ghaziabad">Ghaziabad</option>
                                    <option value="Greater Noida">
                                        Greater Noida
                                    </option>
                                    <option value="Other">Other</option>

                                </select>

                                <i class="bi bi-chevron-down vcn-select-arrow"></i>

                            </div>

                        </div>

                        <!-- CONSULTATION FOR -->
                        <div class="vcn-form-group">

                            <div class="vcn-select-wrap">

                                <span class="vcn-input-icon">
                                    <i class="bi bi-stars"></i>
                                </span>

                                <select name="service" required>

                                    <option value="" selected disabled>
                                        Consultation for
                                    </option>

                                    <option value="Home / Flat">
                                        Home / Flat
                                    </option>

                                    <option value="Office / Shop">
                                        Office / Shop
                                    </option>

                                    <option value="Factory / Industrial">
                                        Factory / Industrial
                                    </option>

                                    <option value="Plot / Land">
                                        Plot / Land
                                    </option>

                                </select>

                                <i class="bi bi-chevron-down vcn-select-arrow"></i>

                            </div>

                        </div>

                        <!-- HONEYPOT -->
                        <div class="vcn-honeypot" aria-hidden="true">
                            <label for="vcn-website">Leave empty</label>
                            <input type="text"
                                   name="website"
                                   id="vcn-website"
                                   tabindex="-1"
                                   autocomplete="off">
                        </div>

                        <!-- SUBMIT BUTTON -->
                        <button type="submit" class="vcn-submit-btn">
                            <i class="bi bi-send-fill"></i>
                            Book My Consultation
                            <i class="bi bi-arrow-right"></i>
                        </button>

                    </form>

                </div>

            </div>

        </div>
    </div>

</section>
<!-- END VASTU HERO SECTION -->







<!-- ================================
     VASTU SERVICES
================================= -->

<section class="vastu-services-section " id="services">

    <div class="container">

        <div class="text-center mb-5">


            <h2 class="vastu-service-title">
                Choose the Right Vastu Service
            </h2>

            <p class="vastu-service-subtitle">
                Every property has different challenges. Select the consultation that matches your requirement and receive personalized Vastu guidance.
            </p>

        </div>

        <div class="row g-4">

            <!-- Home -->

            <div class="col-lg-6">

                <div class="vastu-service-card">

                    <div class="vastu-service-img">

                        <img src="/astrovastupooja/images/home.webp" alt="Home Vastu">

                        <span class="vastu-badge">
                            Residential
                        </span>

                    </div>

                    <div class="vastu-service-content">

                        <h4>
                            Home Vastu
                        </h4>

                        <p>
                            For flats, apartments and houses. Main entrance, kitchen, bedroom, pooja room, toilet and room placement analysis.
                        </p>

                        <a href="https://wa.me/919868340066?text=Hi%21%20I%27m%20planning%20to%20buy%2Fbuild%20a%20home%20and%20would%20like%20a%20Home%20Vastu%20consultation.%20Please%20arrange%20a%20call%20with%20an%20expert%20Vastu%20consultant.    " target="_blank" class="vastu-service-btn">
                          Book My Home Vastu Consultation
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>

                </div>

            </div>

            <!-- Office -->

            <div class="col-lg-6">

                <div class="vastu-service-card">

                    <div class="vastu-service-img">

                        <img src="/astrovastupooja/images/office-vastu.webp" alt="Office Vastu">

                        <span class="vastu-badge">
                            Commercial
                        </span>

                    </div>

                    <div class="vastu-service-content">

                        <h4>
                            Office & Factory Vastu
                        </h4>

                        <p>
                            For offices, shops, factories and commercial properties. Ownerâ€™s cabin, employee seating, machinery, accounts and production area analysis.
                        </p>

                        <a href="https://wa.me/919868340066?text=Hi%21%20I%20need%20a%20Vastu%20consultation%20for%20my%20office%2Ffactory.%20Please%20arrange%20a%20call%20with%20an%20expert%20Vastu%20consultant." target="_blank" class="vastu-service-btn">
                          Book My Workplace Consultation
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>

                </div>

            </div>

            <!-- Plot -->

            <div class="col-lg-6">

                <div class="vastu-service-card">

                    <div class="vastu-service-img">

                        <img src="/astrovastupooja/images/plot-vastu.webp" alt="Plot Vastu">

                        <span class="vastu-badge">
                            Investment
                        </span>

                    </div>

                    <div class="vastu-service-content">

                        <h4>
                            Plot Vastu
                        </h4>

                        <p>
                            For people planning to buy land. Plot direction, shape, slope, road position, surroundings and construction possibilities are reviewed.
                        </p>

                        <a href="https://wa.me/919868340066?text=Hi%21%20I%27m%20planning%20to%20buy%20a%20plot%20and%20want%20a%20Vastu%20check%20before%20making%20my%20decision.%20Please%20arrange%20a%20call%20with%20an%20expert%20Vastu%20consultant." target="_blank" class="vastu-service-btn">
                          Check My Plot Before Buying

                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>

                </div>

            </div>

            <!-- Dosh -->

            <div class="col-lg-6">

                <div class="vastu-service-card">

                    <div class="vastu-service-img">

                        <img src="/astrovastupooja/images/vastu-dosh.webp" alt="Vastu Dosh">

                        <span class="vastu-badge">
                            Remedies
                        </span>

                    </div>

                    <div class="vastu-service-content">

                        <h4>
                            Vastu Dosh Shanti
                        </h4>

                        <p>
                            For existing properties where construction changes may be difficult. Practical corrections and suitable Vedic remedies may be suggested after analysis.
                        </p>

                        <a href="https://wa.me/919868340066?text=Hi%21%20I%20need%20guidance%20for%20Vastu%20Dosh%20Shanti%20and%20practical%20remedies%20for%20my%20property.%20Please%20arrange%20a%20call%20with%20an%20expert%20Vastu%20consultant." target="_blank" class="vastu-service-btn">
                        Get Expert Vastu Guidance
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>







<section class="astro-authority-section">

    <div class="container">

        <div class="row align-items-center gy-5">

            <!-- LEFT -->

            <div class="col-lg-5">

                <div class="authority-photo-box">

                    <img src="/astrovastupooja/images/certificate.webp" class="authority-photo" alt="">

                    <div class="floating-badge badge-one">
                        Practising since 1997
                    </div>

                    <div class="floating-badge badge-two">
                        29+ Years
                    </div>

                    <div class="floating-badge badge-three">
                        100+ Countries
                    </div>

                </div>

            </div>

            <!-- RIGHT -->

            <div class="col-lg-7">

                <div class="authority-card">

                  
                    <h2>
                        Why Consult Pt. Dhiraj Baluni?
                    </h2>

                   <div class="authority-list">

    <div class="authority-item">
        <i class="bi bi-calendar-check-fill"></i>
        <span>Practising since 1997</span>
    </div>

    <div class="authority-item">
        <i class="bi bi-award-fill"></i>
        <span>29+ years of experience</span>
    </div>

    <div class="authority-item">
        <i class="bi bi-patch-check-fill"></i>
        <span>ICAS Certified</span>
    </div>

    <div class="authority-item">
        <i class="bi bi-mortarboard-fill"></i>
        <span>Jyotish Praveen and Jyotish Visharadh</span>
    </div>

    <div class="authority-item">
        <i class="bi bi-people-fill"></i>
        <span>10,000+ clients and poojas</span>
    </div>

    <div class="authority-item">
        <i class="bi bi-globe-central-south-asia"></i>
        <span>Clients across 100+ countries</span>
    </div>

    <div class="authority-item">
        <i class="bi bi-translate"></i>
        <span>Consultation in Hindi and English</span>
    </div>

    <div class="authority-item">
        <i class="bi bi-camera-video-fill"></i>
        <span>Online and on-site consultation</span>
    </div>

    <div class="authority-item">
        <i class="bi bi-shield-lock-fill"></i>
        <span>Complete confidentiality</span>
    </div>

</div>

                </div>

            </div>

        </div>



    </div>

</section>  









<!-- VASTU CONSULTATION GUIDE -->
<section class="vastu-editorial-section">

    <div class="container">

        <!-- INTRO -->
        <div class="ve-intro">

            <div class="ve-intro-left">
               

                <h2>
                    When Should You Consult a
                    <span>Vastu Consultant?</span>
                </h2>
            </div>

            <div class="ve-intro-right">
                <p>
                    Whether you're buying a new property, planning construction, 
                    renovating your home or improving your workplace, a Vastu consultation can 
                    help you review the property's layout and identify areas that may need attention.
                </p>
            </div>

        </div>

        <div class="ve-divider"></div>

        <!-- MAIN CONTENT -->
        <div class="row g-5">

            <!-- LEFT: FIVE VASTU CHECKS -->
            <div class="col-lg-7">

                <div class="ve-section-heading">
                 

                    <h3>
                      5 Important Vastu Checks Before Buying or Planning a Property
                    </h3>
                </div>

                <div class="ve-check-list">

                    <!-- CHECK 1 -->
                    <div class="ve-check-item">

                        <div class="ve-check-number">01</div>

                        <div class="ve-check-content">
                            <h4>Plot Direction, Shape & Slope</h4>

                            <p>
                                Review the plot's orientation, shape, slope and surrounding road positions as part of the Vastu assessment.

                            </p>
                        </div>

                        <div class="ve-check-icon">
                            <i class="bi bi-compass"></i>
                        </div>

                    </div>

                    <!-- CHECK 2 -->
                    <div class="ve-check-item">

                        <div class="ve-check-number">02</div>

                        <div class="ve-check-content">
                            <h4>Main Entrance & Layout</h4>

                            <p>
                              Evaluate the main entrance, room placement and overall floor plan to identify potential Vastu concerns.
                            </p>
                        </div>

                        <div class="ve-check-icon">
                            <i class="bi bi-door-open"></i>
                        </div>

                    </div>

                    <!-- CHECK 3 -->
                    <div class="ve-check-item">

                        <div class="ve-check-number">03</div>

                        <div class="ve-check-content">
                            <h4>Kitchen & Bedroom Placement</h4>

                            <p>
                               Review kitchen, bedroom and other key room locations in relation to the property's layout.
                            </p>
                        </div>

                        <div class="ve-check-icon">
                            <i class="bi bi-house"></i>
                        </div>

                    </div>

                    <!-- CHECK 4 -->
                    <div class="ve-check-item">

                        <div class="ve-check-number">04</div>

                        <div class="ve-check-content">
                            <h4>Office & Commercial Layout</h4>

                            <p>
                               Assess workstations, seating arrangements, entrances and functional areas for offices and commercial spaces.
                            </p>
                        </div>

                        <div class="ve-check-icon">
                            <i class="bi bi-briefcase"></i>
                        </div>

                    </div>

                    <!-- CHECK 5 -->
                    <div class="ve-check-item">

                        <div class="ve-check-number">05</div>

                        <div class="ve-check-content">
                            <h4>Factory & Industrial Layout</h4>

                            <p>
                                Review machinery placement, operational areas and the overall layout according to the property's requirements.
                            </p>
                        </div>

                        <div class="ve-check-icon">
                            <i class="bi bi-buildings"></i>
                        </div>

                    </div>

                </div>

            </div>

            <!-- RIGHT: CONSULTATION TIMELINE -->
            <div class="col-lg-5">

                <div class="ve-timeline-panel">

                    <div class="ve-panel-heading">

                     

                        <h3>When Is the Right Time for a Consultation?</h3>

                    </div>

                    <div class="ve-timeline">

                        <!-- TIME 1 -->
                        <div class="ve-timeline-item">

                            <div class="ve-timeline-icon">
                                <i class="bi bi-house-check"></i>
                            </div>

                            <div class="ve-timeline-content">

                                <h4>Before buying a property:</h4>

                                <p>
                                    Review the plot or floor plan before making your decision.
                                </p>

                            </div>

                        </div>

                        <!-- TIME 2 -->
                        <div class="ve-timeline-item">

                            <div class="ve-timeline-icon">
                                <i class="bi bi-rulers"></i>
                            </div>

                            <div class="ve-timeline-content">

                                <h4>Before construction:</h4>

                                <p>
                                    Discuss the proposed layout during the planning stage.
                                </p>

                            </div>

                        </div>

                        <!-- TIME 3 -->
                        <div class="ve-timeline-item">

                            <div class="ve-timeline-icon">
                                <i class="bi bi-tools"></i>
                            </div>

                            <div class="ve-timeline-content">

                                <h4>During renovation:</h4>

                                <p>
                                    Identify areas to review before finalising changes.

                                </p>

                            </div>

                        </div>

                        <!-- TIME 4 -->
                        <div class="ve-timeline-item">

                            <div class="ve-timeline-icon">
                                <i class="bi bi-clipboard-check"></i>
                            </div>

                            <div class="ve-timeline-content">

                                <h4>After moving in:</h4>

                                <p>
                                    Discuss existing layout concerns and possible practical corrections.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- BOTTOM CTA -->
        <div class="ve-bottom-cta">

            <div class="ve-bottom-content">

                <div class="ve-bottom-icon">
                    <i class="bi bi-compass"></i>
                </div>

                <div>
                    <p>
                        Every property is different. A consultation with Pt. Dhiraj Baluni can help
                         you understand your property's specific requirements and available Vastu correction options.
                    </p>
                </div>

            </div>

            <a href="https://wa.me/919868340066?text=Hello%2C%20I%20want%20to%20book%20a%20Vastu%20consultation."
               target="_blank"
               rel="noopener noreferrer"
               class="ve-cta-button">

                <i class="bi bi-whatsapp"></i>

              Book Your Vastu Consultation

                <i class="bi bi-arrow-up-right"></i>

            </a>

        </div>

    </div>

</section>
<!-- END VASTU CONSULTATION GUIDE -->












<!-- When Should You Consult -->
<!--<!--<section class="vastu-consult-section ">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="vastu-section-title mt-3">
                When Should You Consult a Vastu Expert?
            </h2>

        </div>

        <div class="row g-4">

            <div class="col-lg-4 col-md-6 col-6">
                <div class="vastu-consult-card">
                    <i class="bi bi-house-door"></i>
                    <h5>Before buying a home, flat or plot</h5>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-6">
                <div class="vastu-consult-card">
                    <i class="bi bi-hammer"></i>
                    <h5>Before starting construction</h5>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-6">
                <div class="vastu-consult-card">
                    <i class="bi bi-buildings"></i>
                    <h5>Before opening an office or factory</h5>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-6">
                <div class="vastu-consult-card">
                    <i class="bi bi-tools"></i>
                    <h5>Before renovating a property</h5>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-6">
                <div class="vastu-consult-card">
                    <i class="bi bi-diagram-3"></i>
                    <h5>When planning room or machinery placement</h5>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-6">
                <div class="vastu-consult-card">
                    <i class="bi bi-search"></i>
                    <h5>When you want to check an existing property</h5>
                </div>
            </div>

      

        </div>

    </div>

</section>



<!-- Check Before You Invest -->
<!--<section class="vastu-compare-section ">

    <div class="container">

        <div class="text-center mb-5">

         <h2 class="vastu-section-title">
    Don't Buy a Property Before
    <span>Checking Its Vastu</span>
</h2>

<p class="vastu-section-subtitle">
    Compare the difference between buying with and without a professional Vastu consultation.
</p>

        </div>

        <div class="row g-4 align-items-stretch">

            <!-- Without -->
           <!-- <div class="col-lg-6">

                <div class="vastu-compare-card without-card">

                    <div class="compare-heading">
                        <i class="bi bi-x-circle-fill"></i>
                        <h4>Without Vastu Check</h4>
                    </div>

                    <ul>

                        <li>Decision based only on price and location</li>

                        <li>Concerns may appear after purchase</li>

                        <li>Later changes may cost more</li>

                        <li>General tips from the internet</li>

                        <li>Confusion before final decision</li>

                    </ul>

                </div>

            </div>

            <!-- With -->

        <!--    <div class="col-lg-6">

                <div class="vastu-compare-card with-card">

                    <div class="compare-heading">

                        <i class="bi bi-check-circle-fill"></i>

                        <h4>With Vastu Check</h4>

                    </div>

                    <ul>

                        <li>Direction and layout are also checked</li>

                        <li>Concerns can be identified earlier</li>

                        <li>Better planning may reduce future changes</li>

                        <li>Suggestions based on your property</li>

                        <li>A more informed property decision</li>

                    </ul>

                </div>

            </div>

        </div>

  <div class="compare-note mt-5">

    <div class="compare-note-icon">
        <i class="bi bi-lightbulb-fill"></i>
    </div>

    <div class="compare-note-content">

        <p>
            The cost of checking a property is small compared to the cost of changing it later.
        </p>

    </div>

</div>

    </div>

</section>



<!-- Hidden Mistakes Section -->
<!--<section class="vastu-mistakes-section ">

    <div class="container">

        <div class="text-center mb-5">


            <h2 class="vastu-mistakes-title mt-3">
                5 Important Points Many Property Buyers Forget to Check
            </h2>

        </div>

        <!-- First Row -->

     <!--   <div class="row g-4">

            <div class="col-lg-4 col-md-6">
                <div class="vastu-card">

                    <div class="vastu-card-image">
                        <img src="/astrovastupooja/images/entrance.webp" alt="">
                    </div>

                    <div class="vastu-card-body">

                

                        <h5>Main entrance direction and placement</h5>

                    </div>

                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="vastu-card">

                    <div class="vastu-card-image">
                        <img src="/astrovastupooja/images/kitchen.webp" alt="">
                    </div>

                    <div class="vastu-card-body">


                        <h5>Kitchen, bedroom and toilet location</h5>

                    </div>

                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="vastu-card">

                    <div class="vastu-card-image">
                        <img src="/astrovastupooja/images/plot.webp" alt="">
                    </div>

                    <div class="vastu-card-body">


                        <h5>Plot shape, slope and road position</h5>

                    </div>

                </div>
            </div>

        </div>

        <!-- Second Row -->

       <!-- <div class="row justify-content-center g-4 mt-2">

            <div class="col-lg-4 col-md-6">
                <div class="vastu-card">

                    <div class="vastu-card-image">
                        <img src="/astrovastupooja/images/office.webp" alt="">
                    </div>

                    <div class="vastu-card-body">


                        <h5>Ownerâ€™s seat and office layout</h5>

                    </div>

                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="vastu-card">

                    <div class="vastu-card-image">
                        <img src="/astrovastupooja/images/factory.webp" alt="">
                    </div>

                    <div class="vastu-card-body">


                        <h5>Factory machinery and production area placement</h5>

                    </div>

                </div>
            </div>

        </div>

       <div class="vastu-note mt-5">

    <div class="vastu-note-shape"></div>

    <div class="vastu-note-content">

  
      <h5>
    A property may look perfectâ€”but its
    <span>complete layout</span>
    should also be reviewed.
</h5>
  <a href="https://wa.me/919868340066?text=Hi%21%20I%20want%20to%20book%20a%20Vastu%20consultation%20before%20buying%20my%20property.%20Please%20guide%20me%20with%20the%20process%2C%20consultation%20fee%2C%20and%20available%20appointment." target="_blank" class="vastu-cta-btn">
            <i class="bi bi-whatsapp"></i>
            Get My Property Checked
        </a>

    </div>

</div>

    </div>

</section>



-->




<section class="vastu-analysis-section">

    <div class="container">

        <div class="text-center mb-5">

       

            <h2 class="analysis-title">
                One Vastu Tip Cannot Work <br> For Every Property
            </h2>

            <p class="analysis-subtitle">
                Your neighbour's remedy may not be suitable for your property.
              
            </p>

        </div>

        <div class="row align-items-center g-5">

            <!-- LEFT -->

            <div class="col-lg-4">

                <div class="analysis-side left">

                    <div class="analysis-label danger">

                        <i class="bi bi-exclamation-circle-fill"></i>

                        DON'T RELY ON

                    </div>

                    <div class="analysis-item">

                        <i class="bi bi-google"></i>

                        Google Tips

                    </div>

                    <div class="analysis-item">

                        <i class="bi bi-youtube"></i>

                        YouTube Videos

                    </div>

                    <div class="analysis-item">

                        <i class="bi bi-people"></i>

                        Friend's Advice

                    </div>

                    <div class="analysis-item">

                        <i class="bi bi-arrow-repeat"></i>

                        Same Remedy For Everyone

                    </div>

                    <div class="analysis-item">

                        <i class="bi bi-question-circle"></i>

                        Guesswork

                    </div>

                </div>

            </div>

            <!-- CENTER -->

            <div class="col-lg-4 text-center">

                <div class="analysis-center">

                    <div class="compass-circle">

                        <img src="/astrovastupooja/images/compass.webp" alt="Compass">

                    </div>

                    <div class="center-line"></div>

                    <h5>Every Property Is Different</h5>

                </div>

            </div>

            <!-- RIGHT -->

            <div class="col-lg-4">

                <div class="analysis-side right">

                    <div class="analysis-label success">

                        <i class="bi bi-patch-check-fill"></i>

                        WE ANALYSE

                    </div>

                    <div class="analysis-item success">

                        <i class="bi bi-house-door"></i>

                        Property Floor Plan

                    </div>

                    <div class="analysis-item success">

                        <i class="bi bi-compass"></i>

                        North Direction

                    </div>

                    <div class="analysis-item success">

                        <i class="bi bi-door-open"></i>

                        Main Entrance

                    </div>

                    <div class="analysis-item success">

                        <i class="bi bi-grid"></i>

                        Room Placement

                    </div>

                    <div class="analysis-item success">

                        <i class="bi bi-tree"></i>

                        Open & Closed Areas

                    </div>

                    <div class="analysis-item success">

                        <i class="bi bi-building"></i>

                       Property surroundings

                    </div>

                    <div class="analysis-item success">

                       <i class="bi bi-bullseye"></i>

                        Purpose of the property

                    </div>

                </div>

            </div>

        </div>

        <!-- CTA -->

        <div class="analysis-cta">

            <h4>
                We first understand your property and then suggest practical corrections.
            </h4>

            <a href="https://wa.me/919868340066?text=Hello%20I%20want%20to%20book%20a%20Vastu%20Consultation." target="_blank"  class="analysis-btn">
                Get My Property Analysed
            </a>

        </div>

    </div>

</section>







<section class="vastu-process-section " id="process">

    <div class="container">

        <div class="text-center mb-5">

           

            <h2 class="vastu-process-title">
                How Does It Work?
            </h2>

        </div>

        <div class="vastu-process-wrapper">

            <div class="vastu-line"></div>

            <!-- Step 1 -->

            <div class="vastu-step left">

                <div class="vastu-step-icon">
                    <i class="bi bi-chat-dots-fill"></i>
                </div>

                <div class="vastu-step-card">

                    <span class="step-number">01</span>

                    <h4>Share Your Requirement</h4>

                    <p>
                        Tell us whether you need consultation for a home,
                        office, factory or plot.
                    </p>

                </div>

            </div>

            <!-- Step 2 -->

            <div class="vastu-step right">

                <div class="vastu-step-icon">
                    <i class="bi bi-house-door-fill"></i>
                </div>

                <div class="vastu-step-card">

                    <span class="step-number">02</span>

                    <h4>Share Property Details</h4>

                    <p>
                        Provide the floor plan, North direction,
                        location, photos or videos.
                    </p>

                </div>

            </div>

            <!-- Step 3 -->

            <div class="vastu-step left">

                <div class="vastu-step-icon">
                    <i class="bi bi-search"></i>
                </div>

                <div class="vastu-step-card">

                    <span class="step-number">03</span>

                    <h4>Get Vastu Analysis</h4>

                    <p>
                        Important directions, rooms and
                        property zones are reviewed.
                    </p>

                </div>

            </div>

            <!-- Step 4 -->

            <div class="vastu-step right">

                <div class="vastu-step-icon">
                    <i class="bi bi-lightbulb-fill"></i>
                </div>

                <div class="vastu-step-card">

                    <span class="step-number">04</span>

                    <h4>Receive Personal Suggestions</h4>

                    <p>
                        Get practical recommendations based on
                        the property's layout.
                    </p>

                </div>

            </div>

        </div>

        <div class="text-center mt-5">

            <a href="https://wa.me/919868340066?text=Hello%20I%20want%20to%20book%20a%20Vastu%20Consultation." class="vastu-process-btn">

                Start My Consultation

                <i class="bi bi-arrow-right"></i>

            </a>

        </div>

    </div>

</section>


<section class="vastu-testimonial-section " id="testimonial">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="testimonial-title">
                What Our Clients Say
            </h2>

        </div>

        <div id="testimonialSlider" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-inner">

                <!-- Review 1 -->

                <div class="carousel-item active">

                    <div class="testimonial-box">

                        <div class="quote-icon">
                            <i class="bi bi-quote"></i>
                        </div>

                        <div class="stars">

                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>

                        </div>

                        <p>

                            "We consulted before finalising our office layout.
                            Every point was explained clearly, and the suggestions
                            were practical."

                        </p>

                        <div class="client-info">


                            <div>

                                <h5>Ajay Sharma</h5>

                                <span>Delhi â€¢ Office Consultation</span>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- Review 2 -->

                <div class="carousel-item">

                    <div class="testimonial-box">

                        <div class="quote-icon">
                            <i class="bi bi-quote"></i>
                        </div>

                        <div class="stars">

                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>

                        </div>

                        <p>

                            "We wanted Vastu guidance before moving into our new
                            home. Every recommendation was explained patiently and
                            the consultation was very detailed."

                        </p>

                        <div class="client-info">


                            <div>

                                <h5>Priya Gupta</h5>

                                <span>Noida â€¢ Home Consultation</span>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- Review 3 -->

                <div class="carousel-item">

                    <div class="testimonial-box">

                        <div class="quote-icon">
                            <i class="bi bi-quote"></i>
                        </div>

                        <div class="stars">

                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>

                        </div>

                        <p>

                            "The consultation helped us plan our factory layout
                            confidently. The suggestions were practical and easy
                            to implement."

                        </p>

                        <div class="client-info">

                          

                            <div>

                                <h5>Rahul Verma</h5>

                                <span>Lucknow â€¢ Factory Consultation</span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialSlider" data-bs-slide="prev">

                <span class="carousel-control-prev-icon"></span>

            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#testimonialSlider" data-bs-slide="next">

                <span class="carousel-control-next-icon"></span>

            </button>

        </div>

    </div>

</section>

<section class="vastu-faq-section " id="faq"> 

    <div class="container">

        <div class="text-center mb-5">

            <span class="faq-tag">
                Frequently Asked Questions
            </span>

            <h2 class="faq-title">
                Got Questions? We Have Answers
            </h2>

            <p class="faq-subtitle">
                Everything you need to know before booking your consultation.
            </p>

        </div>

        <div class="row justify-content-center">

            <div class="col-lg-10">

                <div class="accordion faq-accordion" id="faqAccordion">

                    <!-- 1 -->

                    <div class="accordion-item">

                        <h2 class="accordion-header">

                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">

                                <i class="bi bi-cash-coin me-3"></i>

                                How much does a Vastu consultation cost?

                            </button>

                        </h2>

                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">

                            <div class="accordion-body">

                                Charges depend on the property type, size and consultation method. Please contact us for an exact quotation.

                            </div>

                        </div>

                    </div>

                    <!-- 2 -->

                    <div class="accordion-item">

                        <h2 class="accordion-header">

                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">

                                <i class="bi bi-laptop me-3"></i>

                                Is online consultation available?

                            </button>

                        </h2>

                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">

                            <div class="accordion-body">

                                Yes. Online consultations are available across India and internationally through video call and digital property analysis.

                            </div>

                        </div>

                    </div>

                    <!-- 3 -->

                    <div class="accordion-item">

                        <h2 class="accordion-header">

                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">

                                <i class="bi bi-geo-alt me-3"></i>

                                Do you provide on-site consultation?

                            </button>

                        </h2>

                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">

                            <div class="accordion-body">

                                Yes. On-site consultations are available depending on the location and appointment schedule.

                            </div>

                        </div>

                    </div>

                    <!-- 4 -->

                    <div class="accordion-item">

                        <h2 class="accordion-header">

                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">

                                <i class="bi bi-tools me-3"></i>

                                Is wall-breaking always required?

                            </button>

                        </h2>

                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">

                            <div class="accordion-body">

                                No. In many cases, practical Vastu remedies can be suggested without structural changes.

                            </div>

                        </div>

                    </div>

                    <!-- 5 -->

                    <div class="accordion-item">

                        <h2 class="accordion-header">

                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">

                                <i class="bi bi-house-check me-3"></i>

                                Can you check a property before purchase?

                            </button>

                        </h2>

                        <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">

                            <div class="accordion-body">

                                Yes. We can review residential, commercial, industrial and plot properties before purchase.

                            </div>

                        </div>

                    </div>

                    <!-- 6 -->

                    <div class="accordion-item">

                        <h2 class="accordion-header">

                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">

                                <i class="bi bi-file-earmark-text me-3"></i>

                                What documents and details are required?

                            </button>

                        </h2>

                        <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">

                            <div class="accordion-body">

                                Floor plan, North direction, property location, photos or videos, and your consultation requirement.

                            </div>

                        </div>

                    </div>

                    <!-- 7 -->

                    <div class="accordion-item">

                        <h2 class="accordion-header">

                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq7">

                                <i class="bi bi-clock-history me-3"></i>

                                How much time does the consultation take?

                            </button>

                        </h2>

                        <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">

                            <div class="accordion-body">

                                Consultation duration depends on the property type and complexity. The exact timeline is shared during booking.

                            </div>

                        </div>

                    </div>

                    <!-- 8 -->

                    <div class="accordion-item">

                        <h2 class="accordion-header">

                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq8">

                                <i class="bi bi-building me-3"></i>

                                Do you provide factory Vastu consultation?

                            </button>

                        </h2>

                        <div id="faq8" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">

                            <div class="accordion-body">

                                Yes. Factory, warehouse, office and industrial Vastu consultations are available.

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>







<section class="vastu-final-cta ">

    <div class="container">

        <div class="row align-items-center g-5">

            <!-- Left Content -->

            <div class="col-lg-6">

               

                <h2 class="vfc-title">
                    Before You Buy, Build or Renovateâ€”Get the Property Checked
                </h2>

                <p class="vfc-text">
                    A property is a major investment. A timely Vastu consultation
                    can help you understand its direction, layout and possible
                    concerns before making an important decision.
                </p>

                <div class="vfc-call">

                    <div class="vfc-icon">
                        <i class="bi bi-telephone-fill"></i>
                    </div>

                    <div>

                        <div class="small">Call for Consultation</div>

                        <h4>
                            <a href="tel:+919868340066">
                                +91 98683 40066
                            </a>
                        </h4>

                    </div>

                </div>

                <div class="vfc-buttons">


                    <a href="https://wa.me/919868340066?text=Hello%20I%20want%20to%20book%20a%20Vastu%20Consultation." target="_blank" class="btn-whatsapp">

                        <i class="bi bi-whatsapp me-2"></i>

                        Ask on WhatsApp

                    </a>

                </div>

                <div class="vfc-note">

                    <i class="bi bi-shield-lock-fill"></i>

                    Your personal and property information will remain confidential.

                </div>

            </div>

            <!-- Right Form -->

            <div class="col-lg-6">

               <div class="vfc-image-box">

    <img src="/astrovastupooja/images/vastu-consultation.webp" alt="Vastu Consultation">

    <div class="vfc-image-content">

        <h3>Trusted Vastu Consultation for Homes, Offices & Factories</h3>

        <p>
            Professional guidance for residential, commercial and industrial
            properties across India.
        </p>

    </div>

</div>
            </div>

        </div>

    </div>

</section>



<footer class="simple-footer">
    <div class="container">

        <p class="mb-2">
            Â© 2026 <strong>Pt. Dhiraj Baluni.</strong> All Rights Reserved.
        </p>

      <p class="mb-1">Designed by : <a href="https://ebrandindia.com/"> <strong>E-Brand Promotech</strong></a></p>

    </div>
</footer>






<!-- Floating Contact Buttons -->

<div class="floating-contact">

    <a href="tel:+919868340066" class="floating-call" title="Call Now">
        <i class="bi bi-telephone-fill"></i>
        <span>Call</span>
    </a>

    <a href="https://wa.me/919868340066?text=Hello%20I%20want%20to%20book%20a%20Vastu%20Consultation."
       target="_blank"
       class="floating-whatsapp"
       title="WhatsApp">
        <i class="bi bi-whatsapp"></i>
        <span>WhatsApp</span>
    </a>

</div>



<!-- Mobile Sticky CTA -->

<div class="mobile-sticky-cta">

    <a href="tel:+919868340066" class="mobile-call">
        <i class="bi bi-telephone-fill"></i>
        <span>Call</span>
    </a>

    <a href="https://wa.me/919868340066?text=Hello%20I%20want%20to%20book%20a%20Vastu%20Consultation." target="_blank" class="mobile-whatsapp">
        <i class="bi bi-whatsapp"></i>
        <span>WhatsApp</span>
    </a>


</div>








<!-- Scroll To Top -->

<button id="scrollTopBtn">

    <i class="bi bi-arrow-up"></i>

</button>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="/astrovastupooja/js/script.js"></script>


<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PBP6T986"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
</body>
</html>