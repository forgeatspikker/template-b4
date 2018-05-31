// JAVASCRIPT
// Bootstrap
import 'bootstrap';

// AOS
import AOS from 'aos';

// jQuery
import $ from 'jquery';

// FontAwesome
import fontawesome from '@fortawesome/fontawesome';
import solid from '@fortawesome/fontawesome-free-solid';
import regular from '@fortawesome/fontawesome-free-regular';
import brands from '@fortawesome/fontawesome-free-brands';


// Add the icon to the library so you can use it in your page
fontawesome.library.add(solid);
fontawesome.library.add(regular);
fontawesome.library.add(brands);

// Custom Javascript
import './js/app.js';

// STYLESHEETS
import './scss/app.scss';

//IMAGES
function importAll(r) {
  let images = {};
  r.keys().map((item, index) => { images[item.replace('./', '')] = r(item); });
  return images;
}

const images = importAll(require.context('./images', false, /\.(png|jpe?g|svg)$/));
