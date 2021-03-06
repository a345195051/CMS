<?php
/**
 * +----------------------------------------------------------------------
 * | 广告分组验证器
 * +----------------------------------------------------------------------
 */
namespace app\admin\validate;

use think\Validate;

class AdType extends Validate
{
    protected $rule = [
        'name|分组名称' => [
            'require' => 'require',
        ],
        'sort|排序' => [
            'require' => 'require',
            'number' => 'number',
        ],
        'status|状态' => [
            'require' => 'require',
        ]
    ];
}