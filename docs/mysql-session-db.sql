--
-- Table structure for table `Session`
--

DROP TABLE IF EXISTS `Session`;
CREATE TABLE `Session` (
  `ID` int(10) DEFAULT NULL,
  `Session` varchar(255) DEFAULT NULL,
  `Data` text,
  `Expire` datetime DEFAULT NULL,
  `Create` datetime DEFAULT NULL
)

