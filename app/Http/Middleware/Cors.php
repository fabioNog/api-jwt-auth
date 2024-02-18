<?php

// app/Http/Middleware/Cors.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Cors
{
    public function handle($request, Closure $next)
    {
        // Verificar se é uma solicitação de preflight (OPTIONS)
        if ($request->isMethod('OPTIONS')) {
            return $this->setPreflightHeaders();
        }

        // Prossiga com a solicitação normal
        $response = $next($request);

        // Definir os cabeçalhos CORS para a resposta normal
        $response->header('Access-Control-Allow-Origin', 'http://localhost:3000');
        $response->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        $response->header('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization');

        return $response;
    }

    private function setPreflightHeaders()
    {
        // Retornar uma resposta vazia com os cabeçalhos CORS permitidos
        return response(null, Response::HTTP_NO_CONTENT)
            ->header('Access-Control-Allow-Origin', 'http://localhost:3000')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization');
    }
}
