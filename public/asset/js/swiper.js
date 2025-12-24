const wbHomeBanner = new Swiper("#wb-home-banner", {
  slidesPerView: 1,
  loop: true,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: "#wb-home-banner .wb-home-next",
    prevEl: "#wb-home-banner .wb-home-prev",
  },
  pagination: {
    el: "#wb-home-banner .wb-home-pagination",
    clickable: true,
  },
});

// Initialize main product slider
const mainSwiper = new Swiper(".main-swiper", {
  slidesPerView: 1,
  spaceBetween: 15,
  loop: true,
  // autoplay: {
  //   delay: 3000,
  //   disableOnInteraction: false,
  // },

  navigation: {
    nextEl: ".main-swiper .swiper-button-next",
    prevEl: ".main-swiper .swiper-button-prev",
  },

  pagination: {
    el: ".main-swiper .swiper-pagination",
    clickable: true,
  },

  // FULL RESPONSIVE SETTINGS
  breakpoints: {
    0: {
      slidesPerView: 1,
      spaceBetween: 10,
      centeredSlides: true,
    },
    480: {
      slidesPerView: 1.3,
      spaceBetween: 12,
      centeredSlides: true,
    },
    640: {
      slidesPerView: 2,
      spaceBetween: 15,
      centeredSlides: false,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 20,
    },
    1024: {
      slidesPerView: 4,
      spaceBetween: 25,
    },
  },
});

// Initialize product image swipers with hover functionality
document.querySelectorAll(".product-image-swiper").forEach((el) => {
  const swiper = new Swiper(el, {
    slidesPerView: 1,
    effect: "fade",
    allowTouchMove: false,
    loop: true,
  });

  // Auto slide on hover
  let hoverInterval;
  el.closest(".product-card").addEventListener("mouseenter", () => {
    hoverInterval = setInterval(() => {
      swiper.slideNext();
    }, 1000);
  });

  el.closest(".product-card").addEventListener("mouseleave", () => {
    clearInterval(hoverInterval);
    swiper.slideTo(0);
  });
});

// MAIN SLIDER #2
const mainSwiper2 = new Swiper("#main-swiper-2", {
  slidesPerView: 1,
  spaceBetween: 20,
  loop: true,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: "#main-swiper-2 .swiper-button-next",
    prevEl: "#main-swiper-2 .swiper-button-prev",
  },
  pagination: {
    el: "#main-swiper-2 .swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    640: { slidesPerView: 2 },
    768: { slidesPerView: 3 },
    1024: { slidesPerView: 4 },
  },
});

// IMAGE SWIPERS for SLIDER #2
document.querySelectorAll(".product-image-swiper-2").forEach((el) => {
  const swiper = new Swiper(el, {
    slidesPerView: 1,
    effect: "fade",
    allowTouchMove: false,
    loop: true,
  });

  let hoverInterval;
  el.closest(".product-card").addEventListener("mouseenter", () => {
    hoverInterval = setInterval(() => swiper.slideNext(), 1000);
  });

  el.closest(".product-card").addEventListener("mouseleave", () => {
    clearInterval(hoverInterval);
    swiper.slideTo(0);
  });
});

// product details
// Moving zoom on hover
const slideImages = document.querySelectorAll(".slide img");

slideImages.forEach((img) => {
  const slide = img.parentElement;

  img.addEventListener("mouseenter", function () {
    this.style.transform = "scale(2)";
  });

  img.addEventListener("mousemove", function (e) {
    const rect = slide.getBoundingClientRect();
    const x = ((e.clientX - rect.left) / rect.width) * 100;
    const y = ((e.clientY - rect.top) / rect.height) * 100;

    this.style.transformOrigin = `${x}% ${y}%`;
    this.style.transform = "scale(2)";
  });

  img.addEventListener("mouseleave", function () {
    this.style.transform = "scale(1)";
    this.style.transformOrigin = "center center";
  });
});

// Navigation arrows
const radioButtons = document.querySelectorAll('input[name="slider"]');
const prevArrow = document.getElementById("prevArrow");
const nextArrow = document.getElementById("nextArrow");

function updateArrows() {
  const currentSlide = document.querySelector(
    'input[name="slider"]:checked'
  ).id;
  const slideNum = parseInt(currentSlide.replace("slide", ""));

  const prevNum = slideNum === 1 ? 4 : slideNum - 1;
  const nextNum = slideNum === 4 ? 1 : slideNum + 1;

  prevArrow.setAttribute("for", `slide${prevNum}`);
  nextArrow.setAttribute("for", `slide${nextNum}`);
}

radioButtons.forEach((radio) => {
  radio.addEventListener("change", updateArrows);
});

updateArrows();
