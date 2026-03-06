const mix = require('laravel-mix');

mix.options({
    clearConsole: true,
    processCssUrls: false,
    autoprefixer: false
});

const fs = require("fs");

fs.readdirSync("assets/scss/").forEach(
    fileName => mix.sass(`assets/scss/${fileName}`, "assets/css")
);
