// Устанавливаем другой альбом
function setAlbum(i) {
    imf.create('imageFlow', 'xml/set'+i+'.xml', 0.85, 0.20, 1.5, 10, 5, 7);
}

// Инициализация
document.addEventListener('DOMContentLoaded', function() {
    // Устанавливаем первый альбомы
    setAlbum(1);

    // Привязываем обработчик события 'click' к '.sets'
    [].forEach.call( document.querySelectorAll('.sets'), function(el) {
        el.addEventListener('click', function(e) {
            imf.reinit();
            setAlbum(e.currentTarget.id);
        }, false);
    });
});