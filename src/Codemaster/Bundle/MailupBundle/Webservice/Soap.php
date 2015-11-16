<?php
	
	namespace Codemaster\Bundle\MailupBundle\Webservice;

	class Soap
	{
		public function getInfo()
		{
			return [
				'class' => self::class,
				'version' => '2.0.0',
				'url' => 'mailup.com'];
		}
	}
?>