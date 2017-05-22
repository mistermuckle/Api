<?php

namespace AyeAye\Api\Status;

class PaymentRequired extends AbstractStatus implements ClientErrorStatusInterface
{
    const CODE = 402;
    const MESSAGE = 'Payment Required';
}