<?php

namespace AyeAye\Api\Status;

class PermanentRedirect extends AbstractStatus implements RedirectionStatusInterface
{
    const CODE = 308;
    const MESSAGE = 'Permanent Redirect';
}