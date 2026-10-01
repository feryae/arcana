<?php

declare(strict_types=1);

namespace App\Enums;

enum StressReductionTypes: int
{
    case BREATHING = 1;
    case MINDFULNESS = 2;
    case GROUNDING = 3;
    case MOVEMENT = 4;
    case COGNITIVE = 5;
    case SENSORY = 6;
    case EMERGENCY = 7;
    case ETC = 8;


    public function label(): string
    {
        return match ($this) {
            self::BREATHING => 'Breathing',
            self::MINDFULNESS => 'Mindfulness',
            self::GROUNDING => 'Grounding',
            self::MOVEMENT => 'Movement',
            self::COGNITIVE => 'Cognitive',
            self::SENSORY => 'Sensory',
            self::EMERGENCY => 'Emergency',
            self::ETC => 'ETC',
        };
    }
}


