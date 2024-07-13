<?php

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "car_dealership";

// Create connection
// <span class="math-inline">conn \= mysqli\_connect\(</span>servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Create tables
$sql = "CREATE TABLE Salesperson (
SalespersonID INT PRIMARY KEY AUTO_INCREMENT,
Name VARCHAR(255) NOT NULL,
ContactNumber VARCHAR(255) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
  echo "Salesperson table created successfully";
} else {
  echo "Error creating Salesperson table: " . mysqli_error($conn);
}

$sql = "CREATE TABLE Customer (
CustomerID INT PRIMARY KEY AUTO_INCREMENT,
Name VARCHAR(255) NOT NULL,
ContactNumber VARCHAR(255) NOT NULL,
Address VARCHAR(255) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
  echo "Customer table created successfully";
} else {
  echo "Error creating Customer table: " . mysqli_error($conn);
}

$sql = "CREATE TABLE Car (
CarID INT PRIMARY KEY AUTO_INCREMENT,
SerialNumber VARCHAR(255) NOT NULL,
Model VARCHAR(255) NOT NULL,
Year INT NOT NULL,
Color VARCHAR(255) NOT NULL,
NewOrUsed VARCHAR(255) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
  echo "Car table created successfully";
} else {
  echo "Error creating Car table: " . mysqli_error($conn);
}

$sql = "CREATE TABLE Invoice (
InvoiceID INT PRIMARY KEY AUTO_INCREMENT,
Cost DECIMAL(10,2) NOT NULL,
Date DATE NOT NULL,
CustomerID INT,
FOREIGN KEY (CustomerID) REFERENCES Customer(CustomerID)
)";

if (mysqli_query($conn, $sql)) {
  echo "Invoice table created successfully";
} else {
  echo "Error creating Invoice table: " . mysqli_error($conn);
}

$sql = "CREATE TABLE ServiceHistory (
ServiceHistoryID INT PRIMARY KEY AUTO_INCREMENT,
ServiceDate DATE NOT NULL,
ServiceDescription VARCHAR(255) NOT NULL,
CarID INT,
CustomerID INT,
SalespersonID INT,
FOREIGN KEY (CarID) REFERENCES Car(CarID),
FOREIGN KEY (CustomerID) REFERENCES Customer(CustomerID),
FOREIGN KEY (SalespersonID) REFERENCES Salesperson(SalespersonID)
)";

if (mysqli_query($conn, $sql)) {
  echo "ServiceHistory table created successfully";
} else {
  echo "Error creating ServiceHistory table:  " . mysqli_error($conn);
}

$sql = "CREATE TABLE Part (
PartID INT PRIMARY KEY AUTO_INCREMENT,
Name VARCHAR(255) NOT NULL,
Cost DECIMAL(10,2) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
  echo "Part table created successfully";
} else {
  echo "Error creating Part table: " . mysqli_error($conn);
}

$sql = "CREATE TABLE ServiceTicket (
ServiceTicketID INT PRIMARY KEY AUTO_INCREMENT,
ServiceTicketNumber VARCHAR(255) NOT NULL,
CarID INT,
CustomerID INT,
Date DATE NOT NULL,
Description VARCHAR(255) NOT NULL,
FOREIGN KEY (CarID) REFERENCES Car(CarID),
FOREIGN KEY (CustomerID) REFERENCES Customer(CustomerID)
)";

if (mysqli_query($conn, $sql)) {
  echo "ServiceTicket table created successfully";
} else {
  echo "Error creating ServiceTicket table: " . mysqli_error($conn);
}

$sql = "CREATE TABLE ServiceParts (
ServicePartsID INT PRIMARY KEY AUTO_INCREMENT,
PartID INT,
ServiceTicketID INT,
Quantity INT NOT NULL,
Cost DECIMAL(10,2) NOT NULL,
FOREIGN KEY (PartID) REFERENCES Part(PartID),
FOREIGN KEY (ServiceTicketID) REFERENCES ServiceTicket(ServiceTicketID)
)";

if (mysqli_query($conn, $sql)) {
  echo "ServiceParts table created successfully";
} else {
  echo "Error creating ServiceParts table";}
