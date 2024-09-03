/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    ],
    theme: {
        extend: {
            fontFamily: {
                'sans': "B612, ui-serif",
                'mono' : "Fira Code, mono"
            },
            keyframes: {
                'bg-stars' : {
                    '0%' : {transform: 'scale3d(1, 1, 1)'},
                    '100%' : {transform: 'scale3d(1.5, 1.5, 1.5)'},
                },
                'rubik-spin3d' : {
                    '0%': {transform: 'rotate3d(var(--rotate3d-init))'},
                    '100%': {transform: 'rotate3d(var(--rotate3d-end))'},
                },
                'switch-spin' : {
                    '0%': {transform: 'rotate(0deg)'},
                    '100%': {transform: 'rotate(180deg)'},
                }
            }
        },
    },
    plugins: [],
}

