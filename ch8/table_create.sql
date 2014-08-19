create database mismatchdb;

use mismatchdb;


drop table mismatch_user;
create table mismatch_user
(
	user_id int AUTO_INCREMENT primary key
,	username	varchar(32)
,	password	varchar(40)
,	join_date	datetime
,	first_name	varchar(32)
,	last_name	varchar(32)
,	gender		varchar(1)
,	birthdate	date
,	city		varchar(32)
,	state		varchar(32)
,	picture		varchar(32)
);


select * from mismatch_user where user_id='khchoi';


INSERT INTO `mismatch_user` VALUES (1, 'sidneyk', '745c52f30f82d4323292dcca9eea0aee87feecc5', '2008-06-03 14:51:46', 'Sidney', 'Kelsow', 'F', '1984-07-19', 'Tempe', 'AZ', 'sidneypic.jpg');
INSERT INTO `mismatch_user` VALUES (2, 'nevilj', '12a20bcb5ed139a5f3fc808704897762cbab74ec', '2008-06-03 14:52:09', 'Nevil', 'Johansson', 'M', '1973-05-13', 'Reno', 'NV', 'nevilpic.jpg');
INSERT INTO `mismatch_user` VALUES (3, 'alexc', '676a6666682bd41bef5fd1c1f629fa233b1307a4', '2008-06-03 14:53:05', 'Alex', 'Cooper', 'M', '1974-09-13', 'Boise', 'ID', 'alexpic.jpg');
INSERT INTO `mismatch_user` VALUES (4, 'sdaniels', '1ff915f2fae864032e44cbe5a6cdd858500c9df7', '2008-06-03 14:58:40', 'Susannah', 'Daniels', 'F', '1977-02-23', 'Pasadena', 'CA', 'susannahpic.jpg');
INSERT INTO `mismatch_user` VALUES (5, 'ethelh', '53a56acb2a52f3815a2518e75029b071c298477a', '2008-06-03 15:00:37', 'Ethel', 'Heckel', 'F', '1943-03-27', 'Wichita', 'KS', 'ethelpic.jpg');
INSERT INTO `mismatch_user` VALUES (6, 'oklugman', 'df00f36c0b795c30a0409778d7f9db27a970f74f', '2008-06-03 15:00:48', 'Oscar', 'Klugman', 'M', '1968-06-04', 'Providence', 'RI', 'oscarpic.jpg');
INSERT INTO `mismatch_user` VALUES (7, 'belitac', '7c19dd287e03ae31ce190c4043b5a7f9795c41dc', '2008-06-03 15:01:08', 'Belita', 'Chevy', 'F', '1975-07-08', 'El Paso', 'TX', 'belitapic.jpg');
INSERT INTO `mismatch_user` VALUES (8, 'jasonf', '3da70cd115b7c3a7cebc2b5282706f07d185de9e', '2008-06-03 15:01:19', 'Jason', 'Filmington', 'M', '1969-09-24', 'Hollywood', 'CA', 'jasonpic.jpg');
INSERT INTO `mismatch_user` VALUES (9, 'dierdre', '08447be571e1c113f2f175472753ca5f5af454f3', '2008-06-03 15:01:51', 'Dierdre', 'Pennington', 'F', '1970-04-26', 'Cambridge', 'MA', 'dierdrepic.jpg');
INSERT INTO `mismatch_user` VALUES (10, 'baldpaul', '230dcb28e2d1dc19ec14990721e85cd5c5234245', '2008-06-03 15:02:02', 'Paul', 'Hillsman', 'M', '1964-12-18', 'Charleston', 'SC', 'paulpic.jpg');
INSERT INTO `mismatch_user` VALUES (11, 'jnettles', 'e511d793f532dbe0e0483538e11977f7b7c33b28', '2008-06-03 15:02:13', 'Johan', 'Nettles', 'M', '1981-11-03', 'Athens', 'GA', 'johanpic.jpg');
INSERT INTO `mismatch_user` VALUES (12, 'rubyr', '062e4a8476b1063e05caa69958e36a905f887619', '2008-06-03 15:02:24', 'Ruby', 'Reasons', 'F', '1972-09-18', 'Conundrum', 'AZ', 'rubypic.jpg');

select SHA('ckh1142')

INSERT INTO `mismatch_user` VALUES (13, 'khchoi', SHA('ckh1142'), '2008-06-03 15:02:24', 'Choi', 'Kilhyoung', 'M', '1977-08-13', 'Conundrum', 'AZ', 'rubypic.jpg');


CREATE TABLE `mismatch_category` (
  `category_id` INT AUTO_INCREMENT,
  `name` VARCHAR(48),
  PRIMARY KEY (`category_id`)
);

