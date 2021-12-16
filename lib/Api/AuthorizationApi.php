<?php
/**
 * AuthorizationApi
 * PHP version 7.2
 *
 * @category Class
 * @package  SellingPartnerApi
 */

/**
 * Selling Partner API for Authorization
 *
 * The Selling Partner API for Authorization helps developers manage authorizations and check the specific permissions associated with a given authorization.
 *
 * The version of the OpenAPI document: v1
 * 
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 5.0.1
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace SellingPartnerApi\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use SellingPartnerApi\ApiException;
use SellingPartnerApi\Configuration;
use SellingPartnerApi\HeaderSelector;
use SellingPartnerApi\ObjectSerializer;

/**
 * AuthorizationApi Class Doc Comment
 *
 * @category Class
 * @package  SellingPartnerApi
 */
class AuthorizationApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var int Host index
     */
    protected $hostIndex;

    /**
     * @param Configuration   $config
     * @param ClientInterface $client
     * @param HeaderSelector  $selector
     * @param int             $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        Configuration $config,
        ClientInterface $client = null,
        HeaderSelector $selector = null,
        $hostIndex = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config;
        $this->headerSelector = $selector ?: new HeaderSelector($this->config);
        $this->hostIndex = $hostIndex;
    }

    /**
     * Set the host index
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex($hostIndex)
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index
     *
     * @return int Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation getAuthorizationCode
     *
     * Returns the Login with Amazon (LWA) authorization code for an existing Amazon MWS authorization.
     *
     * @param  string $selling_partner_id The seller ID of the seller for whom you are requesting Selling Partner API authorization. This must be the seller ID of the seller who authorized your application on the Marketplace Appstore. (required)
     * @param  string $developer_id Your developer ID. This must be one of the developer ID values that you provided when you registered your application in Developer Central. (required)
     * @param  string $mws_auth_token The MWS Auth Token that was generated when the seller authorized your application on the Marketplace Appstore. (required)
     *
     * @throws \SellingPartnerApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SellingPartnerApi\Model\Authorization\GetAuthorizationCodeResponse
     */
    public function getAuthorizationCode($selling_partner_id, $developer_id, $mws_auth_token)
    {
        $response = $this->getAuthorizationCodeWithHttpInfo($selling_partner_id, $developer_id, $mws_auth_token);
        return $response;
    }

    /**
     * Operation getAuthorizationCodeWithHttpInfo
     *
     * Returns the Login with Amazon (LWA) authorization code for an existing Amazon MWS authorization.
     *
     * @param  string $selling_partner_id The seller ID of the seller for whom you are requesting Selling Partner API authorization. This must be the seller ID of the seller who authorized your application on the Marketplace Appstore. (required)
     * @param  string $developer_id Your developer ID. This must be one of the developer ID values that you provided when you registered your application in Developer Central. (required)
     * @param  string $mws_auth_token The MWS Auth Token that was generated when the seller authorized your application on the Marketplace Appstore. (required)
     *
     * @throws \SellingPartnerApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SellingPartnerApi\Model\Authorization\GetAuthorizationCodeResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getAuthorizationCodeWithHttpInfo($selling_partner_id, $developer_id, $mws_auth_token)
    {
        $request = $this->getAuthorizationCodeRequest($selling_partner_id, $developer_id, $mws_auth_token);
        $signedRequest = $this->config->signRequest(
            $request,
            "sellingpartnerapi::migration"
        );

        $this->writeDebug($signedRequest);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($signedRequest, $options);
                $this->writeDebug($response);
                $this->writeDebug((string) $response->getBody());
            } catch (RequestException $e) {
                $body = (string) $e->getResponse()->getBody();
                $this->writeDebug($e->getResponse());
                $this->writeDebug($body);
                throw new ApiException(
                    "[{$e->getCode()}] {$body}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $body : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $signedRequest->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()->getContents()
                );
            }

            $responseBody = $response->getBody();
            switch($statusCode) {
                case 200:
                    if ('\SellingPartnerApi\Model\Authorization\GetAuthorizationCodeResponse' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string) $responseBody;
                    }

                    return ObjectSerializer::deserialize($content, '\SellingPartnerApi\Model\Authorization\GetAuthorizationCodeResponse', $response->getHeaders());
                case 400:
                    if ('\SellingPartnerApi\Model\Authorization\GetAuthorizationCodeResponse' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string) $responseBody;
                    }

                    return ObjectSerializer::deserialize($content, '\SellingPartnerApi\Model\Authorization\GetAuthorizationCodeResponse', $response->getHeaders());
                case 403:
                    if ('\SellingPartnerApi\Model\Authorization\GetAuthorizationCodeResponse' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string) $responseBody;
                    }

                    return ObjectSerializer::deserialize($content, '\SellingPartnerApi\Model\Authorization\GetAuthorizationCodeResponse', $response->getHeaders());
                case 404:
                    if ('\SellingPartnerApi\Model\Authorization\GetAuthorizationCodeResponse' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string) $responseBody;
                    }

                    return ObjectSerializer::deserialize($content, '\SellingPartnerApi\Model\Authorization\GetAuthorizationCodeResponse', $response->getHeaders());
                case 413:
                    if ('\SellingPartnerApi\Model\Authorization\GetAuthorizationCodeResponse' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string) $responseBody;
                    }

                    return ObjectSerializer::deserialize($content, '\SellingPartnerApi\Model\Authorization\GetAuthorizationCodeResponse', $response->getHeaders());
                case 415:
                    if ('\SellingPartnerApi\Model\Authorization\GetAuthorizationCodeResponse' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string) $responseBody;
                    }

                    return ObjectSerializer::deserialize($content, '\SellingPartnerApi\Model\Authorization\GetAuthorizationCodeResponse', $response->getHeaders());
                case 429:
                    if ('\SellingPartnerApi\Model\Authorization\GetAuthorizationCodeResponse' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string) $responseBody;
                    }

                    return ObjectSerializer::deserialize($content, '\SellingPartnerApi\Model\Authorization\GetAuthorizationCodeResponse', $response->getHeaders());
                case 500:
                    if ('\SellingPartnerApi\Model\Authorization\GetAuthorizationCodeResponse' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string) $responseBody;
                    }

                    return ObjectSerializer::deserialize($content, '\SellingPartnerApi\Model\Authorization\GetAuthorizationCodeResponse', $response->getHeaders());
                case 503:
                    if ('\SellingPartnerApi\Model\Authorization\GetAuthorizationCodeResponse' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string) $responseBody;
                    }

                    return ObjectSerializer::deserialize($content, '\SellingPartnerApi\Model\Authorization\GetAuthorizationCodeResponse', $response->getHeaders());
            }

            $returnType = '\SellingPartnerApi\Model\Authorization\GetAuthorizationCodeResponse';
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = (string) $responseBody;
            }

            return ObjectSerializer::deserialize($content, $returnType, $response->getHeaders());

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\SellingPartnerApi\Model\Authorization\GetAuthorizationCodeResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\SellingPartnerApi\Model\Authorization\GetAuthorizationCodeResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\SellingPartnerApi\Model\Authorization\GetAuthorizationCodeResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\SellingPartnerApi\Model\Authorization\GetAuthorizationCodeResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 413:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\SellingPartnerApi\Model\Authorization\GetAuthorizationCodeResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 415:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\SellingPartnerApi\Model\Authorization\GetAuthorizationCodeResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\SellingPartnerApi\Model\Authorization\GetAuthorizationCodeResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\SellingPartnerApi\Model\Authorization\GetAuthorizationCodeResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 503:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\SellingPartnerApi\Model\Authorization\GetAuthorizationCodeResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            $this->writeDebug($e);
            throw $e;
        }
    }

    /**
     * Operation getAuthorizationCodeAsync
     *
     * Returns the Login with Amazon (LWA) authorization code for an existing Amazon MWS authorization.
     *
     * @param  string $selling_partner_id The seller ID of the seller for whom you are requesting Selling Partner API authorization. This must be the seller ID of the seller who authorized your application on the Marketplace Appstore. (required)
     * @param  string $developer_id Your developer ID. This must be one of the developer ID values that you provided when you registered your application in Developer Central. (required)
     * @param  string $mws_auth_token The MWS Auth Token that was generated when the seller authorized your application on the Marketplace Appstore. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAuthorizationCodeAsync($selling_partner_id, $developer_id, $mws_auth_token)
    {
        return $this->getAuthorizationCodeAsyncWithHttpInfo($selling_partner_id, $developer_id, $mws_auth_token)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getAuthorizationCodeAsyncWithHttpInfo
     *
     * Returns the Login with Amazon (LWA) authorization code for an existing Amazon MWS authorization.
     *
     * @param  string $selling_partner_id The seller ID of the seller for whom you are requesting Selling Partner API authorization. This must be the seller ID of the seller who authorized your application on the Marketplace Appstore. (required)
     * @param  string $developer_id Your developer ID. This must be one of the developer ID values that you provided when you registered your application in Developer Central. (required)
     * @param  string $mws_auth_token The MWS Auth Token that was generated when the seller authorized your application on the Marketplace Appstore. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAuthorizationCodeAsyncWithHttpInfo($selling_partner_id, $developer_id, $mws_auth_token)
    {
        $returnType = '\SellingPartnerApi\Model\Authorization\GetAuthorizationCodeResponse';
        $request = $this->getAuthorizationCodeRequest($selling_partner_id, $developer_id, $mws_auth_token);
        $signedRequest = $this->config->signRequest(
            $request,
            "sellingpartnerapi::migration"
        );

        $this->writeDebug($signedRequest);

        return $this->client
            ->sendAsync($signedRequest, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $this->writeDebug($response);
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string) $responseBody;
                    }

                    return ObjectSerializer::deserialize($content, $returnType, $response->getHeaders());
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $body = (string) $response->getBody();
                    $this->writeDebug($response);
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $body
                    );
                }
            );
    }

    /**
     * Create request for operation 'getAuthorizationCode'
     *
     * @param  string $selling_partner_id The seller ID of the seller for whom you are requesting Selling Partner API authorization. This must be the seller ID of the seller who authorized your application on the Marketplace Appstore. (required)
     * @param  string $developer_id Your developer ID. This must be one of the developer ID values that you provided when you registered your application in Developer Central. (required)
     * @param  string $mws_auth_token The MWS Auth Token that was generated when the seller authorized your application on the Marketplace Appstore. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getAuthorizationCodeRequest($selling_partner_id, $developer_id, $mws_auth_token)
    {
        // verify the required parameter 'selling_partner_id' is set
        if ($selling_partner_id === null || (is_array($selling_partner_id) && count($selling_partner_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $selling_partner_id when calling getAuthorizationCode'
            );
        }
        // verify the required parameter 'developer_id' is set
        if ($developer_id === null || (is_array($developer_id) && count($developer_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $developer_id when calling getAuthorizationCode'
            );
        }
        // verify the required parameter 'mws_auth_token' is set
        if ($mws_auth_token === null || (is_array($mws_auth_token) && count($mws_auth_token) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $mws_auth_token when calling getAuthorizationCode'
            );
        }

        $resourcePath = '/authorization/v1/authorizationCode';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if (is_array($selling_partner_id)) {
            $selling_partner_id = ObjectSerializer::serializeCollection($selling_partner_id, '', true);
        }
        if ($selling_partner_id !== null) {
            $queryParams['sellingPartnerId'] = $selling_partner_id;
        }

        // query params
        if (is_array($developer_id)) {
            $developer_id = ObjectSerializer::serializeCollection($developer_id, '', true);
        }
        if ($developer_id !== null) {
            $queryParams['developerId'] = $developer_id;
        }

        // query params
        if (is_array($mws_auth_token)) {
            $mws_auth_token = ObjectSerializer::serializeCollection($mws_auth_token, '', true);
        }
        if ($mws_auth_token !== null) {
            $queryParams['mwsAuthToken'] = $mws_auth_token;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'payload', 'errors']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'payload', 'errors'],
                [],
                "sellingpartnerapi::migration"
            );
        }

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }

    /**
     * Writes to the debug log file
     *
     * @param any $data
     * @return void
     */
    private function writeDebug($data)
    {
        if ($this->config->getDebug()) {
            file_put_contents($this->config->getDebugFile(), '[' . date('Y-m-d H:i:s') . ']: ' . print_r($data, true) . "\n", FILE_APPEND);
        }
    }
}
