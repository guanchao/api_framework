# API接口通用框架

`备注：总结中可能还有诸多不完善的地方，后续还会持续完善`

下面的开发规范是在做了多个项目后总结提炼的一个接口框架，专门适用于`API接口开发`的场景，主要考美观、日志定位方便、可读性好等特点。这里接口的调用统一采用POST方法。  

备注：这里选择CI框架而不选择目使用最多的Laravel框架，主要考虑两点：
> （1）CI框架性能优于Laravel  
> （2）CI框架比较轻，而Laravel框架比较重型，比较适合于后台管理系统的开发场景  

## 标准输入：
```
{
	"Action": "DemoAction",
	"Version": "2019-01-01",
	"Language": "zh",

	"Field1": "",
	"Field2": "",
	"Fieldn": "",

}
```
说明：  
（1）Action：接口名，每一个接口名对应框架中的一个PHP控制器类文件  
（2）Version：版本号  
（3）Language：支持多国语言（这里也可以在请求头中的Accept-Language设置）  
（4）其他字段：请求的输入数据  


## 标准输出：
```
{
    "Response":{
        "Action":"DemoAction",
        "Data":[

        ],
        "RequestId":"6ef60bec-0242-43af-bb20-270359fb54a7",
        "RetCode":0,
        "RetMsg":"Success"
    }
}
```
说明：  
（1）Action：接口名，每一个接口名对应框架中的一个PHP控制器类  
（2）Data：返回的数据保存在该字段  
（3）RequestId：输入和输出中RequestId都是唯一的并且相等，这个方便后期出现问题时能快速排查定位  
（4）RetCode：返回码，0表示成功，非0表示失败，具体映射可扩展  
（5）RetMsg：返回消息  


## 接口实例：
### Request：
curl http://localhost -d '{"Action":"DemoAction","Version":"2019-01-01","Language":"zh","name":"shuwoom","blog":"shuwoom.com"}'

### Response：
```
{
    "Response":{
        "Action":"DemoAction",
        "Data":[

        ],
        "RequestId":"111111111-1111-1111-1111-1111111111",
        "RetCode":0,
        "RetMsg":"Success"
    }
}
```
