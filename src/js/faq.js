// anim pour les questions du faq open pour voir la reponse et changement du + en - en fonction de l'etat 
var questions = document.querySelectorAll('.faq-question');
questions.forEach(function (question) {
    question.addEventListener('click', function () {
        var item = question.closest('.faq-item');
        item.classList.toggle('expanded');
        var icon = question.querySelector('.icon');
        if (item.classList.contains('expanded')) {
            icon.textContent = '-';
        } else {
            icon.textContent = '+';
        }
    });
});