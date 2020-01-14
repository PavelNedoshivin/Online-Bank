-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Янв 14 2020 г., 18:48
-- Версия сервера: 10.4.6-MariaDB
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `onlinebank`
--

-- --------------------------------------------------------

--
-- Структура таблицы `access`
--

CREATE TABLE `access` (
  `id` int(10) NOT NULL,
  `title` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `access`
--

INSERT INTO `access` (`id`, `title`) VALUES
(1, 'Unregistered'),
(2, 'Blocked'),
(3, 'Registered'),
(4, 'Admin');

-- --------------------------------------------------------

--
-- Структура таблицы `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `Balance` double NOT NULL,
  `OpeningDate` datetime NOT NULL,
  `CardsNumber` int(11) NOT NULL,
  `codeCustomer` int(11) NOT NULL,
  `codeEmployee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `accounts`
--

INSERT INTO `accounts` (`id`, `Balance`, `OpeningDate`, `CardsNumber`, `codeCustomer`, `codeEmployee`) VALUES
(12345678, 1057.75, '2000-01-15 00:00:00', 2, 123456, 12345),
(12345685, 500, '2004-06-30 00:00:00', 4, 123457, 12346),
(12345687, 0, '0000-00-00 00:00:00', 0, 123456, 12345);

-- --------------------------------------------------------

--
-- Структура таблицы `branches`
--

CREATE TABLE `branches` (
  `id` int(11) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Address` varchar(60) NOT NULL,
  `CityCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `branches`
--

INSERT INTO `branches` (`id`, `City`, `Address`, `CityCode`) VALUES
(123, 'Waltham', '3882 Main st.', 2451),
(125, 'Woburn', '422 Maple st.', 1801);

-- --------------------------------------------------------

--
-- Структура таблицы `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `CustomerName` varchar(60) NOT NULL,
  `CustomerAddress` varchar(60) NOT NULL,
  `CustomerType` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `customers`
--

INSERT INTO `customers` (`id`, `CustomerName`, `CustomerAddress`, `CustomerType`) VALUES
(123456, 'James Hadley', '47 Mockingbird Ln, Lynnfield', 'Individual'),
(123457, 'Apple LLC', '372 Clearwater Blvd, Woburn', 'Entity');

-- --------------------------------------------------------

--
-- Структура таблицы `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `EmployeeName` varchar(60) NOT NULL,
  `Position` varchar(20) NOT NULL,
  `Chief` varchar(60) NOT NULL,
  `codeBranch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `employees`
--

INSERT INTO `employees` (`id`, `EmployeeName`, `Position`, `Chief`, `codeBranch`) VALUES
(12345, 'Michael Smith', 'President', 'Michael Smith', 123),
(12346, 'Susan Barker', 'Vice President', 'Michael Smith', 125);

-- --------------------------------------------------------

--
-- Структура таблицы `operations`
--

CREATE TABLE `operations` (
  `codeAccount` int(11) NOT NULL,
  `codeTransaction` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `operations`
--

INSERT INTO `operations` (`codeAccount`, `codeTransaction`) VALUES
(12345678, 123456789),
(12345685, 123456790);

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` int(20) NOT NULL,
  `command` varchar(50) NOT NULL,
  `function` varchar(50) NOT NULL,
  `controller` varchar(50) NOT NULL,
  `access` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `command`, `function`, `controller`, `access`) VALUES
(1, 'showMain', 'indexAction', 'indexController', 2),
(2, 'addAccount', 'add', 'accountController', 3),
(3, 'showAccounts', 'show', 'accountController', 3),
(4, 'deleteAccount', 'delete', 'accountController', 4),
(6, 'addBranch', 'add', 'branchController', 3),
(7, 'showBranches', 'show', 'branchController', 3),
(8, 'deleteBranch', 'delete', 'branchController', 4),
(10, 'addCustomer', 'add', 'customerController', 3),
(11, 'showCustomers', 'show', 'customerController', 3),
(12, 'deleteCustomer', 'delete', 'customerController', 4),
(14, 'addEmployee', 'add', 'employeeController', 3),
(15, 'showEmployees', 'show', 'employeeController', 3),
(16, 'deleteEmployee', 'delete', 'employeeController', 4),
(18, 'addTransaction', 'add', 'transactionController', 3),
(19, 'showTransactions', 'show', 'transactionController', 3),
(20, 'deleteTransaction', 'delete', 'transactionController', 4),
(22, 'showLogin', 'showLogin', 'userController', 1),
(23, 'registration', 'showRegistration', 'userController', 0),
(24, 'regUser', 'registration', 'userController', 0),
(25, 'login', 'sign_in', 'userController', 0),
(26, 'logout', 'logout', 'userController', 0),
(27, 'showUsers', 'showUsers', 'userController', 4),
(28, 'blockUser', 'blockUser', 'userController', 4),
(29, 'error', 'handleError', 'userController', 1),
(30, 'addOperation', 'add', 'operationController', 3),
(31, 'showOperations', 'show', 'operationController', 3),
(32, 'deleteOperation', 'delete', 'operationController', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `tables`
--

CREATE TABLE `tables` (
  `id` int(10) NOT NULL,
  `title` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `tables`
--

INSERT INTO `tables` (`id`, `title`) VALUES
(1, 'accounts'),
(2, 'branches'),
(3, 'customers'),
(4, 'employees'),
(5, 'transactions');

-- --------------------------------------------------------

--
-- Структура таблицы `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `TransactionDate` datetime NOT NULL,
  `TransactionType` varchar(20) NOT NULL,
  `codeCustomer` int(11) NOT NULL,
  `codeBranch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `transactions`
--

INSERT INTO `transactions` (`id`, `Amount`, `TransactionDate`, `TransactionType`, `codeCustomer`, `codeBranch`) VALUES
(123456789, 100, '2000-01-15 00:00:00', 'Credit', 123456, 123),
(123456790, 2000, '2004-06-30 23:00:00', 'Debit', 123457, 125);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Login` varchar(20) NOT NULL,
  `Password` tinytext NOT NULL,
  `Access` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `Login`, `Password`, `Access`) VALUES
(1, 'ppned@host.com', '81dc9bdb52d04dc20036dbd8313ed055', 4),
(3, 'pavel@mail.ru', '81dc9bdb52d04dc20036dbd8313ed055', 3),
(4, 'paul_ned@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codeAccount` (`id`),
  ADD KEY `accounts_ibfk_2` (`codeCustomer`),
  ADD KEY `codeEmployee` (`codeEmployee`);

--
-- Индексы таблицы `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codeBranch` (`id`);

--
-- Индексы таблицы `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codeCustomer` (`id`);

--
-- Индексы таблицы `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codeEmployee` (`id`),
  ADD KEY `codeBranch` (`codeBranch`);

--
-- Индексы таблицы `operations`
--
ALTER TABLE `operations`
  ADD PRIMARY KEY (`codeAccount`,`codeTransaction`),
  ADD KEY `codeTransaction` (`codeTransaction`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codeTransaction` (`id`),
  ADD KEY `transactions_ibfk_1` (`codeBranch`),
  ADD KEY `transactions_ibfk_2` (`codeCustomer`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `access`
--
ALTER TABLE `access`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12345688;

--
-- AUTO_INCREMENT для таблицы `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT для таблицы `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123458;

--
-- AUTO_INCREMENT для таблицы `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12347;

--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123456791;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_2` FOREIGN KEY (`codeCustomer`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `accounts_ibfk_3` FOREIGN KEY (`codeEmployee`) REFERENCES `employees` (`id`);

--
-- Ограничения внешнего ключа таблицы `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`codeBranch`) REFERENCES `branches` (`id`);

--
-- Ограничения внешнего ключа таблицы `operations`
--
ALTER TABLE `operations`
  ADD CONSTRAINT `operations_ibfk_1` FOREIGN KEY (`codeAccount`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `operations_ibfk_2` FOREIGN KEY (`codeTransaction`) REFERENCES `transactions` (`id`);

--
-- Ограничения внешнего ключа таблицы `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`codeBranch`) REFERENCES `branches` (`id`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`codeCustomer`) REFERENCES `customers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
