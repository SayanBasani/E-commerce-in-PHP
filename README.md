E-commerce-in-PHP
===================

i use php , html ,tailwind css, js

# For ***DATABASE*** i use MySql
--------------------------------

# in This project there is the BD name is ecom.
# Tables are :-
        * users
        * sellers
        * products
        * specifications
        * cart
        * product_keywords
        * ShippingInfo
        * PaymentInfo

# Table CREATE COMMANDS:


|Table Name              |        Commands
|:---                    |              ---:
|                        |
|                        |        CREATE TABLE products (
|                        |        id INT AUTO_INCREMENT PRIMARY KEY,
|                        |        uploder_email VARCHAR(255) NOT NULL,
|                        |        product_name VARCHAR(255) NOT NULL,
|product                 |        product_description TEXT NOT NULL,
|                        |        categories VARCHAR(255) NOT NULL,
|                        |        payment_type VARCHAR(50) NOT NULL,
|                        |        product_total_stock INT NOT NULL,
|                        |        refundable VARCHAR(50) NOT NULL,
|                        |        product_max_price VARCHAR(50) NOT NULL,
|                        |        product_min_price VARCHAR(50) NOT NULL,
|                        |        product_pickup_address VARCHAR(255) NOT NULL,
|                        |        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
|                        |        );