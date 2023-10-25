
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
    userData,
    savedGelanggangData,
} from "./library/ScoreFunc.js"

storeGelanggangData(savedGelanggangData);
loadDataSaved();

channelUpdateScore
    .listen(`.updateScore.${userData.gelanggang_id}`, (event) => {
        storePoint(event);
        storeDroppingRed(event.droppingRed)
        storeDroppingBlue(event.droppingBlue)
        storeRedPenalty(event.red_penalty)
        storeBluePenalty(event.blue_penalty)
    });

channelOperator
    .listen(`.operator.${userData.gelanggang_id}`, (event) => {
        updateDataGelanggang(event);
    });

channelKetuaPertandingan
    .listen(`.ketuaPertandingan.${userData.gelanggang_id}`, (event) => {
        storeJurror(event.id, event.scorePiece, event.sudut)
    });

function updateDataGelanggang(e) {
    switch (e.action) {
        case 'start':
            startPertandingan(e)
            break;
        case 'finish':
            break;
        case 'round':
            changeRound(e)
            break;
        case 'pause':
            break;
        case 'play':
            break;
    }
}