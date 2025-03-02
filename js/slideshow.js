let slideIndex = 0;
const slides = document.querySelectorAll('.mySlides');
const slideDuration = 5000; // Time per slide (in ms)

// Show slide
function showSlide(n) {
  slides.forEach((slide) => {
    slide.style.display = 'none'; 
    slide.classList.remove('slide-in-right', 'slide-out-left');
  });

  slides[n].style.display = 'block';
  slides[n].classList.add('slide-in-right');
}

// Go to the next slide
function nextSlide() {
  slides[slideIndex].classList.add('slide-out-left');
  
  setTimeout(() => {
    slideIndex = (slideIndex + 1) % slides.length;
    showSlide(slideIndex);
  }, 500); // Match timeout to animation duration
}

// Auto slide
function autoSlide() {
  nextSlide();
}

// Start the slideshow
showSlide(slideIndex);
setInterval(autoSlide, slideDuration);
