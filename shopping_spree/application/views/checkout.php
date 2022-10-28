<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Implement Stripe Payment Gateway in Codeigniter</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"
		rel="stylesheet" />
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<?php if($this->session->flashdata('success')){ ?>
						<div class="alert alert-success text-center">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
							<p><?php echo $this->session->flashdata('success'); ?></p>
						</div>
						<?php } ?>
						<form role="form" action="<?php echo base_url('handleStripePayment');?>" method="post"
							class="form-validation" data-cc-on-file="false"
							data-stripe-publishable-key="<?php echo $this->config->item('stripe_key') ?>"
							id="payment-form">
							<div class='form-row row'>
								<div class='col-xs-12 form-group required'>
									<label class='control-label'>Name on Card</label>
									<input class='form-control' size='4' type='text'>
								</div>
							</div>
							<div class='form-row row'>
								<div class='col-xs-12 form-group card required'>
									<label class='control-label'>Card Number</label>
									<input autocomplete='off' class='form-control card-number' size='20' type='text'>
								</div>
							</div>
							<div class='form-row row'>
								<div class='col-xs-12 col-md-4 form-group cvc required'>
									<label class='control-label'>CVC</label>
									<input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311'
										size='4' type='text'>
								</div>
								<div class='col-xs-12 col-md-4 form-group expiration required'>
									<label class='control-label'>Expiration Month</label>
									<input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
								</div>
								<div class='col-xs-12 col-md-4 form-group expiration required'>
									<label class='control-label'>Expiration Year</label>
									<input class='form-control card-expiry-year' placeholder='YYYY' size='4'
										type='text'>
								</div>
							</div>
							<div class='form-row row'>
								<div class='col-md-12 error form-group hide'>
									<div class='alert-danger alert'>Error occured while making the payment.</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<button class="btn btn-danger btn-lg btn-block" type="submit">Pay ($100)</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
	$(function () {
		var $stripeForm = $(".form-validation");
		$('form.form-validation').bind('submit', function (e) {
			var $stripeForm = $(".form-validation"),
				inputSelector = ['input[type=email]', 'input[type=password]',
					'input[type=text]', 'input[type=file]',
					'textarea'
				].join(', '),
				$inputs = $stripeForm.find('.required').find(inputSelector),
				$errorMessage = $stripeForm.find('div.error'),
				valid = true;
			$errorMessage.addClass('hide');
			$('.has-error').removeClass('has-error');
			$inputs.each(function (i, el) {
				var $input = $(el);
				if ($input.val() === '') {
					$input.parent().addClass('has-error');
					$errorMessage.removeClass('hide');
					e.preventDefault();
				}
			});
			if (!$stripeForm.data('cc-on-file')) {
				e.preventDefault();
				Stripe.setPublishableKey($stripeForm.data('stripe-publishable-key'));
				Stripe.createToken({
					number: $('.card-number').val(),
					cvc: $('.card-cvc').val(),
					exp_month: $('.card-expiry-month').val(),
					exp_year: $('.card-expiry-year').val()
				}, stripeResponseHandler);
			}
		});
		function stripeResponseHandler(status, res) {
			if (res.error) {
				$('.error')
					.removeClass('hide')
					.find('.alert')
					.text(res.error.message);
			} else {
				var token = res['id'];
				$stripeForm.find('input[type=text]').empty();
				$stripeForm.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
				$stripeForm.get(0).submit();
			}
		}
	});
</script>
</html>