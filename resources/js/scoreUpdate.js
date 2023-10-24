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
    userData, getDataGelanggang
} from "./library/ScoreFunc";

let round = 'round-1';
let blueScore = document.getElementById(`${round}-blueScore`);
let redScore = document.getElementById(`${round}-redScore`);
const rounds = ['round-1','round-2','round-3']
const winnerRounds = {
    'round-1':'',
    'round-2':'',
    'round-3':'',
}
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

function cekWinner(){
    let red = 0;
    let blue =0;
    rounds.map(round =>{
        winnerRounds[round] === 'red'? red++ : blue++
    })
    if (red > blue){
        uploadDataWinner('red')
    }
    uploadDataWinner('blue')
}
function uploadDataWinner(winner) {
    const dataPartai = getDataGelanggang()
    axios.post("/operator-update", {
        message: {
            'partai':dataPartai.id,
            'sudut_biru':dataPartai.sudut_biru,
            'sudut_merah':dataPartai.sudut_merah,
            'kontingen_biru':dataPartai.contingen_sudut_biru,
            'kontingen_merah':dataPartai.contingen_sudut_merah,
            'babak':dataPartai.babak,
            'round_time':dataPartai.activeRound,
            'pemenang':winner,
        },
    });
}

function updateDataGelanggang(e) {
    switch (e.action) {
        case 'start':
            startPertandingan(e)
            break;
        case 'finish':
            uploadDataWinner()
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

function saveWinnerRound(round) {
    const scoreBlue = parseInt(blueScore.textContent)
    const scoreRed = parseInt(blueScore.textContent)
    winnerRounds[round] = scoreBlue === scoreRed?'seri': scoreBlue >= scoreRed? 'blue':'red'
    localStorage.setItem('winner-rounds', JSON.stringify(winnerRounds));
}

function changeRound(e) {
    activeRound.textContent = e.activeRound.toUpperCase()
    saveWinnerRound(round)
    round = e.activeRound
    blueScore = document.getElementById(`${round}-blueScore`);
    redScore = document.getElementById(`${round}-redScore`);
    updateRoundJuri(round)
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
        const blueScore = document.getElementById(`${round}-blueScore`);
        const redScore = document.getElementById(`${round}-redScore`);
        if (status) {
            elementClassList.remove('bg-grayDefault');
            elementClassList.add(element.includes('blue') ? 'bg-blueDefault' : 'bg-redDefault' , 'shadow-inset-custom');
            console.log(blueScore)
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


