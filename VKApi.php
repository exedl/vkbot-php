<?
	/*
	* Class to work with VK API
	*/

	class VKApi {
		const END_POINT = 'https://api.vk.com/method/';
		const DEF_VERSTION = '5.130';

		private $api_token;

		public function __construct($api_token) {
			$this->api_token = $api_token;
		}

		/*
		* API VK Method call
		*/
		public function call($method, $params) {
			$params['v'] = $this->version;
			$params['access_token'] = $this->api_token;

			return json_decode(
				$this->request(self::END_POINT . $method, $params), true
			);
		}

		/*
		* Http request (file_get_contents)
		*/
		private function request($url, $params, $method = 'GET') {
			if ($method == 'GET') {
				$url .= '?' . http_build_query($params);
				$context = stream_context_create([]);
			} else if ($method == 'POST') {
				$context = stream_context_create([
			        'http' => [
			            'method' => 'POST',
			            'header' => 'Content-Type: application/x-www-form-urlencoded' . PHP_EOL,
			            'content' => http_build_query($params),
			        ],
			    ]);
			}

			$response = file_get_contents($url, false, $context);
			return $response;
		}
	}