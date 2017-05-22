<?php

namespace AyeAye\Api\Status;

class Forbidden extends AbstractStatus implements ClientErrorStatusInterface
{
    const CODE = 403;
    const MESSAGE = 'Forbidden';
}