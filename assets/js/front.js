document.addEventListener('DOMContentLoaded', () => {
const sliderContainer = document.querySelector('.slider-main');
if (!sliderContainer) return;
const images = ['matcha-can-1.png', 'matcha-can-1.png', 'matcha-can-1.png'];
let currentIndex = 0;
const themePath = themeData.templateUrl + '/assets/images/';
const imgElement = sliderContainer.querySelector('.slider-image-wrapper img');
const dots = sliderContainer.querySelectorAll('.dot');
const prevBtn = sliderContainer.querySelector('.slider-arrow.prev');
const nextBtn = sliderContainer.querySelector('.slider-arrow.next');
const updateSlider = (index) => {
  imgElement.classList.add('is-changing');
  setTimeout(() => {
    imgElement.src = themePath + images[index];
    imgElement.onload = () => { imgElement.classList.remove('is-changing'); };
  }, 200);
  dots.forEach((dot, i) => { dot.classList.toggle('active', i === index); });
};
nextBtn.addEventListener('click', () => { currentIndex = (currentIndex + 1) % images.length; updateSlider(currentIndex); });
prevBtn.addEventListener('click', () => { currentIndex = (currentIndex - 1 + images.length) % images.length; updateSlider(currentIndex); });
dots.forEach((dot, i) => { dot.addEventListener('click', () => { currentIndex = i; updateSlider(currentIndex); }); });
});

document.addEventListener('DOMContentLoaded', () => {
const grid = document.getElementById('productGrid');
const nextBtn = document.getElementById('gridNext');
const prevBtn = document.getElementById('gridPrev');
if (!grid || !nextBtn || !prevBtn) return;

const getCardWidth = () => {
  const c = grid.querySelector('.product-card');
  return c ? c.offsetWidth + 24 : 320;
};

nextBtn.addEventListener('click', () => { grid.scrollBy({ left: getCardWidth() * 3, behavior: 'smooth' }); });
prevBtn.addEventListener('click', () => { grid.scrollBy({ left: -getCardWidth() * 3, behavior: 'smooth' }); });

grid.addEventListener('wheel', (e) => {
  if (grid.scrollWidth > grid.clientWidth) {
    e.preventDefault();
    grid.scrollBy({ left: e.deltaY > 0 ? 100 : -100, behavior: 'smooth' });
  }
}, { passive: false });

// Drag fluido con inercia — sin snap, scroll continuo como una cinta
let isDown = false;
let startX = 0;
let startScroll = 0;
let lastX = 0;
let lastTime = 0;
let velocity = 0;
let rafId = null;

grid.style.cursor = 'grab';

grid.addEventListener('mousedown', (e) => {
  if (rafId) { cancelAnimationFrame(rafId); rafId = null; }
  isDown = true;
  startX = e.pageX;
  startScroll = grid.scrollLeft;
  lastX = e.pageX;
  lastTime = performance.now();
  velocity = 0;
  grid.style.cursor = 'grabbing';
  grid.style.userSelect = 'none';
  e.preventDefault();
});

document.addEventListener('mousemove', (e) => {
  if (!isDown) return;
  const now = performance.now();
  const dt = now - lastTime;
  if (dt > 0) {
    velocity = (e.pageX - lastX) / dt;
  }
  lastX = e.pageX;
  lastTime = now;
  grid.scrollLeft = startScroll - (e.pageX - startX);
});

const coast = () => {
  if (Math.abs(velocity) < 0.05) { velocity = 0; return; }
  velocity *= 0.94;
  grid.scrollLeft -= velocity * 16;
  rafId = requestAnimationFrame(coast);
};

const stopDrag = () => {
  if (!isDown) return;
  isDown = false;
  grid.style.cursor = 'grab';
  grid.style.userSelect = '';
  rafId = requestAnimationFrame(coast);
};

document.addEventListener('mouseup', stopDrag);
grid.addEventListener('mouseleave', stopDrag);
});