<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;
    protected $table = "produks";
    protected $fillable = ['nama','harga', 'total', 'deskripsi', 'image'];

    //membuat relasi one to many dengan model "produk"
    public function produk()
    {
        //data Model 'destinasi' bisa dimiliki oleh Model 'Author'
        //melalui fk "produk-id"
        return $this->belongsTo('App\Models\produk', 'nama');
    }
    function image()
    {
        if ($this->image && file_exists(public_path('images/produk/' . $this->image)))
            return asset('images/produk/' . $this->image);
        else
            return asset('images/no_image.png');
    }

    function delete_image()
    {
        if ($this->image && file_exists(public_path('images/produk/' . $this->image)))
            return unlink(public_path('images/produk/' . $this->image));
    }
}
