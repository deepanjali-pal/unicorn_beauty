// Mobile menu toggle
const menuBtn = document.getElementById('menu-btn');
const navlist = document.getElementById('navlist');
if (menuBtn && navlist) {
    menuBtn.addEventListener('click', () => {
        navlist.classList.toggle('open');
    });
}

// (Optional) Smooth scroll for anchor links
const links = document.querySelectorAll('a[href^="#"]');
for (const link of links) {
    link.addEventListener('click', function(e) {
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            e.preventDefault();
            target.scrollIntoView({ behavior: 'smooth' });
            navlist.classList.remove('open'); // close menu on mobile after click
        }
    });
}

// Feedback form thank you animation
const feedbackForm = document.getElementById('feedbackForm');
if (feedbackForm) {
    feedbackForm.addEventListener('submit', function(e) {
        e.preventDefault();
        feedbackForm.classList.add('thankyou');
        setTimeout(() => {
            feedbackForm.classList.remove('thankyou');
            feedbackForm.reset();
        }, 2000);
    });
}

// Service list expand/collapse
const serviceItems = document.querySelectorAll('.service-item');
serviceItems.forEach(item => {
    item.addEventListener('click', function(e) {
        // Close others
        serviceItems.forEach(i => { if(i !== item) i.classList.remove('active'); });
        // Toggle this one
        item.classList.toggle('active');
    });
    item.addEventListener('keypress', function(e) {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            item.click();
        }
    });
});
