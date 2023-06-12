-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 12 juin 2023 à 19:50
-- Version du serveur :  5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `category_img` varchar(255) DEFAULT NULL,
  `date_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `category_img`, `date_time`) VALUES
(3, 'Style', 'The style category encompasses content related to fashion, personal style, and trends. It focuses on various aspects of clothing, accessories, grooming, and self-expression.', 'categorystyle.jpg', '2023-06-10 22:00:37'),
(2, 'Nature', 'The nature category encompasses content that explores and celebrates the natural world. It focuses on various aspects of the environment, wildlife, landscapes, conservation, and our connection to the natural world.', 'categorynature.jpeg', '2023-06-10 21:58:22'),
(1, 'Music', 'The music category typically encompasses a wide range of content related to music, including different genres, artists, instruments, music theory, and more.\r\n', 'categorymusic.jpg', '2023-06-10 21:52:27'),
(4, 'Travel', 'The travel category encompasses content related to exploring new destinations, travel experiences, tips, and inspiration. It focuses on various aspects of travel, including destinations, itineraries, accommodations, activities, and cultural experiences. ', 'categorytravel.jpg', '2023-06-10 22:11:31'),
(5, 'Design', 'The design category encompasses content related to various aspects of design, including graphic design, web design, user experience (UX) design, product design, interior design, and more.', 'categorydesign.jpeg', '2023-06-10 22:13:45'),
(6, 'Space', 'The space category encompasses content related to astronomy, cosmology, and the exploration of the universe. It focuses on various aspects of celestial bodies, planetary systems, and the mysteries of outer space.', 'categoryspace.jpg', '2023-06-11 13:27:40'),
(7, 'Science', 'The science category encompasses content related to various scientific disciplines and the pursuit of knowledge. It focuses on the exploration, understanding, and application of natural phenomena and the laws that govern them. From physics and chemistry to biology and psychology, the science category delves into the intricacies of the world around us and the mechanisms that drive its workings.', 'categoryscience.jpg', '2023-06-11 13:39:02'),
(8, 'Robotic', 'The technology category encompasses content related to technological advancements, innovation, and digital trends. It focuses on various aspects of hardware, software, and emerging technologies.', 'categoryrobotic.jpg', '2023-06-11 17:08:17'),
(9, 'Sport', 'The sports category encompasses content related to athletic activities, competitions, and physical prowess. It focuses on various aspects of sports, including individual and team-based disciplines. It delves into the world of athleticism, strategy, and sportsmanship.', 'categorysport.jpg', '2023-06-11 17:16:54'),
(10, 'Gaming', 'The gaming category encompasses content related to various forms of interactive entertainment and gameplay, both virtual and non-virtual. It focuses on a wide range of games, including video games, board games, card games, sports games, and more.', 'categorygaming.jpg', '2023-06-11 17:55:19'),
(11, 'Business', 'The business category encompasses content related to various aspects of commerce, entrepreneurship, and the corporate world. It focuses on different facets of business, including management, marketing, finance, and strategy. ', 'categorybusiness.jpg', '2023-06-11 18:09:52'),
(12, 'Animal', 'The animal category encompasses content related to the animal kingdom, wildlife, and our interactions with animals. It focuses on various aspects of animals, including their behavior, biology, conservation, and the human-animal relationship.', 'categoryanimal.jpg', '2023-06-11 20:08:06');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `author_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `author_id` (`author_id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `thumbnail`, `date_time`, `category_id`, `author_id`) VALUES
(7, 'Serenity by the Sea: The Majestic Harmony of Beach and Sky', 'Lose yourself in the tranquil symphony of the beach and sky as we explore the breathtaking beauty of nature&#039;s coastal wonders. Immerse your senses in the rhythmic crashing of waves, the warm embrace of golden sands, and the ever-changing hues that paint the canvas of the sky. Join us on a journey of serenity and bliss.', '1686517806natureethanpost2.jpg', '2023-06-11 18:30:49', 2, 7),
(1, 'Reimagining Elegance: Embracing Style in Every Detail', 'Dive into the captivating world of style, where elegance meets innovation in every meticulous detail. Explore the latest trends, from refined outfits to exquisite accessories, and discover the art of personal expression through fashion. Join us in this celebration of creativity and boldness, where beauty takes on myriad forms.', '1686517921styleisabellapost3.jpg', '2023-06-11 16:40:42', 3, 8),
(2, 'Rhythm Revelry: Unleashing the Music Party Vibes', 'Get ready to groove and let loose at the ultimate music party experience! Join us as we dive into a world of electrifying beats, infectious melodies, and non-stop dancing. From chart-topping hits to timeless classics, this music extravaganza will ignite your soul and create memories that will last a lifetime.', '1686516987musicmichaelpost4.jpg', '2023-06-11 16:46:21', 1, 3),
(3, 'New York Unveiled: Exploring the City That Never Sleeps', 'Immerse yourself in the hustle and bustle of the city that never sleeps. From the dazzling lights of Times Square to the grandeur of the Statue of Liberty, uncover the iconic treasures of New York. Immerse yourself in the urban energy as you explore Central Park.', '1686516837travelliampost1.jpg', '2023-06-11 17:01:21', 4, 2),
(4, 'Sun, Sand, and Sky: A Journey of Discovery', 'Embark on an extraordinary journey as a young girl explores the captivating beauty of the beach and sky. Feel the warmth of the sun on her skin as she takes her first steps on the sandy shore, and watch as her eyes light up with wonder at the vastness of the sky above. ', '1686518004natureemilypost1.jpg', '2023-06-11 17:31:52', 2, 1),
(5, 'Party in Full Swing: A Musical Extravaganza', 'Get ready to groove and let loose at the most electrifying music party of the year! Join us as we ignite the dance floor with pulsating beats, live performances, and non-stop music that will keep you on your feet. From chart-topping hits to crowd-favorite anthems.', '1686517324musicalexpost5.jpg', '2023-06-11 17:37:12', 1, 4),
(8, 'Exploring the Vast Unknown: A Journey through Space', 'Embark on an awe-inspiring voyage into the depths of the universe with our latest post. Join us as we delve into the mysteries of space, uncovering the enigmatic wonders that lie beyond our blue planet.', '1686518127spacenoahpost1.jpg', '2023-06-11 19:28:12', 6, 9),
(6, 'Unveiling the Hidden Gems: A Journey of Adventure and Discovery', ' Embark on an extraordinary travel experience as we uncover the hidden gems that await intrepid explorers. This post is a gateway to off-the-beaten-path destinations, where breathtaking landscapes, vibrant cultures, and thrilling adventures converge.', '1686516765travelliampost1-2.jpg', '2023-06-11 17:08:51', 4, 2),
(9, 'Unraveling the Secrets of DNA: Decoding the Blueprint of Life', 'This post explores the fascinating world of DNA, the fundamental molecule of life. From its double helix structure to its role in genetic inheritance, we delve into the mechanisms behind DNA replication, transcription, and translation. ', '1686521151scienceethanpost1.jpg', '2023-06-11 22:05:51', 7, 7),
(10, 'Unleashing Cuteness: The World of Adorable Dogs', 'Get ready to be overwhelmed by cuteness as we dive into the heartwarming world of adorable dogs. This post is dedicated to celebrating the lovable and endearing qualities of our canine companions. From playful puppies to loyal seniors, we explore the wide variety of dog breeds and their unique characteristics.', '1686521541animalemilypost1.jpg', '2023-06-11 22:10:53', 12, 1),
(11, 'Design &amp; D&eacute;cor: Inspiring Your Home&#039;s Transformation', 'Explore the world of design and d&eacute;cor as we provide inspiration for transforming your home into a stylish and inviting space. From color selection and furniture arrangement to lighting and accessories, discover tips and ideas to create a harmonious and visually pleasing environment. ', '1686521817designliampost1.jpg', '2023-06-11 22:16:57', 5, 2),
(12, 'Mastering the Art of Business: Key Strategies for Success', 'Gain a competitive edge in the business world with this post, where we share key strategies and insights to help you thrive as an entrepreneur. From establishing a solid foundation to implementing growth strategies, we cover essential topics that will empower you to navigate the complexities of the business landscape.', '1686522351businessliampost1.jpg', '2023-06-11 22:25:51', 11, 2),
(13, 'Unleash Your Inner Gamer: The Excitement of Gaming', 'Immerse yourself in the captivating world of gaming with this post, where we celebrate the excitement, creativity, and endless possibilities that gaming has to offer. From the adrenaline rush of competitive multiplayer games to the immersive storytelling of single-player adventures .', '1686524094gamingalexpost1.jpg', '2023-06-11 22:32:48', 10, 4),
(16, 'Chromosomes: Nature&#039;s Carriers and Genetic Architects', 'In this post, we explore the intricate world of chromosomes, the thread-like structures within the nucleus of every cell that contain our genetic information. We dive into their composition, highlighting the roles of DNA, histones, and specialized proteins. Learn about the different types of chromosomes, their organization, and how they determine an organism&#039;s traits and characteristics.', '1686524262scienceethanpost1-2.jpg', '2023-06-11 22:57:42', 7, 7),
(15, 'Melodies That Move: Exploring the Magic of Music', 'Immerse yourself in the enchanting world of music with this post, where we celebrate the power, beauty, and emotional impact of melodies that touch our souls. From classical compositions to modern hits, we delve into the diverse genres and styles that make up the vibrant tapestry of music.', '1686523976musicpost1.jpg', '2023-06-11 22:52:56', 1, 6),
(19, 'Bowl-O-Mania: The Ultimate Bowling Game for Friends and Fun!', 'Gather your friends and prepare for an unforgettable bowling experience! Our bowling game is the perfect way to enjoy some friendly competition and create lasting memories. With easy-to-learn controls and stunning graphics, this game brings the excitement of bowling right to your fingertips. ', '1686556430gamingemmapost1-1.jpg', '2023-06-12 07:53:09', 10, 10),
(18, 'Mesmerizing Beauty: A Stunning Cat with Blue Eyes', 'Prepare to be enchanted by the captivating beauty of a feline marvel in this post, as we celebrate the allure of a stunning cat with mesmerizing blue eyes. Adorned with a velvety coat and eyes that seem to hold the mysteries of the universe, this feline companion is a true sight to behold.', '1686525060isabellaanimalpost2.jpg', '2023-06-11 23:08:26', 12, 8),
(21, 'Bowling: Experience the Thrills in our Virtual Bowling Game!', 'Step into the world of bowling and let the good times roll! Our bowling game is designed to provide you with hours of enjoyment and excitement. With stunning visuals and realistic physics, you&#039;ll feel like you&#039;re right in the middle of a real bowling alley.', '1686556616gamingemmapost1-2.jpg', '2023-06-12 07:56:56', 10, 10),
(22, 'Unleash Your Fitness Potential at Our Dedicated Men&#039;s Gym', 'Get ready to level up your fitness game at our premier sports gym for men! Our cutting-edge facility is equipped with top-of-the-line equipment and expert trainers to help you achieve your fitness goals. Whether you&#039;re looking to build muscle, increase strength, or improve overall athleticism, our gym has everything you need. ', '1686558189sportjackpost1.jpg', '2023-06-12 08:23:09', 9, 11),
(23, 'Vision to Reality: Elevate Your Living Space with Our Home Design', 'Transform your home into a stunning masterpiece with our exceptional home design services. Our team of skilled designers is dedicated to helping you create a space that is both beautiful and functional, tailored to your unique style and preferences.', '1686558470designisabellapost2.jpg', '2023-06-12 08:27:50', 5, 8),
(24, 'Driving Success: Navigating the Path to Business Excellence', 'Join us on a journey towards business excellence with this post, where we delve into the strategies, insights, and principles that drive success in the dynamic world of entrepreneurship and business. From startups to established enterprises, we explore the key elements that pave the way for growth, profitability, and sustainability.', '1686559435businessjohnpost2-1.jpg', '2023-06-12 08:43:55', 11, 13),
(25, 'Elegance: Infusing Your Space with Chic Style', ' Step into the realm of interior design and unlock the secrets to creating a chic and stylish living space. In this post, we&#039;ll guide you through the world of interior elegance, showcasing the latest design trends, decorating tips, and tricks to transform your home into a sanctuary of style. ', '1686560536stylepost5-1.jpg', '2023-06-12 09:02:16', 3, 6),
(26, 'Finding My Voice: A Singer&#039;s Journey of Passion and Expression', ' Step into my world as I share my personal journey as a singer, where I discovered the power of music to express my emotions, connect with others, and find my true voice. In this post, I invite you to join me on a heartfelt exploration of my experiences, dreams, and the transformative role that music has played in shaping my life.', '1686561201musicpost6.jpg', '2023-06-12 09:13:21', 1, 14),
(27, 'Style: Embracing Individuality and Fashion Freedom', 'In this post, we embark on a journey to redefine masculine style, breaking free from traditional norms and embracing individuality in the world of fashion. Join me as we challenge stereotypes and explore the limitless possibilities of self-expression through style.', '1686561486stylejohnpost9-2.jpg', '2023-06-12 09:16:47', 3, 12),
(28, 'Beyond Earth: Journeying into the Mysteries of Deep Space', 'Embark on an awe-inspiring journey through the cosmos in this post, as we delve into the mysteries and wonders that await us beyond the confines of our planet. Prepare to be captivated by the vastness of space and the breathtaking celestial phenomena that fill the universe.', '1686561987spacenoahpost1-2.jpg', '2023-06-12 09:26:27', 6, 9),
(29, 'Gaming at the Fair: Unleashing Fun in the Virtual World', 'Explore the latest gaming trends and innovations, as developers and studios showcase their newest creations. From virtual reality experiences to groundbreaking gameplay mechanics where players can be among the first to experience the next big thing in gaming.Indulge in the nostalgia of retro gaming, as classic arcade machines and vintage consoles transport you back in time.', '1686562210stylepost5-4.jpg', '2023-06-12 09:30:10', 10, 6),
(30, 'Unleash Your Style: Embracing Bold Fashion Statements ', 'Discover the joy of mixing patterns, colors, and textures as you create outfits that exude confidence and personality. From vibrant prints and unexpected combinations to daring accessories and statement pieces, let your creativity shine and make a fashion statement that is uniquely yours.', '1686562407stypeoliviapost12-1.jpg', '2023-06-12 09:33:27', 3, 5);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `avatar`, `is_admin`) VALUES
(1, 'Emily', 'Johnson', 'Emily', 'emilyjohnson@gmail.com', '$2y$10$uRY0Z7riJEvEczLMxU6ELO2FKWQktRcyeJezOSaq5BFdIHZl6DNGy', 'emilyjohnsonpicture.jpg', 0),
(2, 'Liam', 'Smith', 'Liam', 'liamsmith@gmail.com', '$2y$10$c.EkmwDVpt6WKPCO7ZNtQ.VUG0ZpSFVFQIniV8a1DHbpfKQ8ieC42', 'liamsmithpicture.jpg', 0),
(3, 'Michael', 'Davis', 'Michael', 'michaeldavis@gmail.com', '$2y$10$hgcc40Jayx6I00XJfCNYKuEJnHjev80Ll91ujr7BYkNgp4SslwzIO', 'michealdavispicture.jpg', 0),
(4, 'Alex', 'Turner', 'Alex', 'alexturner12@gmail.com', '$2y$10$FAEHuhnJNn/jH3pnNJJ5O.L47s5mzX8XkIw.Ukz18aUUlW7U0iOiq', 'alexturnerpicture.jpg', 0),
(5, 'Olivia', 'Anderson', 'Olivia', 'oliviaanderson8@gmail.com', '$2y$10$k3HpdvJHhQcakyVfj8oeUuwuf3fbtAvQOh9cw30BTmUChujeVBonq', 'oliviaandersonpicture.jpg', 0),
(6, 'Carolina', 'Carter', 'Carol', 'carolinacarter5@gmail.com', '$2y$10$cRXEKl/SD6iT4i6XMnuFd.UGNRwYzPByC4ten7v9FlKY/BAIZAQYS', 'carolinacarterpicture.jpg', 1),
(7, 'Ethan', 'Cooper', 'Ethan', 'ethancooper@gmail.com', '$2y$10$E0xy7Yn4yAoP07A9rvGiDOJPblfxCccu3fxMsx.VSk.lBkHv/YBSG', 'ethancooperpicture.jpg', 0),
(8, 'Isabella', 'Collins', 'Isabel', 'isabellacollins12@gmail.com', '$2y$10$z1B9K4p/W3z2IrG4QwrxTOo6Ywc/nb4K9Jc5UnLUfoAxU6tPoF4La', 'isabellacollinspicture.jpg', 0),
(9, 'Noah', 'Mitchell', 'Noah', 'noahmitchell@gmail.com', '$2y$10$UX9UufS6HRoLcKwz.li3mOvnZS6BCNz/uAH7kKlVfU4GCr/XeY9XK', 'noahmitchellpicture.jpg', 0),
(10, 'Emma', 'JackSon', 'Emma', 'emma45@gmail.com', '$2y$10$hrAKVqq9Yc4LCkLKDe95fO8DSLp4oUNU7HK/RFMC8f28BF3NfCZTi', '1686579307avataremma.jpg', 0),
(11, 'Jack', 'Wiliam', 'Jack', 'jack452@gmail.com', '$2y$10$1CNumJum2Vkz8/MiPYVtweIp.y8f5k3WljI0PbWyf.5bJK5CRDVL6', '1686558077avatarjack.jpg', 1),
(12, 'John', 'Doe', 'John', 'john@gmail.com', '$2y$10$DPDN/KqJJCM5mXpYXN1GierEimisY/BbzhucmoiUkQvPj9lrgNVx2', 'johnavatar.jpg', 1),
(13, 'Wiliam', 'Son', 'Wiliam', 'wiliamson@gmail.com', '$2y$10$WheBozVUMQEIsJShbKeZHeI0Nevr8Fg3Mky1e9QuIzcLqsUVUtKzK', '1686559325avatarwiliam.jpg', 1),
(14, 'Sarah', 'David', 'Sarah', 'sarah@gmail.com', '$2y$10$RJqPhXGqk0zhctnJKT..hOPaPOUIesLIU2EGkTbeJQerecrB6B412', '1686561043avatarsarah.jpg', 0),
(15, 'Douae', 'EL HILA', 'douaeelhilaa', 'douaeelh2@gmail.com', '$2y$10$mYoOo7ihDrd5z2xvHI0CcO4.YY9NjU5U68IgX7g4SNTgHntEqS6s6', '1686598880avatardouae.jpg', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
