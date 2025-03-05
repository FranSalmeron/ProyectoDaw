<?php
// src/Security/JwtAuthenticationEntryPoint.php

namespace App\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\EntryPoint\AuthenticationEntryPointInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;

class JwtAuthenticationEntryPoint implements AuthenticationEntryPointInterface
{
    public function start(Request $request, AuthenticationException $authException = null): Response
    {
        return new Response('Unauthorized', Response::HTTP_UNAUTHORIZED);
    }
}
