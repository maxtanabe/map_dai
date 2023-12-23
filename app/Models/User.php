<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'hometown'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public static function getHometown(){
      return [
        '北海道', '青森県', '岩手県', '宮城県', '秋田県', '山形県', '福島県',
        '茨城県', '栃木県', '群馬県', '埼玉県', '千葉県', '東京都', '神奈川県',
        '新潟県', '富山県', '石川県', '福井県', '山梨県', '長野県', '岐阜県',
        '静岡県', '愛知県', '三重県', '滋賀県', '京都府', '大阪府', '兵庫県',
        '奈良県', '和歌山県', '鳥取県', '島根県', '岡山県', '広島県', '山口県',
        '徳島県', '香川県', '愛媛県', '高知県', '福岡県', '佐賀県', '長崎県',
        '熊本県', '大分県', '宮崎県', '鹿児島県', '沖縄県', '海外',
      ];
    }
    public static function getHometownCoordinates($hometown){
      $coordinates = [
        '北海道' => [43.06417, 141.34694],
        '青森県' => [40.82444, 140.74],
        '岩手県' => [39.70361, 141.1525],
        '宮城県' => [38.26889, 140.87194],
        '秋田県' => [39.71861, 140.1025],
        '山形県' => [38.24056, 140.36333],
        '福島県' => [37.75, 140.46778],
        '茨城県' => [36.34139, 140.44667],
        '栃木県' => [36.56583, 139.88361],
        '群馬県' => [36.39111, 139.06083],
        '埼玉県' => [35.85694, 139.64889],
        '千葉県' => [35.60472, 140.12333],
        '東京都' => [35.6895, 139.6917],
        '神奈川県' => [35.44778, 139.6425],
        '新潟県' => [37.90222, 139.02361],
        '富山県' => [36.69528, 137.21139],
        '石川県' => [36.59444, 136.62556],
        '福井県' => [36.06528, 136.22194],
        '山梨県' => [35.66389, 138.56833],
        '長野県' => [36.65139, 138.18111],
        '岐阜県' => [35.39111, 136.72222],
        '静岡県' => [34.97694, 138.38306],
        '愛知県' => [35.18028, 136.90667],
        '三重県' => [34.73028, 136.50861],
        '滋賀県' => [35.00444, 135.86833],
        '京都府' => [35.02139, 135.75556],
        '大阪府' => [34.68639, 135.52],
        '兵庫県' => [34.69139, 135.18306],
        '奈良県' => [34.68528, 135.83278],
        '和歌山県' => [34.22611, 135.1675],
        '鳥取県' => [35.50361, 134.23833],
        '島根県' => [35.47222, 133.05056],
        '岡山県' => [34.66167, 133.935],
        '広島県' => [34.39639, 132.45944],
        '山口県' => [34.18583, 131.47139],
        '徳島県' => [34.06583, 134.55944],
        '香川県' => [34.34028, 134.04333],
        '愛媛県' => [33.84167, 132.76611],
        '高知県' => [33.55972, 133.53111],
        '福岡県' => [33.60639, 130.41806],
        '佐賀県' => [33.24944, 130.29889],
        '長崎県' => [32.74472, 129.87361],
        '熊本県' => [32.78972, 130.74167],
        '大分県' => [33.23806, 131.6125],
        '宮崎県' => [31.91111, 131.42389],
        '鹿児島県' => [31.56028, 130.55806],
        '沖縄県' => [26.2125, 127.68111],
        '海外' => [0, 0], //海外の場合のデフォルト値
      ];
      return $coordinates[$hometown] ?? $coordinates["海外"];
    }
}
