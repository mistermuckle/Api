<?php

namespace AyeAye\Api\Status;

class TemporaryRedirect extends AbstractStatus implements Redirection Status Interface
{
    const CODE = 307;
    const MESSAGE = 'Temporary Redirect';
}