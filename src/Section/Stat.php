<?php
/**
 * Created by angryjack
 * Date: 2018-12-13 23:56
 */

namespace PecherskiyV\Beget\Section;

use PecherskiyV\Beget\Beget;

/**
 * Класс для сбора статистики
 * @package PecherskiyV\Beget\Section
 */
class Stat extends Beget
{
    public $section = 'stat/';

    /**
     * Метод возвращает информацию о средней нагрузке на сайтах пользователя за последний месяц
     * @return \Psr\Http\Message\StreamInterface
     * @throws \PecherskiyV\Beget\Exception\BegetException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getSiteListLoad()
    {
        return $this->request($this->section, __FUNCTION__);
    }

    /**
     * Метод возвращает информацию о средней нагрузке на базах данных пользователя за последний месяц
     * @return \Psr\Http\Message\StreamInterface
     * @throws \PecherskiyV\Beget\Exception\BegetException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getDbListLoad()
    {
        return $this->request($this->section, __FUNCTION__);
    }

    /**
     * Метод возвращает детальную информацию о нагрузке на указаном сайте (нагрузка по дням и часам)
     * @param $site_id - идентификатор сайта;
     * @return \Psr\Http\Message\StreamInterface
     * @throws \PecherskiyV\Beget\Exception\BegetException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getSiteLoad($site_id)
    {
        $params = array(
            'site_id' => $site_id
        );

        return $this->request($this->section, __FUNCTION__, $params, 'json');
    }

    /**
     * Метод возвращает детальную информацию о нагрузке на указанной базе MySQL
     * @param $db_name - имя базы данных;
     * @return \Psr\Http\Message\StreamInterface
     * @throws \PecherskiyV\Beget\Exception\BegetException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getDbLoad($db_name)
    {
        $params = array(
            'db_name' => $db_name
        );

        return $this->request($this->section, __FUNCTION__, $params, 'json');
    }
}
