<?php

namespace AyeAye\Api\Status;

class MovedPermanently extends AbstractStatus implements RedirectionStatusInterface
{
    const CODE = 301;
    const MESSAGE = 'Moved Permanently';
}