<?php
/**
 * +----------------------------------------------------------------------
 * | 广告管理模型
 * +----------------------------------------------------------------------
 */
namespace app\common\model;

// 引入框架内置类
use think\facade\Request;

// 引入构建器
use app\common\facade\MakeBuilder;

class Ad extends Base
{
    // 定义时间戳字段名
    protected $createTime = 'create_time';
    protected $updateTime = 'update_time';

    
    public function adType()
    {
        return $this->belongsTo('AdType', 'type_id');
    }

    // 获取列表
    public static function getList($where = array(), $pageSize, $order = ['sort', 'id' => 'desc'])
    {
        $list = self::where($where)
            ->order($order)
            ->paginate([
                'query'     => Request::get(),
                'list_rows' => $pageSize,
            ]);
        foreach ($list as $k => $v) {
            if ($list[$k]['type_id']) {
                $v['type_id'] = $v->adType->getData('name');
            }
        }
        return MakeBuilder::changeTableData($list, 'Ad');
    }

    // 导出列表
    public static function getExport($where = array(), $order = ['sort', 'id' => 'desc'])
    {
        $list = self::where($where)
            ->order($order)
            ->select();
        foreach ($list as $k => $v) {
            if ($list[$k]['type_id']) {
                $v['type_id'] = $v->adType->getData('name');
            }
        }
        return MakeBuilder::changeTableData($list, 'Ad');
    }

}