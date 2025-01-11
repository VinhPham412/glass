import preset from './vendor/filament/support/tailwind.config.preset'

/** @type {import('tailwindcss').Config} */
export default {
    presets: [preset],
    content: [
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
        'node_modules/preline/dist/*.js',
    ],
    darkMode: 'class', // Thêm dòng này
    theme: {
        extend: {
            colors: {
                primary: {
                    "50": "#ecfeff",
                    "100": "#cffafe",
                    "200": "#a5f3fc",
                    "300": "#67e8f9",
                    "400": "#22d3ee",
                    "500": "#06b6d4",
                    "600": "#0891b2",
                    "700": "#0e7490",
                    "800": "#155e75",
                    "900": "#164e63",
                    "950": "#083344"
                }
            }
        },
        fontFamily: {
            sans: ['Inter',
                'ui-sans-serif',
                'system-ui',
                '-apple-system',
                'system-ui',
                'Segoe UI',
                'Roboto',
                'Helvetica Neue',
                'Arial',
                'Noto Sans',
                'sans-serif',
                'Apple Color Emoji',
                'Segoe UI Emoji',
                'Segoe UI Symbol',
                'Noto Color Emoji'],
            'body': [
                'Inter',
                'ui-sans-serif',
                'system-ui',
                '-apple-system',
                'system-ui',
                'Segoe UI',
                'Roboto',
                'Helvetica Neue',
                'Arial',
                'Noto Sans',
                'sans-serif',
                'Apple Color Emoji',
                'Segoe UI Emoji',
                'Segoe UI Symbol',
                'Noto Color Emoji'
            ]
        },
    },
    plugins: [
        require('flowbite/plugin'),
        require('preline/plugin'),
    ],
};