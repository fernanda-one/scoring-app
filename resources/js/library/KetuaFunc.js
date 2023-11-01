let gelanggangData = JSON.parse(localStorage.getItem("gelanggangData"));
let round = gelanggangData?.activeRound?.toLowerCase() || 'ROUND';
let dropRed = []
let dropBlue = []
let savedGelanggangData = {};
let savedKetuaData = {
    'round-1': {
        'red': {},
        'blue': {},
    },
    'round-2': {
        'red': {},
        'blue': {},
    },
    'round-3': {
        'red': {},
        'blue': {},
    },
}
let userElement = document.getElementById("user");
const userData = JSON.parse(userElement.getAttribute("data-user"));
export const channelKetuaPertandingan = Echo.join(`presence.ketuaPertandingan.${userData.gelanggang_id}`);
const ketuaData = JSON.parse(localStorage.getItem("dataKetuaPertandingan"));
const namaMerah = document.getElementById('nama_merah');
const kontingenMerah = document.getElementById('kontingen_merah');
const namaBiru = document.getElementById('nama_biru');
const kontingenBiru = document.getElementById('kontingen_biru');
const babak = document.getElementById('babak');
const activeRound = document.getElementById('round');

const redCorner = {
    'jurror1': document.getElementById(`${round}-jurror1-red`),
    'jurror2': document.getElementById(`${round}-jurror2-red`),
    'jurror3': document.getElementById(`${round}-jurror3-red`),
    'point': document.getElementById(`${round}-point-red`),
    'dropping': document.getElementById(`${round}-dropping-red`),
    'penalty': document.getElementById(`${round}-penalty-red`),
    'boardPoint': document.getElementById(`${round}-board-point-red`),
};

const blueCorner = {
    'jurror1': document.getElementById(`${round}-jurror1-blue`),
    'jurror2': document.getElementById(`${round}-jurror2-blue`),
    'jurror3': document.getElementById(`${round}-jurror3-blue`),
    'point': document.getElementById(`${round}-point-blue`),
    'dropping': document.getElementById(`${round}-dropping-blue`),
    'penalty': document.getElementById(`${round}-penalty-blue`),
    'boardPoint': document.getElementById(`${round}-board-point-blue`),
}

function initialDynamicDom() {
    redCorner['jurror1'] = document.getElementById(`${round}-jurror1-red`);
    redCorner['jurror2'] = document.getElementById(`${round}-jurror2-red`);
    redCorner['jurror3'] = document.getElementById(`${round}-jurror3-red`);
    redCorner['point'] = document.getElementById(`${round}-point-red`);
    redCorner['dropping'] = document.getElementById(`${round}-dropping-red`);
    redCorner['penalty'] = document.getElementById(`${round}-penalty-red`);
    redCorner['boardPoint'] = document.getElementById(`${round}-board-point-red`);

    blueCorner['jurror1'] = document.getElementById(`${round}-jurror1-blue`);
    blueCorner['jurror2'] = document.getElementById(`${round}-jurror2-blue`);
    blueCorner['jurror3'] = document.getElementById(`${round}-jurror3-blue`);
    blueCorner['point'] = document.getElementById(`${round}-point-blue`);
    blueCorner['dropping'] = document.getElementById(`${round}-dropping-blue`);
    blueCorner['penalty'] = document.getElementById(`${round}-penalty-blue`);
    blueCorner['boardPoint'] = document.getElementById(`${round}-board-point-blue`);
}

