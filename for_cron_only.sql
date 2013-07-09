--
-- Структура таблицы `endless_online`
--

CREATE TABLE IF NOT EXISTS `endless_online` (
  `server` varchar(20) DEFAULT NULL,
  `online` int(3) NOT NULL DEFAULT '-1',
  `max_online` int(3) NOT NULL DEFAULT '0'
);

--
-- Тестовые данные таблицы `endless_online`
--

INSERT INTO `endless_online` (`server`, `online`, `max_online`) VALUES
('server1', -1, 100);
