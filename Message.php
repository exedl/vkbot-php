<?
	class Message {
		private $is_chat = false;

		private $peer_id;
		private $message;
		private $attachment;
		private $keyboard;

		public function setPeer($peer_id) {
			$this->peer_id = $peer_id;
		}

		public function setMessageBody($message) {
			$this->message = $message;
		}

		public function addAttachment($attachment) {
			$this->attachment = $attachment;
		}

		public function addKeyboard($keyboard) {
			$this->keyboard = $keyboard->getKeyboard();
		}

		public function send($bot) {
			$bot->call('messages.send', [
				'random_id' => 0, //temp
				'peer_id' => $this->peer_id,
				'message' => $this->message,
				'attachment' => $this->attachment,
				'keyboard' => $this->keyboard
			]);
		}
	}