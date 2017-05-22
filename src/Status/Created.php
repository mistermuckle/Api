<?php

namespace AyeAye\Api\Status;

class Created extends AbstractStatus implements SuccessStatusInterface
{
    const CODE = 201;
    const MESSAGE = 'Created';
}