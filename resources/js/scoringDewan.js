import {
    activeRound,
    channelOperator,
    channelUpdateScore,
    getDataGelanggang,
    userData,
} from "./library/ScoreFunc";

require("./bootstrap");
import {
    cekWinner,
    changeRoundDewan,
    clearIndicator,
    enabledAction,
    handlePenaltyClick,
    handleScoreChange,
    loadDataSave,
    saveData,
    updateDataScore,
    updatePertandingan,
} from "./library/DewanFunc";
const teguranMerahPertama = document.getElementById("teguran-merah-pertama");
const binaanMerahPertama = document.getElementById("binaan-merah-pertama");
const peringatanMerahPertama = document.getElementById(
    "peringatan-merah-pertama"
);
const teguranMerahKedua = document.getElementById("teguran-merah-kedua");
const binaanMerahKedua = document.getElementById("binaan-merah-kedua");
const peringatanMerahKedua = document.getElementById("peringatan-merah-kedua");
const peringatanMerahKetiga = document.getElementById(
    "peringatan-merah-ketiga"
);
const teguranBiruPertama = document.getElementById("teguran-biru-pertama");
const binaanBiruPertama = document.getElementById("binaan-biru-pertama");
const peringatanBiruPertama = document.getElementById(
    "peringatan-biru-pertama"
);
const teguranBiruKedua = document.getElementById("teguran-biru-kedua");
const binaanBiruKedua = document.getElementById("binaan-biru-kedua");
const peringatanBiruKedua = document.getElementById("peringatan-biru-kedua");
const peringatanBiruKetiga = document.getElementById("peringatan-biru-ketiga");
const jatuhanMerahSah = document.getElementById("jatuhan-merah-plus");
const jatuhanMerahTidakSah = document.getElementById("jatuhan-merah-minus");
const jatuhanBiruSah = document.getElementById("jatuhan-biru-plus");
const jatuhanBiruTidakSah = document.getElementById("jatuhan-biru-minus");
const diskMerah = document.getElementById("disk-merah");
const diskBiru = document.getElementById("disk-biru");
enabledAction(false);
localStorage.clear();
if (localStorage.getItem("dataDewan")) {
    loadDataSave();
}

channelUpdateScore.listen(`.updateScore.${userData.gelanggang_id}`, (event) => {
    updateDataScore(event);
    // console.log("🚀 ~ channelUpdateScore.listen ~ event:", event);
    setTimeout(() => {
        saveData();
    }, 200);
});
channelOperator.listen(`.operator.${userData.gelanggang_id}`, (event) => {
    updateDataDewan(event);
});

teguranMerahPertama.addEventListener(
    "click",
    handlePenaltyClick("red", "teguran-pertama")
);
teguranMerahKedua.addEventListener(
    "click",
    handlePenaltyClick("red", "teguran-kedua")
);
binaanMerahPertama.addEventListener(
    "click",
    handlePenaltyClick("red", "binaan-pertama")
);
binaanMerahKedua.addEventListener(
    "click",
    handlePenaltyClick("red", "binaan-kedua")
);
peringatanMerahPertama.addEventListener(
    "click",
    handlePenaltyClick("red", "peringatan-pertama")
);
peringatanMerahKedua.addEventListener(
    "click",
    handlePenaltyClick("red", "peringatan-kedua")
);
peringatanMerahKetiga.addEventListener(
    "click",
    handlePenaltyClick("red", "peringatan-ketiga")
);
peringatanMerahKetiga.addEventListener("click", function () {
    setTimeout(() => {
        updatePertandingan("biru");
    }, 200);
});

teguranBiruPertama.addEventListener(
    "click",
    handlePenaltyClick("blue", "teguran-pertama")
);
teguranBiruKedua.addEventListener(
    "click",
    handlePenaltyClick("blue", "teguran-kedua")
);
binaanBiruPertama.addEventListener(
    "click",
    handlePenaltyClick("blue", "binaan-pertama")
);
binaanBiruKedua.addEventListener(
    "click",
    handlePenaltyClick("blue", "binaan-kedua")
);
peringatanBiruPertama.addEventListener(
    "click",
    handlePenaltyClick("blue", "peringatan-pertama")
);
peringatanBiruKedua.addEventListener(
    "click",
    handlePenaltyClick("blue", "peringatan-kedua")
);
peringatanBiruKetiga.addEventListener("click", function () {
    setTimeout(() => {
        updatePertandingan("merah");
    }, 200);
});

jatuhanMerahSah.addEventListener("click", handleScoreChange("red", 3));
jatuhanMerahTidakSah.addEventListener("click", handleScoreChange("red", -3));

jatuhanBiruSah.addEventListener("click", handleScoreChange("blue", 3));
jatuhanBiruTidakSah.addEventListener("click", handleScoreChange("blue", -3));
diskMerah.addEventListener("click", disqualification("biru"));
diskBiru.addEventListener("click", disqualification("merah"));

function disqualification(corner) {
    return function () {
        updatePertandingan(corner);
    };
}
enabledAction();

function updateDataDewan(e) {
    switch (e.action) {
        case "start":
            saveData();
            break;
        case "finish":
            localStorage.clear();
            cekWinner();
            break;
        case "round":
            // enabledAction(false);
            clearIndicator();
            changeRoundDewan(e.activeRound);
            break;
        case "pause":
            enabledAction(false);
            break;
        case "play":
            enabledAction();
            break;
        case "reset":
            localStorage.clear();
            location.reload();
            break;
    }
}
