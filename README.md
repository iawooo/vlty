# 1.介绍
## 这是一个采用Vercel 一键部署 Typecho 博客的项目。

# 2.如何使用？
## 将这个仓库star，并fork。
### 复制环境变量
```dotenv
TYPECHO_DB_HOST="" # 数据库地址
TYPECHO_DB_DATABASE="" # 数据库名称
TYPECHO_DB_USER="" # 数据库用户名
TYPECHO_DB_PASSWORD="" # 数据库密码
TYPECHO_DB_CHARSET="utf8mb4" # 数据库编码
TYPECHO_DB_ENGINE="InnoDB" # 数据库引擎
TYPECHO_DB_PORT="4000" # 数据库端口
TYPECHO_DB_SSL_CA="isrgrootx1.pem" # 数据库SSL证书位置
TYPECHO_DB_SSL_VERIFY="true" # TIDB需要开启
```
## 点击下方
<a href="https://vercel.com/new/import?s=https://github.com/iawooo/vlty&hasTrialAvailable=1&showOptionalTeamCreation=false&project-name=vlty&framework=other&totalProjects=1&remainingProjects=1" target="_blank"><img src="https://vercel.com/button" alt="Deploy with Vercel"></a>
