
-- Table structure for table `contactus`
--

CREATE TABLE `account` (
`userpic` varchar(300) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(500) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phoneno` varchar(30) NOT NULL,
  `residentialaddresss` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(32) NOT NULL,
  `section` varchar(31) NOT NULL
) ;

CREATE TABLE `booktour` (
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobileno` varchar(30) NOT NULL,
  `residentialaddresss` varchar(30) NOT NULL,
  `country` varchar(32) NOT NULL,
  `source` varchar(31) NOT NULL,
  `destination` varchar(30) NOT NULL,
  `depurture` date NOT NULL,
  `backdate` date NOT NULL,
  `twayname` varchar(10) NOT NULL,
  `tfare` int(30) NOT NULL,
  `room_fare` int(30) NOT NULL,
  `pfare` int(30) NOT NULL,
  `totalfare` int(30) NOT NULL,
  `gname` varchar(30) NOT NULL,
  `hname` varchar(30) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `bookdate` timestamp(6) NOT NULL,
  `id`  int(30) NOT NULL ,
   `month` varchar(30) NOT NULL, 
   `year` varchar(30) NOT NULL, 
   `room_type` varchar(30) NOT NULL,
    `room_number` varchar(30) NOT NULL  
) ;

--
-- Dumping data for table `booktour`
--

INSERT INTO `booktour` (`name`, `email`, `mobileno`, `residentialaddresss`, `country`, `source`, `destination`, `depurture`, `backdate`, `twayname`, `tfare`, `room_fare`, `pfare`, `totalfare`, `gname`, `hname`, `pname`, `bookdate`, `id`, `month`, `year`, `room_type`, `room_number`) VALUES
('fsfdfg', 'semagn1@g.com', '1234567890', 'dgsfh', 'america', 'wollo', 'ethiopia', '2017-01-31', '2017-01-27', '', 0, 34, 0, 12, '', '', 'dfghdj', '2017-01-30 23:29:26.049568', 50, 2, 2017, 'vip', ''),
('xcvfb', 'cvfbdd@s.com', '1234567890', 'wollow', 'israel', 'wollo', 'ethiopia', '2017-01-19', '2017-01-27', '', 0, 34, 0, 12, '', 'cnv', 'dfghdj', '2017-01-30 23:33:48.482780', 51, 3, 2017, 'vip', ''),
('v cb', 'fhgj@c.com', '1234567890', 'wdsfgh', 'japan', 'wollo', 'ethiopia', '2017-01-20', '2017-01-06', '', 0, 123, 0, 12, '', 'cnv', 'dfghdj', '2017-01-30 23:37:04.383102', 52, 4, 2017, 'vip', '3'),
('gfvhj', 'gcvhb@d.com', '12345678905', 'wff', 'ethiopia', 'wollo', 'ethiopia', '2017-01-27', '2017-01-20', '', 12, 45, 0, 12, '', 'cnv', 'dfghdj', '2017-01-30 23:42:51.414349', 53, 1, 2017, '1st level', '1'),
('fhg', 'fgdh@gmail.com', '1234567878', 'wollo', 'ethiopia', 'wollo', 'ethiopia', '2017-01-27', '2017-01-19', '', 12, 123, 0, 12, '', 'cnv', 'dfghdj', '2017-01-30 23:52:15.426198', 54, 1, 2017, 'vip', '4'),
('cvbg', 'sdds@c.com', '1234567878', 'wee', 'dfg', 'wollo', 'ethiopia', '2017-01-27', '2017-01-12', '', 12, 34, 0, 0, 'hv bjk', 'cnv', 'dfghdj', '2017-01-30 23:59:55.999067', 55, 1, 2017, 'vip', '2'),
('x cvbg', 'dfg@nm.com', '1234567878', 'wollo', 'dcf', 'wollo', 'ethiopia', '2017-02-25', '2017-01-31', '', 12, 123, 0, 135, 'wolloyewa', 'cnv', 'dfghdj', '2017-01-31 00:02:21.880078', 56, 1, 2017, 'vip', '9'),
('ddd', 'ggfg@g.com', '1234567878', 'israel', 'isreal', 'wollo', 'ethiopia', '2017-01-31', '2017-01-19', '', 12, 34, 0, 66, 'semagn', 'cnv', 'dfghdj', '2017-01-31 01:39:25.101420', 57, 1, 2017, 'vip', '5'),
('ddfghj', 'semagn@g.com', '1234567878', 'semagn@g.com', 'wollo', 'wollo', 'ethiopia', '2017-01-27', '2017-01-27', '', 0, 45, 0, 77, 'wow it amazing', 'cnv', 'dfghdj', '2017-01-31 02:46:22.683571', 58, 1, 2017, 'vip', '6'),
('bcvg', 'hgfjd@c.com', '1234567878', 'dd', 'ff', 'wollo', 'ethiopia', '2017-01-28', '2017-01-26', 'v', 0, 12, 0, 57, '', 'cnv', 'dfghdj', '2017-01-31 03:14:58.242642', 59, 1, 2017, 'vip', '7'),
('chvnbmjb', 'bb@g.com', '2345678901', 'vb', 'vb', 'wollo', 'ethiopia', '2017-01-21', '2017-01-12', '', 0, 34, 0, 46, 'semagn', 'cnv', 'dfghdj', '2017-01-31 06:51:13.176212', 60, 1, 2017, 'vip', '8'),
('fhjjg', 'atalay@g.com', '1234567890', 'fdff', 'dfgff', 'wollo', 'ethiopia', '2017-01-27', '2017-01-13', '', 12, 34, 0, 66, 'dfgdf', 'cnv', 'dfghdj', '2017-01-31 20:15:47.682000', 61, 2, 2017, 'vip', '10'),
('semagnderese', 'semagnd13@cv.com', '1234567890', 'wee', 'fgh', 'wollo', 'ethiopia', '2017-02-16', '2017-02-09', '', 12, 123, 0, 155, 'semagn', 'cnv', 'dfghdj', '2017-02-01 16:24:43.340858', 62, 2, 2017, 'vip', '3');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dictionary`
--
ALTER TABLE `dictionary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guide`
--
ALTER TABLE `guide`
  ADD PRIMARY KEY (`guide_id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nomessage`
--
ALTER TABLE `nomessage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dictionary`
--
ALTER TABLE `dictionary`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `guide`
--
ALTER TABLE `guide`
  MODIFY `guide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
--
-- AUTO_INCREMENT for table `nomessage`
--
ALTER TABLE `nomessage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
