<?php

namespace App\Entities;

use App\Daaruu\Constants\PaymentConstant;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $fillable = ['status', 'ordered_by', 'payment_status', 'city_id'];
    public $appends = ['invoice_number', 'pay_status'];

    /**
     * @return void
     */
    public function products() {
        return $this->belongsToMany(Product::class, 'order_products', 'order_id', 'product_id')->withPivot(['quantity', 'amount']);
    }


    /**
     * @return BelongsTo
     */
    public function city() {
        return $this->belongsTo(City::class);
    }

    /**
     * @return BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * @return string
     */
    public function getInvoiceNumberAttribute() {
        $start = 100000;
        $invoiceNumber = $start + $this->id;

        return 'DA-'.$invoiceNumber;
    }

    /**
     * @return string
     */
    public function getPayStatusAttribute() {
        if($this->payment_status == PaymentConstant::PENDING_ID) {
            return 'Unpaid';
        }
        else {
            return 'Paid';
        }
    }
}
