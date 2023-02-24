<?php
namespace App\Controller\Service;
use Psr\Log\LoggerInterface;
use Symfony\Contracts\Cache\CacheInterface;

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
    public function __construct(CacheInterface $cache, LoggerInterface $markdownLogger){
        $this->cache = $cache;
        $this->logger = $markdownLogger;
    }
    public function parce(string $source): string
    {
        if(stripos($source, 'красн') !== false ){
            $this->logger->info('Есть!');
        }
        return $this->cache->get('markdown_' . md5($source),
            function () use ($source){
                return $source;
            });

    }

}