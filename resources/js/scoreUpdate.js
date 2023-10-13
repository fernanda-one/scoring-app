require("./bootstrap");
const {value} = require("lodash/seq");

let round = 'round1'
const userElement = document.getElementById("user");
const userData = JSON.parse(userElement.getAttribute("data-user"));
const blueScore = document.getElementById(`${round}-blueScore`);
const redScore = document.getElementById(`${round}-redScore`);
const channelUpdateScore = Echo.join(`presence.updateScore.${userData.gelanggang_id}`);
const isPopup = document.getElementById('dropVerificationModal');
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
        }
    });
function updateScore(event) {
    redScore.textContent = event.red_score - event.red_penalty;
    blueScore.textContent = event.blue_score - event.blue_penalty;
}