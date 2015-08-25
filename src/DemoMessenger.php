<?php
namespace Manthan\Nuncio;

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
      echo $print . '<br/>';
  }

}

 ?>
