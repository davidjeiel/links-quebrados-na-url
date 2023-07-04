<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Http;
use Symfony\Component\DomCrawler\Crawler;

class LinkChecker
{
    protected $baseUrl;
    protected $brokenLinks = [];

    public function __construct($baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    public function checkLinks()
    {
        $this->checkUrl($this->baseUrl);
        return $this->brokenLinks;
    }

    protected function checkUrl($url)
    {
        try {
            $response = Http::get($url);
            $statusCode = $response->status();
            if ($statusCode != 200) {
                $this->brokenLinks[] = ['url' => $url, 'status' => $statusCode];
            } else {
                $html = $response->body();
                $this->checkPageLinks($url, $html);
            }
        } catch (GuzzleException $e) {
            $this->brokenLinks[] = ['url' => $url, 'status' => 'Error: ' . $e->getMessage()];
        }
    }

    protected function checkPageLinks($url, $html)
    {
        $crawler = new Crawler($html);
        $links = $crawler->filter('a');

        foreach ($links as $link) {
            $href = $link->getAttribute('href');
            if ($href && $href != '#') {
                $linkUrl = $this->resolveUrl($url, $href);
                $this->checkUrl($linkUrl);
            }
        }
    }

    protected function resolveUrl($baseUrl, $link)
    {
        if (strpos($link, '/') === 0) {
            return $baseUrl . $link;
        } else {
            return $link;
        }
    }
}
