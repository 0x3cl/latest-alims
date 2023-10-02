import {
    dashboardData
} from "./modules/dashboard.js";

import {
    datatablesData
} from './modules/datatables.js';

import {
    controls
} from './modules/controls.js';

$(document).ready(function() {

    controls();
    datatablesData(); 
    dashboardData();

});