-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Nov 2023 pada 03.06
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizzer`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `quiz_and_ques`
--

CREATE TABLE `quiz_and_ques` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question` varchar(300) NOT NULL,
  `option1` varchar(50) NOT NULL,
  `option2` varchar(50) NOT NULL,
  `option3` varchar(50) NOT NULL,
  `option4` varchar(50) NOT NULL,
  `option5` varchar(50) NOT NULL,
  `corr_ans` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `quiz_and_ques`
--

INSERT INTO `quiz_and_ques` (`id`, `quiz_id`, `question`, `option1`, `option2`, `option3`, `option4`, `option5`, `corr_ans`) VALUES
(1, 4, '2+2=??', '1', '2', '3', '4', '', 'Option4'),
(4, 6, ' Saya bisa menjadi juara kelas karena pelajaran ini', 'Sangat Setuju', 'Sangat Setuju', 'Sangat Setuju', 'Sangat Setuju', 'Sangat Setuju', 'Option2'),
(5, 8, 'sun rises in?', 'east', 'west', 'north', 'south', '', 'Option1'),
(6, 8, 'capital of india', 'prayag', 'lucknow', 'beneras', 'delhi', '', 'Option4'),
(7, 8, 'cap of up', 'pr', 'lucknow', 'raipur', 'aligarh', '', 'Option1'),
(8, 9, 'hai', '212', '21', '21', '21', '', 'Option3'),
(11, 11, 'dob', 'deteksi objek', 'deteksi', 'ojek', 'objek', '', 'Option1'),
(33, 28, 'Aku suka pelajaran Fisika', 'Sangat Setuju', 'Setuju', 'Netral Sekali', 'Tidak Setuju', 'Sangat Tidak Setuju', ''),
(34, 28, ' Saya bisa menjadi juara kelas karena pelajaran ini', 'Sangat Setuju', 'Setuju', 'Netral Sekali', 'Tidak Setuju', 'Sangat Tidak Setuju', ''),
(36, 30, ' Saya suka pelajaran ini', 'iya aku suka', 'suka', 'biasa ajah', 'nggak suka ', 'tidak suka!!', ''),
(38, 30, ' Saya bisa menjadi juara kelas karena pelajaran ini', 'iya aku suka', 'suka', 'biasa ajah', 'tidak suka', 'yaelah', ''),
(39, 30, ' Saya senang dengan guru yang mengajar', 'iya betul sekali', 'iya', 'hmmm', 'tidak', 'no', ''),
(40, 31, 'Apa masih ada mahasiswa yang teladan', 'Banyak', 'iya', 'ada', 'jarang', 'tidak ada', ''),
(41, 31, ' Apa ada teman anda yang sangat teladan', 'sedikit', 'tidak', 'jarang', 'tidak ada', 'adakah seratus', ''),
(42, 31, ' Apakah kau termasuk mahasiswa yang teladan', 'sangat benar', 'benar', 'iya', 'betul', 'tidak ada alasan untuk mengatakan iya', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `quiz_and_ques`
--
ALTER TABLE `quiz_and_ques`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `quiz_and_ques`
--
ALTER TABLE `quiz_and_ques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `quiz_and_ques`
--
ALTER TABLE `quiz_and_ques`
  ADD CONSTRAINT `id_kuis` FOREIGN KEY (`quiz_id`) REFERENCES `person_and_quiz` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
