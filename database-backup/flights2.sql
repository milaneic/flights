-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 17. Aug 2020 um 14:08
-- Server-Version: 10.4.10-MariaDB
-- PHP-Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `flights`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `airline_companies`
--

CREATE TABLE `airline_companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `airline_companies`
--

INSERT INTO `airline_companies` (`id`, `country_id`, `name`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(2, 1, 'AirSerbia', 'info@airserbia.com', '011/0110000', '2020-08-16 19:46:48', '2020-08-16 19:46:48');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `airplanes`
--

CREATE TABLE `airplanes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `manufacture_id` bigint(20) UNSIGNED NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seats` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `airplanes`
--

INSERT INTO `airplanes` (`id`, `manufacture_id`, `model`, `seats`, `capacity`, `created_at`, `updated_at`) VALUES
(1, 1, 'A320neo', '1', 180, '2020-08-16 19:57:48', '2020-08-16 19:57:48'),
(2, 1, 'A330', '1', 330, '2020-08-17 09:11:58', '2020-08-17 09:11:58');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `airports`
--

CREATE TABLE `airports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `destination_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `airports`
--

INSERT INTO `airports` (`id`, `destination_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nikola Tesla Airport', '2020-08-16 20:12:19', '2020-08-16 20:12:19'),
(2, 2, 'Stuttgart Airport', '2020-08-16 20:13:10', '2020-08-16 20:13:10');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `flight_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `flight_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 240, '2020-08-16 22:00:00', '2020-08-16 22:00:00');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `countries`
--

INSERT INTO `countries` (`id`, `name`, `country_code`, `created_at`, `updated_at`) VALUES
(1, 'Serbia', 'RS', '2020-08-16 19:46:44', '2020-08-16 19:46:44'),
(2, 'Germany', 'DE', '2020-08-16 19:48:39', '2020-08-16 19:48:39'),
(3, 'Netherlands', 'NL', '2020-08-17 09:01:02', '2020-08-17 09:01:02'),
(4, 'USA', 'USA', '2020-08-17 09:15:03', '2020-08-17 09:15:03');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `destinations`
--

CREATE TABLE `destinations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `destinations`
--

INSERT INTO `destinations` (`id`, `name`, `country_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Belgrad', 1, 'a', '2020-08-16 20:07:11', '2020-08-16 20:07:11'),
(2, 'Stuttgart', 2, 'a', '2020-08-16 20:07:31', '2020-08-16 20:07:31');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `flights`
--

CREATE TABLE `flights` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `departure_time` timestamp NULL DEFAULT NULL,
  `arrival_time` timestamp NULL DEFAULT NULL,
  `departure_airport_id` bigint(20) UNSIGNED NOT NULL,
  `arrival_airport_id` bigint(20) UNSIGNED NOT NULL,
  `gate` int(11) NOT NULL,
  `airplane_id` bigint(20) UNSIGNED NOT NULL,
  `airline_company_id` bigint(20) UNSIGNED NOT NULL,
  `min_price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `flights`
--

INSERT INTO `flights` (`id`, `departure_time`, `arrival_time`, `departure_airport_id`, `arrival_airport_id`, `gate`, `airplane_id`,`airline_company_id`, `min_price`, `created_at`, `updated_at`) VALUES
(1, '2020-08-24 11:00:00', '2020-08-24 12:40:00', 1, 2, 8, 1, 1,120, '2020-08-15 22:00:00', '2020-08-15 22:00:00'),
(2, '2020-08-24 14:00:00', '2020-08-17 16:00:00', 2, 1, 9, 1, 1,110, '2020-07-14 22:00:00', '2020-07-14 22:00:00');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `manufactures`
--

CREATE TABLE `manufactures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `manufactures`
--

