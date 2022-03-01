<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;
    protected $visible = ['kategori', 'gambar'];
    protected $fillable = ['kategori', 'gambar'];
    public $timestamps = true;

    public function kategori()
    {
        //data model "dataAuthor" bisa memiliki banyak data
        //dari model "Book" melalui fk "author_id"
        $this->hasMany('App\Models\kategori', 'barang_id');
    }

    public function image()
    {
        if ($this->gambar && file_exists(public_path('image/kategoris/' . $this->gambar))) {
            return asset('image/kategoris/' . $this->gambar);
        } else {
            return asset('image/no_image.png');
        }
    }

    public function deleteImage()
    {
        if ($this->gambar && file_exists(public_path('image/kategoris/' . $this->gambar))) {
            return unlink(public_path('image/kategoris/' . $this->gambar));
        }
    }
}
