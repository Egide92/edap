const button = document.getElementById('toggleButton');
const contenu = document.getElementById('contenu');

button.addEventListener('click', () => {
    if (contenu.style.display === 'none') {
        contenu.style.display = 'block';
    } else {
        contenu.style.display = 'none';
    }
});