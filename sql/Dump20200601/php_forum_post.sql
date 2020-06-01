-- MySQL dump 10.13  Distrib 8.0.18, for macos10.14 (x86_64)
--
-- Host: localhost    Database: php_forum
-- ------------------------------------------------------
-- Server version	8.0.18

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoryId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `title` text,
  `description` text,
  `content` text,
  `image` varchar(45) DEFAULT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `categoryId_fk_idx` (`categoryId`),
  KEY `userId_fk_idx` (`userId`),
  CONSTRAINT `categoryId_fk` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`),
  CONSTRAINT `userId_fk` FOREIGN KEY (`userId`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (13,8,1,'Vừa mở Tương Dương và Công Thành Chiến, hàng vạn game thủ Việt đã ùn ùn vào chiến JX1 Huyền Thoại Võ Lâm','Thế mới thấy sức nóng của huyền thoại Võ Lâm một thời vẫn luôn hừng hực trong lòng cộng đồng game thủ Việt. Nhà phát hành EfunVN đã mở đến 8 cụm server mà có vẻ vẫn là chưa đủ...','&lt;p&gt;V&amp;agrave;o 11h s&amp;aacute;ng nay 28/05, tựa game V&amp;otilde; L&amp;acirc;m - huyền thoại những năm 2005 đ&amp;atilde; ch&amp;iacute;nh thức t&amp;aacute;i sinh tr&amp;ecirc;n mobile, đưa game thủ về những th&amp;aacute;ng ng&amp;agrave;y đua nhau c&amp;agrave;y cấp, Tống Kim v&amp;agrave; săn boss v&amp;ocirc; c&amp;ugrave;ng r&amp;ocirc;m rả.&lt;/p&gt;\r\n\r\n&lt;p&gt;Với sức n&amp;oacute;ng của m&amp;igrave;nh,&amp;nbsp;&lt;a href=&quot;https://gamek.vn/jx1-huyen-thoai-vo-lam.htm&quot; target=&quot;_blank&quot;&gt;&lt;strong&gt;JX1 EfunVN - Huyền Thoại V&amp;otilde; L&amp;acirc;m&lt;/strong&gt;&lt;/a&gt;&lt;strong&gt;&amp;nbsp;&lt;/strong&gt;đ&amp;atilde; thu h&amp;uacute;t h&amp;agrave;ng vạn game thủ chen ch&amp;acirc;n v&amp;agrave;o 2 server mới l&amp;agrave; Tương Dương v&amp;agrave; C&amp;ocirc;ng Th&amp;agrave;nh Chiến. Đ&amp;atilde; rất l&amp;acirc;u rồi mới c&amp;oacute; một tr&amp;ograve; chơi khiến cộng đồng game thủ Việt h&amp;aacute;o hức v&amp;agrave; &amp;quot;ph&amp;aacute;t cuồng&amp;quot; như thế.&lt;/p&gt;\r\n\r\n&lt;p&gt;Kh&amp;ocirc;ng mất nhiều thời gian, ch&amp;uacute;ng t&amp;ocirc;i đ&amp;atilde; ho&amp;agrave;n th&amp;agrave;nh xong kh&amp;acirc;u tải game v&amp;agrave; đăng nhập. Vẫn l&amp;agrave; những Ba Lăng Huyện, hệ ph&amp;aacute;i Ngũ h&amp;agrave;nh tương sinh tương khắc... &amp;quot;đậm chất V&amp;otilde; L&amp;acirc;m&amp;quot; ng&amp;agrave;y n&amp;agrave;o.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;a href=&quot;https://gamek.mediacdn.vn/133514250583805952/2020/5/28/photo-1-15906462161791572557100.jpg&quot;&gt;&lt;img alt=&quot;&quot; src=&quot;https://gamek.mediacdn.vn/133514250583805952/2020/5/28/photo-1-15906462161791572557100.jpg&quot; style=&quot;height:360px; width:640px&quot; /&gt;&lt;/a&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;em&gt;L&amp;agrave; một bản port ho&amp;agrave;n hảo l&amp;ecirc;n mobile, Huyền Thoại V&amp;otilde; L&amp;acirc;m đ&amp;atilde; cung cấp đầy đủ bản c&amp;agrave;i đặt tr&amp;ecirc;n Android v&amp;agrave; iOS, thậm ch&amp;iacute; cả PC Client cho những anh em muốn chơi bằng giả lập.&lt;/em&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;VL&quot; src=&quot;https://gamek.mediacdn.vn/133514250583805952/2020/5/28/a1-1590646308648779061204.png&quot; style=&quot;height:356px; width:640px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;em&gt;H&amp;agrave;ng vạn anh em n&amp;ocirc; nức v&amp;agrave;o chơi JX1 Huyền Thoại V&amp;otilde; L&amp;acirc;m ng&amp;agrave;y mở cửa server mới&lt;/em&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;L&amp;agrave; một game chuyển thể l&amp;ecirc;n mobile n&amp;ecirc;n JX1 EfunVN - Huyền Thoại V&amp;otilde; L&amp;acirc;m đ&amp;atilde; c&amp;oacute; một số chỉnh sửa về gameplay để ph&amp;ugrave; hợp với nền di động.&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;Đ&amp;oacute; l&amp;agrave; những thanh trạng th&amp;aacute;i, khung hiển thị t&amp;iacute;nh năng v&amp;agrave; c&amp;aacute;c &amp;ocirc; skill... được bố tr&amp;iacute; để thuận tiện cho game thủ thao t&amp;aacute;c tr&amp;ecirc;n m&amp;agrave;n h&amp;igrave;nh cảm ứng.&lt;/p&gt;',NULL,'2020-06-01 15:38:12'),(14,4,1,'Ash Ketchum đã bắt được tất cả bao nhiêu loài Pokemon?','Lượng Pokemon mà Ash bắt được sẽ khiến bạn phải bất ngờ đấy','&lt;p&gt;Ash Ketchum hay c&amp;ograve;n được biết đến Satoshi trong bản Nhật - vốn l&amp;agrave; 1 nh&amp;acirc;n vật dựa tr&amp;ecirc;n Red nhưng k&amp;eacute;m ho&amp;agrave;n hảo hơn. Kh&amp;ocirc;ng như Red đ&amp;atilde; c&amp;oacute; 1 cuộc h&amp;agrave;nh tr&amp;igrave;nh vĩ đại v&amp;agrave; chinh phục ng&amp;ocirc;i vương của Kanto, Ash lại đi chinh phục rất nhiều đại lục kh&amp;aacute;c nhau v&amp;agrave; chỉ l&amp;ecirc;n ng&amp;ocirc;i vương tại Alola sau tận 20 năm. Tuy vậy, cậu ta lại bắt được rất nhiều Pokemon v&amp;agrave; cũng biết được rất nhiều điều mới mẻ trong chuyến h&amp;agrave;nh tr&amp;igrave;nh của m&amp;igrave;nh.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;https://gamek.mediacdn.vn/133514250583805952/2020/5/31/photo-1-15909410770642091912950.jpg&quot; style=&quot;height:360px; width:640px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Theo tiểu sử ở phi&amp;ecirc;n bản game, Red được đ&amp;aacute;nh gi&amp;aacute; l&amp;agrave; một trong những huấn luyện vi&amp;ecirc;n xuất sắc v&amp;agrave; thi&amp;ecirc;n t&amp;agrave;i của v&amp;ugrave;ng Kanto. Cậu ta đ&amp;atilde; chinh phục được tất cả c&amp;aacute;c gym trong game, đồng thời cũng vượt qua đại lộ chiến thắng - Victory Road, đ&amp;aacute;nh bại cả 4 th&amp;agrave;nh vi&amp;ecirc;n của nh&amp;oacute;m Elite Four v&amp;agrave; nh&amp;agrave; v&amp;ocirc; địch Blue sau đ&amp;oacute;.&lt;/p&gt;\r\n\r\n&lt;p&gt;Tuy vậy, chiến t&amp;iacute;ch đ&amp;aacute;ng nhớ nhất của Red ch&amp;iacute;nh l&amp;agrave;&amp;nbsp;&lt;strong&gt;việc cậu ta đ&amp;atilde; bắt được trọn 151 Pokemon ở v&amp;ugrave;ng Kanto, trong đ&amp;oacute; c&amp;oacute; cả những Pokemon huyền thoại như tam điểu, Mewtwo v&amp;agrave; Mew.&amp;nbsp;&lt;/strong&gt;Tuy nhi&amp;ecirc;n, kh&amp;aacute; đ&amp;aacute;ng tiếc l&amp;agrave; ch&amp;uacute;ng ta lại kh&amp;ocirc;ng được thấy cậu ta &amp;quot;show h&amp;agrave;ng&amp;quot; những Pokemon huyền thoại trong c&amp;aacute;c phi&amp;ecirc;n bản sau n&amp;agrave;y, từ Gold/Silver cho tới phần Let&amp;#39;s Go. D&amp;ugrave; vậy, Red cũng đ&amp;atilde; rất mạnh rồi, việc đ&amp;aacute;nh bại được cậu ta cũng l&amp;agrave; mục ti&amp;ecirc;u tối thượng của c&amp;aacute;c nh&amp;acirc;n vật ch&amp;iacute;nh ở c&amp;aacute;c phi&amp;ecirc;n bản Pokemon về sau.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;https://gamek.mediacdn.vn/133514250583805952/2020/5/31/photo-4-1590941078480215458181.png&quot; style=&quot;height:360px; width:640px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;So với Red, số lượng Pokemon m&amp;agrave; Ash bắt được &amp;iacute;t hơn kh&amp;aacute; nhiều. Tuy nhi&amp;ecirc;n, điểm th&amp;uacute; vị l&amp;agrave; c&amp;aacute;c Pokemon của Red được bắt ở nhiều đại lục kh&amp;aacute;c nhau, thế n&amp;ecirc;n ch&amp;uacute;ng đa dạng v&amp;agrave; hay ho hơn hẳn. V&amp;igrave; được thiết kế theo bối cảnh anime, thế c&amp;aacute;c Pokemon của Ash &amp;iacute;t nhiều đều c&amp;oacute; đất diễn v&amp;agrave; g&amp;acirc;y được cảm t&amp;igrave;nh với người xem bởi t&amp;iacute;nh c&amp;aacute;ch v&amp;agrave; c&amp;acirc;u chuyện xung quanh đến ch&amp;uacute;ng. Cho đến hiện tại, Ash Ketchum đ&amp;atilde; bắt được tổng cộng l&amp;agrave; 94 Pokemon, bao gồm cả c&amp;aacute;c Pokemon m&amp;agrave; cậu ta đ&amp;atilde; kh&amp;ocirc;ng d&amp;ugrave;ng nữa, thả về tự nhi&amp;ecirc;n hoặc l&amp;agrave; trao đổi với những người chơi kh&amp;aacute;c.&lt;/p&gt;',NULL,'2020-06-01 16:13:24');
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-01 16:25:02
