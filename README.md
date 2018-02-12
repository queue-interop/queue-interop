# Queue Interoperability

[![Latest Stable Version](https://poser.pugx.org/queue-interop/queue-interop/v/stable.png)](https://packagist.org/packages/queue-interop/queue-interop)
[![Monthly Downloads](https://poser.pugx.org/queue-interop/queue-interop/d/monthly)](https://packagist.org/packages/queue-interop/queue-interop)
[![Total Downloads](https://poser.pugx.org/queue-interop/queue-interop/d/total.png)](https://packagist.org/packages/queue-interop/queue-interop)
[![License](https://poser.pugx.org/queue-interop/queue-interop/license)](https://packagist.org/packages/queue-interop/queue-interop)

## About 

*queue-interop* tries to identify and standardize a common way for PHP programs to create, send, receive and read MQ messages to achieve interoperability.

Through discussions and trials, we try to create a standard, made of common interfaces but also recommendations.

If PHP projects that provide queue implementations begin to adopt these common standards, then PHP
applications and projects that use MQs can depend on the common interfaces instead of specific
implementations. This facilitates a high-level of interoperability and flexibility that allows users to consume
*any* MQ transport implementation that can be adapted to these interfaces.

The work done in this project is not officially endorsed by the [PHP-FIG](http://www.php-fig.org/). We adhere to the spirit and ideals of PHP-FIG, and hope
this project will pave the way for one or more future PSRs.

## Installation

You can install this package through Composer:

```bash
composer require queue-interop/queue-interop
```

## Examples

Send a message:

```php
<?php

$factory = new AcmeConnectionFactory('acme://');

$context = $factory->createContext();

$context->createProducer()->send(
    $context->createQueue('aQueue'), 
    $context->createMessage('aBody')
);
```

Consume a message:

```php
<?php

$factory = new AcmeConnectionFactory('acme://');

$context = $factory->createContext();
$consumer = $consumer->createConsumer($context->createQueue('aQueue));

if ($message = $consumer->receiveNoWait()) {
    $consumer->acknowledge($message);

    // reject on fail
    // $consumer->reject($message);
}

// or 

$timeout = 5000; // 5sec
if ($message = $consumer->receive($timeout)) {
    $consumer->acknowledge($message);
}
```

Find out more here:

* [Enqueue transport docs](https://github.com/php-enqueue/enqueue-dev/tree/master/docs/transport) contains a lot how to use example.
* [Formapro's Blog](https://blog.forma-pro.com) contains varitety blog post about Queue Interop useage. 
* [RabbitMQ's official tutorials](https://github.com/rabbitmq/rabbitmq-tutorials/tree/master/php-interop) ported to AMQP Interop.



## Compatible projects

### Projects

* [Enqueue](https://github.com/php-enqueue/enqueue-dev)
* [Swarrot](https://github.com/swarrot/swarrot)
* [Bernard](https://github.com/bernardphp/bernard)
* [vladimir-yuldashev/laravel-queue-rabbitmq](https://packagist.org/packages/vladimir-yuldashev/laravel-queue-rabbitmq)
* [sonata-project/notification-bundle](https://github.com/sonata-project/SonataNotificationBundle)
* [yiisoft/yii2-queue](https://github.com/yiisoft/yii2-queue)

### Implementations

* [enqueue/amqp-ext](https://github.com/php-enqueue/enqueue-dev/tree/master/docs/transport/amqp.md)
* [enqueue/amqp-lib](https://github.com/php-enqueue/enqueue-dev/tree/master/docs/transport/amqp_lib.md)
* [enqueue/amqp-bunny](https://github.com/php-enqueue/enqueue-dev/tree/master/docs/transport/amqp_bunny.md)
* [enqueue/pheanstalk](https://github.com/php-enqueue/enqueue-dev/tree/master/docs/transport/pheanstalk.md)
* [enqueue/stomp](https://github.com/php-enqueue/enqueue-dev/tree/master/docs/transport/stomp.md)
* Amazon SQS [enqueue/sqs](https://github.com/php-enqueue/enqueue-dev/tree/master/docs/transport/sqs.md)
* Google PubSub [enqueue/gps](https://github.com/php-enqueue/enqueue-dev/tree/master/docs/transport/gps.md)
* [enqueue/rdkafka](https://github.com/php-enqueue/enqueue-dev/tree/master/docs/transport/kafka.md)
* [enqueue/redis](https://github.com/php-enqueue/enqueue-dev/tree/master/docs/transport/redis.md)
* [enqueue/gearman](https://github.com/php-enqueue/enqueue-dev/tree/master/docs/transport/gearman.md)
* [enqueue/dbal](https://github.com/php-enqueue/enqueue-dev/tree/master/docs/transport/dbal.md)
* [enqueue/fs](https://github.com/php-enqueue/enqueue-dev/tree/master/docs/transport/filesystem.md)
* [enqueue/null](https://github.com/php-enqueue/enqueue-dev/tree/master/docs/transport/null.md)

## Amqp interop

There is [AMQP interop](https://packagist.org/packages/queue-interop/amqp-interop) built on top of queue interop. It is completly compatible with queue interop and only adds some AMQP specific features. 

### Installation

```bash
composer require queue-interop/amqp-interop
```

### Compatible projects

* [enqueue/amqp-ext](https://github.com/php-enqueue/enqueue-dev/blob/master/docs/transport/amqp.md)
* [enqueue/amqp-lib](https://github.com/php-enqueue/enqueue-dev/blob/master/docs/transport/amqp_lib.md)
* [enqueue/amqp-bunny](https://github.com/php-enqueue/enqueue-dev/blob/master/docs/transport/amqp_bunny.md)

## Workflow

Everyone is welcome to join and contribute.

The general workflow looks like this:

1. Someone opens a discussion (GitHub issue) to suggest an interface
1. Feedback is gathered
1. The interface is added to a development branch
1. We release alpha versions so that the interface can be experimented with
1. Discussions and edits ensue until the interface is deemed stable by a general consensus
1. A new minor version of the package is released

We try to not break BC by creating new interfaces instead of editing existing ones.

While we currently work on interfaces, we are open to anything that might help towards interoperability, may that
be code, best practices, etc.

## License 

[MIT license](LICENSE)
