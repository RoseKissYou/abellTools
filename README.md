# 工具合集

## 功能
1.0
- 递归实现侧边栏(层级从属关系)（getTree）

## 部署方式

### Composer

```bash
composer require abell/tools
```

## 数组小工具
```bash
use Abell/AeArrayTool;

...

public function hello()
    {
        $array = [
            ['id'=>1,'pid'=>0,'name'=>'学生'],
            ['id'=>2,'pid'=>1,'name'=>'小敏'],
            ['id'=>3,'pid'=>0,'name'=>'老师'],
            ['id'=>4,'pid'=>3,'name'=>'张三'],
            ['id'=>5,'pid'=>1,'name'=>'小红']
        ];
        $result = AeArrayTool::getTree($array);
        return json_encode($result);
    }
```
得到的结果
```bash
[
    {
        "id": 1,
        "pid": 0,
        "name": "学生",
        "level": 1,
        "son": [
            {
                "id": 2,
                "pid": 1,
                "name": "小敏",
                "level": 2,
                "son": []
            },
            {
                "id": 5,
                "pid": 1,
                "name": "小红",
                "level": 2,
                "son": []
            }
        ]
    },
    {
        "id": 3,
        "pid": 0,
        "name": "老师",
        "level": 1,
        "son": [
            {
                "id": 4,
                "pid": 3,
                "name": "张三",
                "level": 2,
                "son": []
            }
        ]
    }
]
```
下面一个是去除了目录里面的空son项

