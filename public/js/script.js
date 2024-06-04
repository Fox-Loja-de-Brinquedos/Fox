//Previne o envio de formulário de pesquisa caso esteja vazio
document.addEventListener("DOMContentLoaded", function () {
    // Captura o formulário
    var form = document.querySelector(".form-inline");

    // Adiciona um ouvinte de evento para a submissão do formulário
    form.addEventListener("submit", function (event) {
        // Captura o valor do campo de pesquisa
        var searchTerm = document.querySelector(".searchbar").value.trim();

        // Verifica se o campo de pesquisa está vazio
        if (searchTerm === "") {
            // Impede o envio do formulário
            event.preventDefault();
        }
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

