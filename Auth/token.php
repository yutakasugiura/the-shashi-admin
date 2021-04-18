<?php

require 'vendor/autoload.php';

use Auth0\SDK\JWTVerifier;
use Auth0\SDK\Helpers\Cache\FileSystemCacheHandler;

$verifier = new JWTVerifier([
    'valid_audiences' => ['http://localhost:3000/test'],
    'authorized_iss' => ['https://the-shashi.jp.auth0.com'],
    'cache' => new FileSystemCacheHandler() // This parameter is optional. By default no cache is used to fetch the JSON Web Keys.
]);

$token = 'eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCIsImtpZCI6Ilh0QW9KWkhWcWc1SV9uWWpBX2prNCJ9.eyJpc3MiOiJodHRwczovL3RoZS1zaGFzaGkuanAuYXV0aDAuY29tLyIsInN1YiI6IjZ5bmNPM095WDhmbklCQ2RmYXRmSnVLM05rUjNVS1IyQGNsaWVudHMiLCJhdWQiOiJodHRwOi8vbG9jYWxob3N0OjMwMDAvdGVzdCIsImlhdCI6MTYxODY4NTY3NiwiZXhwIjoxNjE4NzcyMDc2LCJhenAiOiI2eW5jTzNPeVg4Zm5JQkNkZmF0Zkp1SzNOa1IzVUtSMiIsImd0eSI6ImNsaWVudC1jcmVkZW50aWFscyIsInBlcm1pc3Npb25zIjpbXX0.otuxX1ZX1wUro45Vq1fs4CjflQuPUsaciIJ6bm8bI-LuG4Jnblq0UgwMmFDzfdScyloRwD62ctdvY-Cx2jV4QhzaxAV-DtOUBNBjUAZmKZd3T4AjIoH8V9dvbjqrynTpZep1RkteTo8rWiZutwYpTZo1mHdl0Zy2DxZaZjBW0i91h2-tt3JBQpoXVSPCSwgToF8PhevNUxkDwgAuMIciY0sFjsRvhXUivNflmgBILkIma1SIdC_-QgzvlKgQuoN3EUd64VY-0h5N-sB7XTF04Bo2hWdorhxrqx8vHJXoGUeVrQyTz3BU30fgRuh_CpULhKUbthCD4p6_mesDa0KSeQ';

$decoded = $verifier->verifyAndDecode($token);