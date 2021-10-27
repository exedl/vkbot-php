<?
	/*
	* Class to work with VK Bots / Chats
	*/

	class VKBot extends VKApi {
		private 	$api_secret;
		public 		$confirmation;
		private 	$directory;

		/*
		* setup - array of api_token, api_secret, confirmation, version (def = const DEF_VERSTION)
		*/
		public function __construct($setup) {
			$this->api_secret = $setup['api_secret'];
			$this->confirmation = $setup['confirmation'];

			define('API_SECRET', $this->api_secret); //to work with Actions
			define('API_CONFIRMATION', $this->confirmation); //same

			$this->directory = __DIR__;

			parent::__construct($setup['api_token']);

			$this->version = ($setup['version'] ? $setup['version'] : parent::DEF_VERSTION);

			$test = $this->call('users.get', [
				'user_ids' => 1
			]);

			if (!isset($test['response'][0])) {
				throw new \VKBot\Exception('Failed to connect to VK.com API');
			}
		}

		/*
		* Main function
		*/
		public function execute() {
			$response = new \VKBot\Response();
			$input = $response->decode();

			$actionClass = ucfirst($input['type']);
			$path = $this->directory . '/Actions/' . $actionClass . '.php';

			if (file_exists($path)) {
				require_once $path;

				$action = new $actionClass();
				if (!$action->main($this, $response)) {
					throw new \VKBot\Exception('Action error');
				}
			}
		}		
	}