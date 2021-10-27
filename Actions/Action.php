<?
	namespace VKBot;

	class Action {
		public function returnRaw($data) {
			echo $data;
		}

		public function returnJson($data) {
			echo json_encode($data);
		}

		public function ok() {
			$this->returnRaw('ok');
		}
	}