<?php

namespace Davebrend\RecruitisApiProject\Enums;

enum ActivityStateEnum : int
{
    case ACTIVE_POSITION = 1;
    case INACTIVE_POSITION = 2;
    case ALL_STATE = 3;
}