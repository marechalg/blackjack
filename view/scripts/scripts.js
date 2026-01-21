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
const usernameInput = document.getElementById('enter-usr');
const passwordInput = document.getElementById('enter-pass');
const enterButton = document.getElementById('button-enter');
function enterValid() {
    return usernameInput.value.length == 0 || passwordInput.value.length == 0;
}
usernameInput?.addEventListener('input', () => {
    enterButton.disabled = enterValid();
});
passwordInput?.addEventListener('input', () => {
    enterButton.disabled = enterValid();
});
const colorRed = "#8b2b13";
const enlistUsername = document.getElementById('enlist-usr');
const togglePassword = document.getElementById('toggle-password');
const fadeImage = (callback) => {
    togglePassword.style.opacity = '0.7';
    setTimeout(() => {
        callback();
        togglePassword.style.opacity = '1';
    }, 100);
};
togglePassword.addEventListener('mouseenter', () => {
    fadeImage(() => {
        if (togglePassword.src.includes('hidePassword')) {
            togglePassword.src = togglePassword.src.replace('hidePassword', 'hidePasswordHover');
        }
        else {
            togglePassword.src = togglePassword.src.replace('showPassword', 'showPasswordHover');
        }
    });
});
togglePassword.addEventListener('mouseleave', () => {
    fadeImage(() => {
        if (togglePassword.src.includes('hidePassword')) {
            togglePassword.src = togglePassword.src.replace('hidePasswordHover', 'hidePassword');
        }
        else {
            togglePassword.src = togglePassword.src.replace('showPasswordHover', 'showPassword');
        }
    });
});
togglePassword.addEventListener('click', () => {
    const input = togglePassword.parentElement?.children[0];
    fadeImage(() => {
        if (togglePassword.src.includes('hidePassword')) {
            togglePassword.src = togglePassword.src.replace('hidePassword', 'showPassword');
            togglePassword.title = 'Hide password';
            input.type = 'text';
        }
        else {
            togglePassword.src = togglePassword.src.replace('showPassword', 'hidePassword');
            togglePassword.title = 'Show password';
            input.type = 'password';
        }
    });
});
//# sourceMappingURL=scripts.js.map