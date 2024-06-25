import withMT from "@material-tailwind/html/utils/withMT";

/** @type {import('tailwindcss').Config} */
export default withMT(  {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      colors: {
        'cream': '#FFF5E1',
        'darken': '#374151',
        'orange': '#f6a520',
        'red-nut': '#ba2b2f',
      },
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
});