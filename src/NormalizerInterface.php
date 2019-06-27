<?php
declare(strict_types=1);

namespace Jaeger\Logger\Bridge;

interface NormalizerInterface
{
    public function normalize(array $context): string;
}
