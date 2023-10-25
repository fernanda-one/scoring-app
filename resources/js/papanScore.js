import {changeIndicatorPelanggaran} from "./library/DewanFunc";

require("./bootstrap");
import {
    startPertandingan,
    loadDataSaved,
    updateScore,
    activeRound,
    changeScoreElement,
    channelUpdateScore,
    channelOperator,
    userData, getDataGelanggang,
} from "./library/ScoreFunc";
import {getId, indicatorUpdate, startTimeoutIndicator} from "./library/JuriFunc";

let round = 'round-1';
let blueScore = document.getElementById(`blueScore`);
let redScore = document.getElementById(`redScore`);
const timerDisplay = document.getElementById('timer');
const channelGelanggang = Echo.join(`presence.juri.${userData.gelanggang_id}`);
let timerStarted = false
const timePerRound = 5;
let countdown;
let isPaused = false;
let endTime;
let secondsRemaining = 0;
changeScoreElement(redScore, blueScore)
loadDataSaved()

function updateIndicatorDewan(event) {
    // console.log(event.blue_penalty)
    changeIndicatorPelanggaran('blue', event.blue_penalty)
    changeIndicatorPelanggaran('red', event.red_penalty)
}
channelGelanggang
    .listen(`.juri.${userData.gelanggang_id}`, (event) => {
        updateindicator(event);
    });

channelUpdateScore
    .listen(`.updateScore.${userData.gelanggang_id}`, (event) => {
        updateIndicatorDewan(event)
        updateScore(event)
    });

channelOperator
    .listen(`.operator.${userData.gelanggang_id}`, (event) => {
        // console.log(event);
        updateDataGelanggang(event);
    });

function updateTimer(action) {
    if(action === 'play'){
        if(!timerStarted){
            startTimer(timePerRound)
            timerStarted = true;
            saveTimerState()
        } else{
            startTimer(secondsRemaining);
            isPaused = false;
            saveTimerState();
        }
    } else {
        secondsRemaining = Math.max(0, Math.ceil((endTime - Date.now()) / 1000));
        isPaused = true;
        saveTimerState();
    }
}
function saveTimerState() {
    localStorage.setItem('timerIsPaused', isPaused);
    localStorage.setItem('timerSecondsRemaining', secondsRemaining);
    localStorage.setItem('timerEndTime', endTime);
}

function displayTimeLeft(seconds) {
    const minutes = Math.floor(seconds / 60);
    const remainderSeconds = seconds % 60;
    const display = `${minutes < 10 ? '0' : ''}${minutes}:${remainderSeconds < 10 ? '0' : ''}${remainderSeconds}`;
    if (!isPaused){
        timerDisplay.textContent = display;
    }
}
function updatePertandingan(action = 'round'){
    const dataPartai = getDataGelanggang()
    axios.post("/operator-update", {
        message: {
            'blueName':dataPartai.namaBiru,
            'redName':dataPartai.namaMerah,
            'blueContingent':dataPartai.kontingenBiru,
            'redContingent':dataPartai.kontingenMerah,
            'babak':dataPartai.babak,
            'activeRound':dataPartai.activeRound,
            'action': 'round-done'
        },
    });
}
function clearTimerState() {
    timerStarted = false
    updatePertandingan()
    localStorage.removeItem('timerIsPaused');
    localStorage.removeItem('timerSecondsRemaining');
    localStorage.removeItem('timerEndTime');
}
function startTimer(seconds) {
    clearInterval(countdown);

    if (isPaused) {
        endTime = Date.now() + secondsRemaining * 1000;
    } else {
        endTime = Date.now() + seconds * 1000;
        secondsRemaining = seconds;
    }

    displayTimeLeft(secondsRemaining);

    countdown = setInterval(() => {
        const secondsLeft = Math.max(0, Math.round((endTime - Date.now()) / 1000));
        if (secondsLeft === 0) {
            clearInterval(countdown);
            if (!isPaused){
                timerStarted = false;
                timerDisplay.textContent = '00:00';
            }
            // console.log('done')
            clearTimerState();
            return;
        }

        if (isPaused) return;

        displayTimeLeft(secondsLeft);
    }, 1000);
}

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
            updateTimer('pause')
            break;
        case 'play':
            updateTimer('play')
            break;
    }
}
function updateindicator(event) {
    const gerakan = event.gerakan;
    const sudut = event.sudut
    const id = event.id
    const elementName = getId(id+' '+gerakan+' '+sudut )
    indicatorUpdate(elementName, sudut)
    startTimeoutIndicator(elementName, sudut)
}
function changeRound(e) {
    activeRound.textContent = e.activeRound.toUpperCase()
    round = e.activeRound
    blueScore.textContent = 0;
    redScore.textContent = 0;
}


