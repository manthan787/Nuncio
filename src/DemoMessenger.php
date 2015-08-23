<?php
namespace Manthan\Nuncio;

class DemoMessenger implements MessengerInterface {

  protected $message;
  protected $sender;
  protected $recepient;

  public function create($message)
  {
    $this->message = $message;
    return $this;
  }

  public function from($sender)
  {
    $this->sender = $sender;
    return $this;
  }

  public function to($recepient)
  {
    $this->recepient = $recepient;
    return $this;
  }

  public function send()
  {
      $print = sprintf("Sender : %s, Receiver: %s, Message: %s", $this->sender, $this->recepient, $this->message);
      echo $print . '<br/>';
  }

}

 ?>
