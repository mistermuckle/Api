<?php

namespace AyeAye\Api\Status;

class Unauthorized extends AbstractStatus implements ClientErrorInterface
{
    const CODE = 401;
    const MESSAGE = 'Unauthorized';
}