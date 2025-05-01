const mobile_menu = document.getElementById('mobile-manu-slider');
const slide_btn = document.getElementById('nav-btn');
const body = document.getElementById('body');


slide_btn.addEventListener('click', () => {
    document.documentElement.scrollTop = 0;
    mobile_menu.classList.add('show');
    body.classList.add('noscroll');
});

window.onclick = function (event) {
    if (event.target == mobile_menu) {
        mobile_menu.classList.remove('show');
        body.classList.remove('noscroll');
    }
}