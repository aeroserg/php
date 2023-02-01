<?php
declare(strict_types=1);
// объявляем константы_______________________________________
const OPERATION_EXIT = 0;
const OPERATION_ADD = 1;
const OPERATION_DELETE = 2;
const OPERATION_PRINT = 3;
$operations = [
    OPERATION_EXIT => OPERATION_EXIT . '. Завершить программу.',
    OPERATION_ADD => OPERATION_ADD . '. Добавить товар в список покупок.',
    OPERATION_DELETE => OPERATION_DELETE . '. Удалить товар из списка покупок.',
    OPERATION_PRINT => OPERATION_PRINT . '. Отобразить список покупок.',
];


//объявляем переменные________________________________________
$items = [];

//объявляем функции_________________________________________________

function operationNumber(): int
{
    global $operations;
    echo 'Выберите операцию для выполнения: ' . PHP_EOL;
    echo implode(PHP_EOL, $operations) . PHP_EOL . '> ';
    return (int)trim(fgets(STDIN));
}
function printing(): void
{
    global $items;
    $items_var = '';
     if (count($items)) {
         $items_var = 'Ваш список покупок: ' . PHP_EOL . implode("\n", $items) . "\n";
     } else {
         $items_var = 'Ваш список покупок пуст.' . PHP_EOL;
     }

     echo $items_var;
}
function add(): void
{
    global $items;
    echo "Введение название товара для добавления в список: \n> ";
    $itemName = trim(fgets(STDIN));
    $items[] = $itemName;
}
function delete(): string
{
    global $items;
    $items_array = '';
    $items_var = '';
    if (count($items)) {
        $items_var = 'Ваш список покупок: ' . PHP_EOL . implode("\n", $items) . "\n";
    } else {
        $items_var = 'Ваш список покупок пуст.' . PHP_EOL;
    }
    echo $items_var;
    echo 'Введение название товара для удаления из списка:' . PHP_EOL . '> ';
    $itemName = trim(fgets(STDIN));
    if (in_array($itemName, $items, true) !== false) {
        while (($key = array_search($itemName, $items, true)) !== false) {
            unset($items[$key]);
            $items_array = 'Ваш список покупок: ' . PHP_EOL . implode("\n", $items) . "\n";
        }
    } else {
        $items_array = 'Ваш список покупок пуст.' . PHP_EOL;
    }
    return $items_array;
}


// тело кода _______________________________________________
do {
    system('cls');
    $operationNumber = operationNumber();
    if (!array_key_exists($operationNumber, $operations)) {
        system('cls');
        echo '!!! Неизвестный номер операции, повторите попытку.' . PHP_EOL;
    }
    echo 'Выбрана операция: '  . $operations[$operationNumber] . PHP_EOL;
    switch ($operationNumber) {
        case OPERATION_PRINT:
            printing();

            break;
        case OPERATION_ADD:
            add();

            break;
        case OPERATION_DELETE:
            delete();

            break;
    }

} while ($operationNumber > 0);
echo "\n ----- \n";
echo 'Программа завершена' . PHP_EOL;







//
//
//    echo 'Выбрана операция: '  . $operations[$operationNumber] . PHP_EOL;
//
//    switch ($operationNumber) {
//        case OPERATION_ADD:
//            echo "Введение название товара для добавления в список: \n> ";
//            $itemName = trim(fgets(STDIN));
//            $items[] = $itemName;
//            break;
//
//        case OPERATION_DELETE:
//            // Проверить, есть ли товары в списке? Если нет, то сказать об этом и попросить ввести другую операцию
//            echo 'Текущий список покупок:' . PHP_EOL;
//            echo 'Список покупок: ' . PHP_EOL;
//            echo implode("\n", $items) . "\n";
//
//            echo 'Введение название товара для удаления из списка:' . PHP_EOL . '> ';
//            $itemName = trim(fgets(STDIN));
//
//            if (in_array($itemName, $items, true) !== false) {
//                while (($key = array_search($itemName, $items, true)) !== false) {
//                    unset($items[$key]);
//                }
//            }
//            break;
//
//        case OPERATION_PRINT:
//            echo 'Ваш список покупок: ' . PHP_EOL;
//            echo implode(PHP_EOL, $items) . PHP_EOL;
//            echo 'Всего ' . count($items) . ' позиций. '. PHP_EOL;
//            echo 'Нажмите enter для продолжения';
//            fgets(STDIN);
//            break;
//    }



