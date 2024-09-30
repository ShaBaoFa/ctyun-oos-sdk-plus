# Ctyun-oos-sdk-php V6

天翼云官方不再对 `oos-php-sdk` 进行更新维护了, 为了保持稳定性，我将对 `oos-php-sdk` 的依赖包进行更新。

## change log

### 2024.09.30
- 修复 **OSS** `SIGN_URL` 针对 `STS_TOKEN` 进行签名时报错
- 新增 **IAM** `GET_SESSION_TOKEN` 获取 `STS` 临时凭证接口


```
composer create-project hyperf/component-creator
```
