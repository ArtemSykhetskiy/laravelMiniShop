<?php
namespace App\Helpers\Enums;

enum OrdersStatuses: string
{
    case InProcess = "IN_PROCESS";
    case Paid = "PAID";
    case Completed = "COMPLETED";
    case Canceled = "CANCELED";

    public static function findByKey(string $key) {
        return constant("self::$key");
    }
}
