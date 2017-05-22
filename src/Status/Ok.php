<?php

namespace AyeAye\Api\Status;

class Ok extends AbstractStatus implements SuccessStatusInterface
{
    const CODE = 200;
    const MESSAGE = 'OK';
}