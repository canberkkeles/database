-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 11 May 2019, 17:57:21
-- Sunucu sürümü: 10.1.37-MariaDB
-- PHP Sürümü: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `cs306project`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pword` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `pword`) VALUES
(1, 'canberkkeles', '5052600378c2ca05203d7b278e395d91');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `courier`
--

CREATE TABLE `courier` (
  `CourierID` int(11) NOT NULL,
  `CourierName` char(20) DEFAULT NULL,
  `CourierBrand` char(20) DEFAULT NULL,
  `storeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `courierdeliversto`
--

CREATE TABLE `courierdeliversto` (
  `courierid` int(11) DEFAULT NULL,
  `customerid` int(11) NOT NULL,
  `date` char(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymentmethod` char(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `couriertakesfromstore`
--

CREATE TABLE `couriertakesfromstore` (
  `productid` int(11) DEFAULT NULL,
  `courierid` int(11) DEFAULT NULL,
  `storeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(11) NOT NULL,
  `CustomerName` char(20) DEFAULT NULL,
  `CustomerSurname` char(20) DEFAULT NULL,
  `CustomerAdress` char(100) DEFAULT NULL,
  `CustomerEmail` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customerbuysfromstore`
--

CREATE TABLE `customerbuysfromstore` (
  `customerid` int(11) DEFAULT NULL,
  `storeid` int(11) NOT NULL,
  `date` char(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymentmethod` char(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `delivers_to`
--

CREATE TABLE `delivers_to` (
  `Delivery_Date` char(20) DEFAULT NULL,
  `Payment_Method` char(20) DEFAULT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `CourierID` int(11) NOT NULL,
  `productid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `manager`
--

CREATE TABLE `manager` (
  `managerid` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `since` char(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `managername` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `manages`
--

CREATE TABLE `manages` (
  `managerid` int(11) NOT NULL,
  `storeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `productsent`
--

CREATE TABLE `productsent` (
  `productid` int(11) NOT NULL,
  `productbrand` char(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `producttype` char(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `supplierid` int(11) NOT NULL,
  `storeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `store`
--

CREATE TABLE `store` (
  `storeid` int(11) NOT NULL,
  `storeadress` char(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `storename` char(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `storerating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `supplier`
--

CREATE TABLE `supplier` (
  `supplierid` int(11) NOT NULL,
  `supplierbrandname` char(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `suppliertostore`
--

CREATE TABLE `suppliertostore` (
  `storeid` int(11) NOT NULL,
  `supplierid` int(11) NOT NULL,
  `transfervehicle` char(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transferdate` char(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `courier`
--
ALTER TABLE `courier`
  ADD PRIMARY KEY (`CourierID`),
  ADD KEY `courier_ibfk_1` (`storeid`);

--
-- Tablo için indeksler `courierdeliversto`
--
ALTER TABLE `courierdeliversto`
  ADD KEY `courierid` (`courierid`),
  ADD KEY `customerid` (`customerid`),
  ADD KEY `productid` (`productid`);

--
-- Tablo için indeksler `couriertakesfromstore`
--
ALTER TABLE `couriertakesfromstore`
  ADD KEY `productid` (`productid`),
  ADD KEY `courierid` (`courierid`),
  ADD KEY `storeid` (`storeid`);

--
-- Tablo için indeksler `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Tablo için indeksler `customerbuysfromstore`
--
ALTER TABLE `customerbuysfromstore`
  ADD KEY `customerid` (`customerid`),
  ADD KEY `storeid` (`storeid`),
  ADD KEY `fk_productid` (`productid`);

--
-- Tablo için indeksler `delivers_to`
--
ALTER TABLE `delivers_to`
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `CourierID` (`CourierID`),
  ADD KEY `productid` (`productid`);

--
-- Tablo için indeksler `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`managerid`);

--
-- Tablo için indeksler `manages`
--
ALTER TABLE `manages`
  ADD KEY `managerid` (`managerid`),
  ADD KEY `storeid` (`storeid`);

--
-- Tablo için indeksler `productsent`
--
ALTER TABLE `productsent`
  ADD PRIMARY KEY (`productid`),
  ADD KEY `supplierid` (`supplierid`),
  ADD KEY `productsent_ibfk_2` (`storeid`);

--
-- Tablo için indeksler `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`storeid`);

--
-- Tablo için indeksler `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplierid`);

--
-- Tablo için indeksler `suppliertostore`
--
ALTER TABLE `suppliertostore`
  ADD KEY `storeid` (`storeid`),
  ADD KEY `supplierid` (`supplierid`),
  ADD KEY `suppliertostore_ibfk_3` (`productid`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `courier`
--
ALTER TABLE `courier`
  ADD CONSTRAINT `courier_ibfk_1` FOREIGN KEY (`storeid`) REFERENCES `store` (`storeid`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `courierdeliversto`
--
ALTER TABLE `courierdeliversto`
  ADD CONSTRAINT `courierdeliversto_ibfk_1` FOREIGN KEY (`courierid`) REFERENCES `courier` (`CourierID`) ON DELETE CASCADE,
  ADD CONSTRAINT `courierdeliversto_ibfk_2` FOREIGN KEY (`customerid`) REFERENCES `customer` (`CustomerID`) ON DELETE CASCADE,
  ADD CONSTRAINT `courierdeliversto_ibfk_3` FOREIGN KEY (`productid`) REFERENCES `productsent` (`productid`);

--
-- Tablo kısıtlamaları `couriertakesfromstore`
--
ALTER TABLE `couriertakesfromstore`
  ADD CONSTRAINT `couriertakesfromstore_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `productsent` (`productid`) ON DELETE CASCADE,
  ADD CONSTRAINT `couriertakesfromstore_ibfk_2` FOREIGN KEY (`courierid`) REFERENCES `courier` (`CourierID`) ON DELETE CASCADE,
  ADD CONSTRAINT `couriertakesfromstore_ibfk_3` FOREIGN KEY (`storeid`) REFERENCES `store` (`storeid`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `customerbuysfromstore`
--
ALTER TABLE `customerbuysfromstore`
  ADD CONSTRAINT `customerbuysfromstore_ibfk_1` FOREIGN KEY (`customerid`) REFERENCES `customer` (`CustomerID`) ON DELETE CASCADE,
  ADD CONSTRAINT `customerbuysfromstore_ibfk_2` FOREIGN KEY (`storeid`) REFERENCES `store` (`storeid`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_productid` FOREIGN KEY (`productid`) REFERENCES `productsent` (`productid`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `delivers_to`
--
ALTER TABLE `delivers_to`
  ADD CONSTRAINT `delivers_to_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `delivers_to_ibfk_2` FOREIGN KEY (`CourierID`) REFERENCES `courier` (`CourierID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `delivers_to_ibfk_3` FOREIGN KEY (`productid`) REFERENCES `productsent` (`productid`);

--
-- Tablo kısıtlamaları `manages`
--
ALTER TABLE `manages`
  ADD CONSTRAINT `manages_ibfk_1` FOREIGN KEY (`managerid`) REFERENCES `manager` (`managerid`) ON DELETE CASCADE,
  ADD CONSTRAINT `manages_ibfk_2` FOREIGN KEY (`storeid`) REFERENCES `store` (`storeid`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `productsent`
--
ALTER TABLE `productsent`
  ADD CONSTRAINT `productsent_ibfk_1` FOREIGN KEY (`supplierid`) REFERENCES `supplier` (`supplierid`) ON DELETE CASCADE,
  ADD CONSTRAINT `productsent_ibfk_2` FOREIGN KEY (`storeid`) REFERENCES `store` (`storeid`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `suppliertostore`
--
ALTER TABLE `suppliertostore`
  ADD CONSTRAINT `suppliertostore_ibfk_1` FOREIGN KEY (`storeid`) REFERENCES `store` (`storeid`) ON DELETE CASCADE,
  ADD CONSTRAINT `suppliertostore_ibfk_2` FOREIGN KEY (`supplierid`) REFERENCES `supplier` (`supplierid`) ON DELETE CASCADE,
  ADD CONSTRAINT `suppliertostore_ibfk_3` FOREIGN KEY (`productid`) REFERENCES `productsent` (`productid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
