<?php

namespace AyeAye\Api\Status;

class InternalServerError extends AbstractStatus implements ServerStatusInterface
{
    const CODE = 500;
    const MESSAGE = 'Internal Server Error';
}