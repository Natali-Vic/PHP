-- создание БД с удалением старой
DROP DATABASE IF EXISTS laptops_db;
CREATE DATABASE laptops_db;
-- переключение контекста на созданную (пересозданную) БД
USE laptops_db;
-- создание таблицы ноутбуков
CREATE TABLE laptops_t (
    id INT NOT NULL AUTO_INCREMENT,
    brand_f NVARCHAR(200) NOT NULL,
    name_f NVARCHAR(200) NOT NULL,
    display_size_f NVARCHAR(200) NOT NULL,
    ram_f NVARCHAR(200) NOT NULL,
    price_f INT NOT NULL,
    -- ограничения
    PRIMARY KEY(id)
);

