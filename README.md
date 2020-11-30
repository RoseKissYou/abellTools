# 工具合集

## 功能
1.0
- 递归实现侧边栏(层级从属关系)（getTree）

## 部署方式

### Composer

```bash
composer update
```

## 数组小工具
```bash
use Abell/AeArrayTool;
$array = [
    ['id'=>1,'pid'=>0,'name'=>'学生'],
    ['id'=>2,'pid'=>1,'name'=>'小敏'],
    ['id'=>3,'pid'=>0,'name'=>'老师'],
    ['id'=>4,'pid'=>3,'name'=>'张三'],
    ['id'=>5,'pid'=>1,'name'=>'小红']
];
$result = AeArrayTool::getTree($data);
var_dump($result);
```
得到的结果
```bash


```