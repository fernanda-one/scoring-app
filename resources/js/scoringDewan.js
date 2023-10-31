import {
    activeRound,
    channelOperator,
    channelUpdateScore,
    getDataGelanggang,
    kelas,
    partaiId, updateScore,
    userData
} from "./library/ScoreFunc";

require("./bootstrap");
const {toNumber} = require("lodash");
import {changeIndicatorPelanggaran, clearIndicator} from './library/DewanFunc'
let round = 'round-1'
let blueScore = document.getElementById(`${round}-blueScore`).textContent;
let redScore = document.getElementById(`${round}-redScore`).textContent;
const teguranMerahPertama = document.getElementById('teguran-merah-pertama');
const binaanMerahPertama = document.getElementById('binaan-merah-pertama')
const peringatanMerahPertama = document.getElementById('peringatan-merah-pertama')
const teguranMerahKedua = document.getElementById('teguran-merah-kedua')
const binaanMerahKedua = document.getElementById('binaan-merah-kedua')
const peringatanMerahKedua = document.getElementById('peringatan-merah-kedua')
const peringatanMerahKetiga = document.getElementById('peringatan-merah-ketiga')
const teguranBiruPertama = document.getElementById('teguran-biru-pertama')
const binaanBiruPertama = document.getElementById('binaan-biru-pertama')
const peringatanBiruPertama = document.getElementById('peringatan-biru-pertama')
const teguranBiruKedua = document.getElementById('teguran-biru-kedua')
const binaanBiruKedua = document.getElementById('binaan-biru-kedua')
const peringatanBiruKedua = document.getElementById('peringatan-biru-kedua')
const peringatanBiruKetiga = document.getElementById('peringatan-biru-ketiga')
const jatuhanMerahSah = document.getElementById('jatuhan-merah-plus')
const jatuhanMerahTidakSah = document.getElementById('jatuhan-merah-minus')
const jatuhanBiruSah = document.getElementById('jatuhan-biru-plus')
const jatuhanBiruTidakSah = document.getElementById('jatuhan-biru-minus')
const buttonAction = ['jatuhan-biru-minus','jatuhan-biru-plus','jatuhan-merah-minus',
    'jatuhan-merah-plus','peringatan-biru-ketiga','peringatan-biru-kedua','binaan-biru-kedua','teguran-biru-kedua',
    'peringatan-biru-pertama','binaan-biru-pertama','teguran-biru-pertama','peringatan-merah-ketiga','peringatan-merah-kedua','binaan-merah-kedua',
    'teguran-merah-kedua','peringatan-merah-pertama','binaan-merah-pertama','teguran-merah-pertama', 'popup-biru','popup-merah', 'disk-merah', 'disk-biru']
let bluePenalty='pertama'
let redPenalty = 'pertama';
let droppingRed = JSON.parse(localStorage.getItem('scoreData'))?.droppingRed || [] ;
let droppingBlue = JSON.parse(localStorage.getItem('scoreData'))?.droppingBlue || [];
let pureScoreRed = 0;
let pureScoreBlue = 0;
const rounds = []
const winnerRounds = {
    'round-1':'',
    'round-2':'',
    'round-3':'',
}

function updateDataScore(event) {
    pureScoreRed = event.red_score;
    pureScoreBlue = event.blue_score;
}

channelUpdateScore
    .listen(`.updateScore.${userData.gelanggang_id}`, (event) => {
        updateDataScore(event)
    });
channelOperator
    .listen(`.operator.${userData.gelanggang_id}`, (event) => {
        updateDataDewan(event)
    });

function handlePenaltyClick(color, penalty) {
    return function () {
        if (color === 'red') {
            redPenalty = penalty;
        } else if (color === 'blue') {
            bluePenalty = penalty;
        }
        changeIndicatorPelanggaran(color, penalty);
        pushScore();
    };
}
function handleScoreChange(color, scoreChange) {
    return function () {
        if (color === 'red') {
            pushScore(scoreChange, 0);
        } else if (color === 'blue') {
            pushScore(0 , scoreChange);
        }
    };
}

