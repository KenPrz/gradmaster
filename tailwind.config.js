import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'primary': '#FFFFFF',    // White
                'secondary': '#E5E5E5',  // Light Gray
                'accent': '#FCA311',     // Orange
                'dark': '#14213D',       // Navy
                'black': '#000000',      // Black
            },
        },
    },

    plugins: [forms],
};