INSERT INTO `mismatch_category` VALUES (1, 'Appearance');
INSERT INTO `mismatch_category` VALUES (2, 'Entertainment');
INSERT INTO `mismatch_category` VALUES (3, 'Food');
INSERT INTO `mismatch_category` VALUES (4, 'People');
INSERT INTO `mismatch_category` VALUES (5, 'Activities');

select * from mismatch_category;




CREATE TABLE `mismatch_response` (
  `response_id` INT AUTO_INCREMENT,
  `user_id` INT,
  `topic_id` INT,
  `response` TINYINT,
  PRIMARY KEY (`response_id`)
);

INSERT INTO `mismatch_response` VALUES (1, 1, 1, 2);
INSERT INTO `mismatch_response` VALUES (2, 1, 2, 2);
INSERT INTO `mismatch_response` VALUES (3, 1, 3, 2);
INSERT INTO `mismatch_response` VALUES (4, 1, 4, 1);
INSERT INTO `mismatch_response` VALUES (5, 1, 5, 1);
INSERT INTO `mismatch_response` VALUES (6, 1, 6, 1);
INSERT INTO `mismatch_response` VALUES (7, 1, 7, 2);
INSERT INTO `mismatch_response` VALUES (8, 1, 8, 2);
INSERT INTO `mismatch_response` VALUES (9, 1, 9, 1);
INSERT INTO `mismatch_response` VALUES (10, 1, 10, 1);
INSERT INTO `mismatch_response` VALUES (11, 1, 11, 1);
INSERT INTO `mismatch_response` VALUES (12, 1, 12, 2);
INSERT INTO `mismatch_response` VALUES (13, 1, 13, 1);
INSERT INTO `mismatch_response` VALUES (14, 1, 14, 2);
INSERT INTO `mismatch_response` VALUES (15, 1, 15, 1);
INSERT INTO `mismatch_response` VALUES (16, 1, 16, 2);
INSERT INTO `mismatch_response` VALUES (17, 1, 17, 1);
INSERT INTO `mismatch_response` VALUES (18, 1, 18, 1);
INSERT INTO `mismatch_response` VALUES (19, 1, 19, 2);
INSERT INTO `mismatch_response` VALUES (20, 1, 20, 1);
INSERT INTO `mismatch_response` VALUES (21, 1, 21, 1);
INSERT INTO `mismatch_response` VALUES (22, 1, 22, 2);
INSERT INTO `mismatch_response` VALUES (23, 1, 23, 1);
INSERT INTO `mismatch_response` VALUES (24, 1, 24, 2);
INSERT INTO `mismatch_response` VALUES (25, 1, 25, 1);
INSERT INTO `mismatch_response` VALUES (26, 7, 1, 1);
INSERT INTO `mismatch_response` VALUES (27, 7, 2, 2);
INSERT INTO `mismatch_response` VALUES (28, 7, 3, 1);
INSERT INTO `mismatch_response` VALUES (29, 7, 4, 2);
INSERT INTO `mismatch_response` VALUES (30, 7, 5, 1);
INSERT INTO `mismatch_response` VALUES (31, 7, 6, 2);
INSERT INTO `mismatch_response` VALUES (32, 7, 7, 1);
INSERT INTO `mismatch_response` VALUES (33, 7, 8, 1);
INSERT INTO `mismatch_response` VALUES (34, 7, 9, 2);
INSERT INTO `mismatch_response` VALUES (35, 7, 10, 2);
INSERT INTO `mismatch_response` VALUES (36, 7, 11, 1);
INSERT INTO `mismatch_response` VALUES (37, 7, 12, 2);
INSERT INTO `mismatch_response` VALUES (38, 7, 13, 1);
INSERT INTO `mismatch_response` VALUES (39, 7, 14, 1);
INSERT INTO `mismatch_response` VALUES (40, 7, 15, 2);
INSERT INTO `mismatch_response` VALUES (41, 7, 16, 1);
INSERT INTO `mismatch_response` VALUES (42, 7, 17, 2);
INSERT INTO `mismatch_response` VALUES (43, 7, 18, 2);
INSERT INTO `mismatch_response` VALUES (44, 7, 19, 2);
INSERT INTO `mismatch_response` VALUES (45, 7, 20, 1);
INSERT INTO `mismatch_response` VALUES (46, 7, 21, 2);
INSERT INTO `mismatch_response` VALUES (47, 7, 22, 2);
INSERT INTO `mismatch_response` VALUES (48, 7, 23, 1);
INSERT INTO `mismatch_response` VALUES (49, 7, 24, 1);
INSERT INTO `mismatch_response` VALUES (50, 7, 25, 2);
INSERT INTO `mismatch_response` VALUES (51, 2, 1, 1);
INSERT INTO `mismatch_response` VALUES (52, 2, 2, 1);
INSERT INTO `mismatch_response` VALUES (53, 2, 3, 2);
INSERT INTO `mismatch_response` VALUES (54, 2, 4, 2);
INSERT INTO `mismatch_response` VALUES (55, 2, 5, 2);
INSERT INTO `mismatch_response` VALUES (56, 2, 6, 2);
INSERT INTO `mismatch_response` VALUES (57, 2, 7, 2);
INSERT INTO `mismatch_response` VALUES (58, 2, 8, 2);
INSERT INTO `mismatch_response` VALUES (59, 2, 9, 1);
INSERT INTO `mismatch_response` VALUES (60, 2, 10, 1);
INSERT INTO `mismatch_response` VALUES (61, 2, 11, 2);
INSERT INTO `mismatch_response` VALUES (62, 2, 12, 1);
INSERT INTO `mismatch_response` VALUES (63, 2, 13, 1);
INSERT INTO `mismatch_response` VALUES (64, 2, 14, 2);
INSERT INTO `mismatch_response` VALUES (65, 2, 15, 2);
INSERT INTO `mismatch_response` VALUES (66, 2, 16, 2);
INSERT INTO `mismatch_response` VALUES (67, 2, 17, 1);
INSERT INTO `mismatch_response` VALUES (68, 2, 18, 2);
INSERT INTO `mismatch_response` VALUES (69, 2, 19, 1);
INSERT INTO `mismatch_response` VALUES (70, 2, 20, 2);
INSERT INTO `mismatch_response` VALUES (71, 2, 21, 1);
INSERT INTO `mismatch_response` VALUES (72, 2, 22, 2);
INSERT INTO `mismatch_response` VALUES (73, 2, 23, 2);
INSERT INTO `mismatch_response` VALUES (74, 2, 24, 1);
INSERT INTO `mismatch_response` VALUES (75, 2, 25, 1);
INSERT INTO `mismatch_response` VALUES (76, 11, 1, 1);
INSERT INTO `mismatch_response` VALUES (77, 11, 2, 1);
INSERT INTO `mismatch_response` VALUES (78, 11, 3, 1);
INSERT INTO `mismatch_response` VALUES (79, 11, 4, 1);
INSERT INTO `mismatch_response` VALUES (80, 11, 5, 1);
INSERT INTO `mismatch_response` VALUES (81, 11, 6, 2);
INSERT INTO `mismatch_response` VALUES (82, 11, 7, 1);
INSERT INTO `mismatch_response` VALUES (83, 11, 8, 1);
INSERT INTO `mismatch_response` VALUES (84, 11, 9, 2);
INSERT INTO `mismatch_response` VALUES (85, 11, 10, 2);
INSERT INTO `mismatch_response` VALUES (86, 11, 11, 2);
INSERT INTO `mismatch_response` VALUES (87, 11, 12, 1);
INSERT INTO `mismatch_response` VALUES (88, 11, 13, 1);
INSERT INTO `mismatch_response` VALUES (89, 11, 14, 1);
INSERT INTO `mismatch_response` VALUES (90, 11, 15, 2);
INSERT INTO `mismatch_response` VALUES (91, 11, 16, 1);
INSERT INTO `mismatch_response` VALUES (92, 11, 17, 2);
INSERT INTO `mismatch_response` VALUES (93, 11, 18, 2);
INSERT INTO `mismatch_response` VALUES (94, 11, 19, 1);
INSERT INTO `mismatch_response` VALUES (95, 11, 20, 2);
INSERT INTO `mismatch_response` VALUES (96, 11, 21, 2);
INSERT INTO `mismatch_response` VALUES (97, 11, 22, 1);
INSERT INTO `mismatch_response` VALUES (98, 11, 23, 2);
INSERT INTO `mismatch_response` VALUES (99, 11, 24, 1);
INSERT INTO `mismatch_response` VALUES (100, 11, 25, 2);
INSERT INTO `mismatch_response` VALUES (101, 12, 1, 2);
INSERT INTO `mismatch_response` VALUES (102, 12, 2, 2);
INSERT INTO `mismatch_response` VALUES (103, 12, 3, 1);
INSERT INTO `mismatch_response` VALUES (104, 12, 4, 1);
INSERT INTO `mismatch_response` VALUES (105, 12, 5, 1);
INSERT INTO `mismatch_response` VALUES (106, 12, 6, 2);
INSERT INTO `mismatch_response` VALUES (107, 12, 7, 2);
INSERT INTO `mismatch_response` VALUES (108, 12, 8, 1);
INSERT INTO `mismatch_response` VALUES (109, 12, 9, 2);
INSERT INTO `mismatch_response` VALUES (110, 12, 10, 1);
INSERT INTO `mismatch_response` VALUES (111, 12, 11, 1);
INSERT INTO `mismatch_response` VALUES (112, 12, 12, 2);
INSERT INTO `mismatch_response` VALUES (113, 12, 13, 2);
INSERT INTO `mismatch_response` VALUES (114, 12, 14, 2);
INSERT INTO `mismatch_response` VALUES (115, 12, 15, 2);
INSERT INTO `mismatch_response` VALUES (116, 12, 16, 1);
INSERT INTO `mismatch_response` VALUES (117, 12, 17, 1);
INSERT INTO `mismatch_response` VALUES (118, 12, 18, 2);
INSERT INTO `mismatch_response` VALUES (119, 12, 19, 1);
INSERT INTO `mismatch_response` VALUES (120, 12, 20, 1);
INSERT INTO `mismatch_response` VALUES (121, 12, 21, 1);
INSERT INTO `mismatch_response` VALUES (122, 12, 22, 2);
INSERT INTO `mismatch_response` VALUES (123, 12, 23, 1);
INSERT INTO `mismatch_response` VALUES (124, 12, 24, 2);
INSERT INTO `mismatch_response` VALUES (125, 12, 25, 2);
INSERT INTO `mismatch_response` VALUES (126, 8, 1, 2);
INSERT INTO `mismatch_response` VALUES (127, 8, 2, 2);
INSERT INTO `mismatch_response` VALUES (128, 8, 3, 1);
INSERT INTO `mismatch_response` VALUES (129, 8, 4, 1);
INSERT INTO `mismatch_response` VALUES (130, 8, 5, 2);
INSERT INTO `mismatch_response` VALUES (131, 8, 6, 1);
INSERT INTO `mismatch_response` VALUES (132, 8, 7, 1);
INSERT INTO `mismatch_response` VALUES (133, 8, 8, 2);
INSERT INTO `mismatch_response` VALUES (134, 8, 9, 1);
INSERT INTO `mismatch_response` VALUES (135, 8, 10, 1);
INSERT INTO `mismatch_response` VALUES (136, 8, 11, 2);
INSERT INTO `mismatch_response` VALUES (137, 8, 12, 2);
INSERT INTO `mismatch_response` VALUES (138, 8, 13, 2);
INSERT INTO `mismatch_response` VALUES (139, 8, 14, 2);
INSERT INTO `mismatch_response` VALUES (140, 8, 15, 1);
INSERT INTO `mismatch_response` VALUES (141, 8, 16, 1);
INSERT INTO `mismatch_response` VALUES (142, 8, 17, 1);
INSERT INTO `mismatch_response` VALUES (143, 8, 18, 2);
INSERT INTO `mismatch_response` VALUES (144, 8, 19, 1);
INSERT INTO `mismatch_response` VALUES (145, 8, 20, 1);
INSERT INTO `mismatch_response` VALUES (146, 8, 21, 1);
INSERT INTO `mismatch_response` VALUES (147, 8, 22, 1);
INSERT INTO `mismatch_response` VALUES (148, 8, 23, 2);
INSERT INTO `mismatch_response` VALUES (149, 8, 24, 2);
INSERT INTO `mismatch_response` VALUES (150, 8, 25, 1);
INSERT INTO `mismatch_response` VALUES (151, 3, 1, 1);
INSERT INTO `mismatch_response` VALUES (152, 3, 2, 1);
INSERT INTO `mismatch_response` VALUES (153, 3, 3, 1);
INSERT INTO `mismatch_response` VALUES (154, 3, 4, 2);
INSERT INTO `mismatch_response` VALUES (155, 3, 5, 2);
INSERT INTO `mismatch_response` VALUES (156, 3, 6, 2);
INSERT INTO `mismatch_response` VALUES (157, 3, 7, 1);
INSERT INTO `mismatch_response` VALUES (158, 3, 8, 1);
INSERT INTO `mismatch_response` VALUES (159, 3, 9, 2);
INSERT INTO `mismatch_response` VALUES (160, 3, 10, 1);
INSERT INTO `mismatch_response` VALUES (161, 3, 11, 1);
INSERT INTO `mismatch_response` VALUES (162, 3, 12, 1);
INSERT INTO `mismatch_response` VALUES (163, 3, 13, 1);
INSERT INTO `mismatch_response` VALUES (164, 3, 14, 1);
INSERT INTO `mismatch_response` VALUES (165, 3, 15, 1);
INSERT INTO `mismatch_response` VALUES (166, 3, 16, 2);
INSERT INTO `mismatch_response` VALUES (167, 3, 17, 2);
INSERT INTO `mismatch_response` VALUES (168, 3, 18, 2);
INSERT INTO `mismatch_response` VALUES (169, 3, 19, 1);
INSERT INTO `mismatch_response` VALUES (170, 3, 20, 1);
INSERT INTO `mismatch_response` VALUES (171, 3, 21, 1);
INSERT INTO `mismatch_response` VALUES (172, 3, 22, 1);
INSERT INTO `mismatch_response` VALUES (173, 3, 23, 1);
INSERT INTO `mismatch_response` VALUES (174, 3, 24, 2);
INSERT INTO `mismatch_response` VALUES (175, 3, 25, 2);
INSERT INTO `mismatch_response` VALUES (176, 4, 1, 1);
INSERT INTO `mismatch_response` VALUES (177, 4, 2, 2);
INSERT INTO `mismatch_response` VALUES (178, 4, 3, 1);
INSERT INTO `mismatch_response` VALUES (179, 4, 4, 1);
INSERT INTO `mismatch_response` VALUES (180, 4, 5, 2);
INSERT INTO `mismatch_response` VALUES (181, 4, 6, 1);
INSERT INTO `mismatch_response` VALUES (182, 4, 7, 1);
INSERT INTO `mismatch_response` VALUES (183, 4, 8, 2);
INSERT INTO `mismatch_response` VALUES (184, 4, 9, 1);
INSERT INTO `mismatch_response` VALUES (185, 4, 10, 2);
INSERT INTO `mismatch_response` VALUES (186, 4, 11, 2);
INSERT INTO `mismatch_response` VALUES (187, 4, 12, 1);
INSERT INTO `mismatch_response` VALUES (188, 4, 13, 2);
INSERT INTO `mismatch_response` VALUES (189, 4, 14, 2);
INSERT INTO `mismatch_response` VALUES (190, 4, 15, 1);
INSERT INTO `mismatch_response` VALUES (191, 4, 16, 1);
INSERT INTO `mismatch_response` VALUES (192, 4, 17, 2);
INSERT INTO `mismatch_response` VALUES (193, 4, 18, 1);
INSERT INTO `mismatch_response` VALUES (194, 4, 19, 1);
INSERT INTO `mismatch_response` VALUES (195, 4, 20, 2);
INSERT INTO `mismatch_response` VALUES (196, 4, 21, 2);
INSERT INTO `mismatch_response` VALUES (197, 4, 22, 1);
INSERT INTO `mismatch_response` VALUES (198, 4, 23, 2);
INSERT INTO `mismatch_response` VALUES (199, 4, 24, 1);
INSERT INTO `mismatch_response` VALUES (200, 4, 25, 1);
INSERT INTO `mismatch_response` VALUES (201, 5, 1, 2);
INSERT INTO `mismatch_response` VALUES (202, 5, 2, 2);
INSERT INTO `mismatch_response` VALUES (203, 5, 3, 2);
INSERT INTO `mismatch_response` VALUES (204, 5, 4, 1);
INSERT INTO `mismatch_response` VALUES (205, 5, 5, 1);
INSERT INTO `mismatch_response` VALUES (206, 5, 6, 2);
INSERT INTO `mismatch_response` VALUES (207, 5, 7, 2);
INSERT INTO `mismatch_response` VALUES (208, 5, 8, 2);
INSERT INTO `mismatch_response` VALUES (209, 5, 9, 1);
INSERT INTO `mismatch_response` VALUES (210, 5, 10, 1);
INSERT INTO `mismatch_response` VALUES (211, 5, 11, 2);
INSERT INTO `mismatch_response` VALUES (212, 5, 12, 1);
INSERT INTO `mismatch_response` VALUES (213, 5, 13, 2);
INSERT INTO `mismatch_response` VALUES (214, 5, 14, 1);
INSERT INTO `mismatch_response` VALUES (215, 5, 15, 2);
INSERT INTO `mismatch_response` VALUES (216, 5, 16, 2);
INSERT INTO `mismatch_response` VALUES (217, 5, 17, 1);
INSERT INTO `mismatch_response` VALUES (218, 5, 18, 1);
INSERT INTO `mismatch_response` VALUES (219, 5, 19, 2);
INSERT INTO `mismatch_response` VALUES (220, 5, 20, 1);
INSERT INTO `mismatch_response` VALUES (221, 5, 21, 2);
INSERT INTO `mismatch_response` VALUES (222, 5, 22, 2);
INSERT INTO `mismatch_response` VALUES (223, 5, 23, 1);
INSERT INTO `mismatch_response` VALUES (224, 5, 24, 1);
INSERT INTO `mismatch_response` VALUES (225, 5, 25, 1);
INSERT INTO `mismatch_response` VALUES (226, 6, 1, 2);
INSERT INTO `mismatch_response` VALUES (227, 6, 2, 1);
INSERT INTO `mismatch_response` VALUES (228, 6, 3, 2);
INSERT INTO `mismatch_response` VALUES (229, 6, 4, 1);
INSERT INTO `mismatch_response` VALUES (230, 6, 5, 2);
INSERT INTO `mismatch_response` VALUES (231, 6, 6, 1);
INSERT INTO `mismatch_response` VALUES (232, 6, 7, 1);
INSERT INTO `mismatch_response` VALUES (233, 6, 8, 1);
INSERT INTO `mismatch_response` VALUES (234, 6, 9, 2);
INSERT INTO `mismatch_response` VALUES (235, 6, 10, 1);
INSERT INTO `mismatch_response` VALUES (236, 6, 11, 1);
INSERT INTO `mismatch_response` VALUES (237, 6, 12, 2);
INSERT INTO `mismatch_response` VALUES (238, 6, 13, 2);
INSERT INTO `mismatch_response` VALUES (239, 6, 14, 2);
INSERT INTO `mismatch_response` VALUES (240, 6, 15, 1);
INSERT INTO `mismatch_response` VALUES (241, 6, 16, 2);
INSERT INTO `mismatch_response` VALUES (242, 6, 17, 1);
INSERT INTO `mismatch_response` VALUES (243, 6, 18, 1);
INSERT INTO `mismatch_response` VALUES (244, 6, 19, 2);
INSERT INTO `mismatch_response` VALUES (245, 6, 20, 1);
INSERT INTO `mismatch_response` VALUES (246, 6, 21, 1);
INSERT INTO `mismatch_response` VALUES (247, 6, 22, 2);
INSERT INTO `mismatch_response` VALUES (248, 6, 23, 2);
INSERT INTO `mismatch_response` VALUES (249, 6, 24, 2);
INSERT INTO `mismatch_response` VALUES (250, 6, 25, 1);
INSERT INTO `mismatch_response` VALUES (251, 9, 1, 2);
INSERT INTO `mismatch_response` VALUES (252, 9, 2, 1);
INSERT INTO `mismatch_response` VALUES (253, 9, 3, 1);
INSERT INTO `mismatch_response` VALUES (254, 9, 4, 2);
INSERT INTO `mismatch_response` VALUES (255, 9, 5, 2);
INSERT INTO `mismatch_response` VALUES (256, 9, 6, 2);
INSERT INTO `mismatch_response` VALUES (257, 9, 7, 2);
INSERT INTO `mismatch_response` VALUES (258, 9, 8, 2);
INSERT INTO `mismatch_response` VALUES (259, 9, 9, 1);
INSERT INTO `mismatch_response` VALUES (260, 9, 10, 1);
INSERT INTO `mismatch_response` VALUES (261, 9, 11, 2);
INSERT INTO `mismatch_response` VALUES (262, 9, 12, 1);
INSERT INTO `mismatch_response` VALUES (263, 9, 13, 2);
INSERT INTO `mismatch_response` VALUES (264, 9, 14, 1);
INSERT INTO `mismatch_response` VALUES (265, 9, 15, 2);
INSERT INTO `mismatch_response` VALUES (266, 9, 16, 1);
INSERT INTO `mismatch_response` VALUES (267, 9, 17, 1);
INSERT INTO `mismatch_response` VALUES (268, 9, 18, 1);
INSERT INTO `mismatch_response` VALUES (269, 9, 19, 2);
INSERT INTO `mismatch_response` VALUES (270, 9, 20, 1);
INSERT INTO `mismatch_response` VALUES (271, 9, 21, 1);
INSERT INTO `mismatch_response` VALUES (272, 9, 22, 2);
INSERT INTO `mismatch_response` VALUES (273, 9, 23, 2);
INSERT INTO `mismatch_response` VALUES (274, 9, 24, 1);
INSERT INTO `mismatch_response` VALUES (275, 9, 25, 1);
INSERT INTO `mismatch_response` VALUES (276, 10, 1, 1);
INSERT INTO `mismatch_response` VALUES (277, 10, 2, 2);
INSERT INTO `mismatch_response` VALUES (278, 10, 3, 2);
INSERT INTO `mismatch_response` VALUES (279, 10, 4, 2);
INSERT INTO `mismatch_response` VALUES (280, 10, 5, 2);
INSERT INTO `mismatch_response` VALUES (281, 10, 6, 2);
INSERT INTO `mismatch_response` VALUES (282, 10, 7, 1);
INSERT INTO `mismatch_response` VALUES (283, 10, 8, 2);
INSERT INTO `mismatch_response` VALUES (284, 10, 9, 2);
INSERT INTO `mismatch_response` VALUES (285, 10, 10, 1);
INSERT INTO `mismatch_response` VALUES (286, 10, 11, 1);
INSERT INTO `mismatch_response` VALUES (287, 10, 12, 2);
INSERT INTO `mismatch_response` VALUES (288, 10, 13, 1);
INSERT INTO `mismatch_response` VALUES (289, 10, 14, 2);
INSERT INTO `mismatch_response` VALUES (290, 10, 15, 1);
INSERT INTO `mismatch_response` VALUES (291, 10, 16, 1);
INSERT INTO `mismatch_response` VALUES (292, 10, 17, 1);
INSERT INTO `mismatch_response` VALUES (293, 10, 18, 1);
INSERT INTO `mismatch_response` VALUES (294, 10, 19, 1);
INSERT INTO `mismatch_response` VALUES (295, 10, 20, 1);
INSERT INTO `mismatch_response` VALUES (296, 10, 21, 1);
INSERT INTO `mismatch_response` VALUES (297, 10, 22, 1);
INSERT INTO `mismatch_response` VALUES (298, 10, 23, 1);
INSERT INTO `mismatch_response` VALUES (299, 10, 24, 2);
INSERT INTO `mismatch_response` VALUES (300, 10, 25, 2);
INSERT INTO `mismatch_response` VALUES (301, 13, 1, 2);
INSERT INTO `mismatch_response` VALUES (302, 13, 2, 1);
INSERT INTO `mismatch_response` VALUES (303, 13, 3, 2);
INSERT INTO `mismatch_response` VALUES (304, 13, 4, 2);
INSERT INTO `mismatch_response` VALUES (305, 13, 5, NULL);
INSERT INTO `mismatch_response` VALUES (306, 13, 6, 1);
INSERT INTO `mismatch_response` VALUES (307, 13, 7, 1);
INSERT INTO `mismatch_response` VALUES (308, 13, 8, 2);
INSERT INTO `mismatch_response` VALUES (309, 13, 9, 1);
INSERT INTO `mismatch_response` VALUES (310, 13, 10, 1);
INSERT INTO `mismatch_response` VALUES (311, 13, 11, 2);
INSERT INTO `mismatch_response` VALUES (312, 13, 12, 1);
INSERT INTO `mismatch_response` VALUES (313, 13, 13, 1);
INSERT INTO `mismatch_response` VALUES (314, 13, 14, 1);
INSERT INTO `mismatch_response` VALUES (315, 13, 15, 2);
INSERT INTO `mismatch_response` VALUES (316, 13, 16, 2);
INSERT INTO `mismatch_response` VALUES (317, 13, 17, 1);
INSERT INTO `mismatch_response` VALUES (318, 13, 18, 2);
INSERT INTO `mismatch_response` VALUES (319, 13, 19, 1);
INSERT INTO `mismatch_response` VALUES (320, 13, 20, 1);
INSERT INTO `mismatch_response` VALUES (321, 13, 21, 2);
INSERT INTO `mismatch_response` VALUES (322, 13, 22, 2);
INSERT INTO `mismatch_response` VALUES (323, 13, 23, 1);
INSERT INTO `mismatch_response` VALUES (324, 13, 24, 1);
INSERT INTO `mismatch_response` VALUES (325, 13, 25, 2);
INSERT INTO `mismatch_response` VALUES (326, 14, 1, 2);
INSERT INTO `mismatch_response` VALUES (327, 14, 2, 2);
INSERT INTO `mismatch_response` VALUES (328, 14, 3, 2);
INSERT INTO `mismatch_response` VALUES (329, 14, 4, 2);
INSERT INTO `mismatch_response` VALUES (330, 14, 5, 1);
INSERT INTO `mismatch_response` VALUES (331, 14, 6, 1);
INSERT INTO `mismatch_response` VALUES (332, 14, 7, 1);
INSERT INTO `mismatch_response` VALUES (333, 14, 8, 2);
INSERT INTO `mismatch_response` VALUES (334, 14, 9, 1);
INSERT INTO `mismatch_response` VALUES (335, 14, 10, 1);
INSERT INTO `mismatch_response` VALUES (336, 14, 11, 1);
INSERT INTO `mismatch_response` VALUES (337, 14, 12, 1);
INSERT INTO `mismatch_response` VALUES (338, 14, 13, 2);
INSERT INTO `mismatch_response` VALUES (339, 14, 14, 2);
INSERT INTO `mismatch_response` VALUES (340, 14, 15, 2);
INSERT INTO `mismatch_response` VALUES (341, 14, 16, 2);
INSERT INTO `mismatch_response` VALUES (342, 14, 17, 1);
INSERT INTO `mismatch_response` VALUES (343, 14, 18, 2);
INSERT INTO `mismatch_response` VALUES (344, 14, 19, 1);
INSERT INTO `mismatch_response` VALUES (345, 14, 20, 1);
INSERT INTO `mismatch_response` VALUES (346, 14, 21, 2);
INSERT INTO `mismatch_response` VALUES (347, 14, 22, 2);
INSERT INTO `mismatch_response` VALUES (348, 14, 23, 2);
INSERT INTO `mismatch_response` VALUES (349, 14, 24, 1);
INSERT INTO `mismatch_response` VALUES (350, 14, 25, 2);
INSERT INTO `mismatch_response` VALUES (351, 15, 1, 2);
INSERT INTO `mismatch_response` VALUES (352, 15, 2, 2);
INSERT INTO `mismatch_response` VALUES (353, 15, 3, 2);
INSERT INTO `mismatch_response` VALUES (354, 15, 4, 1);
INSERT INTO `mismatch_response` VALUES (355, 15, 5, 1);
INSERT INTO `mismatch_response` VALUES (356, 15, 6, 1);
INSERT INTO `mismatch_response` VALUES (357, 15, 7, 2);
INSERT INTO `mismatch_response` VALUES (358, 15, 8, 1);
INSERT INTO `mismatch_response` VALUES (359, 15, 9, 2);
INSERT INTO `mismatch_response` VALUES (360, 15, 10, 2);
INSERT INTO `mismatch_response` VALUES (361, 15, 11, 2);
INSERT INTO `mismatch_response` VALUES (362, 15, 12, 2);
INSERT INTO `mismatch_response` VALUES (363, 15, 13, 1);
INSERT INTO `mismatch_response` VALUES (364, 15, 14, 2);
INSERT INTO `mismatch_response` VALUES (365, 15, 15, 2);
INSERT INTO `mismatch_response` VALUES (366, 15, 16, 2);
INSERT INTO `mismatch_response` VALUES (367, 15, 17, 2);
INSERT INTO `mismatch_response` VALUES (368, 15, 18, 2);
INSERT INTO `mismatch_response` VALUES (369, 15, 19, 2);
INSERT INTO `mismatch_response` VALUES (370, 15, 20, 2);
INSERT INTO `mismatch_response` VALUES (371, 15, 21, 1);
INSERT INTO `mismatch_response` VALUES (372, 15, 22, 1);
INSERT INTO `mismatch_response` VALUES (373, 15, 23, 1);
INSERT INTO `mismatch_response` VALUES (374, 15, 24, 2);
INSERT INTO `mismatch_response` VALUES (375, 15, 25, 1);



