<?php
/**
 * Этот файл является частью расширения модуля веб-приложения RosGear.
 * 
 * Файл конфигурации Карты SQL-запросов.
 * 
 * @link https://rosgear.ru/
 * @copyright Copyright (c) 2015 RosGear
 * @license https://rosgear.ru/license/
 */

/**
 * Возвращает выдпающий список в качестве редактора свойств
 * 
 * @param array $items Элементы списка.
 * 
 * @return string
 */
function comboEditor(array $items): string
{
    $data = [];
    foreach ($items as $item) {
        $data[] = ['name' => $item];
    }
    return json_encode([
        'xtype'        => 'combo',
        'queryMode'    => 'local',
        'displayField' => 'name',
        'valueField'   => 'name',
        'store'        => ['fields' => ['name'], 'data' => $data]
    ]);
}

return [
    'drop'   => ['{{reference_properties}}'],
    'create' => [
        '{{reference_properties}}' => function () {
            return "CREATE TABLE `{{reference_properties}}` (
                `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `property` varchar(100) DEFAULT NULL,
                `name` varchar(100) DEFAULT NULL,
                `type` varchar(50) DEFAULT NULL,
                `editor` text,
                PRIMARY KEY (`id`)
            ) ENGINE={engine} 
            DEFAULT CHARSET={charset} COLLATE {collate}";
        }
    ],
    'insert' => [
        '{{reference_properties}}' => [
            ['property' => 'allowBlank', 'name' => 'Allow blank', 'type' => 'boolean'], // Разрешить пустое значение
            ['property' => 'allowDecimals', 'name' => 'Allow decimals', 'type' => 'boolean'], // Разрешить десятичные значения
            ['property' => 'allowDepress', 'name' => 'Allow depress button', 'type' => 'boolean'], // Разрешить отжатие нажатой кнопки
            ['property' => 'allowExponential', 'name' => 'Allow уxponential number notation', 'type' => 'boolean'], // Разрешить экспоненциальное представление чисел
            ['property' => 'allowOnlyWhitespace', 'name' => 'Allow trim the value before validating the whether the value is blank', 'type' => 'boolean'], // Обрезать значение перед проверкой значения на пустоту
            ['property' => 'altFormats', 'name' => 'Multiple values formats separated by char', 'type' => 'string'], // Форматы значений разделенных знаком
            [ // Направление стрелки элемента
                'property' => 'arrowAlign', 
                'name'     => 'Arrow align of an element', 
                'type'     => 'string', 
                'editor'   => comboEditor(['right', 'bottom'])
            ],
            ['property' => 'arrowCls', 'name' => 'CSS class of arrow element', 'type' => 'string'], // CSS класс стрелки элемента
            ['property' => 'arrowVisible', 'name' => 'Show element arrow', 'type' => 'boolean'], // Показать стрелку элемента
            [ // Регулировать ширину элемента для места "боковых" сообщений об ошибках
                'property' => 'autoFitErrors', 'name' => 'Adjust element width for error messages', 'type' => 'boolean'
            ], 
            ['property' => 'autoStripChars', 'name' => 'Removing invalid characters', 'type' => 'boolean'], // Удалять недопустимые символы
            ['property' => 'anchor', 'name' => 'Snap to element container dimensions', 'type' => 'string'], // Привязка к размерам контейнера элемента
            ['property' => 'baseCls', 'name' => 'Base CSS class of an element', 'type' => 'string'], // Базовый класс CSS элемента
            ['property' => 'baseChars', 'name' => 'Basic character set for evaluating valid numbers', 'type' => 'string'], // Базовый набор символов для оценки допустимых чисел
            ['property' => 'baseBodyCls', 'name' => 'CSS class applied to the body element', 'type' => 'string'], // Класс CSS применяемый к элементу body
            ['property' => 'blankText', 'name' => 'Blank value error text', 'type' => 'string'], // Текст ошибки пустого значения
            ['property' => 'border', 'name' => 'Element border size', 'type' => 'number'], // Размер границы элемента
            ['property' => 'boxLabel', 'name' => 'Text label next to checkbox', 'type' => 'string'], // Текстовая метка рядом с флажком
            [ // Положение текстовой метки
                'property' => 'boxLabelAlign', 
                'name'     => 'Text label position', 
                'type'     => 'string', 
                'editor'   => comboEditor(['before', 'after'])
            ], 
            ['property' => 'boxLabelCls', 'name' => 'Text label style', 'type' => 'string'], // Стиль текстовой метки
            ['property' => 'buttonMargin', 'name' => 'Distance between element and button', 'type' => 'number'], // Расстояние между элементом и кнопкой
            ['property' => 'buttonOnly', 'name' => 'Show button only', 'type' => 'boolean'], // Отобразить только кнопку
            ['property' => 'buttonText', 'name' => 'Button text', 'type' => 'string'], // Текст кнопки
            ['property' => 'checked', 'name' => 'Checkbox checked', 'type' => 'boolean'], // Флажок установлен
            ['property' => 'checkedCls', 'name' => 'CSS class of a checked checkbox', 'type' => 'string'], // CSS класс установленного флажка
            ['property' => 'cls', 'name' => 'CSS class to add to element', 'type' => 'string'], // Класс CSS добавляемый к элементу
            ['property' => 'clickEvent', 'name' => 'Click event', 'type' => 'string'], // Событие нажатия на элемент
            ['property' => 'closable', 'name' => 'Closable', 'type' => 'boolean'], // Возможность закрыть
            ['property' => 'closeText', 'name' => 'Close text', 'type' => 'string'], // Текстовая метка кнопки закрытия
            ['property' => 'clearOnSubmit', 'name' => 'Clear field value after submit', 'type' => 'boolean'], // Очистить значение поля после submit
            ['property' => 'createLinkText', 'name' => 'Text for request to create a link', 'type' => 'string'], //  Текст для запроса на создание ссылки
            ['property' => 'controller', 'name' => 'Controller', 'type' => 'string'], // Псевдоним контроллера
            ['property' => 'decimalPrecision', 'name' => 'Display precision after decimal point', 'type' => 'number'], // Точность отображения после десятичного разделителя
            ['property' => 'decimalSeparator', 'name' => 'Character(s) to allow as the decimal separator', 'type' => 'string'], // Символы для десятичного разделителя
            ['property' => 'destroyMenu', 'name' => 'Delete menu when element is destroyed', 'type' => 'boolean'], // Удалить меню при уничтожении элемента
            ['property' => 'defaultButtonUI', 'name' => 'Default UI used for element', 'type' => 'string'], // Пользовательский интерфейс по умолчанию, используемый для элемента
            ['property' => 'defaultLinkValue', 'name' => 'Default value for link request', 'type' => 'string'], // Значение по умолчанию для запроса на создание ссылки
            ['property' => 'defaultValue', 'name' => 'Default value', 'type' => 'string'], // Значение по умолчанию
            ['property' => 'dirtyCls', 'name' => 'CSS class of invalid field value', 'type' => 'string'],
            ['property' => 'disabled', 'name' => 'Disabled', 'type' => 'boolean'], // Отключен
            ['property' => 'disabledCls', 'name' => 'Disabled уlement CSS сlass', 'type' => 'string'], // Класс CSS отключенного элемента
            ['property' => 'disabledDates', 'name' => 'Dates to be disabled', 'type' => 'string'], // array Даты, которые необходимо отключить
            [ // Подсказка, отображаемый, когда дата приходится на отключенную дату
                'property' => 'disabledDatesText', 'name' => 'Tooltip text displayed when the date falls on a disabled date', 'type' => 'string'
            ],
            ['property' => 'disabledDays', 'name' => 'Days to disable', 'type' => 'string'], // Дни, которые необходимо отключить
            [ // Подсказка, отображаемая, когда дата приходится на отключенный день
                'property' => 'disabledDaysText', 'name' => 'Tooltip displayed when the date falls on a disabled day', 'type' => 'string'
            ],
            ['property' => 'disableKeyFilter', 'name' => 'Disable keystroke filtering', 'type' => 'boolean'], // Отключить фильтрацию нажатий клавиш
            ['property' => 'editable', 'name' => 'Allowed to change value', 'type' => 'boolean'], // Разрешить изменять значение
            ['property' => 'emptyCls', 'name' => 'CSS class applied to an empty element', 'type' => 'string'], // Класс CSS применяемый к пустому элементу
            ['property' => 'emptyText', 'name' => 'Default text to be placed in an empty field', 'type' => 'string'], // Текст по умолчанию для размещения в пустом поле
            ['property' => 'enableAlignments', 'name' => 'Enable alignment buttons', 'type' => 'boolean'], // Включить кнопки выравнивания
            ['property' => 'enableColors', 'name' => 'Enable color buttons', 'type' => 'boolean'], // Включить кнопки цвета
            ['property' => 'enableFont', 'name' => 'Enable font buttons', 'type' => 'boolean'], // Включить кнопки шрифта
            ['property' => 'enableFontSize', 'name' => 'Enable font size buttons', 'type' => 'boolean'], // Включить кнопки размера шрифта
            ['property' => 'enableFormat', 'name' => 'Enable text formatting buttons', 'type' => 'boolean'], // Включить кнопки форматирования текста
            ['property' => 'enableLinks', 'name' => 'Enable the link button', 'type' => 'boolean'], // Включите кнопку создания ссылки
            ['property' => 'enableLists', 'name' => 'Enable list buttons', 'type' => 'boolean'], // Включить кнопки списков
            ['property' => 'enableSourceEdit', 'name' => 'Enable switch to source button', 'type' => 'boolean'], // Включить кнопку переключения на исходный код
            ['property' => 'enableToggle', 'name' => 'Enable switching of toggled buttons', 'type' => 'boolean'], // Включить переключение нажатых/не нажатых кнопок
            ['property' => 'enterIsSpecial', 'name' => 'ENTER as special enter key', 'type' => 'boolean'], // ENTER как специальная клавиша ввода
            ['property' => 'elementName', 'name' => 'Element name', 'type' => 'string'], // Имя эелемента
            ['property' => 'fieldBodyCls', 'name' => 'Additional CSS class for field body', 'type' => 'string'], // Дополнительный класс CSS для тела поля
            ['property' => 'fieldCls', 'name' => 'Default CSS class for input field', 'type' => 'string'], // Класс CSS по умолчанию для ввода поля 
            ['property' => 'fieldLabel', 'name' => 'Field label', 'type' => 'string'], // Метка поля
            ['property' => 'fieldStyle', 'name' => 'Field style', 'type' => 'string'], // Стиль поля
            ['property' => 'focusCls', 'name' => 'CSS class of the element in focus', 'type' => 'string'], // Класс CSS элемента в фокусе
            ['property' => 'format', 'name' => 'String value format', 'type' => 'string'], // Строковый формат значения
            ['property' => 'flex', 'name' => 'Flex element layout', 'type' => 'number'], // Flex макета элемента
            [ //  Числовой код символов Юникода, используемый в качестве значка
                'property' => 'glyph', 'name' => 'Unicode character numeric code used as an icon', 'type' => 'string'
            ],
            [ // Автоматически увеличение и уменьшения элемента до своего содержимого
                'property' => 'grow', 'name' => 'Automatically grow an element to its contents', 'type' => 'boolean'
            ],
            [ // Максимальная ширина элемента при автоматическом увеличении
                'property' => 'growMax', 'name' => 'Maximum element width when automatically increasing', 'type' => 'number'
            ],
            [ // Минимальная ширина элемента при автоматическом уменьшении
                'property' => 'growMin', 'name' => 'Minimum element width for automatic reduction', 'type' => 'number'
            ],
            [ // Добоавляемая строка к значению элемента при изменении его размера
                'property' => 'growAppend', 'name' => 'Added string to element value when resizing it', 'type' => 'string'
            ],
            ['property' => 'handleMouseEvents', 'name' => 'Handle mouse events', 'type' => 'boolean'], // Обрабатывать события мыши
            ['property' => 'handler', 'name' => 'Handler', 'type' => 'string'], // Имя обработчика элемента
            ['property' => 'height', 'name' => 'Height', 'type' => 'string'], // Высота элемента
            ['property' => 'hidden', 'name' => 'Hidden', 'type' => 'boolean'], // Скрыть элемент
            ['property' => 'hideLabel', 'name' => 'Hide label', 'type' => 'boolean'], // Скрыть метку поля
            ['property' => 'href', 'name' => 'The URL to open when the element is clicked', 'type' => 'string'], // URL-адрес открываемый при нажатии
            ['property' => 'hrefTarget', 'name' => 'The target attribute to use for the underlying anchor', 'type' => 'string'], // Целевой атрибут перехода по URL-адресу
            ['property' => 'htmlEncode', 'name' => 'HTML encode', 'type' => 'boolean'], // Экранировать HTML
            ['property' => 'id', 'name' => 'Identifier', 'type' => 'string'], // Идентификатор
            ['property' => 'icon', 'name' => 'Icon', 'type' => 'string'], // URL-адрес значка
            [ // Выравнивание значка
                'property' => 'iconAlign', 
                'name'     => 'Icon align', 
                'type'     => 'string', 
                'editor'   => comboEditor(['top', 'right', 'bottom', 'left'])
            ],
            ['property' => 'iconCls', 'name' => 'Icon CSS Class', 'type' => 'string'], // Класс CSS значка
            ['property' => 'increment', 'name' => 'Step increasing value', 'type' => 'number'], // Шаг увеличение значения
            ['property' => 'invalidText', 'name' => 'Invalid text', 'type' => 'string'], // Текст ошибки при некорректном значении
            ['property' => 'inputValue', 'name' => 'Input value', 'type' => 'string'], // Значение отправляемое формой
            ['property' => 'keyNavEnabled', 'name' => 'Enable key navigation', 'type' => 'boolean'], // Включить навигацию кнопками
            [ // Макет
                'property' => 'layout', 
                'name'     => 'Layout', 
                'type'     => 'string', 
                'editor'   => comboEditor(['absolute', 'accordion', 'anchor', 'auto', 'border', 'box', 'card', 'center', 'column', 'fit', 'form', 'hbox', 'vbox', 'table'])
            ],
            [ // Выравниваие метки
                'property' => 'labelAlign', 
                'name'     => 'Label align', 
                'type'     => 'string', 
                'editor'   => comboEditor(['top', 'right', 'left'])
            ],
            ['property' => 'labelClsExtra', 'name' => 'Additional label CSS Class', 'type' => 'string'], // Дополнительный класс CSS элемента метки
            ['property' => 'labelPad', 'name' => 'Distance between label and field', 'type' => 'number'], // Расстояние между меткой и полем
            ['property' => 'labelSeparator', 'name' => 'Label and field separator', 'type' => 'string'], // Разделитель метки и поля
            ['property' => 'labelStyle', 'name' => 'Label style', 'type' => 'string'], // Стиль метки
            ['property' => 'labelWidth', 'name' => 'Label width', 'type' => 'number'], // Ширина метки
            ['property' => 'margin', 'name' => 'Margin', 'type' => 'string'], // Граница элемента
            ['property' => 'maxText', 'name' => 'Error text if maximum value check fails', 'type' => 'string'], // Текст ошибки, если проверка максимального значения не удалась
            ['property' => 'maxValue', 'name' => 'Maximum value', 'type' => 'number'], // Максимальное допустимое значение
            ['property' => 'maxHeight', 'name' => 'Maximum height', 'type' => 'number'], // Максимальное высота элемента
            ['property' => 'maxLength', 'name' => 'Max length', 'type' => 'number'], // Максимальнпя длина значения
            [ // Текст ошибки, если проверка максимальной длины не удалась
                'property' => 'maxLengthText', 'name' => 'Error text if maximum length check fails', 'type' => 'string'
            ],
            ['property' => 'maxWidth', 'name' => 'Maximum width', 'type' => 'number'], // Максимальное ширина элемента
            ['property' => 'minText', 'name' => 'Error text if minimum value check fails', 'type' => 'string'], // Текст ошибки, если проверка минимального значения не удалась
            ['property' => 'minValue', 'name' => 'Minimum value', 'type' => 'number'], // Минимальное допустимое значение
            ['property' => 'minHeight', 'name' => 'Minimum height', 'type' => 'number'], // Минимальная высота элемента
            ['property' => 'minLength', 'name' => 'Min length', 'type' => 'number'], // Минимальная длина значения
            ['property' => 'minLengthText', 'name' => 'Error text if minimum length check fails', 'type' => 'string'], // Текст ошибки, если проверка минимальной длины не удалась
            ['property' => 'minWidth', 'name' => 'Minimum with', 'type' => 'number'], // Минимальная ширина элемента
            ['property' => 'mouseWheelEnabled', 'name' => 'Mouse wheel enabled', 'type' => 'boolean'], // Установк значений колёсиком мыши
            ['property' => 'name', 'name' => 'Name', 'type' => 'string'], // Название
            ['property' => 'nanText', 'name' => 'Error text if value is not a valid number', 'type' => 'string'], // Текст ошибки, если значение не является допустимым числом
            ['property' => 'negativeText', 'name' => 'Error text if value is negative', 'type' => 'string'], // Текст ошибки, если значение является отрицательным
            ['property' => 'overCls', 'name' => 'Element CSS class when cursor is over elements', 'type' => 'string'], // Класс CSS элемента, когда курсор над элементов
            ['property' => 'padding', 'name' => 'Padding an element', 'type' => 'string'], // Отступы внутри элемента
            ['property' => 'pickerMaxHeight', 'name' => 'Max dropdown list height', 'type' => 'number'], // Максимальная высота выпадающего списка
            ['property' => 'pressed', 'name' => 'Button pressed', 'type' => 'boolean'], // Кнопка нажата
            ['property' => 'preventDefault', 'name' => 'Prevents default action', 'type' => 'boolean'], //  Предотвращать действие по умолчанию
            ['property' => 'preventScrollbars', 'name' => 'Always show scroll bars', 'type' => 'boolean'], // Показывать постоянно  полосы прокрутки
            ['property' => 'readOnly', 'name' => 'Read-only element values', 'type' => 'boolean'], // Значения элемента только для чтения
            ['property' => 'readOnlyCls', 'name' => 'Element CSS class with read-only permission', 'type' => 'string'], // Класс CSS элемента при разрешении только на чтение
            ['property' => 'regex', 'name' => 'Regular expression', 'type' => 'string'], // Регулярное выражение для проверки значения
            ['property' => 'regexText', 'name' => 'Error text if regular expression check fails', 'type' => 'string'], // Текст ошибки, если проверка регулярным выражением не удалась
            ['property' => 'repeat', 'name' => 'Restarting an event', 'type' => 'boolean'], // Повторный запуск события
            [ // Вращение текста
                'property' => 'rotation', 
                'name'     => 'Text rotation', 
                'type'     => 'string', 
                'editor'   => comboEditor(['0', '1', '2'])
            ],
            ['property' => 'selectOnFocus', 'name' => 'Selecting field text when the field receives input focus', 'type' => 'boolean'], // Выбор текста поля, когда поле получает фокус ввода
            [ // Размер элемента
                'property' => 'scale', 
                'name'     => 'Scale', 
                'type'     => 'string', 
                'editor'   => comboEditor(['small', 'medium', 'large'])
            ],
            ['property' => 'scrollable', 'name' => 'Scrollable', 'type' => 'boolean'], // Возможность прокрутки
            ['property' => 'showEmptyMenu', 'name' => 'Force menu to be shown', 'type' => 'boolean'], // Принудительно отображать меню
            ['property' => 'showToday', 'name' => 'Highlight current date', 'type' => 'boolean'], // Подсвечивать текущую дату
            ['property' => 'startDay', 'name' => 'Index of the day from which the week begins', 'type' => 'number'], // Индекс дня с которого начинается неделя
            ['property' => 'step', 'name' => 'Element value change step', 'type' => 'number'], // Шаг изменения значения элемента
            ['property' => 'style', 'name' => 'Style', 'type' => 'string'], // Стиль элемента
            ['property' => 'snapToIncrement', 'name' => 'Snap to increment', 'type' => 'boolean'], // Принимать только значения на границе приращения
            ['property' => 'submitValue', 'name' => 'Submit value', 'type' => 'boolean'], // Отправить значение если поле отключено
            ['property' => 'submitFormat', 'name' => 'Submit format', 'type' => 'boolean'], // Формат отправляемого значения
            ['property' => 'spinDownEnabled', 'name' => 'Spin down enabled', 'type' => 'boolean'], // Включить кнопку со стрелкой вниз
            ['property' => 'spinUpEnabled', 'name' => 'Spin up enabled', 'type' => 'boolean'], // Включить кнопку со стрелкой вверх
            ['property' => 'tabIndex', 'name' => 'DOM tabIndex', 'type' => 'number'], // Порядок фокуса элементов
            [ // Положение вкладок
                'property' => 'tabPosition', 
                'name'     => 'Tab position', 
                'type'     => 'string', 
                'editor'   => comboEditor(['top', 'bottom', 'left', 'right'])
            ],
            ['property' => 'text', 'name' => 'Text', 'type' => 'string'], // Текст элемента
            [ // Выравнивание текста элемента
                'property' => 'textAlign', 
                'name'     => 'Text align', 
                'type'     => 'string', 
                'editor'   => comboEditor(['center', 'left', 'right'])
            ],
            ['property' => 'title', 'name' => 'Title', 'type' => 'string'], // Надпись элемента
            ['property' => 'toggleGroup', 'name' => 'Toggle group', 'type' => 'string'], // Группа переключателя
            ['property' => 'toggleHandler', 'name' => 'Toggle handler', 'type' => 'string'], // Имя обработчика переключателя
            ['property' => 'tooltip', 'name' => 'Tooltip', 'type' => 'string'], // Подсказка
            ['property' => 'tooltipType', 'name' => 'Tooltip type', 'type' => 'string'], // Вид подсказки
            ['property' => 'type', 'name' => 'Type', 'type' => 'string'], // Вид
            ['property' => 'ui', 'name' => 'User interface', 'type' => 'string'], // Стиль пользовательского интерфейса
            ['property' => 'uiCls', 'name' => 'User interface CSS class', 'type' => 'string'], // array Класс пользовательского интерфейса
            ['property' => 'validateOnBlur', 'name' => 'Validate on blur', 'type' => 'boolean'], // Проверить значение, когда элемент теряет фокус
            ['property' => 'validateOnChange', 'name' => 'Validate on change', 'type' => 'boolean'], // Проверить значение, когда оно изменяется
            ['property' => 'validateBlank', 'name' => 'Validate blank', 'type' => 'boolean'], // Не проверять пустые значения
            ['property' => 'validation', 'name' => 'Validation', 'type' => 'boolean'], // Проверить значение
            ['property' => 'value', 'name' => 'Value', 'type' => 'string'], // Значение элемента
            [ // Тип проверки значения
                'property' => 'vtype', 
                'name'     => 'Validation type', 
                'type'     => 'string', 
                'editor'   => comboEditor(['alpha', 'alphanum', 'email', 'url'])
            ],
            [ // Текст ошибки, если проверка выбранным видом не удалась
                'property' => 'vtypeText', 'name' => 'Error text if verification by the selected view fails', 'type' => 'string'
            ],
            ['property' => 'width', 'name' => 'Width', 'type' => 'string'], // Ширина элемента
            ['property' => 'xtype', 'name' => 'Class type', 'type' => 'string'], // Тип элемента
        ]
    ],

    'run' => [
        'install'   => ['drop', 'create', 'insert'],
        'uninstall' => ['drop']
    ]
];