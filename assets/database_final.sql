-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2015 at 09:55 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cookbook`
--
CREATE DATABASE IF NOT EXISTS `cookbook` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cookbook`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--
-- Creation: Apr 17, 2015 at 04:59 PM
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `thumbnail`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Entrees', 'images/categories/entree.jpg', 'Main dishes that comprise a meal. These can be for breakfast, lunch, or dinner.', '2015-04-17 21:28:40', '2015-04-17 21:28:40'),
(2, 'Soups', 'images/categories/soup.jpg', 'Hot or cold liquid meals or side dishes, soups are usually savory.', '2015-04-17 21:30:15', '2015-04-17 21:30:15'),
(3, 'Breads', 'images/categories/bread.jpg', 'Breads can include yeasted, "quick" breads leavened with baking soda, and can be savory or sweet, such as muffins.', '2015-04-17 21:31:40', '2015-04-17 21:31:40'),
(4, 'Snacks & Crackers', 'images/categories/snacks.jpg', 'Mostly savory "quick bites" that can be eaten room temperature, such as chips, crackers, etc. and go well in picnics.', '2015-04-17 21:33:45', '2015-04-17 21:33:45'),
(5, 'Beverages', 'images/categories/beverage.jpg', 'Things to drink, hot or cold, sweet or savory, and this can also include fermented beverages, even though there is a fermented category.', '2015-04-17 21:37:55', '2015-04-17 21:37:55'),
(6, 'Sauces', 'images/categories/sauce.jpg', 'Sauces can be chutneys & pestos, which are more solid, or runny, which compliment something else. Dressings for salad included also.', '2015-04-17 21:40:01', '2015-04-26 06:16:57'),
(7, 'Cakes', 'images/categories/desserts.jpg', 'Cakes can be flourless or have flour. A lot of the cakes I make are mousse cakes. Include tortes in this category, also.', '2015-04-17 21:41:33', '2015-04-17 21:41:33'),
(8, 'Cookies & Brownies', 'images/categories/brownies.jpg', 'Usually sweet and can be crunchy or chewy, I would also include things like meringues in this category.', '2015-04-17 21:43:52', '2015-04-17 21:48:28'),
(9, 'Ice-cream', 'images/categories/icecream.jpg', 'Ice creams may be dairy-based or vegan, and this category may also include sorbets. Basically it is for frozen desserts.', '2015-04-17 22:32:04', '2015-04-17 22:32:04'),
(10, 'Custards & Pies', 'images/categories/icecream_pie.jpg', 'Custards, mousses and egg foams (uncooked) as well as pies. Pies can be savory too, however those might go better under "entrees."', '2015-04-17 22:35:05', '2015-04-17 22:35:05'),
(11, 'Candies', 'images/categories/truffles.jpg', 'Since truffles are my signature claim to fame, no cookbook would be complete without candies! ', '2015-04-17 22:36:47', '2015-04-17 22:36:47'),
(12, 'Ferments', 'images/categories/ferment.jpg', 'Ferments apply to mostly solid ferments (as there is a beverage category) and can apply to yogurts, cheese, sauerkraut, kimchee, lacto-ferment pickles, etc.', '2015-04-17 22:38:40', '2015-04-17 22:38:40'),
(13, 'Vegetables', 'images/categories/vegetables.jpg', 'This is more for vegetable side dishes, for which I often don''t write recipes, but just throw something together! But contributors might have side vegetable dishes they''d like to add.', '2015-04-17 22:41:38', '2015-04-17 22:41:38'),
(14, 'Herbal Remedies', 'images/categories/herbal.jpg', 'Herbal remedies that we can make at home are becoming more and more popular, and I''ve certainly dabbled with a few, having a long connection to herbs and supplements as well as natural living.', '2015-04-17 22:43:13', '2015-04-17 22:43:13'),
(16, 'Test Category', 'images/no_img.jpg', 'Here is some description here. This is testing the validation--it seems to work, woo hoo! This is a category that can easily be deleted during testing.', '2015-04-21 21:35:50', '2015-04-26 02:41:44'),
(17, 'Salads', 'images/categories/chicken-salad.jpg', 'Some people call this "rabbit food" but salads can also make a meal in themselves and can contain meats as well as veggies. Be sure to check out the Sauces category for some dressings.', '2015-04-26 03:21:23', '2015-04-26 03:21:23');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--
-- Creation: Apr 17, 2015 at 04:59 PM
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_03_10_193636_create_categories_table', 1),
('2015_03_10_193636_create_recipes_table', 1),
('2015_03_10_193636_create_users_table', 1),
('2015_03_10_193639_add_foreign_keys_to_recipes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--
-- Creation: Apr 26, 2015 at 12:43 AM
--

CREATE TABLE IF NOT EXISTS `recipes` (
`id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `user_id` int(10) unsigned NOT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `yields` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ingredients` text COLLATE utf8_unicode_ci NOT NULL,
  `directions` text COLLATE utf8_unicode_ci NOT NULL,
  `prep_time` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONS FOR TABLE `recipes`:
--   `category_id`
--       `categories` -> `id`
--   `user_id`
--       `users` -> `id`
--

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `category_id`, `title`, `description`, `user_id`, `keywords`, `yields`, `photo`, `thumbnail`, `ingredients`, `directions`, `prep_time`, `created_at`, `updated_at`) VALUES
(6, 8, 'Easy Chewy Nut Butter Brownies', 'The peanut butter in these makes them incredibly chewy--if you can''t have peanut butter, try substituting all almond butter instead, and they will be more cake, or also try subbing tahini or coconut butter.', 1, 'grain-free, gluten-free, dairy-free, paleo, dessert', '16 brownies', 'images/recipes/photos/1430010879-nutbutter_brownie.jpg', 'images/recipes/thumbs/1430010879-tn-nutbutter_brownie.jpg', '.5 cups almond butter<br>\r\n.5 cups peanut butter (this makes them super gluey!)<br>\r\n1 egg<br>\r\n.25 cups cocoa powder<br>\r\n1 tsp vanilla<br>\r\n.5 tsp sea salt<br>\r\n.5 tsp baking soda<br>\r\n.5 cups chocolate chips<br>', 'Preheat oven to 350F and prepare a 8" square glass baking pan with a good release (I spray on coconut oil). If you use some other pan than glass, you might also want to line it with parchment paper.<br><br> \r\n\r\nMix together the nut butters, honey, vanilla, and egg first, then add in the cocoa powder, salt and soda until mixed well (the dough will be very gluey and difficult to work--you can use a mixer or a good sturdy spoon). Finally, fold in the chocolate chips.<br><br>\r\n\r\nTransfer dough into greased pan and spread out. Bake at 350F for 20 - 25 minutes (best to check it after 20, though--I''ve had this get pretty dark by then!). ', '30 minutes to prepare, 20-25 to bake', '2015-04-26 05:14:39', '2015-04-26 05:39:39'),
(8, 9, 'Chocolate Bourbon Ice Cream', 'The bourbon keeps it from freezing as hard, but even with this much bourbon, it is pretty hard by the second day in the freezer! This could also make interesting fudgesicles...', 1, 'chocolate, dessert', 'nearly 3 quarts', 'images/recipes/photos/1430443228-choc-bourbon.jpg', 'images/recipes/thumbs/1430443228-tn-choc-bourbon.jpg', '1 qt cream <br>\r\n1 qt milk <br>\r\n6 Tbl cocoa powder <br>\r\n4 oz baking chocolate <br>\r\n1 Tbl green stevia powder <br>\r\n3 Tbl coconut sugar <br>\r\n1/2 - 1 cup toasted pecan pieces <br>\r\n1.5 cups bourbon (I prefer Maker''s Mark)', 'In a double-boiler, mix baking chocolate, cocoa, coconut sugar, and a cup of the cream. Heat water on medium heat, stirring the mixture to melt the baking chocolate. Once the baking chocolate is melted, mix until consistency is smooth, glossy, and thick, almost like pudding. Set aside, remove from water and let cool. <br> <br>\r\n\r\nIn a large bowl, put the remaining cream and milk and mix together with a whisk. Add in the chocolate mixture, the green stevia powder, and bourbon, whisking until uniform. OR you can just put those all into a blender and blend until smooth, depending on what equipment you have! Be sure to have the resultant mixture cool before trying to churn, since it contains alcohol. (That''s where the blender is nice--it''s easy to sit in the fridge to pre-chill a bit if you need it to). <br> <br>\r\n\r\nPour into churn and freeze, remembering to add the pecan pieces when it starts to firm up (unless you have an ice cream churn which you cannot open during the process, in which case add the nuts when you plan to churn).', '', '2015-05-01 05:20:29', '2015-05-01 05:34:37'),
(9, 9, 'Mint Chocolate Chip Ice Cream', 'This is an easy recipe--the hardest thing about it is probably making the chocolate "chip" beforehand. You can use any alcohol or none at all--I just prefer using peppermint Schnapps.', 1, 'dessert, low-glycemic', 'nearly 3 quarts (11.4 cups)', 'images/recipes/photos/1430444762-mint-choc-chip.jpg', 'images/recipes/thumbs/1430444762-tn-mint-choc-chip.jpg', 'For the chocolate "chip":<br>\r\n6 oz of baking chocolate (plus a little cocoa butter if you have it) <br>\r\n1 tablespoon of green stevia leaf powder <br>\r\n1 tablespoon of barley malt powder (or agave or brown rice syrup, etc)<br>\r\n\r\nFor the ice cream base: <br>\r\n1 quart heavy cream <br>\r\n1 quart whole milk <br>\r\n1 tablespoon of green stevia leaf powder <br>\r\n1 tablespoon of brown rice syrup <br>\r\n1 tablespoon of honey or other sweetener of your choice <br>\r\n1 tablespoon of liquid chlorophyll <br>\r\n1 cup Rumplemintz Schnapps <br>\r\na few drops of mint oil (to taste--if it''s extract, you will need a bit more) <br>', 'First, make the chocolate "chip":<br>\r\n\r\nMelt together in a double-boiler over low heat, stirring occasionally, until smooth and melted, breaking up any powdery lumps of stevia, and line a medium sized baking sheet with wax paper. Pour the chocolate (adding cocoa butter will help it pour--otherwise you may end up scraping it out with a spatula) onto the wax paper, spread out evenly by lifting the pan at various angles to let the chocolate glide and coat all the wax paper. Then put the tray into the freezer (if there''s not a level spot in the freezer, put in the fridge first, and then freeze later). When nice and chilled, take a butcher knife and break up the chocolate into chips. I usually make parallel cuts one way, then parallel cuts perpendicular to the first cuts, then pull up the wax paper at the corners to pile up the chocolate chips into the middle and cut every which way until I get them smaller than large chunks. Put these in a container and stick back in the freezer until you''re ready to mix them in.<br><br>\r\n\r\nIce Cream base:<br>\r\nMix all ice cream base ingredients together in a big bowl with a mixer, then mix in the chips you made earlier. Pour into an ice cream churn and freeze. ', '', '2015-05-01 05:46:03', '2015-05-01 05:48:25'),
(10, 11, 'Vegan Rhum Coconut truffles', 'I actually usually make these without rum or extract--they taste more like the maple extract than anything--almost a butterscotch taste.', 1, 'vegan, dessert', 'around 60 truffles', 'images/recipes/photos/1430447676-coconut-rhum.jpg', 'images/recipes/thumbs/1430447676-tn-coconut-rhum.jpg', '1 (14oz) can coconut cream <br>\r\n10 oz bittersweet chocolate <br>\r\n3 oz coconut oil <br>\r\n1/4 cup rum* OR 2 tsp pure rum extract or flavoring to taste <br>\r\n-------- <br>\r\n*If you cannot find rum extract, and do not wish to use imitation extract, substitute: <br>\r\n4 tsp blackstrap molasses <br>\r\n6 tablespoons (3oz) pineapple juice <br>\r\n1 tsp maple extract  <br> <br>\r\n\r\nYou will need more bittersweet chocolate to enrobe--I usually chop up at least a pound at a time and melt slowly over a double boiler', 'Melt chocolate and coconut oil together in double-boiler. Stir in coconut cream till creamy. Mix in rum or extract/flavoring or substitution*. Put in fridge for overnight to harden up. Scoop and freeze. Enrobe the next day (or later) in bittersweet chocolate, and top each with toasted coconut shavings.', 'up to 3 days', '2015-05-01 06:34:36', '2015-05-01 06:36:27'),
(11, 4, 'Grain-Free Saltines', 'Unlike regular saltines, which are light and flakey, these are hard and crunchy, and would cause problems for people with TMJ, but I like them because they are salty...', 1, 'grain-free, gluten-free', 'two baking sheets full', 'images/recipes/photos/1430448180-gluten-free-saltines.jpg', 'images/recipes/thumbs/1430448180-tn-gluten-free-saltines.jpg', '1 cup tapioca or cassava flour <br>\r\n1 cup potato flour (not starch) <br>\r\n1 tsp baking soda <br>\r\n.5 cups yogurt <br>\r\n1 cup water <br>\r\n3 oz coconut oil <br>\r\n1 tsp sea salt <br>', 'Preheat oven to 375F. Mix together into a dough--coconut oil may be melted if necessary. Roll dough out to .25" thick (I like to use a tortilla press for this, squeezing scoops of dough between two pieces of parchment paper and cutting them into crackers).  <br> <br>\r\n\r\nCut into crackers and place in ungreased baking sheet. Sprinkle with salt or other toppings, such as sesame seeds, poppy seeds, garlic granules or a mixture. With a fork, poke the crackers along the tops. Bake by 10 minute intervals, flipping once to bake additional 10 minutes on their backs. Flip them so they are "face up", bake a final 10 minutes and turn off the oven, letting them stay in the oven until completely cool, so they crisp up well.', '', '2015-05-01 06:43:01', '2015-05-01 06:43:01'),
(12, 1, 'Simple Shrimp & Grits', 'If you are avoiding corn, I also have a recipe for a "polenta" of amaranth and millet that you can put under this shrimp sauce, instead. This recipe has the corn version, however.', 1, 'quick, gluten-free', 'Serves 2 people', 'images/recipes/photos/1430448656-shrimp-grits.jpg', 'images/recipes/thumbs/1430448656-tn-shrimp-grits.jpg', '.5 cups yellow grits <br>\r\n.75 cups milk <br>\r\n.75 cups water <br>\r\n2 Tbl butter <br>\r\n----- <br>\r\n.5 lbs shrimp <br>\r\n1 14.5 oz can fire-roasted tomatoes, diced <br>\r\n3 pieces bacon <br>\r\n.25 onion <br>\r\n1 clove garlic <br>\r\nsea salt & pepper to taste\r\n', 'In a frying pan, fry the bacon until it is crisp. Remove and let drain on a paper towel on a plate. In the grease in the pan, caramelize the onions and garlic. Add in the shrimp until pink (or warmed up, if you used already cooked shrimp). <br> <br>\r\n\r\nMeanwhile, combine milk and water in a small saucepan with some salt and pepper and stirring, bring just to a boil. Stir in grits and immediately cut power to low, cover, and let cook, lifting the lid to stir occasionally, until grits thicken up. Once grits thicken to quite stiff, stir in butter. Cut the heat and set aside to keep warm while continuing to make the topping. <br> <br>\r\n\r\nDrain the tomatoes and add tomatoes to the frying pan. Break up the cooled bacon into pieces and add to the pan with the tomatoes. Continue heating until topping is ready to go on grits, season to taste.  <br> <br>\r\n\r\nSpread grits out on each plate, and the spoon topping on each. Garnish with parley or cilantro if desired.', '1 hour', '2015-05-01 06:50:56', '2015-05-01 06:50:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Apr 26, 2015 at 12:49 AM
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `fullname`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'cwallin', 'charleskwallin@abtech.edu', '$2y$10$2Wvz3AfTXnJAplio2xVGN.oWMMffxhXYgBVJTzTP/hUv7BAzJLXya', 'Administrator', 'Charlie Wallin', NULL, '2015-04-17 21:23:32', '2015-04-17 21:23:32'),
(2, 'peabody', 'peabody@example.com', '$2y$10$m4Q3e5tcQC8xU9.m6GqxROvuWSshF0H0jbHphO9xCri807dPsbo.W', 'Subscriber', 'Mr. Peabody', 'agN2S99mFNRxnJoVk8Du6ArHKugnfhsuCaVOctofC4bId9KanGSX0FNkLy8c', '2015-04-22 05:30:57', '2015-05-01 05:12:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
 ADD PRIMARY KEY (`id`), ADD KEY `prep_time` (`prep_time`), ADD KEY `categoryID_fk` (`category_id`), ADD KEY `userID_fk` (`user_id`), ADD KEY `keywords` (`keywords`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
ADD CONSTRAINT `categoryID_fk` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
ADD CONSTRAINT `userID_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- ** Dummy accounts for testing purposes ** --
-- **Admin account:**
-- username: cwallin
-- password: Asdfghjk 
-- **Subscriber account:**
-- username: peabody
-- password: BoySherman
