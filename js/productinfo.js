document.addEventListener('DOMContentLoaded', function() {
    const stars = document.querySelectorAll('#stars .star');
    const calificacionInput = document.getElementById('calificacion');
    let currentRating = 0;

    stars.forEach(star => {
        star.addEventListener('mouseover', function() {
            const val = parseInt(this.getAttribute('data-value'));
            highlightStars(val);
        });
        star.addEventListener('mouseout', function() {
            highlightStars(currentRating);
        });
        star.addEventListener('click', function() {
            currentRating = parseInt(this.getAttribute('data-value'));
            calificacionInput.value = currentRating;
            highlightStars(currentRating);
        });
    });

    function highlightStars(rating) {
        stars.forEach(star => {
            if (parseInt(star.getAttribute('data-value')) <= rating) {
                star.style.color = '#ffc107';
            } else {
                star.style.color = '#ccc';
            }
        });
    }
});

