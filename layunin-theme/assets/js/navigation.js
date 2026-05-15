/**
 * Layunin Masterpiece Navigation (v10.4)
 * Comprehensive Elite Interaction Engine
 */
document.addEventListener('DOMContentLoaded', function() {
    // --- 1. CORE SELECTORS ---
    const menuToggle = document.querySelector('.menu-toggle');
    const mobileClose = document.querySelector('.mobile-close');
    const mobileOverlay = document.getElementById('mobile-overlay');
    const searchOverlay = document.getElementById('search-overlay');
    const searchInput = document.getElementById('search-input-overlay');
    const siteHeader = document.querySelector('.site-header');
    const progressBar = document.getElementById('reading-progress-bar');

    // --- 2. MOBILE OVERLAY LOGIC ---
    const toggleOverlay = () => {
        if(mobileOverlay) {
            const isActive = mobileOverlay.classList.toggle('active');
            document.body.style.overflow = isActive ? 'hidden' : '';
            
            // Premium Staggered animation for all mobile items
            const animateElements = mobileOverlay.querySelectorAll('.mobile-search-wrapper, .mobile-context-switcher, .mobile-nav-wrapper span, .mobile-nav li, .mobile-strategy-grid, .mobile-featured-product, .mobile-mastery-meta, .mobile-actions');
            animateElements.forEach((el, index) => {
                if (isActive) {
                    el.style.opacity = '0';
                    el.style.transform = 'translateY(30px)';
                    el.style.transition = 'all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1) ' + (0.05 * index) + 's';
                    setTimeout(() => {
                        el.style.opacity = '1';
                        el.style.transform = 'translateY(0)';
                    }, 50);
                } else {
                    el.style.opacity = '';
                    el.style.transform = '';
                    el.style.transition = '';
                }
            });
        }
    };

    if (menuToggle) menuToggle.addEventListener('click', (e) => { e.preventDefault(); toggleOverlay(); });
    if (mobileClose) mobileClose.addEventListener('click', (e) => { e.preventDefault(); toggleOverlay(); });

    // Close mobile menu on non-dropdown link clicks
    const mobileLinks = document.querySelectorAll('.mobile-nav a');
    mobileLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            const parent = link.parentElement;
            if (!parent.classList.contains('menu-item-has-children')) {
                if (mobileOverlay && mobileOverlay.classList.contains('active')) {
                    toggleOverlay();
                }
            } else {
                e.preventDefault();
                parent.classList.toggle('active');
            }
        });
    });

    // --- 3. STRATEGIC CONTEXT SWITCHER ---
    const contextToggles = document.querySelectorAll('.context-toggle');
    const contextLabels = document.querySelectorAll('.context-label');
    const featuredTitle = document.getElementById('featured-product-title');
    const featuredDesc = document.getElementById('featured-product-desc');
    const masteryBar = document.querySelector('.mobile-mastery-meta .progress-bar');
    const masteryBadge = document.querySelector('.mobile-mastery-meta .badge');
    const eliteQuote = document.querySelector('.elite-quote-box p');

    const quotes = {
        global: ["\"Direction over velocity.\"", "\"Systems create freedom.\"", "\"Architecture is permanent.\""],
        local: ["\"Manifest your Layunin.\"", "\"Elevate the PH standard.\"", "\"Purpose is power.\""]
    };

    contextToggles.forEach(btn => {
        btn.addEventListener('click', function() {
            contextToggles.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            const ctx = this.dataset.context;

            contextLabels.forEach(l => {
                l.style.opacity = '0';
                setTimeout(() => {
                    l.textContent = l.getAttribute('data-' + ctx);
                    l.style.opacity = '1';
                }, 150);
            });

            const featuredLink = document.getElementById("featured-product-link");
            if(featuredTitle) {
                featuredTitle.textContent = (ctx === 'global') ? "The Elite Goal Architect" : "PH Revenue Exponential";
                featuredDesc.textContent = (ctx === 'global') ? "Multi-year success framework." : "Dominating the PH digital economy.";
                if(featuredLink) featuredLink.href = (ctx === 'global') ? "#item1" : "#item2";
            }

            if(masteryBar) masteryBar.style.width = (ctx === 'global') ? "45%" : "75%";
            if(masteryBadge) masteryBadge.textContent = (ctx === 'global') ? "Phase 2: Systematize" : "Phase 3: Scale";

            if(eliteQuote) {
                const pool = quotes[ctx];
                eliteQuote.textContent = pool[Math.floor(Math.random() * pool.length)];
            }
            console.log('Context Switched:', ctx);
        });
    });

    // --- 4. SEARCH OVERLAY ---
    const openSearch = (e) => {
        if(e) e.preventDefault();
        if(searchOverlay) {
            searchOverlay.classList.add('active');
            document.body.style.overflow = 'hidden';
            setTimeout(() => { if(searchInput) searchInput.focus(); }, 300);
        }
    };
    const closeSearch = () => {
        if(searchOverlay) {
            searchOverlay.classList.remove('active');
            document.body.style.overflow = '';
        }
    };
    document.querySelectorAll('#search-open, #search-open-mobile').forEach(btn => btn.addEventListener('click', openSearch));
    if(document.getElementById('search-close')) document.getElementById('search-close').addEventListener('click', closeSearch);

    // --- 5. SCROLL EFFECTS ---
    window.addEventListener('scroll', function() {
        // Sticky Header
        if (siteHeader) {
            if (window.scrollY > 40) siteHeader.classList.add('scrolled');
            else siteHeader.classList.remove('scrolled');
        }

        // Reading Progress
        if (progressBar) {
            const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = (winScroll / height) * 100;
            progressBar.style.width = scrolled + "%";
        }
    });

    // --- 6. DARK MODE ENGINE ---
    const darkModeToggles = document.querySelectorAll('#dark-mode-toggle, #dark-mode-toggle-mobile');
    const applyDarkMode = (isDark) => {
        if (isDark) document.body.classList.add('dark-mode');
        else document.body.classList.remove('dark-mode');
    };
    const savedMode = localStorage.getItem('layunin_elite_dark');
    if (savedMode === 'true') applyDarkMode(true);
    darkModeToggles.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const isNowDark = !document.body.classList.contains('dark-mode');
            applyDarkMode(isNowDark);
            localStorage.setItem('layunin_elite_dark', isNowDark);
        });
    });

    // --- 7. UTILITIES (AOS & Smooth Scroll) ---
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) entry.target.classList.add('visible');
        });
    }, { threshold: 0.1 });
    document.querySelectorAll('.animate-up').forEach(el => observer.observe(el));

    document.querySelectorAll('.table-of-contents a').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                window.scrollTo({
                    top: target.getBoundingClientRect().top + window.pageYOffset - 150,
                    behavior: "smooth"
                });
            }
        });
    });
});

/**
 * --- 8. EXIT INTENT PROTOCOL ---
 * Triggers a strategic pause when the user intends to leave.
 */
let exitIntentTriggered = false;
document.addEventListener('mouseleave', (e) => {
    if (e.clientY < 0 && !exitIntentTriggered) {
        const modal = document.getElementById('exit-intent-modal');
        if (modal) {
            modal.classList.add('active');
            exitIntentTriggered = true;
        }
    }
});

/**
 * --- 9. DYNAMIC MASTERY TRACKER ---
 * Updates the UI based on user scroll or interactions.
 */
window.addEventListener('scroll', () => {
    const masteryBar = document.querySelector('.mobile-mastery-meta .progress-bar');
    if (masteryBar) {
        const scrollPercent = (window.scrollY / (document.documentElement.scrollHeight - window.innerHeight)) * 100;
        // Logic: More reading = higher mastery
        masteryBar.style.width = Math.min(scrollPercent, 100) + '%';
    }
});
