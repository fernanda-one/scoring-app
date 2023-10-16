require("./bootstrap");
const {value} = require("lodash/seq");

let round = 'round1'
const userElement = document.getElementById("user");
const userData = JSON.parse(userElement.getAttribute("data-user"));
const channelUpdateScore = Echo.join(`presence.updateScore.${userData.gelanggang_id}`);
const userActiveList = {
    'juri_pertama':document.getElementById("status_juri_pertama"),
    'juri_kedua': document.getElementById("status_juri_kedua"),
    'juri_ketiga': document.getElementById("status_juri_ketiga"),
    'dewan': document.getElementById("status_dewan"),
    'ketua_pertandingan': document.getElementById("status_ketua"),
}
channelUpdateScore
    .here((users) => {
        console.log(users);
        console.log(`anda telah terhubung dalam Gelanggang`);
        cekStatususer(users)
    })
    .joining((user) => {
        console.log({ user }, "joined");
    })
    .leaving((user) => {
        console.log({ user }, "leaved");
    })
    .listen(`.updateScore.${userData.gelanggang_id}`, (event) => {
        console.log(event)
    });

const roleIds = {
    '2': 'operator',
    '3': 'ketua',
    '4': 'dewan',
    '5': 'juri_pertama',
    '6': 'juri_kedua',
    '7': 'juri_ketiga',
}
const roles = ['ketua_pertandingan','dewan','juri_pertama','juri_kedua','juri_ketiga']
function cekStatususer(users) {
    const userList = {
        'juri_pertama':false,
        'juri_kedua': false,
        'juri_ketiga': false,
        'dewan': false,
        'ketua_pertandingan': false,
    }
    users.map(user =>{
        if (roleIds[`${user.role_id}`]){
            userList[roleIds[`${user.role_id}`]] = true;
        }
    })
    roles.map(role =>{
        if (userList[role]){
            userActiveList[role].classList.remove('bg-gray-200')
            userActiveList[role].classList.add('bg-yellowDefault')
        } else {
            userActiveList[role].classList.remove('bg-gray-200')
            userActiveList[role].classList.remove('bg-yellowDefault')
            userActiveList[role].classList.add('bg-gray-200')
        }
    })
}
