<?php

namespace App\Enum;

enum EnumWorkLocation: string
{
    case ON_SITE = 'Présentiel';

    case REMOTE = 'Distanciel';

    case HYBRID = 'Hybrid';
}
