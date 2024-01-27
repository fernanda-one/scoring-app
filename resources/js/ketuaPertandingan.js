// import puppeteer from 'puppeteer';

require("./bootstrap");
import {
    channelKetuaPertandingan,
    storeGelanggangData,
    startPertandingan,
    loadDataSaved,
    changeRound,
    storeJurror,
    storePoint,
    storeDroppingRed,
    storeDroppingBlue,
    storeRedPenalty,
    storeBluePenalty,
} from "./library/KetuaFunc.js";
import {
    channelUpdateScore,
    channelOperator,
    updateScore,
    userData,
    savedGelanggangData,
} from "./library/ScoreFunc.js";

storeGelanggangData(savedGelanggangData);
loadDataSaved();

channelUpdateScore.listen(`.updateScore.${userData.gelanggang_id}`, (event) => {
    updateScore(event);
    storePoint();
    storeDroppingRed(event.droppingRed);
    storeDroppingBlue(event.droppingBlue);
    storeRedPenalty(event.red_penalty);
    storeBluePenalty(event.blue_penalty);
});

channelOperator.listen(`.operator.${userData.gelanggang_id}`, (event) => {
    updateDataGelanggang(event);
});

channelKetuaPertandingan.listen(
    `.ketuaPertandingan.${userData.gelanggang_id}`,
    (event) => {
        storeJurror(event.id, event.scorePiece, event.sudut);
    }
);

function screenShot() {
    axios.get("/capture-screenshot");
}

function updateDataGelanggang(e) {
    switch (e.action) {
        case "start":
            startPertandingan(e);
            break;
        case "finish":
            screenShot();
            break;
        case "round":
            changeRound(e);
            break;
        case "reset":
            localStorage.clear();
            location.reload();
            break;
        case "play":
            break;
        case "pause":
            break;
    }
}
