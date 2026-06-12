<?php
/**
 * Этот файл является частью расширения модуля веб-приложения RosGear.
 * 
 * @link https://rosgear.ru/
 * @copyright Copyright (c) 2015 RosGear
 * @license https://rosgear.ru/license/
 */

namespace Rg\Backend\References\Properties\Controller;

use Ge\Mvc\Module\BaseModule;
use Ge\Panel\Widget\EditWindow;
use Ge\Panel\Controller\FormController;

/**
 * Контроллер формы свойства элемента интерфейса.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Rg\Backend\References\Properties\Controller
 * @since 1.0
 */
class Form extends FormController
{
    /**
     * {@inheritdoc}
     * 
     * @var BaseModule|\Rg\Backend\References\Properties\Extension
     */
    public BaseModule $module;

    /**
     * {@inheritdoc}
     */
    public function createWidget(): EditWindow
    {
        /** @var EditWindow $window */
        $window = parent::createWidget();

        // панель формы (Ge.view.form.Panel GeJS)
        $window->form->router->route = $this->module->route('/form');
        $window->form->loadJSONFile('/form', 'items');
        $window->form->bodyPadding = 10;
        $window->form->defaults = [
            'labelWidth' => 130,
            'labelAlign' => 'right',
            'allowBlank' => false, 
            'anchor'     => '100%'
        ];

        // окно компонента (Ext.window.Window Sencha ExtJS)
        $window->width = 470;
        $window->autoHeight = true;
        $window->resizable = false;
        return $window;
    }
}
