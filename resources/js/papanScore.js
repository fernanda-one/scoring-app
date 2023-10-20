require("./bootstrap");
const userElement = document.getElementById("user");

function updateDataGelanggang(e) {
    switch (e.action) {
        case 'start':
            startPertandingan(e)
            break;
        case 'finish':
            localStorage.clear()
            location.reload();
            break;
        case 'round':
            break;
        case 'pause':
            break;
        case 'play':
            break;
    }

}


