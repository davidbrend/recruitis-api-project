<?php

namespace Davebrend\RecruitisApiProject\Enums;

enum AccessStateEnum : int
{
    case OPEN_POSITION = 1;
    case CLOSED_POSITION = 2;
    case ARCHIVED_POSITION = 3;
    case DRAFT = 4;
    case TEMPLATE = 5;
}