-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 21 2021 г., 18:40
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
-- Структура таблицы `vvsu_posts`
--

CREATE TABLE `vvsu_posts` (
  `id` int(11) NOT NULL,
  `title` varchar(32) NOT NULL DEFAULT '',
  `short_text` text NOT NULL,
  `uid` int(10) NOT NULL,
  `date` date NOT NULL,
  `text` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `vvsu_posts`
--

INSERT INTO `vvsu_posts` (`id`, `title`, `short_text`, `uid`, `date`, `text`) VALUES
(1, 'Тест запись', 'Curabitur ut congue hac, diam turpis maecenas id vestibulum nulla nisl, libero leo, ut scelerisque maecenas id, ornare magna orci. In blandit sed et sagittis non, ullamcorper nec metus felis vel, vestibulum a in sit. Leo non odio fermentum lectus cubilia, mauris aliquam nunc eu neque ac sollicitudin. Tincidunt nisl morbi nulla rutrum, adipisicing tellus integer nunc massa id quis. Cursus sagittis massa ac sociis interdum, sem cursus, enim aptent sit, semper mauris, quam urna sed quis vivamu', 1, '2020-10-30', ''),
(2, 'Тест запись', 'Это тест запись. Читай новую запись по кнопке ниже!', 1, '2020-10-30', 'Curabitur ut congue hac, diam turpis maecenas id vestibulum nulla nisl, libero leo, ut scelerisque maecenas id, ornare magna orci. In blandit sed et sagittis non, ullamcorper nec metus felis vel, vestibulum a in sit. Leo non odio fermentum lectus cubilia, mauris aliquam nunc eu neque ac sollicitudin. Tincidunt nisl morbi nulla rutrum, adipisicing tellus integer nunc massa id quis. Cursus sagittis massa ac sociis interdum, sem cursus, enim aptent sit, semper mauris, quam urna sed quis vivamuCurabitur ut congue hac, diam turpis maecenas id vestibulum nulla nisl, libero leo, ut scelerisque maecenas id, ornare magna orci. In blandit sed et sagittis non, ullamcorper nec metus felis vel, vestibulum a in sit. Leo non odio fermentum lectus cubilia, mauris aliquam nunc eu neque ac sollicitudin. Tincidunt nisl morbi nulla rutrum, adipisicing tellus integer nunc massa id quis. Cursus sagittis massa ac sociis interdum, sem cursus, enim aptent sit, semper mauris, quam urna sed quis vivamuCurabitur ut congue hac, diam turpis maecenas id vestibulum nulla nisl, libero leo, ut scelerisque maecenas id, ornare magna orci. In blandit sed et sagittis non, ullamcorper nec metus felis vel, vestibulum a in sit. Leo non odio fermentum lectus cubilia, mauris aliquam nunc eu neque ac sollicitudin. Tincidunt nisl morbi nulla rutrum, adipisicing tellus integer nunc massa id quis. Cursus sagittis massa ac sociis interdum, sem cursus, enim aptent sit, semper mauris, quam urna sed quis vivamuCurabitur ut congue hac, diam turpis maecenas id vestibulum nulla nisl, libero leo, ut scelerisque maecenas id, ornare magna orci. In blandit sed et sagittis non, ullamcorper nec metus felis vel, vestibulum a in sit. Leo non odio fermentum lectus cubilia, mauris aliquam nunc eu neque ac sollicitudin. Tincidunt nisl morbi nulla rutrum, adipisicing tellus integer nunc massa id quis. Cursus sagittis massa ac sociis interdum, sem cursus, enim aptent sit, semper mauris, quam urna sed quis vivamuCurabitur ut congue hac, diam turpis maecenas id vestibulum nulla nisl, libero leo, ut scelerisque maecenas id, ornare magna orci. In blandit sed et sagittis non, ullamcorper nec metus felis vel, vestibulum a in sit. Leo non odio fermentum lectus cubilia, mauris aliquam nunc eu neque ac sollicitudin. Tincidunt nisl morbi nulla rutrum, adipisicing tellus integer nunc massa id quis. Cursus sagittis massa ac sociis interdum, sem cursus, enim aptent sit, semper mauris, quam urna sed quis vivamu'),
(3, 'Тест запись', 'Curabitur ut congue hac, diam turpis maecenas id vestibulum nulla nisl, libero leo, ut scelerisque maecenas id, ornare magna orci. In blandit sed et sagittis non, ullamcorper nec metus felis vel, vestibulum a in sit. Leo non odio fermentum lectus cubilia, mauris aliquam nunc eu neque ac sollicitudin. Tincidunt nisl morbi nulla rutrum, adipisicing tellus integer nunc massa id quis. Cursus sagittis massa ac sociis interdum, sem cursus, enim aptent sit, semper mauris, quam urna sed quis vivamu', 1, '2020-10-30', ''),
(4, 'Тест запись', 'Curabitur ut congue hac, diam turpis maecenas id vestibulum nulla nisl, libero leo, ut scelerisque maecenas id, ornare magna orci. In blandit sed et sagittis non, ullamcorper nec metus felis vel, vestibulum a in sit. Leo non odio fermentum lectus cubilia, mauris aliquam nunc eu neque ac sollicitudin. Tincidunt nisl morbi nulla rutrum, adipisicing tellus integer nunc massa id quis. Cursus sagittis massa ac sociis interdum, sem cursus, enim aptent sit, semper mauris, quam urna sed quis vivamu', 1, '2020-10-31', ''),
(5, 'Тест запись', 'Curabitur ut congue hac, diam turpis maecenas id vestibulum nulla nisl, libero leo, ut scelerisque maecenas id, ornare magna orci. In blandit sed et sagittis non, ullamcorper nec metus felis vel, vestibulum a in sit. Leo non odio fermentum lectus cubilia, mauris aliquam nunc eu neque ac sollicitudin. Tincidunt nisl morbi nulla rutrum, adipisicing tellus integer nunc massa id quis. Cursus sagittis massa ac sociis interdum, sem cursus, enim aptent sit, semper mauris, quam urna sed quis vivamu', 1, '2020-10-31', ''),
(6, 'Тест запись', 'Curabitur ut congue hac, diam turpis maecenas id vestibulum nulla nisl, libero leo, ut scelerisque maecenas id, ornare magna orci. In blandit sed et sagittis non, ullamcorper nec metus felis vel, vestibulum a in sit. Leo non odio fermentum lectus cubilia, mauris aliquam nunc eu neque ac sollicitudin. Tincidunt nisl morbi nulla rutrum, adipisicing tellus integer nunc massa id quis. Cursus sagittis massa ac sociis interdum, sem cursus, enim aptent sit, semper mauris, quam urna sed quis vivamu', 1, '2020-10-31', ''),
(7, 'Тест запись', 'Curabitur ut congue hac, diam turpis maecenas id vestibulum nulla nisl, libero leo, ut scelerisque maecenas id, ornare magna orci. In blandit sed et sagittis non, ullamcorper nec metus felis vel, vestibulum a in sit. Leo non odio fermentum lectus cubilia, mauris aliquam nunc eu neque ac sollicitudin. Tincidunt nisl morbi nulla rutrum, adipisicing tellus integer nunc massa id quis. Cursus sagittis massa ac sociis interdum, sem cursus, enim aptent sit, semper mauris, quam urna sed quis vivamu', 1, '2020-10-31', ''),
(8, 'Тест запись', 'Curabitur ut congue hac, diam turpis maecenas id vestibulum nulla nisl, libero leo, ut scelerisque maecenas id, ornare magna orci. In blandit sed et sagittis non, ullamcorper nec metus felis vel, vestibulum a in sit. Leo non odio fermentum lectus cubilia, mauris aliquam nunc eu neque ac sollicitudin. Tincidunt nisl morbi nulla rutrum, adipisicing tellus integer nunc massa id quis. Cursus sagittis massa ac sociis interdum, sem cursus, enim aptent sit, semper mauris, quam urna sed quis vivamu', 1, '2020-10-31', '');

-- --------------------------------------------------------

--
-- Структура таблицы `vvsu_post_to_tag`
--

CREATE TABLE `vvsu_post_to_tag` (
  `pid` int(11) NOT NULL,
  `tid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `vvsu_tags`
--

CREATE TABLE `vvsu_tags` (
  `id` int(10) NOT NULL,
  `title` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `vvsu_tags`
--

INSERT INTO `vvsu_tags` (`id`, `title`) VALUES
(1, 'ТЕГ1'),
(2, 'ТЕГ2'),
(3, 'ТЕГ3'),
(4, 'ТЕГ4'),
(5, 'ТЕГ5'),
(6, 'ТЕГ6'),
(7, 'ТЕГ7');

-- --------------------------------------------------------

--
-- Структура таблицы `vvsu_users`
--

CREATE TABLE `vvsu_users` (
  `id` int(11) NOT NULL,
  `login` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL,
  `ip_create` varchar(15) NOT NULL DEFAULT '127.0.0.1',
  `time_create` varchar(32) NOT NULL DEFAULT '0',
  `firstname` varchar(32) NOT NULL DEFAULT '0',
  `lastname` varchar(32) NOT NULL DEFAULT '0',
  `gender` tinyint(1) NOT NULL DEFAULT '0',
  `posts` int(11) DEFAULT '0',
  `posts_on_page` int(2) NOT NULL DEFAULT '5',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `session` varchar(128) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `vvsu_users`
--

INSERT INTO `vvsu_users` (`id`, `login`, `email`, `password`, `ip_create`, `time_create`, `firstname`, `lastname`, `gender`, `posts`, `posts_on_page`, `is_admin`, `session`) VALUES
(1, 'TestUser', 'awdadw@mail.ru', '123456', '127.0.0.1', '0', '0', '0', 0, 0, 5, 0, ''),
(2, 'test', 'test', '123', '127.0.0.1', '123', '0', '0', 1, 0, 5, 0, ''),
(3, 'TestLogin', 'awddawdwaaa@mail.ru', '$2y$10$AQ.B/1LR0K69eTbifkwu3.q7sTRG/D3MI0PapwqjRQQOr1ldLuh06', '127.0.0.1', '1607006549', '0', '0', 0, 0, 5, 0, ''),
(4, 'TestLogin33', 'awddawdwaddaa@mail.ru', '$2y$10$39jzJl7n70TGLHKcfNEf9eV2qztx0PPL9uPAdeISi57U9w0GAoOeO', '127.0.0.1', '1607006668', '0', '0', 0, 0, 5, 0, ''),
(5, 'test2', 'waddaw@mail.ru', '$2y$10$B71fZE5jJT3zcaBqBjK5xuXWcfpLq5tkpsySRAQArczeLFsE.pyLu', '127.0.0.1', '1607042948', '0', '0', 0, 0, 5, 0, ''),
(6, 'awdadw', 'amsher2007@mail.ru', '$2y$10$S6YbrP4xxLhUjxPj6QdZgu2mchVhSxKF8uBv/ry1aT2LA9Bo7yPsK', '127.0.0.1', '1607045751', '0', '0', 0, 0, 1, 0, ''),
(8, 'Serg1K', 'dawdaw@mail.ru', 'e10adc3949ba59abbe56e057f20f883e', '127.0.0.1', '1609138953', '0', '0', 0, 0, 5, 1, '928539bfe2d35cfc891d58b440a7e863');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `vvsu_posts`
--
ALTER TABLE `vvsu_posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `vvsu_post_to_tag`
--
ALTER TABLE `vvsu_post_to_tag`
  ADD KEY `vvsu_post_to_tag_k_1` (`pid`),
  ADD KEY `vvsu_post_to_tag_k_2` (`tid`);

--
-- Индексы таблицы `vvsu_tags`
--
ALTER TABLE `vvsu_tags`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `vvsu_users`
--
ALTER TABLE `vvsu_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`,`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `vvsu_posts`
--
ALTER TABLE `vvsu_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `vvsu_tags`
--
ALTER TABLE `vvsu_tags`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `vvsu_users`
--
ALTER TABLE `vvsu_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `vvsu_post_to_tag`
--
ALTER TABLE `vvsu_post_to_tag`
  ADD CONSTRAINT `vvsu_post_to_tag_k_1` FOREIGN KEY (`pid`) REFERENCES `vvsu_posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vvsu_post_to_tag_k_2` FOREIGN KEY (`tid`) REFERENCES `vvsu_tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
