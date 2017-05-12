<?php

namespace Sylius\ShopApiPlugin\Factory;

use Liip\ImagineBundle\Imagine\Cache\CacheManager;
use Sylius\Component\Core\Model\ImageInterface;
use Sylius\ShopApiPlugin\View\ImageView;

final class ImageViewFactory implements ImageViewFactoryInterface
{
    /**
     * @var CacheManager
     */
    private $imagineCacheManager;

    /**
     * @param CacheManager $imagineCacheManager
     */
    public function __construct(CacheManager $imagineCacheManager)
    {
        $this->imagineCacheManager = $imagineCacheManager;
    }

    /**
     * @param ImageInterface $image
     *
     * @return ImageView
     */
    public function create(ImageInterface $image)
    {
        $imageView = new ImageView();
        $imageView->code = $image->getType();
        $imageView->url = $this->imagineCacheManager->getBrowserPath($image->getPath(), 'sylius_small');

        return $imageView;
    }
}