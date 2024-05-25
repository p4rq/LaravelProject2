<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Laravel\Sanctum\HasApiTokens;
use Exception;
use App\Mail\SendEmailCode;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;
    use Notifiable;
    use HasApiTokens;

    protected $fillable = ['name', 'email', 'password', 'phone_number'];
    protected $hidden = ['password', 'remember_token'];
    protected $casts = ['email_verified_at' => 'datetime'];

    /**
     * Send email verification code to the user.
     *
     * @return void
     */
    public function sendEmailVerificationCode()
    {
        // Generate a verification code
        $verificationCode = mt_rand(100000, 999999);

        try {
            // Store the verification code in the database
            $userEmailCode = SendEmailCode::create([
                'user_id' => $this->id,
                'code' => $verificationCode,
            ]);

            // Send the verification code via email
            Mail::to($this->email)->send(new SendEmailCode($verificationCode));

            // You can handle success message or logging here
        } catch (Exception $e) {
            // Handle exception (e.g., log error, display error message)
        }
    }
    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'user_movies')->withTimestamps();
    }
}
