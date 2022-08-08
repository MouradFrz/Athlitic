<?php

    require __DIR__ . '/../../../vendor/autoload.php';

\Stripe\Stripe::setApiKey('sk_test_51LU9ndGcVPeoVn6lif45viraB7PDbHvdrzZQz8FSHh2SHSeKOcCFEc5YlYS7XHLBaUc6X9DX0J3UDdOakHKHstIX00CO4qOYaa');



    $checkout_session = \Stripe\Checkout\Session::create([
    'line_items' => [
        [
            # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
            'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                    'name' => 'Your order',
                ],
                'unit_amount' => (int)\Gloudemans\Shoppingcart\Facades\Cart::subtotal()*100,
            ],
            'quantity' => 1,
        ],
    ],
    'mode' => 'payment',
    'success_url' => 'https://example.com/success.html',
    'cancel_url' => 'https://example.com/cancel.html',
]);






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Redirect</title>
</head>
<body>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe(
            'pk_test_51LU9ndGcVPeoVn6lCKA7k8J0PLHzIwbfa3bHCUP0VZDvNfxEhuI2tj26YDn0KphkFYIREhNJRoSDNQKdPFiuGw0H00HUQ8q4vG'
            )

            stripe.redirectToCheckout({
                sessionId :"<?php echo $checkout_session->id?>"
            })

    </script>
   
</body>
</html>