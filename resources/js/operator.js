const { joinChanel } = require("./channel");
const { roundsElement, countMinimumToStart } = require("./library/Rounds");
const { timesValue } = require("./library/Time");

let activeRound = "round-1";
let pauseStatus = false;
let isButtonDisable = true;
let matchTime = 120;
let users;
let submit = true;

const elements = {
    start: document.getElementById("start"),
    finish: document.getElementById("finish"),
    next: document.getElementById("next"),
    prev: document.getElementById("prev"),
    refresh: document.getElementById("segarkan"),
    lock: document.getElementById("kunci"),
    pausePlay: document.getElementById("pause"),
    user: document.getElementById("user"),
    partai: document.getElementById("partai"),
    time: document.getElementById("time"),
    rounds: {
        "round-1": document.getElementById("round-1"),
        "round-2": document.getElementById("round-2"),
        "round-3": document.getElementById("round-3"),
    },
    userStatus: {
        juri_pertama: document.getElementById("status_juri_pertama"),
        juri_kedua: document.getElementById("status_juri_kedua"),
        juri_ketiga: document.getElementById("status_juri_ketiga"),
        dewan: document.getElementById("status_dewan"),
        ketua: document.getElementById("status_ketua"),
    },
};

const userData = JSON.parse(elements.user.getAttribute("data-user"));
const dataPartai = JSON.parse(elements.partai.getAttribute("data-partai"));
const rounds = ["round-1", "round-2", "round-3"];
const roles = ["ketua", "dewan", "juri_pertama", "juri_kedua", "juri_ketiga"];
const roleIds = {
    2: "operator",
    3: "ketua",
    4: "dewan",
    5: "juri_pertama",
    6: "juri_kedua",
    7: "juri_ketiga",
};

const channelUpdateScore = joinChanel("updateScore", userData.gelanggang_id);
const channelOperator = joinChanel("operator", userData.gelanggang_id);

initializeChannels();
initializeEventListeners();

if (localStorage.getItem("dataOperator")) {
    loadSavedData();
}

function initializeChannels() {
    channelOperator.listen(
        `.operator.${userData.gelanggang_id}`,
        handleOperatorEvent
    );
    channelUpdateScore
        .here(handleChannelUsers)
        .joining(handleUserJoin)
        .leaving(handleUserLeave)
        .listen(`.updateScore.${userData.gelanggang_id}`, handleScoreUpdate);
}

function initializeEventListeners() {
    elements.start.addEventListener("click", handleStart);
    elements.finish.addEventListener("click", handleFinish);
    elements.lock.addEventListener("click", toggleLock);
    elements.refresh.addEventListener("click", handleRefresh);
    elements.pausePlay.addEventListener("click", handlePausePlay);
    rounds.forEach((round) => {
        elements.rounds[round].addEventListener("click", () =>
            handleRoundClick(round)
        );
    });
    elements.time.addEventListener("change", handleTimeChange);
}

function handleOperatorEvent(event) {
    if (event.action === "merah" || event.action === "biru") {
        // updateMatch("reset");
        uploadWinnerData(event.action);
    }
    if (event.action === "round-done") {
        handleRoundDone();
    }
}

function handleChannelUsers(usersCB) {
    users = usersCB;
    checkUserStatus();
}

function handleUserJoin(user) {
    users.push(user);
    checkUserStatus();
}

function handleUserLeave(user) {
    users = users.filter((u) => u !== user);
    checkUserStatus();
}

function handleScoreUpdate(event) {}

function handleStart() {
    updateMatch("start");
    toggleElementColor(elements.start, "bg-yellowDefault");
    setElementColor(elements.finish, "bg-yellowDefault", false);
    setElementColor(elements.rounds[activeRound], "bg-yellowDefault", true);
    toggleButtonState();
}

function handleFinish() {
    setElementColor(elements.start, "bg-yellowDefault", false);
    finishMatch();
}

function handleRefresh() {
    updateMatch("reset");
    localStorage.clear();
    location.reload();
}

function handlePausePlay() {
    togglePausePlay();
    updateMatch(pauseStatus ? "play" : "pause");
}

function handleTimeChange() {
    matchTime = timesValue[elements.time.value];
}

function handleRoundClick(round) {
    changeRoundStatus(round);
    updateMatch();
}

function toggleElementColor(element, colorClass) {
    element.classList.toggle(colorClass);
}

function setElementColor(element, colorClass, add) {
    element.classList.toggle(colorClass, add);
}

