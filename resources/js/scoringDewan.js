require("./bootstrap");
const {toNumber} = require("lodash");
let round = 'round1'
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
const popupMerah = document.getElementById('popup-merah')
const popupBiru = document.getElementById('popup-biru')
const tutupPopup = document.getElementById('done-popup')
let bluePenalty=0
let redPenalty = 0;
let redPopup = false;
let bluePopup = false;

teguranMerahPertama.addEventListener("click", function (event) {
    redPenalty = 0
    pushScore()
})
teguranMerahKedua.addEventListener("click", function () {
    redPenalty = 0
    pushScore()
})

binaanMerahPertama.addEventListener("click", function () {
    redPenalty = 1
    pushScore()
})
binaanMerahKedua.addEventListener("click", function () {
    redPenalty = 2
    pushScore()
})
peringatanMerahPertama.addEventListener("click", function () {
    redPenalty = 3
    pushScore()
})
peringatanMerahKedua.addEventListener("click", function () {
    redPenalty = 5
    pushScore()
})
peringatanMerahKetiga.addEventListener("click", function () {
    redPenalty = 7
    pushScore()
})
jatuhanMerahSah.addEventListener("click", function () {
    redScore = toNumber(redScore) + 2
    pushScore()
})
jatuhanMerahTidakSah.addEventListener("click", function () {
    redScore = toNumber(redScore) - 2
    pushScore()
})

teguranBiruPertama.addEventListener("click", function () {
    bluePenalty = 0
    pushScore()
})
teguranBiruKedua.addEventListener("click", function () {
    bluePenalty = 0
    pushScore()
})

binaanBiruPertama.addEventListener("click", function () {
    bluePenalty = 1
    pushScore()
})
binaanBiruKedua.addEventListener("click", function () {
    bluePenalty = 2
    pushScore()
})
peringatanBiruPertama.addEventListener("click", function () {
    bluePenalty = 3
    pushScore()
})
peringatanBiruKedua.addEventListener("click", function () {
    bluePenalty = 5
    pushScore()
})
peringatanBiruKetiga.addEventListener("click", function () {
    bluePenalty = 7
    pushScore()
})

jatuhanBiruSah.addEventListener("click", function () {
    blueScore = toNumber(blueScore) + 2
    pushScore()
})
jatuhanBiruTidakSah.addEventListener("click", function () {
    blueScore = toNumber(blueScore) - 2
    pushScore()
})

popupMerah.addEventListener("click", function () {
    showRedPopup()
    pushScore()
})

popupBiru.addEventListener("click", function () {
    showBluePopup()
    pushScore()
})

tutupPopup.addEventListener("click", function () {
    donePopup();
    pushScore();
})

function donePopup() {
    bluePopup = false;
    redPopup = false;
}

function showRedPopup() {
    bluePopup = false;
    redPopup = true;
}

function showBluePopup() {
    bluePopup = true;
    redPopup = false;
}

function pushScore(){
    axios.post("/score-update", {
        message: {
            "blueScore":toNumber(blueScore),
            "redScore":toNumber(redScore),
            "redPenalty":redPenalty,
            "bluePenalty": bluePenalty,
            'redPopup': redPopup,
            'bluePopup': bluePopup,
        },
    });
}
