$ = jQuery

$(document).ready(function () {
  $('.slider-wrap').slick({
    autoplay: true,
    autoplaySpeed: 2000,
    speed: 2000,
    draggable: true,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    dots: true,
  })
})
