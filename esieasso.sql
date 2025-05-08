DROP DATABASE IF EXISTS esieasso;
CREATE DATABASE esieasso;
USE esieasso;

CREATE TABLE `association` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `img` varchar(255) NOT NULL,
  `campus` varchar(255) NOT NULL,
  `link` varchar(20) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `site` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `discord` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL
);
CREATE TABLE `annonces` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `texte` varchar(255) NOT NULL,
  `asso_id` int(11) NOT NULL,
  FOREIGN KEY (asso_id) REFERENCES association(id)
);
CREATE TABLE `evenements` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `date_debut` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_fin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `asso_id` int(11) NOT NULL,
  FOREIGN KEY (asso_id) REFERENCES association(id)
);
CREATE TABLE `roles_asso` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `asso_id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `lvl` int(11) NOT NULL,
  FOREIGN KEY (asso_id) REFERENCES association(id)
);
CREATE TABLE `users` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `active` tinyint(1) DEFAULT 0,
  `activation_code` varchar(255) NOT NULL,
  `activation_expire` timestamp NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `last_connexion` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);
CREATE TABLE `interested_event` (
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  FOREIGN KEY (event_id) REFERENCES evenements(id),
  FOREIGN KEY (user_id) REFERENCES users(id)
);
CREATE TABLE `user_role_asso` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (role_id) REFERENCES roles_asso(id)
);
CREATE TABLE `join_asso` (
  `asso_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  FOREIGN KEY (asso_id) REFERENCES association(id),
  FOREIGN KEY (user_id) REFERENCES users(id)
);
INSERT INTO `association` (`id`, `nom`, `description`, `campus`, `link`, `mail`, `site`, `facebook`, `twitter`, `instagram`, `youtube`, `discord`, `linkedin`) VALUES
(1, "Little Heart", "Little Heart est l\'association humanitaire du groupe ESIEA sur le campus de Paris !\r\nLe but de l\'association est d\'aider et apporter notre soutien aux étudiants en luttant \r\ncontre la précarité et le harcèlement.\r\nDe plus, nous aidons des personnes dans le besoins, notamment des enfants \r\nhospitalisés mais aussi les familles les plus démunies. \r\nEnsemble, rendons notre monde meilleur !", "Ivry-sur-Seine", "littleheart", "littleheart@et.esiea.fr", "", "", "", "https://www.instagram.com/littleheart_esiea/", "", "https://discord.gg/7PcddwcUaY", "https://www.linkedin.com/company/little-heart-groupe-esiea"),
(2, "DTRE", "La DTRE (Département Technique et Robotique de l\'ESIEA) est l\'association de Robotique et d\'Électronique du campus de Paris-Ivry.\n\nElle y regroupe des passionnés de toutes les promotions, qui ensemble, travaillent sur des systèmes embarqués tel que des robots autonomes, des drones, de l\'IA et d\'autres projets liés à la domotique, aux objets connectés et à la modélisation 3D.\n\n\nLieu convivial de recherche et de développement, la DTRE encourage et accompagne ses membres pour réaliser leurs propres projets en leur mettant à disposition une diversité d\'outils de bricolage et de mesure (Imprimantes 3D, CNC, et divers composants électroniques).\n\nNous avons plusieurs projets intéressants et formateurs en cours comme :\n\nLa conception d\'un robot humanoïde POPPY,\nTank\'Epler, un tank doté d\'IA capable d\'assister des équipes de secours dans des endroits inaccessibles en établissant une connexion entre elles et les victimes,\nEt pleins d\'autres encore …\nN\'hésitez pas à passer à notre local si vous êtes au campus d\'Ivry !", "Ivry-sur-Seine", "dtre", "dtre@et.esiea.fr", "", "https://www.facebook.com/AssoDTRE", "https://twitter.com/assodtre", "https://www.instagram.com/developpement_robotique_esiea/", "", "https://discord.gg/whsVy4K", "https://fr.linkedin.com/company/association-dtre"),
(3, "BDJ Pendragon", "En tant que Bureau des Jeux, on vous présente le jeu sous toute ses formes : jeu vidéo, jeu de plateau, jeu de carte ou jeu de rôles.\n\nNous organisons aussi 3 projets : la Nuit Du Jeu, la Game Jam et l\'Escape Game. Nous faisons aussi quelques lives sur Twitch, dans lesquels nous jouons à plein de types de jeux différents, en rediffusion sur YouTube.\n\nNous sommes principalement actifs sur notre serveur Discord, mais n\'hésite pas à nous suivre sur les autres réseaux sociaux et à visiter notre site sur lequel nous affichons nous services proposés.", "Ivry-sur-Seine", "bdj", "bdj@et.esiea.fr", "http://bdjserveur.ddns.net/", "http://facebook.com/bdj.esiea", "https://twitter.com/bdj_esiea", "https://www.instagram.com/bdj.esiea/", "https://www.youtube.com/@bdjesiea4458", "https://discord.gg/UPjH7B2egR", "https://www.linkedin.com/company/bureaudesjeuxesiea/"),
(4, "Kernel Panic Systems", "Kernel Panic Systems est l\'association informatique du groupe ESIEA sur le campus de Paris.\n\nLe but de l\'association de faire découvrir et développer les compétences des étudiants de l\'ESIEA en programmation et en cybersécurité.\n\nKPS propose des ateliers tout au long de l\'année nous participons également à la conception des esieabots ces petits robots de développement offerts aux étudiants de première année à leur arrivée au sein de l\'ESIEA.\n\nNotre rôle est aussi d\'aider les élèves rencontrant des difficultés en informatique, de les conseiller sur leurs achats d\'ordinateur et enfin de les accompagner pour l\'installation de Linux sur leurs machines.", "Ivry-sur-Seine", "kps", "kps@et.esiea.fr", "https://kps.esiea.fr/", "https://www.facebook.com/AssociationKPS", "https://twitter.com/Association_KPS ", "https://www.instagram.com/kps.esiea/", "", "https://discord.gg/sQ3Kt7FNDe", "https://www.linkedin.com/company/kps-esiea/"),
(5, "RC Lab", "Root Computer Lab (RCLAB) a pour but de promouvoir les jeux vidéo et permet aux étudiants d'échanger autour du monde du jeux vidéo. L'association prépare et anime différents évènements au sein de l'Ecole ou en partenariat avec les commerces locaux. ", "Laval", "rclab", "rclab@et.esiea.fr", "https://rootcomputerlab.com/", "https://www.facebook.com/rootcomputerlab", "", "", "", "https://discord.gg/RDEpDhV", ""),
(6, "Fusion", "L\'association FUSION organise principalement la soirée colors (la soirée de clôture du WEI), nous tenons aussi une radio hebodmadaire diffusée sur Twitch et vendons aux étudiants des sweats et yearbooks chaque années.", "Laval", "fusion", "fusion@et.esiea.fr", "", "", "", "https://www.instagram.com/asso_fusion", "", "https://discord.gg/FYZSJbukwK", ""),
(7, "BDA Raven", "Le Bureau des Arts est l\'association culturelle et artistique de L\'ESIEA Laval. ", "Laval", "bda-raven", "bdalaval@et.esiea.fr", "", "https://www.facebook.com/BDALaval/", "", "https://www.instagram.com/bda_esiea_laval/", "", "https://discord.gg/7gRnH4n7CN", ""),
(8, "BDE Arkania", "Le BDE Arkania est le Bureau Des Etudiants du campus de Laval. \r\n\r\nAu même titre que le BDE Parisien, Arkania rythme la vie étudiante à travers des activités quotidiennes, tel que des petits-déjeuners et des barbecues et apporte son soutien aux projets dont les étudiants sont bénéficiaires. \r\n\r\nLe BDE est responsable de l\'intégration des nouveaux étudiants et des événements majeurs de la vie étudiante (soirée de parrainage et soirée halloween, WEI, Gala).", "Laval", "bde-arkania", "bdelaval@et.esiea.fr", "", "https://www.facebook.com/BDE.ESIEA.LAVAL/", "", "https://www.instagram.com/bde_esiea_laval/", "", "https://discord.gg/SAzUFPBapR", ""),
(9, "TEDxESIEA", "TEDxESIEAParis est une association organisant des conférences sur des idées valant la peine d'être diffusées, à destination de toute la communauté du groupe ESIEA, sous licence TEDx.", "Ivry-sur-Seine", "tedxesiea", "tedx@et.esiea.fr", "", "https://www.facebook.com/tedxesieaparis", "", "https://www.instagram.com/tedxesiea/", "", "", "https://www.linkedin.com/company/tedxesieaparis/"),
(10, "Focus", "Focus est l'association dédiée à la photographie. Notre but est d'initier et partager notre passion pour la photographie!", "Ivry-sur-Seine", "focus", "focus@et.esiea.fr", "", "", "", "https://www.instagram.com/focus_esiea", "https://www.youtube.com/@focus_esiea", "https://discord.gg/MwcrzHmY", "https://www.linkedin.com/company/focus-esiea/"),
(11, "Red Wine District", "Red Wine District est une association mettant en avant le savoir faire français, principalement par la découverte et l'analyse de vins, de bières et de spiritueux.", "Ivry-sur-Seine", "redwinedistrict", "redwinedistrict@et.esiea.fr", "", "", "", "https://www.instagram.com/red_wine_district/", "", "https://discord.gg/NHNX2GWX7K", "https://www.linkedin.com/company/red-wine-district"),
(12, "Horizon Japon", "Association qui a pour but de promouvoir la culture japonaise au sein de l'école, que ce soit avec des activités ou des repas concoctés par les étudiants.", "Laval", "horizon-japon", "horizonjapon@et.esiea.fr", "", "", "", "", "", "https://discord.gg/Ecvuhdq", ""),
(13, "BDS Alpha", "La volonté du BDS est de dynamiser la vie étudiante. S\'ajoute à celle-ci la volonté de fédérer et d\'encourager l\'ensemble des initiatives des étudiants de l\'école ainsi que de promouvoir son image par l\'organisation de divers événements de nature sportive.\r\nNous proposons des entraînements de sports hebdomadaires de football, basketball, rugby, d\'escalade, de cheerleading et bien plus encore…", "Ivry-sur-Seine", "bds-alpha", "bdsparis@et.esiea.fr", "", "https://www.facebook.com/BdsEsiea/", "https://twitter.com/BDSESIEAParis", "https://www.instagram.com/bds_esiea/", "", "https://discord.gg/6RD3J69vGB", ""),
(14, "BDS Gorilla", "Le BDS a pour but de donner l'envie aux étudiants de bouger et de se dépenser dans un cadre sportif et ludique. Que ce soit  grâce à des entrainements réguliers de différents sports proposés par ce dernier ou bien par des évènements plus occasionnels mais toujours autant de plaisir et de sport.", "Laval", "bds-gorilla", "bdslaval@et.esiea.fr", "", "https://www.facebook.com/BDSXTREM/", "", "https://www.instagram.com/bds_esiea_laval/", "https://www.youtube.com/@lavalcampussport7235", "https://discord.gg/AqCcUqsEhh", ""),
(15, "RED", "Research & Experimentation Department (RED) est l\'association technique lavalloise. Notre objectif est d'offrir le cadre idéal aux étudiants voulant se former à tous les domaines du monde technologique (informatique, électronique, robotique, cybersécurité, ...).​ Pour les aider, nous proposons diverses activités comme des ateliers d'initiation, des projets ou la participation à des compétitions. Nous les accompagnons également en leur faisant acquérir les compétences dont ils ont besoin dans leurs propres projets et dans les cours leur posant problème.​ RED est un lieu ouvert, convivial, animé par l'échange et l'entraide entre les promotions. C'est pourquoi nous mettons notre matériel à disposition de l'ensemble des étudiants (imprimante 3D, casque VR, poste de soudure, outils, ...).", "Laval", "red", "robotiquelaval@et.esiea.fr", "", "https://www.facebook.com/RedAssoLaval", "https://twitter.com/REDesiea", "https://www.instagram.com/RED_ESIEA/", "", "https://discord.gg/HuXbMgY3tT", "https://www.linkedin.com/company/research-experimentation-department"),
(16, "BDE Sud", "Le BDE du Sud a pour vocation de dynamiser la vie étudiante sur les campus de Dax et d'Agen.", "Agen & Dax", "bde-sud", "bde.intech.dax@gmail.com", "", "", "", "", "", "", ""),
(17, "BDA Anubis", "Association qui promeut  l'art et la culture au sein de l\'école ", "Ivry-sur-Seine", "bda-anubis", "bdaparis@et.esiea.fr", "", "https://www.facebook.com/BDA-ESIEA-468333523248569/", "https://twitter.com/BDA_ESIEA_PARIS ", "https://www.instagram.com/bda_esiea/", "", "https://discord.gg/w5CP3DFPuT", ""),
(18, "BDE Schtroumpfs", "Association majeure, le BDE rythme la vie étudiante à travers des activités au quotidien et apporte son soutien aux projets dont les étudiants sont bénéficiaires. Responsable de la semaine d'intégration, de la soirée de parrainage, du WEI et du Gala, il est le principal vecteur d'intégration des étudiants.", "Ivry-sur-Seine", "bde-schtroumpfs", "bdeparis@et.esiea.fr", "https://bdeparis.esiea.fr/", "https://www.facebook.com/BDE.ESIEA.Paris/", "", "https://www.instagram.com/bde_esiea_paris/", "", "", "https://www.linkedin.com/company/bde-groupe-esiea-paris/"),
(19, "Internationale", "Association dont le but est, d'une part, d'accueillir les étudiant(e)s étranger(e)s qui arrivent à l'école (soit pour un semestre soit pour un cursus complet), et d'autre part, de promouvoir l'international à l'école pour donner envie aux étudiant(e)s de partir.", "Ivry-sur-Seine", "internationale", "internationale@et.esiea.fr", "", "https://www.facebook.com/AssociationInternationaleESIEA/", "", "https://www.instagram.com/assointer.esiea", "", "https://discord.gg/NbtqWkMJ2J", "https://www.linkedin.com/company/association-internationale-esiea/"),
(20, "Air ESIEA", "Nos activités variées se caractérisent principalement par nos nombreux projets dans tous les domaines liés à l\' aérospatial, à la technique et aux sciences.\r\nCette année, nous avons mené des projets de  mini fusées un projet de fusée sonde qui nous amènera en octobre à participer à l\' European Rocketry Challenge (EuRoC), au Portugal, aux côtés d\'équipes venant des quatre coins de l\'Europe.\r\nContributeurs aux ESIEAbots, fondateurs et architectes de l\'OpenLab il nous tient aussi à cœur de stimuler la créativité des étudiants sur le campus, et de mettre à leur disposition les moyens et l\'expertise pour évoluer et travailler dans les meilleurs conditions. Passez nous voir à la Cave !\r\n", "Ivry-sur-Seine", "airesiea", "air-esiea@et.esiea.fr", "https://airesiea.org", "https://www.facebook.com/airesiea/", "", "https://www.instagram.com/air.esiea.fr/", "https://www.youtube.com/@airesiea2107", "https://discord.gg/6sBCMNXP5", ""),
(21, "Radio ESIEA Club", "Association de communication qui relaye les informations concernant la vie étudiante de l'école et les actualités grâce à ses émissions hebdomadaires", "Ivry-sur-Seine", "rec", "radio@et.esiea.fr", "radioesieaclub.com", "https://www.facebook.com/RadioEsieaClub/", "", "https://www.instagram.com/radioesieaclub/", "https://www.youtube.com/@RadioEsieaClub", "https://discord.gg/PXB4tmCxxA", "https://www.linkedin.com/company/radio-groupe-esiea/");

