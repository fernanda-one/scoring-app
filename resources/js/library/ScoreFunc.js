const namaMerah = document.getElementById('nama_merah');
const kontingenMerah = document.getElementById('kontingen_merah');
const namaBiru = document.getElementById('nama_biru');
const kontingenBiru = document.getElementById('kontingen_biru');
const babak = document.getElementById('babak');
let pureScoreRed = 0;
let pureScoreBlue = 0;
export let partaiId = ''
const rounds = ['round-1','round-2','round-3'];

export let kelas;
let redScore = ''
let blueScore = ''
let userElement = document.getElementById("user");
export const userData = JSON.parse(userElement.getAttribute("data-user"));
export const channelUpdateScore = Echo.join(`presence.updateScore.${userData.gelanggang_id}`);
export const channelPenalty= Echo.join(`presence.penalty.${userData.gelanggang_id}`);
export const channelOperator = Echo.join(`presence.operator.${userData.gelanggang_id}`);
export const activeRound = document.getElementById('round');
const pelanggaranPoint = {
    'pertama':0,
    'binaan-pertama': 0,
    'binaan-kedua': 0,
    'teguran-pertama': 1,
    'teguran-kedua': 2,
    'peringatan-pertama': 5,
    'peringatan-kedua': 10,
    'peringatan-ketiga': 15,
}
export const savedGelanggangData = JSON.parse(localStorage.getItem('gelanggangData')) || {
    namaMerah: 'Sudut Merah',
    kontingenMerah: 'Kontingen',
    namaBiru: 'Sudut Biru',
    kontingenBiru: 'kontingen',
    babak: 'BABAK',
    activeRound: 'ROUND',
};
const savedScoreData = JSON.parse(localStorage.getItem('scoreData')) || {
    redScore: 0,
    blueScore: 0,
    bluePenalty: 'teguran-pertama',
    redPenalty: 'teguran-pertama'
};
export let redPenalty = '';
export let bluePenalty = '';
function changeScoreElement (newRedScoreElement, newBlueScoreElement){
    redScore = newRedScoreElement
    blueScore = newBlueScoreElement
}
function updateScore(event, redPenalty, bluePenalty) {
    redPenalty = event.red_penalty
    bluePenalty = event.blue_penalty
    pureScoreRed = event.red_score
    pureScoreBlue = event.blue_score
    const redScoreValue = pureScoreRed - pelanggaranPoint[redPenalty];
    const blueScoreValue = pureScoreBlue - pelanggaranPoint[bluePenalty];

    const scoreData = {
        redScore: redScoreValue,
        blueScore: blueScoreValue,
        pureScoreRed: pureScoreRed,
        pureScoreBlue: pureScoreBlue,
        redPenalty: event.red_penalty,
        bluePenalty: event.blue_penalty,
        droppingRed: event.droppingRed,
        droppingBlue: event.droppingBlue,
    };

    localStorage.setItem('scoreData', JSON.stringify(scoreData));
    if (window.location.pathname !== '/ketua_pertandingan') {
        redScore.textContent = redScoreValue;
        blueScore.textContent = blueScoreValue;
    }
}
function startPertandingan(e) {
    partaiId = e.id
    kelas = e.kelas
    namaMerah.textContent = e.redName;
    kontingenMerah.textContent = e.redContingent;
    namaBiru.textContent = e.blueName;
    kontingenBiru.textContent = e.blueContingent;
    babak.textContent = e.babak.toUpperCase();
    activeRound.textContent = e.activeRound.toUpperCase();

    const gelanggangData = {
        partaiId : e.id,
        kelas : e.kelas,
        namaMerah: namaMerah.textContent,
        kontingenMerah: kontingenMerah.textContent,
        namaBiru: namaBiru.textContent,
        kontingenBiru: kontingenBiru.textContent,
        babak: babak.textContent,
        activeRound:    activeRound.textContent,
    };

    localStorage.setItem('gelanggangData', JSON.stringify(gelanggangData));
}

export function getDataGelanggang(){
    return {
        namaMerah: namaMerah.textContent,
        kontingenMerah: kontingenMerah.textContent,
        namaBiru: namaBiru.textContent,
        kontingenBiru: kontingenBiru.textContent,
        babak: babak.textContent,
        activeRound: activeRound.textContent,
    };
}

function loadDataSaved() {
    partaiId = savedGelanggangData.partaiId;
    kelas = savedGelanggangData.kelas;
    namaMerah.textContent = savedGelanggangData.namaMerah;
    kontingenMerah.textContent = savedGelanggangData.kontingenMerah;
    namaBiru.textContent = savedGelanggangData.namaBiru;
    kontingenBiru.textContent = savedGelanggangData.kontingenBiru;
    babak.textContent = savedGelanggangData.babak;
    activeRound.textContent = savedGelanggangData.activeRound;
    redPenalty = savedScoreData.redPenalty
    bluePenalty = savedScoreData.bluePenalty
    redScore.textContent = savedScoreData.redScore
    blueScore.textContent = savedScoreData.blueScore
}


export {startPertandingan, loadDataSaved, updateScore, changeScoreElement}
