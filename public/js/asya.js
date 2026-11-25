// Solid navbar after scrolling
const nav = document.getElementById('nav');
// (only on pages that have a hero)
if (nav.hasAttribute('data-hero')) addEventListener('scroll', () => nav.classList.toggle('solid', scrollY > 60));

// Mobile menu toggle
document.getElementById('burger').onclick = (e) => { const open = document.getElementById('menu').classList.toggle('open'); e.currentTarget.setAttribute('aria-expanded', open); };

// Slider logic
const slides = [...document.querySelectorAll('.slide')];
const dots = document.getElementById('dots');
let cur = 0;

// Show one slide and highlight its dot
function show(n) {
  cur = (n + slides.length) % slides.length;
  slides.forEach((s, i) => s.classList.toggle('on', i === cur));
  [...dots.children].forEach((d, i) => d.classList.toggle('on', i === cur));
}

// Build the dots
slides.forEach((_, i) => { const d = document.createElement('i'); d.onclick = () => show(i); dots.append(d); });
show(0);

// Auto-advance every 6 seconds
setInterval(() => show(cur + 1), 6000);
