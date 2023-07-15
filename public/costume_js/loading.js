var loader = document.querySelector('.loader');

function hideLoader() {
    loader.style.display = 'none';
}
window.addEventListener('load', hideLoader);
var loader = document.querySelector('.loader');

function hideLoader() {
    loader.classList.add('hidden');
}
window.addEventListener('load', hideLoader);

var load = document.querySelector('.loading_page');

function loading_page() {
    load.style.display = 'none';
}
window.addEventListener('load_page', loading_page);
var load = document.querySelector('.loading_page');

function loading_page() {
    load.classList.add('hidden');
}

var loadingPage = document.querySelector('.loading_page');

function removeLoadingPage() {
    loadingPage.parentNode.removeChild(loadingPage);
}

window.addEventListener('load', function () {
    hideLoader();
    loading_page();
    setTimeout(removeLoadingPage, 1000);
});
