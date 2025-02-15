function togglePassword() {
    const passwordInput = document.getElementById('password');
    const eyeClosed = document.getElementById('eye');
    const eyeOpen = document.getElementById('eye-open');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text'; // Torna a senha visível
        eyeClosed.style.display = 'none'; // Esconde o olho fechado
        eyeOpen.style.display = 'inline'; // Exibe o olho aberto
    } else {
        passwordInput.type = 'password'; // Oculta a senha
        eyeClosed.style.display = 'inline'; // Exibe o olho fechado
        eyeOpen.style.display = 'none'; // Esconde o olho aberto
    }
}