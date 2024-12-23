<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

use Egor\Backend\Console\Questions\Start;
use Egor\Backend\Console\Utils\Registr;

$questions = [
    'heading' => 'По какой причине не удалось забрать заказ?',
    'options' => [
        'Невозможность дозвониться для уточнения информации' => [
            'heading' => 'Какую информацию вы бы хотели уточнить?',
            'options' => [
                'Время работы пункта выдачи.',
                'Адреса пунктов выдачи.',
                'Условия доставки.',
                '<free>'
            ]
        ],
        'Найдено более выгодное предложение' => [
            'heading' => 'Чем предложение оказалось выгоднее?',
            'options' => [
                'Стоимость доставки.',
                'Срок доставки.',
                'Скорость доставки.',
                '<free>'
            ]
        ],
        'Недостаточное количество времени хранения заказа',
        'Товар не понадобился',
        'Не смогли получить заказ',
        '<free>'
    ]
];

try {
    Registr::init();
    (new Start())->run($questions);
} catch (\Exception | \Error $e) {
    echo $e->getMessage();
    exit(1);
}
