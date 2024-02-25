// import './bootstrap';

import './bootstrap';

 // Added: Actual Bootstrap JavaScript dependency
import 'bootstrap';
import 'bootstrap-icons/font/bootstrap-icons.css'
 // Added: Popper.js dependency for popover support in Bootstrap
import '@popperjs/core';

import $ from 'jquery';
import axios from 'axios';
import './category'

$(document).ready(function() {
    var timerElement = $('#timer');
    var timeInSeconds = 30;
    var countdown = setInterval(function() {
        timeInSeconds--;
        timerElement.text('00:'+timeInSeconds);
        if (timeInSeconds <= 0) {
            let url = $('.question-p .choice:first').attr('href');
            let parts = url.split('/');
            parts[parts.length - 1] = '0';
            let updatedUrl = parts.join('/');
            window.location.href = updatedUrl;
        }
    }, 1000); 
});