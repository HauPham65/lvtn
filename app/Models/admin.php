<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class admin extends Model implements Authenticatable
{
    use HasFactory, Notifiable;

    use HasFactory, Notifiable;

    protected $table = 'admins';

    public function getAuthIdentifierName() {
        return 'id'; // Tên cột chứa ID của người dùng trong bảng 'admin'
    }

    public function getAuthIdentifier() {
        return $this->getKey();
    }

    public function getAuthPassword() {
        return $this->password; // Tên cột chứa mật khẩu của người dùng trong bảng 'admin'
    }

    public function getAuthPasswordName() {
        return 'password'; // Tên cột chứa mật khẩu của người dùng trong bảng 'admin'
    }

    public function getRememberToken() {
        // Cần triển khai nếu bạn sử dụng Remember Token
    }

    public function setRememberToken($value) {
        // Cần triển khai nếu bạn sử dụng Remember Token
    }

    public function getRememberTokenName() {
        // Cần triển khai nếu bạn sử dụng Remember Token
    }
}