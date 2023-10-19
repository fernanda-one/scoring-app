require("./bootstrap");
const {value} = require("lodash/seq");

const roundsElement = {
     'round-1' : document.getElementById('round-1'),
     'round-2' : document.getElementById('round-2'),
     'round-3' : document.getElementById('round-3')
}
let activeRound = 'round-1'
const start = document.getElementById('start')
const pause = document.getElementById('pause')
const finish = document.getElementById('finish')
const userElement = document.getElementById("user");
const userData = JSON.parse(userElement.getAttribute("data-user"));
const partaiElement = document.getElementById("partai");
const dataPartai = JSON.parse(partaiElement.getAttribute("data-partai"));
const channelUpdateScore = Echo.join(`presence.updateScore.${userData.gelanggang_id}`);
const userActiveList = {
    'juri_pertama':document.getElementById("status_juri_pertama"),
    'juri_kedua': document.getElementById("status_juri_kedua"),
    'juri_ketiga': document.getElementById("status_juri_ketiga"),
    'dewan': document.getElementById("status_dewan"),
    'ketua_pertandingan': document.getElementById("status_ketua"),
}
const rounds =[
    'round-1','round-2','round-3'
]
const allRoundStatus = {
    'round-1': true,
    'round-2': false,
    'round-3': false
}
const roleIds = {
    '2': 'operator',
    '3': 'ketua',
    '4': 'dewan',
    '5': 'juri_pertama',
    '6': 'juri_kedua',
    '7': 'juri_ketiga',
}

function changeStatusRound(roundName) {
    rounds.forEach(name => {
        if (name === roundName){
            allRoundStatus[name] = true
            roundsElement[name].classList.add('bg-yellowDefault')
        } else {
            allRoundStatus[name] = false
            roundsElement[name].classList.remove('bg-yellowDefault')
        }
    })
}

roundsElement['round-1'].addEventListener('click',(ev)=>{
    changeStatusRound('round-1')
})
roundsElement['round-2'].addEventListener('click',(ev)=>{
    changeStatusRound('round-2')
})
roundsElement['round-3'].addEventListener('click',(ev)=>{
    changeStatusRound('round-3')
})

const roles = ['ketua_pertandingan','dewan','juri_pertama','juri_kedua','juri_ketiga']
channelUpdateScore
    .here((users) => {
        console.log(users);
        console.log(`anda telah terhubung dalam Gelanggang`);
        cekStatususer(users)
    })
    .joining((users) => {
        console.log({ users }, "joined");
    })
    .leaving((users) => {
        console.log({ users }, "leaved");
    })
    .listen(`.updateScore.${userData.gelanggang_id}`, (event) => {
        console.log(event)
    });
start.addEventListener('click', (evt)=>{
    updatePertandingan()
})

function updatePertandingan(){
    axios.post("/operator-update", {
        message: {
            'blueName':dataPartai.sudut_biru,
            'redName':dataPartai.sudut_merah,
            'blueContingent':dataPartai.contingen_sudut_biru,
            'redContingent':dataPartai.contingen_sudut_merah,
            'babak':dataPartai.babak,
            'activeRound':activeRound,
        },
    });
}
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
