<?php

namespace App\Enum;

enum UserRole: string
{
    case INTERN = 'Stagiaire';
    case COMPANY = 'Entreprise';
    case ORGANIZATION = 'Organisme de formation';

    public function toString(): string
    {
        return $this->value;
    }
}
