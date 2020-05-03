<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table='tbl_supplier';

    protected $fillable = [
        'comp_id','sup_id', 'sup_name', 'sup_address','sup_mobile', 'sup_email', 'sup_gst','status'
    ];
}
