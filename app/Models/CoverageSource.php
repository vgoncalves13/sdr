<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CoverageSource extends Model
{
    /**
     * @var int LEAD_STATUS_NO_COVER Leads with status NO_COVER
     */
    const LEAD_STATUS_NO_COVER = 'NO_COVER';

    /**
     * @var int LEAD_STATUS_EXACT Leads with status EXACT
     */
    const LEAD_STATUS_EXACT = 'EXACT';

    /**
     * @var int LEAD_STATUS_A Leads with status A, number below and above +500
     */
    const LEAD_STATUS_A = 'A';

    /**
     * @var int LEAD_STATUS_A Leads with status B, number below and above +1000
     */
    const LEAD_STATUS_B = 'B';

    /**
     * @var int LEAD_STATUS_A Leads with status C, number below and above +1500
     */
    const LEAD_STATUS_C = 'C';

    /**
     * @var int LEAD_STATUS_A Leads with status D, number below and above +2000
     */
    const LEAD_STATUS_D = 'D';


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

    /**
     * @param CoverageSource $source
     * @return bool
     */
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

    /**
     * @param $postal_code
     * @param null $number
     * @return int|string
     */
    public function checkPostalCodeCoverage($postal_code)
    {
        $query = DB::connection('mysql_external')->table($this->table_name)
            ->where($this->postal_code_field, '=', $postal_code);
        if (!$query->exists()){
            return false;
        }
        return true;
    }

    public function setLeadClassification($postal_code, $number)
    {
        $query = DB::connection('mysql_external')->table($this->table_name)
            ->where($this->postal_code_field, '=', $postal_code);

        //EXACT
        $query->where($this->number_field, $number);
        if ($query->exists()){
            return self::LEAD_STATUS_EXACT;
        }
        //A
        $query->whereBetween($this->number_field, [$number, $number+500]);
        if ($query->exists()){
            return self::LEAD_STATUS_A;
        }
        //B
        $query->whereBetween($this->number_field, [$number+501, $number+1000]);
        if ($query->exists()){
            return self::LEAD_STATUS_B;
        }
        //C
        $query->whereBetween($this->number_field, [$number+1001, $number+1500]);
        if ($query->exists()){
            return self::LEAD_STATUS_C;
        }
        return self::LEAD_STATUS_NO_COVER;
    }
}
