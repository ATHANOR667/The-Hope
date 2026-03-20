import axios from 'axios';
import '../../Modules/CoreUI/resources/js/coreui.js';

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
