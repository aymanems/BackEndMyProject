<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Foundation\Auth\User as Authenticatable; // Importez le trait Authenticatable


class Student extends Model
{
    use HasFactory;
    protected $table='students';
    protected $fillable=[
                            'registration',
                            'codercp',
                            'cin',
                            'familyname',
                            'dateofbirth',
                            'country',
                            'picture',
                            'university', 
                            'speciality',
                            'level',
                            'cost',
                            'amountpay',
                            'amountremaining',
                            'integrationdate',
                            'enddate',
                            'phone',
                            'statut',
                            'user_id',
                        ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

}
