<?php

namespace App\Models;

use App\Enums\OrderStatus;
use App\Enums\UserRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        "userID",
        "fullname",
        "phone",
        "address",
        "total",
        "status",
        "note",
    ];

    public function getStatusStr() {
        switch ($this->status) {
            case OrderStatus::ORDER:
                $user = Auth::user() ?? null;
                $str = ' </br> <a href="'. route('order.cancel', ['id' => $this->id]) .'">Hủy đặt hàng</a>';
                if ($user->role === UserRole::ADMIN) {
                    $str = '';
                }
                return 'Chờ admin xác nhận.'. $str;
            case OrderStatus::CANCEL_ORDER:
                return 'Đơn đặt hàng đã bị hủy.';
            case OrderStatus::CONFIRM_ORDER:
                return 'Đơn đặt hàng đã được xác nhận. Chờ giao hàng.';
            case OrderStatus::ORDER_SUCCESS:
                return 'Đơn đặt hàng thành công.';
            default:
                return 'Trạng thái không xác định';
        }
    }
}
