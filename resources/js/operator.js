require("./bootstrap");
const {value} = require("lodash/seq");
const {getDataGelanggang, partaiId, kelas} = require("./library/ScoreFunc");
const roundsElement = {
     'round-1' : document.getElementById('round-1'),
     'round-2' : document.getElementById('round-2'),
     'round-3' : document.getElementById('round-3')
}
let activeRound = 'round-1'
const coutMinimumToStart =5
const start = document.getElementById('start')
const next = document.getElementById('next')
const prev = document.getElementById('prev')
const pausePlay = document.getElementById('pause')
let pauseStatus = true
const finish = document.getElementById('finish')
const userElement = document.getElementById("user");
const userData = JSON.parse(userElement.getAttribute("data-user"));
const partaiElement = document.getElementById("partai");
const dataPartai = JSON.parse(partaiElement.getAttribute("data-partai"));
const channelUpdateScore = Echo.join(`presence.updateScore.${userData.gelanggang_id}`);
const channelOperator = Echo.join(`presence.operator.${userData.gelanggang_id}`);

const actionButtonNames = ['start','pausePlay']
const userActiveList = {
    'juri_pertama':document.getElementById("status_juri_pertama"),
    'juri_kedua': document.getElementById("status_juri_kedua"),
    'juri_ketiga': document.getElementById("status_juri_ketiga"),
    'dewan': document.getElementById("status_dewan"),
    'ketua_pertandingan': document.getElementById("status_ketua"),
}
// start.disabled = true
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
const roles = ['ketua_pertandingan','dewan','juri_pertama','juri_kedua','juri_ketiga']

roundsElement['round-1'].addEventListener('click',(ev)=>{
    changeStatusRound('round-1')
    updatePertandingan()
})
roundsElement['round-2'].addEventListener('click',(ev)=>{
    changeStatusRound('round-2')
    updatePertandingan()
})
roundsElement['round-3'].addEventListener('click',(ev)=>{
    changeStatusRound('round-3')
    updatePertandingan()
})
channelUpdateScore
    .here((users) => {
        cekStatususer(users)
    })
    .joining((users) => {
        // console.log({ users }, "joined");
    })
    .leaving((users) => {
        // console.log({ users }, "leaved");
    })
    .listen(`.updateScore.${userData.gelanggang_id}`, (event) => {
        // console.log(event)
    });

function roundDone(activeRound) {
    activeRound = activeRound.toLowerCase()
    roundsElement[activeRound].classList.add('bg-grayDark')
    roundsElement[activeRound].classList.remove('bg-yellowDefault')
    togglePausePlay(false)
}
channelOperator
    .listen(`.operator.${userData.gelanggang_id}`, (event) => {
        if(event.action === 'merah' || event.action === 'biru'){
            uploadDataWinner(event.action)
            updatePertandingan('reset')
        }
        event.action === 'round-done'?roundDone(event.activeRound):''
    });

start.addEventListener('click', (evt)=>{
    updatePertandingan('start')
    changeDisabledButtons(false)
})
finish.addEventListener('click', (evt) =>{
    updatePertandingan('finish')
    changeDisabledButtons(true)
    togglePausePlay(false)
    changeStatusRound('round-1')
})

pausePlay.addEventListener('click', ()=>{
    togglePausePlay(pauseStatus)
    updatePertandingan(pauseStatus?'pause':'play')
})

function togglePausePlay(status = true){
    if (status){
        pausePlay.textContent = 'PAUSE'
        pauseStatus = !status
    } else {
        pausePlay.textContent = 'PLAY'
        pauseStatus = !pauseStatus
    }
}

function uploadDataWinner(winner) {
    axios.post("/create-history", {
        'partai':dataPartai.id,
        'kelas':dataPartai.kelas,
        'jenis_kelamin':dataPartai.jenis_kelamin,
        'sudut_biru':dataPartai.sudut_biru,
        'sudut_merah':dataPartai.sudut_merah,
        'kontingen_biru':dataPartai.contingen_sudut_biru,
        'kontingen_merah':dataPartai.contingen_sudut_merah,
        'babak':dataPartai.babak,
        'round_time':activeRound,
        'pemenang':winner,
    });
}
function updatePertandingan(action = 'round'){
    axios.post("/operator-update", {
        message: {
            'blueName':dataPartai.sudut_biru,
            'redName':dataPartai.sudut_merah,
            'blueContingent':dataPartai.contingen_sudut_biru,
            'redContingent':dataPartai.contingen_sudut_merah,
            'babak':dataPartai.babak,
            'activeRound':activeRound,
            'action': action
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
    let trueCount = 0;
    users.map(user =>{
        if (roleIds[`${user.role_id}`]){
            trueCount += 1;
            userList[roleIds[`${user.role_id}`]] = true;
        }
     })
    if (trueCount === coutMinimumToStart){
        start.disabled = false;
    }
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


function changeDisabledButtons(status) {
    rounds.forEach(round =>{
        roundsElement[round].disabled = status
    })
    pausePlay.disabled = status
    finish.disabled = status
    prev.disabled = !status
    next.disabled = !status
}

function changeStatusRound(roundName) {
    rounds.forEach(name => {
        if (name === roundName){
            activeRound = name
            allRoundStatus[name] = true
            roundsElement[name].classList.add('bg-yellowDefault')
        } else {
            allRoundStatus[name] = false
            roundsElement[name].classList.remove('bg-yellowDefault')
        }
    })
}

