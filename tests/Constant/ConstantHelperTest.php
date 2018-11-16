<?php

namespace Tests\Feature;

use App\Constant\DeletedStateEnum;
use Tests\TestCase;

class ConstantHelperTest extends TestCase
{
    /**
     * 测试常量名称映射获取方法Null值情况
     *
     * @return void
     */
    public function testHelperGetNameIsNull() : void
    {
        $field = 15151321;
        
        $this->assertNull(DeletedStateEnum::getName($field));
    }
    
    /**
     * 测试常量名称映射获取方法非Null值情况
     *
     * @return void
     */
    public function testHelperGetNameNotNull() : void
    {
        $this->assertNotNull(DeletedStateEnum::getName(DeletedStateEnum::IS_DELETED));
        $this->assertSame(DeletedStateEnum::getName(DeletedStateEnum::IS_DELETED), '删除');
    }
}
