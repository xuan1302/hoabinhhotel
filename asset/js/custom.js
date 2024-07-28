(function ($) {
  // //menu
  // $('.icon-mobile-bar').click(function () {
  //   $('.menu-mobile').addClass('active');
  // })
  // $('.icon-close-menu').click(function () {
  //   $('.menu-mobile').removeClass('active');
  // })
  //
  // $("#pw_custom").on({
  //   keydown: function (e) {
  //     if (e.which === 32)
  //       return false;
  //   },
  //   change: function () {
  //     this.value = this.value.replace(/\s/g, "");
  //   }
  // });
  //
  // //slide
  // var swiper = new Swiper(".list-img-slide", {
  //   slidesPerView: 4,
  //   spaceBetween: 15,
  //   loop: true,
  //   // centeredSlides: true,
  //   autoplay: {
  //     delay: 2500,
  //     disableOnInteraction: false,
  //   },
  //   breakpoints: {
  //     320: {
  //       slidesPerView: 1,
  //     },
  //     640: {
  //       slidesPerView: 2,
  //     },
  //     768: {
  //       slidesPerView: 3,
  //     },
  //     1024: {
  //       slidesPerView: 4,
  //     },
  //   },
  //   // pagination: {
  //   //   el: ".swiper-pagination",
  //   //   clickable: true,
  //   // },
  // });
  //
  //
  // var swiper = new Swiper(".slide-home-bottom", {
  //   slidesPerView: 4,
  //   spaceBetween: 15,
  //   loop: true,
  //   // centeredSlides: true,
  //   autoplay: {
  //     delay: 2500,
  //     disableOnInteraction: false,
  //   },
  //   breakpoints: {
  //     320: {
  //       slidesPerView: 1,
  //     },
  //     640: {
  //       slidesPerView: 2,
  //     },
  //     768: {
  //       slidesPerView: 3,
  //     },
  //     1024: {
  //       slidesPerView: 4,
  //     },
  //   },
  //   // pagination: {
  //   //   el: ".swiper-pagination",
  //   //   clickable: true,
  //   // },
  // });
  var slide_image = new Swiper(".slide-list-image", {
    slidesPerView: 2,
    spaceBetween: 8,
    loop:true,
    centeredSlides: true,
    pagination: {
      el: ".image-pagination",
      clickable: true,
    },
  });

  var slide_room = new Swiper(".list-system-rooms", {
    slidesPerView: 3,
    centeredSlides: true,
    spaceBetween: 24,
    loop:true,
    pagination: {
      el: ".room-pagination",
      clickable: true,
    },
  });

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
    var swiper_post_mobile = new Swiper(".post-list-mobile", {
      slidesPerView: "auto",
      spaceBetween: 20,
      loop: true,
      autoplay: {
        delay: 3500,
        disableOnInteraction: false,
      },
      pagination: {
        // el: ".swiper-pagination",
        clickable: true,
      },
    });
  }
  $(".menu-responsive").click(function (e) {
    e.stopPropagation();
  })
  var $targetDiv = $('#menu-mobile > li.menu-item-has-children');
  $targetDiv.append('<div class="icon-menu-toggle"></div>');
  $('.icon-menu-toggle').click(function (){
    $(this).parent('li.menu-item-has-children').toggleClass('active')
  });

}(jQuery));