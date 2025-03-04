let currentIndex = 0;

function showSlide(index) {
  const carousel = document.getElementById('carousel');
  const totalItems = carousel.children[0].children.length; // Total de itens no carrossel
  const itemsPerSlide = 4; // Quantidade de itens por vez a serem exibidos
  const maxIndex = Math.floor(totalItems / itemsPerSlide); // Ajuste do número máximo de índices

  if (index > maxIndex) {
    currentIndex = 0;
  } else if (index < 0) {
    currentIndex = maxIndex;
  } else {
    currentIndex = index;
  }

  const offset = -currentIndex * (100 / itemsPerSlide); // Ajuste o cálculo de offset
  carousel.style.transform = `translateX(${offset}%)`; // Movimenta o carrossel suavemente
}

function nextSlide() {
  showSlide(currentIndex + 1);
}

function prevSlide() {
  showSlide(currentIndex - 1);
}
