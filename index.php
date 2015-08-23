<?php
require 'vendor/autoload.php';
use Manthan\Nuncio\User;
use Manthan\Nuncio\DemoMessenger;
use Manthan\Nuncio\MessageProcessor;
use Manthan\Nuncio\PromotionalMessageService;

$user1 = new User('Manthan', 21, '7698716148');
$user2 = new User('Nisarg', 18,'8989898989');
$user3 = new User('Jaydip', 25,'9980898989');
$user4 = new User('Ganesh', 25,'9327869898');
$receps = [$user1, $user2, $user3, $user4];
$message = "Hello {{name}}, we have a new offer for you according to your age {{age}}";

$messenger = new DemoMessenger();
$processor = new MessageProcessor();

$promotional_messenger = new PromotionalMessageService($messenger, $processor);
$promotional_messenger->from('LM-AMEECC')->to($receps)->send($message);

?>
