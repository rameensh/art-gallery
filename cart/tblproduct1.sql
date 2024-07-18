--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct1` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct1` (`id`, `name`, `code`, `image`, `price`) VALUES
(1, 'Landscape Art 1', 'l1', 'product-images/l1.jpg', 1500.00),
(2, 'Landscape Art 2', 'l2', 'product-images/l2.jpeg', 800.00),
(3, 'Landscape Art 3', 'l3', 'product-images/l3.jpg', 300.00),
(4, 'Landscape Art 4', 'l4', 'product-images/l4.jpeg', 800.00),
(5, 'Landscape Art 5', 'l5', 'product-images/l5.jpg', 300.00),
(6, 'Landscape Art 6', 'l6', 'product-images/l6.jpeg', 800.00),
(7, 'Landscape Art 7', 'l7', 'product-images/l7.jpg', 300.00),
(8, 'Landscape Art 8', 'l8', 'product-images/l8.jpeg', 100.00),
(9, 'Landscape Art 9', 'l9', 'product-images/l9.jpeg', 100.00);


--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct1`
ADD PRIMARY KEY (`id`),
ADD UNIQUE KEY `product_code` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct1`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;