const { joinChanel } = require("./channel");
const { roundsElement, countMinimumToStart } = require("./library/Rounds");
const { timesValue } = require("./library/Time");

let activeRound = "round-1";

let pauseStatus = true;
let isButtonDisable = true;

const start = document.getElementById("start");
const next = document.getElementById("next");
const prev = document.getElementById("prev");
const segarkan = document.getElementById("segarkan");
const kunci = document.getElementById("kunci");
const pausePlay = document.getElementById("pause");
const finish = document.getElementById("finish");
const userElement = document.getElementById("user");
const userData = JSON.parse(userElement.getAttribute("data-user"));
const partaiElement = document.getElementById("partai");
const dataPartai = JSON.parse(partaiElement.getAttribute("data-partai"));
const timeElement = document.getElementById("time");
let matchTime = 120;
let users;
if (localStorage.getItem("dataOperator")) {
    loadSaveData();
}
let submit = true;
const actionButtonNames = ["start", "pausePlay"];
const userActiveList = {
    juri_pertama: document.getElementById("status_juri_pertama"),
    juri_kedua: document.getElementById("status_juri_kedua"),
    juri_ketiga: document.getElementById("status_juri_ketiga"),
    dewan: document.getElementById("status_dewan"),
    ketua: document.getElementById("status_ketua"),
};
const rounds = ["round-1", "round-2", "round-3"];
const allRoundStatus = {
    "round-1": true,
    "round-2": true,
    "round-3": true,
};
const roleIds = {
    2: "operator",
    3: "ketua",
    4: "dewan",
    5: "juri_pertama",
    6: "juri_kedua",
    7: "juri_ketiga",
};
const roles = ["ketua", "dewan", "juri_pertama", "juri_kedua", "juri_ketiga"];

const channelUpdateScore = joinChanel("updateScore", userData.gelanggang_id);
const channelOperator = joinChanel("operator", userData.gelanggang_id);
channelOperator.listen(`.operator.${userData.gelanggang_id}`, (event) => {
    if (event.action === "merah" || event.action === "biru") {
        updatePertandingan("reset");
        uploadDataWinner(event.action);
    }
    event.action === "round-done" ? roundDone() : "";
});

channelUpdateScore
    .here((usersCB) => {
        users = usersCB;
        cekStatususer();
    })
    .joining((user) => {
        users.push(user);
        cekStatususer();
    })
    .leaving((user) => {
        console.log(user);
        let indexToRemove = users.indexOf(user);
        if (indexToRemove !== -1) {
            users.splice(indexToRemove, 1);
            console.log("Array setelah menghapus elemen:", users);
            cekStatususer();
        } else {
            console.log("Elemen tidak ditemukan dalam array.");
        }
    })
    .listen(`.updateScore.${userData.gelanggang_id}`, (event) => {});

roundsElement["round-1"].addEventListener("click", (ev) => {
    changeStatusRound("round-1");
    updatePertandingan();
});

roundsElement["round-2"].addEventListener("click", (ev) => {
    changeStatusRound("round-2");
    updatePertandingan();
});

roundsElement["round-3"].addEventListener("click", (ev) => {
    changeStatusRound("round-3");
    updatePertandingan();
});

start.addEventListener("click", (evt) => {
    updatePertandingan("start");
    toggleYellowColor(start);
    colorWhite(finish);
    changeDisabledButtons();
});

finish.addEventListener("click", (evt) => {
    colorWhite(start);
    finishGelanggang();
});

kunci.addEventListener("click", (evt) => {
    toggleYellowColor(kunci);
    toggleLock();
});
segarkan.addEventListener("click", (evt) => {
    updatePertandingan("reset");
    localStorage.clear();
    location.reload();
});

timeElement.addEventListener("change", (ev) => {
    const timeSelectedOption = timeElement.value;
    matchTime = timesValue[timeSelectedOption];
});

function toggleYellowColor(element) {
    element.classList.toggle("bg-yellowDefault");
}

pausePlay.addEventListener("click", () => {
    togglePausePlay();
    updatePertandingan(pauseStatus ? "pause" : "play");
});
function finishGelanggang() {
    const rounds = ["round-2", "round-3"];
    rounds.map((round) => {
        roundsElement[round].classList.remove(
            "bg-grayDark",
            "bg-yellowDefault"
        );
    });
    updatePertandingan("finish");
    changeDisabledButtons();
    togglePausePlay(false);
    changeStatusRound("round-1");
}

function colorWhite(element) {
    element.classList.remove("bg-yellowDefault");
}

function togglePausePlay(status = pauseStatus) {
    if (status) {
        pausePlay.textContent = "JEDA";
        pauseStatus = !status;
    } else {
        pausePlay.textContent = "MULAI";
        pauseStatus = !status;
    }
}

function toggleLock(status = submit) {
    if (status) {
        kunci.textContent = "KUNCI";
        submit = !status;
    } else {
        kunci.textContent = "BATAL";
        submit = !status;
    }
}

