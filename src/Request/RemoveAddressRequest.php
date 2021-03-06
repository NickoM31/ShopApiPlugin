<?php

declare(strict_types=1);

namespace Sylius\ShopApiPlugin\Request;

use Symfony\Component\HttpFoundation\Request;

final class RemoveAddressRequest
{
    /** @var int|string */
    private $id;

    public function __construct(Request $request)
    {
        $this->id = $request->attributes->get('id');
    }

    /** @return int|string */
    public function id()
    {
        return $this->id;
    }
}
