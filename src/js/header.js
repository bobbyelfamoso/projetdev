
document.addEventListener('DOMContentLoaded', function() {
    var dropdown = document.querySelector('.dropdown');
    var drop = document.getElementById('drop');
    dropdown.addEventListener('mouseover', function() {
        drop.style.display = 'block';
    });
    dropdown.addEventListener('mouseleave', function() {
        drop.style.display = 'none';
    });
});