# shareUmbrella Api Documents
- Author: Rytia
- Version: 20180730

## User
### 登录
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
### 获取用户信息
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
### 编辑用户信息
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