/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './*.php',
    './template-parts/**/*.php',
    './woocommerce/**/*.php',
    './assets/js/*.js',
  ],
  theme: {
    extend: {
      colors: {
        primary: '#1b1600',
        secondary: '#9e4623',
        coff_black: '#000000',
        coffLightGreen: '#2e4a3b',
        coffGreen: '#284133',
        secondaryLight: '#c1662c',
        title_Clr: '#1b1600',
      },
    },
  },
  plugins: [],
}
