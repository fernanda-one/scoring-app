require("./bootstrap");

let round = 'round-1';
const userElement = document.getElementById("user");
const userData = JSON.parse(userElement.getAttribute("data-user"));
let blueScore = document.getElementById(`${round}-blueScore`);
let redScore = document.getElementById(`${round}-redScore`);
const namaMerah = document.getElementById('nama_merah');
const kontingenMerah = document.getElementById('kontingen_merah');
const namaBiru = document.getElementById('nama_biru');
const kontingenBiru = document.getElementById('kontingen_biru');
const babak = document.getElementById('babak');
const activeRound = document.getElementById('round');
const rounds = ['round-1','round-2','round-3']
export let redPenalty = '';
export let bluePenalty = '';
const channelUpdateScore = Echo.join(`presence.updateScore.${userData.gelanggang_id}`);
const channelOperator = Echo.join(`presence.operator.${userData.gelanggang_id}`);
const savedGelanggangData = JSON.parse(localStorage.getItem('gelanggangData')) || {
    namaMerah: 'Sudut Merah',
    kontingenMerah: 'Kontingen',
    namaBiru: 'Sudut Biru',
    kontingenBiru: 'kontingen',
    babak: 'BABAK',
    activeRound: 'ROUND',
};
export const pelanggaranPoint = {
    'teguran-pertama': 0,
    'teguran-kedua': 1,
    'binaan-pertama': 2,
    'binaan-kedua': 3,
    'peringatan-pertama': 5,
    'peringatan-kedua': 7,
    'peringatan-ketiga': 9,
}

namaMerah.textContent = savedGelanggangData.namaMerah;
kontingenMerah.textContent = savedGelanggangData.kontingenMerah;
namaBiru.textContent = savedGelanggangData.namaBiru;
kontingenBiru.textContent = savedGelanggangData.kontingenBiru;
babak.textContent = savedGelanggangData.babak;
activeRound.textContent = savedGelanggangData.activeRound;

const savedScoreData = JSON.parse(localStorage.getItem('scoreData')) || {
    redScore: 0,
    blueScore: 0,
    bluePenalty: 'teguran-pertama',
    redPenalty: 'teguran-pertama'
};
redPenalty = savedScoreData.redPenalty
bluePenalty = savedScoreData.bluePenalty
blueScore.textContent = savedScoreData.blueScore
redScore.textContent = savedScoreData.redScore

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
    });

channelOperator
    .here((users) => {
        console.log(users);
        console.log(`anda telah terhubung dalam Channel Operator`);
    })
    .joining((user) => {
        console.log({ user }, "joined");
    })
    .leaving((user) => {
        console.log({ user }, "leaved");
    })
    .listen(`.operator.${userData.gelanggang_id}`, (event) => {
        console.log(event);
        updateDataGelanggang(event);
    });

function updateDataGelanggang(e) {
    switch (e.action) {
        case 'start':
            startPertandingan(e)
            break;
        case 'finish':
            localStorage.clear()
            location.reload();
            break;
        case 'round':
            changeRound(e)
            break;
        case 'pause':
            break;
        case 'play':
            break;
    }

}

function updateScore(event) {
    console.log(event)
    redPenalty = event.red_penalty
    bluePenalty = event.blue_penalty
    const redScoreValue = event.red_score - pelanggaranPoint[redPenalty];
    const blueScoreValue = event.blue_score - pelanggaranPoint[bluePenalty];

    const scoreData = {
        redScore: event.red_score,
        blueScore: event.blue_score,
        redPenalty: event.red_penalty,
        bluePenalty: event.blue_penalty,
    };

    localStorage.setItem('scoreData', JSON.stringify(scoreData));

    redScore.textContent = redScoreValue;
    blueScore.textContent = blueScoreValue;
}

function changeRound(e) {
    activeRound.textContent = e.activeRound.toUpperCase()
    round = e.activeRound
    blueScore = document.getElementById(`${round}-blueScore`);
    redScore = document.getElementById(`${round}-redScore`);
    switch (round){
        case 'round-1':
            changeColorRound('round-2', false)
            changeColorRound('round-3', false)
            break;
        case 'round-2':
            changeColorRound('round-2', true)
            changeColorRound('round-3',false)
            break;
        case 'round-3':
            changeColorRound('round-3',true )
            break;
    }
}

function changeColorRound(round,status){
    if (status){
        document.getElementById(`${round}-blueScore-div`).classList.remove('bg-grayDefault')
        document.getElementById(`${round}-redScore-div`).classList.remove('bg-grayDefault')
        document.getElementById(`${round}-blueScore-div`).classList.add('bg-blueDefault')
        document.getElementById(`${round}-redScore-div`).classList.add('bg-redDefault')
        document.getElementById(`${round}-blueInput-div`).classList.remove('bg-grayDefault')
        document.getElementById(`${round}-redInput-div`).classList.remove('bg-grayDefault')
        document.getElementById(`${round}-blueInput-div`).classList.add('bg-blueDefault')
        document.getElementById(`${round}-redInput-div`).classList.add('bg-redDefault')
    } else {
        document.getElementById(`${round}-blueScore-div`).classList.add('bg-grayDefault')
        document.getElementById(`${round}-redScore-div`).classList.add('bg-grayDefault')
        document.getElementById(`${round}-blueScore-div`).classList.remove('bg-blueDefault')
        document.getElementById(`${round}-redScore-div`).classList.remove('bg-redDefault')
        document.getElementById(`${round}-blueInput-div`).classList.add('bg-grayDefault')
        document.getElementById(`${round}-redInput-div`).classList.add('bg-grayDefault')
        document.getElementById(`${round}-blueInput-div`).classList.remove('bg-blueDefault')
        document.getElementById(`${round}-redInput-div`).classList.remove('bg-redDefault')
    }
}

function startPertandingan(e) {
    namaMerah.textContent = e.redName;
    kontingenMerah.textContent = e.redContingent;
    namaBiru.textContent = e.blueName;
    kontingenBiru.textContent = e.blueContingent;
    babak.textContent = e.babak.toUpperCase();
    activeRound.textContent = e.activeRound.toUpperCase();

    const gelanggangData = {
        namaMerah: namaMerah.textContent,
        kontingenMerah: kontingenMerah.textContent,
        namaBiru: namaBiru.textContent,
        kontingenBiru: kontingenBiru.textContent,
        babak: babak.textContent,
        activeRound: activeRound.textContent,
    };

    localStorage.setItem('gelanggangData', JSON.stringify(gelanggangData));
}

