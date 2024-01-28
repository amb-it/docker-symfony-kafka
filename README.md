# Symfony with Kafka (producer and consumer) in Docker

To launch project:
```
make up
```

after all Docker containers are up install Symfony dependencies with Composer:
```
cd ../src && composer install
```

or if you do not have local Composer, enter to php-fpm container :
```
make enter-php-container
```
and inside it enter: ``` composer install ```

## Send message
To send (produce) message to Kafka to topic **first_topic**:
1) enter PHP container
2) ```bin/console app:send-message-to-kafka some-text```

## Receive message
To get (consume) message from Kafka from topic **first_topic**:
1) enter PHP container
2) ```bin/console messenger:consume kafka```
3) check logs (_src/var/log/dev.log_) to see if message was consumed