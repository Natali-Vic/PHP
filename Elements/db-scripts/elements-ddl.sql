-- создание БД с удалением старой
DROP DATABASE IF EXISTS chemical_elements_db;
CREATE DATABASE chemical_elements_db;
-- переключение контекста на созданную (пересозданную) БД
USE chemical_elements_db;
-- создание таблицы клиентов
CREATE TABLE elements_t (
    id INT NOT NULL AUTO_INCREMENT,
    name_el NVARCHAR(200) NOT NULL,
    code_el NVARCHAR(200) NOT NULL,
    group_el INT NOT NULL,
    period_el INT NOT NULL,
    number_el INT NOT NULL,
    -- ограничения
    PRIMARY KEY(id),
    UNIQUE(name_el),
    UNIQUE(code_el),
    UNIQUE(number_el)    
);

