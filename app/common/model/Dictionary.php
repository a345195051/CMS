<?php
/**
 * +----------------------------------------------------------------------
 * | 字典数据模型
 * +----------------------------------------------------------------------
 */
namespace app\common\model;

// 引入框架内置类
use think\facade\Request;

// 引入构建器
use app\common\facade\MakeBuilder;

class Dictionary extends Base
{
    // 定义时间戳字段名
    protected $createTime = 'create_time';
    protected $updateTime = 'update_time';

    
    public function dictionaryType()
    {
        return $this->belongsTo('DictionaryType', 'dict_type');
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
            if ($list[$k]['dict_type']) {
                $v['dict_type'] = $v->dictionaryType->getData('dict_name');
            }
        }
        return MakeBuilder::changeTableData($list, 'Dictionary');
    }

    // 导出列表
    public static function getExport($where = array(), $order = ['sort', 'id' => 'desc'])
    {
        $list = self::where($where)
            ->order($order)
            ->select();
        foreach ($list as $k => $v) {
            if ($list[$k]['dict_type']) {
                $v['dict_type'] = $v->dictionaryType->getData('dict_name');
            }
        }
        return MakeBuilder::changeTableData($list, 'Dictionary');
    }

}