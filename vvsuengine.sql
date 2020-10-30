-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 30 2020 г., 05:19
-- Версия сервера: 5.7.25
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `vvsuengine`
--

-- --------------------------------------------------------

--
-- Структура таблицы `vvsu_groups`
--

CREATE TABLE `vvsu_groups` (
  `id` int(11) NOT NULL,
  `title` varchar(32) NOT NULL DEFAULT '',
  `permissions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `vvsu_posts`
--

CREATE TABLE `vvsu_posts` (
  `id` int(11) NOT NULL,
  `title` varchar(32) NOT NULL DEFAULT '',
  `text` longtext NOT NULL,
  `uid` int(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `vvsu_posts`
--

INSERT INTO `vvsu_posts` (`id`, `title`, `text`, `uid`, `date`) VALUES
(1, 'Тест запись', 'Curabitur ut congue hac, diam turpis maecenas id vestibulum nulla nisl, libero leo, ut scelerisque maecenas id, ornare magna orci. In blandit sed et sagittis non, ullamcorper nec metus felis vel, vestibulum a in sit. Leo non odio fermentum lectus cubilia, mauris aliquam nunc eu neque ac sollicitudin. Tincidunt nisl morbi nulla rutrum, adipisicing tellus integer nunc massa id quis. Cursus sagittis massa ac sociis interdum, sem cursus, enim aptent sit, semper mauris, quam urna sed quis vivamu', 1, '2020-10-30'),
(2, 'Тест запись', 'Curabitur ut congue hac, diam turpis maecenas id vestibulum nulla nisl, libero leo, ut scelerisque maecenas id, ornare magna orci. In blandit sed et sagittis non, ullamcorper nec metus felis vel, vestibulum a in sit. Leo non odio fermentum lectus cubilia, mauris aliquam nunc eu neque ac sollicitudin. Tincidunt nisl morbi nulla rutrum, adipisicing tellus integer nunc massa id quis. Cursus sagittis massa ac sociis interdum, sem cursus, enim aptent sit, semper mauris, quam urna sed quis vivamu', 1, '2020-10-30'),
(3, 'Тест запись', 'Curabitur ut congue hac, diam turpis maecenas id vestibulum nulla nisl, libero leo, ut scelerisque maecenas id, ornare magna orci. In blandit sed et sagittis non, ullamcorper nec metus felis vel, vestibulum a in sit. Leo non odio fermentum lectus cubilia, mauris aliquam nunc eu neque ac sollicitudin. Tincidunt nisl morbi nulla rutrum, adipisicing tellus integer nunc massa id quis. Cursus sagittis massa ac sociis interdum, sem cursus, enim aptent sit, semper mauris, quam urna sed quis vivamu', 1, '2020-10-30'),
(4, 'Тест запись', 'Curabitur ut congue hac, diam turpis maecenas id vestibulum nulla nisl, libero leo, ut scelerisque maecenas id, ornare magna orci. In blandit sed et sagittis non, ullamcorper nec metus felis vel, vestibulum a in sit. Leo non odio fermentum lectus cubilia, mauris aliquam nunc eu neque ac sollicitudin. Tincidunt nisl morbi nulla rutrum, adipisicing tellus integer nunc massa id quis. Cursus sagittis massa ac sociis interdum, sem cursus, enim aptent sit, semper mauris, quam urna sed quis vivamu', 1, '2020-10-31'),
(5, 'Тест запись', 'Curabitur ut congue hac, diam turpis maecenas id vestibulum nulla nisl, libero leo, ut scelerisque maecenas id, ornare magna orci. In blandit sed et sagittis non, ullamcorper nec metus felis vel, vestibulum a in sit. Leo non odio fermentum lectus cubilia, mauris aliquam nunc eu neque ac sollicitudin. Tincidunt nisl morbi nulla rutrum, adipisicing tellus integer nunc massa id quis. Cursus sagittis massa ac sociis interdum, sem cursus, enim aptent sit, semper mauris, quam urna sed quis vivamu', 1, '2020-10-31'),
(6, 'Тест запись', 'Curabitur ut congue hac, diam turpis maecenas id vestibulum nulla nisl, libero leo, ut scelerisque maecenas id, ornare magna orci. In blandit sed et sagittis non, ullamcorper nec metus felis vel, vestibulum a in sit. Leo non odio fermentum lectus cubilia, mauris aliquam nunc eu neque ac sollicitudin. Tincidunt nisl morbi nulla rutrum, adipisicing tellus integer nunc massa id quis. Cursus sagittis massa ac sociis interdum, sem cursus, enim aptent sit, semper mauris, quam urna sed quis vivamu', 1, '2020-10-31'),
(7, 'Тест запись', 'Curabitur ut congue hac, diam turpis maecenas id vestibulum nulla nisl, libero leo, ut scelerisque maecenas id, ornare magna orci. In blandit sed et sagittis non, ullamcorper nec metus felis vel, vestibulum a in sit. Leo non odio fermentum lectus cubilia, mauris aliquam nunc eu neque ac sollicitudin. Tincidunt nisl morbi nulla rutrum, adipisicing tellus integer nunc massa id quis. Cursus sagittis massa ac sociis interdum, sem cursus, enim aptent sit, semper mauris, quam urna sed quis vivamu', 1, '2020-10-31'),
(8, 'Тест запись', 'Curabitur ut congue hac, diam turpis maecenas id vestibulum nulla nisl, libero leo, ut scelerisque maecenas id, ornare magna orci. In blandit sed et sagittis non, ullamcorper nec metus felis vel, vestibulum a in sit. Leo non odio fermentum lectus cubilia, mauris aliquam nunc eu neque ac sollicitudin. Tincidunt nisl morbi nulla rutrum, adipisicing tellus integer nunc massa id quis. Cursus sagittis massa ac sociis interdum, sem cursus, enim aptent sit, semper mauris, quam urna sed quis vivamu', 1, '2020-10-31'),
(9, 'Тест запись', 'Curabitur ut congue hac, diam turpis maecenas id vestibulum nulla nisl, libero leo, ut scelerisque maecenas id, ornare magna orci. In blandit sed et sagittis non, ullamcorper nec metus felis vel, vestibulum a in sit. Leo non odio fermentum lectus cubilia, mauris aliquam nunc eu neque ac sollicitudin. Tincidunt nisl morbi nulla rutrum, adipisicing tellus integer nunc massa id quis. Cursus sagittis massa ac sociis interdum, sem cursus, enim aptent sit, semper mauris, quam urna sed quis vivamu', 1, '2020-10-31');

-- --------------------------------------------------------

--
-- Структура таблицы `vvsu_users`
--

CREATE TABLE `vvsu_users` (
  `id` int(11) NOT NULL,
  `gid` int(11) NOT NULL DEFAULT '1',
  `login` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL,
  `ip_create` varchar(15) NOT NULL DEFAULT '127.0.0.1',
  `time_create` varchar(32) NOT NULL DEFAULT '0',
  `firstname` varchar(32) NOT NULL DEFAULT '0',
  `lastname` varchar(32) NOT NULL DEFAULT '0',
  `gender` varchar(8) NOT NULL DEFAULT '0',
  `birthday` varchar(32) NOT NULL DEFAULT '0',
  `posts` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `vvsu_posts`
--
ALTER TABLE `vvsu_posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `vvsu_posts`
--
ALTER TABLE `vvsu_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