// Add event listeners for red penalties
teguranMerahPertama.addEventListener("click", handlePenaltyClick('red', 'teguran-pertama'));
teguranMerahKedua.addEventListener("click", handlePenaltyClick('red', 'teguran-kedua'));
binaanMerahPertama.addEventListener("click", handlePenaltyClick('red', 'binaan-pertama'));
binaanMerahKedua.addEventListener("click", handlePenaltyClick('red', 'binaan-kedua'));
peringatanMerahPertama.addEventListener("click", handlePenaltyClick('red', 'peringatan-pertama'));
peringatanMerahKedua.addEventListener("click", handlePenaltyClick('red', 'peringatan-kedua'));
peringatanMerahKetiga.addEventListener("click", handlePenaltyClick('red', 'peringatan-ketiga'));

teguranBiruPertama.addEventListener("click", handlePenaltyClick('blue', 'teguran-pertama'));
teguranBiruKedua.addEventListener("click", handlePenaltyClick('blue', 'teguran-kedua'));
binaanBiruPertama.addEventListener("click", handlePenaltyClick('blue', 'binaan-pertama'));
binaanBiruKedua.addEventListener("click", handlePenaltyClick('blue', 'binaan-kedua'));
peringatanBiruPertama.addEventListener("click", handlePenaltyClick('blue', 'peringatan-pertama'));
peringatanBiruKedua.addEventListener("click", handlePenaltyClick('blue', 'peringatan-kedua'));
peringatanBiruKetiga.addEventListener("click", handlePenaltyClick('blue', 'peringatan-ketiga'));

jatuhanMerahSah.addEventListener("click", handleScoreChange('red', 2));
jatuhanMerahTidakSah.addEventListener("click", handleScoreChange('red', -2));

jatuhanBiruSah.addEventListener("click", handleScoreChange('blue', 2));
jatuhanBiruTidakSah.addEventListener("click", handleScoreChange('blue', -2));


function pushScore(droppingRed = 0, droppingBlue = 0){
    pureScoreRed += droppingRed
    pureScoreBlue += droppingBlue
    axios.post("/score-update", {
        message: {
            "blueScore":pureScoreBlue,
            "redScore":pureScoreRed,
            "redPenalty":redPenalty,
            "bluePenalty": bluePenalty,
            "droppingRed": droppingRed,
            "droppingBlue": droppingBlue,
        },
    });
}

function enabledAction(status = true) {
    buttonAction.map(action =>{
        const button = document.getElementById(action)
        button.disabled = !status;
    })
}
enabledAction(false)
function cekWinner(){
    let red = 0;
    let blue =0;
    rounds.map(round =>{
        winnerRounds[round] === 'red'? red++ : blue++
    })
    if (red > blue){
        updatePertandingan('merah')
    } else {
        updatePertandingan('biru')
    }
}
function updatePertandingan(winner){
    const dataPartai = getDataGelanggang()
    axios.post("/operator-update", {
        message: {
            'blueName':dataPartai.namaBiru,
            'redName':dataPartai.namaMerah,
            'blueContingent':dataPartai.kontingenMerah,
            'redContingent':dataPartai.kontingenBiru,
            'babak':dataPartai.babak,
            'activeRound':activeRound.textContent,
            'action': winner
        },
    });
}
function updateDataDewan(e) {
    switch (e.action) {
        case 'start':
            break;
        case 'finish':
            cekWinner()
            break;
        case 'round':
            changeRoundDewan()
            clearIndicator()
            break;
        case 'pause':
            enabledAction(false)
            break;
        case 'play':
            enabledAction()
            break;
    }
}

function changeRoundDewan(){
    bluePenalty='pertama'
    redPenalty = 'pertama';
    pureScoreRed = 0;
    pureScoreBlue =0;
}
