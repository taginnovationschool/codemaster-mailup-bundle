<?php
	
	namespace Codemaster\Bundle\MailupBundle\Webservice;
	use Psr\Log\LoggerInterface;

	class Rest
	{
		private $logger;

		public function __construct(LoggerInterface $logger)
		{
			$this->logger = $logger;
			

		}

		public function getInfo()
		{
			return [
				'class' => self::class,
				'version' => '1.0.0',
				'url' => 'mailup.com'
				];
		}

	}
?>