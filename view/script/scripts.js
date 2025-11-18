"use strict";
function toCamel(input) {
    let splitted = input.split(' ');
    let rebuild = '';
    splitted.forEach((split, index) => {
        split = split.toLowerCase();
        if (index !== 0)
            split = split.charAt(0).toUpperCase() + split.slice(1);
        rebuild = rebuild.concat(split);
    });
    return rebuild;
}
Array.from(document.querySelectorAll('body.index button')).forEach((button) => {
    button.addEventListener('click', () => {
        window.location.href = `/view/page/${toCamel(button.textContent)}.php`;
    });
});
//# sourceMappingURL=scripts.js.map