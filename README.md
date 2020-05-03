# Vnil平台接口文档
## 说明：
### 访问地址：

	接口域名：https://api.vnil.cn

### 接口返回数据判断：
	
	所有接口中都会返回状态码"code"字段，客户端可根据状态码"code"来判断数据获取、修改是否成功
	"code"为0：表示数据获取成功
	"code"非0：表示数据获取失败。具体失败原因，请参考："附录1：错误码信息查询"


## 一、Vnil在线服务接口
### 1.1. 短网址生成
**适用场景：**  
**URL：/api/shorturl/create**  
**请求方式：GET/POST**  
**请求参数：**  

|字段|类型|必填|备注|赋值|
|---|---|---|---|---|  
|appkey|string|Y|appkey||
|url|string|Y|长地址||
|type|string|Y|生成短网址类型，sina:新浪短网址，tencent：腾讯短网址，sohu：sohu短网址||

**返回结果：**  
**成功：**  

	{"code":0,"msg":"success","body":{"short_url":"http:\/\/t.cn\/A6AxK9ee","type":"sina"}}
	
**失败：**	

	{"code":10001,"msg":"parameter lost","body":[]}

**返回字段注释** 

|字段名|注释|备注|
|---|---|---|
|short_url|生成的短地址||
|type|生成短网址类型||

### 1.2. 微信域名检测
**适用场景：用于用户检测域名是否在微信中被封**  
**URL：/api/check/deal/wx**  
**请求方式：GET/POST**  
**请求参数：**  

|字段|类型|必填|备注|赋值|
|---|---|---|---|---|  
|appkey|string|Y|appkey||
|domain|string|Y|域名地址|例如："https://www.vnil.cn"|

**返回结果：**  

**成功：**  

	{"code":0,"msg":"success","body":{"seal":0}}
	
**失败：**	

	{"code":10001,"msg":"parameter lost","body":[]}

**返回字段注释** 

|字段名|注释|备注|
|---|---|---|
| seal |状态：0为域名正常，1为域名被封||


### 1.3. QQ域名检测
**适用场景：用于用户检测域名是否在QQ中被封**  
**URL：/api/check/deal/qq**  
**请求方式：GET/POST**  
**请求参数：**  

|字段|类型|必填|备注|赋值|
|---|---|---|---|---|  
|appkey|string|Y|appkey||
|domain|string|Y|域名地址|例如："https://www.vnil.cn"|

**返回结果：**  

**成功：**  

	{"code":0,"msg":"success","body":{"seal":0}}
	
**失败：**	

	{"code":10001,"msg":"parameter lost","body":[]}

**返回字段注释** 

|字段名|注释|备注|
|---|---|---|
| seal |状态：0为域名正常，1为域名被封||

### 1.4. 域名备案信息查询
**适用场景：查询域名备案信息**  
**URL：/api/icp/deal**  
**请求方式：GET/POST**  
**请求参数：**  

|字段|类型|必填|备注|赋值|
|---|---|---|---|---|  
|appkey|string|Y|appkey||
|domain|string|Y|域名地址|例如："https://www.baidu.com"|

**返回结果：**  

**成功：**  

	{"code":0,"msg":"success","body":{"check":1,"org":"北京百度网讯科技有限公司","icp_num":"京ICP证030173号-1"}}
	
  
**失败：**	

	{"code":10001,"msg":"parameter lost","body":[]}

**返回字段注释** 

|字段名|注释|备注|
|---|---|---|
|check|查询结果：1为有备案信息，0为无备案信息||
|org|单位名称||
|icp_num|ICP备案号||

## 附录
	
### 1、错误码信息查询
|注释|备注|
|---|---|
|0|成功|
|10001|请求参数缺失|
|10002|非法请求|
|10003|数据不存在|
|10004|操作失败|
|10005|url地址有误|
|10006|不支持的短地址类型|
|10007|频率限制|
|10008|appkey错误|
|10009|账户余额不足|
