-- SQL Queries

-- Insert a client into the clients table
INSERT INTO clients (clientFirstname, clientLastname, clientEmail, clientPassword,comment) VALUES ('Tony', 'Stark', 'tony@starkent.com', 'Iam1ronM@n', 'I am the realIronman');

-- Modify the Tony Stark record to change the clientLevel to 3
UPDATE clients SET clientLevel = 3 WHERE clientLevel = 1;

-- Modify the "GM Hummer" record to read "spacious interior" rather than "smallinterior" using a single query.
UPDATE inventory SET invDescription = REPLACE(invDescription, 'small', 'spacious')WHERE invMake = 'GM' AND invModel = 'Hummer';

-- Use an inner join to select the invModel field from the inventory table and the classificationName field from the carclassification table for inventory items that belong to the "SUV" category
SELECT inventory.invModel, carclassification.classificationName
FROM inventory
INNER JOIN carclassification ON inventory.classificationId = carclassification.classificationId
WHERE inventory.classificationId = 1;

-- Delete the Jeep Wrangler from the database
DELETE FROM inventory
WHERE invMake = 'Jeep' AND invModel = 'Wrangler';

-- Conc
UPDATE inventory
SET invImage=CONCAT("/phpmotors", invImage), invThumbnail=CONCAT("/phpmotors", invThumbnail);