INSERT INTO `roles_asso` (`asso_id`, `nom`, `lvl`) VALUES 
('1', 'Bureau général', '2'),
('2', 'Bureau général', '2'),
('3', 'Bureau général', '2'),
('4', 'Bureau général', '2'),
('5', 'Bureau général', '2'),
('6', 'Bureau général', '2'),
('7', 'Bureau général', '2'),
('8', 'Bureau général', '2'),
('9', 'Bureau général', '2'),
('10', 'Bureau général', '2'),
('11', 'Bureau général', '2'),
('12', 'Bureau général', '2'),
('13', 'Bureau général', '2'),
('14', 'Bureau général', '2'),
('15', 'Bureau général', '2'),
('16', 'Bureau général', '2'),
('17', 'Bureau général', '2'),
('18', 'Bureau général', '2'),
('19', 'Bureau général', '2'),
('20', 'Bureau général', '2'),
('21', 'Bureau général', '2');

-- Create views
CREATE VIEW v_user_asso AS
SELECT users.id AS user_id, users.prenom, users.nom, users.email, association.id AS asso_id, association.nom AS asso, roles_asso.nom as role, roles_asso.id AS role_id
FROM users
JOIN user_role_asso ON users.id = user_role_asso.user_id
JOIN roles_asso ON user_role_asso.role_id = roles_asso.id
JOIN association ON roles_asso.asso_id = association.id;

