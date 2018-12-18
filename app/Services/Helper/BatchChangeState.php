<?php

namespace App\Services\Helper;

use App\Repository\Contracts\BaseRepostitory;
use Illuminate\Database\Eloquent\Builder;
use SuperHappysir\Constant\StateEnum;

/**
 * trait BatchChangeState
 *
 * 批量启用禁用trait
 *
 * @author  luotao
 * @version 1.0
 * @package App\Services\Helper
 */
trait BatchChangeState
{
    /**
     * @var BaseRepostitory
     */
    protected $repostitory;
    
    /**
     * 批量启用用记录
     *
     * @param array $idArr
     *
     * @return int
     */
    public function batchEnabled(array $idArr) : int
    {
        if (empty($idArr)) {
            return 0;
        }
        
        $attr = [ 'state' => StateEnum::ENABLED ];
        
        return $this->repostitory->updateWhere($attr, function (Builder $builder) use ($idArr) {
            $builder->whereIn('id', $idArr);
        });
    }
    
    /**
     * 批量禁用用记录
     *
     * @param array $idArr
     *
     * @return int
     */
    public function batchDisabled(array $idArr) : int
    {
        if (empty($idArr)) {
            return 0;
        }
        
        $attr = [ 'state' => StateEnum::DISABLED ];
        
        return $this->repostitory->updateWhere($attr, function (Builder $builder) use ($idArr) {
            $builder->whereIn('id', $idArr);
        });
    }
    
    /**
     * @param BaseRepostitory $repostitory
     */
    protected function setRepostitory(BaseRepostitory $repostitory) : void
    {
        $this->repostitory = $repostitory;
    }
}
