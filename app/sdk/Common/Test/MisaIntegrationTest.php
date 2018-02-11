<?php

namespace MisaSdk\Common\Test;

use phpDocumentor\Reflection\Types\Self_;
use Ramsey\Uuid\Uuid;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * MisaIntegrationTest Class
 *
 * @package MisaSdk\Common\Test
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
abstract class MisaIntegrationTest extends WebTestCase
{
    const API_VERSION = 'v1';

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;

    /**
     * {@inheritDoc}
     */
    protected function setUp()
    {
        try {
            self::bootKernel();
            $this->em = static::$kernel->getContainer()
                ->get('doctrine')
                ->getManager();
        } catch (\Exception $e) {
            $this->em = false;
        }
    }

    protected function toUnicode($txt)
    {
        $txt = str_replace('Á', '\u00c1', $txt);
        $txt = str_replace('á', '\u00e1', $txt);
        $txt = str_replace('É', '\u00c9', $txt);
        $txt = str_replace('é', '\u00e9', $txt);
        $txt = str_replace('Í', '\u00cd', $txt);
        $txt = str_replace('í', '\u00ed', $txt);
        $txt = str_replace('Ó', '\u00d3', $txt);
        $txt = str_replace('ó', '\u00f3', $txt);
        $txt = str_replace('Ú', '\u00da', $txt);
        $txt = str_replace('ú', '\u00fa', $txt);
        $txt = str_replace('Ü', '\u00dc', $txt);
        $txt = str_replace('ü', '\u00fc', $txt);
        $txt = str_replace('Ṅ', '\u00d1', $txt);
        $txt = str_replace('ñ', '\u00f1', $txt);
        return $txt;
    }

    protected function getUuid()
    {
        return Uuid::uuid4()->toString();
    }

    /**
     * trasforma la respuesta json a un array y retorna el status code
     * @param $method
     * @param $uri
     * @param array $parameters
     * @return MisaTestResponse
     * @throws CodeHttpException
     */
    public function request($method, $uri, $parameters = [])
    {
        $client = static::createClient();
        $client->enableProfiler();
        $crawler = $client->request($method, $uri, $parameters, [], [
            'CONTENT_TYPE' => 'application/json',
        ]);

        $data = json_decode($client->getResponse()->getContent(), true);

        $statuscode = $client->getResponse()->getStatusCode();

        $response = new MisaTestResponse($statuscode, $data);

        //var_dump($statuscode,$data);
        if ($statuscode < 200 || $statuscode >= 300) {
            throw new CodeHttpException("error de code : ". json_encode($response->body()), $response);
        }
        return $response;
    }

    public function getUrl($params = null)
    {
        $param = (is_string($params)) ? '/'.trim($params, '/') : '';
        $staicUrl = $this->getStaticUrl();
        return '/'.self::API_VERSION.'/'.trim($staicUrl, '/').$param;
    }

    abstract protected function getStaticUrl();
}
