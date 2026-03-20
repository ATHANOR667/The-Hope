import tailwindcss from "@tailwindcss/vite";

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',

    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',

        './Modules/*/resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                primary: {
                    DEFAULT: 'var(--color-primary)',
                    hover: 'var(--color-primary-hover)',
                    light: 'var(--color-primary-light)',
                },
                secondary: 'var(--color-secondary)',
                success: 'var(--color-success)',
                warning: 'var(--color-warning)',
                danger: 'var(--color-danger)',
                info: 'var(--color-info)',

                slate: {
                    50: 'var(--color-slate-50)',
                    800: 'var(--color-slate-800)',
                    900: 'var(--color-slate-900)',
                }
            }
        },
    },
    plugins: [
        tailwindcss()
    ],
};
