document.addEventListener('DOMContentLoaded', function() {

    let b = document.querySelector('body')
    let psp = 0

    document.addEventListener('scroll', (e) => {
        let sp = window.scrollY

        if (0 == sp) {
            if (b.classList.contains('scrolling-down')) {
                b.classList.remove('scrolling-down')
            }
            if (b.classList.contains('scrolling-up')) {
                b.classList.remove('scrolling-up')
            }
        } else if (sp > psp) {
            if (b.classList.contains('scrolling-up')) {
                b.classList.remove('scrolling-up')
            }
            b.classList.add('scrolling-down')
        } else {
            if (b.classList.contains('scrolling-down')) {
                b.classList.remove('scrolling-down')
            }
            b.classList.add('scrolling-up')
        }
        
        psp = sp
    });
});