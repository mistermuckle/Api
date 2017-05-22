<?php

namespace AyeAye\Api\Status;

class PartialContent extends AbstractStatus implements SuccessStatusInterface
{
    const CODE = 206;
    const MESSAGE = 'Partial Content';
}