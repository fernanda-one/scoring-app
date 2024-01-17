import { isEmpty } from "lodash";
import { activeRound, getDataGelanggang } from "./ScoreFunc";

const pelanggaran = [
    "teguran-pertama",
    "teguran-kedua",
    "binaan-pertama",
    "binaan-kedua",
    "peringatan-pertama",
    "peringatan-kedua",
    "peringatan-ketiga",
];
let bluePenalty = "pertama";
let redPenalty = "pertama";
let pureScoreRed = 0;
let pureScoreBlue = 0;
const rounds = ["round-1", "round-2", "round-3"];
const pelanggaranPoint = {
    pertama: 0,
    "binaan-pertama": 0,
    "binaan-kedua": 0,
    "teguran-pertama": 1,
    "teguran-kedua": 2,
    "peringatan-pertama": 5,
    "peringatan-kedua": 10,
    "peringatan-ketiga": 0,
};
let pelanggaranBiru = [];
let pelanggaranMerah = [];
const buttonAction = [
    "jatuhan-biru-minus",
    "jatuhan-biru-plus",
    "jatuhan-merah-minus",
    "jatuhan-merah-plus",
    "peringatan-biru-ketiga",
    "peringatan-biru-kedua",
    "binaan-biru-kedua",
    "teguran-biru-kedua",
    "peringatan-biru-pertama",
    "binaan-biru-pertama",
    "teguran-biru-pertama",
    "peringatan-merah-ketiga",
    "peringatan-merah-kedua",
    "binaan-merah-kedua",
    "teguran-merah-kedua",
    "peringatan-merah-pertama",
    "binaan-merah-pertama",
    "teguran-merah-pertama",
    "disk-merah",
    "disk-biru",
];

let actionStatus = false;
const pelanggaranRedElement = {
    "teguran-pertama": document.getElementById("teguran-merah-pertama"),
    "teguran-kedua": document.getElementById("teguran-merah-kedua"),
    "binaan-pertama": document.getElementById("binaan-merah-pertama"),
    "binaan-kedua": document.getElementById("binaan-merah-kedua"),
    "peringatan-pertama": document.getElementById("peringatan-merah-pertama"),
    "peringatan-kedua": document.getElementById("peringatan-merah-kedua"),
    "peringatan-ketiga": document.getElementById("peringatan-merah-ketiga"),
};
const pelanggaranBlueElement = {
    "teguran-pertama": document.getElementById("teguran-biru-pertama"),
    "teguran-kedua": document.getElementById("teguran-biru-kedua"),
    "binaan-pertama": document.getElementById("binaan-biru-pertama"),
    "binaan-kedua": document.getElementById("binaan-biru-kedua"),
    "peringatan-pertama": document.getElementById("peringatan-biru-pertama"),
    "peringatan-kedua": document.getElementById("peringatan-biru-kedua"),
    "peringatan-ketiga": document.getElementById("peringatan-biru-ketiga"),
};
const dataDewan = {
    blueInput: document.getElementById(`round-1-blueInput`),
    redInput: document.getElementById(`round-1-redInput`),
    redScore: document.getElementById("round-1-redScore"),
    blueScore: document.getElementById("round-1-blueScore"),
};
export function updateRoundDewan(round) {
    dataDewan.blueInput = document.getElementById(`${round}-blueInput`);
    dataDewan.redInput = document.getElementById(`${round}-redInput`);
    dataDewan.blueScore = document.getElementById(`${round}-blueScore`);
    dataDewan.redScore = document.getElementById(`${round}-redScore`);
}
export function enabledAction(status = true) {
    actionStatus = status;
    buttonAction.map((action) => {
        const button = document.getElementById(action);
        button.disabled = !status;
    });
}
export function handlePenaltyClick(color, penalty) {
    return function () {
        if (color === "red") {
            redPenalty = penalty;
        } else if (color === "blue") {
            bluePenalty = penalty;
        }
        changeIndicatorPelanggaran(color, penalty);
        pushScore();
        pushIndicator(color, penalty);
    };
}
function pushIndicator(color, penalty) {
    axios.post("/penalty", {
        message: {
            color: color,
            penalty: penalty,
        },
    });
}

