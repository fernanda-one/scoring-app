require("./bootstrap");
const {value} = require("lodash/seq");

let round = 'round1'
const userElement = document.getElementById("user");
const userData = JSON.parse(userElement.getAttribute("data-user"));
const blueScore = document.getElementById(`${round}-blueScore`);
const redScore = document.getElementById(`${round}-redScore`);
const channelUpdateScore = Echo.join(`presence.updateScore.${userData.gelanggang_id}`);
const isPopup = document.getElementById('dropVerificationModal');
const choice1 = document.getElementById("choice1");
const choice2 = document.getElementById("choice2");
const choice3 = document.getElementById("choice3");
const choiceResult = document.getElementById("choice-result");
channelUpdateScore
    .here((users) => {
        console.log(users);
        console.log(`anda telah terhubung dalam Gelanggang`);
    })
    .joining((user) => {
        console.log({ user }, "joined");
    })  
    .leaving((user) => {
        console.log({ user }, "leaved");
    })
    .listen(`.updateScore.${userData.gelanggang_id}`, (event) => {
        updateScore(event)
        if (event.red_popup || event.blue_popup) {
            isPopup.style.display = 'block';
        } else {
            isPopup.style.display = 'none';
            choiceResult.classList.remove("bg-blueDark")
            choiceResult.classList.remove("bg-yellowDark")
            choiceResult.classList.remove("bg-redDark")
            choiceResult.classList.add("bg-grayDefault")
        }
    });
function updateScore(event) {
    redScore.textContent = event.red_score - event.red_penalty;
    blueScore.textContent = event.blue_score - event.blue_penalty;
}

choice1.addEventListener("click", function () {
    choiceResult.innerText = "BLUE CORNER";
    choiceResult.classList.remove("bg-yellowDark")
    choiceResult.classList.remove("bg-redDark")
    choiceResult.classList.remove("bg-grayDefault")
    choiceResult.classList.add("bg-blueDark")
})

choice2.addEventListener("click", function () {
    choiceResult.innerText = "INVALID";
    choiceResult.classList.remove("bg-blueDark")
    choiceResult.classList.remove("bg-redDark")
    choiceResult.classList.remove("bg-grayDefault")
    choiceResult.classList.add("bg-yellowDark")
})

choice3.addEventListener("click", function () {
    choiceResult.innerText = "RED CORNER";
    choiceResult.classList.remove("bg-blueDark")
    choiceResult.classList.remove("bg-yellowDark")
    choiceResult.classList.remove("bg-grayDefault")
    choiceResult.classList.add("bg-redDark")
})