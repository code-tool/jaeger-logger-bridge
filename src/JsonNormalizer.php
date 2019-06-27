<?php
declare(strict_types=1);

namespace Jaeger\Logger\Bridge;

class JsonNormalizer implements NormalizerInterface
{
    public function normalize(array $context): string
    {
        return @json_encode($context, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?: '';
    }
}
