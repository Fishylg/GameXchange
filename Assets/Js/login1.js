function togglePassword() {
    const passwordInput = document.getElementById('password');
    const eyeClosed = document.getElementById('eye');
    const eyeOpen = document.getElementById('eye-open');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeClosed.style.display = 'none';
        eyeOpen.style.display = 'inline';
    } else {
        passwordInput.type = 'password';
        eyeClosed.style.display = 'inline';
        eyeOpen.style.display = 'none';
    }
}