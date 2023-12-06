import {channelOperator, channelUpdateScore} from "./library/ScoreFunc";

require("./bootstrap");
import {
    changeRoundJuri, enabledAction,
     handleAction,
     inputPoint, loadDataSaveJuri, saveDataJuri,
    startTimeout,
     updateDataScore, updateRoundJuri, updateScore,
} from "./library/JuriFunc";

let userElement = document.getElementById("user");
const userData = JSON.parse(userElement.getAttribute("data-user"));
const header = document.getElementById("header");
const visibleHeader = document.getElementById("visible-header");
const firstLinePointGroup = document.getElementById("first-line-point-group");
const pukulanBiru = document.getElementById("pukul-biru");
const pukulanMerah = document.getElementById("pukul-merah");
const tendanganBiru = document.getElementById("tendang-biru");
const tendanganMerah = document.getElementById("tendang-merah");
const channelGelanggang = Echo.join(`presence.juri.${userData.gelanggang_id}`);
// localStorage.clear()
if (localStorage.getItem('dataJuriScoring')){
    console.log(JSON.parse(localStorage.getItem('dataJuriScoring')))
    loadDataSaveJuri()
}
channelOperator
    .listen(`.operator.${userData.gelanggang_id}`, (event) => {
        updateDataJuri(event)
    });

channelUpdateScore
    .listen(`.updateScore.${userData.gelanggang_id}`, (event) => {
        updateDataScore(event)
        setTimeout(() => {
            saveDataJuri()
        }, 200);
    });

channelGelanggang
    .listen(`.juri.${userData.gelanggang_id}`, (event) => {
        updateScore(event);
    });

visibleHeader.addEventListener("click", function() {
    if (header.classList.contains("hidden")) {
        visibleHeader.textContent = "Tutup"
        header.classList.remove("hidden");
        header.classList.add("flex");
        firstLinePointGroup.classList.remove("mt-[0%]");
        firstLinePointGroup.classList.add("mt-[5%]");
    } else {
        visibleHeader.textContent = "Lihat"
        header.classList.add("hidden");
        header.classList.remove("flex")
        firstLinePointGroup.classList.remove("mt-[5%]");
        firstLinePointGroup.classList.add("mt-[0%]");
    }
})

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


function updateDataJuri(e) {
    switch (e.action) {
        case 'start':
            updateRoundJuri(e.activeRound)
            break;
        case 'finish':
            break;
        case 'round':
            enabledAction(false)
            changeRoundJuri(e.activeRound)
            updateRoundJuri(e.activeRound)
            break;
        case 'pause':
            enabledAction(false)
            break;
        case 'play':
            enabledAction()
            break;
        case 'reset':
            localStorage.clear()
            location.reload()
            break;
    }
}



