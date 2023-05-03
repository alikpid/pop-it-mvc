-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 03 2023 г., 23:19
-- Версия сервера: 10.4.27-MariaDB
-- Версия PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `humanresources`
--

-- --------------------------------------------------------

--
-- Структура таблицы `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `sex` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `placeOfResidence` varchar(255) NOT NULL,
  `id_subdivision` int(11) NOT NULL,
  `id_position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `employees`
--

INSERT INTO `employees` (`id`, `surname`, `name`, `middlename`, `sex`, `DOB`, `placeOfResidence`, `id_subdivision`, `id_position`) VALUES
(17, 'Кузьмов', 'Даниил', 'Родионович', 'Мужской', '1987-04-02', 'Самарская область, город Чехов, ул. Балканская, 03', 1, 7),
(18, 'Капитонова', 'Милена', 'Антониновна', 'Женский', '2001-10-05', 'Курганская область, город Павловский Посад, шоссе Чехова, 87', 1, 1),
(19, 'Яногина', 'Надежда', 'Казимировна', 'Женский', '2000-01-18', 'Ярославская область, город Можайск, бульвар Бухарестская, 51', 1, 13),
(20, 'Шевцов', 'Николай', 'Чеславович', 'Мужской', '1995-09-13', 'Пензенская область, город Серпухов, шоссе Ленина, 72', 3, 4),
(21, 'Кудрявцева', 'Ангелина', 'Марковна', 'Женский', '1983-12-13', 'Магаданская область, город Щёлково, въезд Гоголя, 44', 2, 3),
(22, 'Бирюкова', 'Алла', 'Карповна', 'Женский', '2003-09-10', 'Кемеровская область, город Шаховская, пр. 1905 года, 59', 2, 10),
(23, 'Маринин', 'Павел', 'Денисович', 'Мужской', '1984-07-29', 'Свердловская область, город Сергиев Посад, пр. Ломоносова, 45', 2, 11),
(24, 'Розенбах', 'Данила', 'Фролович', 'Мужской', '2004-05-27', 'Волгоградская область, город Дорохово, въезд Сталина, 12', 2, 3),
(25, 'Сластников', 'Павел', 'Евгениевич', 'Мужской', '1995-09-15', 'Иркутская область, город Домодедово, проезд Ленина, 72', 2, 2),
(26, 'Энгельгардт', 'Ярослав', 'Зиновиевич', 'Мужской', '1996-03-02', 'Воронежская область, город Сергиев Посад, наб. Сталина, 71', 3, 6),
(27, 'Шихранова', 'Влада', 'Родионовна', 'Женский', '1991-07-10', 'Костромская область, город Егорьевск, наб. 1905 года, 55', 3, 12),
(28, 'Москвитин', 'Святослав', 'Ульянович', 'Мужской', '1981-11-19', 'Волгоградская область, город Луховицы, пр. Бухарестская, 47', 3, 8),
(29, 'Золотова', 'Светлана ', 'Захаровна', 'Женский', '1973-03-31', 'Курганская область, город Дмитров, пер. Космонавтов, 76', 4, 5),
(30, 'Шестакова', 'Светлана ', 'Святославовна', 'Женский', '1994-07-03', 'Оренбургская область, город Одинцово, въезд Ломоносова, 26', 1, 4),
(31, 'Холопов', 'Юрий', 'Панкратиевич', 'Мужской', '1987-10-15', 'Псковская область, город Наро-Фоминск, спуск Будапештсткая, 42', 4, 9),
(42, 'Пупкина', 'Алефтина', 'Васильевна', 'Женский', '1996-08-19', 'Г. Владимир, улица Вяземского, дом 9', 4, 9),
(43, 'Мамакова', 'Алиса', 'Михайловна', 'Женский', '2002-02-09', 'Р. Алтай, село Шебалино д6', 1, 8),
(44, 'Сотрудник', 'Которого', 'Уволю', 'Женский', '1991-03-05', 'Уволю емае', 3, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `employee_positions`
--

CREATE TABLE `employee_positions` (
  `id` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `employee_positions`
--

INSERT INTO `employee_positions` (`id`, `id_type`, `title`) VALUES
(1, 1, 'Преподаватель'),
(2, 3, 'Охранник'),
(3, 4, 'Системный администратор'),
(4, 2, 'Заместитель по воспитательской работе'),
(5, 2, 'Директор'),
(6, 3, 'Психолог'),
(7, 1, 'Профессор'),
(8, 3, 'Социальный педагог'),
(9, 2, 'Бухгалтер'),
(10, 4, 'Инженер по сетям'),
(11, 4, 'Техник'),
(12, 3, 'Заведующий библиотекой'),
(13, 1, 'Куратор');

-- --------------------------------------------------------

--
-- Структура таблицы `fired_employees`
--

CREATE TABLE `fired_employees` (
  `id_employee` int(11) NOT NULL,
  `reason` text NOT NULL,
  `quiteDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `fired_employees`
--

INSERT INTO `fired_employees` (`id_employee`, `reason`, `quiteDate`) VALUES
(42, 'Глупая фамилия', '2023-05-26'),
(43, 'Частые опоздания на работу', '2023-05-04'),
(44, 'Так нужно', '2023-05-07');

-- --------------------------------------------------------

--
-- Структура таблицы `position_types`
--

CREATE TABLE `position_types` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `position_types`
--

INSERT INTO `position_types` (`id`, `title`) VALUES
(1, 'Преподавательский'),
(2, 'Администрация'),
(3, 'Вспомогательный'),
(4, 'Тех. обслуживание');

-- --------------------------------------------------------

--
-- Структура таблицы `subdivisions`
--

CREATE TABLE `subdivisions` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `id_subdivisionType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `subdivisions`
--

INSERT INTO `subdivisions` (`id`, `title`, `id_subdivisionType`) VALUES
(1, 'Учебное', 2),
(2, 'Хозяйственное', 3),
(3, 'Информационное', 1),
(4, 'Финансовое', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `subdivision_types`
--

CREATE TABLE `subdivision_types` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `subdivision_types`
--

INSERT INTO `subdivision_types` (`id`, `title`) VALUES
(1, 'Служба'),
(2, 'Отделение'),
(3, 'Отдел'),
(4, 'Управление');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `password`, `role`) VALUES
(10, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(11, 'user', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user'),
(12, 'admin2', 'admin2', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(13, 'user2', 'user2', 'ee11cbb19052e40b07aac0ca060c23ee', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_subdivision` (`id_subdivision`),
  ADD KEY `id_position` (`id_position`);

--
-- Индексы таблицы `employee_positions`
--
ALTER TABLE `employee_positions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type` (`id_type`);

--
-- Индексы таблицы `fired_employees`
--
ALTER TABLE `fired_employees`
  ADD PRIMARY KEY (`id_employee`),
  ADD UNIQUE KEY `id_employee` (`id_employee`);

--
-- Индексы таблицы `position_types`
--
ALTER TABLE `position_types`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subdivisions`
--
ALTER TABLE `subdivisions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subdivision_ibfk_1` (`id_subdivisionType`);

--
-- Индексы таблицы `subdivision_types`
--
ALTER TABLE `subdivision_types`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT для таблицы `employee_positions`
--
ALTER TABLE `employee_positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `position_types`
--
ALTER TABLE `position_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `subdivisions`
--
ALTER TABLE `subdivisions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `subdivision_types`
--
ALTER TABLE `subdivision_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`id_subdivision`) REFERENCES `subdivisions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`id_position`) REFERENCES `employee_positions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `employee_positions`
--
ALTER TABLE `employee_positions`
  ADD CONSTRAINT `employee_positions_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `position_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `fired_employees`
--
ALTER TABLE `fired_employees`
  ADD CONSTRAINT `fired_employees_ibfk_1` FOREIGN KEY (`id_employee`) REFERENCES `employees` (`id`);

--
-- Ограничения внешнего ключа таблицы `subdivisions`
--
ALTER TABLE `subdivisions`
  ADD CONSTRAINT `subdivisions_ibfk_1` FOREIGN KEY (`id_subdivisionType`) REFERENCES `subdivision_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
