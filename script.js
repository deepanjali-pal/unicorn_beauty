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
// payment successful message
document.getElementById('paymentform').addEventListener('submit', function(e) {
    e.preventDefault();
    alert('Payment Confirmed! Thank you for booking with Unicorn Beauty.');
    this.submit(); // Proceed with real submit if needed
});

// Feedback form thank you animation
// (Removed: This was preventing form submission to PHP)

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

// Book Now button: redirect to booking.html with service pre-filled
const bookBtns = document.querySelectorAll('.book-service-btn');
bookBtns.forEach(btn => {
    btn.addEventListener('click', function(e) {
        e.stopPropagation();
        const service = btn.getAttribute('data-service');
        window.location.href = `booking.html?service=${encodeURIComponent(service)}`;
    });
});
