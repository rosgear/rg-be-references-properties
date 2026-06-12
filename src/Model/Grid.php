<?php
/**
 * Этот файл является частью расширения модуля веб-приложения RosGear.
 * 
 * @link https://rosgear.ru/
 * @copyright Copyright (c) 2015 RosGear
 * @license https://rosgear.ru/license/
 */

namespace Rg\Backend\References\Properties\Model;

use Ge\Panel\Data\Model\GridModel;

/**
 * Модель данных спииска свойств элементов интерфейса.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Rg\Backend\References\Properties\Model
 * @since 1.0
 */
class Grid extends GridModel
{
    /**
     * {@inheritdoc}
     */
    public function getDataManagerConfig(): array
    {
        return [
            'tableName' => '{{reference_properties}}',
            'primaryKey' => 'id',
            'useAudit'   => false,
            'order'      => ['name' => 'ASC'],
            'fields'     => [
                ['type'], // тип
                ['name'], // название
                ['nameLo'],
                ['property'], // свойство
                ['editor'], // редактор
            ],
            'resetIncrements' => ['{{reference_properties}}']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function init(): void
    {
        parent::init();

        $this
            ->on(self::EVENT_AFTER_DELETE, function ($someRecords, $result, $message) {
                // всплывающие сообщение
                $this->response()
                    ->meta
                        ->cmdPopupMsg($message['message'], $message['title'], $message['type']);
                /** @var \Ge\Panel\Controller\GridController $controller */
                $controller = $this->controller();
                // обновить список
                $controller->cmdReloadGrid();
            });
    }

    /**
     * {@inheritdoc}
     */
    public function prepareRow(array &$row): void
    {
        // заголовок контекстного меню записи
        $row['popupMenuTitle'] = $row['property'];
    }

    /**
     * {@inheritdoc}
     */
    public function fetchRow(array $row): array
    {
        if ($row['name']) {
            $row['nameLo'] = $this->module->t($row['name']);
        }
        return $row;
    }
}
