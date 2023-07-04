document.addEventListener('DOMContentLoaded', function() {
    let menu = document.querySelector('#menu')
    let menuTriggers = document.querySelectorAll('[data-action="toggle-menu"]')
    if (menu && menuTriggers) {
        menuTriggers.forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault()
                menu.classList.toggle('visible')
            })
        })
    }
});