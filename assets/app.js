import './bootstrap.js';
import 'bootstrap/dist/css/bootstrap.min.css';
// import 'bootstrap/dist/js/bootstrap.min.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';

import HomePictureDefault  from './images/HandPanHome.jpg';
import LogoNav  from './images/MistralLogov.png';
import PurchasePicture  from './images/boutique.jpg';
import RentalPicture  from './images/location.jpg';
import ProductionPicture  from './images/fabrication.png';
import LogoFooter  from './images/Logowhite.png';

let html;
html = ` < img src = "${HomePictureDefault}" alt = "Home Picture Default" > `;
html = ` < img src = "${LogoNav}" alt = "logo" > `;
html = ` < img src = "${PurchasePicture}" alt = "Picture HandPan" > `;
html = ` < img src = "${RentalPicture}" alt = "Picture HandPan" > `;
html = ` < img src = "${ProductionPicture}" alt = "Picture contractor" > `;
html = ` < img src = "${LogoFooter}" alt = "logo" > `;

// console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');
