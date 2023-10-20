require("./bootstrap");
const {toNumber} = require("lodash");
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
// const popupMerah = document.getElementById('popup-merah')
// const popupBiru = document.getElementById('popup-biru')
// const tutupPopup = document.getElementById('done-popup')
let bluePenalty='teguran-pertama'
let redPenalty = 'teguran-pertama';
// let redPopup = false;
// let bluePopup = false;

const pelanggaranRed = {
    'teguran-pertama': document.getElementById('teguran-merah-pertama'),
    'teguran-kedua': document.getElementById('teguran-merah-kedua'),
    'binaan-pertama': document.getElementById('binaan-merah-pertama'),
    'binaan-kedua': document.getElementById('binaan-merah-kedua'),
    'peringatan-pertama': document.getElementById('peringatan-merah-pertama'),
    'peringatan-kedua': document.getElementById('peringatan-merah-kedua'),
    'peringatan-ketiga': document.getElementById('peringatan-merah-ketiga'),
}
const pelanggaranBlue = {
    'teguran-pertama': document.getElementById('teguran-biru-pertama'),
    'teguran-kedua': document.getElementById('teguran-biru-kedua'),
    'binaan-pertama': document.getElementById('binaan-biru-pertama'),
    'binaan-kedua': document.getElementById('binaan-biru-kedua'),
    'peringatan-pertama': document.getElementById('peringatan-biru-pertama'),
    'peringatan-kedua': document.getElementById('peringatan-biru-kedua'),
    'peringatan-ketiga': document.getElementById('peringatan-biru-ketiga'),
}
const pelanggaran = ['teguran-pertama', 'teguran-kedua','binaan-pertama', 'binaan-kedua','peringatan-pertama', 'peringatan-kedua','peringatan-ketiga']

function changeIndicatorPelanggaran(corner, penalty) {
        let nameElemenet = pelanggaranRed
        let color = 'bg-redDefault'
        if (corner !== 'red'){
            nameElemenet = pelanggaranBlue
            color = 'bg-blueDark'
        }
        pelanggaran.map(itemPelanggaran =>{
        if (itemPelanggaran === penalty){
            nameElemenet[itemPelanggaran].classList.remove('bg-grayDefault')
            nameElemenet[itemPelanggaran].classList.add(color)
        } else {
            nameElemenet[itemPelanggaran].classList.add('bg-grayDefault')
            nameElemenet[itemPelanggaran].classList.remove(color)
        }
    })
}

teguranMerahPertama.addEventListener("click", function (event) {
    redPenalty = 'teguran-pertama'
    changeIndicatorPelanggaran('red', redPenalty)
    pushScore()
})
teguranMerahKedua.addEventListener("click", function () {
    redPenalty = 'teguran-kedua'
    changeIndicatorPelanggaran('red', redPenalty);
    pushScore()
})

binaanMerahPertama.addEventListener("click", function () {
    redPenalty = 'binaan-pertama'
    changeIndicatorPelanggaran('red', redPenalty);
    pushScore()
})
binaanMerahKedua.addEventListener("click", function () {
    redPenalty = 'binaan-kedua'
    changeIndicatorPelanggaran('red', redPenalty);
    pushScore()
})
peringatanMerahPertama.addEventListener("click", function () {
    redPenalty = 'peringatan-pertama'
    changeIndicatorPelanggaran('red', redPenalty);
    pushScore()
})
peringatanMerahKedua.addEventListener("click", function () {
    redPenalty = 'peringatan-kedua'
    changeIndicatorPelanggaran('red', redPenalty);
    pushScore()
})
peringatanMerahKetiga.addEventListener("click", function () {
    redPenalty = 'peringatan-ketiga'
    changeIndicatorPelanggaran('red', redPenalty);
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
    bluePenalty = 'teguran-pertama'
    changeIndicatorPelanggaran('blue', bluePenalty);
    pushScore()
})
teguranBiruKedua.addEventListener("click", function () {
    bluePenalty = 'teguran-kedua'
    changeIndicatorPelanggaran('blue', bluePenalty);
    pushScore()
})

binaanBiruPertama.addEventListener("click", function () {
    bluePenalty = 'binaan-pertama'
    changeIndicatorPelanggaran('blue', bluePenalty);
    pushScore()
})
binaanBiruKedua.addEventListener("click", function () {
    bluePenalty = 'binaan-kedua'
    changeIndicatorPelanggaran('blue', bluePenalty);
    pushScore()
})
peringatanBiruPertama.addEventListener("click", function () {
    bluePenalty = 'peringatan-pertama'
    changeIndicatorPelanggaran('blue', bluePenalty);
    pushScore()
})
peringatanBiruKedua.addEventListener("click", function () {
    bluePenalty = 'peringatan-kedua'
    changeIndicatorPelanggaran('blue', bluePenalty);
    pushScore()
})
peringatanBiruKetiga.addEventListener("click", function () {
    bluePenalty = 'peringatan-ketiga'
    changeIndicatorPelanggaran('blue', bluePenalty);
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
