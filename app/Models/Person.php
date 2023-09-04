<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $table = 'people';

    protected $fillable =[
    
        'Name',
        'Surname',
        'Phone_Number',
        'Email_Adress',
        'Country',
        'City',
        'Street',
        'Apartment_Number'
            
    ];
}
