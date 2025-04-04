<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Ramsey\Uuid\Uuid;

class Category extends Model
{
    use HasFactory; use Notifiable;

    protected $table = 'categories';
    protected $keyType = 'uuid';
    public $incrementing = false;
    protected $primaryKey = 'id';

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Model $model) {
            // $model->id = Uuid::uuid4()->toString();
            if (empty($model->id)) {
                $model->id = Uuid::uuid4()->toString();
                // $model->id = (string) Str::uuid();
            }
        });
    }

    protected $fillable = [
        'category_name',
        'slug',
        'description',
    ];

    public function products(){
        return $this->hasMany(Product::class); 
    }
}
