<?php
declare(strict_types=1);

namespace Jaeger\Logger\Bridge;

use Jaeger\Log\UserLog;
use Jaeger\Span\SpanAwareInterface;
use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;

class JaegerLoggerDecorator extends AbstractLogger
{
    private $logger;

    private $span;

    private $normalizer;

    public function __construct(LoggerInterface $logger, SpanAwareInterface $span, NormalizerInterface $normalizer)
    {
        $this->logger = $logger;
        $this->span = $span;
        $this->normalizer = $normalizer;
    }

    public function log($level, $message, array $context = []): void
    {
        if (null !== ($span = $this->span->getSpan()) && $span->isSampled()) {
            $span->addLog(new UserLog($message, $level, $this->normalizer->normalize($context)));
        }

        $this->logger->log($level, $message, $context);
    }
}
