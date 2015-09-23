<?php
namespace Manthan\Nuncio;
/**
 * This class exemplifies the implementation of MessengerInterface.
 *
 * While using Nuncio in your application, You are supposed to write your own class
 * that adheres to MessengerInterface.
 *
 * This gives you the flexibility to use any messaging Service(Twilio, Plivo, or even php's mail() function)
 * that you may prefer, while still being able to use this package.
 *
 */
class DemoMessenger implements MessengerInterface {

  /**
   * Sender of the message
   * @var String
   */
  protected $sender;
  /**
   * recepient of the message
   * @var String
   */
  protected $recepient;


  /**
   * Set sender
   * @param  String $sender
   * @return DemoMessenger
   */
  public function from($sender)
  {
    $this->sender = $sender;
    return $this;
  }
  /**
   * Set Recepient
   * @param  String $recepient
   * @return DemoMessenger
   */
  public function to($recepient)
  {
    $this->recepient = $recepient;
    return $this;
  }
  /**
   * Send message
   * @return void
   */
  public function notify($subject, $message)
  {
      if(!$this->sender || !$this->recepient)
      {
        throw new \Exception("Invalid Recepient Phone Number");
      }
      $print = sprintf("Sender : %s, Receiver: %s, Message: %s", $this->sender, $this->recepient, $message);
      echo $print . '\n';
  }

}

 ?>
