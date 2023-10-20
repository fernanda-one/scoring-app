require("./bootstrap");
const {value} = require("lodash/seq");

let round = 'round1'
const userElement = document.getElementById("user");
const userData = JSON.parse(userElement.getAttribute("data-user"));
const userDetails = JSON.parse(userElement.getAttribute("detail-user"));
const channelDropVerification = Echo.join(`presence.dropVerification.${userData.gelanggang_id}`);
const jurror1Red = document.getElementById('jurror1-red');
const jurror1Blue = document.getElementById('jurror1-blue');
const jurror1Invalid = document.getElementById('jurror1-invalid');
const jurror2Red = document.getElementById('jurror2-red');
const jurror2Blue = document.getElementById('jurror2-blue');
const jurror2Invalid = document.getElementById('jurror2-invalid');
const jurror3Red = document.getElementById('jurror3-red');
const jurror3Blue = document.getElementById('jurror3-blue');
const jurror3Invalid = document.getElementById('jurror3-invalid');
const isPopup = document.getElementById('dropVerificationModal');
const popupMerah = document.getElementById('popup-merah')
const popupBiru = document.getElementById('popup-biru')
const tutupPopup = document.getElementById('done-popup')
const choice1 = document.getElementById("choice1")
const choice2 = document.getElementById("choice2")
const choice3 = document.getElementById("choice3")
const choiceResult = document.getElementById("choice-result")
let juriPertama = '';
let juriKedua = '';
let juriKetiga = '';
let redPopup = false;
let bluePopup = false;

channelDropVerification
    .here((users) => {
        console.log(users, `anda telah terhubung dalam verification`);
        cekStatususer(users)
    })
    .joining((user) => {
        console.log({ user }, "joined");
    })
    .leaving((user) => {
        console.log({ user }, "leaved");
    })
    .listen(`.dropVerification.${userData.gelanggang_id}`, (event) => {
        changeColorJurror(event)
        redPopup = event.red_popup;
        bluePopup = event.blue_popup;
        if (redPopup || bluePopup) {
            isPopup.style.display = 'block';
            if (window.location.pathname == '/papan_score') {
                tutupPopup.style.display = 'none';
            }
        } else {
            isPopup.style.display = 'none';
            if (window.location.pathname == '/juri') {
                choiceResult.classList.remove("bg-blueDark")
                choiceResult.classList.remove("bg-yellowDark")
                choiceResult.classList.remove("bg-redDark")
                choiceResult.classList.add("bg-grayDefault")
                choiceResult.innerText = "";
            }
        }
    })

const roleIds = {
    '5': 'juri_pertama',
    '6': 'juri_kedua',
    '7': 'juri_ketiga',
}

function cekStatususer(users) {
    const userList = {
        'juri_pertama':false,
        'juri_kedua': false,
        'juri_ketiga': false,
    }
    users.map(user =>{
        if (roleIds[`${user.role_id}`]){
            return userList[roleIds[`${user.role_id}`]] = true;
        }
    })
}

function pushDropVerification({juriPertama, juriKedua, juriKetiga, redPopup, bluePopup}){
    axios.post("/drop-verification", {
        message: {
            'juriPertama': juriPertama,
            'juriKedua': juriKedua,
            'juriKetiga': juriKetiga,
            'redPopup': redPopup,
            'bluePopup': bluePopup,
        },
    });
}

