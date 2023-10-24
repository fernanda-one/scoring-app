import {channelOperator} from "./library/ScoreFunc";

require("./bootstrap");
import {
    cancelTimeout,
    getId, handleAction,
    indicatorUpdate, inputPoint,
    startTimeout,
    startTimeoutIndicator, updateRoundJuri,
} from "./library/JuriFunc";

let userElement = document.getElementById("user");
 const userData = JSON.parse(userElement.getAttribute("data-user"));
const pukulanBiru = document.getElementById("pukul-biru");
const pukulanMerah = document.getElementById("pukul-merah");
const tendanganBiru = document.getElementById("tendang-biru");
const tendanganMerah = document.getElementById("tendang-merah");
const roundView = document.getElementById(`round`)
const buttonAction = ['pukul-biru','tendang-biru','pukul-merah','tendang-merah']
let bluePenalty='pertama'
let redPenalty = 'pertama';
const channelGelanggang = Echo.join(`presence.juri.${userData.gelanggang_id}`);
channelOperator
    .listen(`.operator.${userData.gelanggang_id}`, (event) => {
        updateDataJuri(event)
    });
channelGelanggang
    .listen(`.juri.${userData.gelanggang_id}`, (event) => {
        updateScore(event);
    });
enabledAction(false)

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

function pushScore(blueScore,redScore){
    axios.post("/score-update", {
        message: {
            "redPenalty":'pertama',
            "bluePenalty":'pertama',
            "blueScore":blueScore,
            "redScore":redScore,
        },
    });
}
function updateScore(event) {
    const gerakan = event.gerakan;
    const sudut = event.sudut
    const id = event.id
    const pointBiru = event.blue_score
    const pointMerah = event.red_score
    const name = sudut + gerakan;
    const sudutPointTime = name + 'time';
    const exp = event.expired;
    redPenalty = event.redPenalty
    bluePenalty = event.bluePenalty
    const score = {
        'redScore': pointMerah,
        'blueScore': pointBiru,
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
            pushScore(score['blueScore'], score['redScore'])
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
    buttonAction.map(action =>{
        const button = document.getElementById(action)
        button.disabled = !status;
    })
}

function updateDataJuri(e) {
    switch (e.action) {
        case 'start':
            break;
        case 'finish':
            break;
        case 'round':
            bluePenalty='pertama'
            redPenalty = 'pertama';
            updateRoundJuri(e.activeRound)
            break;
        case 'pause':
            enabledAction(false)
            break;
        case 'play':
            enabledAction()
            break;
    }
}

