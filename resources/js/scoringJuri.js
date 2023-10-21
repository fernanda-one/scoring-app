require("./bootstrap");
const {toInteger} = require("lodash/lang");
const {isEmpty} = require("lodash");
let round = 'round-1'
const pukulanBiru = document.getElementById("pukul-biru");
const pukulanMerah = document.getElementById("pukul-merah");
const tendanganBiru = document.getElementById("tendang-biru");
const tendanganMerah = document.getElementById("tendang-merah");
const userElement = document.getElementById("user");
const userData = JSON.parse(userElement.getAttribute("data-user"));
 const blueScore = document.getElementById(`${round}-blueScore`);
const redScore = document.getElementById(`${round}-redScore`);
const blueInput = document.getElementById(`${round}-blueInput`);
const redInput = document.getElementById(`${round}-redInput`);
const roundView = document.getElementById(`round`)
const inputRed =[];
const inputBlue =[];
let bluePenalty='pertama'
let redPenalty = 'pertama';
// roundView.textContent = roundNow
let timeouts = {
    pukulanred: [],
    pukulanblue: [],
    tendanganblue: [],
    tendanganred: [],
    juripertamapukulanred: [],
    jurikeduapukulanred: [],
    juriketigapukulanred: [],
    juripertamapukulanblue: [],
    jurikeduapukulanblue: [],
    juriketigapukulanblue: [],
    juripertamatendanganred: [],
    jurikeduatendanganred: [],
    juriketigatendanganred: [],
    juripertamatendanganblue: [],
    jurikeduatendanganblue: [],
    juriketigatendanganblue: [],
};
let kondisiTertentuTerpenuhi;
const channelGelanggang = Echo.join(`presence.juri.${userData.gelanggang_id}`);
console.log(userData.gelanggang_id)
channelGelanggang
    .here((users) => {
        console.log(users);
        console.log(`anda telah terhubung sebagai juri`);
    })
    .joining((user) => {
        console.log({ user }, "joined");
    })
    .leaving((user) => {
        console.log({ user }, "leaved");
    })
    .listen(`.juri.${userData.gelanggang_id}`, (event) => {
        updateScore(event);
    });

pukulanBiru.addEventListener("click", function (event) {
    startTimeout(blueInput, 'pukulanblue', inputPoint(blueInput,1,'blue'), 'blue')
    handleAction(event, 'blue', 'pukulan');

});

pukulanMerah.addEventListener("click", function (event) {
    startTimeout(redInput, 'pukulanred',inputPoint(redInput, 1))
    handleAction(event, 'red', 'pukulan');
});

tendanganMerah.addEventListener("click", function (event) {
    startTimeout(redInput, 'tendanganred', inputPoint(redInput,2))
    handleAction(event, 'red', 'tendangan');
});

tendanganBiru.addEventListener("click", function (event) {
    startTimeout(blueInput, 'tendanganblue',inputPoint(blueInput,2,'blue'),'blue')
    handleAction(event, 'blue', 'tendangan');
});

function pushMessage(sudut,gerakan, blueScore = 0,redScore = 0){
    axios.post("/score-event", {
        message: {
            "gerakan":gerakan,
            "sudut":sudut,
            "blueScore":blueScore,
            "redScore":redScore,
            "time":Date.now()
        },
    });
}

function inputPoint(element, point,sudut = 'red' ){
    const text = element.innerHTML
    const values = text.split(",");
    if (!isEmpty(text)){
        const formattedValues = values.map(value => {
            if (!value.includes("<s>")) {
                return `${value.trim()}`;
            } else {
                return value;
            }
        });
        if (sudut === 'blue'){
            formattedValues.reverse()
            formattedValues.push(`${point}`)
            formattedValues.reverse()
        } else{
            formattedValues.push(`${point}`)
        }
        element.innerHTML = formattedValues.join(",");
        return values.length
    }else {
        element.innerHTML = point
    }
}

function handleAction(event, color, action) {
    event.preventDefault();
    pushMessage(color, action, toInteger(blueScore.textContent), toInteger(redScore.textContent));
}
function pushScore(blueScore,redScore){
    axios.post("/score-update", {
        message: {
            "redPenalty":'pertama',
            "bluePenalty":'pertama',
            "blueScore":blueScore,
            "redScore":redScore,
        },
    });
}
function updateScore(event) {
    const gerakan = event.gerakan;
    const sudut = event.sudut
    const id = event.id
    const pointBiru = event.blue_score
    const pointMerah = event.red_score
    const name = sudut + gerakan;
    const sudutPointTime = name + 'time';
    const exp = event.expired;
    redPenalty = event.redPenalty
    bluePenalty = event.bluePenalty
    const score = {
        'redScore': pointMerah,
        'blueScore': pointBiru,
    }
    const sudutScore = event.sudut + 'Score';
    const elementName = getId(id+' '+gerakan+' '+sudut )
    indicatorUpdate(elementName, sudut)
    startTimeoutIndicator(elementName, sudut)
    if (localStorage.getItem(sudutPointTime) && localStorage.getItem(name)) {
        const time = localStorage.getItem(sudutPointTime);
        if ( exp - time <= 2000 && localStorage.getItem(name) !== id) {
            if (gerakan === 'tendangan') {
                score[`${sudutScore}`] += 2
            } else {
                score[`${sudutScore}`] += 1
            }
            localStorage.removeItem(sudutPointTime);
            localStorage.removeItem(name);
            cancelTimeout(gerakan+sudut)
            pushScore(score['blueScore'], score['redScore'])
            return score;
        }
        localStorage.removeItem(sudutPointTime)
        localStorage.removeItem(name)
    }
    localStorage.setItem(sudutPointTime, exp);
    localStorage.setItem(name, id);
    return score;
}
function indicatorUpdate(id, sudut){
    const indicator = document.getElementById(id);
    if (sudut === 'blue'){
        indicator.classList.toggle('bg-blueDefault')
        indicator.classList.toggle('bg-grayDefault')
    } else {
        indicator.classList.toggle('bg-redDefault')
        indicator.classList.toggle('bg-grayDefault')
    }
}
function getId(id){
    return id.toLowerCase().replace(/ /g, '-');
}
function strikeoutLastValue(element, posisi, sudut) {
    const text = element.innerHTML;
    if (text !== "") {
        let values = text.split(",");
        if (sudut === 'blue'){
            values = values.reverse()
        }
        const valuePosisi = values.splice(posisi, 1)[0];
        values.splice(posisi, 0, `<s>${valuePosisi.trim()}</s>` )
        if (sudut === 'blue'){
            values = values.reverse()
        }
        const formattedValues = values.map(value => {
            if (!value.includes("<s>")) {
                return `${value.trim()}`;
            } else {
                return value;
            }
        });
        element.innerHTML = formattedValues.join(",");
    }
}

function startTimeout(element, params, posisi, sudut = 'red') {
    timeouts[`${params}`] = setTimeout(() => {
        strikeoutLastValue(element, posisi, sudut);
    }, 2000);
}
function startTimeoutIndicator(element,sudut){
    let name = element.replace(/-/g,'')
    timeouts[`${name}`] = setTimeout(() => {
        indicatorUpdate(element, sudut);
    }, 2000);
}

function cancelTimeout(params) {
    params = params.toLowerCase()
    clearTimeout(timeouts[`${params}`]);
}