INSERT INTO `manufactures` (`id`, `name`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'Airbus', 2, '2020-08-16 19:50:05', '2020-08-16 19:50:05'),
(2, 'Boing', 4, '2020-08-17 09:13:53', '2020-08-17 09:16:56');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(49, '2014_10_12_000000_create_users_table', 1),
(50, '2014_10_12_100000_create_password_resets_table', 1),
(51, '2019_08_19_000000_create_failed_jobs_table', 1),
(52, '2020_08_14_102634_create_countries_table', 1),
(53, '2020_08_14_103216_create_destinations_table', 1),
(54, '2020_08_14_104340_create_airports_table', 1),
(55, '2020_08_14_104718_create_airline_companies_table', 1),
(56, '2020_08_14_105722_create_manufactures_table', 1),
(57, '2020_08_14_110539_create_airplanes_table', 1),
(58, '2020_08_14_111655_create_flights_table', 1),
(59, '2020_08_14_155437_create_bookings_table', 1),
(60, '2020_08_14_160600_create_passengers_table', 1),
(61, '2020_08_14_161644_create_tickets_table', 1),
(62, '2020_08_14_162837_create_roles_table', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `passengers`
--

CREATE TABLE `passengers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_type` enum('card','passport') COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `passengers`
--

INSERT INTO `passengers` (`id`, `first_name`, `last_name`, `gender`, `document_type`, `document_number`, `created_at`, `updated_at`) VALUES
(1, 'Milan', 'Eic', 'male', 'passport', '1231231415', '2020-07-14 22:00:00', '2020-07-14 22:00:00'),
(2, 'Sara', 'Petrovic', 'female', 'passport', '13146544436', '2020-08-16 22:00:00', '2020-08-16 22:00:00');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `passenger_id` bigint(20) UNSIGNED NOT NULL,
  `seat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `tickets`
--

INSERT INTO `tickets` (`id`, `booking_id`, `passenger_id`, `seat`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 14, NULL, NULL),
(2, 1, 2, 15, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Milan Eic', 'milaaneic@gmail.com', NULL, '$2y$10$IBX5rTv.nqHTUDNsVEOE5ehzzM8ByJxJv9yov8ua7FmPQ6/H8zFCG', NULL, '2020-08-16 20:53:35', '2020-08-16 20:53:35');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `airline_companies`
--
ALTER TABLE `airline_companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `airline_companies_country_id_foreign` (`country_id`);

--
-- Indizes für die Tabelle `airplanes`
--
ALTER TABLE `airplanes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `airplanes_manufacture_id_foreign` (`manufacture_id`);

--
-- Indizes für die Tabelle `airports`
--
ALTER TABLE `airports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `airports_destination_id_foreign` (`destination_id`);

--
-- Indizes für die Tabelle `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_flight_id_foreign` (`flight_id`);

--
-- Indizes für die Tabelle `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `countries_name_unique` (`name`),
  ADD UNIQUE KEY `countries_country_code_unique` (`country_code`);

--
-- Indizes für die Tabelle `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destinations_country_id_foreign` (`country_id`);

--
-- Indizes für die Tabelle `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flights_departure_airport_id_foreign` (`departure_airport_id`),
  ADD KEY `flights_arrival_airport_id_foreign` (`arrival_airport_id`),
  ADD KEY `flights_airplane_id_foreign` (`airplane_id`),
    ADD KEY `flights_airline_company_id_foreign` (`airline_company_id`);

--
-- Indizes für die Tabelle `manufactures`
--
ALTER TABLE `manufactures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manufactures_country_id_foreign` (`country_id`);

--
-- Indizes für die Tabelle `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `passengers`
--
ALTER TABLE `passengers`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indizes für die Tabelle `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indizes für die Tabelle `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_booking_id_foreign` (`booking_id`),
  ADD KEY `tickets_passenger_id_foreign` (`passenger_id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `airline_companies`
--
ALTER TABLE `airline_companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `airplanes`
--
ALTER TABLE `airplanes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `airports`
--
ALTER TABLE `airports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `flights`
--
ALTER TABLE `flights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `manufactures`
--
ALTER TABLE `manufactures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT für Tabelle `passengers`
--
ALTER TABLE `passengers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `airline_companies`
--
ALTER TABLE `airline_companies`
  ADD CONSTRAINT `airline_companies_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `airplanes`
--
ALTER TABLE `airplanes`
  ADD CONSTRAINT `airplanes_manufacture_id_foreign` FOREIGN KEY (`manufacture_id`) REFERENCES `manufactures` (`id`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `airports`
--
ALTER TABLE `airports`
  ADD CONSTRAINT `airports_destination_id_foreign` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_flight_id_foreign` FOREIGN KEY (`flight_id`) REFERENCES `flights` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `destinations`
--
ALTER TABLE `destinations`
  ADD CONSTRAINT `destinations_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `flights`
--
ALTER TABLE `flights`
  ADD CONSTRAINT `flights_airplane_id_foreign` FOREIGN KEY (`airplane_id`) REFERENCES `airplanes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `flights_arrival_airport_id_foreign` FOREIGN KEY (`arrival_airport_id`) REFERENCES `airports` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `flights_departure_airport_id_foreign` FOREIGN KEY (`departure_airport_id`) REFERENCES `airports` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `flights_airline_company_id_foreign` FOREIGN KEY (`airline_company_id`) REFERENCES `airline_companies` (`id`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `manufactures`
--
ALTER TABLE `manufactures`
  ADD CONSTRAINT `manufactures_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_passenger_id_foreign` FOREIGN KEY (`passenger_id`) REFERENCES `passengers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
