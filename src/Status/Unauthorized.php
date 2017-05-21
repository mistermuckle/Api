<?php

namespace AyeAye\Api\Status;

class Unauthorized extends AbstractStatus
{
    const CODE = 401;
    const MESSAGE = 'Unauthorized';
}