document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.querySelector('.contact-form');
    const yourNameInput = document.getElementById('yourname');
    const subjectInput = document.getElementById('subject');
    const emailInput = document.getElementById('email');
    const messageTextarea = document.getElementById('msg');

    contactForm.addEventListener('submit', function(event) {
        event.preventDefault();
        if (validateForm()) {
            // Perform additional actions on successful form submission
            console.log('Form submitted successfully!');
        }
    });

    function validateForm() {
        let isValid = true;

        // Resetting previous error messages
        clearErrorMessages();

        // Validation for Name
        if (yourNameInput.value.trim() === '') {
            displayErrorMessage(yourNameInput, 'Name is required.');
            isValid = false;
        }

        // Validation for Subject
        if (subjectInput.value.trim() === '') {
            displayErrorMessage(subjectInput, 'Subject is required.');
            isValid = false;
        }

        // Validation for Email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(emailInput.value.trim())) {
            displayErrorMessage(emailInput, 'Invalid email format.');
            isValid = false;
        }

        // Validation for Message
        if (messageTextarea.value.trim() === '') {
            displayErrorMessage(messageTextarea, 'Message is required.');
            isValid = false;
        }

        return isValid;
    }

    function displayErrorMessage(inputElement, message) {
        const errorElement = document.createElement('div');
        errorElement.className = 'error-message';
        errorElement.textContent = message;

        const parentElement = inputElement.parentElement;
        parentElement.appendChild(errorElement);

        inputElement.classList.add('error');
    }

    function clearErrorMessages() {
        const errorMessages = document.querySelectorAll('.error-message');
        errorMessages.forEach(message => message.remove());

        const errorInputs = document.querySelectorAll('.error');
        errorInputs.forEach(input => input.classList.remove('error'));
    }
});
