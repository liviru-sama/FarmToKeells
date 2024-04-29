
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
