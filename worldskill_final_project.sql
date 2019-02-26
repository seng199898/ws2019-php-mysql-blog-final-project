-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2019 年 02 月 26 日 19:03
-- 伺服器版本: 10.1.34-MariaDB
-- PHP 版本： 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `worldskill_final_project`
--

-- --------------------------------------------------------

--
-- 資料表結構 `categories`
--

CREATE TABLE `categories` (
  `id` int(255) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(3, 'Activities'),
(6, 'Back End Programming'),
(4, 'Creativities'),
(7, 'Front End Programming'),
(2, 'Homework'),
(1, 'Notes'),
(5, 'Programming');

-- --------------------------------------------------------

--
-- 資料表結構 `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `content` text CHARACTER SET utf8mb4 NOT NULL,
  `category_id` int(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `category_id`, `created_date`, `updated_date`) VALUES
(16, 'Post testing', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos, harum nobis temporibus tempore a architecto debitis nulla est quis molestias id illo exercitationem ipsam sed, facere ducimus. Libero, corrupti aspernatur! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Blanditiis aliquam esse earum explicabo eaque iste vel. Enim autem minus, maiores esse, vel officiis, iusto quod culpa dicta tempore aliquid debitis. Temporibus id commodi expedita quidem consequatur ullam inventore alias nemo ad, debitis dolores, vero natus non, dolor facere rem officia aut tempore? Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus id commodi expedita quidem consequatur ullam inventore alias nemo ad, debitis dolores, vero natus non, dolor facere rem officia aut tempore? Lorem ipsum dolor sit amet consectetur adipisicing elit.\n\nLorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur itaque pariatur suscipit architecto asperiores magni odit ex deleniti error voluptatibus, repellendus ipsum adipisci repellat distinctio, corporis recusandae quo assumenda dolores. Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus id commodi expedita quidem consequatur ullam inventore alias nemo ad, debitis dolores, vero natus non, dolor facere rem officia aut tempore? Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus id commodi expedita quidem consequatur ullam inventore alias nemo ad, debitis dolores, vero natus non, dolor facere rem officia aut tempore? Lorem ipsum dolor sit amet consectetur adipisicing elit.', 2, '2019-02-27 00:27:52', '2019-02-27 00:27:52'),
(17, 'Worldskill php final project', 'Hello, I am peter;\nWell, well, well\nHa, ha, ha;\n\nLorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos, harum nobis temporibus tempore a architecto debitis nulla est quis molestias id illo exercitationem ipsam sed, facere ducimus. Libero, corrupti aspernatur! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Blanditiis aliquam esse earum explicabo eaque iste vel. Enim autem minus, maiores esse, vel officiis, iusto quod culpa dicta tempore aliquid debitis. Temporibus id commodi expedita quidem consequatur ullam inventore alias nemo ad, debitis dolores, vero natus non, dolor facere rem officia aut tempore? Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus id commodi expedita quidem consequatur ullam inventore alias nemo ad, debitis dolores, vero natus non, dolor facere rem officia aut tempore? Lorem ipsum dolor sit amet consectetur adipisicing elit.\n\nLorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur itaque pariatur suscipit architecto asperiores magni odit ex deleniti error voluptatibus, repellendus ipsum adipisci repellat distinctio, corporis recusandae quo assumenda dolores. Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus id commodi expedita quidem consequatur ullam inventore alias nemo ad, debitis dolores, vero natus non, dolor facere rem officia aut tempore? Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus id commodi expedita quidem consequatur ullam inventore alias nemo ad, debitis dolores, vero natus non, dolor facere rem officia aut tempore? Lorem ipsum dolor sit amet consectetur adipisicing elit.\n\nLorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos, harum nobis temporibus tempore a architecto debitis nulla est quis molestias id illo exercitationem ipsam sed, facere ducimus. Libero, corrupti aspernatur! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Blanditiis aliquam esse earum explicabo eaque iste vel. Enim autem minus, maiores esse, vel officiis, iusto quod culpa dicta tempore aliquid debitis. Temporibus id commodi expedita quidem consequatur ullam inventore alias nemo ad, debitis dolores, vero natus non, dolor facere rem officia aut tempore? Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus id commodi expedita quidem consequatur ullam inventore alias nemo ad, debitis dolores, vero natus non, dolor facere rem officia aut tempore? Lorem ipsum dolor sit amet consectetur adipisicing elit.\n\nLorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur itaque pariatur suscipit architecto asperiores magni odit ex deleniti error voluptatibus, repellendus ipsum adipisci repellat distinctio, corporis recusandae quo assumenda dolores. Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus id commodi expedita quidem consequatur ullam inventore alias nemo ad, debitis dolores, vero natus non, dolor facere rem officia aut tempore? Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus id commodi expedita quidem consequatur ullam inventore alias nemo ad, debitis dolores, vero natus non, dolor facere rem officia aut tempore? Lorem ipsum dolor sit amet consectetur adipisicing elit.\n\nLorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos, harum nobis temporibus tempore a architecto debitis nulla est quis molestias id illo exercitationem ipsam sed, facere ducimus. Libero, corrupti aspernatur! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Blanditiis aliquam esse earum explicabo eaque iste vel. Enim autem minus, maiores esse, vel officiis, iusto quod culpa dicta tempore aliquid debitis. Temporibus id commodi expedita quidem consequatur ullam inventore alias nemo ad, debitis dolores, vero natus non, dolor facere rem officia aut tempore? Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus id commodi expedita quidem consequatur ullam inventore alias nemo ad, debitis dolores, vero natus non, dolor facere rem officia aut tempore? Lorem ipsum dolor sit amet consectetur adipisicing elit.\n\nLorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur itaque pariatur suscipit architecto asperiores magni odit ex deleniti error voluptatibus, repellendus ipsum adipisci repellat distinctio, corporis recusandae quo assumenda dolores. Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus id commodi expedita quidem consequatur ullam inventore alias nemo ad, debitis dolores, vero natus non, dolor facere rem officia aut tempore? Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus id commodi expedita quidem consequatur ullam inventore alias nemo ad, debitis dolores, vero natus non, dolor facere rem officia aut tempore? Lorem ipsum dolor sit amet consectetur adipisicing elit.\n\nLorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos, harum nobis temporibus tempore a architecto debitis nulla est quis molestias id illo exercitationem ipsam sed, facere ducimus. Libero, corrupti aspernatur! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Blanditiis aliquam esse earum explicabo eaque iste vel. Enim autem minus, maiores esse, vel officiis, iusto quod culpa dicta tempore aliquid debitis. Temporibus id commodi expedita quidem consequatur ullam inventore alias nemo ad, debitis dolores, vero natus non, dolor facere rem officia aut tempore? Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus id commodi expedita quidem consequatur ullam inventore alias nemo ad, debitis dolores, vero natus non, dolor facere rem officia aut tempore? Lorem ipsum dolor sit amet consectetur adipisicing elit.\n\nLorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur itaque pariatur suscipit architecto asperiores magni odit ex deleniti error voluptatibus, repellendus ipsum adipisci repellat distinctio, corporis recusandae quo assumenda dolores. Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus id commodi expedita quidem consequatur ullam inventore alias nemo ad, debitis dolores, vero natus non, dolor facere rem officia aut tempore? Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus id commodi expedita quidem consequatur ullam inventore alias nemo ad, debitis dolores, vero natus non, dolor facere rem officia aut tempore? Lorem ipsum dolor sit amet consectetur adipisicing elit.', 4, '2019-02-27 00:29:25', '2019-02-27 01:05:16');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- 資料表索引 `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `posts_categories_FK` (`category_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表 AUTO_INCREMENT `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_categories_FK` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
