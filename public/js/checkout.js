Stripe.setPublishableKey('pk_test_CzNyZfhQYlMI5xOsjxmO8wDR00NPtbaVf2');
var $form = $('#checkout-form');

$form.submit(function(event){
	$('#charge-error').addClass('hidden');
	$form.find('button').prop('disabled',true);
	
})