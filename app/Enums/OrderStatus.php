<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class OrderStatus extends Enum
{
    const ORDER = 0;
    const CONFIRM_ORDER = 1;
    const ORDER_SUCCESS = 2;
    const CANCEL_ORDER = 3;
}
