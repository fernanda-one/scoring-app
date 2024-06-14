import "./bootstrap";

const userElement = document.getElementById("user");
const userData = JSON.parse(userElement.getAttribute("data-user"));
const channelWinner = Echo.join(`presence.winner.${userData.gelanggang_id}`);
channelWinner.listen(`.winner.${userData.gelanggang_id}`, handlerWinner);

const element = {
    modalWinner: document.getElementById("modal-winner"),
    winner: document.getElementById("winner"),
    corner: document.getElementById("corner"),
    contingent: document.getElementById("contingent"),
    userElement: document.getElementById("user"),
    button: document.getElementById("done-button"),
};

let timeoutID = setTimeout(() => {}, 0);

function handlerWinner(event) {
    const data = event.data;
    element.modalWinner.classList.toggle("hidden");
    element.winner.innerText = data.name;
    element.corner.innerText = data.corner;
    element.contingent.innerText = data.contingent;
    timeoutID = setTimeout(() => {
        element.modalWinner.classList.toggle("hidden");
    }, 5000);
}

element.button.addEventListener("click", () => {
    clearTimeout(timeoutID);
    element.modalWinner.classList.toggle("hidden");
});
