<?php
namespace Manthan\Nuncio;

class MessageProcessor {

  protected $message;
  protected $keywords_replacements = array();

  public function with($message, array $keywords_replacements)
  {
      $this->message = $message;
      $this->keywords_replacements = $keywords_replacements;
      return $this;
  }

  public function process()
  {
    foreach($this->keywords_replacements as $keyword => $replacement)
    {
      $pattern = $this->constructPattern($keyword);
      $this->message = preg_replace($pattern, $replacement, $this->message, -1, $count);
    }
    return $this->message;
  }

  private function constructPattern($keyword)
  {
      $pattern = '/{{'.$keyword.'}}/';
      return $pattern;
  }
}


 ?>
