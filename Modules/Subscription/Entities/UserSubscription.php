<?php

namespace Modules\Subscription\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserSubscription extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','subscription_id'];

    protected static function newFactory()
    {
        return \Modules\Subscription\Database\factories\UserSubscriptionFactory::new();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}
