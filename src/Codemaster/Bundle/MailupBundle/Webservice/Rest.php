<?php

namespace Codemaster\Bundle\MailupBundle\Webservice;
use Psr\Log\LoggerInterface;

class Rest
{
    private $client;
    private $session;
    private $logger;
    private $securityToken;

    public function __construct($client, $session, LoggerInterface $logger, $securityToken)
    {
        $this->client = $client;
        $this->session = $session;
        $this->logger = $logger;
        $this->securityToken = $securityToken;
    }

    public function getLists()
    {
        $response = $this->client->request(
            'GET',
            '/API/v1.1/Rest/ConsoleService.svc/Console/User/Lists',
            [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->session->get('mailup_token')->access_token,
                ]
            ]
        );

        $data = json_decode((string)$response->getBody());

        return $data->Items;
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
