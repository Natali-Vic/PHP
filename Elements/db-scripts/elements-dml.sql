-- переключение контекста на БД
USE chemical_elements_db;
-- удалить данные
TRUNCATE TABLE elements_t;
-- добавить тестовые данные в изначальном виде
INSERT INTO elements_t (
    name_el,
    code_el,
    group_el,
    period_el,
    number_el
) VALUES
    ('Медь','Cu', '1', '4', '29'),
    ('Цинк', 'Zn', '2', '4', '30'),
    ('Селен', 'Se', '6', '4', '34'),
    ('Золото', 'Au', '1', '6', '79'),
    ('Марганец', 'Mn', '7', '4', '25');
-- вывод вставленных данных
SELECT * FROM elements_t;