-- Create procedures

DELIMITER $$
CREATE PROCEDURE `activateAccount`(IN `INemail` VARCHAR(255), IN `INactivationCode` VARCHAR(255), OUT `error` VARCHAR(255))
IF NOT EXISTS (SELECT id FROM users WHERE email = INemail) THEN
  SET error = "not_found";
ELSEIF (SELECT active FROM users WHERE email = INemail) = 1 THEN
  SET error = "already_active";
ELSEIF (SELECT activation_expire FROM users WHERE email = INemail) < CURRENT_TIMESTAMP THEN
  SET error = "code_expired";
ELSEIF (SELECT activation_code FROM users WHERE email = INemail) = INactivationCode THEN
  UPDATE users SET active = 1 WHERE email = INemail;
  UPDATE users SET users.updated_at = CURRENT_TIMESTAMP WHERE email = INemail;
  SET error = "no_error";
ELSE
  SET error = "wrong_code";
END IF$$

CREATE PROCEDURE `createUser`(IN `INprenom` VARCHAR(255), IN `INnom` VARCHAR(255), IN `INemail` VARCHAR(255), IN `INpassword` VARCHAR(255), IN `INactivation_code` VARCHAR(255), OUT `error` VARCHAR(255))
IF EXISTS (SELECT * FROM users WHERE users.email = INemail) AND (SELECT users.active FROM users WHERE users.email = INemail) = 1 THEN
	SET error = "already_exists";
