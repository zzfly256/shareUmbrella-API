# shareUmbrella Api Documents
- Author: Rytia
- Version: 20180801

## 1. User
### 1.1 登录
- url: `api/user/login`
- 参数

| 参数   |      说明      |  Demo |
|----------|:-------------:|-------|
| verify_request |  来自易班OAuth的回调 | api/user/login?verify_request=ffc07bd78668ec054| 

- 请求方式: GET
- 返回格式: Cookie | user
```json
{
	"userid": "8553831",
	"username": "BabyRytia",
	"usernick": "BabyRytia",
	"usersex": "M",
	"updated_at": "2018-08-01 06:50:04",
	"created_at": "2018-08-01 06:50:04",
	"id": 1
}
```
- Web APP 打开后将会自动获取授权，前端只需读取 Cookie 中的 user 的信息即可
### 1.2 获取用户信息
- url: `api/user/{id}`
- 参数

| 参数   |      说明      |  Demo |
|----------|:-------------:|-------|
| id |  来自登录时返回的 id 值 | api/user/2

- 请求方式: GET

- 返回格式
```json
{
	"errmsg": "",
	"errcode": "0",
	"data": {
		"id": 1,
		"userid": 8553831,
		"username": "BabyRytia",
		"usernick": "BabyRytia",
		"usersex": "M",
		"wechat": null,
		"major": null,
		"qq": null,
		"phone": null,
		"created_at": "2018-08-01 06:50:04",
		"updated_at": "2018-08-01 06:50:04"
	}
}
```
### 1.3 编辑用户信息
- url: `api/user/{id}`
- 参数

| 参数   |      说明      |  Demo |
|----------|:-------------:|-------|
| id |  来自登录时返回的 id 值，代入 URL 以 GET 方式传送 | api/user/2/edit
| userid | 来自易班的用户 ID，非必须，建议勿动 |
| username | 用户名，非必须 |
| usernick | 昵称，非必须 |
| usersex | 性别，非必须 |
| wechat | 微信，非必须 |
| major | 专业班级，非必须 |
| qq | QQ号，非必须 |
| phone | 手机，非必须 |

- 请求方式: POST | form-data

- 返回格式
```json 
{
	"errmsg": "",
	"errcode": "0",
	"data": {
		"id": 1,
		"userid": 8553831,
		"username": "BabyRytia",
		"usernick": "BabyRytia",
		"usersex": "M",
		"wechat": null,
		"major": null,
		"qq": null,
		"phone": null,
		"created_at": "2018-08-01 06:50:04",
		"updated_at": "2018-08-01 06:50:04"
	}
}
```

### 1.4 获取用户发布的共享条目
 url: `api/user/{id}/items`
- 参数

| 参数   |      说明      |  Demo |
|----------|:-------------:|-------|
| id |  来自登录时返回的 id 值 | api/user/1/items

- 请求方式: GET

- 返回格式
```json
{
    "errmsg": "",
    "errcode": "0",
    "data": [
        {
            "id": 2,
            "title": "测试标题",
            "content": "测试内容",
            "area_id": 1,
            "user_id": 1,
            "coordinate": "23，22222222,113.22222222",
            "tags": "标签1,标签2,标签3",
            "created_at": "2018-08-01 12:44:31",
            "updated_at": "2018-08-01 12:44:31",
            "area_name": "测试区域",
            "usernick": "BabyRytia"
        }
    ]
}
```

## 2. Item
### 2.1 获取全部共享雨伞条目
- url: `api/item`
- 参数: 无
- 请求方式: GET
- 返回格式
```json
{
    "errmsg": "",
    "errcode": "0",
    "data": [
        {
            "usernick": "BabyRytia",
            "area_name": "测试区域",
            "id": 2,
            "title": "测试标题",
            "content": "测试内容",
            "area_id": 1,
            "user_id": 1,
            "coordinate": "23，22222222,113.22222222",
            "tags": "标签1,标签2,标签3",
            "created_at": "2018-08-01 12:44:31",
            "updated_at": "2018-08-01 12:44:31"
        },
        {
           "usernick": "BabyRytia",
           "area_name": "测试区域",
           "id": 3,
           "title": "测试标题",
           "content": "测试内容",
           "area_id": 1,
           "user_id": 1,
           "coordinate": "23，22222222,113.22222222",
           "tags": "标签1,标签2,标签3",
           "created_at": "2018-08-01 12:44:31",
           "updated_at": "2018-08-01 12:44:31"
        }
    ]
}
```

### 2.2 创建共享雨伞条目
- url: `api/item`
- 参数

| 参数   |      说明      |  Demo |
|----------|:-------------:|-------|
| title |  标题，必须 |
| content | 内容，必须 |
| coordinate | 坐标，必须，来自 `geolocation` |
| area_id | 区域 ID，必须，请从 `/api/area` 获取区域的 ID 列表 | 
| user_id | 用户 ID，必须
| tags | 标签，非必须。多个请用英文逗号分隔

- 请求方式: POST | form-data

- 返回格式
```json
{
    "errmsg": "创建成功",
    "errcode": "0",
    "data": ""
}
```

## 2.3 获取共享雨伞条目信息
- url: `api/item/{id}`
- 参数

