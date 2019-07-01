<?php
declare(strict_types=1);

namespace Jaeger\Logger\Bridge;

abstract class AbstractNormalizerDecorator implements NormalizerInterface
{
    private $normalizer;

    public function __construct(NormalizerInterface $normalizer)
    {
        $this->normalizer = $normalizer;
    }

    public function normalize(array $context): string
    {
        return $this->normalizer->normalize($context);
    }
}
