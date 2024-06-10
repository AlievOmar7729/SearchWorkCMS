document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('searchButton').addEventListener('click', function(event) {
        event.preventDefault(); // Предотвратить стандартное поведение кнопки

        let position = document.getElementById('searchInput-position').value;
        let location = document.getElementById('searchInput-city').value;
        let salaryFrom = document.getElementById('salaryFrom').value;
        let salaryTo = document.getElementById('salaryTo').value;
        let fullTime = document.getElementById('full-time').checked;
        let partTime = document.getElementById('part-time').checked;

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
        if (salaryFrom) {
            url += '/' + salaryFrom;
        }
        else {
            url += '/'+ false
        }
        if (salaryTo) {
            url += '/' + salaryTo;
        }
        else {
            url += '/'+ false
        }
        url += '/' + fullTime + '/' + partTime;

        if(url === '/vacancy/index/false/false/false/false/false/false')
            url = '/vacancy/index'
        window.location.href = url;
    });
});

document.addEventListener('DOMContentLoaded', function() {
    let searchButton = document.getElementById('searchButton');

    // Проверка, есть ли сохраненные значения в локальном хранилище
    let savedPosition = localStorage.getItem('searchInput-position');
    let savedLocation = localStorage.getItem('searchInput-city');
    let savedSalaryFrom = localStorage.getItem('salaryFrom');
    let savedSalaryTo = localStorage.getItem('salaryTo');
    let savedFullTime = localStorage.getItem('full-time');
    let savedPartTime = localStorage.getItem('part-time');

    if (savedPosition) {
        document.getElementById('searchInput-position').value = savedPosition;
    }
    if (savedLocation) {
        document.getElementById('searchInput-city').value = savedLocation;
    }
    if (savedSalaryFrom) {
        document.getElementById('salaryFrom').value = savedSalaryFrom;
    }
    if (savedSalaryTo) {
        document.getElementById('salaryTo').value = savedSalaryTo;
    }
    if (savedFullTime) {
        document.getElementById('full-time').checked = savedFullTime === 'true';
    }
    if (savedPartTime) {
        document.getElementById('part-time').checked = savedPartTime === 'true';
    }

    searchButton.addEventListener('click', function(event) {
        event.preventDefault();

        localStorage.setItem('searchInput-position', document.getElementById('searchInput-position').value);
        localStorage.setItem('searchInput-city', document.getElementById('searchInput-city').value);
        localStorage.setItem('salaryFrom', document.getElementById('salaryFrom').value);
        localStorage.setItem('salaryTo', document.getElementById('salaryTo').value);
        localStorage.setItem('full-time', document.getElementById('full-time').checked);
        localStorage.setItem('part-time', document.getElementById('part-time').checked);


    });
});
