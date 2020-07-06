@extends('layouts.master')

@section('title')
    Display Cart
@endsection

@section('styles')
    <style type="text/css">
    /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.StripeElement {
  box-sizing: border-box;

  height: 40px;

  padding: 10px 12px;

  border: 1px solid transparent;
  border-color: black;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}

    </style>
@endsection

@section('content')
<div class="row">
	<div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
		<h1>Checkout</h1>
		<h4>Your Total: </h4>
		<form action="{{ route('postcheckout')}}" method="post" id="payment-form">
			@csrf
			<div class="row">
				<div class="col-xs-12">
					<div form-group>
						<label for="name">Card Holder's Name</label>
						<input type="text" id="name" class="form-control" required>
					</div>					
				</div>
				<hr>
				<!-- <div class="col-xs-12">
					<div form-group>
						<label for="card_number">Card Number</label>
						<input type="text" id="card_number" class="form-control" required>
					</div>					
				</div>
				<div class="col-xs-12">
					<div form-group>
						<label for="expiration_month">Expiration Month</label>
						<input type="text" id="expiration_month" class="form-control" required>
					</div>		
					<div form-group>
						<label for="expiration_year">Expiration Year</label>
						<input type="text" id="expiration_year" class="form-control" required>
					</div>			
				</div>
				<div class="col-xs-12">
					<div form-group>
						<label for="cvc">CVC</label>
						<input type="text" id="cvc" class="form-control" required>
					</div>					
				</div> -->
			</div>
			<div class="form-row">
			    <label for="card-element">
			      Credit or debit card
			    </label>
				<div id="card-element">
			      <!-- A Stripe Element will be inserted here. -->
			    </div>

			    <!-- Used to display form errors. -->
			    <div id="card-errors" role="alert"></div>
			</div>
			<div><button type="submit">Submit</button></div>
			
		</form>		
	</div>	
</div>
@endsection

@section('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript">
	// Create a Stripe client.
var stripe = Stripe('pk_test_CzNyZfhQYlMI5xOsjxmO8wDR00NPtbaVf2');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    border:'solid',
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

// Create an instance of the card Element.
var card = elements.create('card', {style: style, hidePostalCode:true});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});


// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);
//alert(card);
  // Submit the form
  form.submit();
}
</script>
@endsection