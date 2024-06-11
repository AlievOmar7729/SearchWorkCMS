document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('searchButton').addEventListener('click', function(event) {
        event.preventDefault(); // Предотвратить стандартное поведение кнопки

        let position = document.getElementById('searchInput-position').value;
        let location = document.getElementById('searchInput-city').value;

        let url = '/vacancy/index';

        // Проверка и добавление параметров к URL
        if (position) {
            url += '/' + position;
        }
        else {
            url += '/' + false
        }
        if (location) {
            url += '/' + location;
        }
        else {
            url += '/' + false
        }


        if(url === '/vacancy/index/false/false')
            url = '/vacancy/index'
        window.location.href = url;
    });
});

document.addEventListener('DOMContentLoaded', function() {
    let searchButton = document.getElementById('searchButton');

    // Проверка, есть ли сохраненные значения в локальном хранилище
    let savedPosition = localStorage.getItem('searchInput-position');
    let savedLocation = localStorage.getItem('searchInput-city');


    if (savedPosition) {
        document.getElementById('searchInput-position').value = savedPosition;
    }
    if (savedLocation) {
        document.getElementById('searchInput-city').value = savedLocation;
    }


    searchButton.addEventListener('click', function(event) {
        event.preventDefault();

        localStorage.setItem('searchInput-position', document.getElementById('searchInput-position').value);
        localStorage.setItem('searchInput-city', document.getElementById('searchInput-city').value);



    });
});
