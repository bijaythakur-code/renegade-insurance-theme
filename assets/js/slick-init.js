$ = jQuery

$(document).ready(function () {
  $('.slider-wrap').slick({
    autoplay: false,
    autoplaySpeed: 1000,
    speed: 1000,
    draggable: true,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    dots: true,
  })
})
