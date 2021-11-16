<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CoverageSource extends Model
{
    use HasFactory;

    protected $fillable = [
        'table_name',
        'postal_code_field',
        'number_field'
    ];

    public function carrier()
    {
        return $this->belongsTo(Carrier::class);
    }

    public function checkStatus(CoverageSource $source)
    {
        $mysql_external = Schema::connection('mysql_external');
        $status = $mysql_external->hasTable($source->table_name);

        if ($status){
            $columns[] = $source->postal_code_field;
            $columns[] = $source->number_field;
            if (!$mysql_external->hasColumns($source->table_name,$columns)){
                return false;
            }
        }
        return true;
    }

    public function checkCoverage($postal_code, $number=null)
    {
        $query = DB::connection('mysql_external')->table($this->table_name)
            ->where($this->postal_code_field, '=', $postal_code)
            ->when($number,function ($query) use ($number){
                $query->where($this->number_field, '=', $number);
            });
        if (!$query->exists()){
            return false;
        }
        return true;
    }
}
