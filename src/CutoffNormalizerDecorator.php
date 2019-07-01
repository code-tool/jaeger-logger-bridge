<?php
declare(strict_types=1);

namespace Jaeger\Logger\Bridge;

class CutoffNormalizerDecorator extends AbstractNormalizerDecorator
{
    private $size;

    public function __construct(NormalizerInterface $normalizer, int $size = 1024)
    {
        $this->size = $size;
        parent::__construct($normalizer);
    }

    public function normalize(array $context): string
    {
        return \substr(parent::normalize($context), 0, $this->size);
    }
}
