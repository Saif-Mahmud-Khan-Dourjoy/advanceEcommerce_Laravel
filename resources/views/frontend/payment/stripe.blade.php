
@extends('layouts.frontend-master')

@section('frontend_content')

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Stripe</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div>

<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			
			<div class="row">

				<div class="col-md-6">
					<!-- checkout-progress-sidebar -->
					<div class="checkout-progress-sidebar ">
						<div class="panel-group">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="unicase-checkout-title">Your Shopping Amount</h4>
								</div>
								<div class="">
									<ul class="nav nav-checkout-progress list-unstyled">

										@if(Session::has('coupon'))
										<li>
											<strong>SubTotal : </strong>
											{{$cartTotal}}

										</li>
										<li>
											<strong>Coupon Name : </strong>

											{{session()->get('coupon')['coupon_name']}}
										</li>
										<li>
											<strong>Coupon Discount  : </strong>

											{{session()->get('coupon')['discount_amount']}} ({{session()->get('coupon')['coupon_discount']}})
										</li>
										<li>
											<strong>Grand Total  : </strong>

											{{session()->get('coupon')['total_amount']}} 
										</li>
										@else

										<li>
											<strong>GrandTotal : </strong>
											{{$cartTotal}}
										</li>

										@endif
									</ul>		
								</div>
							</div>
						</div>
					</div> 
					<hr>
					<div>

					</div>					
				</div>
				<div class="col-md-12">
					<div class="container">
						<h1>Stripe Payment Page</h1>

						<div class="panel panel-default credit-card-box">
							<div class="panel-heading display-table" >
								<div class="row display-tr" >
									<h3 class="panel-title display-td" >Payment Details</h3>
									<div class="display-td" >                            
										
									</div>
								</div>
							</div>
							<div class="panel-body">
								@if (Session::has('success'))
								<div class="alert alert-success text-center">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
									<p>{{ Session::get('success') }}</p>
								</div>
								@endif
								<form
								role="form"
								action="{{ route('stripe.post') }}"
								method="post"
								class="require-validation"
								data-cc-on-file="false"
								data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
								id="payment-form">
								@csrf
								<div class='form-row row'>
									<div class=' form-group required'>
										<label class='control-label'>Name on Card</label> <input
										class='form-control' size='4' type='text'>
									</div>
								</div>
								<input type="hidden" name="email" value="{{$data['email']}}">
								<input type="hidden" name="name" value="{{$data['name']}}">
								<input type="hidden" name="phone" value="{{$data['phone']}}">
								@if($data['note']!=NULL)
								<input type="hidden" name="note" value="{{$data['note']}}">
								@else
								@endif
								<input type="hidden" name="division" value="{{$data['division']}}">
								<input type="hidden" name="district" value="{{$data['district']}}">
								<input type="hidden" name="state" value="{{$data['state']}}">
								<input type="hidden" name="postal_code" value="{{$data['postal_code']}}">
								<div class='form-row row'>
									<div class=' form-group card required'>
										<label class='control-label'>Card Number</label> <input
										autocomplete='off' class='form-control card-number' size='20'
										type='text'>
									</div>
								</div>
								<div class='form-row row'>
									<div class=' col-md-4 form-group cvc required'>
										<label class='control-label'>CVC</label> <input autocomplete='off'
										class='form-control card-cvc' placeholder='ex. 311' size='4'
										type='text'>
									</div>
									<div class=' col-md-4 form-group expiration required'>
										<label class='control-label'>Expiration Month</label> <input
										class='form-control card-expiry-month' placeholder='MM' size='2'
										type='text'>
									</div>
									<div class=' col-md-4 form-group expiration required'>
										<label class='control-label'>Expiration Year</label> <input
										class='form-control card-expiry-year' placeholder='YYYY' size='4'
										type='text'>
									</div>
								</div>
								<div class='form-row row'>
									<div class='col-md-12 error form-group hide'>
										<div class='alert-danger alert'>Please correct the errors and try
											again.
										</div>
									</div>
								</div>
								<div class="row">
									<div class="">
										<button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>

			</div>
		</div><!-- /.row -->

	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
      $(function() {
    var $form = $(".require-validation");
    $('form.require-validation').bind('submit', function(e) {
        var $form = $(".require-validation"),
            inputSelector = ['input[type=email]', 'input[type=password]',
                'input[type=text]', 'input[type=file]',
                'textarea'
            ].join(', '),
            $inputs = $form.find('.required').find(inputSelector),
            $errorMessage = $form.find('div.error'),
            valid = true;
        $errorMessage.addClass('hide');
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
            var $input = $(el);
            if ($input.val() === '') {
                $input.parent().addClass('has-error');
                $errorMessage.removeClass('hide');
                e.preventDefault();
            }
        });
        if (!$form.data('cc-on-file')) {
            e.preventDefault();
            Stripe.setPublishableKey($form.data('stripe-publishable-key'));
            Stripe.createToken({
                number: $('.card-number').val(),
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
            }, stripeResponseHandler);
        }
    });
    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
});
   </script>


	@endsection