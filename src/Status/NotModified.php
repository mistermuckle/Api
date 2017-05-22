<?php

namespace AyeAye\Api\Status;

class NotModified extends AbstractStatus implements RedirectionStatusInterface
{
    const CODE = 304;
    const MESSAGE = 'Not Modified';
} 