<?php

class MessageProcessorTest extends PHPUnit_Framework_TestCase {

  public function testReturnsProcessedMessage()
  {

      $processor = new Manthan\Nuncio\MessageProcessor();
      $message = 'Hello {{name}}';
      $keywords_replacements = array('name' => 'Manthan');

      $processed_message = $processor->with($message, $keywords_replacements)->process();

      $this->assertTrue('Hello Manthan'=== $processed_message, "Processor returns processed message.");
  }

}

?>
