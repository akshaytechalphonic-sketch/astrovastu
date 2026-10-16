// Shared layout manager to inject header, footer, topbar, and floats dynamically

document.addEventListener("DOMContentLoaded", () => {
    // Inject CSS variables or updates if needed
    document.documentElement.style.setProperty("--saffron-mist", "rgba(244, 117, 33, 0.1)");
    
    // Determine current path
    const path = window.location.pathname;
    const pageName = path.substring(path.lastIndexOf("/") + 1) || "index.html";

    // Set page title if not already set specifically
    if (document.title === "" || document.title === "AstroVastuPooja") {
        document.title = `${SITE_SETTINGS.SiteName} — ${SITE_SETTINGS.GuruName}`;
    }

    // --- 1. INJECT HEADER & TOPBAR & TRUSTBAR ---
    const headerContainer = document.getElementById("layout-header");
    if (headerContainer) {
        const waLink = `https://wa.me/${SITE_SETTINGS.WhatsApp}`;
        
        let socialLinksHtml = "";
        const socials = [
            { key: "FacebookUrl", label: "f", title: "Facebook" },
            { key: "InstagramUrl", label: "in", title: "Instagram" },
            { key: "TwitterUrl", label: "x", title: "Twitter / X" },
            { key: "LinkedInUrl", label: "li", title: "LinkedIn" }
        ];
        socials.forEach(s => {
            const url = SITE_SETTINGS[s.key];
            if (url && url !== "#" && url !== "") {
                socialLinksHtml += `<a href="${url}" title="${s.title}" target="_blank">${s.label}</a> `;
            }
        });

        headerContainer.innerHTML = `
            <!-- TOPBAR -->
            <div class="topbar">
                <div class="ctn">
                    <div class="topbar-left">
                        <span><a href="tel:${SITE_SETTINGS.PhoneRaw}">📞 ${SITE_SETTINGS.Phone}</a></span>
                        <span><a href="mailto:${SITE_SETTINGS.Email}">✉ ${SITE_SETTINGS.Email}</a></span>
                    </div>
                    <div class="topbar-marquee">
                        <div class="topbar-marquee-inner">
                            <span>जन्म कुंडली विश्लेषण</span><span>विवाह हेतु कुंडली मिलान</span><span>शिक्षा से संबंधित ज्योतिषीय सलाह</span><span>बिजनेस और कैरियर से संबंधित सलाह</span><span>रत्न सलाहकार</span><span>वास्तु सलाहकार</span><span>शुभ मुहूर्त चयन</span>
                            <span>जन्म कुंडली विश्लेषण</span><span>विवाह हेतु कुंडली मिलान</span><span>शिक्षा से संबंधित ज्योतिषीय सलाह</span><span>बिजनेस और कैरियर से संबंधित सलाह</span><span>रत्न सलाहकार</span><span>वास्तु सलाहकार</span><span>शुभ मुहूर्त चयन</span>
                        </div>
                    </div>
                    <div class="topbar-social">
                        ${socialLinksHtml}
                        <a href="${waLink}" title="WhatsApp" target="_blank">w</a>
                    </div>
                </div>
            </div>

            <!-- HEADER -->
            <header class="header" id="header">
                <div class="ctn">
                    <a class="logo" href="index.html">
                        <div class="logo-icon">ॐ</div>
                        <div>
                            <div class="logo-brand">AstroVastuPooja</div>
                            <div class="logo-sub">${SITE_SETTINGS.GuruName}</div>
                        </div>
                    </a>
                    <nav class="nav" id="mainNav">
                        <a class="nav-link ${pageName === "index.html" ? "active" : ""}" href="index.html">Home</a>
                        <a class="nav-link ${pageName === "about.html" ? "active" : ""}" href="about.html">About</a>
                        <a class="nav-link ${pageName.includes("services.html") || pageName.includes("service-detail.html") ? "active" : ""}" href="services.html">Services</a>
                        <a class="nav-link ${pageName === "gallery.html" ? "active" : ""}" href="gallery.html">Gallery</a>
                        <a class="nav-link ${pageName.includes("blog.html") || pageName.includes("blog-detail.html") ? "active" : ""}" href="blog.html">Blog</a>
                        <a class="nav-link ${pageName === "contact.html" ? "active" : ""}" href="contact.html">Contact</a>
                        <a class="nav-cta" href="consult.html">Book Consultation</a>
                    </nav>
                    <button class="mob-tog" onclick="document.getElementById('mainNav').classList.toggle('open')"><span></span><span></span><span></span></button>
                </div>
            </header>

            <!-- TRUST BAR -->
            <div class="trust-bar">
                <div class="ctn">
                    <div class="trust-row">
                        <div class="trust-badge"><div class="tb-icon">🏅</div><div><strong>ICAS Certified</strong><br>Vedic Astrologer</div></div>
                        <div class="trust-badge"><div class="tb-icon">🌍</div><div><strong>${SITE_SETTINGS.StatCountries}+ Countries</strong><br>Worldwide</div></div>
                        <div class="trust-badge"><div class="tb-icon">⭐</div><div><strong>${SITE_SETTINGS.ExperienceYears}+ Years</strong><br>Experience</div></div>
                        <div class="trust-badge"><div class="tb-icon">🔒</div><div><strong>100% Confidential</strong><br>Consultations</div></div>
                    </div>
                </div>
            </div>
        `;
    }

    // --- 2. INJECT FOOTER & FLOATS ---
    const footerContainer = document.getElementById("layout-footer");
    if (footerContainer) {
        const waLink = `https://wa.me/${SITE_SETTINGS.WhatsApp}`;
        
        let socialCircleHtml = "";
        const socials = [
            { key: "FacebookUrl", label: "f", title: "Facebook" },
            { key: "InstagramUrl", label: "in", title: "Instagram" },
            { key: "TwitterUrl", label: "x", title: "Twitter" },
            { key: "LinkedInUrl", label: "li", title: "LinkedIn" }
        ];
        socials.forEach(s => {
            const url = SITE_SETTINGS[s.key];
            if (url && url !== "#" && url !== "") {
                socialCircleHtml += `
                    <a href="${url}" title="${s.title}" target="_blank" style="width:28px;height:28px;border-radius:50%;border:1px solid rgba(255,255,255,.15);display:flex;align-items:center;justify-content:center;font-size:11px;color:var(--w400);transition:all .2s">${s.label}</a>
                `;
            }
        });

        footerContainer.innerHTML = `
            <!-- FRAUD WARNING -->
            <div class="fraud-warn">
                <div class="ctn">
                    <p>⚠️ <strong>Note:</strong> Beware of fake names and websites. We do not have any other branch or contact numbers. We are not responsible for any fraudulent activity by third parties.</p>
                </div>
            </div>

            <!-- FOOTER -->
            <footer class="footer">
                <div class="ctn">
                    <div class="foot-grid">
                        <div class="foot-brand">
                            <div style="display:flex;align-items:center;gap:12px;margin-bottom:8px">
                                <div class="logo-icon" style="width:38px;height:38px;font-size:18px">ॐ</div>
                                <div><div class="logo-brand" style="color:var(--w200)">${SITE_SETTINGS.SiteName}</div></div>
                            </div>
                            <div class="fb-desc">${SITE_SETTINGS.FooterDesc}</div>
                            <div class="foot-pay" style="margin-top:16px"><span>UPI</span><span>Bank Transfer</span><span>Cash</span></div>
                        </div>
                        <div class="foot-links">
                            <h4>Quick Links</h4>
                            <a href="index.html">Home</a>
                            <a href="about.html">About Us</a>
                            <a href="services.html">Services</a>
                            <a href="consult.html">Online Consult</a>
                            <a href="gallery.html">Gallery</a>
                            <a href="blog.html">Blog</a>
                            <a href="contact.html">Contact</a>
                        </div>
                        <div class="foot-links">
                            <h4>Services</h4>
                            <a href="services.html?category=astrology">Astrology</a>
                            <a href="services.html?category=pooja-path">Pooja Path</a>
                            <a href="services.html?category=vastu">Vastu Shastra</a>
                            <a href="services.html?category=gems-numerology">Gems & Numerology</a>
                        </div>
                        <div>
                            <h4>Get In Touch</h4>
                            <div class="foot-ci"><span class="fci-icon">📞</span><span>${SITE_SETTINGS.Phone}</span></div>
                            <div class="foot-ci"><span class="fci-icon">📧</span><span>${SITE_SETTINGS.Email}</span></div>
                            <div class="foot-ci"><span class="fci-icon">📍</span><span>${SITE_SETTINGS.Address}</span></div>
                            <div style="display:flex;gap:8px;margin-top:12px">
                                ${socialCircleHtml}
                                <a href="${waLink}" title="WhatsApp" target="_blank" style="width:28px;height:28px;border-radius:50%;border:1px solid rgba(255,255,255,.15);display:flex;align-items:center;justify-content:center;font-size:11px;color:var(--w400)">w</a>
                            </div>
                        </div>
                    </div>
                    <div class="foot-bottom">
                        <span>© ${new Date().getFullYear()} ${SITE_SETTINGS.SiteName}. All Rights Reserved.</span>
                        <div style="display:flex;gap:12px">
                            <a href="#" style="color:var(--w400);font-size:12px">Privacy Policy</a>
                            <a href="#" style="color:var(--w400);font-size:12px">Terms</a>
                        </div>
                    </div>
                </div>
            </footer>

            <!-- WhatsApp Float -->
            <a class="wa-float" href="${waLink}" target="_blank">💬</a>

            <!-- Sticky Bottom (Mobile) -->
            <div class="sticky-bottom">
                <div class="sb-inner">
                    <a class="sb-call" href="tel:${SITE_SETTINGS.PhoneRaw}">📞 Call Now</a>
                    <a class="sb-wa" href="${waLink}" target="_blank">💬 WhatsApp</a>
                </div>
            </div>
        `;
    }

    // Scroll listener for sticky header
    window.addEventListener('scroll', () => {
        const header = document.getElementById('header');
        if (header) {
            header.classList.toggle('scrolled', window.scrollY > 20);
        }
    });
});
