<?php
/**
 * +----------------------------------------------------------------------
 * | 友情链接验证器
 * +----------------------------------------------------------------------
 */
namespace app\admin\validate;

use think\Validate;

class Link extends Validate
{
    protected $rule = [
        'name|网站名称' => [
            'require' => 'require',
        ],
        'url|网站地址' => [
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