<?php

namespace App\Models\helper;

/**
 * Trait TableNameTrait
 *
 * table name trait
 *
 * @author  luotao
 * @version 1.0
 * @package App\Models\helper
 */
trait TableNameTrait
{
    /**
     * 获取表名称
     *
     * @return string
     */
    public static function tableName() : string
    {
        return (new static)->getTable();
    }
}