function initialGeneralDom() {
    // round1
    document.getElementById(`round-1-jurror1-red`).innerHTML = ketuaData['round-1']?.red?.jurror1 || '';
    document.getElementById(`round-1-jurror2-red`).innerHTML = ketuaData['round-1']?.red?.jurror2 || '';
    document.getElementById(`round-1-jurror3-red`).innerHTML = ketuaData['round-1']?.red?.jurror3 || '';
    document.getElementById(`round-1-point-red`).innerHTML = ketuaData['round-1']?.red?.point || 0;
    document.getElementById(`round-1-dropping-red`).innerHTML = ketuaData['round-1']?.red?.dropping || '';
    document.getElementById(`round-1-penalty-red`).innerHTML = ketuaData['round-1']?.red?.penalty || '';
    document.getElementById(`round-1-board-point-red`).innerHTML = ketuaData['round-1']?.red?.point || 0;

    document.getElementById(`round-1-jurror1-blue`).innerHTML = ketuaData['round-1']?.blue?.jurror1 || '';
    document.getElementById(`round-1-jurror2-blue`).innerHTML = ketuaData['round-1']?.blue?.jurror2 || '';
    document.getElementById(`round-1-jurror3-blue`).innerHTML = ketuaData['round-1']?.blue?.jurror3 || '';
    document.getElementById(`round-1-point-blue`).innerHTML = ketuaData['round-1']?.blue?.point || 0;
    document.getElementById(`round-1-dropping-blue`).innerHTML = ketuaData['round-1']?.blue?.dropping || '';
    document.getElementById(`round-1-penalty-blue`).innerHTML = ketuaData['round-1']?.blue?.penalty || '';
    document.getElementById(`round-1-board-point-blue`).innerHTML = ketuaData['round-1']?.blue?.point || 0;

    // round 2
    document.getElementById(`round-2-jurror1-red`).innerHTML = ketuaData['round-2']?.red?.jurror1 || '';
    document.getElementById(`round-2-jurror2-red`).innerHTML = ketuaData['round-2']?.red?.jurror2 || '';
    document.getElementById(`round-2-jurror3-red`).innerHTML = ketuaData['round-2']?.red?.jurror3 || '';
    document.getElementById(`round-2-point-red`).innerHTML = ketuaData['round-2']?.red?.point || 0;
    document.getElementById(`round-2-dropping-red`).innerHTML = ketuaData['round-2']?.red?.dropping || '';
    document.getElementById(`round-2-penalty-red`).innerHTML = ketuaData['round-2']?.red?.penalty || '';
    document.getElementById(`round-2-board-point-red`).innerHTML = ketuaData['round-2']?.red?.point || 0;

    document.getElementById(`round-2-jurror1-blue`).innerHTML = ketuaData['round-2']?.blue?.jurror1 || '';
    document.getElementById(`round-2-jurror2-blue`).innerHTML = ketuaData['round-2']?.blue?.jurror2 || '';
    document.getElementById(`round-2-jurror3-blue`).innerHTML = ketuaData['round-2']?.blue?.jurror3 || '';
    document.getElementById(`round-2-point-blue`).innerHTML = ketuaData['round-2']?.blue?.point || 0;
    document.getElementById(`round-2-dropping-blue`).innerHTML = ketuaData['round-2']?.blue?.dropping || '';
    document.getElementById(`round-2-penalty-blue`).innerHTML = ketuaData['round-2']?.blue?.penalty || '';
    document.getElementById(`round-2-board-point-blue`).innerHTML = ketuaData['round-2']?.blue?.point || 0;

    // round 3
    document.getElementById(`round-3-jurror1-red`).innerHTML = ketuaData['round-3']?.red?.jurror1 || '';
    document.getElementById(`round-3-jurror2-red`).innerHTML = ketuaData['round-3']?.red?.jurror2 || '';
    document.getElementById(`round-3-jurror3-red`).innerHTML = ketuaData['round-3']?.red?.jurror3 || '';
    document.getElementById(`round-3-point-red`).innerHTML = ketuaData['round-3']?.red?.point || 0;
    document.getElementById(`round-3-dropping-red`).innerHTML = ketuaData['round-3']?.red?.dropping || '';
    document.getElementById(`round-3-penalty-red`).innerHTML = ketuaData['round-3']?.red?.penalty || '';
    document.getElementById(`round-3-board-point-red`).innerHTML = ketuaData['round-3']?.red?.point || 0;

    document.getElementById(`round-3-jurror1-blue`).innerHTML = ketuaData['round-3']?.blue?.jurror1 || '';
    document.getElementById(`round-3-jurror2-blue`).innerHTML = ketuaData['round-3']?.blue?.jurror2 || '';
    document.getElementById(`round-3-jurror3-blue`).innerHTML = ketuaData['round-3']?.blue?.jurror3 || '';
    document.getElementById(`round-3-point-blue`).innerHTML = ketuaData['round-3']?.blue?.point || 0;
    document.getElementById(`round-3-dropping-blue`).innerHTML = ketuaData['round-3']?.blue?.dropping || '';
    document.getElementById(`round-3-penalty-blue`).innerHTML = ketuaData['round-3']?.blue?.penalty || '';
    document.getElementById(`round-3-board-point-blue`).innerHTML = ketuaData['round-3']?.blue?.point || 0;
}

function storeGelanggangData(data) {
    savedGelanggangData = data;
}

function startPertandingan(e) {
    round = e.activeRound;
    namaMerah.textContent = e.redName;
    kontingenMerah.textContent = e.redContingent;
    namaBiru.textContent = e.blueName;
    kontingenBiru.textContent = e.blueContingent;
    babak.textContent = e.babak.toUpperCase();
    activeRound.textContent = e.activeRound.toUpperCase();

    const gelanggangData = {
        namaMerah: e.redName,
        kontingenMerah: e.redContingent,
        namaBiru: e.blueName,
        kontingenBiru: e.blueContingent,
        babak: e.babak.toUpperCase(),
        activeRound: e.activeRound,
    };
    initialDynamicDom();

    localStorage.setItem('gelanggangData', JSON.stringify(gelanggangData));
}

