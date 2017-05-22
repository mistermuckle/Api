<?php

namespace AyeAye\Api\Status;

class MultipleChoices extends AbstractStatus implements RedirectionStatusInterface
{
    const CODE = 300;
    const MESSAGE = 'Multiple Choices';
}