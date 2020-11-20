<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
  // 通常created_atとupdated_at自動更新されるが、それを無効にする
  public $timestamps = false;
}
