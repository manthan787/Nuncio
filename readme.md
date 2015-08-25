## Nuncio

Nuncio is a flexible and customizable messenger that helps you turn your SMS/Email into mustache-style templates.

### Installing

You can install Nuncio using Composer.

    {
       "require": {
          "manthan/nuncio": "1.*"
       }
    }



### Basic Usage

Using Nuncio is as simple as extending Manthan\Nuncio\Nuncio and specifying Keywords that you'd want in your message templates to be replaced.

For example, you'd like to notify your users via SMS using following template in your dashboard:

    Hello {{name}}, Your fees ${{fees}} are pending.

To process this message this what you'd do:

    use Manthan\Nuncio\Nuncio

    // Create a new notifier by extending Nuncio

    class SMSNotifier extends Nuncio
    {
      protected $keywords = array('name', 'fees');
    }

Looks very simple, right?

Now to use this newly created notifier do the following:

    // Usage
    $SMS_Service = new TwilioService() // This must implement Manthan\Nuncio\MessengerInterface

    $processor = new Manthan\Nuncio\MessageProcessor();
    $notifier = new SMSNotifier($SMS_Service, $processor);

    $user = new stdClass();
    $user->name   = "Manthan";
    $user->fees   = "1500";
    $user->number = "78787878";

    $recepients = [$user];
    $notifier->from('YOUR-NUMBER')->to($recepients)->send($subject, $message);


The code above, sends following message to the number 78787878:

    Hello Manthan, your fees $1500 are pending.



Nuncio is super flexible. As shown above, you can use any of your Message Service Implementations (may it be Twilio, Plivo or Email Notifiers) to send your processed messages.

### Changing the number field

As you can see in the above example, Nuncio by default looks for the property 'number' on each of the recepients and sends message to that number.

But it is highly probable that you're not using number property in your User objects. In which case, you can change the default number field like so:

    use Manthan\Nuncio\Nuncio

    // Create a new notifier by extending Nuncio

    class SMSNotifier extends Nuncio
    {

      protected $keywords = array('name', 'fees');

      // Suppose your user's phone number is denoted by its phone_number property
      protected $number_field = 'phone_number';
    }

### Running Tests

You can run the tests using :

    ./vendor/bin/phpunit