function changeColorJurror(event) {
    if (event.id == 'Juri Pertama') {
        let juri_pertama = event.juri_pertama
        if (juri_pertama == "RED CORNER") {
            jurror1Red.classList.remove("bg-grayDefault");
            jurror1Blue.classList.remove("bg-blueDark");
            jurror1Invalid.classList.remove("bg-yellowDark");
            jurror1Red.classList.add("bg-redDark");
            jurror1Blue.classList.add("bg-grayDefault");
            jurror1Invalid.classList.add("bg-grayDefault");
        } else if (juri_pertama == "BLUE CORNER") {
            jurror1Blue.classList.remove("bg-grayDefault");
            jurror1Red.classList.remove("bg-redDark");
            jurror1Invalid.classList.remove("bg-yellowDark");
            jurror1Blue.classList.add("bg-blueDark");
            jurror1Red.classList.add("bg-grayDefault");
            jurror1Invalid.classList.add("bg-grayDefault");
        } else {
            jurror1Invalid.classList.remove("bg-grayDefault");
            jurror1Red.classList.remove("bg-redDark");
            jurror1Blue.classList.remove("bg-blueDark");
            jurror1Invalid.classList.add("bg-yellowDark");
            jurror1Red.classList.add("bg-grayDefault");
            jurror1Blue.classList.add("bg-grayDefault");
        }
    } else if (event.id == 'Juri Kedua') {
        let juri_kedua = event.juri_kedua
        if (juri_kedua == "RED CORNER") {
            jurror2Red.classList.remove("bg-grayDefault");
            jurror2Blue.classList.remove("bg-blueDark");
            jurror2Invalid.classList.remove("bg-yellowDark");
            jurror2Red.classList.add("bg-redDark");
            jurror2Blue.classList.add("bg-grayDefault");
            jurror2Invalid.classList.add("bg-grayDefault");
        } else if (juri_kedua == "BLUE CORNER") {
            jurror2Blue.classList.remove("bg-grayDefault");
            jurror2Red.classList.remove("bg-redDark");
            jurror2Invalid.classList.remove("bg-yellowDark");
            jurror2Blue.classList.add("bg-blueDark");
            jurror2Red.classList.add("bg-grayDefault");
            jurror2Invalid.classList.add("bg-grayDefault");
        } else {
            jurror2Invalid.classList.remove("bg-grayDefault");
            jurror2Red.classList.remove("bg-redDark");
            jurror2Blue.classList.remove("bg-blueDark");
            jurror2Invalid.classList.add("bg-yellowDark");
            jurror2Red.classList.add("bg-grayDefault");
            jurror2Blue.classList.add("bg-grayDefault");
        }
    } else if (event.id == 'Juri Ketiga') {
        let juri_ketiga = event.juri_ketiga
        if (juri_ketiga == "RED CORNER") {
            jurror3Red.classList.remove("bg-grayDefault");
            jurror3Blue.classList.remove("bg-blueDark");
            jurror3Invalid.classList.remove("bg-yellowDark");
            jurror3Red.classList.add("bg-redDark");
            jurror3Blue.classList.add("bg-grayDefault");
            jurror3Invalid.classList.add("bg-grayDefault");
        } else if (juri_ketiga == "BLUE CORNER") {
            jurror3Blue.classList.remove("bg-grayDefault");
            jurror3Red.classList.remove("bg-redDark");
            jurror3Invalid.classList.remove("bg-yellowDark");
            jurror3Blue.classList.add("bg-blueDark");
            jurror3Red.classList.add("bg-grayDefault");
            jurror3Invalid.classList.add("bg-grayDefault");
        } else {
            jurror3Invalid.classList.remove("bg-grayDefault");
            jurror3Red.classList.remove("bg-redDark");
            jurror3Blue.classList.remove("bg-blueDark");
            jurror3Invalid.classList.add("bg-yellowDark");
            jurror3Red.classList.add("bg-grayDefault");
            jurror3Blue.classList.add("bg-grayDefault");
        }
    }
}

