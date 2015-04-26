CREATE TABLE usuarios (
id INTEGER PRIMARY KEY AUTOINCREMENT, 
usuario STRING NOT NULL,
email STRING NOT NULL,
password STRING NOT NULL
)

INSERT INTO usuarios (usuario,email,password) VALUES ( 'mayron', 'mayron.ceccon@gmail.com', '$2y$10$AkfuG4HzHBz7hUhruV1z.eb6CbHgBLtMqvvJLrs.HRCIK7K371AvG');