function loadDataSaved() {
    namaMerah.textContent = savedGelanggangData.namaMerah;
    kontingenMerah.textContent = savedGelanggangData.kontingenMerah;
    namaBiru.textContent = savedGelanggangData.namaBiru;
    kontingenBiru.textContent = savedGelanggangData.kontingenBiru;
    babak.textContent = savedGelanggangData.babak;
    activeRound.textContent = savedGelanggangData.activeRound;
    if (ketuaData) {
        savedKetuaData = ketuaData;
        initialGeneralDom();
    }
}

function changeRound(event) {
    const gelanggang = JSON.parse(localStorage.getItem("gelanggangData"));
    round = event.activeRound
    activeRound.textContent = round
    gelanggang.activeRound = round
    localStorage.setItem("gelanggangData", JSON.stringify(gelanggang));
    resetDropping();
    initialDynamicDom();
}

function storeJurror(jurror, scorePiece, sudut) {
    const corner = sudut === 'red' ? redCorner : blueCorner;

    let juriKey;
    switch (jurror) {
        case 'Juri Pertama':
            juriKey = 'jurror1';
            break;
        case 'Juri Kedua':
            juriKey = 'jurror2';
            break;
        case 'Juri Ketiga':
            juriKey = 'jurror3';
            break;
        default:
            break;
    }
    corner[juriKey].innerHTML = scorePiece;

    // Buat objek data yang akan ditambahkan
    let dataJuriToAdd = {};
    dataJuriToAdd[juriKey] = scorePiece;

    // Perbarui savedKetuaData sesuai dengan sudut dan data baru
    savedKetuaData[round][sudut] = { ...savedKetuaData[round][sudut], ...dataJuriToAdd };
    localStorage.setItem('dataKetuaPertandingan', JSON.stringify(savedKetuaData));
}

function storePoint() {
    const scoreData = JSON.parse(localStorage.getItem("scoreData"));
    const redScore = scoreData?.redScore;
    const blueScore = scoreData?.blueScore;
    redCorner.point.innerText = redScore;
    blueCorner.point.innerText = blueScore;
    redCorner.boardPoint.innerText = redScore;
    blueCorner.boardPoint.innerText = blueScore;

    // Simpan data poin sesuai dengan sudutnya
    savedKetuaData[round]['red'].point = redScore;
    savedKetuaData[round]['blue'].point = blueScore;
     // Simpan ke localStorage
     localStorage.setItem('dataKetuaPertandingan', JSON.stringify(savedKetuaData));
}

function storeDroppingRed(value) {
    if(value === -2){
        dropRed.push('-2')
    } else if (value === 2){
        dropRed.push('2')
    }
    value = dropRed.join(',')
    redCorner.dropping.innerText = value;
    savedKetuaData[round]['red'].dropping = value;
    localStorage.setItem('dataKetuaPertandingan', JSON.stringify(savedKetuaData));
}

function storeDroppingBlue(value) {
    if(value === -2){
        dropBlue.reverse()
        dropBlue.push('-2')
        dropBlue.reverse()
    } else if (value === 2){
        dropBlue.reverse()
        dropBlue.push('2')
        dropBlue.reverse()
    }
    value = dropBlue.join(',')
    blueCorner.dropping.innerText = value;
    savedKetuaData[round]['blue'].dropping = value;
    localStorage.setItem('dataKetuaPertandingan', JSON.stringify(savedKetuaData));
}

function resetDropping() {
    dropRed = [];
    dropBlue = [];
}

function storeRedPenalty(value) {
    let redPenalty = value.replace(/-/g, " ");
    redCorner.penalty.innerText = redPenalty;
    savedKetuaData[round]['red'].penalty = redPenalty;
    localStorage.setItem('dataKetuaPertandingan', JSON.stringify(savedKetuaData));
}

function storeBluePenalty(value) {
    let bluePenalty = value.replace(/-/g, " ");
    blueCorner.penalty.innerText = bluePenalty;
    savedKetuaData[round]['blue'].penalty = bluePenalty;
    localStorage.setItem('dataKetuaPertandingan', JSON.stringify(savedKetuaData));
}

export {
    storeGelanggangData,
    startPertandingan,
    loadDataSaved,
    changeRound,
    storeJurror,
    storePoint,
    storeDroppingRed,
    storeDroppingBlue,
    storeRedPenalty,
    storeBluePenalty
}
