/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      aspectRatio: {
        '16/9': '16 / 9',
        '4/3': '4 / 3',
        '3/4': '3 / 4',
      }
    },
  },
  plugins: [],
}