export function updateDataScore(event) {
    pureScoreRed = event.red_score;
    pureScoreBlue = event.blue_score;
}

export function cekWinner() {
    console.log("tes");
    const red = parseInt(dataDewan["blueScore"].textContent);
    const blue = parseInt(dataDewan["redScore"].textContent);
    if (red > blue) {
        console.log("masuk");
        updatePertandingan("merah");
    } else {
        console.log("masuk");
        updatePertandingan("biru");
    }
}

export function updatePertandingan(winner) {
    const dataPartai = getDataGelanggang();
    localStorage.clear();
    axios.post("/operator-update", {
        message: {
            blueName: dataPartai.namaBiru,
            redName: dataPartai.namaMerah,
            blueContingent: dataPartai.kontingenMerah,
            redContingent: dataPartai.kontingenBiru,
            babak: dataPartai.babak,
            time: 0,
            activeRound: activeRound.textContent,
            action: winner,
        },
    });
}
export function changeRoundDewan(round) {
    updateRoundDewan(round);
    updateDataIndicator();
    pushScore();
}

export function updateDataIndicator() {
    const penaltyPeringatan = [
        "peringatan-pertama",
        "peringatan-kedua",
        "peringatan-ketiga",
    ];
    pelanggaranMerah.map((penalty) => {
        if (!penaltyPeringatan.includes(penalty)) {
            pureScoreRed -= pelanggaranPoint[penalty];
            pelanggaranMerah = pelanggaranMerah.filter(
                (item) => item !== penalty
            );
        }
    });
    pelanggaranBiru.map((penalty) => {
        if (!penaltyPeringatan.includes(penalty)) {
            pureScoreBlue -= pelanggaranPoint[penalty];
            pelanggaranBiru = pelanggaranBiru.filter(
                (item) => item !== penalty
            );
        }
    });
}

export function saveData() {
    const data = {
        bluePenalty: bluePenalty,
        redPenalty: redPenalty,
        pureScoreRed: pureScoreRed,
        pureScoreBlue: pureScoreBlue,
        actionStatus: actionStatus,
    };
    rounds.map((round) => {
        data[round] = {
            blueInput: document.getElementById(`${round}-blueInput`)
                .textContent,
            redInput: document.getElementById(`${round}-redInput`).textContent,
            redScore: document.getElementById(`${round}-redScore`).textContent,
            blueScore: document.getElementById(`${round}-blueScore`)
                .textContent,
        };
    });
    localStorage.setItem("dataDewan", JSON.stringify(data));
}
export function loadDataSave() {
    const data = JSON.parse(localStorage.getItem("dataDewan"));
    bluePenalty = data.bluePenalty;
    redPenalty = data.redPenalty;
    pureScoreRed = data.pureScoreRed;
    pureScoreBlue = data.pureScoreBlue;
    rounds.map((round) => {
        document.getElementById(`${round}-blueInput`).textContent =
            data[round].blueInput;
        document.getElementById(`${round}-redInput`).textContent =
            data[round].redInput;
        document.getElementById(`${round}-redScore`).textContent =
            data[round].redScore;
        document.getElementById(`${round}-blueScore`).textContent =
            data[round].blueScore;
    });
    enabledAction(true);
    bluePenalty !== "pertama"
        ? changeIndicatorPelanggaran("blue", bluePenalty)
        : "";
    redPenalty !== "pertama"
        ? changeIndicatorPelanggaran("red", redPenalty)
        : "";
}

