<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('encodeUri', [$this, 'encodeUri']),
        ];
    }

    /**
     * @param string $string
     * @return string|string[]|null
     */
    public function encodeUri(string $string)
    {
        return preg_replace(
            [
                '/%20| /',
                '/%C3%A9|é|è|ê|ë/',
                '/à|ä|â|ã/',
                '/î|ï|ì/',
                '/û|ü|ù/',
                '/ö|õ|ò/',
                '/ñ/',
            ],
            [
                '_', 'e',
                'a', 'i',
                'u', 'o',
                'n',
            ],
            $string
        );
    }
}