ELSE 
	SET error = "no_error";
    IF EXISTS (SELECT * FROM users WHERE users.email = INemail) THEN
    	DELETE FROM users WHERE users.email = INemail;
    END IF;
    INSERT INTO users (prenom, nom, email, password, activation_code, activation_expire) VALUES (INprenom, INnom, INemail, INpassword, INactivation_code, DATE_ADD(now(), interval 1 day));
END IF$$

CREATE PROCEDURE `deleteAccount`(IN `userID` INT(11), IN `userPassword` VARCHAR(255))
IF (SELECT users.password FROM users WHERE users.id = userID) = userPassword THEN
  DELETE FROM users WHERE users.id = userID;
END IF$$

CREATE PROCEDURE `getAllAssos`(IN `INname` VARCHAR(255), IN `INcampus` VARCHAR(255), IN `currentPage` INT)
IF (INcampus != 'Tous') AND (INname != '') THEN
	SELECT id FROM association WHERE campus = INcampus AND association.nom LIKE CONCAT('%', INname, '%') ORDER BY nom LIMIT currentPage,10;
ELSEIF (INcampus != 'Tous') THEN
    SELECT id FROM association WHERE campus = INcampus ORDER BY nom LIMIT currentPage,10;
ELSEIF (INname != '') THEN
    SELECT id FROM association WHERE association.nom LIKE CONCAT('%', INname, '%') ORDER BY nom LIMIT currentPage,10;
