// JAVASCRIPT
// Bootstrap
import 'bootstrap';

// AOS
import AOS from 'aos';

// jQuery
import $ from 'jquery';

// FontAwesome
import { library, dom } from '@fortawesome/fontawesome-svg-core'
import { faBars } from '@fortawesome/free-solid-svg-icons/faBars'
import { faPhone } from '@fortawesome/free-solid-svg-icons/faPhone'
import { faInfo } from '@fortawesome/free-solid-svg-icons/faInfo'
import { faChevronRight } from '@fortawesome/free-solid-svg-icons/faChevronRight'
import { faChevronLeft } from '@fortawesome/free-solid-svg-icons/faChevronLeft'
import { faphone } from '@fortawesome/free-solid-svg-icons/faPhone'
import { faMapMarkerAlt } from '@fortawesome/free-solid-svg-icons/faMapMarkerAlt'
import { faDownload } from '@fortawesome/free-solid-svg-icons/faDownload'
import { faEnvelope } from '@fortawesome/free-solid-svg-icons/faEnvelope'
import { faTwitter } from '@fortawesome/free-brands-svg-icons/faTwitter'
import { faFacebookF } from '@fortawesome/free-brands-svg-icons/faFacebookF'
import { faInstagram } from '@fortawesome/free-brands-svg-icons/faInstagram'
import { faCalendarAlt } from '@fortawesome/free-regular-svg-icons/faCalendarAlt'

library.add(faBars, faBars, faPhone, faInfo, faChevronRight, faChevronLeft, faphone, faMapMarkerAlt, faDownload, faEnvelope, faTwitter, faFacebookF, faInstagram, faCalendarAlt)

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
