// set slider
const slider = new Swiper(".slider", {
  centeredSlides: true,
  slidesPerView: "auto",
  spaceBetween: 30,
  loop: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
    // reverseDirection: true,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
    dynamicBullets: true,
  },
});
