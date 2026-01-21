const colorRed: string = "#8b2b13";

const enlistUsername: HTMLInputElement = document.getElementById('enlist-usr')

const togglePassword: HTMLImageElement = document.getElementById('toggle-password') as HTMLImageElement;

const fadeImage = (callback: () => void) => {
    togglePassword.style.opacity = '0.7';
    setTimeout(() => {
        callback();
        togglePassword.style.opacity = '1';
    }, 100);
}

togglePassword.addEventListener('mouseenter', () => {
    fadeImage(() => {
        if (togglePassword.src.includes('hidePassword')) {
            togglePassword.src = togglePassword.src.replace('hidePassword', 'hidePasswordHover');
        } else {
            togglePassword.src = togglePassword.src.replace('showPassword', 'showPasswordHover');
        }
    });
})
togglePassword.addEventListener('mouseleave', () => {
    fadeImage(() => {
        if (togglePassword.src.includes('hidePassword')) {
            togglePassword.src = togglePassword.src.replace('hidePasswordHover', 'hidePassword');
        } else {
            togglePassword.src = togglePassword.src.replace('showPasswordHover', 'showPassword');
        }
    });
})

togglePassword.addEventListener('click', () => {
    const input: HTMLInputElement = togglePassword.parentElement?.children[0] as HTMLInputElement;
    
    fadeImage(() => {
        if (togglePassword.src.includes('hidePassword')) {
            togglePassword.src = togglePassword.src.replace('hidePassword', 'showPassword');
            togglePassword.title = 'Hide password';
            input.type = 'text';
        } else {
            togglePassword.src = togglePassword.src.replace('showPassword', 'hidePassword');
            togglePassword.title = 'Show password';
            input.type = 'password';
        }
    });
})