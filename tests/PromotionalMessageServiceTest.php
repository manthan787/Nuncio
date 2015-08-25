<?php

class PromotionalMessageServiceTest extends PHPUnit_Framework_TestCase {

  public function testIfProcessedMessagesWereSent()
  {
      $nuncio = new Manthan\Nuncio\PromotionalMessageService(new Manthan\Nuncio\DemoMessenger(), new Manthan\Nuncio\MessageProcessor());

      $user1 = new stdClass();
      $user1->name = "Manthan";
      $user1->age  = 21;
      $user1->phone_number = '7889909999';

      $user2 = new stdClass();
      $user2->name = "Jack";
      $user2->age  = 24;
      $user2->phone_number = '9877667766';

      $recepients = [$user1, $user2];
      $message = "Hello {{name}}, Your age is {{age}}.";
      $res = $nuncio->from('LM-NUNCIO')->to($recepients)->send('',$message);

      $this->assertTrue($res, 'All Messages Were Sent!');
  }

}


?>
