# vkbot-php

## Launch (ex. ```callback.php```)
```
require 'autoload.php';

$VKBot = new VKBot([
  'api_secret' => 'app_api_secret_token',
  'confirmation' => 'app_api_confirmation_token',
  'api_token' => 'app_api_token'
]);

$VKBot->execute();
```
***

### Action ```message_new``` extends ```\VKBot\Action```
Controller location ```/Actions/Message_new.php```<br>
Triggers on New Message (```callback -> VKBot -> \VKBot\Action```)
***

### Send message
```
$message = new Message();
$message->setPeer($peer_id); //vk_user_id

$message->send($bot); //VKApi instance
```