| 参数   |      说明      |  Demo |
|----------|:-------------:|-------|
| id |  来自 `/api/item` 返回的 id 值 | api/user/2

- 请求方式: GET
- 返回格式
```json
{
    "errmsg": "",
    "errcode": "0",
    "data": [
        {
            "usernick": "BabyRytia",
             "area_name": "测试区域",
             "id": 2,
             "title": "测试标题",
             "content": "测试内容",
             "area_id": 1,
             "user_id": 1,
             "coordinate": "23，22222222,113.22222222",
             "tags": "标签1,标签2,标签3",
             "created_at": "2018-08-01 12:44:31",
             "updated_at": "2018-08-01 12:44:31"
        }
    ]
}
```
### 2.4 编辑共享雨伞条目
- url: `api/item/{id}`
- 参数

| 参数   |      说明      |  Demo |
|----------|:-------------:|-------|
| id |  来自 `/api/item` 的 id 值，代入 URL 以 GET 方式传送 | api/item/1/edit
| title |  标题，必须 |
| content | 内容，必须 |
| coordinate | 坐标，必须，来自 `geolocation` |
| area_id | 区域 ID，必须，请从 `/api/area` 获取区域的 ID 列表 | 
| user_id | 用户 ID，必须
| tags | 标签，非必须。多个请用英文逗号分隔

- 请求方式: POST | form-data

- 返回格式
```json
{
    "errmsg": "",
    "errcode": "0",
    "data": [
        {
            "usernick": "BabyRytia",
            "area_name": "测试区域",
            "id": 2,
            "title": "测试标题",
            "content": "测试内容",
            "area_id": 1,
            "user_id": 1,
            "coordinate": "23，22222222,113.22222222",
            "tags": "标签1,标签2,标签3",
            "created_at": "2018-08-01 12:44:31",
            "updated_at": "2018-08-01 12:44:31"
        }
    ]
}
```
## 2.5 删除共享雨伞条目信息
- url: `api/item/{id}`
- 参数

| 参数   |      说明      |  Demo |
|----------|:-------------:|-------|
| id |  来自 `/api/item` 返回的 id 值 | api/item/2

- 请求方式: DELETE
- 返回格式
```json
{
    "errmsg": "删除成功",
    "errcode": "0",
    "data": ""
}
```

## 2.6 检索共享雨伞条目
- url: `api/item/search/{target}`
- 参数

| 参数   |      说明      |  Demo |
|----------|:-------------:|-------|
| target | 搜索的类型，支持 `title`, `tag`, `usernick`, `coordinate` | api/item/search/title?content=测试
| content | 搜索的内容，请传入字符串类型数据，经纬度如所示 | api/item/search/coordinate?content=113.233,23.455

- 请求方式: GET
- 返回格式
```json
{
    "errmsg": "",
    "errcode": "0",
    "data": [
        {
            "usernick": "BabyRytia",
            "area_name": "测试区域",
            "id": 2,
            "title": "测试标题",
            "content": "测试内容",
            "area_id": 1,
            "user_id": 1,
            "coordinate": "23，22222222,113.22222222",
            "tags": "标签1,标签2,标签3",
            "created_at": "2018-08-01 12:44:31",
            "updated_at": "2018-08-01 12:44:31"
        }
    ]
}
```
- 注意：该接口由于兼顾特殊字符，并未遵循 RESTful API 风格

## 3. Area
### 3.1 获取全部区域
- url: `api/area`
- 参数: 无
- 请求方式: GET
- 返回格式
```json
{
    "errmsg": "",
    "errcode": "0",
    "data": [
        {
            "id": 1,
            "area_name": "测试区域"
        }
    ]
}
```

### 3.2 获取区域信息
- url: `api/area/{id}`
- 参数: 

| 参数   |      说明      |  Demo |
|----------|:-------------:|-------|
| id |  来自 `/api/area` 返回的 id 值 | api/area/1

- 请求方式: GET
- 返回格式
```json
{
    "errmsg": "",
    "errcode": "0",
    "data": {
        "id": 1,
        "area_name": "测试区域"
    }
}
```

### 3.3 获取该区域下的共享雨伞条目
- url: `api/area/{id}/items`
- 参数: 

| 参数   |      说明      |  Demo |
|----------|:-------------:|-------|
| id |  来自 `/api/area` 返回的 id 值 | api/area/1/items

- 请求方式: GET
- 返回格式
```json
{
    "errmsg": "",
    "errcode": "0",
    "data": [
        {
            "usernick": "BabyRytia",
            "area_name": "测试区域",
            "id": 2,
            "title": "测试标题",
            "content": "测试内容",
            "area_id": 1,
            "user_id": 1,
            "coordinate": "23，22222222,113.22222222",
            "tags": "标签1,标签2,标签3",
            "created_at": "2018-08-01 12:44:31",
            "updated_at": "2018-08-01 12:44:31"
        }
    ]
}
```

## 附： errcode 错误代码一览
- 0：          正常
- 500000:     授权失败
- 500400:     请求参数不完整
- 500404:     未找到所请求的资源
- 500501:     服务器原因导致的数据更新失败
- 500502:     服务器原因导致的数据创建失败
- 500503:     服务器原因导致的数据删除失败
> 错误提示可参考返回对象中的 errmsg