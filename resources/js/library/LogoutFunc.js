const logoutButton = document.getElementById("logout-button");

logoutButton.addEventListener("click", function () {
    localStorage.clear();
    window.location.href = "/login";
})