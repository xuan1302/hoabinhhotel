(function ($) {
  let data = $('#list-register').val();
  //console.log(data)
  $('#coporation').hide();
  $("#individual .item-input input").prop('required', true);
  $('#list-register').on('change', function (e) {
    data = this.value;
    // $("input").prop('required',true);
    if (data == 'individual') {
      $('#individual').show();
      $('#coporation').hide();
      $("#individual .item-input input").prop('required', true);
      $("#coporation .item-input input").prop('required', false);
    }
    if (data == 'coporation') {
      $('#coporation').show();
      $('#individual').hide();
      $("#coporation .item-input input").prop('required', true);
      $("#individual .item-input input").prop('required', false);
    }
  })

  //menu
  $('.icon-mobile-bar').click(function () {
    $('.menu-mobile').addClass('active');
  })
  $('.icon-close-menu').click(function () {
    $('.menu-mobile').removeClass('active');
  })

  $("#pw_custom").on({
    keydown: function (e) {
      if (e.which === 32)
        return false;
    },
    change: function () {
      this.value = this.value.replace(/\s/g, "");
    }
  });
  
  //slide
  var swiper = new Swiper(".list-img-slide", {
    slidesPerView: 4,
    spaceBetween: 15,
    loop: true,
    // centeredSlides: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
      },
      640: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 3,
      },
      1024: {
        slidesPerView: 4,
      },
    },
    // pagination: {
    //   el: ".swiper-pagination",
    //   clickable: true,
    // },
  });


  var swiper = new Swiper(".slide-home-bottom", {
    slidesPerView: 4,
    spaceBetween: 15,
    loop: true,
    // centeredSlides: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
      },
      640: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 3,
      },
      1024: {
        slidesPerView: 4,
      },
    },
    // pagination: {
    //   el: ".swiper-pagination",
    //   clickable: true,
    // },
  });
}(jQuery));