function resetColors() {
    jurror1Blue.classList.remove("bg-blueDark");
    jurror1Blue.classList.add("bg-grayDefault");
    jurror1Invalid.classList.remove("bg-yellowDark");
    jurror1Invalid.classList.add("bg-grayDefault");
    jurror1Red.classList.remove("bg-redDark");
    jurror1Red.classList.add("bg-grayDefault");

    jurror2Blue.classList.remove("bg-blueDark");
    jurror2Blue.classList.add("bg-grayDefault");
    jurror2Invalid.classList.remove("bg-yellowDark");
    jurror2Invalid.classList.add("bg-grayDefault");
    jurror2Red.classList.remove("bg-redDark");
    jurror2Red.classList.add("bg-grayDefault");

    jurror3Blue.classList.remove("bg-blueDark");
    jurror3Blue.classList.add("bg-grayDefault");
    jurror3Invalid.classList.remove("bg-yellowDark");
    jurror3Invalid.classList.add("bg-grayDefault");
    jurror3Red.classList.remove("bg-redDark");
    jurror3Red.classList.add("bg-grayDefault");
}

if (window.location.pathname == '/dewan') {
    popupMerah.addEventListener("click", function () {
        pushDropVerification({
            juriPertama: juriPertama,
            juriKedua: juriKedua,
            juriKetiga: juriKetiga,
            redPopup: true,
            bluePopup: false,
        })
        resetColors();
    })

    popupBiru.addEventListener("click", function () {
        pushDropVerification({
            juriPertama: juriPertama,
            juriKedua: juriKedua,
            juriKetiga: juriKetiga,
            redPopup: false,
            bluePopup: true,
        })
        resetColors();
    })

    tutupPopup.addEventListener("click", function () {
        pushDropVerification({
            juriPertama: juriPertama,
            juriKedua: juriKedua,
            juriKetiga: juriKetiga,
            redPopup: false,
            bluePopup: false,
        });
    })
} else if (window.location.pathname == '/juri') {
    choice1.addEventListener("click", function () {
        let selected = "BLUE CORNER"
        if (userDetails.role_id == 5) {
            juriPertama = selected
        } else if (userDetails.role_id == 6) {
            juriKedua = selected
        } else if (userDetails.role_id == 7) {
            juriKetiga = selected
        }
        pushDropVerification({
            juriPertama: juriPertama,
            juriKedua: juriKedua,
            juriKetiga: juriKetiga,
            redPopup: redPopup,
            bluePopup: bluePopup,
        });
        choiceResult.innerText = selected;
        choiceResult.classList.remove("bg-yellowDark")
        choiceResult.classList.remove("bg-redDark")
        choiceResult.classList.remove("bg-grayDefault")
        choiceResult.classList.add("bg-blueDark")
    })

    choice2.addEventListener("click", function () {
        let selected = "INVALID"
        if (userDetails.role_id == 5) {
            juriPertama = selected
        } else if (userDetails.role_id == 6) {
            juriKedua = selected
        } else if (userDetails.role_id == 7) {
            juriKetiga = selected
        }
        pushDropVerification({
            juriPertama: juriPertama,
            juriKedua: juriKedua,
            juriKetiga: juriKetiga,
            redPopup: redPopup,
            bluePopup: bluePopup,
        });
        choiceResult.innerText = selected;
        choiceResult.classList.remove("bg-blueDark")
        choiceResult.classList.remove("bg-redDark")
        choiceResult.classList.remove("bg-grayDefault")
        choiceResult.classList.add("bg-yellowDark")
    })

    choice3.addEventListener("click", function () {
        let selected = "RED CORNER"
        if (userDetails.role_id == 5) {
            juriPertama = selected
        } else if (userDetails.role_id == 6) {
            juriKedua = selected
        } else if (userDetails.role_id == 7) {
            juriKetiga = selected
        }
        pushDropVerification({
            juriPertama: juriPertama,
            juriKedua: juriKedua,
            juriKetiga: juriKetiga,
            redPopup: redPopup,
            bluePopup: bluePopup,
        });
        choiceResult.innerText = selected;
        choiceResult.classList.remove("bg-blueDark")
        choiceResult.classList.remove("bg-yellowDark")
        choiceResult.classList.remove("bg-grayDefault")
        choiceResult.classList.add("bg-redDark")
    })
}
