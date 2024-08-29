
//Galeria
const slides = document.querySelectorAll('.slider__slide');
const slider = document.querySelector('.slider__wrapper');
const prevBtn = document.querySelector('.slider__control--prev');
const nextBtn = document.querySelector('.slider__control--next');
const indicatorsContainer = document.querySelector('.slider__indicators');
let currentSlide = 0;
let intervalId;

function init() {
  createIndicators();
  updateIndicator();
  startInterval();
}

function createIndicators() {
  for (let i = 0; i < slides.length; i++) {
    const indicator = document.createElement('div');
    indicator.classList.add('slider__indicator');
    indicator.addEventListener('click', () => {
      currentSlide = i;
      goToSlide(currentSlide);
      updateIndicator();
    });
    indicatorsContainer.appendChild(indicator);
  }
}

function updateIndicator() {
  const indicators = document.querySelectorAll('.slider__indicator');
  for (let i = 0; i < indicators.length; i++) {
    if (i === currentSlide) {
      indicators[i].classList.add('slider__indicator--active');
    } else {
      indicators[i].classList.remove('slider__indicator--active');
    }
  }
}

function startInterval() {
  intervalId = setInterval(() => {
    currentSlide++;
    if (currentSlide === slides.length) {
      currentSlide = 0;
    }
    goToSlide(currentSlide);
    updateIndicator();
  }, 5000);
}

function stopInterval() {
  clearInterval(intervalId);
}

function goToSlide(Milenio21) {
  slider.style.transform = `translateX(-${Milenio21 * 100}%)`;
}

prevBtn.addEventListener('click', () => {
  currentSlide--;
  if (currentSlide < 0) {
    currentSlide = slides.length - 1;
  }
  goToSlide(currentSlide);
  updateIndicator();
  stopInterval();
});

nextBtn.addEventListener('click', () => {
  currentSlide++;
  if (currentSlide === slides.length) {
    currentSlide = 0;
  }
  goToSlide(currentSlide);
  updateIndicator();
  stopInterval();
});

init();
  






  
  
  


