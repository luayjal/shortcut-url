<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Short_url extends Model
{
    use HasFactory;
  //  protected $tab
    protected $fillable = ['url','shortcut','clicks'];

    public function user(){
      return $this->belongsTo(User::class,'user_id','id')->default('');
    }
}
