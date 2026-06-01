import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                gym: {
                    black: '#0a0a0a',
                    dark: '#111111',
                    card: '#1a1a1a',
                    border: '#2a2a2a',
                    gold: '#f59e0b',
                    orange: '#ea580c',
                    muted: '#a3a3a3',
                },
            },
        },
    },

    plugins: [forms],
};
