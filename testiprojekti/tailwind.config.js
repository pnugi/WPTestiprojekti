module.exports = {
  content: [
    "./404.php",
    "./archive.php",
    "./index.php",
    "./search.php",
    "./searchform.php",
    "./single.php",
    "./header.php",
    "./page.php",
    "./footer.php",
    "./template-parts/*.php",
    "./template-parts/blocks/*.php",
    "./inc/addons/maintenance.php",
    "./src/**/*.{html,js}",
  ],
  theme: {
    fontFamily: {
      poppins: ["Poppins", "sans-serif"],
      sora: ["Sora", "sans-serif"],
      body: ["Aktiv Grotesk", "sans-serif"],
    },
    colors: {
      primary: {
        100: "#c6ff55",
        500: "#a1d029", // lime greenish
        900: "#102A2B", //#668823
        950: "#001A27",
      },
      accent: {
        300: "#FF7452", // orange
        700: "#707070", // Gray
      },
      white: "#FAFCFF",
      gray: {
        100: "#E6E6E6",
        200: "#CCCCCC",
        300: "#B3B3B3",
        400: "#999999",
        500: "#808080",
        600: "#666666",
        700: "#4D4D4D",
        800: "#333333",
        900: "#1A1A1A",
      },
      transparent: "transparent",
      black: "#000",
    },
    extend: {
      height: (theme) => ({
        "100vh": "100vh",

        "90vh": "90vh",

        "80vh": "80vh",

        "70vh": "70vh",

        "60vh": "60vh",

        "screen/2": "50vh",

        "40vh": "40vh",

        "screen/3": "calc(100vh / 3)",

        "screen/4": "calc(100vh / 4)",

        "screen/5": "calc(100vh / 5)",

        "30rem": "30rem",

        "33rem": "33rem",

        "35rem": "35rem",

        "40rem": "40rem",

        "45rem": "45rem",
      }),
      margin: (theme) => ({
        "30rem": "30rem",

        "33rem": "33rem",

        "35rem": "35rem",

        "40rem": "40rem",

        "45rem": "45rem",
        "40vh": "40vh",

        "screen/3": "calc(100vh / 3)",

        "screen/4": "calc(100vh / 4)",

        "screen/5": "calc(100vh / 5)",
      }),
    },
  },
  variants: {},
  plugins: [
    require("@tailwindcss/aspect-ratio"),
    require("@tailwindcss/forms"),
  ],
};
