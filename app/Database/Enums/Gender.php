<?php

namespace App\Database\Enums;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable
 */
class Gender extends Enum
{
    private const TYPE_MALE = 'male';
    private const TYPE_FEMALE = 'female';
    private const TYPE_OTHER = 'other';

    /**
     * Gender Type Male
     * @return Gender
     */
    public static function TYPE_MALE(): Gender
    {
        return new self(self::TYPE_MALE);
    }

    /**
     * Gender Type Female
     * @return Gender
     */
    public static function TYPE_FEMALE(): Gender
    {
        return new self(self::TYPE_FEMALE);
    }

    /**
     * Gender Type Other
     * @return Gender
     */
    public static function TYPE_OTHER(): Gender
    {
        return new self(self::TYPE_OTHER);
    }
}
