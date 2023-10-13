require("./bootstrap");
const {value} = require("lodash/seq");

let round = 'round1'
const userElement = document.getElementById("user");
const userData = JSON.parse(userElement.getAttribute("data-user"));
const channelUpdateScore = Echo.join(`presence.updateScore.${userData.gelanggang_id}`);
const userActiveList = {
    'juri_pertama':false,
    'juri_kedua': false,
    'juri_ketiga': false,
    'dewan': false,
    'ketua_pertandingan': false,
}
channelUpdateScore
    .here((users) => {
        console.log(users);
        console.log(`anda telah terhubung dalam Gelanggang`);
        updateStatusUser(users)
    })
    .joining((user) => {
        console.log({ user }, "joined");
    })
    .leaving((user) => {
        console.log({ user }, "leaved");
    })
    .listen(`.updateScore.${userData.gelanggang_id}`, (event) => {
        console.log(event)
        updateScore(event)
    });

const roles = {
    2: 'operator',
    3: 'ketua',
    4: 'dewan',
    5: 'juri_pertama',
    6: 'juri_kedua',
    7: 'juri_ketiga',
}
function updateStatusUser(users) {
    users.forEach(function (user){
       const rolesOn = roles[`${user.role_id}`]
        if (rolesOn){
            userActiveList[`${rolesOn}`] = true;
        }
    })

}
