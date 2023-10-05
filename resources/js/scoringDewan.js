require("./bootstrap");
const blueScore = document.getElementById(`${round}-blueScore`);
const redScore = document.getElementById(`${round}-redScore`);
const teguranMerahPertama = document.getElementById('teguran-merah-pertama')
const binaanMerahPertama = document.getElementById('binaan-merah-pertama')
const peringatanMerahPertama = document.getElementById('peringatan-merah-pertama')
const teguranMerahKedua = document.getElementById('teguran-merah-kedua')
const binaanMerahKedua = document.getElementById('binaan-merah-kedua')
const peringatanMerahKedua = document.getElementById('peringatan-merah-kedua')
const teguranBiruPertama = document.getElementById('teguran-biru-pertama')
const binaanBiruPertama = document.getElementById('binaan-biru-pertama')
const peringatanBiruPertama = document.getElementById('peringatan-biru-pertama')
const teguranBiruKedua = document.getElementById('teguran-biru-kedua')
const binaanBiruKedua = document.getElementById('binaan-biru-kedua')
const peringatanBiruKedua = document.getElementById('peringatan-biru-kedua')
let bluePenalty, redPenalty = 0

teguranMerahPertama.addEventListener("click", function () {
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

function pushScore(){
    axios.post("/score-update", {
        message: {
            "blueScore":blueScore,
            "redScore":redScore,
            "redPenalty":redPenalty,
            "bluePenalty":bluePenalty,
            // "roomId":user.gelanggang_id
        },
    });
}
