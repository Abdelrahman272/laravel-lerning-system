// Get the form element
const form = document.querySelector('form');

// Add an event listener to the form submission
form.addEventListener('submit', function (event) {
    // Prevent the default form submission behavior
    event.preventDefault();

    // Get the name input element
    const nameInput = document.querySelector('input[name="name"]');

    // Get the value of the name input
    const nameValue = nameInput.value.trim();

    // Define a regular expression to match a name with four words in Arabic
    const arabicNameRegex = /^[\u0621-\u064A]+\s[\u0621-\u064A]+\s[\u0621-\u064A]+\s[\u0621-\u064A]+$/;

    // Validate the name input value
    if (nameValue === '') {
        // If the name is empty, display an error message
        displayErrorMessage('يرجى إدخال اسم الطالب/ الطالبة');
        return;
    } else if (!arabicNameRegex.test(nameValue)) {
        // If the name does not match the required format, display an error message
        displayErrorMessage('يجب أن يكون الاسم رباعي وباللغة العربية');
        return;
    }

    // Get the select element
    const gradeSelect = document.querySelector('select');

    // Get the value of the select element
    const gradeValue = gradeSelect.value;

    // Validate the select element value
    if (gradeValue === '') {
        // If no grade is selected, display an error message
        displayErrorMessage('يرجى اختيار الصف');
        return;
    }

    // Get the student's phone number input element
    const studentPhoneInput = document.querySelector('input[name="students_phone"]');

    // Get the value of the student's phone number input
    const studentPhoneValue = studentPhoneInput.value.trim();

    // Validate the student's phone number input value
    if (studentPhoneValue === '') {
        // If the phone number is empty, display an error message
        displayErrorMessage('يرجى إدخال رقم هاتف الطالب');
        return;
    } else if (studentPhoneValue.length < 10 || studentPhoneValue.length > 12) {
        // If the phone number is too short or too long, display an error message
        displayErrorMessage('يجب أن يحتوي رقم هاتف الطالب على 10-12 أرقام');
        return;
    }

    // Get the parent's phone number input element
    const parentPhoneInput = document.querySelector('input[name="parents_phone"]');

    // Get the value of the parent's phone number input
    const parentPhoneValue = parentPhoneInput.value.trim();

    // Validate the parent's phone number input value
    if (parentPhoneValue === '') {
        // If the phone number is empty, display an error message
        displayErrorMessage('يرجى إدخال رقم هاتف ولي الأمر');
        return;
    } else if (parentPhoneValue.length !== 11) {
        // If the phone number is not 11 digits, display an error message
        displayErrorMessage('يجب أن يحتوي رقم هاتف ولي الأمر على 11 رقماً');
        return;
    }

    // Get the password input element
    const passwordInput = document.querySelector('input[name="password"]');

    const confirmPasswordInput = document.querySelector('.confirm');

    // Get the value of the password input
    const passwordValue = passwordInput.value.trim();

    const confirmPasswordInputValue = confirmPasswordInput.value.trim();

    // Define a regular expression to match a password with at least 8 characters in English and containing letters and symbols
    const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]{8,}$/;

    // Validate the password input value
    if (passwordValue === '') {
        // If the password is empty, display an error message
        displayErrorMessage('يرجى إدخال كلمة المرور');
        return;
    } else if (!passwordRegex.test(passwordValue)) {
        // If the password does not match the required format, display an error message
        displayErrorMessage('يجب أن تحتوي كلمة المرور على 8 أحرف على الأقل باللغة الإنجليزية وتحتوي على أحرف ورموز');
        return;
    } else if (passwordValue !== confirmPasswordInputValue) {
        // If the passwords do not match, display an error message
        displayErrorMessage('يجب أن تتطابق كلمة المرور');
        return;
    }

    // If there are no errors, submit the form
    form.submit();

    // Hide the error message
    hideErrorMessage();
});

// Define the displayErrorMessage function
function displayErrorMessage(message) {
    // Get the error message element
    const errorMessage = document.querySelector('.error-message');

    // Set the error message text
    errorMessage.textContent = message;

    // Show the error message
    errorMessage.style.display = 'block';
}

// Define the hideErrorMessage function
function hideErrorMessage() {
    // Get the error message element
    const errorMessage = document.querySelector('.error-message');

    // Hide the error message
    errorMessage.style.display = 'none';
}
