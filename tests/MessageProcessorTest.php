<?php

class MessageProcessorTest extends PHPUnit_Framework_TestCase {

  public function testReturnsProcessedMessage()
  {

      $processor = new Manthan\Nuncio\MessageProcessor();

      $message_no_space         = 'Hello {{name}}';
      $message_with_space       = 'Hello {{ name }}';
      $message_multiple_spaces  = 'Hello {{  name  }}';

      $keywords_replacements = array('name' => 'Manthan');

      $processed_message = $processor->with($message_no_space, $keywords_replacements)->process();
      $this->assertTrue('Hello Manthan'=== $processed_message, "Processor returns processed message.");

      $processed_message = $processor->with($message_with_space, $keywords_replacements)->process();
      $this->assertTrue('Hello Manthan'=== $processed_message, "Processor returns processed message.");

      $processed_message = $processor->with($message_multiple_spaces, $keywords_replacements)->process();
      $this->assertTrue('Hello Manthan'=== $processed_message, "Processor returns processed message.");
  }

}

?>
