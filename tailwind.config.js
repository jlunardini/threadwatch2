const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                thread: ['Pacifico'],
                victor: ['Victor Mono'],
            },
            colors: {
                customDark: '#1D1D1D',
                customBlack: '#151515',
                customGreen: '#92BD72',
                customOrange: '#D98E39',
                customLightGray: '#888888',
                customBlue: '#4F5D75',
                customCamel: '#BD9971',
                heroOrangeStart: '#B37C3C',
                heroOrangeEnd: '#E5B25A',
                heroBackgroundStart: '#B37C3C',
                heroBackgroundEnd: '#E5B25A',
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}
