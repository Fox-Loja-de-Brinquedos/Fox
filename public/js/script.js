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
    slidesPerView: 4,
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
  });

  var swiperLancamentos = new Swiper(".mySwiperProdutoLancametos", {
    slidesPerView: 4,
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
  });


  var mySwiperCategory = new Swiper(".mySwiperCategory", {
    slidesPerView: 4,
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
  });


  var swiperMaisVendidos = new Swiper(".mySwiperProdutoMaisVendidos", {
    slidesPerView: 4,
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
  });
});

