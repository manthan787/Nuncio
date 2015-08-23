<?php
namespace Manthan\Nuncio;

interface MessengerInterface {
  public function create($message);
  public function from($sender);
  public function to($recepient);
  public function send();

}


 ?>
