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
        imgElement.classList.add('is-changing'); // Clase para opacidad 0

        setTimeout(() => {
            imgElement.src = themePath + images[index];
            
            // Esperamos a que la imagen cargue para volver a mostrarla
            imgElement.onload = () => {
                imgElement.classList.remove('is-changing');
            };
        }, 200);

        // Actualizar dots
        dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === index);
        });
    };

    nextBtn.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % images.length;
        updateSlider(currentIndex);
    });

    prevBtn.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        updateSlider(currentIndex);
    });

    dots.forEach((dot, i) => {
        dot.addEventListener('click', () => {
            currentIndex = i;
            updateSlider(currentIndex);
        });
    });

});


document.addEventListener('DOMContentLoaded', () => {
    const grid = document.getElementById('productGrid');
    const nextBtn = document.getElementById('gridNext');
    const prevBtn = document.getElementById('gridPrev');

    if (!grid || !nextBtn || !prevBtn) return;

    // Función para calcular cuánto desplazar
    const getScrollAmount = () => {
        const firstCard = grid.querySelector('.product-card');
        const cardWidth = firstCard.offsetWidth;
        const gap = 24;
        
        // Si quieres avanzar de 3 en 3:
        return (cardWidth + gap) * 3;
    };

    nextBtn.addEventListener('click', () => {
        grid.scrollBy({
            left: getScrollAmount(),
            behavior: 'smooth'
        });
    });

    prevBtn.addEventListener('click', () => {
        grid.scrollBy({
            left: -getScrollAmount(),
            behavior: 'smooth'
        });
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const hamburger = document.querySelector('.hamburger');
    const nav = document.querySelector('.main-navigation');
    const menu = document.getElementById('primary-menu');
    if (!hamburger || !nav) return;

    hamburger.addEventListener('click', () => {
        const expanded = hamburger.getAttribute('aria-expanded') === 'true';
        hamburger.setAttribute('aria-expanded', String(!expanded));
        nav.classList.toggle('is-open');
    });
});


