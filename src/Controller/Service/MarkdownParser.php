<?php
namespace App\Controller\Service;
use Psr\Log\LoggerInterface;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Component\Cache\Adapter\AdapterInterface;

class MarkdownParser
{
    /**
     * @var CacheInterface
     */
    private $cache;
    /**
     * @var LoggerInterface
     */
    private $logger;
    private bool $debug;

    public function __construct(
        $cache,
        LoggerInterface $markdownLogger,
        bool $debug
    )
    {
        $this->cache = $cache;
        $this->logger = $markdownLogger;
        $this->debug = $debug;
    }
    public function parce(string $source): string
    {
        if($this->debug){
            return $source;
        }

        if(stripos($source, 'красн') !== false ){
            $this->logger->info('Есть!');
        }
        return $this->cache->get('markdown_' . md5($source),
            function () use ($source){
                return $source;
            });
    }
}