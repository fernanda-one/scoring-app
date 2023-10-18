require("./bootstrap");
const { value } = require("lodash/seq");

const round = 'round1';
const userElement = document.getElementById("user");
const userData = JSON.parse(userElement.getAttribute("data-user"));
const blueScore = document.getElementById(`${round}-blueScore`);
const redScore = document.getElementById(`${round}-redScore`);
const namaMerah = document.getElementById('nama_merah');
const kontingenMerah = document.getElementById('kontingen_merah');
const namaBiru = document.getElementById('nama_biru');
const kontingenBiru = document.getElementById('kontingen_biru');
const babak = document.getElementById('babak');
const activeRound = document.getElementById('round');
const channelUpdateScore = Echo.join(`presence.updateScore.${userData.gelanggang_id}`);
const channelOperator = Echo.join(`presence.operator.${userData.gelanggang_id}`);
const isPopup = document.getElementById('dropVerificationModal');
const choice1 = document.getElementById("choice1");
const choice2 = document.getElementById("choice2");
const choice3 = document.getElementById("choice3");
const choiceResult = document.getElementById("choice-result");
const savedGelanggangData = JSON.parse(localStorage.getItem('gelanggangData')) || {
    namaMerah: 'Sudut Merah',
    kontingenMerah: 'Kontingen',
    namaBiru: 'Sudut Biru',
    kontingenBiru: 'kontingen',
    babak: 'BABAK',
    activeRound: 'ROUND',
};

namaMerah.textContent = savedGelanggangData.namaMerah;
kontingenMerah.textContent = savedGelanggangData.kontingenMerah;
namaBiru.textContent = savedGelanggangData.namaBiru;
kontingenBiru.textContent = savedGelanggangData.kontingenBiru;
babak.textContent = savedGelanggangData.babak;
activeRound.textContent = savedGelanggangData.activeRound;

const savedScoreData = JSON.parse(localStorage.getItem('scoreData')) || {
    redScore: 0,
    blueScore: 0,
    bluePenalty: 0,
    redPenalty: 0
};

blueScore.textContent = savedScoreData.blueScore - savedScoreData.bluePenalty;
redScore.textContent = savedScoreData.redScore - savedScoreData.redPenalty;

channelUpdateScore
    .here((users) => {
        console.log(users);
        console.log(`anda telah terhubung dalam Gelanggang`);
    })
    .joining((user) => {
        console.log({ user }, "joined");
    })
    .leaving((user) => {
        console.log({ user }, "leaved");
    })
    .listen(`.updateScore.${userData.gelanggang_id}`, (event) => {
        console.log('tes')
        updateScore(event);
        if (event.red_popup || event.blue_popup) {
            isPopup.style.display = 'block';
        } else {
            isPopup.style.display = 'none';
            choiceResult.classList.remove("bg-blueDark")
            choiceResult.classList.remove("bg-yellowDark")
            choiceResult.classList.remove("bg-redDark")
            choiceResult.classList.add("bg-grayDefault")
        }
    });

channelOperator
    .here((users) => {
        console.log(users);
        console.log(`anda telah terhubung dalam Channel Operator`);
    })
    .joining((user) => {
        console.log({ user }, "joined");
    })
    .leaving((user) => {
        console.log({ user }, "leaved");
    })
    .listen(`.operator.${userData.gelanggang_id}`, (event) => {
        console.log(event);
        updateDataGelanggang(event);
    });

function updateDataGelanggang(e) {
    namaMerah.textContent = e.redName;
    kontingenMerah.textContent = e.redContingent;
    namaBiru.textContent = e.blueName;
    kontingenBiru.textContent = e.blueContingent;
    babak.textContent = e.babak.toUpperCase();
    activeRound.textContent = e.activeRound.toUpperCase();

    const gelanggangData = {
        namaMerah: namaMerah.textContent,
        kontingenMerah: kontingenMerah.textContent,
        namaBiru: namaBiru.textContent,
        kontingenBiru: kontingenBiru.textContent,
        babak: babak.textContent,
        activeRound: activeRound.textContent,
    };

    localStorage.setItem('gelanggangData', JSON.stringify(gelanggangData));
}

function updateScore(event) {
    const redScoreValue = event.red_score - event.red_penalty;
    const blueScoreValue = event.blue_score - event.blue_penalty;

    const scoreData = {
        redScore: event.red_score,
        blueScore: event.blue_score,
        redPenalty: event.red_penalty,
        bluePenalty: event.blue_penalty,
    };

    localStorage.setItem('scoreData', JSON.stringify(scoreData));

    redScore.textContent = redScoreValue;
    blueScore.textContent = blueScoreValue;
}

choice1.addEventListener("click", function () {
    choiceResult.innerText = "BLUE CORNER";
    choiceResult.classList.remove("bg-yellowDark")
    choiceResult.classList.remove("bg-redDark")
    choiceResult.classList.remove("bg-grayDefault")
    choiceResult.classList.add("bg-blueDark")
})

choice2.addEventListener("click", function () {
    choiceResult.innerText = "INVALID";
    choiceResult.classList.remove("bg-blueDark")
    choiceResult.classList.remove("bg-redDark")
    choiceResult.classList.remove("bg-grayDefault")
    choiceResult.classList.add("bg-yellowDark")
})

choice3.addEventListener("click", function () {
    choiceResult.innerText = "RED CORNER";
    choiceResult.classList.remove("bg-blueDark")
    choiceResult.classList.remove("bg-yellowDark")
    choiceResult.classList.remove("bg-grayDefault")
    choiceResult.classList.add("bg-redDark")
})
