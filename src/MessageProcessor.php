<?php
namespace Manthan\Nuncio;

class MessageProcessor {
  /**
   * Message to be processed
   * @var string
   */
  protected $message;

  /**
   * Key value pair of keywords and their corresponding replacements
   * @var array
   */
  protected $keywords_replacements = array();

  /**
   * set message and keywords_replacements properties
   * @param  string $message
   * @param  array  $keywords_replacements
   * @return Manthan\Nuncio\MessageProcessor
   */
  public function with($message, array $keywords_replacements)
  {
      $this->message = $message;
      $this->keywords_replacements = $keywords_replacements;
      return $this;
  }

  /**
   * Process the message
   * @return string returns the processed version of the message
   */
  public function process()
  {
    foreach($this->keywords_replacements as $keyword => $replacement)
    {
      $pattern = $this->constructPattern($keyword);
      $this->message = preg_replace($pattern, $replacement, $this->message, -1, $count);
    }
    return $this->message;
  }

  /**
   * Constructs pattern to be recognized in the message using the keyword
   * @param  string $keyword
   * @return string returns regex of the pattern
   */
  private function constructPattern($keyword)
  {
      $pattern = '/{{'.$keyword.'}}/';
      return $pattern;
  }
}


 ?>
