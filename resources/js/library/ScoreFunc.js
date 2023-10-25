const namaMerah = document.getElementById('nama_merah');
const kontingenMerah = document.getElementById('kontingen_merah');
const namaBiru = document.getElementById('nama_biru');
const kontingenBiru = document.getElementById('kontingen_biru');
const babak = document.getElementById('babak');
export let partaiId = ''
export let kelas;
let redScore = ''
let blueScore = ''
let userElement = document.getElementById("user");
export const userData = JSON.parse(userElement.getAttribute("data-user"));
export const channelUpdateScore = Echo.join(`presence.updateScore.${userData.gelanggang_id}`);
export const channelOperator = Echo.join(`presence.operator.${userData.gelanggang_id}`);
export const channelKetuaPertandingan = Echo.join(`presence.ketuaPertandingan.${userData.gelanggang_id}`);
export const activeRound = document.getElementById('round');
const pelanggaranPoint = {
    'pertama':0,
    'teguran-pertama': 0,
    'teguran-kedua': 1,
    'binaan-pertama': 2,
    'binaan-kedua': 3,
    'peringatan-pertama': 5,
    'peringatan-kedua': 7,
    'peringatan-ketiga': 9,
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
    const redScoreValue = event.red_score - pelanggaranPoint[redPenalty];
    const blueScoreValue = event.blue_score - pelanggaranPoint[bluePenalty];

    const scoreData = {
        redScore: event.red_score,
        blueScore: event.blue_score,
        redPenalty: event.red_penalty,
        bluePenalty: event.blue_penalty,
        droppingRed: event.droppingRed,
        droppingBlue: event.droppingBlue,
    };

    localStorage.setItem('scoreData', JSON.stringify(scoreData));

    redScore.textContent = redScoreValue;
    blueScore.textContent = blueScoreValue;
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
