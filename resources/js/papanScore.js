import {changeIndicatorPelanggaran} from "./library/DewanFunc";

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
let blueScore = document.getElementById(`blueScore`);
let redScore = document.getElementById(`redScore`);

changeScoreElement(redScore, blueScore)
loadDataSaved()

function updateIndicatorDewan(event) {
    console.log(event.blue_penalty)
    changeIndicatorPelanggaran('blue', event.blue_penalty)
    changeIndicatorPelanggaran('red', event.red_penalty)
}

channelUpdateScore
    .listen(`.updateScore.${userData.gelanggang_id}`, (event) => {
        updateIndicatorDewan(event)
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

            break;
        case 'round-2':

            break;
        case 'round-3':
            break;
    }
}


