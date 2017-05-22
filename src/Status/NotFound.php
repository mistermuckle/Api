<?php

namespace AyeAye\Api\Status;

class NotFound extends AbstractStatus implements ClientErrorStatusInterface
{
    const CODE = 404;
    const MESSAGE = 'Not Found';
}