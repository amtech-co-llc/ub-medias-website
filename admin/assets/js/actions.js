const profile_menu = document.getElementById('profile-menu');
const profile_menu_contents = document.getElementById('profile-menu-contents');
const nofication_menu = document.getElementById('nofication-popup');
const nofication_btn = document.getElementById('nofication-btn');


profile_menu.addEventListener('click', (event) => {
    event.stopPropagation(); // Prevent the click from bubbling up to the window
    profile_menu_contents.classList.toggle('show');
    nofication_menu.classList.remove('show');
});

nofication_btn.addEventListener('click', () => {
    nofication_menu.classList.toggle('show');
    profile_menu_contents.classList.remove('show');
});

window.addEventListener('click', function (event) {
    if (profile_menu_contents.classList.contains('show') &&
        !profile_menu_contents.contains(event.target) &&
        !profile_menu.contains(event.target)) {
        profile_menu_contents.classList.remove('show');
    }

    if (nofication_menu.classList.contains('show') &&
        !nofication_menu.contains(event.target) &&
        !nofication_btn.contains(event.target)) {
        nofication_menu.classList.remove('show');
    }
});


