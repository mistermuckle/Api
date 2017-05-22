<?php

namespace AyeAye\Api\Status;

class Accepted extends AbstractStatus implements SuccessStatusInterface
{
    const CODE = 202;
    const MESSAGE = 'Accepted';
}