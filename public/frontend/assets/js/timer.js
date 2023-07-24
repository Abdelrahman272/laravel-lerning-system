// Set the countdown time in seconds
var countdownTime = 5; // 1 minute

// Get the countdown element
var countdownElement = document.getElementById("countdown");

// Update the countdown element with the initial time
countdownElement.innerHTML = formatTime(countdownTime);

// Start the countdown
var countdownInterval = setInterval(function () {
    countdownTime--;

    // Update the countdown element with the new time
    countdownElement.innerHTML = formatTime(countdownTime);

    // Check if the countdown has finished
    if (countdownTime <= 0) {
        clearInterval(countdownInterval);
        submitExam(); // Submit the form immediately
    }
}, 1000);

// Submit the form and set a cookie to indicate that the exam has been submitted
function submitExam() {
    // Check if the exam has already been submitted
    if (document.cookie.indexOf("examSubmitted=true") !== -1) {
        // Display an alert to the user indicating that the exam has already been submitted
        alert("You have already submitted the exam.");
        return;
    }

    // Submit the form
    document.forms[0].submit();

    // Set a cookie to indicate that the exam has been submitted
    document.cookie = "examSubmitted=true";
}

// Check for the presence of the examSubmitted cookie
if (document.cookie.indexOf("examSubmitted=true") !== -1) {
    // If the cookie is present, redirect the student to a different page
    window.location.href = "exam-already-submitted.html";
}

// Helper function to format time in MM:SS format
function formatTime(time) {
    var minutes = Math.floor(time / 60);
    var seconds = time % 60;
    return padZero(minutes) + ":" + padZero(seconds);
}

// Helper function to add leading zero to single-digit numbers
function padZero(number) {
    if (number < 10) {
        return "0" + number;
    } else {
        return number;
    }
}

var answerDeliverButton = document.getElementById("answer-deliver");
if (answerDeliverButton) {
    answerDeliverButton.addEventListener('click', function (event) {
        event.preventDefault();
        submitExam();
    });
}

// Clear the examSubmitted cookie when the page loads
document.cookie = "examSubmitted=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";

// Server-side validation to check the time limit and prevent going back and accessing the exam again
if (document.forms[0]) {
    document.forms[0].addEventListener('submit', function (event) {
        if (document.cookie.indexOf("examSubmitted=true") !== -1) {
            // If the exam has already been submitted, redirect the student to a different page
            window.location.href = "exam-already-submitted.html";
            event.preventDefault();
            return;
        }

        // Set a cookie to indicate that the exam has been submitted
        document.cookie = "examSubmitted=true";
    });

    window.addEventListener('beforeunload', function (event) {
        if (document.cookie.indexOf("examSubmitted=true") !== -1) {
            // If the exam has already been submitted, prevent going back to the exam
            event.preventDefault();
            return;
        }
    });
}