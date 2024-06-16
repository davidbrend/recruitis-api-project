<?php

namespace Davebrend\RecruitisApiProject\Enums\Query;

enum OrderByEnum : string
{
    case DATE_CREATED = 'date_created';
    case DATE_CHANNEL_ASSIGNED = 'date_channel_assigned';
}