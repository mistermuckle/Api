<?php

namespace AyeAye\Api\Status;

class UseProxy extends AbstractStatus implements RedirectionStatusInterface
{
    const CODE = 305;
    const MESSAGE = 'Use Proxy';
}