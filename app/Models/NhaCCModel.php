<?php


namespace App\Models;
use App\Entities\NhaCCEntity;

class NhaCCModel extends BaseModel
{
    protected $table      = 'nha_cung_cap';
    protected $primaryKey = 'ma_ncc';
    protected $protectFields = false;
    protected $returnType    = NhaCCEntity::class;
}