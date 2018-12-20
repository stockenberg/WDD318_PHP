# INSERT STATEMENT
```mysql
INSERT INTO users (firstname, lastname, password, birthdate, username, currency_id) VALUES ('test', 'test', 'base64pass', '2018-06-26', 'krasserzockertypX-X-X__XXX_trppleX', 1)
```


# SELECT STATEMENT

```mysql
SELECT firstname FROM users;
SELECT firstname, lastname FROM users;
SELECT * FROM users WHERE firstname = "test";
SELECT * FROM users WHERE firstname = "test" AND id = 1;
SELECT * FROM users WHERE firstname = "test" OR id = 1;
SELECT * FROM users WHERE firstname = "test" OR id = 1 AND lastname = "test2";
SELECT * FROM users WHERE firstname = "test" OR id = 1 AND lastname = "test2" LIMIT 1;
SELECT * FROM users WHERE firstname LIKE '%te%';
SELECT DISTINCT(username)FROM users WHERE id > 2 ORDER BY username DESC LIMIT 3;
SELECT username, id, email FROM users WHERE id > 2 ORDER BY username DESC LIMIT 3;
/* GET LAST ENTRY OF TABLE */
SELECT * FROM users ORDER BY id DESC LIMIT 1;

/* Multi Table Query */
SELECT u.*, c.bank 
FROM users AS u, currencies AS c 
WHERE u.currency_id = c.id

SELECT c.value, p.title, p.description, p.img, p.id
FROM products_has_categories AS phc, categories AS c, products AS p
WHERE phc.products_id = p.id AND phc.categories_id = c.id;

SELECT products.title, categories.value
FROM products, products_has_categories, categories
WHERE products_has_categories.products_id = products.id
AND categories.id = products_has_categories.categories_id;

```


# UPDATE STATEMENT

```mysql
UPDATE users SET firstname = "Marten";
UPDATE users SET firstname = "Marten" WHERE id = 1;
UPDATE users SET firstname = "Marten" WHERE id = 1 AND firstname = "value";
```


# DELETE STATEMENT

```mysql
DELETE FROM users WHERE id = 1;
DELETE FROM users WHERE id = 1 AND lastname = "hugo";
```

# Backup Database
```bash
mysqldump -u root -p database_name > /path/to/file.sql
```

# import backup
```bash
mysql -u root -p target_database < /path/to/import/file
```