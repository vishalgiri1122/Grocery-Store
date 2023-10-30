<!DOCTYPE html>

<html>

<head>
<meta charset="UTF-8">
  <meta name="description" content="Description of your web page">
  <meta name="keywords" content="keywords, separated, by, commas">
  <meta name="author" content="Your Name">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Stripe Payment Gateway </title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
    body,html{
        height: 100%;
    }
    /*body{*/
    /*    background: #f2f2f2;*/
    /*    position: absolute;*/
    /*      top: 50%;*/
    /*      left: 50%;*/
    /*      transform: translate(-50%,-50%);*/
    /*}*/
        body{
            /*height: 100%;*/
            display: flex;
            align-items: center;
            justify-content: center;
        }
        body{
            background: #f2f2f2;
        }
        .mt-4{
            margin-top: 30px;
        }
        .btn-block,.btn-block:hover{
            width: auto !important;   
            background: #26B99E !important;
            border-color: #26B99E !important;
        }
        .panel-default > .panel-heading {
          color: #fff;
          background-color: #26B99E;
          border-color: #26B99E;
        }
        @media(max-width: 992px){
            body,html{
                height: auto;
            }
            body {
                /*height: auto;*/
                background: transparent;
                overflow-x: hidden;
                /*position: unset !important;*/
                /*transform: none !important;*/
                }
            .container{
                padding: 0;
            }
            /*.h100vh{*/
            /*    height: auto;*/
            /*}*/
        }
    </style>
</head>

<body>



<div class="container mt-4">


    <div class="row h100vh">

        <div class="col-md-12">

            <div class="panel panel-default credit-card-box">

                <div class="panel-heading display-table" >

                        <h3 class="panel-title" >Stripe Payment Details</h3>

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

                            <!--<div class='col-xs-12 form-group required'>-->

                            <!--    <label class='control-label'>Email</label> <input-->

                            <!--        class='form-control' type='email'>-->

                            <!--</div>-->
                            <!--<div class='col-xs-12 form-group required'>-->

                            <!--    <label class='control-label'>Name</label> <input-->

                            <!--        class='form-control' size='4' type='text'>-->

                            <!--</div>-->
                            <div class='col-xs-12 form-group required'>

                                <label class='control-label'>Fist Name</label> <input

                                    class='form-control' type='text'>

                            </div>
                            <div class='col-xs-12 form-group required'>

                                <label class='control-label'>Last Name</label> <input

                                    class='form-control' type='text'>

                            </div>
                            <!--<div class='col-xs-12 form-group required'>-->

                            <!--    <label class='control-label'> Country / Region </label> <input-->

                            <!--        class='form-control' type='text'>-->

                            <!--</div>-->

                        </div>



                        <div class='form-row row'>

                            <div class='col-xs-12 form-group card required'>

                                <label class='control-label'>Card Number</label> <input

                                    autocomplete='off' class='form-control card-number' size='20'

                                    type='text'>

                            </div>

                        </div>



                        <div class='form-row row'>

                            <div class='col-xs-12 col-md-4 form-group cvc required'>

                                <label class='control-label'>CVC</label> <input autocomplete='off'

                                    class='form-control card-cvc' placeholder='ex. 311' size='4'

                                    type='text'>

                            </div>

                            <div class='col-xs-12 col-md-4 form-group expiration required'>

                                <label class='control-label'>Expiration Month</label> <input

                                    class='form-control card-expiry-month' placeholder='MM' size='2'

                                    type='text'>

                            </div>

                            <div class='col-xs-12 col-md-4 form-group expiration required'>

                                <label class='control-label'>Expiration Year</label> <input

                                    class='form-control card-expiry-year' placeholder='YYYY' size='4'

                                    type='text'>

                            </div>

                        </div>



                        <div class='form-row row'>

                            <div class='col-md-12 error form-group hide'>

                                <div class='alert-danger alert'>Please correct the errors and try

                                    again.</div>

                            </div>

                        </div>



                        <div class="row">

                            <div class="col-xs-12" style="display: flex; justify-content: center;">
                                @php
                                $total = 0;
                                @endphp
                                @foreach ($carts as $cart)
                                @php
                                    $total = $total + ($cart->qty * $cart->product->price);
                                @endphp
                                @endforeach
                                {{-- <input type="hidden" name="totalPrice" value="{{ $total }}"> --}}
                                {{-- customer info --}}
                                <input type="hidden" name="country" value="{{ $country }}">
                                <input type="hidden" name="username" value="{{ $username }}">
                                <input type="hidden" name="address" value="{{ $address }}">
                                <input type="hidden" name="apartment" value="{{ $apartment }}">
                                <input type="hidden" name="state" value="{{ $state }}">
                                <input type="hidden" name="postal_code" value="{{ $postal_code }}">
                                <input type="hidden" name="email" value="{{ $email }}">
                                <input type="hidden" name="phone" value="{{ $phone }}">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now ${{ $total }}</button>

                            </div>

                        </div>



                    </form>

                </div>

            </div>

        </div>

    </div>



</div>



</body>



<script type="text/javascript" src="https://js.stripe.com/v2/"></script>



<script type="text/javascript">



$(function() {



    /*------------------------------------------

    --------------------------------------------

    Stripe Payment Code

    --------------------------------------------

    --------------------------------------------*/



    var $form = $(".require-validation");



    $('form.require-validation').bind('submit', function(e) {

        var $form = $(".require-validation"),

        inputSelector = ['input[type=email]', 'input[type=password]',

                         'input[type=text]', 'input[type=file]',

                         'textarea'].join(', '),

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



    /*------------------------------------------

    --------------------------------------------

    Stripe Response Handler

    --------------------------------------------

    --------------------------------------------*/

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

</html>
