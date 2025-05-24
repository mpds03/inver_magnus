const stars = document.querySelectorAll(".stars span");
const result = document.getElementById("result");

stars.forEach(star => {
  star.addEventListener("click", () => {
    let rating = star.getAttribute("data-value");
    result.innerText = `Calificación: ${rating}`;
    stars.forEach(s => s.style.color = s.dataset.value <= rating ? "gold" : "gray");
  });
});

