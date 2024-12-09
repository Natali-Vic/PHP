    <?php

        // deduplicateStringSymbols - дедупликация символов строки
        // вход: строка
        // выход: строка с символами без повторений
        function deduplicateStringSymbols(string $str) : string {
            $symbolsArr = str_split($str);              // разбить на массив символов
            $symbolsArr = array_unique($symbolsArr);    // получить массив без повторений
            $str = implode("" , $symbolsArr);           // обратно склеить строку
            return $str;
        }

        // isStringsHaveSameSymbols - проверка, содержат ли 2 строки хотя бы один общий символ
        // вход: проверяемые строки
        // выход: true, если есть хотя бы один общий символ, иначе false
        function isStringsHaveSameSymbols(string $str1, string $str2) : bool {
            for ($i = 0; $i < strlen($str1); $i++) {
                for ($j = 0; $j < strlen($str2); $j++) {
                    if ($str1[$i] == $str2[$j]) {
                        return true;
                    }
                }
            }
            return false;
        }

        // isStringContainsAnyStringFromArray - проверка, содержит ли строка внутри себя любую из строк массива
        function isStringContainsAnyStringFromArray(string $str, array $strs) : bool {
            foreach ($strs as $substr) {
                if (str_contains($str, $substr)) {
                    return true;
                }
            }
            return false;
        }

        // generatePassword - функция генерации пароля по заданным параметрами
        // вход:
        //  - length - длина требуемого пароля, по умолчанию == 6; length >= 4 && length <= 20, иначе length == значению по умолчанию
        //  - requiredSymbols - строка символов, которые обязательно должны встречаться в пароле (хотя бы 1 раз), по умолчанию пустая
        //  - exludedSymbols - строка символов, которые не должны встречать в пароле, по умолчанию пустая
        //  - excludedCombinations - массив строк через variadic args, которые представляют сочетания, которые не должны встречать в пароле
        // выход:
        //  - сгенерированный пароль если все параметры валидные
        //  - null если входные параметры некорректные
        function generatePassword(
            int $length=6, 
            string $requiredSymbols="", 
            string $exludedSymbols="", 
            string ...$excludedCombinations // массив строк
        ) : ?string {
            // проверка длины
            if ($length < 4 || $length > 20) {
                $length = 6;
            }

            // проверка requiredSymbols
            $requiredSymbols = deduplicateStringSymbols($requiredSymbols);  // уберем на всякий случай повторяющиеся символы
            if (strlen($requiredSymbols) > $length) {
                $length = strlen($requiredSymbols); // увеличить длину пароля в этом случае
            }

            // стандартный алфавит для пароля: английский буквы (маленькие/большие) + десятичные цифры + клавиатурные символы
            $standardAlph = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!\"#$%&'()*+,-./:;<=>?@[\\]^_`{|}~";

            // проверка exludedSymbols
            $exludedSymbols = deduplicateStringSymbols($exludedSymbols);  // уберем на всякий случай повторяющиеся символы
            if (isStringsHaveSameSymbols($exludedSymbols, $requiredSymbols)) {
                return null;
            }

            // далее удалить исключенные символы из алфавита, чтобы они не участвовали в генерации
            $exludedSymbolsArr = str_split($exludedSymbols);
            $standardAlph = str_replace($exludedSymbolsArr, "", $standardAlph); // замена каждого символа из exludedSymbolsArr на пустую строку в алфавите
            if (strlen($standardAlph) == 0) {
                return null;    // если  после замены алфавит стал пустым, то ошибка
            }

            // цикл генерации пароля
            $password = $requiredSymbols;   // изначально в пароле требуемые символы
            for ($i = strlen($password); $i < $length; $i++) {
                $index = rand(0, strlen($standardAlph) - 1); // сгенерируем случайный индекс символа из алфавита
                $password .= $standardAlph[$index];          // и добавим символ алфавита по этому индексу в пароль
            }
            
            // т.к. сейчас впереди пароля идут обязательные символы в переданном порядке, то 
            // необходимо перетасовать символы пароля
            $limit = 100_000;
            $try = 0;
            do {
                $password = str_shuffle($password); // делать шафл, пока пароль содержит хотя бы одну из запрещенных комбинаций
                $try++; // считаем попытки
            } while (isStringContainsAnyStringFromArray($password, $excludedCombinations) && $try < $limit);
            if ($try >= $limit) {
                return null;    // защита от вечного цикла, при определенном лимите сгенериовать нельзя
            }
            
            // вернуть результат
            return $password;
        }

        // $password = generatePassword(4, "", "", "");
        // if ($password != null) {
        //     // вывод сгенерированного пароля с экранированием
        //     echo htmlspecialchars($password)."<br>";
        // } else {
        //     echo "null<br>";
        // }
   