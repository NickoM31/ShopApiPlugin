<?php

declare(strict_types=1);

namespace Sylius\ShopApiPlugin\Request;

use Ramsey\Uuid\Uuid;
use Sylius\ShopApiPlugin\Command\PickupCart;
use Symfony\Component\HttpFoundation\Request;

final class PickupCartRequest
{
    /** @var string */
    private $token;

    /** @var string */
    private $channel;

    public function __construct(Request $request)
    {
        if ($request->attributes->has('token')) {
            @trigger_error('Passing pre-generated cart token for cart pickup is deprecated. Please rely on the autogenerated token.', \E_USER_DEPRECATED);
        }

        $this->token = $request->attributes->get('token', Uuid::uuid4()->toString());
        $this->channel = $request->attributes->get('channelCode');
    }

    public function getCommand(): PickupCart
    {
        return new PickupCart($this->token, $this->channel);
    }
}
