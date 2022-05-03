<?php

$amount = 6 * 100;
$product = 'Camisa(s)';
$quantity = 2;

require_once('vendor/autoload.php');
\Stripe\Stripe::setApiKey('sk_test_51KtGFRDWCL1HiK9UjRz8ReoQvsc21Ylq7xLMfTvKE323rYVC6XGH1vDTdJGb5sUCltuAV3D7uC5G94cQHTUVCUwt00cA83UJxg');

$session = \Stripe\Checkout\Session::create([
   'payment_method_types' => ['card'],
   'line_items' => [[
     'price_data' => [
       'currency' => 'brl',
       'product_data' => [
         'name' => $product,
       ],
       'unit_amount' => $amount,
     ],
     'quantity' => $quantity, 
   ]],
   'mode' => 'payment',
   'success_url' => 'http://localhost/dao',
   'cancel_url' => 'http://example.com/cancel',
]);

?>

<html>
  
  <head>
  	 <title>Buy new products!</title>
  	 <script scr="https://js.stripe.com/v3/"></script>
  </head>

  <body>
  	  
  	  <script>
  	  	    var stripe = Stripe('pk_test_51KtGFRDWCL1HiK9UwYcH9PlAYKGEw5S8bnQx9wjRGgCpsoUds5xIxu2Y0VEv1XHml4TSuK7k8UbPCgIUnmn8bvFH00qB4rQznf');
  	  	    //var btn = document.getElementById('checkout-button');
  	  	    //btn.addEventListener('click', function(e) {
            //      e.preventDefault();
                  //stripe.redirectToCheckout({
                 // 	 sessionId: '<?php echo $session->id ?>'
                  // window.location='<?php echo $session->url ?>'
              //     window.location.href = 'http://www.devmedia.com.br'
                  //alert('teste');
            //      });
           // });

          function myFunction() {
                      window.location = '<?php echo $session->url ?>';
           }

      </script>

      <!--<button id="checkout-button">Checkout</button>-->
      <br><br>
        <h2>Click no botao abaixo para fazer o Checkout.</h2>
      <br>   
        <button onclick="myFunction()">Checkout</button> 

  </body>

</html>