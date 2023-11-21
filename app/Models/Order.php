<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
                return 'Chờ admin xác nhận. </br> <a href="'. route('order.cancel', ['id' => $this->id]) .'">Hủy đặt hàng</a>';
            case OrderStatus::CANCEL_ORDER:
                return 'Đơn đặt hàng đã bị hủy';
            case OrderStatus::CONFIRM_ORDER:
                return 'Đơn đặt hàng đã được xác nhận';
            case OrderStatus::ORDER_SUCCESS:
                return 'Đơn đặt hàng thành công';
            default:
                return 'Trạng thái không xác định';
        }
    }
}
