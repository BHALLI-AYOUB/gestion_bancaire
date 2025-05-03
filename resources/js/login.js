document.getElementById("see-password").addEventListener('change', function () {
    let eye = document.getElementById("see-password-label");
    let inputPass = document.getElementById("password");

    if (this.checked) {
        eye.classList.remove('fa-eye-slash');
        eye.classList.add('fa-eye');
        inputPass.type = "text";
    } else {
        eye.classList.remove('fa-eye');
        eye.classList.add('fa-eye-slash');
        inputPass.type = "password";
    }
});