export function pushScore(droppingRed = 0, droppingBlue = 0) {
    console.log("🚀 ~ pushScore ~ pushScore:");
    pureScoreRed += droppingRed;
    pureScoreBlue += droppingBlue;
    axios.post("/score-update", {
        message: {
            blueScore: pureScoreBlue,
            redScore: pureScoreRed,
            redPenalty: pelanggaranMerah,
            bluePenalty: pelanggaranBiru,
            droppingRed: droppingRed,
            droppingBlue: droppingBlue,
        },
    });
    saveData();
}

export function handleScoreChange(color, scoreChange) {
    return function () {
        if (color === "red") {
            let text = dataDewan.redInput.innerHTML;
            if (!isEmpty(text)) {
                const values = text.split(",");
                const formattedValues = values.map((value) => {
                    return value;
                });
                formattedValues.push(`${scoreChange}`);
                dataDewan.redInput.innerHTML = formattedValues.join(",");
            } else {
                dataDewan.redInput.innerHTML = scoreChange;
            }
            // pushScore(scoreChange, 0);
        } else if (color === "blue") {
            let text = dataDewan.blueInput.innerHTML;
            if (!isEmpty(text)) {
                const values = text.split(",");
                const formattedValues = values.map((value) => {
                    return value;
                });
                formattedValues.reverse();
                formattedValues.push(`${scoreChange}`);
                formattedValues.reverse();
                dataDewan.blueInput.innerHTML = formattedValues.join(",");
            } else {
                dataDewan.blueInput.innerHTML = scoreChange;
            }
            // pushScore(0, scoreChange);
        }
    };
}

export function changeIndicatorPelanggaran(corner, penalty) {
    if (corner !== "red") {
        if (!pelanggaranBiru.includes(penalty)) {
            pelanggaranBiru.push(penalty);
        } else {
            pelanggaranBiru = pelanggaranBiru.filter(
                (item) => item !== penalty
            );
        }
    } else {
        if (!pelanggaranMerah.includes(penalty)) {
            pelanggaranMerah.push(penalty);
        } else {
            pelanggaranMerah = pelanggaranMerah.filter(
                (item) => item !== penalty
            );
        }
    }
    refreshIndicator();
}
export function refreshIndicator() {
    const redColor = "bg-redDefault";
    const blueColor = "bg-blueDefault";
    const grayDefault = "bg-grayDefault";

    pelanggaran.map((itemPelanggaran) => {
        const isRedPelanggaran = pelanggaranMerah.includes(itemPelanggaran);
        const isBluePelanggaran = pelanggaranBiru.includes(itemPelanggaran);

        if (isRedPelanggaran) {
            pelanggaranRedElement[itemPelanggaran].classList.add(redColor);
            pelanggaranRedElement[itemPelanggaran].classList.remove(
                grayDefault
            );
        } else {
            pelanggaranRedElement[itemPelanggaran].classList.remove(redColor);
            pelanggaranRedElement[itemPelanggaran].classList.add(grayDefault);
        }

        if (isBluePelanggaran) {
            pelanggaranBlueElement[itemPelanggaran].classList.add(blueColor);
            pelanggaranBlueElement[itemPelanggaran].classList.remove(
                grayDefault
            );
        } else {
            pelanggaranBlueElement[itemPelanggaran].classList.remove(blueColor);
            pelanggaranBlueElement[itemPelanggaran].classList.add(grayDefault);
        }
    });
}

function compare(value1, value2) {
    const index1 = pelanggaran.indexOf(value1);
    const index2 = pelanggaran.indexOf(value2);

    if (index1 < index2) {
        return -1;
    } else if (index1 > index2) {
        return 1;
    } else {
        return 0;
    }
}

export function clearIndicator() {
    const namesElement = [pelanggaranRedElement, pelanggaranBlueElement];
    namesElement.map((nameElemenet) => {
        pelanggaran.map((itemPelanggaran) => {
            nameElemenet[itemPelanggaran].classList.add("bg-grayDefault");
            nameElemenet[itemPelanggaran].classList.remove(
                "bg-redDefault",
                "bg-blueDark"
            );
        });
    });
}