ELSE
    SELECT id FROM association ORDER BY nom LIMIT currentPage,10;
END IF$$

CREATE PROCEDURE `getUsersByAsso`(IN `assoID` INT(11), OUT `error` VARCHAR(255))
IF EXISTS (SELECT * FROM v_user_asso WHERE v_user_asso.asso_id = assoID) THEN
	SELECT prenom, nom, email, role FROM v_user_asso WHERE v_user_asso.asso_id = assoID;
  SET error = "no_error";
ELSE
	SET error = "not_found";
END IF$$

CREATE PROCEDURE `accountExists`(IN `INemail` VARCHAR(255), OUT `error` VARCHAR(255))
IF EXISTS (SELECT * FROM users WHERE users.email = INemail) THEN
	SELECT * FROM users WHERE users.email = INemail;
	SET error = "already_exists";
ELSE
	SET error = "not_exists";
END IF$$

CREATE PROCEDURE `countPages`(IN `INcampus` VARCHAR(255), IN `INname` VARCHAR(255))
IF (INcampus != 'Tous') AND (INname != '') THEN
	SELECT COUNT(*) FROM association WHERE campus = INcampus AND association.nom LIKE CONCAT('%', INname, '%');
ELSEIF (INcampus != 'Tous') THEN
    SELECT COUNT(*) FROM association WHERE campus = INcampus;
