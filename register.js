const password = document.getElementById('password');
const confirmPassword = document.getElementById("confirm-password")
const eyeCompontent2 = document.getElementById("display-eye-confirm")
const eyeCompontent = document.getElementById("display-eye")
console.log(eyeCompontent2)

eyeCompontent.addEventListener('click', toggleEye)
eyeCompontent2.addEventListener('click', toggle)

function toggleEye() {
    if(password.type === 'password') {
        password.type = 'text'
        eyeCompontent.textContent = "visibility_off"
    } else {
        password.type = "password"
        eyeCompontent.textContent = "visibility"
    }
}

function toggle() {
    if(confirmPassword.type === 'password') {
        confirmPassword.type = 'text'
        eyeCompontent2.textContent = "visibility_off"
    } else {
        confirmPassword.type = "password"
        eyeCompontent2.textContent = "visibility"
    }
}