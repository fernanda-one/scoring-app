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
                blueDefault: '#0C3C78'
              },
        },
    },
    plugins: [require("flowbite/plugin")],
};
