<?php

namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

class Peticione extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descripcion', 'destinatario', 'firmantes', 'estado', 'categoria_id'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function firmas()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
    public function files()
    {
        return $this->hasMany(File::class);
    }
}