function togglePausePlay(status = !pauseStatus) {
    pauseStatus = status !== null ? status : !pauseStatus;
    elements.pausePlay.textContent = pauseStatus ? "JEDA" : "MULAI";

    if (pauseStatus) {
        elements.pausePlay.classList.add("bg-yellowDefault");
    } else {
        elements.pausePlay.classList.remove("bg-yellowDefault");
    }
}

function toggleLock() {
    submit = !submit;
    elements.lock.textContent = submit ? "BATAL" : "KUNCI";
    elements.lock.classList.toggle("bg-yellowDefault");
}

function uploadWinnerData(winner) {
    let dataPemenang = {
        name: dataPartai.sudut_biru,
        corner: "biru",
        contingent: dataPartai.contingen_sudut_biru,
    };
    if (winner === "merah") {
        dataPemenang = {
            name: dataPartai.sudut_merah,
            corner: "merah",
            contingent: dataPartai.contingen_sudut_merah,
        };
    }

    if (submit) {
        axios
            .post("/winner", {
                message: {
                    action: "modal-winner",
                    data: dataPemenang,
                },
            })
            .then(() => {
                // setTimeout(() => location.reload(), 500);
            });
    }
}

function updateMatch(action = "round") {
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

function checkUserStatus() {
    const userList = roles.reduce(
        (acc, role) => ({ ...acc, [role]: false }),
        {}
    );
    let activeUserCount = 0;

    users.forEach((user) => {
        const role = roleIds[user.role_id];
        if (role) {
            activeUserCount++;
            userList[role] = true;
        }
    });

    if (activeUserCount === countMinimumToStart) {
        elements.start.disabled = false;
    }

    roles.forEach((role) => {
        const element = elements.userStatus[role];
        setElementColor(element, "bg-gray-200", !userList[role]);
        setElementColor(element, "bg-yellowDefault", userList[role]);
    });
}

function handleRoundDone() {
    const roundNum = parseInt(activeRound.split("-")[1]);
    const nextRound = `round-${roundNum < 3 ? roundNum + 1 : roundNum}`;

    if (roundNum >= 3) {
        finishMatch();
    } else {
        changeRoundIndicator(activeRound, nextRound);
        activeRound = nextRound;
        updateMatch();
        togglePausePlay();
    }
}

function changeRoundIndicator(currentRound, nextRound) {
    setElementColor(elements.rounds[currentRound], "bg-grayDark", true);
    setElementColor(elements.rounds[currentRound], "bg-yellowDefault", false);
    elements.rounds[currentRound].disabled = true;

    setElementColor(elements.rounds[nextRound], "bg-grayDark", false);
    setElementColor(elements.rounds[nextRound], "bg-yellowDefault", true);
    elements.rounds[nextRound].disabled = true;
}

function toggleButtonState() {
    rounds.forEach((round) => {
        elements.rounds[round].disabled = !isButtonDisable;
    });

    elements.pausePlay.disabled = !isButtonDisable;
    elements.finish.disabled = !isButtonDisable;
    elements.start.disabled = isButtonDisable;
    elements.prev.disabled = isButtonDisable;
    elements.next.disabled = isButtonDisable;

    isButtonDisable = !isButtonDisable;
}

function changeRoundStatus(roundName) {
    rounds.forEach((round) => {
        const element = elements.rounds[round];
        if (round === roundName) {
            activeRound = round;
            setElementColor(element, "bg-yellowDefault", true);
        } else {
            setElementColor(element, "bg-yellowDefault", false);
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

function loadSavedData() {
    const data = JSON.parse(localStorage.getItem("dataOperator"));
    pauseStatus = data.pauseStatus;
    isButtonDisable = data.isButtonDisable;
    activeRound = data.activeRound;

    for (let i = 0; i < parseInt(activeRound.split("-")[1]); i++) {
        const nextRound = `round-${i + 2}`;
        const currentRound = `round-${i + 1}`;
        changeRoundIndicator(currentRound, nextRound);
    }

    toggleButtonState();
    togglePausePlay();
}

function finishMatch() {
    rounds.slice(1).forEach((round) => {
        const element = elements.rounds[round];
        setElementColor(element, "bg-grayDark", false);
        setElementColor(element, "bg-yellowDefault", false);
    });

    updateMatch("finish");
    toggleButtonState();
    togglePausePlay(false);
    changeRoundStatus("round-1");
}
