<?php
namespace Manthan\Nuncio;

interface MessengerInterface {
  /**
   * Set Sender of the message
   * @param  string $sender the sender
   * @return Manthan\Nuncio\MessengerInterface
   */
  public function from($sender);

  /**
   * Set recepient of the message
   * @param  string $recepient the recepient
   * @return Manthan\Nuncio\MessengerInterface
   */
  public function to($recepient);

  /**
   * Notify recepient with subject and message
   * @param  string $subject subject of the message
   * @param  string $message body of the message
   * @return void
   */
  public function notify($subject, $message);

}


?>
