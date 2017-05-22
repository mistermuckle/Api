<?php

namespace AyeAye\Api\Status;

class SeeOther extends AbstractStatus implements RedirectionStatusInterface
{
    const CODE = 303;
    const MESSAGE = 'See Other';
}