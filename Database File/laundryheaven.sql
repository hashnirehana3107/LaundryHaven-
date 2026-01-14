-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2024 at 05:30 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundryheaven`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `Address_ID` int(11) NOT NULL,
  `First_Line` varchar(100) DEFAULT NULL,
  `Second_Line` varchar(100) DEFAULT NULL,
  `City` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`Address_ID`, `First_Line`, `Second_Line`, `City`) VALUES
(1, '141/C ', '123 Street ', 'Melbourne'),
(2, '62/D', '4th Avenue', 'Melbourne'),
(3, '23/A', 'Rose Street', 'Richmond'),
(4, '13/D', '6th Avenue', 'Victoria'),
(5, '89/A', '5th Street', 'Richmond'),
(6, '23/B', 'Central Road', 'South Yarra'),
(7, '34/A', 'Ravindu Street', 'Thumpane');

-- --------------------------------------------------------

--
-- Table structure for table `csp`
--

CREATE TABLE `csp` (
  `id` int(10) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `method` varchar(20) NOT NULL,
  `holder` varchar(30) NOT NULL,
  `cnumber` varchar(20) NOT NULL,
  `month` int(4) NOT NULL,
  `year` int(6) NOT NULL,
  `cvv` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `csp`
--

INSERT INTO `csp` (`id`, `price`, `method`, `holder`, `cnumber`, `month`, `year`, `cvv`) VALUES
(2, 17.99, 'master', 'Sanila Nimthaka', '1234567891234567', 4, 2025, 385),
(3, 17.99, 'master', 'Sanila Nimthaka', '1234567891234567', 4, 2025, 385),
(4, 0.00, '', 'weqwjfek', '111111111111111', 2, 2024, 222),
(5, 49.48, '', 'weqwjfek', '111111111111111', 2, 2024, 222),
(6, 35.99, '', 'weqwjfek', '111111111111111', 2, 2024, 222);

-- --------------------------------------------------------

--
-- Table structure for table `csr_responds`
--

CREATE TABLE `csr_responds` (
  `Feedback_ID` int(11) NOT NULL,
  `Employee_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `Order_Id` int(11) NOT NULL,
  `Order_Status` enum('Pending','In Progress','Completed','Cancelled') NOT NULL DEFAULT 'Pending',
  `Order_Amount` decimal(10,2) NOT NULL CHECK (`Order_Amount` >= 0),
  `Order_Date` datetime NOT NULL DEFAULT current_timestamp(),
  `Customer_ID` int(11) DEFAULT NULL,
  `Delivery_Service_ID` int(11) DEFAULT NULL,
  `Payment_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_details`
--

