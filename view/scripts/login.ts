const usernameInput: HTMLInputElement = document.getElementById('enter-usr') as HTMLInputElement;
const passwordInput: HTMLInputElement = document.getElementById('enter-pass') as HTMLInputElement;
const enterButton: HTMLInputElement = document.getElementById('button-enter') as HTMLInputElement;

function enterValid(): boolean {
    return usernameInput.value.length == 0 || passwordInput.value.length == 0;
}

usernameInput?.addEventListener('input', () => {
    enterButton.disabled = enterValid();
})

passwordInput?.addEventListener('input', () => {
    enterButton.disabled = enterValid();
})