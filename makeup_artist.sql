-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 18, 2021 lúc 04:56 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `makeup_artist`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL,
  `AdminAccount` varchar(100) NOT NULL,
  `AdminPass` varchar(100) NOT NULL,
  `AdminName` varchar(100) NOT NULL,
  `AdminEmail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`AdminID`, `AdminAccount`, `AdminPass`, `AdminName`, `AdminEmail`) VALUES
(1, 'minhapplehuna', '81dc9bdb52d04dc20036dbd8313ed055', 'Quang Minh', 'minh@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `artist_information`
--

CREATE TABLE `artist_information` (
  `ID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `Birthday` date NOT NULL,
  `img_path` varchar(255) NOT NULL,
  `Biography` text DEFAULT NULL,
  `Achievements` text DEFAULT NULL,
  `Certifications` text DEFAULT NULL,
  `Demo` varchar(60) NOT NULL,
  `Demo_charge` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `artist_information`
--

INSERT INTO `artist_information` (`ID`, `Name`, `Address`, `Birthday`, `img_path`, `Biography`, `Achievements`, `Certifications`, `Demo`, `Demo_charge`) VALUES
(1, 'Carla Houston', 'New Delhi', '1989-02-23', 'image/aashmeen-munjaals-star-salon-academy-profile.jpg', 'Carla Houston is a professional makeup artist based out of the capital city of India, New Delhi. She is a fashion stylist by profession. Presently, Aditi is working is in a collaboration with a fashion designer and freelancing for various events. With her professionalism and quality of work, she is not only trying to provide the best styling to her clients but working with them as well to represent their personalities in a best possible way. Aditi has been working with the fashion styling industry for a long time now. Also, with her corporate work experience, she is a perfectionist when it comes to dealing with clients. ', 'Yet to be awarded', 'Certified from hair masters', 'Carla Houston provide demo session', 10),
(2, 'Emma Emily', 'Michigan', '1991-07-14', 'image/0-Anusha-Mur-Professional-Fashion-Make-Up-Artist-Hair-Stylist-MUA-Advertising-Catalogue-Commercial-Editorial-Fashion-Video-shooting-Red-Carpet.jpg', 'Emma Emily is a professional freelance makeup artist based out of Delhi. She started in 2019 and has covered around 10 Wedding Parties. She uses the best brands and gives her 100% for giving flawless looks to her clients. She makes sure that the client is comfortable in letting her handle their looks as your visions and requirements are imperative. The desired result is achieved and a smile is left on the face of each customer.', 'Yet to be awarded\r\n', NULL, 'Emma Emily provide demo session', 8),
(3, 'Sarah Carey', 'California', '1993-08-10', 'image/makeover-by-anuj-dogra-profile.jpg', 'Sarah Carey is a professional makeup artist based out of California, USA.  Started with Makeup Mantra professional artists in 2014, Carey has been doing remarkable work till date. She uses MAC products and re-creates a normal face into an extremely beautiful one. Well known for her profession, Carey has worked with several renowned celebrities. Carey works for: Bridals Parties Events Fashion shoots', 'Yet to be awarded\r\n', NULL, 'Sarah Carey doesn\'t provide demo session', 0),
(4, 'Emma Megan', 'Mumbai', '1992-03-15', 'image/astha-khanna-profile.jpg', 'Emma Megan is a makeup artist based out of the capital city of Maharashtra, Mumbai. She has been trained from London school of Advanced Makeup, Tony & Guy Singapore, Waler Scheldem from Germany, and City and Guild University. She has done makeup for many contestants of Pantaloon Femina MISS INDIA contest, and has recreated the mystic looks for several pageants and contests. She has won awards like: All India Excellence Award in Hair and Makeup Artistry Times Research Award for Best Makeovers. She has been to this profession for the last 10 years, and she has enhanced the beauty of celebrities like Soha Ali Khan, Jacquiline Fernandis, Freida Pinto, and some stunning ramp models like Krishna Sumani, Amanpreet Wahi, Yuvika Choudhry and many more. Her salon provides all of service and especially Hair Care: Hairdressing, Hairstyling, Hair spa, hairstyles like braids or buns, ponies or pleats, spikes or streaks Skin Care.', 'All India Excellence Award in Hair and Makeup Artistry Times Research Award for Best Makeovers ', NULL, 'Emma Megan provide demo session', 9),
(5, 'Nancy Perez', 'New Delhi', '1994-04-14', 'image/ablaze-profile.jpg', 'Nancy Perez is a  makeup artist with extreme potential. She holds an experience of two years in the field of makeup artistry. She is amazing and puts her best foot forward. Also, she has the expertise to make you look beautiful and get appreciation. She is a freelance makeup artist and hairstylist. Ashima Arora has done her makeup artistry from Pearl Academy of Fashion and she specializes in bridal, fashion  and any makeup.', 'Yet to be awarded', 'Certified from Pearl Academy of Fashion', 'Emma Megan provide demo session', 8.5),
(6, 'Wesley Bates', 'Texas', '1995-08-12', 'image/aakriti-kochar-profile.jpg', 'Wesley Bates is a professional makeup artist. She understands makeup as an art of enhancing one\'s features. Her style is quite modern and contemporary. She believes that makeup is best done when it is not over-done. Makeup services for: Bridal and groom makeup and draping saree/attire Wesly Bates has a team of experts who offer freelance on-location services for weddings and other occasions nationwide and abroad. She is also associated with the famous cosmetic brand, Oriflame India, where she works as as their beauty and makeup expert.', 'Yet to be awarded\r\n', NULL, 'Wesley Bates provide demo session', 11),
(7, 'Kristen Brown', 'Ludhiana', '1992-02-18', 'image/afsha-makeup-studio-profile.jpg', 'Kristen Brown is professional makeup artist and hairstylist with tremendous experience in the industry. Her work includes to experiment with makeup and hairstyles for her clients that just not only look good on and off the camera, but also lasts all day long. Also, Brown has worked with numerous brides bringing her skills and knowledge to give them the perfectly tailored makeup for their day. Makeup is Brown’s passion and she prides herself on her ability to generate a unique look for each client. Servicers provided by Brown Makeup : Bridal Makeup and Styling Family Makeup  ', 'Yet to be awarded\r\n', NULL, 'Kristen Brown provide demo session', 9),
(8, 'Stacey Connor', 'Mumbai', '1992-08-23', 'image/ambreen-vikhar-profile.jpg', 'Stacey Connor is a professional makeup artist . Conner can make a bride\'s dream-wedding come true. Bridal and groom makeup are her forte;She also provide touch up service . She has worked across all cultures and backgrounds. She has a strong clientele that keeps coming back to her for small as well as big events. Connor has also worked with many a photographer for working on advertisements, films, photoshoots, print ads, and editorials. Having received extensive training from top makeup artists, you can count on her to make you look your best.', 'Yet to be awarded\r\n', NULL, 'Stacey Connor doesn\'t provide demo session', 0),
(9, 'Beth Olivia', 'New Delhi', '1993-02-05', 'image/artistry-by-olivia-profile.jpg', 'Olivia is the founder of Artistry by Olivia and is a bridal,groom makeup artist , hair stylish, draping saree/ attire and a beauty enthusiast. She works for the corporate industry but she has always had a deep, unknowing passion for makeup which made her venture into the world of artistry and that’s how she coined the name – \'Artistry by Olivia\'. She is a self-taught makeup artist. She focuses on giving the bride an effortless elegance and class. She has worked with a few celebrities for their photoshoots, magazine shoots and with a lot of gorgeous brides, too. She also conducts personalized workshops and has tied up with a celebrity hairstylist and a saree draper, who both accompany her for bridal makeovers. She has the potential to soar high and is quite innovative at her work. With a rich experience, Olivia has made an impact in the industry and gained appreciation as well.', 'Yet to be awarded', NULL, 'Beth Olivia provide demo session', 10),
(10, 'Mario Dedivanovic', 'New York', '1983-10-01', 'image/Mario-Dedivanovic.jpg', 'This person is a typical self-made man who has achieved his goals only with the help of his hard work and perseverance. He was born on the 1st of October, 1983, in New York. He comes from a family of emigrants. His family came from Albany. He has developed his own program in makeup and due to this fact he has been given a chance to work with the greatest contemporary celebrity. By now he has worked with famous magazines and has taken part in television series creation.', 'Mario Dedivanovic has designed his own training program called The Master Class', NULL, 'Mario Dedivanovic doesn\'t provide demo session', 0),
(11, 'Hung Vanngo', 'New York', '1985-12-05', 'image/m-20190805-083457.jpg', 'Celebrity makeup artist who caught the eye of fashion’s top photographers. His work has been featured in Allure, Elle, Interview, I-D, Italian Vogue and numerous other publications. Hung Vanngo is a well known Makeup Artist. Hung was born on December 5, 1985 in Vietnam..Hung is one of the famous and trending celeb who is popular for being a Makeup Artist. As of 2019 Hung Vanngo is 33 years years old. Hung Vanngo is a member of famous Makeup Artist list.\r\n\r\n', 'Yet to be awarded', NULL, 'Hung Vanngo doesn\'t provide a demo session', 0),
(12, 'Gucci Westman', 'Florida', '1971-10-18', 'image/images.jpg', 'Gucci Westman has one of the most influential careers in the beauty world. She’s responsible for the makeup on countless magazine covers (Vogue, Harper’s Bazaar) and in ad campaign and runway looks for the likes of Dior, Proenza Schouler, and Oscar de la Renta, and has a celebrity client list that spans the past two decades. Now, she’s the founder and creative director of Westman Atelier, a line of clean, high-performance, and luxurious beauty products', 'Gucci Westman\'s the founder and creative director of Westman Atelier', NULL, 'Gucci Westman provide demo session', 14.5),
(13, 'Kenvin', 'Viet Nam', '2021-01-09', 'image/Makeup.jpg', '1234', '1234', '1', 'Kenvin provide demo session', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `artist_service`
--

CREATE TABLE `artist_service` (
  `Service_ID` int(11) NOT NULL,
  `Artist_ID` int(11) NOT NULL,
  `img_sample_path` varchar(255) NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `artist_service`
--

INSERT INTO `artist_service` (`Service_ID`, `Artist_ID`, `img_sample_path`, `Price`) VALUES
(1, 1, 'image/sample/0acbf0067f68e008ce280ff64f0d349a--pakistani-bridal-bridal-makeup.jpg', 20),
(2, 1, 'image/sample/cca2c5c5c95ebff8f7d5c3a879519754_2.jpg', 20),
(4, 1, 'image/sample/3.-httpwww.tanvii.com2012_10_01_archive.html.jpg', 45),
(1, 2, 'image/sample/bridal-makeup-bag-image.jpg', 18),
(2, 2, 'image/sample/r10_2x_groom-makeup.jpg', 22),
(1, 3, 'image/sample/2020-cover.jpg', 21.5),
(4, 3, 'image/sample/Diploma-in-Hair-Care-and-Hair-Styling-Level-3.jpg', 23),
(1, 4, 'image/sample/Bridal-Makeup-looks-which-rocked-the-2018-Indian-Wedding-Season8.jpg', 19),
(2, 4, 'image/sample/Groom-Make-Up.jpg', 19.5),
(3, 4, 'image/sample/5045148dc5616395ce99b50e5e13a9d1.jpg', 21),
(4, 4, 'image/sample/19._Half_up_Curls.jpg', 21),
(5, 4, 'image/sample/6f11a7c3ae6ae37b07b0feaca2fe40f7.jpg', 23),
(6, 4, 'image/sample/5e2ac700bfbf3.jpg', 24),
(4, 5, 'image/sample/maxresdefault.jpg', 22),
(5, 5, 'image/sample/3.-httpwww.tanvii.com2012_10_01_archive.html.jpg', 23),
(1, 6, 'image/sample/bridal_makeup_2.jpg', 24.5),
(2, 6, 'image/sample/groom-makeup-on-wedding-day-1.jpg', 24),
(1, 7, 'image/sample/Bridal.jpg', 25),
(3, 7, 'image/sample/Indian-Makeup-Style.jpg', 32.5),
(4, 7, 'image/sample/Indian-Hairstyles-For-Medium-Hair-1280x720.jpg', 31),
(1, 8, 'image/sample/Indias-best-bridal-makeup-artists-based-on-the-city-you-live-in-vogue-india.jpg', 33),
(2, 8, 'image/sample/Groom-makeup.jpg', 30),
(6, 8, 'image/sample/147643-High-Dynamic-Photography2148.jpeg', 32),
(1, 9, 'image/sample/bridal_makeup_cover.jpg', 31),
(2, 9, 'image/sample/8c7ab86b8188739f04bab10eb6cfd35e.jpg', 30),
(4, 9, 'image/sample/60659006_128916634968967_279645120255184702_n.jpg', 21),
(5, 9, 'image/sample/1731544708c9bb43e26cde0b33109fee.jpg', 22),
(3, 10, 'image/sample/Mario Dedivanovic.jpg', 45),
(3, 11, 'image/sample/97110117_245498963458813_1205963497915112012_n.jpg', 46),
(3, 12, 'image/sample/gucci-westman-rexfeatures_5631567d.jpg', 42),
(6, 12, 'image/sample/Gucci-Westman-world’s-top-makeup-artists-caravane-beauty.jpg', 43);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book_artist`
--

CREATE TABLE `book_artist` (
  `Order_ID` int(11) NOT NULL,
  `Artist_ID` int(11) DEFAULT NULL,
  `Customer_Email` varchar(40) DEFAULT NULL,
  `Customer_Phone` varchar(10) DEFAULT NULL,
  `appointment_date` datetime DEFAULT NULL,
  `Appointment_Address` varchar(40) DEFAULT NULL,
  `Demo_Option` varchar(10) DEFAULT NULL,
  `Order_Total_Price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `book_artist`
--

INSERT INTO `book_artist` (`Order_ID`, `Artist_ID`, `Customer_Email`, `Customer_Phone`, `appointment_date`, `Appointment_Address`, `Demo_Option`, `Order_Total_Price`) VALUES
(1, 2, 'minh@gmail.com', '0363853581', '2021-01-21 22:50:00', 'Viet Nam', 'Yes', 40);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book_artist_detail`
--

CREATE TABLE `book_artist_detail` (
  `Order_ID` int(11) NOT NULL,
  `Service_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `book_artist_detail`
--

INSERT INTO `book_artist_detail` (`Order_ID`, `Service_ID`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `review_artist`
--

CREATE TABLE `review_artist` (
  `Review_ID` int(11) NOT NULL,
  `Artist_ID` int(11) DEFAULT NULL,
  `Customer_Email` varchar(40) DEFAULT NULL,
  `Content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `review_artist`
--

INSERT INTO `review_artist` (`Review_ID`, `Artist_ID`, `Customer_Email`, `Content`) VALUES
(1, 7, 'reehungng@gmail.com', 'Love ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `service`
--

CREATE TABLE `service` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `service`
--

INSERT INTO `service` (`ID`, `Name`) VALUES
(1, 'Bridal Make Up'),
(2, 'Groom Make Up'),
(3, 'Family Make Up (Only Makeup)'),
(4, 'Family Make Up (Hair styling)'),
(5, 'Family Make Up (Draping saree / Attire)'),
(6, 'Touch up service');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`),
  ADD UNIQUE KEY `AdminAccount` (`AdminAccount`);

--
-- Chỉ mục cho bảng `artist_information`
--
ALTER TABLE `artist_information`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `artist_service`
--
ALTER TABLE `artist_service`
  ADD PRIMARY KEY (`Artist_ID`,`Service_ID`) USING BTREE,
  ADD KEY `Service_ID` (`Service_ID`);

--
-- Chỉ mục cho bảng `book_artist`
--
ALTER TABLE `book_artist`
  ADD PRIMARY KEY (`Order_ID`),
  ADD KEY `FK_artistID_BA` (`Artist_ID`);

--
-- Chỉ mục cho bảng `book_artist_detail`
--
ALTER TABLE `book_artist_detail`
  ADD PRIMARY KEY (`Order_ID`,`Service_ID`),
  ADD KEY `Service_ID` (`Service_ID`);

--
-- Chỉ mục cho bảng `review_artist`
--
ALTER TABLE `review_artist`
  ADD PRIMARY KEY (`Review_ID`),
  ADD KEY `Artist_ID` (`Artist_ID`);

--
-- Chỉ mục cho bảng `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `artist_information`
--
ALTER TABLE `artist_information`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `book_artist`
--
ALTER TABLE `book_artist`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `review_artist`
--
ALTER TABLE `review_artist`
  MODIFY `Review_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `artist_service`
--
ALTER TABLE `artist_service`
  ADD CONSTRAINT `FK_artistID` FOREIGN KEY (`Artist_ID`) REFERENCES `artist_information` (`ID`),
  ADD CONSTRAINT `FK_serviceID` FOREIGN KEY (`Service_ID`) REFERENCES `service` (`ID`);

--
-- Các ràng buộc cho bảng `book_artist`
--
ALTER TABLE `book_artist`
  ADD CONSTRAINT `FK_artistID_BA` FOREIGN KEY (`Artist_ID`) REFERENCES `artist_information` (`ID`);

--
-- Các ràng buộc cho bảng `book_artist_detail`
--
ALTER TABLE `book_artist_detail`
  ADD CONSTRAINT `book_artist_detail_ibfk_1` FOREIGN KEY (`Order_ID`) REFERENCES `book_artist` (`Order_ID`),
  ADD CONSTRAINT `book_artist_detail_ibfk_2` FOREIGN KEY (`Service_ID`) REFERENCES `service` (`ID`);

--
-- Các ràng buộc cho bảng `review_artist`
--
ALTER TABLE `review_artist`
  ADD CONSTRAINT `review_artist_ibfk_1` FOREIGN KEY (`Artist_ID`) REFERENCES `artist_information` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
