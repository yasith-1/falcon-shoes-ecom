// load count down


// alert("ok");
$(document).ready(function () {
    var countdownTimer = $('#countdown-timer');
    var endDate;

    // Function to initialize or update the countdown
    function updateCountdown() {
        var now = new Date().getTime();
        var distance = endDate - now;

        // Calculate time components
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the corresponding elements
        $('#days').text(days);
        $('#hours').text(hours);
        $('#minutes').text(minutes);
        $('#seconds').text(seconds);

        // If the countdown is over, display a message
        if (distance < 0) {
            clearInterval(countdownInterval);
            countdownTimer.html('<div class="countdown-expired">Offer Expired</div>');
            localStorage.removeItem('offerEndDate'); // Clear the end date from localStorage
        }
    }

    // Set up an interval to update the countdown every second
    var countdownInterval;

    // Function to start the countdown
    function startCountdown() {
        clearInterval(countdownInterval); // Clear any existing interval
        countdownInterval = setInterval(updateCountdown, 1000);
        updateCountdown(); // Initial call to display immediately
    }

    // Handle the button click to set the offer end date
    $('#setOfferDate').on('click', function () {
        var inputDate = $('#offerEndDate').val();
        if (inputDate) {
            endDate = new Date(inputDate);
            localStorage.setItem('offerEndDate', endDate);
            startCountdown();
        }
    });

    // Load the stored end date if available
    var storedEndDate = localStorage.getItem('offerEndDate');
    if (storedEndDate) {
        endDate = new Date(storedEndDate);
        startCountdown();
    }
});
// load count down






function settimebtn() {
    // alert("ok");

     var spinner = document.getElementById("spinnercountdown");
     spinner.classList.remove("d-none");

    function latealert() {
        Swal.fire({
            title: "Offer Date & Time Added",
            text: "success",
            icon: "success"
        }).then((result) => {

            

            if (result.isConfirmed) {
                window.location.reload();
                reloadhome();
            }
        });
    }

    setTimeout(latealert, 2000);
}