<?php

namespace App\Models\helper;

use SuperHappysir\Support\Constant\Enum\DeletedStateEnum;
use SuperHappysir\Support\Constant\Enum\StateEnum;

/**
 * Trait StateJudgeTrait
 *
 * Judging state trait
 *
 * @author  SuperHappysir
 * @version 1.0
 * @package App\Models\helper
 */
trait StateJudgeTrait
{
    /**
     * 已删除状态
     *
     * @return bool
     */
    public function hasDeleted() : bool
    {
        return (int) $this->is_deleted === DeletedStateEnum::IS_DELETED;
    }
    
    /**
     * 未删除状态
     *
     * @return bool
     */
    public function notDelete() : bool
    {
        return !$this->hasDeleted();
    }
    
    /**
     * 已启用状态
     *
     * @return bool
     */
    public function isEnabled() : bool
    {
        return (int) $this->state === StateEnum::ENABLED;
    }
    
    /**
     * 已禁用状态
     *
     * @return bool
     */
    public function isDisabled() : bool
    {
        return (int) $this->state === StateEnum::DISABLED;
    }
    
    /**
     * 待处理状态
     *
     * @return bool
     */
    public function isPending() : bool
    {
        return (int) $this->state === StateEnum::AWAITING;
    }
    
    /**
     * 待处理状态
     *
     * @return bool
     */
    public function isNormality() : bool
    {
        return $this->notDelete() && $this->isEnabled();
    }
}
