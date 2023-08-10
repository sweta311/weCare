<?php
require('stripe-php-master/init.php');

$publishableKey="pk_test_51MfTqTSBLpCDKgG3FYP3ZMvCFJakFsaYdOpCIrFS6dI6SRktDqL8Y8ZyiORGwy37jfLAATyUevbznLTaPUob3AoI00DV6x6ym1";

$secretKey="sk_test_51MfTqTSBLpCDKgG3eRf1u9wzAcw3Mg2DbKUNFeUPf1hl5iVTRtNN7SLzJG0MADiFVXU9uJ5NWUhzkzJQqJznrhpW00nTsArQ3m";

\Stripe\Stripe::setApiKey($secretKey);
?>

