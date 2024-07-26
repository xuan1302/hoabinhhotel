(function ($) {
  // //menu
  // $('.icon-mobile-bar').click(function () {
  //   $('.menu-mobile').addClass('active');
  // })
  // $('.icon-close-menu').click(function () {
  //   $('.menu-mobile').removeClass('active');
  // })

  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 2,
    spaceBetween: 8,
    centeredSlides: true,
    loop: true,
    autoplay: {
      delay: 3500,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination-img-hotel",
      clickable: true,
    },
  });

  var home_slide = new Swiper(".slide-home", {
    slidesPerView: 1,
    spaceBetween: 0,
    // centeredSlides: true,
    loop: true,
    autoplay: {
      delay: 3500,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination-slide-home",
      clickable: true,
    },
  });

  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('#back-to-top').fadeIn();
    } else {
      $('#back-to-top').fadeOut();
    }
  });

  $('#back-to-top').click(function() {
    $('html, body').animate({ scrollTop: 0 }, 600);
    return false;
  });

  $('.icon-menu-mobile').click(function () {

    setTimeout(()=>{
          $('.menu-responsive').addClass('show-mn');
        }
        , 100)
  })
  $('.icon-close-res-menu img').click(function () {
    $('.menu-responsive').removeClass('show-mn');
  })

  $(document).on("click", function(e) {
    if ($(e.target) != $(".menu-responsive") && $(".menu-responsive").hasClass("show-mn")) {
      $(".menu-responsive").removeClass("show-mn");
    }
  })
  if(jQuery(window).width() < 767) {

  }


}(jQuery));