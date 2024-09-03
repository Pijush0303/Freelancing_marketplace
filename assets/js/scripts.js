// Add box-shadow to navbar on scroll
window.addEventListener('scroll', () => {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 10) {
        navbar.classList.add('sticky-shadow');
    } else {
        navbar.classList.remove('sticky-shadow');
    }
});

// Rotate hero section images
const heroSection = document.querySelector('.hero-section');
const heroImages = [
    '../Images/pexels-sanketgraphy-15547664.jpg',
    '../Images/pexels-wildlittlethingsphoto-27178153.jpg',
    '../Images/Header-1.jpg'
];
let heroImageIndex = 0;

function rotateHeroImages() {
    heroImageIndex = (heroImageIndex + 1) % heroImages.length;
    heroSection.style.backgroundImage = `url(${heroImages[heroImageIndex]})`;
}

setInterval(rotateHeroImages, 5000);

// Rotate about section images
const aboutSection = document.querySelector('.about-section');
const aboutImages = [
    '../Images/Header-3.jpg',
    '../Images/pexels-caio-56759.jpg'
];
let aboutImageIndex = 0;

function rotateAboutImages() {
    aboutImageIndex = (aboutImageIndex + 1) % aboutImages.length;
    aboutSection.style.backgroundImage = `url(${aboutImages[aboutImageIndex]})`;
}

setInterval(rotateAboutImages, 5000);
