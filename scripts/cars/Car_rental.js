document.addEventListener('DOMContentLoaded', function () {
    flatpickr("#date-range", {
        mode: "range", 
        dateFormat: "Y-m-d",
        minDate: "today"
    });
});