使用说明：

1. 在phpstudy中设置站点,www.sitename.com
2. 重新安装，数据库设置为root，111111
3. 导入原来的数据库D:\PHP\db\db-v8012.sql，命令行进入mysql,命令参考导入数据库 source D:\PHP\db\db-v8012.sql
4. \application\config\config.php中设置站点地址,和php服务器上的设置一致：$config['base_url'] = 'http://www.sitename.com';

5. 访问http://www.tst.com/index.php/admin/progs
6. 用户名和密码a,
