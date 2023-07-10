<?php

namespace App\Models;

use App\Models\Floor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function rack()
    {
        return $this->belongsTo(Rack::class);
    }

    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function productreport()
    {
        return $this->belongsTo(ProductReport::class);
    }

    public function deliveries()
    {
        return $this->belongsToMany(Delivery::class, 'delivery_product')->withPivot('quantity');
    }
}