CREATE TABLE `delivery_details` (
  `Delivery_Detail_ID` int(11) NOT NULL,
  `Pickup_Date` date NOT NULL,
  `Pickup_Time` time NOT NULL,
  `Drop_Off_Date` date NOT NULL,
  `Drop_Off_Time` time NOT NULL,
  `Delivery_Date` date NOT NULL,
  `First_Line` varchar(100) NOT NULL,
  `Second_Line` varchar(100) DEFAULT NULL,
  `City` varchar(100) NOT NULL,
  `Special_Landmarks` varchar(255) DEFAULT NULL,
  `Order_Id` int(11) NOT NULL,
  `Delivery_Service_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery_details`
--

INSERT INTO `delivery_details` (`Delivery_Detail_ID`, `Pickup_Date`, `Pickup_Time`, `Drop_Off_Date`, `Drop_Off_Time`, `Delivery_Date`, `First_Line`, `Second_Line`, `City`, `Special_Landmarks`, `Order_Id`, `Delivery_Service_ID`) VALUES
(9, '2024-10-12', '10:00:00', '2024-10-06', '08:00:00', '2024-10-11', 'xvxbcbvxbx', 'cbxcbxdfbdfbdbgds', 'matale', 'wfeafsegs', 3, 1),
(10, '2024-10-12', '10:00:00', '2024-10-06', '08:00:00', '2024-10-11', 'xvxbcbvxbx', 'cbxcbxdfbdfbdbgds', 'matale', 'wfeafsegs', 3, 1),
(11, '2024-10-12', '10:00:00', '2024-10-06', '08:00:00', '2024-10-11', 'xvxbcbvxbx', 'cbxcbxdfbdfbdbgds', 'matale', 'wfeafsegs', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_service`
--

CREATE TABLE `delivery_service` (
  `Delivery_Service_ID` int(11) NOT NULL,
  `Delivery_Service_Name` varchar(100) NOT NULL,
  `Location` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery_service`
--

INSERT INTO `delivery_service` (`Delivery_Service_ID`, `Delivery_Service_Name`, `Location`, `Email`) VALUES
(1, 'Express Couriers', '123 King St, Melbourne, Victoria', 'contact@expresscouriers.com.au'),
(2, 'QuickShip Logistics', '45 Queen St, Richmond, Victoria', 'info@quickship.com.au');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_service_contact`
--

CREATE TABLE `delivery_service_contact` (
  `Delivery_Service_ID` int(11) NOT NULL,
  `Contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery_service_contact`
--

INSERT INTO `delivery_service_contact` (`Delivery_Service_ID`, `Contact`) VALUES
(1, '+61 4 5798 2456'),
(1, '+61 4 8123 4579'),
(2, '+61 4 6735 8921'),
(2, '+61 4 9587 3210');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `Employee_ID` int(11) NOT NULL,
  `Role` enum('CSR','Admin','Stock Manager') NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `DOB` date NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`Employee_ID`, `Role`, `First_Name`, `Last_Name`, `DOB`, `Email`, `Password`) VALUES
(1, 'Admin', 'Alex', 'Morgan', '1996-08-27', 'admin@laundryhaven.au', 'admin@123'),
(2, 'Stock Manager', 'Hannah', 'Collins', '1994-02-04', 'stock.manager@laundryhaven.au', 'stockmanager@123'),
(3, 'CSR', 'Barbara', 'Palvin', '1998-06-09', 'csr1@laundryhaven.au', 'csr1@123'),
(5, 'CSR', 'Jayalath', 'Warapitiya', '2024-10-31', 'jaye@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `employee_address`
--

CREATE TABLE `employee_address` (
  `Employee_ID` int(11) NOT NULL,
  `Address_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_address`
--

INSERT INTO `employee_address` (`Employee_ID`, `Address_ID`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `employee_contact`
--

CREATE TABLE `employee_contact` (
  `Employee_ID` int(11) NOT NULL,
  `Contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_contact`
--

INSERT INTO `employee_contact` (`Employee_ID`, `Contact`) VALUES
(1, '+61 3 9012 3456 '),
(1, '+61 3 9654 7890'),
(2, '+61 3 9304 5678'),
(2, '+61 3 9376 5432'),
(3, '+61 3 9425 6789'),
(3, '+61 3 9487 6543');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Feedback_ID` int(11) NOT NULL,
  `Customer_Name` varchar(50) DEFAULT NULL,
  `Rating` tinyint(4) NOT NULL,
  `Feedback_Content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`Feedback_ID`, `Customer_Name`, `Rating`, `Feedback_Content`) VALUES
(1, 'afas', 4, 'ddfa'),
(2, 'wedeqewefqqdw', 4, 'qqdq');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `inquiryid` int(10) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `contactno` int(15) NOT NULL,
  `inquiry` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `Inventory_ID` int(11) NOT NULL,
  `Item_Name` varchar(50) NOT NULL,
  `Item_Quantity` int(11) NOT NULL CHECK (`Item_Quantity` >= 0),
  `Item_Status` enum('Available','Out of Stock','Low Stock') NOT NULL,
  `Reorder_Level` int(11) NOT NULL CHECK (`Reorder_Level` >= 20),
  `Stock_Manager_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`Inventory_ID`, `Item_Name`, `Item_Quantity`, `Item_Status`, `Reorder_Level`, `Stock_Manager_ID`) VALUES
(21, 'Washing Powder', 200, 'Available', 50, 2),
(22, 'Fabric Softener', 80, 'Available', 20, 2),
(23, 'Laundry Bags', 30, 'Low Stock', 50, 2),
(24, 'Bleach', 200, 'Available', 100, 2),
(25, 'Stain Remover', 60, 'Available', 20, 2),
(26, 'Drying Sheets', 0, 'Out of Stock', 20, 2),
(27, 'Detergent Pods', 120, 'Available', 50, 2),
(28, 'Dryer Balls', 20, 'Low Stock', 100, 2),
(29, 'OxiClean', 90, 'Available', 30, 2),
(30, 'Scent Boosters', 40, 'Available', 25, 2),
(31, 'sdfsdf', 20, 'Available', 20, 2);

--
-- Triggers `inventory`
--
DELIMITER $$
CREATE TRIGGER `InsertItemStatusOnInsert` BEFORE INSERT ON `inventory` FOR EACH ROW BEGIN
    IF NEW.Item_Quantity = 0 THEN
        SET NEW.Item_Status = 'Out of Stock';
    ELSEIF NEW.Item_Quantity < NEW.Reorder_Level THEN
        SET NEW.Item_Status = 'Low Stock';
    ELSE
        SET NEW.Item_Status = 'Available';
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `UpdateItemStatusOnUpdate` BEFORE UPDATE ON `inventory` FOR EACH ROW BEGIN
    IF NEW.Item_Quantity = 0 THEN
        SET NEW.Item_Status = 'Out of Stock';
    ELSEIF NEW.Item_Quantity < NEW.Reorder_Level THEN
        SET NEW.Item_Status = 'Low Stock';
    ELSE
        SET NEW.Item_Status = 'Available';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `inventorymanagement`
--

CREATE TABLE `inventorymanagement` (
  `Inventory_ID` int(11) NOT NULL,
  `Item_Name` varchar(100) NOT NULL,
  `Item_Quantity` int(20) NOT NULL,
  `Item_Status` varchar(20) NOT NULL,
  `Reorder_Level` int(5) NOT NULL,
  `Stock_Manager_ID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventorymanagement`
--

INSERT INTO `inventorymanagement` (`Inventory_ID`, `Item_Name`, `Item_Quantity`, `Item_Status`, `Reorder_Level`, `Stock_Manager_ID`) VALUES
(24, 'Bleach', 201, 'Available', 100, 2),
(25, 'Stain Remover', 60, 'Available', 20, 2),
(26, 'Drying Sheets', 0, 'Out of Stock', 20, 2),
(27, 'Detergent Pods', 120, 'Available', 50, 2),
(28, 'Dryer Balls', 20, 'Low Stock', 100, 2),
(29, 'OxiClean', 90, 'Available', 30, 2),
(30, 'Scent Boosters', 40, 'Available', 25, 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_services`
--

CREATE TABLE `order_services` (
  `Order_Id` int(11) NOT NULL,
  `Service_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Payment_ID` int(11) NOT NULL,
  `Customer_ID` int(11) NOT NULL,
  `Payment_Method` varchar(50) NOT NULL,
  `Payment_Amount` decimal(10,2) NOT NULL CHECK (`Payment_Amount` >= 0),
  `Payment_Date` datetime NOT NULL DEFAULT current_timestamp(),
  `Payment_Status` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `methodId` int(11) NOT NULL,
  `cusId` int(11) NOT NULL,
  `cardHolder` varchar(50) NOT NULL,
  `cardNo` varchar(12) NOT NULL,
  `expMonth` varchar(50) NOT NULL,
  `cvv` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`methodId`, `cusId`, `cardHolder`, `cardNo`, `expMonth`, `cvv`) VALUES
(4, 1001, 'wesrwf we', '123456789456', '2024-12', '154');

-- --------------------------------------------------------

--
-- Table structure for table `refund`
--

CREATE TABLE `refund` (
  `Refund_ID` int(11) NOT NULL,
  `Refund_Status` enum('Pending','Approved','Rejected') NOT NULL,
  `Refund_Date` date NOT NULL DEFAULT curdate(),
  `Refund_Time` time NOT NULL DEFAULT curtime(),
  `Admin_ID` int(11) DEFAULT NULL,
  `Customer_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registered_customer`
--

CREATE TABLE `registered_customer` (
  `Customer_ID` int(11) NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registered_customer`
--

INSERT INTO `registered_customer` (`Customer_ID`, `First_Name`, `Last_Name`, `Email`, `Password`) VALUES
(1005, 'Sanila', 'Nimthaka', 'sanilanimthaka127@gmail.com', '$2y$10$.IEiATWIFCpvXWSENKTfguyQDOY5hUWi2jCdjLSz75cnCeV15DaU.');

-- --------------------------------------------------------

--
-- Table structure for table `reg_customer_address`
--

CREATE TABLE `reg_customer_address` (
  `Customer_ID` int(11) NOT NULL,
  `Address_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reg_customer_contact`
--

CREATE TABLE `reg_customer_contact` (
  `Customer_ID` int(11) NOT NULL,
  `Contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `Service_ID` int(11) NOT NULL,
  `Service_Name` varchar(100) NOT NULL,
  `Description` text DEFAULT NULL,
  `Price` decimal(10,2) NOT NULL CHECK (`Price` >= 0),
  `Image_Path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`Service_ID`, `Service_Name`, `Description`, `Price`, `Image_Path`) VALUES
(1, 'Wash and Fold', 'Welcome to our Wash and Fold Service – where laundry day becomes a breeze. At Kleen , we transform the chore of washing and folding into an effortless, efficient, and enjoyable experience.Our dedicated team meticulously handles your clothes, using premium detergents and a keen eye for detail to ensure each item is treated with the care it deserves. Choose the convenience of our service, our Wash and Fold Service is designed to make your life easier. Rediscover the joy of freshly laundered, expertly folded clothes – trust us with your laundry, and experience a new level of convenience and care. Schedule your wash and fold service today, your laundry day just got an upgrade!\r\n', 20.00, './Assets/IMG/washnfold.png'),
(2, 'Wash Dry and Iron\r\n', 'Welcome to laundry haven, where we redefine laundry care with our comprehensive Wash, Dry, and Iron service.Our dedicated team ensures that every garment is treated with the utmost care, guaranteeing a thorough wash, precise drying, and a professional iron finish.Experience the convenience of receiving your clothes impeccably cleaned, dried to perfection, and ready to wear all in one seamless service.Trust us to handle the details, so you can enjoy the freshness and crispness that comes with our Wash, Dry, and Iron expertise.Elevate your laundry experience with us - where excellence is our standard.\r\n', 25.00, './Assets/IMG/iron-board.png'),
(3, 'Dry Cleaning\r\n', 'Welcome to laundry haven, where sophistication meets fabric care perfection. Our dry-cleaning services redefine the art of garment maintenance. Entrust your delicate fabrics and cherished garments to our meticulous experts. Using advanced techniques and premium solvents, we ensure your clothes return to you immaculate, vibrant, and refreshed. Elevate your wardrobe with the precision and care it deserves. Choose Kleen for unparalleled dry-cleaning excellence and experience the difference in every garment. Your wardrobe will thank you.\r\n', 20.00, './Assets/IMG/dryclean.png'),
(4, 'Iron only\r\n', 'Welcome to laundry haven, where we redefine laundry care with our comprehensive Wash, Dry, and Iron service. Our dedicated team ensures that every garment is treated with the utmost care, guaranteeing a thorough wash, precise drying, and a professional iron finish. Experience the convenience of receiving your clothes impeccably cleaned, dried to perfection, and ready to wear all in one seamless service. Trust us to handle the details, so you can enjoy the freshness and crispness that comes with our Wash, Dry, and Iron expertise. Elevate your laundry experience with us – where excellence is our standard.\r\n', 10.00, './Assets/IMG/iron (2).png'),
(5, 'Curtain Washing\r\n', 'Welcome to laundry haven, where we elevate your home care with our specialized Curtain Cleaning Service. Our expert team is dedicated to ensuring that every curtain is treated with meticulous attention, guaranteeing a deep clean, fresh scent, and a crisp finish. Enjoy the convenience of having your curtains impeccably cleaned and ready to hang, all in one seamless service. Trust us to handle the details, so you can relish the clarity and vibrancy that comes with our curtain washing expertise. Transform your living space with us—where excellence is our standard.\r\n', 30.00, './Assets/IMG/curtain.png'),
(6, 'Stain Removal\r\n', 'Welcome to laundry haven, where we take stain care to the next level with our specialized Stain Removal Service. Our expert team is dedicated to treating every type of stain with precision and care, ensuring that your garments are restored to their original glory. Experience the convenience of having tough stains expertly tackled, leaving your clothes looking fresh and vibrant all in one seamless service. Trust us to handle the details, so you can enjoy the confidence that comes with our stain removal expertise. Elevate your wardrobe with us—where excellence is our standard.\r\n', 15.00, './Assets/IMG/stain-remover.png'),
(7, 'Shoe Cleaning\r\n', 'Welcome to laundry haven, where we elevate footwear care with our specialized Shoe Cleaning Service. Our dedicated team ensures that every pair of shoes is treated with the utmost attention, providing a thorough clean, revitalization, and protection. Experience the convenience of having your shoes impeccably cleaned and restored, ready to step out in style—all in one seamless service. Trust us to handle the details, so you can enjoy the freshness and shine that comes with our shoe cleaning expertise. Transform your footwear experience with us—where excellence is our standard.\r\n', 15.00, './Assets/IMG/shoes.png'),
(8, 'Urgency Services\r\n', 'Welcome to laundry haven, where we prioritize your needs with our dedicated Urgent Service. Our expert team understands that life can be unpredictable, which is why we offer a fast-tracked solution for your laundry and cleaning needs. Experience the convenience of having your garments processed with speed and efficiency, ensuring they are cleaned, dried, and ready for you in no time. Trust us to handle the details, so you can enjoy peace of mind knowing that your urgent requests are met with our commitment to excellence. Elevate your laundry experience with us—where urgency meets quality.\r\n', 35.00, './Assets/IMG/urgent.png');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `Supplier_ID` int(11) NOT NULL,
  `Supplier_Name` varchar(100) NOT NULL,
  `Location` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Stock_Manager_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`Supplier_ID`, `Supplier_Name`, `Location`, `Email`, `Stock_Manager_ID`) VALUES
(1, 'CleanPro Supplies', 'Melbourne, Victoria', 'info@cleanprosupplies.com.au', 2),
(2, 'EcoWash Solutions', 'Richmond, Victoria', 'contact@ecowashsolutions.com.au', 2),
(3, 'Laundry Essentials Co.', 'South Yarra, Victoria', 'sales@laundryessentials.com.au', 2),
(4, 'PureWash Products', 'St Kilda, Victoria', 'support@purewashproducts.com.au', 2);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_contact`
--

CREATE TABLE `supplier_contact` (
  `Supplier_ID` int(11) NOT NULL,
  `Contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier_contact`
--

INSERT INTO `supplier_contact` (`Supplier_ID`, `Contact`) VALUES
(1, '+61 2 9876 5432'),
(1, '+61 3 9587 3210'),
(2, '+61 4 6543 2109'),
(2, '+61 4 8765 4321'),
(3, '+61 3 1234 5678'),
(3, '+61 5 2109 8765'),
(4, '+61 6 5678 9012'),
(4, '+61 6 6789 0123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`Address_ID`);

--
-- Indexes for table `csp`
--
ALTER TABLE `csp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `csr_responds`
--
ALTER TABLE `csr_responds`
  ADD PRIMARY KEY (`Feedback_ID`,`Employee_ID`),
  ADD KEY `Employee_ID` (`Employee_ID`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`Order_Id`),
  ADD KEY `Customer_ID` (`Customer_ID`),
  ADD KEY `Delivery_Service_ID` (`Delivery_Service_ID`),
  ADD KEY `Payment_ID` (`Payment_ID`);

--
-- Indexes for table `delivery_details`
--
ALTER TABLE `delivery_details`
  ADD PRIMARY KEY (`Delivery_Detail_ID`),
  ADD KEY `Delivery_Service_ID` (`Delivery_Service_ID`);

--
-- Indexes for table `delivery_service`
--
ALTER TABLE `delivery_service`
  ADD PRIMARY KEY (`Delivery_Service_ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `delivery_service_contact`
--
ALTER TABLE `delivery_service_contact`
  ADD PRIMARY KEY (`Delivery_Service_ID`,`Contact`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`Employee_ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `employee_address`
--
ALTER TABLE `employee_address`
  ADD PRIMARY KEY (`Employee_ID`,`Address_ID`),
  ADD KEY `Address_ID` (`Address_ID`);

--
-- Indexes for table `employee_contact`
--
ALTER TABLE `employee_contact`
  ADD PRIMARY KEY (`Employee_ID`,`Contact`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`Feedback_ID`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`inquiryid`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`Inventory_ID`),
  ADD KEY `Stock_Manager_ID` (`Stock_Manager_ID`);

--
-- Indexes for table `inventorymanagement`
--
ALTER TABLE `inventorymanagement`
  ADD PRIMARY KEY (`Inventory_ID`);

--
-- Indexes for table `order_services`
--
ALTER TABLE `order_services`
  ADD PRIMARY KEY (`Order_Id`,`Service_ID`),
  ADD KEY `Service_ID` (`Service_ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Payment_ID`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`methodId`);

--
-- Indexes for table `refund`
--
ALTER TABLE `refund`
  ADD PRIMARY KEY (`Refund_ID`),
  ADD KEY `Admin_ID` (`Admin_ID`),
  ADD KEY `Customer_ID` (`Customer_ID`);

--
-- Indexes for table `registered_customer`
--
ALTER TABLE `registered_customer`
  ADD PRIMARY KEY (`Customer_ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `reg_customer_address`
--
ALTER TABLE `reg_customer_address`
  ADD PRIMARY KEY (`Customer_ID`,`Address_ID`),
  ADD KEY `Address_ID` (`Address_ID`);

--
-- Indexes for table `reg_customer_contact`
--
ALTER TABLE `reg_customer_contact`
  ADD PRIMARY KEY (`Customer_ID`,`Contact`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`Service_ID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`Supplier_ID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `Stock_Manager_ID` (`Stock_Manager_ID`);

--
-- Indexes for table `supplier_contact`
--
ALTER TABLE `supplier_contact`
  ADD PRIMARY KEY (`Supplier_ID`,`Contact`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `Address_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `csp`
--
ALTER TABLE `csp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `Order_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `delivery_details`
--
ALTER TABLE `delivery_details`
  MODIFY `Delivery_Detail_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `delivery_service`
--
ALTER TABLE `delivery_service`
  MODIFY `Delivery_Service_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `Employee_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `Feedback_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `inquiryid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `Inventory_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `inventorymanagement`
--
ALTER TABLE `inventorymanagement`
  MODIFY `Inventory_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `Payment_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `methodId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `refund`
--
ALTER TABLE `refund`
  MODIFY `Refund_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registered_customer`
--
ALTER TABLE `registered_customer`
  MODIFY `Customer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `Service_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `Supplier_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `csr_responds`
--
ALTER TABLE `csr_responds`
  ADD CONSTRAINT `csr_responds_ibfk_1` FOREIGN KEY (`Feedback_ID`) REFERENCES `feedback` (`Feedback_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `csr_responds_ibfk_2` FOREIGN KEY (`Employee_ID`) REFERENCES `employees` (`Employee_ID`) ON DELETE CASCADE;

--
-- Constraints for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD CONSTRAINT `customer_order_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `registered_customer` (`Customer_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_order_ibfk_2` FOREIGN KEY (`Delivery_Service_ID`) REFERENCES `delivery_service` (`Delivery_Service_ID`) ON DELETE SET NULL,
  ADD CONSTRAINT `customer_order_ibfk_3` FOREIGN KEY (`Payment_ID`) REFERENCES `payment` (`Payment_ID`) ON DELETE SET NULL;

--
-- Constraints for table `delivery_details`
--
ALTER TABLE `delivery_details`
  ADD CONSTRAINT `delivery_details_ibfk_2` FOREIGN KEY (`Delivery_Service_ID`) REFERENCES `delivery_service` (`Delivery_Service_ID`) ON DELETE SET NULL;

--
-- Constraints for table `delivery_service_contact`
--
ALTER TABLE `delivery_service_contact`
  ADD CONSTRAINT `delivery_service_contact_ibfk_1` FOREIGN KEY (`Delivery_Service_ID`) REFERENCES `delivery_service` (`Delivery_Service_ID`) ON DELETE CASCADE;

--
-- Constraints for table `employee_address`
--
ALTER TABLE `employee_address`
  ADD CONSTRAINT `employee_address_ibfk_1` FOREIGN KEY (`Employee_ID`) REFERENCES `employees` (`Employee_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `employee_address_ibfk_2` FOREIGN KEY (`Address_ID`) REFERENCES `address` (`Address_ID`) ON DELETE CASCADE;

--
-- Constraints for table `employee_contact`
--
ALTER TABLE `employee_contact`
  ADD CONSTRAINT `employee_contact_ibfk_1` FOREIGN KEY (`Employee_ID`) REFERENCES `employees` (`Employee_ID`) ON DELETE CASCADE;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`Stock_Manager_ID`) REFERENCES `employees` (`Employee_ID`) ON DELETE CASCADE;

--
-- Constraints for table `order_services`
--
ALTER TABLE `order_services`
  ADD CONSTRAINT `order_services_ibfk_1` FOREIGN KEY (`Order_Id`) REFERENCES `customer_order` (`Order_Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_services_ibfk_2` FOREIGN KEY (`Service_ID`) REFERENCES `services` (`Service_ID`) ON DELETE CASCADE;

--
-- Constraints for table `refund`
--
ALTER TABLE `refund`
  ADD CONSTRAINT `refund_ibfk_1` FOREIGN KEY (`Admin_ID`) REFERENCES `employees` (`Employee_ID`) ON DELETE SET NULL,
  ADD CONSTRAINT `refund_ibfk_2` FOREIGN KEY (`Customer_ID`) REFERENCES `registered_customer` (`Customer_ID`) ON DELETE SET NULL;

--
-- Constraints for table `reg_customer_address`
--
ALTER TABLE `reg_customer_address`
  ADD CONSTRAINT `reg_customer_address_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `registered_customer` (`Customer_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `reg_customer_address_ibfk_2` FOREIGN KEY (`Address_ID`) REFERENCES `address` (`Address_ID`) ON DELETE CASCADE;

--
-- Constraints for table `reg_customer_contact`
--
ALTER TABLE `reg_customer_contact`
  ADD CONSTRAINT `reg_customer_contact_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `registered_customer` (`Customer_ID`) ON DELETE CASCADE;

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`Stock_Manager_ID`) REFERENCES `employees` (`Employee_ID`) ON DELETE SET NULL;

--
-- Constraints for table `supplier_contact`
--
ALTER TABLE `supplier_contact`
  ADD CONSTRAINT `supplier_contact_ibfk_1` FOREIGN KEY (`Supplier_ID`) REFERENCES `supplier` (`Supplier_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
