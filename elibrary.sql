-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2024 at 11:50 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `action`
--

CREATE TABLE `action` (
  `id` int(55) NOT NULL,
  `b_img` varchar(255) NOT NULL,
  `book` varchar(255) NOT NULL,
  `b_name` varchar(255) NOT NULL,
  `b_author` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `sortdes` text NOT NULL,
  `lang` varchar(255) NOT NULL,
  `Catagory` varchar(255) NOT NULL,
  `cment` int(50) NOT NULL,
  `view` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `action`
--

INSERT INTO `action` (`id`, `b_img`, `book`, `b_name`, `b_author`, `publisher`, `year`, `description`, `sortdes`, `lang`, `Catagory`, `cment`, `view`) VALUES
(6, '583The Adventures of Sherlock Holmes.jpg', '498The Adventures of Sherlock Holmes.pdf', 'The Adventures of Sherlock Holmes', 'Arthur Conan Doyle', '', '1892', 'The Adventures of Sherlock Holmes is a collection of twelve short stories by British writer Arthur Conan Doyle, first published on 14 October 1892. It contains the earliest short stories featuring the consulting detective Sherlock Holmes, which had been published in twelve monthly issues of The Strand Magazine.', 'The Adventures of Sherlock Holmes is a collection of twelve short stories by British writer Arthur Conan Doyle', 'English', 'Action', 3, 17),
(7, '171516The Bourne Identity.jpg', '660145The Catcher in the Rye.pdf', 'The Bourne Identity', 'Robert Ludlum', '', '1980', 'In the Mediterranean Sea, Italian fishermen rescue an American man adrift with two gunshot wounds in his back. They tend to his wounds and find he has no memory of his identity, but demonstrates advanced combat skills and fluency in several languages', 'In the Mediterranean Sea, Italian fishermen rescue an American man adrift with two gunshot wounds in his back', 'English', 'Action', 0, 3),
(8, '365757Jurassic Park.jpg', '427224Nineteen Eighty-Four.pdf', 'Jurassic Park', 'Michael Crichton', 'Alfred A. Knopf', '1990', 'In 1989, a series of strange animal attacks occur throughout Costa Rica and on the nearby island of Isla Nublar. One of the species behind the attacks is believed to be Procompsognathus, an extinct species of dinosaur. Paleontologist Alan Grant and his paleobotanist graduate student Ellie Sattler are contacted to confirm the animal\'s identity, but are abruptly whisked away by billionaire John Hammond - founder of bioengineering firm InGen - for a weekend visit to a \"biological preserve\" he has established on Isla Nublar.', 'In 1989, a series of strange animal attacks occur throughout Costa Rica and on the nearby island of Isla Nublar. ', 'English', 'Action', 0, 1),
(9, '121188The Count of Monte Cristo.jpg', '553498The Adventures of Sherlock Holmes.pdf', 'The Count of Monte-Cristo', 'Alexandre Dumas, Auguste Maquet, Pier Angelo Florentino', 'Thomas Y. Crowell', '2009', 'The Count of Monte Cristo is an adventure novel written by French author Alexandre Dumas completed in 1844. It is one of the author\'s most popular works, along with The Three Musketeers. Like many of his novels, it was expanded from plot outlines suggested by his collaborating ghostwriter Auguste Maquet.', 'The Count of Monte Cristo is an adventure novel written by French author Alexandre Dumas completed in 1844', 'English', 'Action', 0, 5),
(10, '752The Da Vinci Code.jpg', '610The Adventures of Sherlock Holmes.pdf', 'The Da Vinci Code', 'Dan Brown', 'Dan Brown', '2003', 'The Da Vinci Code is a 2003 mystery thriller novel by Dan Brown. It is Brown\'s second novel to include the character Robert Langdon: the first was his 2000 novel Angels & Demons', 'The Da Vinci Code is a 2003 mystery thriller novel by Dan Brown.', 'English', 'Action', 0, 0),
(11, '709685The Day of the Jackal.jpg', '503145The Catcher in the Rye.pdf', 'The Day of the Jackal', 'Frederick Forsyth', 'Frederick Forsyth', '1971', 'The Day of the Jackal is a political thriller novel by English author Frederick Forsyth about a professional assassin who is contracted by the OAS, a French dissident paramilitary organisation, to kill Charles de Gaulle, the President of France.', 'The Day of the Jackal is a political thriller novel by English author Frederick Forsyth about a professional assassin who is', 'English', 'Action', 2, 0),
(12, '689Treasure Island.jpg', '725The Adventures of Sherlock Holmes.pdf', 'Treasure Island', 'Robert Louis Stevenson', 'Robert Louis Stevenson', '1883', 'Treasure Island is an adventure novel by Scottish author Robert Louis Stevenson, telling a story of \"buccaneers and buried gold\". It is considered a coming-of-age story and is noted for its atmosphere, characters, and action.', 'Treasure Island is an adventure novel by Scottish author Robert Louis Stevenson, telling a story of \"buccaneers and buried gold\". ', 'English', 'Action', 0, 0),
(13, '468324harry porter.jpg', '259145The Catcher in the Rye.pdf', 'Harry Potter and the Chamber of Secrets', 'J. K. Rowling', 'J. K. Rowling', '1998', 'Harry Potter and the Chamber of Secrets is a fantasy novel written by British author J. K. Rowling and the second novel in the Harry Potter series. Spending the summer with the Dursleys, Harry Potter meets Dobby, a house-elf who warns him that it is dangerous to return to Hogwarts. Dobby sabotages an important dinner for the Dursleys, who lock up Harry to prevent his return to Hogwarts.', 'Harry Potter and the Chamber of Secrets is a fantasy novel written by British author J. K. Rowling and the second novel in the Harry Potter series.', 'English', 'Action', 1, 12),
(14, '145Maze runner.jpg', '832The Adventures of Sherlock Holmes.pdf', 'The Maze Runner', 'James Dashner', 'James Dashner', '2009', 'The Maze Runner is a 2009 young adult dystopian science fiction novel written by American author James Dashner and the first book released in The Maze Runner series.', 'The Maze Runner is a 2009 young adult dystopian science fiction novel written by American author James Dashner and the first book released in The Maze Runner series', 'English', 'Action', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `addtofvt`
--

CREATE TABLE `addtofvt` (
  `id` int(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `book_id` varchar(255) NOT NULL,
  `exist` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addtofvt`
--

INSERT INTO `addtofvt` (`id`, `email`, `book_id`, `exist`) VALUES
(20, 'farhan@gmail.com', '29', 1),
(23, 'arfan@gmail.com', '32', 1),
(24, 'arfan@gmail.com', '37', 1),
(25, 'Abin@gmail.com', '32', 1),
(27, 'farhan@gmail.com', '37', 1),
(28, 'farhan@gmail.com', '32', 1),
(29, 'farhan@gmail.com', '28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(50) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `commentaction`
--

CREATE TABLE `commentaction` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `userimg` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commentaction`
--

INSERT INTO `commentaction` (`id`, `book_id`, `name`, `email`, `userimg`, `comment`, `created_at`) VALUES
(14, 11, 'Abin', 'Abin@gmail.com', '281ProfilePictureMaker (3).png', 'hey', '2023-05-21 23:37:34'),
(15, 11, 'Abin', 'Abin@gmail.com', '281ProfilePictureMaker (3).png', 'hiii\\r\\n', '2023-05-21 23:37:42'),
(18, 13, 'Arfan', 'arfan@gmail.com', '386ProfilePictureMaker (2).png', 'Harry Potter and the Chamber of Secrets continues the enchanting journey into the wizarding world, captivating readers with its blend of mystery, adventure, and magic. J.K. Rowling vivid storytelling transports readers back to Hogwarts School of Witchcraft and Wizardry, where Harry faces new challenges and unravels the secrets hidden within the ancient Chamber.', '2023-05-22 01:27:55'),
(19, 6, 'Arfan', 'arfan@gmail.com', '386ProfilePictureMaker (2).png', 'The Adventures of Sherlock Holmes is a captivating collection of detective stories that showcases Arthur Conan Doyle\\\'s brilliant creation, Sherlock Holmes. With his sharp intellect, keen powers of observation, and deductive reasoning, Holmes effortlessly solves seemingly unsolvable mysteries, leaving readers in awe of his genius.', '2023-05-22 01:39:50'),
(20, 6, 'Abin', 'Abin@gmail.com', '281ProfilePictureMaker (3).png', 'Doyles mastery of storytelling is evident in The Adventures of Sherlock Holmes. Each story is ingeniously crafted, filled with intricate puzzles, clever twists, and a suspenseful atmosphere that keeps readers on the edge of their seats. Holmes and his loyal companion, Dr. Watson, make a dynamic duo, and their dynamic and complementary personalities add depth to the narratives', '2023-05-22 01:40:35'),
(21, 6, 'Farhan Tanvir', 'farhan@gmail.com', '429ProfilePictureMaker (1).png', 'The Adventures of Sherlock Holmes not only entertains with its gripping mysteries but also provides a fascinating glimpse into Victorian London and the social issues of the time. Doyle skillfully incorporates elements of class, justice, and morality, painting a vivid picture of the era. Holmes unmatched detective skills combined with Doyles elegant prose make this collection a timeless classic that continues to captivate readers today', '2023-05-22 01:45:29');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `userimg` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `book_id`, `name`, `email`, `userimg`, `comment`, `created_at`) VALUES
(25, 32, 'Farhan Tanvir', 'farhan@gmail.com', '429ProfilePictureMaker (1).png', 'The Catcher in the Rye is a timeless coming-of-age novel that resonates with readers of all generations. Holden Caulfields raw and authentic narrative voice captures the confusion and alienation of adolescence, making it a relatable and thought-provoking read.', '2023-05-22 01:12:52'),
(26, 32, 'Abin', 'Abin@gmail.com', '281ProfilePictureMaker (3).png', 'J.D. Salingers portrayal of Holden Caulfield as a disillusioned and rebellious teenager provides a poignant critique of societal expectations and the loss of innocence. The books exploration of themes such as identity, loneliness, and the search for authenticity makes it a compelling and introspective journey.', '2023-05-22 01:18:35'),
(27, 32, 'Arfan', 'arfan@gmail.com', '386ProfilePictureMaker (2).png', 'The Catcher in the Rye delves into the complexities of human emotions and the universal desire for connection. Through Holden\\\'s encounters with various characters, Salinger masterfully exposes the masks we wear and the underlying vulnerability we all share. It\\\'s a deeply introspective novel that leaves a lasting impact on readers, prompting reflection on our own experiences and relationships.', '2023-05-22 01:22:25');

-- --------------------------------------------------------

--
-- Table structure for table `fiction`
--

CREATE TABLE `fiction` (
  `id` int(50) NOT NULL,
  `b_img` varchar(255) NOT NULL,
  `book` varchar(255) NOT NULL,
  `b_name` varchar(255) NOT NULL,
  `b_author` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `year` int(50) NOT NULL,
  `description` text NOT NULL,
  `sortdes` text NOT NULL,
  `lang` varchar(255) NOT NULL,
  `Catagory` varchar(255) NOT NULL,
  `cment` int(55) NOT NULL,
  `view` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fiction`
--

INSERT INTO `fiction` (`id`, `b_img`, `book`, `b_name`, `b_author`, `publisher`, `year`, `description`, `sortdes`, `lang`, `Catagory`, `cment`, `view`) VALUES
(27, '245Nineteen Eighty-Four.jpg', '224Nineteen Eighty-Four.pdf', 'Nineteen Eighty-Four', 'George Orwell', 'Secker & Warburg ', 1984, 'Nineteen Eighty-Four (also published as 1984) is a dystopian social science fiction novel and cautionary tale by English writer George Orwell. It was published on 8 June 1949 by Secker & Warburg as Orwell\'s ninth and final book completed in his lifetime. ', 'Nineteen Eighty-Four is a dystopian social science fiction novel and cautionary tale by English writer George Orwell.', 'English', 'Fiction', 0, 4),
(28, '932One Hundred Years of Solitude.jpg', '897One Hundred Years of Solitude.pdf', 'One Hundred Years of Solitude', 'Gabriel García Márquez', 'Gabriel García Márquez', 1967, 'One Hundred Years of Solitude (Spanish: Cien años de soledad, American Spanish: [sjen ˈaɲos ðe soleˈðað]) is a 1967 novel by Colombian author Gabriel García Márquez that tells the multi-generational story of the Buendía family, whose patriarch, José Arcadio Buendía, founded the fictitious town of Macondo.', 'One Hundred Years of Solitude is a 1967 novel by Colombian author Gabriel García Márquez.', 'English', 'Fiction', 0, 4),
(32, '163The Catcher in the Rye.jpg', '434The Catcher in the Rye.pdf', 'The Catcher in the Rye', 'J. D. Salinger', 'J. D. Salinger', 1951, 'The Catcher in the Rye is a novel by J. D. Salinger that was partially published in 1945–46 before being novelized in 1951. The novel details two days in the life of 16-year-old Holden Caulfield after he has been expelled from prep school. Confused and disillusioned, Holden searches for truth and rails against the “phoniness” of the adult world. ', 'The Catcher in the Rye is a novel by J. D. Salinger that was partially published in 1945–46 before being novelized in 1951.', 'English', 'Fiction', 3, 13),
(33, '570Don Quixote.jpg', '614Nineteen Eighty-Four.pdf', 'Don Quixote', 'Miguel de Cervantes', 'Miguel de Cervantes', 1605, 'Don Quixote is a Spanish epic novel by Miguel de Cervantes. Originally published in two parts, in 1605 and 1615, its full title is The Ingenious Gentleman Don Quixote of La Mancha or, in Spanish, El ingenioso hidalgo don Quixote de la Mancha.', 'Don Quixote is a Spanish epic novel by Miguel de Cervantes. Originally published in two parts, in 1605 and 1615, its full title is The Ingenious Gentleman Don Quixote of La Mancha', 'English', 'Fiction', 0, 10),
(34, '251925pandp.PNG', '456145The Catcher in the Rye.pdf', 'Pride and Prejudice', 'Jane Austen', 'Jane Austen', 1813, 'Pride and Prejudice is an 1813 novel of manners by Jane Austen. The novel follows the character development of Elizabeth Bennet, the protagonist of the book, who learns about the repercussions of hasty judgments and comes to appreciate the difference between superficial goodness and actual goodness', 'Pride and Prejudice is an 1813 novel of manners by Jane Austen. The novel follows the character development of Elizabeth Bennet,', 'English', 'Fiction', 0, 13),
(35, '474The Great Gatsby.jpg', '320The Catcher in the Rye.pdf', 'The Great Gatsby', 'F. Scott Fitzgerald', 'F. Scott Fitzgerald', 1925, 'The Great Gatsby is a 1925 novel by American writer F. Scott Fitzgerald. Set in the Jazz Age on Long Island, near New York City, the novel depicts first-person narrator Nick Carraway\'s interactions with mysterious millionaire Jay Gatsby and Gatsby\'s obsession to reunite with his former lover, Daisy Buchanan.', 'The Great Gatsby is a 1925 novel by American writer F. Scott Fitzgerald. Set in the Jazz Age on Long Island, near New York City,', 'English', 'Fiction', 0, 0),
(36, '830The Lord of the Rings.jpg', '900Nineteen Eighty-Four.pdf', 'The Lord of the Rings', 'J. R. R. Tolkien', 'J. R. R. Tolkien', 1954, 'The Lord of the Rings is an epic high-fantasy novel by English author and scholar J. R. R. Tolkien. Set in Middle-earth, the story began as a sequel to Tolkien\'s 1937 children\'s book The Hobbit, but eventually developed into a much larger work', 'The Lord of the Rings is an epic high-fantasy novel by English author and scholar J. R. R. Tolkien. Set in Middle-earth, the story began as a sequel to Tolkien\'s 1937 ', 'English', 'Fiction', 0, 0),
(37, '373War and Peace.jpg', '245One Hundred Years of Solitude.pdf', 'War and Peace', 'Leo Tolstoy', 'Leo Tolstoy', 1867, 'War and Peace is a literary work by Russian author Leo Tolstoy. Set during the Napoleonic Wars, the work mixes fictional narrative with chapters on history and philosophy. First published serially beginning in 1865, the work was rewritten and published in its entirety in 1869.', 'War and Peace is a literary work by Russian author Leo Tolstoy. Set during the Napoleonic Wars, the work mixes fictional narrative with chapters on history and philosophy. ', 'English', 'Fiction', 0, 14),
(38, '949Trust.jpg', '570The Catcher in the Rye.pdf', 'Trust', 'Hernan Diaz', 'Hernan Diaz', 2022, 'Trust is a 2022 novel written by Hernan Diaz. The novel was published by Riverhead Books.', 'Trust is a 2022 novel written by Hernan Diaz. The novel was published by Riverhead Books.', 'English', 'Fiction', 0, 17);

-- --------------------------------------------------------

--
-- Table structure for table `fvtaction`
--

CREATE TABLE `fvtaction` (
  `id` int(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `book_id` int(50) NOT NULL,
  `exist` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fvtaction`
--

INSERT INTO `fvtaction` (`id`, `email`, `book_id`, `exist`) VALUES
(5, 'Abin@gmail.com', 11, 1),
(6, 'arfan@gmail.com', 13, 1),
(7, 'arfan@gmail.com', 6, 1),
(8, 'Abin@gmail.com', 6, 1),
(9, 'Abin@gmail.com', 7, 1),
(10, 'Abin@gmail.com', 9, 1),
(11, 'farhan@gmail.com', 6, 1),
(13, 'farhan@gmail.com', 9, 1),
(14, 'farhan@gmail.com', 13, 1),
(15, 'farhan@gmail.com', 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(50) NOT NULL,
  `user` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `expiration_date` timestamp NULL DEFAULT NULL,
  `user_picture` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `clicks` int(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `registration_date`, `expiration_date`, `user_picture`, `status`, `clicks`, `type`) VALUES
(36, 'Farhan Tanvir', 'farhan@gmail.com', '$2y$10$PEHXVRulwKPyxpwHMnkOD.r7N7BVG0WjbsJ5NsOHN8LnGf/2dn3te', '2023-05-12 10:06:43', '2023-08-28 18:00:00', '429ProfilePictureMaker (1).png', 1, 155, 'Basic'),
(37, 'Arfan', 'arfan@gmail.com', '$2y$10$1US6wuZzYsZ83h5t1S4Exu34eIvi94cKAQ9dncSLyKm6OiSYcorDG', '2023-05-15 18:51:40', '2023-06-19 18:00:00', '386ProfilePictureMaker (2).png', 0, 56, 'Subscription Expired'),
(38, 'Abin', 'Abin@gmail.com', '$2y$10$.sO9Ve9FsT8czmCdMGGYC.lURV2EN8GELWGIv/vg53fuXaeFYY8h6', '2023-05-15 18:52:24', '2023-07-22 18:00:00', '281ProfilePictureMaker (3).png', 1, 97, 'Basic'),
(39, 'Jack', 'jack@gmail.com', '$2y$10$PXHOyt6uDloPPypqaJbkyOWop3CEVlcGvssI/GZyUo3Xptew9w8vK', '2023-05-21 19:20:55', '2023-06-19 18:00:00', '', 0, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addtofvt`
--
ALTER TABLE `addtofvt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commentaction`
--
ALTER TABLE `commentaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fiction`
--
ALTER TABLE `fiction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fvtaction`
--
ALTER TABLE `fvtaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `action`
--
ALTER TABLE `action`
  MODIFY `id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `addtofvt`
--
ALTER TABLE `addtofvt`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `commentaction`
--
ALTER TABLE `commentaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `fiction`
--
ALTER TABLE `fiction`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `fvtaction`
--
ALTER TABLE `fvtaction`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
