function sidebarToggle() {
    let sideBar = document.querySelector('#sidebar'); 
    if (sideBar.classList.contains('active')) {
        sideBar.classList.remove('active');
    } else {
        sideBar.classList.toggle('active');
    }
}
