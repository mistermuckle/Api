<?php

namespace AyeAye\Api\Status;

class BadRequest extends AbstractStatus implements ClientErrorStatusInterface
{
    const CODE = 400;
    const MESSAGE = 'Bad Request';
}