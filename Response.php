<?
	namespace VKBot;

	class Response {
		private $raw_input;

		public function __construct() {
			$this->raw_input = file_get_contents('php://input');
		}

		public function json($assoc = true) {
			return $this->raw_input;
		}

		public function decode($assoc = true) {
			return json_decode($this->raw_input, $assoc);
		}
	}