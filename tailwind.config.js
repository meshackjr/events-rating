module.exports = {
  purge: [
    './resources/**/*.blade.php',
     './resources/**/*.js',
     './resources/**/*.vue',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
        colors: {
            'dblue-100': '#cfe5fc',
            'dblue-200': '#9fcaf9',
            'dblue-300': '#6eb0f7',
            'dblue-400': '#3e96f4',
            'dblue-500': '#0e7cf1',
            'dblue-600': '#0b63c1',
            'dblue-700': '#084a91',
            'dblue-800': '#063160',
            'dblue-900': '#042243',
        }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
