$ = jQuery

$(document).ready(function () {
  // testimonial slider
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

  // franchise process slider
  $('.franchise-process-wrapper').slick({
    autoplay: true,
    autoplaySpeed: 2000,
    speed: 2000,
    draggable: true,
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    arrows: false,
    dots: false,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  })
})
