const burger = document.querySelector('.menu');
const lines = document.querySelectorAll('.menu_item');

function toggleBurger() {
  lines.forEach((line) => line.classList.toggle('active'));
}

burger.addEventListener('click', toggleBurger);