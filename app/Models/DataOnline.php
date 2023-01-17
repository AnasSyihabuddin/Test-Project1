<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataOnline extends Model
{
    use HasFactory;

    protected $table = 'data_online';
    protected $primaryKey = 'no_pendaftaran';

    static $rules = [
    'nama' => 'required',
    'alamat' => 'required',
    'tanggal_lahir' => 'required',
    'jenis_kelamin' => 'required',
    'asal_sekolah' => 'required',
    'agama_id' => 'required',
    'nilai_ind' => 'required',
    'nilai_ipa' => 'required',
    'nilai_mtk' => 'required'
    ];

    protected $perPage = 20;
   /**
    * Attributes that should be mass-assignable.
    *
    * @var array
    */


    protected $fillable = [
        'nama','alamat','tanggal_lahir','jenis_kelamin',
        'asal_sekolah','agama_id','nilai_ind','nilai_ipa',
        'nilai_mtk'
    ];


    /**
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    /*public function riwayatPangkats()
    {
    return $this->hasMany('App\Models\RiwayatPangkat', 'mst_pangkat_id', 'id');
    }*/

    static function listAgama()
    {
        return array(1=>'Islam',2=>'Katholik',
        3=>'Protestan',4=>'Hindu',
        5=>'Budha',6=>'Konghucu');
    }

    public function getAgama()
    {
        if ($this->agama=="1")
            return "Islam";
        elseif($this->agama=="2")
            return "Katholik";
        elseif($this->agama=="3")
            return "Protestan";
        elseif($this->agama=="4")
            return "Hindu";
        elseif($this->agama=="5")
            return "Budha";
        elseif($this->agama=="6")
            return "Konghucu";
        else
            return "Tidak diketahui";
    }
}
