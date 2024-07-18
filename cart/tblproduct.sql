--
-- Table structure for table `tblproduct`
--
CREATE TABLE `tblproduct` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct`
--


INSERT INTO `tblproduct` (`id`, `name`, `code`, `image`, `price`) VALUES
(1, 'Abstract Image 1', 'at1', 'product-images/abstract1.jpg', 1500.00),
(2, 'Abstract Image 2', 'at2', 'product-images/abstract2.jpeg', 800.00),
(3, 'Abstract Image 3', 'at3', 'product-images/abstract3.jpg', 300.00),
(4, 'Abstract Image 4', 'at4', 'product-images/abstract4.jpg', 800.00),
(5, 'Abstract Image 5', 'at5', 'product-images/abbg.jpeg', 300.00),
(6, 'Abstract Image 6', 'at6', 'product-images/imggg.jpg', 800.00),
(7, 'Abstract Image 7', 'at7', 'product-images/images7.jpeg', 300.00),
(8, 'Abstract Image 8', 'at8', 'product-images/img8.jpg', 100.00),
(9, 'Abstract Image 9', 'at9', 'product-images/img9.jpg', 100.00);


--
--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;