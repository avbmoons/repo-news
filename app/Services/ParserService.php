<?php

declare(strict_types=1);

namespace App\Services;

use App\Services\Contracts\Parser;
use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements Parser
{
    private string $link;

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getParseData(): array
    {
        $xml = XMLParser::load($this->link);

        return $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate,author]'
            ],
        ]);
    }

    public function saveParseData(): void
    {
        $xml = XMLParser::load($this->link);

        $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate,author]'
            ],
        ]);

        $e = \explode("/", $this->link);
        $fileName = end($e);
        $jsonEncode = json_encode($data);

        Storage::append('news/' . $fileName, $jsonEncode);
    }
}
