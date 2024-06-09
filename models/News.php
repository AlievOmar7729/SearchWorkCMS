<?php

namespace models;

use Cassandra\Date;
use core\Core;
use core\Model;


/**
 * @property int $news_id ID новини
 * @property string $title Заголовок новини
 * @property string $news Текст новини
 * @property Date $date_create Дата публікації новини
 * @property string $photourl Посилання на фотографію
 * @property int admin_id ID адміна , який опублікував новину
 */
class News extends Model
{
    public static string $tableName = "news";
    public static string $primaryKey = 'news_id';



    public static function AddNews($title,$newsText,$photourl,$admin_id): void
    {
        $news = new News();
        $news->title = $title;
        $news->news = $newsText;
        $news->photourl = $photourl;
        $news->admin_id = $admin_id;
        $news->date_create = date('Y-m-d');

        $news->save();
    }


    public static function ViewAllNews()
    {
        return self::selectOrderByDESC('date_create');
    }

    public static function ViewNews($news_id)
    {
        return self::findById($news_id);
    }



}