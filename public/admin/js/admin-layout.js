// Admin panel shell layout injector
document.addEventListener("DOMContentLoaded", () => {
    const path = window.location.pathname;
    const pageName = path.substring(path.lastIndexOf("/") + 1) || "dashboard.html";
    
    // Check if we already have the sidebar, if not wrap the body content in the admin layout structure
    if (!document.querySelector(".admin-wrap")) {
        const bodyContent = document.body.innerHTML;
        document.body.innerHTML = `
            <div class="admin-wrap">
                <aside class="sidebar">
                    <div class="sidebar-logo"><div class="om">ॐ</div><span>AVP Admin</span></div>
                    <nav class="sidebar-nav">
                        <div class="sidebar-section">Overview</div>
                        <a href="dashboard.html" class="${pageName === "dashboard.html" ? "active" : ""}"><span class="icon">📊</span>Dashboard</a>
            
                        <div class="sidebar-section">Content Management</div>
                        <a href="services.html" class="${pageName.includes("services") ? "active" : ""}"><span class="icon">🔮</span>Services</a>
                        <a href="blogs.html" class="${pageName.includes("blog") ? "active" : ""}"><span class="icon">📝</span>Blog Posts</a>
                        <a href="gallery.html" class="${pageName.includes("gallery") ? "active" : ""}"><span class="icon">🖼️</span>Gallery</a>
                        <a href="testimonials.html" class="${pageName.includes("testimonial") ? "active" : ""}"><span class="icon">⭐</span>Testimonials</a>
                        <a href="banners.html" class="${pageName.includes("banner") ? "active" : ""}"><span class="icon">🖼️</span>Banners</a>
            
                        <div class="sidebar-section">CRM</div>
                        <a href="inquiries.html" class="${pageName.includes("inquiry") ? "active" : ""}"><span class="icon">📋</span>Inquiries / Leads</a>
            
                        <div class="sidebar-section">System</div>
                        <a href="settings.html" class="${pageName.includes("setting") ? "active" : ""}"><span class="icon">⚙️</span>Site Settings</a>
                        <a href="../index.html"><span class="icon">🚪</span>Logout</a>
                        <a href="../index.html" target="_blank"><span class="icon">🌐</span>View Site</a>
                    </nav>
                </aside>
                <main class="main">
                    <div id="adminAlert" class="toast" style="display:none"></div>
                    ${bodyContent}
                </main>
            </div>
        `;
    }
});

// Toast notification helper
function showAdminToast(msg, isError = false) {
    const alert = document.getElementById("adminAlert");
    if (alert) {
        alert.className = `toast ${isError ? 'toast-error' : 'toast-success'}`;
        alert.innerHTML = (isError ? "✗ " : "✓ ") + msg;
        alert.style.display = "block";
        setTimeout(() => alert.style.display = "none", 4000);
    }
}
