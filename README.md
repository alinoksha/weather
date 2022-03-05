ПОЛУЧЕНИЕ ПОГОДЫ ПО НАСЕЛЕННОМУ ПУНКТУ.

Метод
GET /api/weather/location

Описание
Метод позволяет получить погоду конкретного населенного пункта по его названию.

GET параметры
name - string - обязательный - Название населенного пункта.
units - string - необязательный, по умолчанию 'metric' - Единица измерения температуры. Доступные варианты: 'metric' (градус Цельсия), 'imperial' (градус Фаренгейта).
lang - string - необязательный, по умолчанию 'ru' - Язык.

Пример запроса
/api/weather/location?lang=ru&name=kanash

Параметры ответа
weather - array - Массив с данными о погоде.
    temp - Температура.
    pressure - Давление.
    wind_deg - Направление ветра (в градусах).
    humidity - Влажность.
    precipication - Вероятность осадков.
    descr - Описание погоды.
    icon - Иконка погоды.
location - array - Массив с данными о местоположении.
    name - Название населенного пункта.
    lat - Широта.
    lon - Долгота.

Пример ответа
{
	"weather": {
		"temp": -4.17,
		"pressure": 1006,
		"wind_speed": 4.05,
		"wind_deg": 39,
		"humidity": 97,
		"precipication": 0.92,
		"descr": "небольшой снег",
		"icon": "13n"
	},
	"location": {
		"name": "Канаш",
		"lat": 55.5113818,
		"lon": 47.5067782
	}
}


ПОЛУЧЕНИЕ ПОГОДЫ ПО КООРДИНАТАМ.

Метод
GET /api/weather/coords

Описание
Метод позволяет получить погоду по географическим координатам.

GET параметры
lat - string - обязательный - Широта.
lon - string - обязательный - Долгота.
units - string - необязательный, по умолчанию 'metric' - Единица измерения температуры. Доступные варианты: 'metric' (градус Цельсия), 'imperial' (градус Фаренгейта).
lang - string - необязательный, по умолчанию 'ru' - Язык.

Пример запроса
/api/weather/coords?lat=55.5113818&lon=47.5067782&lang=ru

Параметры ответа
weather - array - Массив с данными о погоде.
    temp - Температура.
    pressure - Давление.
    wind_deg - Направление ветра (в градусах).
    humidity - Влажность.
    precipication - Вероятность осадков.
    descr - Описание погоды.
    icon - Иконка погоды.
location - array - Массив с данными о местоположении.
    name - Название населенного пункта.
    lat - Широта.
    lon - Долгота.

Пример ответа
{
	"weather": {
		"temp": -4.17,
		"pressure": 1006,
		"wind_speed": 4.05,
		"wind_deg": 39,
		"humidity": 97,
		"precipication": 0.92,
		"descr": "небольшой снег",
		"icon": "13n"
	},
	"location": {
		"name": "Канаш",
		"lat": 55.5113818,
		"lon": 47.5067782
	}
}

Для работы требуется ключ api openweathermap.org
Скопировать файл .env.example в .env
Открыть .env и положить ключ openweather api в OPENWEATHER_APPID

Инструкция по запуску с laradock:
Поставить laradock по инструкции с laradock.io
Запустить докер следующей комнадой:
docker compose up -d php-fpm nginx redis