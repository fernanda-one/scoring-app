import { isEmpty } from "lodash";
const rounds = ["round-1", "round-2", "round-3"];
let pureScoreRed = 0;
let pureScoreBlue = 0;
let bluePenalty = ["pertama"];
const buttonAction = [
    "pukul-biru",
    "tendang-biru",
    "pukul-merah",
    "tendang-merah",
];
let redPenalty = ["pertama"];
let roundGelanggang =
    JSON.parse(
        localStorage.getItem("gelanggangData")
    )?.activeRound?.toLowerCase() || "ROUND";
const dataJuri = {
    blueScore: document.getElementById(`round-1-blueScore`),
    redScore: document.getElementById(`round-1-redScore`),
    blueInput: document.getElementById(`round-1-blueInput`),
    redInput: document.getElementById(`round-1-redInput`),
};
let actionStatus = false;
export function updateRoundJuri(round) {
    dataJuri.blueScore = document.getElementById(`${round}-blueScore`);
    dataJuri.redScore = document.getElementById(`${round}-redScore`);
    dataJuri.blueInput = document.getElementById(`${round}-blueInput`);
    dataJuri.redInput = document.getElementById(`${round}-redInput`);
    roundGelanggang = round;
}

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

export function getId(id) {
    return id.toLowerCase().replace(/ /g, "-");
}
export function indicatorUpdate(id, sudut) {
    console.log(id);
    const indicator = document.getElementById(id);
    if (sudut === "blue") {
        indicator.classList.toggle("bg-blueDefault");
        indicator.classList.toggle("bg-grayDefault");
    } else {
        indicator.classList.toggle("bg-redDefault");
        indicator.classList.toggle("bg-grayDefault");
    }
}

export function startTimeoutIndicator(element, sudut) {
    let name = element.replace(/-/g, "");
    timeouts[`${name}`] = setTimeout(() => {
        indicatorUpdate(element, sudut);
    }, 2000);
}

export function startTimeout(element, params, posisi, sudut = "red") {
    timeouts[`${params}`] = setTimeout(() => {
        strikeoutLastValue(element, posisi, sudut);
    }, 2000);
}

export function cancelTimeout(params) {
    params = params.toLowerCase();
    clearTimeout(timeouts[`${params}`]);
}

export function inputPoint(element, point, sudut = "red") {
    element = dataJuri[`${element}`];
    const text = element.innerHTML;
    const values = text.split(",");
    if (!isEmpty(text)) {
        const formattedValues = values.map((value) => {
            if (!value.includes("<s>")) {
                return `${value.trim()}`;
            } else {
                return value;
            }
        });
        if (sudut === "blue") {
            formattedValues.reverse();
            formattedValues.push(`${point}`);
            formattedValues.reverse();
        } else {
            formattedValues.push(`${point}`);
        }
        const joinValues = formattedValues.join(",");
        element.innerHTML = joinValues;
        const scorePiece = joinValues;
        pushKetuaPertandingan(sudut, scorePiece);
        saveDataJuri();
        return values.length;
    } else {
        element.innerHTML = point;
        pushKetuaPertandingan(sudut, point);
        saveDataJuri();
    }
}

export function changeRoundJuri(roundActive) {
    roundGelanggang = roundActive;
}
function strikeoutLastValue(element, posisi, sudut) {
    element = dataJuri[`${element}`];
    const text = element.innerHTML;

    if (text !== "") {
        let values = text.split(",");
        if (sudut === "blue") {
            values = values.reverse();
        }
        const valuePosisi = values.splice(posisi, 1)[0];
        values.splice(posisi, 0, `<s>${valuePosisi.trim()}</s>`);
        if (sudut === "blue") {
            values = values.reverse();
        }
        const formattedValues = values.map((value) => {
            if (!value.includes("<s>")) {
                return `${value.trim()}`;
            } else {
                return value;
            }
        });
        const scorePiece = formattedValues.join(",");
        element.innerHTML = scorePiece;
        pushKetuaPertandingan(sudut, scorePiece);
        saveDataJuri();
    }
    saveDataJuri();
}

