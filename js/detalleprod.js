const stars = document.querySelectorAll(".stars span");
const result = document.getElementById("result");

stars.forEach(star => {
  star.addEventListener("click", () => {
    let rating = star.getAttribute("data-value");
    result.innerText = `Calificación: ${rating}`;
    stars.forEach(s => s.style.color = s.dataset.value <= rating ? "gold" : "gray");
  });
});

//MENU LATERAL DASHBOARD
document.addEventListener('DOMContentLoaded', function () {
  const OpenMenu = document.getElementById('OpenMenu');
  const CloseMenu = document.getElementById('CloseMenu');
  const sidebar = document.getElementById('sidebar');

  //para abrir el menu:
  OpenMenu.addEventListener('click', function () {
    sidebar.classList.add('active');
  });

  //para cerrar el menu:
  CloseMenu.addEventListener('click', function () {
    sidebar.classList.remove('active');
  });

  //cerrar el menu si se da click afuera de el:
  Closesidebar.addEventListener('click', function (event) {
    if (!sidebar.contains(event.target) && !openMenu.contains(event.target)) {
      sidebar.classList.remove('active');
    }
  });
});
//MENU LATERAL DASHBOARD
