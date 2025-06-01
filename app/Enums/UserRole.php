<?php

namespace App\Enums;

enum UserRole: string
{
    case ADMIN = 'admin';
    case KOORDINATOR = 'koordinator';
    case PEMBINA = 'pembina';
    case PELAKSANA = 'pelaksana';
}
