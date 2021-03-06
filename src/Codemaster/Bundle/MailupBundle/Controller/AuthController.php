<?php

namespace Codemaster\Bundle\MailupBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AuthController extends Controller
{
    public function loginAction(Request $request)
    {
        $logOnEndpoint = "https://services.mailup.com/Authorization/OAuth/LogOn?";

        $tokenEndpoint = "https://services.mailup.com/Authorization/OAuth/Token?";

        $logOnParams = array(
            'client_id' => 'bc5bf13c-7938-4c83-8c43-2d19a1f021fa',
            'response_type' => 'code',
            'redirect_uri' => $this->generateUrl('mailup_login', array(), true),
        );

        if ($request->get('token_type') === 'bearer') {
            $tokenParams = array(
                'code' => $request->get('code'),
                'grant_type' => 'authorization_code',
            );

            $client = $this->get('guzzle.client.codemaster_mailup');

            $response = $client->get('/Authorization/OAuth/Token', [
                'query' => $tokenParams,
            ]);

            $data = json_decode((string) $response->getBody());

            $this->get('session')->set('mailup_token', $data);

            return $this->redirect('/contact/mail');
        } else {
            return $this->redirect($logOnEndpoint.http_build_query($logOnParams));
        }
  }
}
