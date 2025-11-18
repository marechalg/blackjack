Array.from(document.querySelectorAll('body.index button')).forEach((button: Element) => {
    button.addEventListener('click', () => {
        window.location.href = `/view/page/${toCamel(button.textContent)}.php`;
    })
})

if (window.screenTop && window.screenY) {
    alert('caca');
    if (document.documentElement.requestFullscreen) {
        document.documentElement.requestFullscreen();
    }
}