function uploadDataWinner(winner) {
    if (submit) {
        axios.post("/create-history", {
            partai: dataPartai.id,
            kelas: dataPartai.kelas,
            jenis_kelamin: dataPartai.jenis_kelamin,
            sudut_biru: dataPartai.sudut_biru,
            sudut_merah: dataPartai.sudut_merah,
            kontingen_biru: dataPartai.contingen_sudut_biru,
            kontingen_merah: dataPartai.contingen_sudut_merah,
            babak: dataPartai.babak,
            round_time: activeRound,
            pemenang: winner,
        });
        setTimeout(() => {
            location.reload();
        }, 500);
    }
}
function updatePertandingan(action = "round") {
    axios.post("/operator-update", {
        message: {
            blueName: dataPartai.sudut_biru,
            redName: dataPartai.sudut_merah,
            blueContingent: dataPartai.contingen_sudut_biru,
            redContingent: dataPartai.contingen_sudut_merah,
            babak: dataPartai.babak,
            activeRound: activeRound,
            time: matchTime,
            action: action,
        },
    });
    if (action !== "finish") {
        saveData(action === "start", action === "pause" || action === "play");
    }
    if (action === "reset") {
        localStorage.clear();
    }
}
function cekStatususer() {
    const userList = {
        juri_pertama: false,
        juri_kedua: false,
        juri_ketiga: false,
        dewan: false,
        ketua: false,
    };
    let trueCount = 0;
    users.map((user) => {
        if (roleIds[`${user.role_id}`]) {
            trueCount += 1;
            userList[roleIds[`${user.role_id}`]] = true;
        }
    });
    console.log("🚀 ~ cekStatususer ~ userList:", userList);
    if (trueCount === countMinimumToStart) {
        start.disabled = false;
    }
    roles.map((role) => {
        if (userList[role]) {
            userActiveList[role].classList.remove("bg-gray-200");
            userActiveList[role].classList.add("bg-yellowDefault");
        } else {
            userActiveList[role].classList.remove("bg-gray-200");
            userActiveList[role].classList.remove("bg-yellowDefault");
            userActiveList[role].classList.add("bg-gray-200");
        }
    });
}

function roundDone() {
    const arraySliceName = activeRound.split("-");
    const roundNum = parseInt(arraySliceName[1]);
    let done = false;
    if (roundNum > 3) {
        done = true;
    }
    const nextRound =
        arraySliceName[0] + "-" + (roundNum < 3 ? roundNum + 1 : roundNum);
    console.log(nextRound);
    if (!done) {
        changeIndicatorRound(activeRound.toLowerCase(), nextRound);
    } else {
        console.log("done");
        finishGelanggang();
    }
    activeRound = nextRound;
    updatePertandingan();
    togglePausePlay();
}

function changeIndicatorRound(
    activeRound = activeRound.toLowerCase(),
    nextRound
) {
    roundsElement[activeRound].classList.add("bg-grayDark");
    roundsElement[activeRound].classList.remove("bg-yellowDefault");
    roundsElement[activeRound].disabled = true;
    roundsElement[nextRound].classList.remove("bg-grayDark");
    roundsElement[nextRound].classList.add("bg-yellowDefault");
    roundsElement[nextRound].disabled = true;
}

function changeDisabledButtons() {
    const rounds = ["round-1", "round-2", "round-3"];
    rounds.map((round) => {
        roundsElement[round].disabled = true;
    });
    pausePlay.disabled = !isButtonDisable;
    finish.disabled = !isButtonDisable;
    start.disabled = isButtonDisable;
    prev.disabled = isButtonDisable;
    next.disabled = isButtonDisable;
    isButtonDisable = !isButtonDisable;
}

function changeStatusRound(roundName) {
    rounds.forEach((name) => {
        if (name === roundName) {
            activeRound = name;
            allRoundStatus[name] = true;
            roundsElement[name].classList.add("bg-yellowDefault");
        } else {
            allRoundStatus[name] = false;
            roundsElement[name].classList.remove("bg-yellowDefault");
        }
    });
}

function saveData(isFromStart = false, isFromPause = false) {
    const data = {
        pauseStatus: isFromPause ? !pauseStatus : pauseStatus,
        isButtonDisable: isFromStart ? isButtonDisable : !isButtonDisable,
        activeRound: activeRound,
    };
    localStorage.setItem("dataOperator", JSON.stringify(data));
}

function loadSaveData() {
    const data = JSON.parse(localStorage.getItem("dataOperator"));
    pauseStatus = data.pauseStatus;
    isButtonDisable = data.isButtonDisable;
    activeRound = data.activeRound;
    const arraySliceName = activeRound.split("-");
    const roundNum = parseInt(arraySliceName[1]);
    for (let i = 0; i < roundNum; i++) {
        let done = false;
        const nextRound =
            arraySliceName[0] + "-" + (i <= 3 ? i + 1 : (done = true));
        const thisRound =
            arraySliceName[0] +
            "-" +
            (i === 0 ? 1 : i <= 3 ? i : (done = true));
        if (!done) {
            changeIndicatorRound(
                thisRound.toLowerCase(),
                nextRound.toLowerCase()
            );
        }
    }
    changeDisabledButtons();
    togglePausePlay();
}
