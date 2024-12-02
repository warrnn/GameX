/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                'primary': "#1B2838",
                'accent': "#FF6347",
                'teritary': "#8B1E3F",
                'neutral': "#171A21",
                'strike': "#969595",
            },
        },
    },
    plugins: [],
};
