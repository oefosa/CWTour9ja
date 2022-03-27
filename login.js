const password = document.getElementById('password');
const eyeCompontent = document.getElementById("display-eye")

eyeCompontent.addEventListener('click', toggleEye)

function toggleEye() {
    if(password.type === 'password') {
        password.type = 'text'
        eyeCompontent.textContent = "visibility_off"
    } else {
        password.type = "password"
        eyeCompontent.textContent = "visibility"
    }
}