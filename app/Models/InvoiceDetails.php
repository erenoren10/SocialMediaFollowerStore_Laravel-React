<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetails extends Model
{
    use HasFactory;

    protected $primaryKey = "invoice_details_id";

    protected $fillable = [
        'invoice_details_id',
        'invoice_id',
        'product_id',
        'quantity',
        'unit_price',
        'total',
    ];

}
