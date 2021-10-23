-- Database: `register_db`
-- Table structure for table `user_login`
CREATE TABLE `user_login` (
  `id` int(6) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

-- Indexes for table `user_login`
ALTER TABLE
  `user_login`
ADD
  PRIMARY KEY (`id`);

-- AUTO_INCREMENT for table `user_login`
ALTER TABLE
  `user_login`
MODIFY
  `id` int(6) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 1;

COMMIT;
