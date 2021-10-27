<?
	class Message_new extends \VKBot\Action {
		public function main($bot, $response) {
			$resp = $response->decode();
			$peer_id = $resp['object']['message']['peer_id'];
			$payload = json_decode($resp['object']['message']['payload'], true);
				
			$message = mb_strtolower($resp['object']['message']['text']);
			$message = preg_replace('/(\[.*?\])/', '', $message);
			$message = trim($message);

			if (!isset($payload['command'])) {
				$payload['command'] = '';
			}

			$message = new Message();
			$message->setPeer($peer_id);

			switch ($payload['command']) {
				case 'start':
					$message->setMessageBody('Hi');
					$keyboard = new Keyboard();

					$keyboard->addButton([
						'row' => 0,
						'type' => 'text',
						'label' => 'Hi',
						'payload' => ['command' => 'start'],
						'color' => 'positive'
					]);

					$message->addKeyboard($keyboard);

					break;
			}

			$message->send($bot);

			parent::ok();

			return true;
		}
	}