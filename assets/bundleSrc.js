// JAVASCRIPT
// Bootstrap
import 'bootstrap';

// AOS
import AOS from 'aos';

// jQuery
import $ from 'jquery';

// FontAwesome
import { library, dom } from '@fortawesome/fontawesome-svg-core'
import { faBars } from '@fortawesome/free-solid-svg-icons'

library.add(faBars)

dom.watch()

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
