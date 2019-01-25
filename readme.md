# laravel练习项目

    - 通过Homestead虚拟机安装配置
    - PHP 7.2

    [安装参考链接](https://laravel-china.org/docs/laravel/5.5/installation/1282)

    实现了对文章和评论的增删改查

        
        Route::resource('articles', 'ArticleController');
        Route::resource('comments', 'CommentController');
        
    1. Eloquent 可以使用create批量赋值，seeder中可直接插入数组来使用

