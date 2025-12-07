import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Scroll Spy - Auto highlight nav link based on current section
document.addEventListener('DOMContentLoaded', function() {
    const navLinks = document.querySelectorAll('.nav-link');
    const sections = document.querySelectorAll('section[id]');

    function highlightNavLink() {
        let currentSection = '';
        const scrollPosition = window.scrollY + 100; // 100px offset from top

        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionBottom = sectionTop + section.offsetHeight;
            
            // Check if current scroll position is within section
            if (scrollPosition >= sectionTop && scrollPosition < sectionBottom) {
                currentSection = section.getAttribute('id');
            }
        });

        // Remove active class from all links
        navLinks.forEach(link => {
            link.classList.remove('active');
        });

        // Add active class to matching link
        if (currentSection) {
            const activeLink = document.querySelector(`.nav-link[href="#${currentSection}"]`);
            if (activeLink) {
                activeLink.classList.add('active');
            }
        }
    }

    // Update on scroll
    window.addEventListener('scroll', highlightNavLink);
    
    // Initial call
    highlightNavLink();

    // Update on click navigation
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            navLinks.forEach(l => l.classList.remove('active'));
            this.classList.add('active');
            
            // Trigger highlight after scroll completes
            setTimeout(highlightNavLink, 500);
        });
    });
});
