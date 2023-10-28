import {isEmpty} from "lodash";
import { toInteger } from "lodash/lang";

let rounds = JSON.parse(localStorage.getItem("gelanggangData"))?.activeRound?.toLowerCase() || 'ROUND'
const dataJuri = {
    blueScore : document.getElementById(`round-1-blueScore`),
    redScore : document.getElementById(`round-1-redScore`),
    blueInput : document.getElementById(`round-1-blueInput`),
    redInput : document.getElementById(`round-1-redInput`),
}
export function updateRoundJuri(round){
    dataJuri.blueScore = document.getElementById(`${round}-blueScore`);
    dataJuri.redScore = document.getElementById(`${round}-redScore`);
    dataJuri.blueInput = document.getElementById(`${round}-blueInput`);
    dataJuri.redInput = document.getElementById(`${round}-redInput`);
    rounds = round;
}
let savedJuriData = {
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

const juriData = JSON.parse(localStorage.getItem("dataJuri"));
export const timeouts = {
    pukulanred: [],
    pukulanblue: [],
    tendanganblue: [],
    tendanganred: [],
    juripertamapukulanred: [],
    jurikeduapukulanred: [],
    juriketigapukulanred: [],
    juripertamapukulanblue: [],
    jurikeduapukulanblue: [],
    juriketigapukulanblue: [],
    juripertamatendanganred: [],
    jurikeduatendanganred: [],
    juriketigatendanganred: [],
    juripertamatendanganblue: [],
    jurikeduatendanganblue: [],
    juriketigatendanganblue: [],
};

export function loadDataSaved() {
    if (juriData) {
        savedJuriData = juriData;
        document.getElementById(`round-1-redInput`).innerHTML = juriData['round-1']?.red?.scorePiece || '';
        document.getElementById(`round-1-redScore`).innerHTML = 0;
        document.getElementById(`round-1-blueInput`).innerHTML = juriData['round-1']?.blue?.scorePiece || '';
        document.getElementById(`round-1-blueScore`).innerHTML = 0;

        document.getElementById(`round-2-redInput`).innerHTML = juriData['round-2']?.red?.scorePiece || '';
        document.getElementById(`round-2-redScore`).innerHTML = 0;
        document.getElementById(`round-2-blueInput`).innerHTML = juriData['round-2']?.blue?.scorePiece || '';
        document.getElementById(`round-2-blueScore`).innerHTML = 0;

        document.getElementById(`round-3-redInput`).innerHTML = juriData['round-3']?.red?.scorePiece || '';
        document.getElementById(`round-3-redScore`).innerHTML = 0;
        document.getElementById(`round-3-blueInput`).innerHTML = juriData['round-3']?.blue?.scorePiece || '';
        document.getElementById(`round-3-blueScore`).innerHTML = 0;
    }
}

export function getId(id){
    return id.toLowerCase().replace(/ /g, '-');
}
export function indicatorUpdate(id, sudut){
    console.log(id)
    const indicator = document.getElementById(id);
    if (sudut === 'blue'){
        indicator.classList.toggle('bg-blueDefault')
        indicator.classList.toggle('bg-grayDefault')
    } else {
        indicator.classList.toggle('bg-redDefault')
        indicator.classList.toggle('bg-grayDefault')
    }
}

export function startTimeoutIndicator(element,sudut){
    let name = element.replace(/-/g,'')
    timeouts[`${name}`] = setTimeout(() => {
        indicatorUpdate(element, sudut);
    }, 2000);
}

export function startTimeout(element, params, posisi, sudut = 'red') {
    timeouts[`${params}`] = setTimeout(() => {
        strikeoutLastValue(element, posisi, sudut);
    }, 2000);
}

export function cancelTimeout(params) {
    params = params.toLowerCase()
    clearTimeout(timeouts[`${params}`]);
}

function storeJurrorData(sudut, scorePiece) {
    let dataJuriToAdd = {};
    dataJuriToAdd["scorePiece"] = scorePiece;
    savedJuriData[rounds][sudut] = { ...savedJuriData[rounds][sudut], ...dataJuriToAdd };
    localStorage.setItem('dataJuri', JSON.stringify(savedJuriData));
}

export function inputPoint(element, point,sudut = 'red' ){
    element = dataJuri[`${element}`]
    const text = element.innerHTML;
    const values = text.split(",");
    if (!isEmpty(text)){
        const formattedValues = values.map(value => {
            if (!value.includes("<s>")) {
                return `${value.trim()}`;
            } else {
                return value;
            }
        });
        if (sudut === 'blue'){
            formattedValues.reverse()
            formattedValues.push(`${point}`)
            formattedValues.reverse()
        } else{
            formattedValues.push(`${point}`)
        }
        const joinValues = formattedValues.join(",");
        element.innerHTML = joinValues
        const scorePiece = joinValues
        pushKetuaPertandingan(sudut, scorePiece);
        storeJurrorData(sudut, scorePiece);
        return values.length
    } else {
        element.innerHTML = point;
        pushKetuaPertandingan(sudut, point);
        storeJurrorData(sudut, point);
    }
}
function strikeoutLastValue(element, posisi, sudut) {
    element = dataJuri[`${element}`]
    const text = element.innerHTML;

    if (text !== "") {
        let values = text.split(",");
        if (sudut === 'blue'){
            values = values.reverse()
        }
        const valuePosisi = values.splice(posisi, 1)[0];
        values.splice(posisi, 0, `<s>${valuePosisi.trim()}</s>` )
        if (sudut === 'blue'){
            values = values.reverse()
        }
        const formattedValues = values.map(value => {
            if (!value.includes("<s>")) {
                return `${value.trim()}`;
            } else {
                return value;
            }
        });
        const scorePiece = formattedValues.join(",");
        element.innerHTML = scorePiece;
        pushKetuaPertandingan(sudut, scorePiece);
        storeJurrorData(sudut, scorePiece);
    }
}

export function handleAction(event, color, action) {
    event.preventDefault();
    pushMessage(color, action, toInteger(dataJuri.blueScore.textContent), toInteger(dataJuri.redScore.textContent));
}

function pushMessage(sudut,gerakan, blueScore = 0,redScore = 0){
    axios.post("/score-event", {
        message: {
            "gerakan":gerakan,
            "sudut":sudut,
            "blueScore":blueScore,
            "redScore":redScore,
            "time":Date.now()
        },
    });
}

function pushKetuaPertandingan(sudut,scorePiece){
    axios.post("/ketua-pertandingan-update", {
        message: {
            "sudut": sudut,
            "scorePiece": scorePiece,
        },
    });
}
