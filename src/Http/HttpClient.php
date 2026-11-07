<?php

declare(strict_types=1);

namespace WumxLabs\NoxAeApi\Http;

use WumxLabs\NoxAeApi\Exceptions\AuthenticationException;
use WumxLabs\NoxAeApi\Exceptions\NotFoundException;
use WumxLabs\NoxAeApi\Exceptions\NoxAeApiException;

class HttpClient
{
    private string $baseUrl;
    private string $apiKey;
    private int $timeout;
    private array $customHeaders;

    public function __construct(string $apiKey, string $baseUrl = 'http://localhost:8080', int $timeout = 10, array $customHeaders = [])
    {
        $this->apiKey = $apiKey;
        $this->baseUrl = rtrim($baseUrl, '/');
        $this->timeout = $timeout;
        $this->customHeaders = $customHeaders;
    }

    public function withHeader(string $name, string $value): self
    {
        $clone = clone $this;
        $clone->customHeaders[$name] = $value;
        return $clone;
    }

    public function request(string $method, string $path, array $queryParams = [], ?array $body = null): mixed
    {
        $url = $this->baseUrl . '/' . ltrim($path, '/');
        if (!empty($queryParams)) {
            $url .= '?' . http_build_query($queryParams);
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($method));

        $headers = [
            'Accept: application/json',
            'X-API-Key: ' . $this->apiKey,
        ];

        foreach ($this->customHeaders as $name => $val) {
            $headers[] = $name . ': ' . $val;
        }

        if ($body !== null) {
            $payload = json_encode($body);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
            $headers[] = 'Content-Type: application/json';
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $errNo = curl_errno($ch);
        $errMsg = curl_error($ch);
        curl_close($ch);

        if ($errNo !== 0) {
            throw new NoxAeApiException("cURL Error [{$errNo}]: {$errMsg}");
        }

        $decoded = null;
        if ($response !== false && $response !== '') {
            $decoded = json_decode($response, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                $decoded = $response;
            }
        }

        if ($httpCode >= 400) {
            $msg = is_array($decoded) && isset($decoded['message']) ? $decoded['message'] : "HTTP {$httpCode} Request Failed";
            if ($httpCode === 401 || $httpCode === 403) {
                throw new AuthenticationException($msg, $httpCode, $decoded);
            }
            if ($httpCode === 404) {
                throw new NotFoundException($msg, $httpCode, $decoded);
            }
            throw new NoxAeApiException($msg, $httpCode, $decoded);
        }

        return $decoded;
    }

    public function get(string $path, array $queryParams = []): mixed
    {
        return $this->request('GET', $path, $queryParams);
    }

    public function post(string $path, ?array $body = null, array $queryParams = []): mixed
    {
        return $this->request('POST', $path, $queryParams, $body);
    }

    public function put(string $path, ?array $body = null, array $queryParams = []): mixed
    {
        return $this->request('PUT', $path, $queryParams, $body);
    }

    public function delete(string $path, array $queryParams = []): mixed
    {
        return $this->request('DELETE', $path, $queryParams);
    }
}
