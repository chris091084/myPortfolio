/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.scss in this case)
import '../css/app.scss';

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';

console.log('Hello Webpack Encore! Edit me in assets/js/app.js');
const arrowUp = document.getElementById("navbar");
require('bootstrap');
if (window.location.href === 'http://'+window.location.host+'/'){


// console.log(window.scrollY);

window.addEventListener("scroll", function () {

    if (window.scrollY == 0) {

        arrowUp.style.backgroundColor = 'transparent';
        arrowUp.style.boxShadow = "none";
    } else {

        arrowUp.style.backgroundColor = "rgb(52, 152, 219)";
        arrowUp.style.transitionDuration = '0.5s';
        arrowUp.style.boxShadow = "0px 2px 10px black";

    }
}, false);
}
else{
    window.addEventListener("load", function () {
        arrowUp.style.backgroundColor = "rgb(52, 152, 219)";
        arrowUp.style.boxShadow = "0px 2px 10px black";
    })
}

