const pelanggaran = ['teguran-pertama', 'teguran-kedua','binaan-pertama', 'binaan-kedua','peringatan-pertama', 'peringatan-kedua','peringatan-ketiga']
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
export function changeIndicatorPelanggaran(corner, penalty) {
    console.log(corner, penalty)
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

