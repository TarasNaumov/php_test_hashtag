let passwordInput = document.querySelector("#studentPassword")
let passwordChanger = document.querySelector(".visiblePassword")

passwordChanger.checked = true;
if (passwordChanger.checked == false) {
    passwordInput.type = "text"
    passwordChanger.classList.remove("hiddenPassword");
    passwordChanger.classList.add("visiblePassword");
} else {
    passwordInput.type = "password"
    passwordChanger.classList.remove("visiblePassword");
    passwordChanger.classList.add("hiddenPassword");
}

passwordChanger.addEventListener("change", () => {
    if (passwordChanger.checked == false) {
        passwordInput.type = "text"
        passwordChanger.checked == true
        passwordChanger.classList.remove("hiddenPassword");
        passwordChanger.classList.add("visiblePassword");
    } else {
        passwordInput.type = "password"
        passwordChanger.checked == false
        passwordChanger.classList.remove("visiblePassword");
        passwordChanger.classList.add("hiddenPassword");
    }
})