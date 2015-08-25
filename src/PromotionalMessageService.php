<?php
namespace Manthan\Nuncio;

/**
 * This is an example class that tells nuncio to detect {{name}} and {{age}} tags
 * and replace them with corresponding properties of the recepient object, before
 * actually sending the message to the recepient.
 *
 * It's this simple!
 *
 * By default Nuncio will look for the 'number' property in the recepient object.
 * But if you want to change that you can use $number_field property (shown below).
 *
 */

class PromotionalMessageService extends Nuncio
{

  protected $keywords = ['name', 'age'];

  protected $number_field = 'phone_number';
}

?>
