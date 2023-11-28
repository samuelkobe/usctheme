// ––––– Gallery ––––– //
if (document.querySelectorAll(".swiperGallery").length > 0) {
  // init paired image slider
  const galleySlider = () => {
    let galleySliders = document.querySelectorAll(".swiperGallery");
    let prevArrow = document.querySelectorAll(".swiper-button-prev");
    let nextArrow = document.querySelectorAll(".swiper-button-next");
    galleySliders.forEach((slider, index) => {
      // this bit checks if there's more than 1 slide, if there's only 1 it won't loop
      let sliderLength = slider.children[0].children.length;
      let result = sliderLength > 1 ? true : false;
      const swiper = new Swiper(slider, {
        slidesPerView: 1,
        loop: result,
        allowTouchMove: true,
        simulateTouch: true,
        grabCursor: true,
        effect: "creative",
        speed: 750,
        creativeEffect: {
          prev: {
            shadow: false,
            translate: [0, 0, -400],
          },
          next: {
            translate: ["100%", 0, 0],
          },
        },
        navigation: {
          // the 'index' bit below is just the order of the class in the queryselectorAll array, so the first one would be NextArrow[0] etc
          nextEl: nextArrow[index],
          prevEl: prevArrow[index],
        },
      });
    });
  };
  window.addEventListener("load", galleySlider);
}
