function sidebarToggle() {
    let sideBar = document.querySelector('.my-drawer-overlay');
    if (sideBar.classList.contains('active')) {
        sideBar.classList.remove('active');
    } else {
        sideBar.classList.toggle('active');
    }
}

function redirectTo(url) {
    window.location.href = url;
}