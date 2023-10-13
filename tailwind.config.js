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
                yellowDark: '#FFD369',
                yellowDefault: '#F6FA70',
                redDark: '#C2083A',
                redOpacity: '#FFCCCC',
                grayDefault: '#8F949B',
                grayDark: '#626973',
                greenDefault: '#04879C',
                whiteDefault: '#FFFFFF',
                darkGray: 'var(--primary-background, #1F2937)',
            },
            fontFamily: {
                'poppins': 'Poppins',
                'poppins-black': 'Poppins-Black',
                'poppins-black-italic': 'Poppins-BlackItalic',
                'poppins-bold': 'Poppins-Bold',
                'poppins-bold-italic': 'Poppins-BoldItalic',
                'poppins-extra-bold': 'Poppins-ExtraBold',
                'poppins-extra-bold-italic': 'Poppins-ExtraBoldItalic',
                'poppins-extra-light': 'Poppins-ExtraLight',
                'poppins-extra-light-italic': 'Poppins-ExtraLightItalic',
                'poppins-italic': 'Poppins-Italic',
                'poppins-light': 'Poppins-Light',
                'poppins-light-italic': 'Poppins-LightItalic',
                'poppins-medium': 'Poppins-Medium',
                'poppins-medium-italic': 'Poppins-MediumItalic',
                'poppins-semibold': 'Poppins-SemiBold',
                'poppins-semibold-italic': 'Poppins-SemiBoldItalic',
                'poppins-thin': 'Poppins-Thin',
                'poppins-thin-italic': 'Poppins-ThinItalic',
            },
            boxShadow: {
                'inset-custom': '0px -3px 3px 0px rgba(0, 0, 0, 0.25) inset',
            },
        },
    },
    plugins: [require("flowbite/plugin")],
};
