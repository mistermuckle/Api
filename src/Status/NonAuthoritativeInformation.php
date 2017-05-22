<?php

namespace AyeAye\Api\Status;

class NonAuthoritativeInformation extends AbstractStatus implements SuccessStatusInterface
{
    const CODE = 203;
    const MESSAGE = 'Non-Authoritative Information (since HTTP/1.1)';
}