export function handleAction(event, color, action) {
    event.preventDefault();
    pushMessage(color, action);
}

function pushMessage(sudut, gerakan, blueScore = 0, redScore = 0) {
    axios.post("/score-event", {
        message: {
            gerakan: gerakan,
            sudut: sudut,
            blueScore: blueScore,
            redScore: redScore,
            time: Date.now(),
        },
    });
}

function pushKetuaPertandingan(sudut, scorePiece) {
    axios.post("/ketua-pertandingan-update", {
        message: {
            sudut: sudut,
            scorePiece: scorePiece,
        },
    });
}

export function saveDataJuri() {
    const data = {
        bluePenalty: bluePenalty,
        redPenalty: redPenalty,
        pureScoreRed: pureScoreRed,
        pureScoreBlue: pureScoreBlue,
        actionStatus: actionStatus,
    };
    rounds.map((round) => {
        data[round] = {
            blueInput: document.getElementById(`${round}-blueInput`).innerHTML,
            redInput: document.getElementById(`${round}-redInput`).innerHTML,
            redScore: document.getElementById(`${round}-redScore`).textContent,
            blueScore: document.getElementById(`${round}-blueScore`)
                .textContent,
        };
    });
    localStorage.setItem("dataJuriScoring", JSON.stringify(data));
}

export function loadDataSaveJuri() {
    const data = JSON.parse(localStorage.getItem("dataJuriScoring"));
    bluePenalty = data.bluePenalty;
    redPenalty = data.redPenalty;
    pureScoreRed = data.pureScoreRed;
    pureScoreBlue = data.pureScoreBlue;
    console.log(data);
    rounds.map((round) => {
        document.getElementById(`${round}-blueInput`).innerHTML =
            data[round].blueInput;
        document.getElementById(`${round}-redInput`).innerHTML =
            data[round].redInput;
        document.getElementById(`${round}-redScore`).textContent =
            data[round].redScore;
        document.getElementById(`${round}-blueScore`).textContent =
            data[round].blueScore;
    });
}

export function updateDataScore(event) {
    pureScoreRed = event.red_score;
    pureScoreBlue = event.blue_score;
    redPenalty = event.red_penalty;
    bluePenalty = event.blue_penalty;
}

export function updateScore(event) {
    console.log(event);
    const gerakan = event.gerakan;
    const sudut = event.sudut;
    const id = event.id;
    const name = sudut + gerakan;
    const sudutPointTime = name + "time";
    const exp = event.expired;
    const score = {
        redScore: 0,
        blueScore: 0,
    };
    const sudutScore = event.sudut + "Score";
    const elementName = getId(id + " " + gerakan + " " + sudut);
    indicatorUpdate(elementName, sudut);
    startTimeoutIndicator(elementName, sudut);
    if (localStorage.getItem(sudutPointTime) && localStorage.getItem(name)) {
        const time = localStorage.getItem(sudutPointTime);
        if (exp - time <= 2000 && localStorage.getItem(name) !== id) {
            if (gerakan === "tendangan") {
                score[`${sudutScore}`] += 2;
            } else {
                score[`${sudutScore}`] += 1;
            }
            localStorage.removeItem(sudutPointTime);
            localStorage.removeItem(name);
            cancelTimeout(gerakan + sudut);
            pureScoreRed += score["redScore"];
            pureScoreBlue += score["blueScore"];
            pushScore();
            return score;
        }
        localStorage.removeItem(sudutPointTime);
        localStorage.removeItem(name);
    }
    localStorage.setItem(sudutPointTime, exp);
    localStorage.setItem(name, id);
    return score;
}

function pushScore() {
    saveDataJuri();
    axios.post("/score-update", {
        message: {
            redPenalty: redPenalty,
            bluePenalty: bluePenalty,
            blueScore: pureScoreBlue,
            redScore: pureScoreRed,
            droppingRed: 0,
            droppingBlue: 0,
        },
    });
}

export function enabledAction(status = true) {
    actionStatus = status;
    buttonAction.map((action) => {
        const button = document.getElementById(action);
        button.disabled = !status;
    });
}
