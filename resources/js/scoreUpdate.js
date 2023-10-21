require("./bootstrap");
import {
    startPertandingan,
    loadDataSaved,
    updateScore,
    redPenalty,
    activeRound,
    bluePenalty,
    changeScoreElement,
    channelUpdateScore,
    channelOperator,
    userData
} from "./library/ScoreFunc";

let round = 'round-1';
let blueScore = document.getElementById(`${round}-blueScore`);
let redScore = document.getElementById(`${round}-redScore`);
changeScoreElement(redScore, blueScore)
loadDataSaved()
channelUpdateScore
    .listen(`.updateScore.${userData.gelanggang_id}`, (event) => {
        updateScore(event)
    });

channelOperator
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

function changeRound(e) {
    activeRound.textContent = e.activeRound.toUpperCase()
    round = e.activeRound
    blueScore = document.getElementById(`${round}-blueScore`);
    redScore = document.getElementById(`${round}-redScore`);
    changeScoreElement(redScore, blueScore)
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
        if (status) {
            elementClassList.remove('bg-grayDefault');
            elementClassList.add(element.includes('blue') ? 'bg-blueDefault' : 'bg-redDefault');
        } else {
            elementClassList.add('bg-grayDefault');
            elementClassList.remove(element.includes('blue') ? 'bg-blueDefault' : 'bg-redDefault');
        }
    });
}


