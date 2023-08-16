<?php

namespace App\Commands;

enum CommandResponseEnum: int
{
    case SUCCESS = 0;
    case FAIL = 1;
}
