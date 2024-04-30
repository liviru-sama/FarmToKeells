
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropdown Example</title>
</head>
<body>
    <label for="cars">Choose a car:</label>
    <select id="cars" name="cars">
        <option value="volvo">Volvo</option>
        <option value="saab">Saab</option>
        <option value="mercedes">Mercedes</option>
        <option value="audi">Audi</option>
    </select>
</body>
</html>

<td class="statusColumn">
    <div class="radio-container">
        <input type="radio" class="statusInput" name="status[]" value="Pending Approval" id="pending" <?php echo (empty($row->status) || $row->status == 'Pending Approval') ? 'checked' : ''; ?> <?php echo ($row->status == 'Completed') ? 'disabled' : ''; ?>>
        <label for="pending">Pending Approval</label><br>
        
        <input type="radio" class="statusInput" name="status[]" value="Approved" id="approved" <?php echo ($row->status == 'Approved') ? 'checked' : ''; ?> <?php echo ($row->status == 'Completed') ? 'disabled' : ''; ?>>
        <label for="approved">Approved</label><br>
        
        <input type="radio" class="statusInput" name="status[]" value="Rejected" id="rejected" <?php echo ($row->status == 'Rejected') ? 'checked' : ''; ?> <?php echo ($row->status == 'Completed') ? 'disabled' : ''; ?>>
        <label for="rejected">Rejected</label><br>
        
        <input type="radio" class="statusInput" name="status[]" value="Completed" id="completed" <?php echo ($row->status == 'Completed') ? 'checked' : ''; ?> <?php echo ($row->status == 'Completed') ? 'disabled' : ''; ?>>
        <label for="completed">Completed</label><br>
    </div>
</td>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radio Button Example</title>
</head>
<body>
    <h2>Select your gender:</h2>
    <input type="radio" id="male" name="gender" value="male">
    <label for="male">Male</label><br>
    <input type="radio" id="female" name="gender" value="female">
    <label for="female">Female</label><br>
    <input type="radio" id="other" name="gender" value="other">
    <label for="other">Other</label>
</body>
</html>

ALTER TABLE purchaseorder
ADD COLUMN price INT DEFAULT NULL;

ALTER TABLE purchaseorder
ALTER COLUMN price TYPE VARCHAR;

UPDATE purchaseorder
SET price = '5'
WHERE purchase_id = 4;

UPDATE purchaseorder
SET price = '5'
WHERE purchase_id = 4;

SELECT * FROM purchaseorder ORDER BY price ASC;

SELECT * FROM purchaseorder ORDER BY price DESC;

INSERT INTO purchaseorder (purchase_id, name, type, quantity, date, purchase_status, image, price)
VALUES (1, 'Product A', 'Electronics', 5, '2024-04-29', 'Complete', 'image_url', 100);

DELETE FROM your_table WHERE condition;

TRUNCATE TABLE your_table;

DROP TABLE your_table;

SELECT t1.column1, t2.column2 FROM table1 t1 JOIN table2 t2 ON t1.common_column = t2.common_column;

SELECT c.customer_name, o.order_amount
FROM customers c
JOIN orders o ON c.customer_id = o.customer_id;

SELECT c.customer_name, o.order_amount, p.product_name
FROM customers c
JOIN orders o ON c.customer_id = o.customer_id
JOIN products p ON o.product_id = p.product_id;


SELECT customer_id, COUNT(*), SUM(order_amount)
FROM orders
GROUP BY customer_id;



CREATE TABLE customers (
    customer_id INT PRIMARY KEY,
    customer_name VARCHAR(100),
    ...
);

CREATE TABLE table_name (
    column1 datatype,
    column2 datatype,
    ...
    FOREIGN KEY (column1) REFERENCES other_table(primary_key_column)
);

CREATE TABLE orders (
    order_id INT PRIMARY KEY,
    customer_id INT,
    order_amount DECIMAL,
    FOREIGN KEY (customer_id) REFERENCES customers(customer_id)
);
