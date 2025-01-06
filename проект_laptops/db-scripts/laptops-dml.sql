-- переключение контекста на БД
USE laptops_db;
-- удалить данные
TRUNCATE TABLE laptops_t;
-- добавить тестовые данные в изначальном виде
INSERT INTO laptops_t (
    brand_f,
    name_f,
    display_size_f,
    ram_f,
    price_f
) VALUES
    ('Acer', 'Acer Chromebook Plus 514', '14"', '8GB', '319'),
    ('ASUS', 'ASUS Zenbook Pro 16X', '15.6"', '16GB', '550'),
    ('Lenovo', 'Lenovo IdeaPad Slim 3i', '15.6"', '8GB', '429'),
    ('Apple', 'Apple MacBook Pro 16 2020', '16"', '16GB', '1210'),
    ('Dell', 'Dell Latitude 7340', '14"', '8GB', '350');
-- вывод вставленных данных
SELECT * FROM laptops_t;
