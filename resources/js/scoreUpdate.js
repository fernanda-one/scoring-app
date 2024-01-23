import {updateRoundJuri} from "./library/JuriFunc";

require("./bootstrap");
import {
    startPertandingan,
    loadDataSaved,
    updateScore,
    activeRound,
    changeScoreElement,
    channelUpdateScore,
    channelOperator,
    userData, getDataGelanggang, partaiId, kelas
} from "./library/ScoreFunc";

let round = 'round-1';
let blueScore = document.getElementById(`${round}-blueScore`);
let redScore = document.getElementById(`${round}-redScore`);
changeScoreElement(redScore, blueScore)
if (localStorage.getItem('gelanggangData')){
    loadDataSaved()
}
channelUpdateScore
    .listen(`.updateScore.${userData.gelanggang_id}`, (event) => {
        updateScore(event)
    });

channelOperator
    .listen(`.operator.${userData.gelanggang_id}`, (event) => {
        updateDataGelanggang(event);
    });

function updateDataGelanggang(e) {
    switch (e.action) {
        case 'start':
            startPertandingan(e)
            break;
        case 'finish':
            // localStorage.clear()
            // location.reload();
            break;
        case 'reset':
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

function changeRound(e) {
    activeRound.textContent = e.activeRound.toUpperCase()
    round = e.activeRound
    blueScore = document.getElementById(`${round}-blueScore`);
    redScore = document.getElementById(`${round}-redScore`);
    updateRoundJuri(round)
    changeScoreElement(redScore, blueScore)
    let gelanggangData = JSON.parse(localStorage.getItem("gelanggangData"));
    gelanggangData.activeRound = round;
    localStorage.setItem("gelanggangData", JSON.stringify(gelanggangData));
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

function changeColorRound(round, status) {
    const elements = [
        'blueScore-div', 'redScore-div',
        'blueInput-div', 'redInput-div'
    ];
    elements.forEach((element) => {
        const elementId = `${round}-${element}`;
        const elementClassList = document.getElementById(elementId).classList;
        const blueScore = document.getElementById(`${round}-blueScore`);
        const redScore = document.getElementById(`${round}-redScore`);
        if (status) {
            elementClassList.remove('bg-grayDefault');
            elementClassList.add(element.includes('blue') ? 'bg-blueDefault' : 'bg-redDefault' , 'shadow-inset-custom');
            blueScore.innerText = 0;
            redScore.innerText = 0;
        } else {
            elementClassList.add('bg-grayDefault');
            blueScore.innerText = ''
            redScore.innerText = ''
            elementClassList.remove(element.includes('blue') ? 'bg-blueDefault' : 'bg-redDefault','shadow-inset-custom');
        }
    });
}


