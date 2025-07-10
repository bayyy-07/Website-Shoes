// CLICK MENU LOGIN
const loginMain = document.querySelector(".form-login");

const btnloginpopup = document.querySelector(".btnlogin-popup");

btnloginpopup.addEventListener("click", () => {
	loginMain.classList.add("active-popup");
});

// CLICK ICON CLOSE
const iconClose = document.querySelector(".icon-close");

iconClose.addEventListener("click", () => {
	loginMain.classList.remove("active-popup");
});
