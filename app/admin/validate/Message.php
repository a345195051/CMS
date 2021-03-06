<?php
/**
 * +----------------------------------------------------------------------
 * | 留言模块验证器
 * +----------------------------------------------------------------------
 */
namespace app\admin\validate;

use think\Validate;

class Message extends Validate
{
    protected $rule = [
        'title|标题' => [
            'require' => 'require',
        ],
        'cate_id|栏目' => [
            'require' => 'require',
        ],
        'status|状态' => [
            'require' => 'require',
            'max' => '1',
        ],
        'name|姓名' => [
            'max' => '255',
        ],
        'phone|电话' => [
            'max' => '255',
        ]
    ];
}