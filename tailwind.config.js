// /** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            colors: {
                primary:  '#4299e1', // Ubah menjadi kode warna biru default Tailwind
                blueDefault: '#0C3C78',
                blueDark: '#0A3060',
                blueOpacity: '#CCE4FF',
                redDefault: '#F30A49',
                redDark: '#C2083A',
                redOpacity: '#FFCCCC',
                grayDefault: '#8F949B',
                grayDark: '#626973',
                greenDefault: '#04879C',
                whiteDefault: '#FFFFFF'
              },
        },
    },
    plugins: [require("flowbite/plugin")],
};
