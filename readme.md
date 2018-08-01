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
- url: `api/user/{id}/edit`
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
            "id": 1,
            "title": "测试标题",
            "content": "测试内容",
            "area_id": 1,
            "user_id": 1,
            "coordinate": "23，22222222,113.22222222",
            "tags": "标签1,标签2,标签3",
            "created_at": "2018-08-01 12:00:46",
            "updated_at": "2018-08-01 12:00:46"
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
    "data": {
        "id": 1,
        "title": "测试标题",
        "content": "测试内容",
        "area_id": 1,
        "user_id": 1,
        "coordinate": "23，22222222,113.22222222",
        "tags": "标签1,标签2,标签3",
        "created_at": "2018-08-01 12:00:46",
        "updated_at": "2018-08-01 12:00:46"
    }
}
```
### 2.4 编辑共享雨伞条目
- url: `api/item/{id}/edit`
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
    "data": {
        "id": 1,
        "title": "测试标题",
        "content": "测试内容",
        "area_id": "1",
        "user_id": "1",
        "coordinate": "23，22222222,113.22222222",
        "tags": "标签1,标签2,标签3",
        "created_at": "2018-08-01 12:00:46",
        "updated_at": "2018-08-01 12:24:25"
    }
}
```
## 2.5 删除共享雨伞条目信息
- url: `api/item/{id}`
- 参数

| 参数   |      说明      |  Demo |
|----------|:-------------:|-------|
| id |  来自 `/api/item` 返回的 id 值 | api/user/2

- 请求方式: DELETE
- 返回格式
```json
{
    "errmsg": "",
    "errcode": "0",
    "data": {
        "id": 1,
        "title": "测试标题",
        "content": "测试内容",
        "area_id": 1,
        "user_id": 1,
        "coordinate": "23，22222222,113.22222222",
        "tags": "标签1,标签2,标签3",
        "created_at": "2018-08-01 12:00:46",
        "updated_at": "2018-08-01 12:00:46"
    }
}
```

##  errcode 错误代码一览
- 0：          正常
- 500000:     授权失败
- 500404:     未找到所请求的资源
- 500501:     服务器原因导致的数据更新失败
- 500502:     服务器原因导致的数据创建失败
- 500503:     服务器原因导致的数据删除失败
> 错误提示可参考返回对象中的 errmsg