<?php

namespace AyeAye\Api\Status;

class NoContent extends AbstractStatus implements SuccessStatusInterface
{
    const CODE = 204;
    const MESSAGE = 'No Content';
}