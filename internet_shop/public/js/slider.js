"use strict";

var container = document.getElementById('gallery'),
    images = container.getElementsByTagName('img'),
    views = container.getElementsByTagName('b'),
    currentImage = images[0],
    currentView = views[0];

//Скрываем все изображения, короме текущего
for (var i = 0; i < images.length; i++) {
    if (currentImage.src !== images[i].src) {
        images[i].hidden = true;
        views[i].hidden = true;
    }
}

//Управление клавишами
document.body.onkeydown = function () {
    if (event.keyCode === 37 || event.keyCode === 40) {
        document.removeEventListener(document.body.onkeydown, choosePicture(false));
    } else if ((event.keyCode === 39 || event.keyCode === 38)) {
        document.removeEventListener(document.body.onkeydown, choosePicture(true));
    }
};

//Обнуляем переменную
i = 0;

//В зависимости от нажатой кнопки, выбираем изображение для показа
function choosePicture(x) {
    currentImage.hidden = true;
    currentView.hidden = true;
    if (!x) {
        currentImage = images[--i];
        currentView = views[i];
    } else {
        currentImage = images[++i];
        currentView = views[i];
    }
    if (i>(images.length-1)) {
        currentImage = images[0];
        currentView = views[0];
        i = 0;
    } else if (i<0) {
        currentImage = images[images.length-1];
        currentView = views[views.length-1];
        i = images.length-1;
    }
    currentImage.hidden = false;
    currentView.hidden = false;
}
