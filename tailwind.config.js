/** @type {import('tailwindcss').Config} */
const colors = require('tailwindcss/colors')
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            'white': '#FCFCFC',
            'primary': {
                100: '#F9D2F0',
                200: '#F6BCE9',
                300: '#F08FDB',
                400: '#EA62CC',
                500: '#E335BE',
                600: '#99157C',
                700: '#700F5B',
                800: '#430937',
                900: '#2D0624',
            },
            'secondary': {
                100: '#FFDBF7',
                200: '#FFBDF1',
                300: '#FF8AE6'
            },
            'tertiary': '#662357',
            gray: colors.gray,
            green: colors.green,
            blue: colors.blue,
            red: colors.red,
            yellow: colors.yellow,
            'black': '#1D1D1D',
        },
        extend: {},
    },
    plugins: [],
}

