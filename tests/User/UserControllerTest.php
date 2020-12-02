<?php


namespace User;


use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class UserControllerTest extends TestCase
{
    public function getAllUsersTest(){

        // create our http client (Guzzle)
        $client = new Client($_ENV['PUBLIC_URL'], array(
            'request.options' => array(
                'exceptions' => false,
            )
        ));

        $request = $client->get('/v1/users');
        $response = $request->send();

        $this->assertEquals(201, $response->getStatusCode());
    }
}