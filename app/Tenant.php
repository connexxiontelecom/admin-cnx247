<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;
class Tenant extends Model
{
    //tenant-user relationship
    public function user(){
        return $this->hasOne(User::class, 'tenant_id'); //tenant_id on users table
    }

    //social media-tenant relationship
    public function socialMediaHandle(){
        return $this->belongsTo(SocialMedia::class, 'tenant_id', 'tenant_id');
    }

    //plan-tenant relationship
    public function plan(){
        return $this->belongsTo(Role::class, 'plan_id');
    }

    //currency-tenant relationship
    public function currency(){
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    //date-format-tenant relationship
    public function dateFormat(){
        return $this->belongsTo(DefaultDateFormat::class, 'date_format_id');
    }
    //industry-tenant relationship
    public function industry(){
        return $this->belongsTo(Industry::class, 'industry_id');
    }





}
