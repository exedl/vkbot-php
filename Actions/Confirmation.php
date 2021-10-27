<?
	class Confirmation extends \VKBot\Action {
		public function main($bot, $response) {
			$this->returnRaw($bot->confirmation);

			return true;
		}
	}