ELSEIF (INname != '') THEN
    SELECT COUNT(*) FROM association WHERE association.nom LIKE CONCAT('%', INname, '%');
ELSE
    SELECT COUNT(*) FROM association;
END IF$$

CREATE PROCEDURE `joinAsso`(IN `userID` INT, IN `assoID` INT, OUT `error` VARCHAR(255))
IF EXISTS (SELECT * FROM user_role_asso JOIN roles_asso ON roles_asso.id=user_role_asso.role_id WHERE user_role_asso.user_id = userID AND roles_asso.asso_id = assoID) THEN
	SET error = "already_joined";
ELSEIF NOT EXISTS (SELECT * FROM join_asso WHERE join_asso.user_id=userID AND join_asso.asso_id = assoID) THEN
	SET error = "no_error";
    INSERT INTO join_asso(join_asso.user_id, join_asso.asso_id) VALUES (userID, assoID);
ELSE
	SET error = "no_error";
END IF$$

CREATE PROCEDURE `acceptUser`(IN `userID` INT, IN `assoID` INT, IN `roleID` INT)
BEGIN
    DELETE FROM join_asso WHERE asso_id = assoID AND user_id = userID;
    INSERT INTO user_role_asso (user_id, role_id) VALUES (userID, roleID);
END $$

DELIMITER ;

CREATE EVENT `delete_expired_account` 
ON SCHEDULE EVERY 5 MINUTE STARTS '2023-11-26 12:00:00' ENDS '2033-11-27 12:00:00' 
ON COMPLETION NOT PRESERVE ENABLE DO 
DELETE FROM users 
WHERE users.active=0 
AND users.activation_expire < CURRENT_TIMESTAMP