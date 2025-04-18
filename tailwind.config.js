/** @type {import('tailwindcss').Config} */
import { fontFamily } from "tailwindcss/defaultTheme";

export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./app/Filament/Resources/**/*.php",
    "./app/Filament/Pages/**/*.php",
  ],
  theme: {
    extend: {
      fontFamily: {
        poppins: ["Poppins", ...fontFamily.sans],
      }
    },
  },
  plugins: [],
}

module.exports = {
  content: ["./resources/views/**/*.blade.php", "./resources/js/**/*.js"],
  theme: {
    extend: {},
  },
  plugins: [],
};

