import {channelOperator, channelUpdateScore} from "./library/ScoreFunc";

require("./bootstrap");
import {
    loadDataSaved,
    cancelTimeout,
    getId, handleAction,
    indicatorUpdate, inputPoint,
    startTimeout,
    startTimeoutIndicator, updateRoundJuri,
} from "./library/JuriFunc";

let userElement = document.getElementById("user");
const userData = JSON.parse(userElement.getAttribute("data-user"));
const header = document.getElementById("header");
const visibleHeader = document.getElementById("visible-header");
const firstLinePointGroup = document.getElementById("first-line-point-group");
const pukulanBiru = document.getElementById("pukul-biru");
const pukulanMerah = document.getElementById("pukul-merah");
const tendanganBiru = document.getElementById("tendang-biru");
const tendanganMerah = document.getElementById("tendang-merah");
let round = ''
let pureScoreRed = 0;
let pureScoreBlue = 0;
const buttonAction = ['pukul-biru','tendang-biru','pukul-merah','tendang-merah']
let bluePenalty='pertama'
let redPenalty = 'pertama';
let actionStatus = false
const channelGelanggang = Echo.join(`presence.juri.${userData.gelanggang_id}`);

if (localStorage.getItem('dataJuri')){
    loadDataSaveJuri()
}
channelOperator
    .listen(`.operator.${userData.gelanggang_id}`, (event) => {
        updateDataJuri(event)
    });
function updateDataScore(event) {
    pureScoreRed = event.red_score;
    pureScoreBlue = event.blue_score;
    redPenalty = event.red_penalty
    bluePenalty = event.blue_penalty
}

channelUpdateScore
    .listen(`.updateScore.${userData.gelanggang_id}`, (event) => {
        updateDataScore(event)
    });

channelGelanggang
    .listen(`.juri.${userData.gelanggang_id}`, (event) => {
        updateScore(event);
    });

enabledAction(false)
loadDataSaved()

visibleHeader.addEventListener("click", function() {
    if (header.classList.contains("hidden")) {
        visibleHeader.textContent = "Tutup"
        header.classList.remove("hidden");
        header.classList.add("flex");
        firstLinePointGroup.classList.remove("mt-[0%]");
        firstLinePointGroup.classList.add("mt-[5%]");
    } else {
        visibleHeader.textContent = "Lihat"
        header.classList.add("hidden");
        header.classList.remove("flex")
        firstLinePointGroup.classList.remove("mt-[5%]");
        firstLinePointGroup.classList.add("mt-[0%]");
    }
})

pukulanBiru.addEventListener("click", function (event) {
    startTimeout('blueInput', 'pukulanblue', inputPoint('blueInput',1,'blue'), 'blue')
    handleAction(event, 'blue', 'pukulan');

});

pukulanMerah.addEventListener("click", function (event) {
    startTimeout('redInput', 'pukulanred',inputPoint('redInput', 1))
    handleAction(event, 'red', 'pukulan');
});

tendanganMerah.addEventListener("click", function (event) {
    startTimeout('redInput', 'tendanganred', inputPoint('redInput',2))
    handleAction(event, 'red', 'tendangan');
});

tendanganBiru.addEventListener("click", function (event) {
    startTimeout('blueInput', 'tendanganblue',inputPoint('blueInput',2,'blue'),'blue')
    handleAction(event, 'blue', 'tendangan');
});

function pushScore(){
    axios.post("/score-update", {
        message: {
            "redPenalty":redPenalty,
            "bluePenalty":bluePenalty,
            "blueScore": pureScoreBlue,
            "redScore": pureScoreRed,
            "droppingRed": 0,
            "droppingBlue": 0,
        },
    });
    saveData()
}

function updateScore(event) {
    console.log(event)
    const gerakan = event.gerakan;
    const sudut = event.sudut
    const id = event.id
    const name = sudut + gerakan;
    const sudutPointTime = name + 'time';
    const exp = event.expired;
    const score = {
        'redScore': 0,
        'blueScore': 0,
    }
    const sudutScore = event.sudut + 'Score';
    const elementName = getId(id+' '+gerakan+' '+sudut )
    indicatorUpdate(elementName, sudut)
    startTimeoutIndicator(elementName, sudut)
    if (localStorage.getItem(sudutPointTime) && localStorage.getItem(name)) {
        const time = localStorage.getItem(sudutPointTime);
        if ( exp - time <= 2000 && localStorage.getItem(name) !== id) {
            if (gerakan === 'tendangan') {
                score[`${sudutScore}`] += 2
            } else {
                score[`${sudutScore}`] += 1
            }
            localStorage.removeItem(sudutPointTime);
            localStorage.removeItem(name);
            cancelTimeout(gerakan+sudut)
            pureScoreRed += score['redScore']
            pureScoreBlue += score['blueScore']
            pushScore()
            return score;
        }
        localStorage.removeItem(sudutPointTime)
        localStorage.removeItem(name)
    }
    localStorage.setItem(sudutPointTime, exp);
    localStorage.setItem(name, id);
    return score;
}

function enabledAction(status = true) {
    actionStatus = status
    buttonAction.map(action =>{
        const button = document.getElementById(action)
        button.disabled = !status;
    })
}

function updateDataJuri(e) {
    switch (e.action) {
        case 'start':
            updateRoundJuri(e.activeRound)
            break;
        case 'finish':
            break;
        case 'round':
            enabledAction(false)
            changeRoundJuri(e.activeRound)
            updateRoundJuri(e.activeRound)
            break;
        case 'pause':
            enabledAction(false)
            break;
        case 'play':
            enabledAction()
            break;
        case 'reset':
            localStorage.clear()
            break;
    }
}

function changeRoundJuri(roundActive){
    round = roundActive
}

function saveData(){
    // const data ={
    //     bluePenalty:bluePenalty,
    //     redPenalty:redPenalty,
    //     pureScoreRed:pureScoreRed,
    //     pureScoreBlue:pureScoreBlue,
    //     actionStatus:actionStatus,
    //     round : round
    // }
    // localStorage.setItem('dataJuriScoring', JSON.stringify(data))
}

function loadDataSaveJuri(){
    // const data = JSON.parse(localStorage.getItem('dataJuriScoring'))
    // bluePenalty = data.bluePenalty
    // redPenalty = data.redPenalty
    // pureScoreRed = data.pureScoreRed
    // pureScoreBlue = data.pureScoreBlue
    // updateRoundJuri(data.round)
    // enabledAction(data.actionStatus)
}
