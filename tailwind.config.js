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
        extend: {},
    },
    plugins: [
        require('flowbite/plugin'),
        require('preline/plugin'),
    ],
};