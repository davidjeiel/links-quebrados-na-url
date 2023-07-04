<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LinkChecker;

class VerificaController extends Controller
{
    public $arrayLinks = ["url", "status"];

    public function index(Request $request)
    {
        // Crie uma instância da classe LinkChecker com a URL base desejada
        $linkChecker = new LinkChecker($request->url);

        // Execute a verificação dos links
        $brokenLinks = $linkChecker->checkLinks();

        // Imprima a lista de links quebrados
        foreach ($brokenLinks as $brokenLink) {
            array_push($this->arrayLinks, $brokenLink['url'], $brokenLink['status']);
        }

        $dados = $this->arrayLinks;

        return view('lista', compact('dados'));
    }
}
