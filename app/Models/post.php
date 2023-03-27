<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * Summary of post
 */
class post extends Model
{
    use HasFactory;

    // se envia posts como parametro para que se pueda acceder a los datos de la tabla
    protected $fillable = ['name', 'description'];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getGetExcerptAttribute()
    {
        return substr($this->description, 0, 140);
    }

    public function getGetImageAttribute()
    {
        if ($this->image) {
            return url("storage/$this->image");
        }
    }

    public function getGetCreatedAtAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getGetUpdatedAtAttribute()
    {
        return $this->updated_at->diffForHumans();
    }

    public function getGetStatusAttribute()
    {
        if ($this->status == 1) {
            return 'Publicado';
        } else {
            return 'Borrador';
        }
    }

    public function getGetStatusColorAttribute()
    {
        if ($this->status == 1) {
            return 'success';
        } else {
            return 'warning';
        }
    }

    public function getGetStatusButtonAttribute()
    {
        if ($this->status == 1) {
            return 'warning';
        } else {
            return 'success';
        }
    }

    public function getGetStatusTextAttribute()
    {
        if ($this->status == 1) {
            return 'Borrador';
        } else {
            return 'Publicar';
        }
    }

    public function getGetStatusIconAttribute()
    {
        if ($this->status == 1) {
            return 'fas fa-eye-slash';
        } else {
            return 'fas fa-eye';
        }
    }

    

    

}
