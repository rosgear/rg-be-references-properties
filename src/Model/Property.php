<?php
/**
 * Этот файл является частью модуля веб-приложения RosGear.
 * 
 * @link https://rosgear.ru/
 * @copyright Copyright (c) 2015 RosGear
 * @license https://rosgear.ru/license/
 */

namespace Rg\Backend\References\Properties\Model;

use Ge\Db\ActiveRecord;

/**
 * Активная запись свойства элемента интерфейса.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Rg\Backend\References\Properties\Model
 * @since 1.0
 */
class Property extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public function tableName(): string
    {
        return '{{reference_properties}}';
    }

    /**
     * {@inheritdoc}
     */
    public function primaryKey(): string
    {
        return 'id';
    }

    /**
     * {@inheritDoc}
     */
    public function maskedAttributes(): array
    {
        return [
            'id'       => 'id', // идентификатор
            'property' => 'property', // название свойства
            'name'     => 'name', // название
            'type'     => 'type', // тип
            'editor'   => 'editor' // редактор свойств
        ];
    }

    /**
     * Возвращает все идентификаторы свойств в виде тегов.
     *
     * @return array
     */
    public function getAllTags(): array
    {
        /** @var \Ge\Db\Adapter\Adapter $db */
       $db = $this->getDb();

        /** @var \Ge\Db\Sql\Select $select */
        $select = $db
            ->select($this->tableName())
            ->columns(['id', 'property']);
        return $db->createCommand($select)->queryToCombo('property', 'property');
    }
}
