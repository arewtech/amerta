/** @type {import('tailwindcss').Config} */
const defaultTheme = require("tailwindcss/defaultTheme");
module.exports = {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    theme: {
        extend: {
            container: {
                // center: true,
                padding: {
                    DEFAULT: "1rem",
                    sm: "2rem",
                    lg: "4rem",
                    xl: "5rem",
                    "2xl": "6rem",
                },
            },
            colors: {
                "dark-scy": "#051334",
            },
            fontFamily: {
                sans: ["Inter var", ...defaultTheme.fontFamily.sans],
            },
            boxShadow: {
                "3xl": "0 0 13px rgba(0, 0, 0, 0.3)",
                // "3xl": "0 5px 15px 0 rgb(0 0 0 / 8%)",
            },
            //   backgroundImage: {
            //     "desktop-hero": "url('/public/assets/images/header-background.jpg')",
            //   },
        },
    },
    plugins: [
        require("prettier-plugin-tailwindcss"),
        require("@tailwindcss/forms"),
        require("daisyui"),
    ],
};