select * from mismatch_response


CREATE TABLE `mismatch_topic` (
  `topic_id` INT AUTO_INCREMENT,
  `name` VARCHAR(48),
  `category_id` INT,
  PRIMARY KEY (`topic_id`)
);

INSERT INTO `mismatch_topic` VALUES (1, 'Tattoos', 1);
INSERT INTO `mismatch_topic` VALUES (2, 'Gold chains', 1);
INSERT INTO `mismatch_topic` VALUES (3, 'Body piercings', 1);
INSERT INTO `mismatch_topic` VALUES (4, 'Cowboy boots', 1);
INSERT INTO `mismatch_topic` VALUES (5, 'Long hair', 1);
INSERT INTO `mismatch_topic` VALUES (6, 'Reality TV', 2);
INSERT INTO `mismatch_topic` VALUES (7, 'Professional wrestling', 2);
INSERT INTO `mismatch_topic` VALUES (8, 'Horror movies', 2);
INSERT INTO `mismatch_topic` VALUES (9, 'Easy listening music', 2);
INSERT INTO `mismatch_topic` VALUES (10, 'The opera', 2);
INSERT INTO `mismatch_topic` VALUES (11, 'Sushi', 3);
INSERT INTO `mismatch_topic` VALUES (12, 'Spam', 3);
INSERT INTO `mismatch_topic` VALUES (13, 'Spicy food', 3);
INSERT INTO `mismatch_topic` VALUES (14, 'Peanut butter & banana sandwiches', 3);
INSERT INTO `mismatch_topic` VALUES (15, 'Martinis', 3);
INSERT INTO `mismatch_topic` VALUES (16, 'Howard Stern', 4);
INSERT INTO `mismatch_topic` VALUES (17, 'Bill Gates', 4);
INSERT INTO `mismatch_topic` VALUES (18, 'Barbara Streisand', 4);
INSERT INTO `mismatch_topic` VALUES (19, 'Hugh Hefner', 4);
INSERT INTO `mismatch_topic` VALUES (20, 'Martha Stewart', 4);
INSERT INTO `mismatch_topic` VALUES (21, 'Yoga', 5);
INSERT INTO `mismatch_topic` VALUES (22, 'Weightlifting', 5);
INSERT INTO `mismatch_topic` VALUES (23, 'Cube puzzles', 5);
INSERT INTO `mismatch_topic` VALUES (24, 'Karaoke', 5);
INSERT INTO `mismatch_topic` VALUES (25, 'Hiking', 5);