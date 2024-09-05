<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'customers';

    protected $fillable = [
        'name',
        'email',
        'gender',
        'phone',
        'age',
        'date_of_birth',
        'photo',
        'cpf',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'age' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'gender' => 'string',
        'phone' => 'string',
        'cpf' => 'string',
    ];

    protected $dates = ['deleted_at'];

    public function setPhotoAttribute($value)
    {
        if ($value instanceof \Illuminate\Http\UploadedFile) {
            $this->attributes['photo'] = $value->store('photos', 'public');
        } else {
            $this->attributes['photo'] = $value;
        }
    }

    public function getPhotoUrlAttribute()
    {
        return $this->photo ? asset('storage/' . $this->photo) : null;
    }
}
