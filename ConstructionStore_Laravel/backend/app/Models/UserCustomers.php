<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCustomers extends Model
{
    use HasFactory;
    protected $table = 'user_customers';
    protected $fillable = ['name','email','phone','address'];
}
