document.addEventListener("DOMContentLoaded", function () {

  var form = document.querySelector('#newsletter');
  form.addEventListener('submit', function (e) {
    e.preventDefault();

    // Exibe a mensagem
    var mensagem = document.querySelector('.mensagem');
    mensagem.style.display = 'block';

    // Após um tempo, oculta a mensagem
    setTimeout(function () {
      mensagem.style.display = 'none';
    }, 1700);
  });

  //Carroussel de produto
  var swiperOfertas = new Swiper(".mySwiperProdutoOfertas", {
    slidesPerView: 1,
    spaceBetween: 37,
    slidesPerGroup: 1,
    loop: true,
    loopFillGroupWithBlank: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".offers-next",
      prevEl: ".offers-prev",
    },
    breakpoints: {
      768: {
        slidesPerView: 2,
        slidesPerGroup: 2,
      },
      992: {
        slidesPerView: 3,
        slidesPerGroup: 3,
      },
      1200: {
        slidesPerView: 4,
        slidesPerGroup: 4,
      },
    },
  });

  var swiperLancamentos = new Swiper(".mySwiperProdutoLancametos", {
    slidesPerView: 1,
    spaceBetween: 37,
    slidesPerGroup: 1,
    loop: true,
    loopFillGroupWithBlank: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".releases-next",
      prevEl: ".releases-prev",
    },
    breakpoints: {
      768: {
        slidesPerView: 2,
        slidesPerGroup: 2,
      },
      992: {
        slidesPerView: 3,
        slidesPerGroup: 3,
      },
      1200: {
        slidesPerView: 4,
        slidesPerGroup: 4,
      },
    },
  });


  var mySwiperCategory = new Swiper(".mySwiperCategory", {
    slidesPerView: 1,
    spaceBetween: 37,
    slidesPerGroup: 1,
    loop: true,
    loopFillGroupWithBlank: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".category-next",
      prevEl: ".category-prev",
    },
    breakpoints: {
      576: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 3,
      },
      992: {
        slidesPerView: 4,
      },
    },
  });


  var swiperMaisVendidos = new Swiper(".mySwiperProdutoMaisVendidos", {
    slidesPerView: 1,
    spaceBetween: 37,
    slidesPerGroup: 1,
    loop: true,
    loopFillGroupWithBlank: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".best-sellers-next",
      prevEl: ".best-sellers-prev",
    },
    breakpoints: {
      768: {
        slidesPerView: 2,
        slidesPerGroup: 2,
      },
      992: {
        slidesPerView: 3,
        slidesPerGroup: 3,
      },
      1200: {
        slidesPerView: 4,
        slidesPerGroup: 4,
      },
    },
  });

});

