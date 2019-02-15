// JAVASCRIPT
// Bootstrap
import 'bootstrap';

// AOS
import AOS from 'aos';
AOS.init();

// jQuery
import $ from 'jquery';

// FontAwesome
import { library, dom } from '@fortawesome/fontawesome-svg-core'
import { faBars, faPhone, faInfo, faChevronRight, faChevronLeft, faAngleUp, faAngleRight, faAngleDoubleRight, faAngleLeft, faAngleDoubleLeft, , faMapMarkerAlt, faDownload, faEnvelope } from '@fortawesome/free-solid-svg-icons'
import { faTwitter, faFacebookF, faInstagram } from '@fortawesome/free-brands-svg-icons'
import { faCalendarAlt } from '@fortawesome/free-regular-svg-icons'

library.add(faBars, faPhone, faInfo, faChevronRight, faChevronLeft, faAngleUp, faAngleRight, faAngleDoubleRight, faAngleLeft, faAngleDoubleLeft, , faMapMarkerAlt, faDownload, faEnvelope, faTwitter, faFacebookF, faInstagram, faCalendarAlt)

dom.watch()

// Custom Javascript
import './js/smoothscroll.js';
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
