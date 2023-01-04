import jQuery from 'jquery';
window.$ = jQuery;

import { valuesIn } from 'lodash';
import './bootstrap';

document.addEventListener('DOMContentLoaded', function() {
    $('input[type="file"]').on('change', function() {
        if(this.files[0].size > 5242880)    {
            alert('This file size is too large. Max size is 5MB'); 
            this.value = '';
        }
    });
});