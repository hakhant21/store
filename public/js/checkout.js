/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************!*\
  !*** ./resources/js/checkout.js ***!
  \**********************************/
var stripe = Stripe('{{config("services.stripe_key") }}');
var elements = stripe.elements();
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Roboto", Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};
var card = elements.create('card', {
  style: style,
  hidePostalCode: true
});
var cardElement = document.getElementById('card-element');
card.mount(cardElement);
card.addEventListener('change', function (event) {
  var displayError = document.getElementById('card-errors');
  document.querySelector("#card-error").textContent = event.error ? event.error.message : "";
});
var form = document.getElementById('payment-form');
form.addEventListener('submit', function (event) {
  event.preventDefault(); // Disable the submit button to prevent repeated clicks

  document.getElementById('completed-order').disabled = true;
  var options = {
    name: document.getElementById('name_on_card').value,
    address_line1: document.getElementById('address').value,
    address_city: document.getElementById('city').value,
    address_state: document.getElementById('state').value,
    address_zip: document.getElementById('postalcode').value
  };
  stripe.createToken(card, options).then(function (result) {
    if (result.error) {
      // Inform the user if there was an error
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message; // Enable the submit button

      document.getElementById('completed-order').disabled = false;
    } else {
      // Send the token to your server
      stripeTokenHandler(result.token);
    }
  });
});

function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput); // Submit the form

  form.submit();
}
/******/ })()
;