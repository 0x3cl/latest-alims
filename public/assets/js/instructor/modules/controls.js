import {getJWTtoken} from './dataUtils.js';
import {generateCSRFToken, generateRandomCode, reloadTableContent, multiSelectTable, toastMessage} from './utils.js';
import {deleteModal } from './modal.js';

export async function controls(table) {

    const response = await getJWTtoken();
    const jwt_token = response.token;

}