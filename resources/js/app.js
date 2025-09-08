import '../css/app.css';
import './livewire-datepicker-datepicker';

import Chart from 'chart.js/auto';
window.Chart = Chart;

import Swal from 'sweetalert2'
window.Swal = Swal;

import ApexCharts from 'apexcharts';
window.ApexCharts = ApexCharts;


import {  NumberToWords } from "persian-tools2"

function addCommas(num) {
    if (!num) return '';
    // اول عدد رو به عدد واقعی تبدیل کن
    let number = Number(num.toString().replace(/,/g, ''));
    if (isNaN(number)) return '';
    // سپس از toLocaleString برای اضافه کردن کاما استفاده کن
    return number.toLocaleString('en-US');
}

 window.testLog = function (value,callback) {
     // let raw = value.replace(/,/g, '');
     let result2 =addCommas(value)
     let result =value ? NumberToWords.convert(value) : '';

    if (typeof callback === 'function') {
        callback(result,result2);
    }
};


