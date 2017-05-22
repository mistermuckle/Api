<?php

namespace AyeAye\Api\Status;

class Found extends AbstractStatus implements RedirectionStatusInterface
{
    const CODE = 302;
    const MESSAGE = 'Found';
}