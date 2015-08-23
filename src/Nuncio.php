<?php
namespace Manthan\Nuncio;

abstract class Nuncio
{
  protected $messenger;
  protected $processor;
  protected $sender;
  protected $keywords;
  protected $recepients = array();

  public function __construct(MessengerInterface $messenger, MessageProcessor $processor)
  {
    $this->messenger = $messenger;
    $this->processor = $processor;
  }

  public function from($sender)
  {
    $this->sender = $sender;
    return $this;
  }

  public function to(array $recepients)
  {
    $this->recepients = $recepients;
    return $this;
  }

  public function send($message)
  {

    foreach($this->recepients as $recepient)
    {
        $replacements = $this->constructKeywordReplacementsArray($recepient);
        $processed_message = $this->processor->with($message, $replacements)->process();
        $this->messenger->create($processed_message)->from($this->sender)->to($recepient->number)->send();
    }

  }

  protected function constructKeywordReplacementsArray($recepient)
  {
      $keywords_replacements = array();
      foreach($this->keywords as $keyword)
      {
        $keywords_replacements[$keyword] = $recepient->{$keyword};
      }
      return $keywords_replacements;
  }


}




?>
