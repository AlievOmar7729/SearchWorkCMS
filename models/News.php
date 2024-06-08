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
 * @property string $filename
 * @property int admin_id ID адміна , який опублікував новину
 */
class News extends Model
{
    public static string $tableName = "news";
    public static string $primaryKey = 'news_id';

}