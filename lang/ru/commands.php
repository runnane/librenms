<?php

return [
    'config:get' => [
        'description' => 'Получить значение конфигурации',
        'arguments' => [
            'setting' => 'настройка, значение которой нужно получить в нотации с точками (пример: snmp.community.0)',
        ],
        'options' => [
            'dump' => 'Вывести всю конфигурацию в формате json',
        ],
    ],
    'config:set' => [
        'description' => 'Установить значение конфигурации (или удалить)',
        'arguments' => [
            'setting' => 'настройка, которую нужно установить в нотации с точками (пример: snmp.community.0). Чтобы добавить в массив, добавьте .+',
            'value' => 'значение для установки, удалить настройку, если это пропущено',
        ],
        'options' => [
            'ignore-checks' => 'Игнорировать все проверки безопасности',
        ],
        'confirm' => 'Сбросить :setting к значению по умолчанию?',
        'forget_from' => 'Забыть :path из :parent?',
        'errors' => [
            'append' => 'Невозможно добавить к не-массивной настройке',
            'failed' => 'Не удалось установить :setting',
            'invalid' => 'Это не действительная настройка. Пожалуйста, проверьте ваш ввод',
            'invalid_os' => 'Указанная ОС (:os) не существует',
            'nodb' => 'База данных не подключена',
            'no-validation' => 'Невозможно установить :setting, отсутствует определение валидации.',
        ],
    ],
    'db:seed' => [
        'existing_config' => 'В базе данных уже есть существующие настройки. Продолжить?',
    ],
    'dev:check' => [
        'description' => 'Проверки кода LibreNMS. Запуск без опций выполняет все проверки',
        'arguments' => [
            'check' => 'Выполнить указанную проверку :checks',
        ],
        'options' => [
            'commands' => 'Вывести только команды, которые будут выполнены, без проверок',
            'db' => 'Запустить модульные тесты, требующие подключения к базе данных',
            'fail-fast' => 'Остановить проверки при первом обнаруженном сбое',
            'full' => 'Выполнить полные проверки, игнорируя фильтрацию измененных файлов',
            'module' => 'Конкретный модуль для выполнения тестов. Подразумевает модульные тесты, --db, --snmpsim',
            'os' => 'Конкретная ОС для выполнения тестов. Может быть регулярным выражением или списком через запятую. Подразумевает модульные тесты, --db, --snmpsim',
            'os-modules-only' => 'Пропустить тест обнаружения ОС при указании конкретной ОС. Ускоряет время тестирования при проверке изменений, не связанных с обнаружением.',
            'quiet' => 'Скрыть вывод, если нет ошибок',
            'snmpsim' => 'Использовать snmpsim для модульных тестов',
        ],
    ],
    'dev:simulate' => [
        'description' => 'Симулировать устройства с использованием тестовых данных',
        'arguments' => [
            'file' => 'Имя файла (только базовое имя) файла snmprec для обновления или добавления в LibreNMS. Если файл не указан, устройство не будет добавлено или обновлено.',
        ],
        'options' => [
            'multiple' => 'Использовать имя сообщества для имени хоста вместо snmpsim',
            'remove' => 'Удалить устройство после остановки',
        ],
        'added' => 'Устройство :hostname (:id) добавлено',
        'exit' => 'Ctrl-C для остановки',
        'removed' => 'Устройство :id удалено',
        'updated' => 'Устройство :hostname (:id) обновлено',
        'setup' => 'Настройка окружения snmpsim в :dir',
    ],
    'device:add' => [
        'description' => 'Добавить новое устройство',
        'arguments' => [
            'device spec' => 'Имя хоста или IP для добавления',
        ],
        'options' => [
            'v1' => 'Использовать SNMP v1',
            'v2c' => 'Использовать SNMP v2c',
            'v3' => 'Использовать SNMP v3',
            'display-name' => "Строка, отображаемая как имя этого устройства, по умолчанию - имя хоста.\nМожет быть простой шаблон с заменами: {{ \$hostname }}, {{ \$sysName }}, {{ \$sysName_fallback }}, {{ \$ip }}",
            'force' => 'Просто добавить устройство, не выполняя проверки безопасности',
            'group' => 'Группа опроса (для распределенного опроса)',
            'ping-fallback' => 'Добавить устройство как только для пинга, если оно не отвечает на SNMP',
            'port-association-mode' => 'Устанавливает, как порты сопоставляются. ifName рекомендуется для Linux/Unix',
            'community' => 'Сообщество SNMP v1 или v2',
            'transport' => 'Транспорт для подключения к устройству',
            'port' => 'Порт транспортного уровня SNMP',
            'security-name' => 'Имя пользователя безопасности SNMPv3',
            'auth-password' => 'Пароль аутентификации SNMPv3',
            'auth-protocol' => 'Протокол аутентификации SNMPv3',
            'privacy-protocol' => 'Протокол конфиденциальности SNMPv3',
            'privacy-password' => 'Пароль конфиденциальности SNMPv3',
            'ping-only' => 'Добавить устройство только для пинга',
            'os' => 'Только пинг: укажите ОС',
            'hardware' => 'Только пинг: укажите оборудование',
            'sysName' => 'Только пинг: укажите sysName',
        ],
        'validation-errors' => [
            'port.between' => 'Порт должен быть от 1 до 65535',
            'poller-group.in' => 'Указанная группа опроса не существует',
        ],
        'messages' => [
            'save_failed' => 'Не удалось сохранить устройство :hostname',
            'try_force' => 'Вы можете попробовать с опцией --force, чтобы пропустить проверки безопасности',
            'added' => 'Добавлено устройство :hostname (:device_id)',
        ],
    ],
    'device:ping' => [
        'description' => 'Пинг устройства и запись данных о ответе',
        'arguments' => [
            'device spec' => 'Устройство для пинга: <ID устройства>, <Имя хоста/IP>, all',
        ],
    ],
    'device:poll' => [
        'description' => 'Опрос данных с устройства(ов), как определено в обнаружении',
        'arguments' => [
            'device spec' => 'Спецификация устройства для опроса: device_id, hostname, wildcard (*), odd, even, all',
        ],
        'options' => [
            'modules' => 'Указать отдельный модуль для выполнения. Разделите модули запятыми, подмодули могут быть добавлены с помощью /',
            'no-data' => 'Не обновлять хранилища данных (RRD, InfluxDB и т. д.)',
        ],
        'errors' => [
            'db_connect' => 'Не удалось подключиться к базе данных. Проверьте, что служба базы данных запущена и настройки подключения верны.',
            'db_auth' => 'Не удалось подключиться к базе данных. Проверьте учетные данные: :error',
            'no_devices' => 'Устройства, соответствующие вашей спецификации, не найдены.',
            'none_up' => 'Устройство было отключено, невозможно опросить.|Все устройства были отключены, невозможно опросить.',
            'none_polled' => 'Не было опрошенных устройств.',
        ],
        'polled' => 'Опросил :count устройств за :time',
    ],
    'key:rotate' => [
        'description' => 'Повернуть APP_KEY, это расшифровывает все зашифрованные данные с помощью заданного старого ключа и сохраняет их с новым ключом в APP_KEY.',
        'arguments' => [
            'old_key' => 'Старый APP_KEY, который действителен для зашифрованных данных',
        ],
        'options' => [
            'generate-new-key' => 'Если у вас нет нового ключа, установленного в .env, используйте APP_KEY из .env для расшифровки данных и генерации нового ключа, установив его в .env',
            'forgot-key' => 'Если у вас нет старого ключа, вы должны удалить все зашифрованные данные, чтобы продолжить использовать определенные функции LibreNMS',
        ],
        'destroy' => 'Уничтожить все зашифрованные конфигурационные данные?',
        'destroy_confirm' => 'Уничтожить все зашифрованные данные только в том случае, если вы не можете найти старый APP_KEY!',
        'cleared-cache' => 'Конфигурация была закэширована, очищен кэш, чтобы убедиться, что APP_KEY правильный. Пожалуйста, повторно выполните lnms key:rotate',
        'backup_keys' => 'Задокументируйте ОБА ключа! В случае, если что-то пойдет не так, установите новый ключ в .env и используйте старый ключ в качестве аргумента для этой команды',
        'backup_key' => 'Задокументируйте этот ключ! Этот ключ необходим для доступа к зашифрованным данным',
        'backups' => 'Эта команда может вызвать необратимую потерю данных и аннулировать все сеансы браузера. Убедитесь, что у вас есть резервные копии.',
        'confirm' => 'У меня есть резервные копии, и я хочу продолжить',
        'decrypt-failed' => 'Не удалось расшифровать :item, пропускаем',
        'failed' => 'Не удалось расшифровать элемент(ы). Установите новый ключ в APP_KEY и выполните это снова с использованием старого ключа в качестве аргумента.',
        'current_key' => 'Текущий APP_KEY: :key',
        'new_key' => 'Новый APP_KEY: :key',
        'old_key' => 'Старый APP_KEY: :key',
        'save_key' => 'Сохранить новый ключ в .env?',
        'success' => 'Ключи успешно повернуты!',
        'validation-errors' => [
            'not_in' => ':attribute не должен совпадать с текущим APP_KEY',
            'required' => 'Необходим либо старый ключ, либо --generate-new-key.',
        ],
    ],
    'lnms' => [
        'validation-errors' => [
            'optionValue' => 'Выбранный :option недействителен. Должен быть одним из: :values',
        ],
    ],
    'maintenance:fetch-ouis' => [
        'description' => 'Получить MAC OUIs и кэшировать их для отображения имен поставщиков для MAC-адресов',
        'options' => [
            'force' => 'Игнорировать любые настройки или блокировки, которые препятствуют выполнению команды',
            'wait' => 'Подождать случайное количество времени, используется планировщиком для предотвращения нагрузки на сервер',
        ],
        'disabled' => 'Интеграция Mac OUI отключена (:setting)',
        'enable_question' => 'Включить интеграцию Mac OUI и запланированное получение?',
        'recently_fetched' => 'База данных MAC OUI была получена недавно, пропускаем обновление.',
        'waiting' => 'Ожидание :minutes минуты перед попыткой обновления MAC OUI|Ожидание :minutes минут перед попыткой обновления MAC OUI',
        'starting' => 'Сохранение Mac OUI в базе данных',
        'downloading' => 'Загрузка',
        'processing' => 'Обработка CSV',
        'saving' => 'Сохранение результатов',
        'success' => 'Успешно обновлены соответствия OUI/Поставщик. :count измененный OUI|Успешно обновлено. :count измененные OUI',
        'error' => 'Ошибка при обработке Mac OUI:',
        'vendor_update' => 'Добавление OUI :oui для :vendor',
    ],
    'plugin:disable' => [
        'description' => 'Отключить все плагины с указанным именем',
        'arguments' => [
            'plugin' => 'Имя плагина для отключения или "все" для отключения всех плагинов',
        ],
        'already_disabled' => 'Плагин уже отключен',
        'disabled' => ':count плагин отключен|:count плагины отключены',
        'failed' => 'Не удалось отключить плагин(ы)',
    ],
    'plugin:enable' => [
        'description' => 'Включить новейший плагин с указанным именем',
        'arguments' => [
            'plugin' => 'Имя плагина для включения или "все" для отключения всех плагинов',
        ],
        'already_enabled' => 'Плагин уже включен',
        'enabled' => ':count плагин включен|:count плагины включены',
        'failed' => 'Не удалось включить плагин(ы)',
    ],
    'report:devices' => [
        'description' => 'Вывести данные с устройств',
        'columns' => 'Столбцы базы данных:',
        'synthetic' => 'Дополнительные поля:',
        'counts' => 'Счета отношений:',
        'arguments' => [
            'device spec' => 'Спецификация устройства для опроса: device_id, hostname, wildcard (*), odd, even, all',
        ],
        'options' => [
            'list-fields' => 'Вывести список действительных полей',
            'fields' => 'Список полей, разделенных запятыми, для отображения. Действительные опции: названия столбцов устройства из базы данных, счета отношений (ports_count) и/или displayName',
            'output' => 'Формат вывода для отображения данных :types',
        ],
    ],
    'smokeping:generate' => [
        'args-nonsense' => 'Используйте один из --probes и --targets',
        'config-insufficient' => 'Для генерации конфигурации smokeping необходимо установить "smokeping.probes", "fping" и "fping6" в вашей конфигурации',
        'dns-fail' => 'не был разрешен и был исключен из конфигурации',
        'description' => 'Сгенерировать конфигурацию, подходящую для использования с smokeping',
        'header-first' => 'Этот файл был автоматически сгенерирован командой "lnms smokeping:generate',
        'header-second' => 'Локальные изменения могут быть перезаписаны без уведомления или создания резервных копий',
        'header-third' => 'Для получения дополнительной информации смотрите https://docs.librenms.org/Extensions/Smokeping/"',
        'no-devices' => 'Не найдено подходящих устройств - устройства не должны быть отключены.',
        'no-probes' => 'Требуется как минимум один зонд.',
        'options' => [
            'probes' => 'Сгенерировать список зондов - используется для разделения конфигурации smokeping на несколько файлов. Конфликтует с "--targets"',
            'targets' => 'Сгенерировать список целей - используется для разделения конфигурации smokeping на несколько файлов. Конфликтует с "--probes"',
            'no-header' => 'Не добавлять комментарий в начале сгенерированного файла',
            'no-dns' => 'Пропустить DNS-запросы',
            'single-process' => 'Использовать только один процесс для smokeping',
            'compat' => '[устарело] Подражать поведению gen_smokeping.php',
        ],
    ],
    'snmp:fetch' => [
        'description' => 'Выполнить SNMP-запрос к устройству',
        'arguments' => [
            'device spec' => 'Спецификация устройства для опроса: device_id, hostname, wildcard (*), odd, even, all',
            'oid(s)' => 'Один или несколько SNMP OID для получения. Должен быть либо MIB::oid, либо числовой oid',
        ],
        'failed' => 'SNMP команда не удалась!',
        'numeric' => 'Числовой',
        'oid' => 'OID',
        'options' => [
            'output' => 'Указать формат вывода :formats',
            'numeric' => 'Числовые OID',
            'depth' => 'Глубина для группировки SNMP таблицы. Обычно такое же число, как и элементы в индексе таблицы',
        ],
        'not_found' => 'Устройство не найдено',
        'textual' => 'Текстовый',
        'value' => 'Значение',
    ],
    'translation:generate' => [
        'description' => 'Сгенерировать обновленные json языковые файлы для использования в веб-интерфейсе',
    ],
    'user:add' => [
        'description' => 'Добавить локального пользователя, вы можете войти с этим пользователем только если аутентификация установлена на mysql',
        'arguments' => [
            'username' => 'Имя пользователя, с которым пользователь будет входить',
        ],
        'options' => [
            'descr' => 'Описание пользователя',
            'email' => 'Электронная почта, используемая для пользователя',
            'password' => 'Пароль для пользователя, если не указан, вам будет предложено ввести его',
            'full-name' => 'Полное имя пользователя',
            'role' => 'Установить пользователя на желаемую роль :roles',
        ],
        'password-request' => 'Пожалуйста, введите пароль пользователя',
        'success' => 'Успешно добавлен пользователь: :username',
        'wrong-auth' => 'Предупреждение! Вы не сможете войти с этим пользователем, потому что вы не используете аутентификацию MySQL',
    ],
    'maintenance:database-cleanup' => [
        'description' => 'Очистка базы данных от сиротских элементов.',
    ],
];
