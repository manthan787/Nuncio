<?php
namespace Manthan\Nuncio;

abstract class Nuncio
{

  /**
   * Messenger Used for sending messages
   * @var Manthan\Nuncio\MessengerInterface
   */
  protected $messenger;
  /**
   * Processes the messages
   * @var Manthan\Nuncio\MessageProcessor
   */
  protected $processor;
  /**
   * Sender of the message
   * @var string
   */
  protected $sender;

  /**
   * Recepients of the processed message
   * @var array
   */
  protected $recepients = array();

  /**
   * Keywords used in the message template
   * @var array
   */
  protected $keywords = array();

  /**
   * The property to look for in the recepient object to send messages to
   * @var string
   */
  protected $number_field = 'number';

  public function __construct(MessengerInterface $messenger, MessageProcessor $processor)
  {
    $this->messenger = $messenger;
    $this->processor = $processor;
  }

  /**
   * Sender of the message
   * @param  string $sender the sender
   * @return Manthan\Nuncio\Nuncio
   */
  public function from($sender)
  {
    $this->sender = $sender;
    return $this;
  }

  /**
   * Recepients of the message
   * @param  array  $recepients the recepients
   * @return Manthan\Nuncio\Nuncio
   */
  public function to(array $recepients)
  {
    $this->recepients = $recepients;
    return $this;
  }

  /**
   * Send message to the recepients after processing tags
   * @param  string $subject Subject
   * @param  string $message Message
   * @return boolean
   */
  public function send($subject, $message)
  {

    foreach($this->recepients as $recepient)
    {
        $replacements = $this->constructReplacementsArray($recepient);
        $processed_message = $this->processor->with($message, $replacements)->process();
        $processed_number = $this->addCountryCode($recepient->{$this->number_field});
        $this->messenger->from($this->sender)
                        ->to($processed_number)
                        ->notify($subject, $processed_message);
    }
    return true;
  }

  /**
   * Constructs Keyword Replacement key-value pair using keywords for processing of the message
   * @param  string $recepient
   * @return array
   */
  protected function constructReplacementsArray($recepient)
  {
      $keywords_replacements = array();
      foreach($this->keywords as $keyword)
      {
        $keywords_replacements[$keyword] = $recepient->{$keyword};
      }
      return $keywords_replacements;
  }

  private function addCountryCode($number)
  {
      $number_length = strlen($number);
      if($number_length === 10)
      {
        return "+91".$number;
      }

      return $number;
  }


}




?>
