require("./bootstrap");
const {toNumber} = require("lodash");
import {changeIndicatorPelanggaran} from './library/DewanFunc'
let round = 'round-1'
let blueScore = document.getElementById(`${round}-blueScore`).textContent;
let redScore = document.getElementById(`${round}-redScore`).textContent;
const teguranMerahPertama = document.getElementById('teguran-merah-pertama');
const binaanMerahPertama = document.getElementById('binaan-merah-pertama')
const peringatanMerahPertama = document.getElementById('peringatan-merah-pertama')
const teguranMerahKedua = document.getElementById('teguran-merah-kedua')
const binaanMerahKedua = document.getElementById('binaan-merah-kedua')
const peringatanMerahKedua = document.getElementById('peringatan-merah-kedua')
const peringatanMerahKetiga = document.getElementById('peringatan-merah-ketiga')
const teguranBiruPertama = document.getElementById('teguran-biru-pertama')
const binaanBiruPertama = document.getElementById('binaan-biru-pertama')
const peringatanBiruPertama = document.getElementById('peringatan-biru-pertama')
const teguranBiruKedua = document.getElementById('teguran-biru-kedua')
const binaanBiruKedua = document.getElementById('binaan-biru-kedua')
const peringatanBiruKedua = document.getElementById('peringatan-biru-kedua')
const peringatanBiruKetiga = document.getElementById('peringatan-biru-ketiga')
const jatuhanMerahSah = document.getElementById('jatuhan-merah-plus')
const jatuhanMerahTidakSah = document.getElementById('jatuhan-merah-minus')
const jatuhanBiruSah = document.getElementById('jatuhan-biru-plus')
const jatuhanBiruTidakSah = document.getElementById('jatuhan-biru-minus')
let bluePenalty='pertama'
let redPenalty = 'pertama';

function handlePenaltyClick(color, penalty) {
    return function () {
        if (color === 'red') {
            redPenalty = penalty;
        } else if (color === 'blue') {
            bluePenalty = penalty;
        }
        changeIndicatorPelanggaran(color, penalty);
        pushScore();
    };
}
function handleScoreChange(color, scoreChange) {
    return function () {
        if (color === 'red') {
            redScore = toNumber(redScore) + scoreChange;
        } else if (color === 'blue') {
            blueScore = toNumber(blueScore) + scoreChange;
        }
        pushScore();
    };
}

// Add event listeners for red penalties
teguranMerahPertama.addEventListener("click", handlePenaltyClick('red', 'teguran-pertama'));
teguranMerahKedua.addEventListener("click", handlePenaltyClick('red', 'teguran-kedua'));
binaanMerahPertama.addEventListener("click", handlePenaltyClick('red', 'binaan-pertama'));
binaanMerahKedua.addEventListener("click", handlePenaltyClick('red', 'binaan-kedua'));
peringatanMerahPertama.addEventListener("click", handlePenaltyClick('red', 'peringatan-pertama'));
peringatanMerahKedua.addEventListener("click", handlePenaltyClick('red', 'peringatan-kedua'));
peringatanMerahKetiga.addEventListener("click", handlePenaltyClick('red', 'peringatan-ketiga'));

// Add event listeners for blue penalties
teguranBiruPertama.addEventListener("click", handlePenaltyClick('blue', 'teguran-pertama'));
teguranBiruKedua.addEventListener("click", handlePenaltyClick('blue', 'teguran-kedua'));
binaanBiruPertama.addEventListener("click", handlePenaltyClick('blue', 'binaan-pertama'));
binaanBiruKedua.addEventListener("click", handlePenaltyClick('blue', 'binaan-kedua'));
peringatanBiruPertama.addEventListener("click", handlePenaltyClick('blue', 'peringatan-pertama'));
peringatanBiruKedua.addEventListener("click", handlePenaltyClick('blue', 'peringatan-kedua'));
peringatanBiruKetiga.addEventListener("click", handlePenaltyClick('blue', 'peringatan-ketiga'));

// Add event listeners for red score changes
jatuhanMerahSah.addEventListener("click", handleScoreChange('red', 2));
jatuhanMerahTidakSah.addEventListener("click", handleScoreChange('red', -2));

// Add event listeners for blue score changes
jatuhanBiruSah.addEventListener("click", handleScoreChange('blue', 2));
jatuhanBiruTidakSah.addEventListener("click", handleScoreChange('blue', -2));


function pushScore(){
    axios.post("/score-update", {
        message: {
            "blueScore":toNumber(blueScore),
            "redScore":toNumber(redScore),
            "redPenalty":redPenalty,
            "bluePenalty": bluePenalty,
        },
    });
}
