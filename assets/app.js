import './bootstrap.js';
import 'bootstrap/dist/css/bootstrap.min.css';

/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */

import './controllers/search_controller.js';
import './js/search.js';
import './styles/app.css';
import './styles/footer.css';
import './styles/form.css';
import './styles/general.css';
import './styles/home.css';
import './styles/navbar.css';
import './styles/purchassePage.css';

import HomePictureDefault  from './images/HandPanHome.jpg';
import LogoNav  from './images/MistralLogov.png';
import PurchasePicture  from './images/boutique.jpg';
import RentalPicture  from './images/location.jpg';
import ProductionPicture  from './images/fabrication.png';
import LogoFooter  from './images/Logowhite.png';
import Home  from './images/Mistral_pans.png';
import LogoWhite  from './images/Logo_white.png';
import Acceuil  from './images/Acceuil.jpg';

let html;
html = ` < img src = "${HomePictureDefault}" alt = "Home Picture Default" > `;
html = ` < img src = "${LogoNav}" alt = "logo" > `;
html = ` < img src = "${PurchasePicture}" alt = "Picture HandPan" > `;
html = ` < img src = "${RentalPicture}" alt = "Picture HandPan" > `;
html = ` < img src = "${ProductionPicture}" alt = "Picture contractor" > `;
html = ` < img src = "${LogoFooter}" alt = "logo" > `;
html = ` < img src = "${Home}" alt = "Home page" > `;
html = ` < img src = "${LogoWhite}" alt = "Logo white" > `;
html = ` < img src = "${Acceuil}" alt = "Acceuil pictures" > `;

// console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');


