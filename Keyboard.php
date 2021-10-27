<?
	class Keyboard {
		public $inline;
		public $rows;
		public $one_time;

		public function __construct($inline = false, $one_time = true) {
			$this->inline = $inline;
			$this->one_time = $one_time;
		}

		public function addButton($data) {
			$this->rows[$data['row']][] = [
				'action' => [
					'type' => $data['type'],
					'label' => $data['label'],
					'payload' => json_encode($data['payload'])
				],
				'color' => $data['color']
			];
		}

		public function getKeyboard() {
			return json_encode([
				'one_time' => $this->one_time,
				'inline' => $this->inline,
				'buttons' => $this->rows
			]);
		}
	}