DROP TABLE assign;

CREATE TABLE `assign` (
  `assign_Id` int(11) NOT NULL AUTO_INCREMENT,
  `assign_user_Id` int(11) NOT NULL,
  `assign_subject_Id` int(11) NOT NULL,
  `assign_section_Id` int(11) NOT NULL,
  `start_time` varchar(25) NOT NULL,
  `end_time` varchar(25) NOT NULL,
  `day` varchar(25) NOT NULL,
  `allowance_time` varchar(255) NOT NULL,
  PRIMARY KEY (`assign_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

INSERT INTO assign VALUES("22","42","36","20","10:27","10:27","Wednesday","");
INSERT INTO assign VALUES("23","42","29","25","10:39","10:39","Friday","");
INSERT INTO assign VALUES("24","50","36","20","10:30","11:30","Tuesday","");
INSERT INTO assign VALUES("25","52","37","20","08:00","09:00","Tuesday","");
INSERT INTO assign VALUES("26","51","18","34","10:42","11:42","Tuesday","");
INSERT INTO assign VALUES("27","50","43","20","11:15","00:15","Tuesday","");
INSERT INTO assign VALUES("28","52","28","25","11:40","12:40","Tuesday","");
INSERT INTO assign VALUES("30","54","18","34","20:00","09:30","Monday","");
INSERT INTO assign VALUES("31","54","53","29","10:00","12:00","Monday","");
INSERT INTO assign VALUES("32","54","40","20","13:00","14:00","Monday","");
INSERT INTO assign VALUES("33","54","40","22","14:00","15:00","Monday","");
INSERT INTO assign VALUES("34","54","40","23","08:30","09:30","Thursday","");
INSERT INTO assign VALUES("35","54","40","21","14:00","15:00","Thursday","");
INSERT INTO assign VALUES("36","58","43","22","15:00","16:00","Wednesday","");
INSERT INTO assign VALUES("37","57","44","20","07:30","09:30","Thursday","");
INSERT INTO assign VALUES("38","57","44","23","10:00","12:00","Thursday","");
INSERT INTO assign VALUES("39","57","2","19","13:00","14:00","Thursday","");
INSERT INTO assign VALUES("40","57","27","25","15:00","16:00","Thursday","");
INSERT INTO assign VALUES("41","56","41","22","13:00","14:00","Thursday","");
INSERT INTO assign VALUES("42","56","33","24","07:30","08:30","Thursday","");
INSERT INTO assign VALUES("43","56","33","26","08:30","09:30","Thursday","");
INSERT INTO assign VALUES("44","56","33","25","10:00","12:00","Thursday","");
INSERT INTO assign VALUES("45","58","50","27","10:00","12:00","Thursday","");
INSERT INTO assign VALUES("46","58","30","26","07:30","08:30","Thursday","");
INSERT INTO assign VALUES("47","58","30","24","12:40","09:30","Thursday","");
INSERT INTO assign VALUES("48","59","17","34","12:00","14:06","Monday","");
INSERT INTO assign VALUES("59","59","37","22","1803","11:21","Tuesday","");
INSERT INTO assign VALUES("60","56","36","20","1670039307","03:22","Monday","");
INSERT INTO assign VALUES("61","54","56","29","09:30","03:22","Monday","");
INSERT INTO assign VALUES("62","56","37","22","00:30","16:00","Monday","");
INSERT INTO assign VALUES("63","58","39","22","00:30","12:04","Tuesday","");
INSERT INTO assign VALUES("64","59","42","20","02:00","17:02","Wednesday","");



DROP TABLE attendance;

CREATE TABLE `attendance` (
  `attendance_Id` int(11) NOT NULL AUTO_INCREMENT,
  `attendance_student_Id` int(11) NOT NULL,
  `attendance_section_Id` int(11) NOT NULL,
  `attendance_subject_Id` int(11) NOT NULL,
  `time_in` varchar(255) NOT NULL,
  `time_out` varchar(50) NOT NULL,
  `logdate` varchar(50) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  PRIMARY KEY (`attendance_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=234 DEFAULT CHARSET=latin1;

INSERT INTO attendance VALUES("189","63","34","0","11:01","","13:01","Present");
INSERT INTO attendance VALUES("190","63","34","0","11:01","","13:01","Present");
INSERT INTO attendance VALUES("191","63","34","0","11:15","","13:15","Present");
INSERT INTO attendance VALUES("192","63","34","0","07:30","","13:17","Present");
INSERT INTO attendance VALUES("193","63","34","0","07:30","","13:17","Present");
INSERT INTO attendance VALUES("194","63","34","0","12:48","","13:18","Present");
INSERT INTO attendance VALUES("195","63","34","0","1670042940","","","Present");
INSERT INTO attendance VALUES("196","63","34","0","","","","Present");
INSERT INTO attendance VALUES("197","63","34","0","13:22","","","Present");
INSERT INTO attendance VALUES("198","63","34","0","13:31","","","Present");
INSERT INTO attendance VALUES("199","63","34","0","13:33","","","Present");
INSERT INTO attendance VALUES("200","63","34","0","13:33","","","Present");
INSERT INTO attendance VALUES("201","63","34","0","13:34","","","Late");
INSERT INTO attendance VALUES("202","63","34","0","13:35","","","Late");
INSERT INTO attendance VALUES("203","63","34","0","13:37","","","Late");
INSERT INTO attendance VALUES("204","63","34","0","13:37","","","Late");
INSERT INTO attendance VALUES("205","63","34","0","13:39","","","Late");
INSERT INTO attendance VALUES("206","63","34","0","13:40","","13:40","Present");
INSERT INTO attendance VALUES("207","63","34","0","13:40","","13:40","Present");
INSERT INTO attendance VALUES("208","63","34","0","13:42:14 PM","","2022-12-03","Present");
INSERT INTO attendance VALUES("209","63","34","0","13:42","","2022-12-03","Present");
INSERT INTO attendance VALUES("210","63","34","0","13:45","","","Present");
INSERT INTO attendance VALUES("211","63","34","0","13:47","","","Present");
INSERT INTO attendance VALUES("212","63","34","0","07:30","","","");
INSERT INTO attendance VALUES("213","63","34","0","08:30","","","");
INSERT INTO attendance VALUES("214","63","34","0","08:30","","","");
INSERT INTO attendance VALUES("215","63","34","0","08:30","","","");
INSERT INTO attendance VALUES("216","63","34","0","08:30","","","");
INSERT INTO attendance VALUES("217","63","34","0","","","","");
INSERT INTO attendance VALUES("218","63","34","0","","","","");
INSERT INTO attendance VALUES("219","63","34","0","13:30","","","");
INSERT INTO attendance VALUES("220","63","34","0","13:31","","","");
INSERT INTO attendance VALUES("221","63","34","0","14:02","","","");
INSERT INTO attendance VALUES("222","63","34","0","13:33","","","d");
INSERT INTO attendance VALUES("223","63","34","0","14:03","","","");
INSERT INTO attendance VALUES("224","63","34","0","14:04","","","Present");
INSERT INTO attendance VALUES("225","63","34","0","14:04","","2022-12-03","Present");
INSERT INTO attendance VALUES("226","63","34","0","14:05","","","");
INSERT INTO attendance VALUES("227","63","34","0","14:05","","2022-12-03","Present");
INSERT INTO attendance VALUES("228","63","34","0","14:06","","2022-12-03","Late");
INSERT INTO attendance VALUES("229","184","34","0","14:08","","2022-12-03","Late");
INSERT INTO attendance VALUES("230","184","34","0","14:09","","2022-12-03","Late");
INSERT INTO attendance VALUES("231","184","34","0","14:10","","2022-12-03","Late");
INSERT INTO attendance VALUES("232","184","34","0","14:10","","2022-12-03","Late");
INSERT INTO attendance VALUES("233","184","34","18","01:47","","2022-12-04","Late");



DROP TABLE grade;

CREATE TABLE `grade` (
  `grade_Id` int(11) NOT NULL AUTO_INCREMENT,
  `grade` varchar(20) NOT NULL,
  `strand` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`grade_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO grade VALUES("2","Grade 12","STEM","Science, Technology, Engineering and Mathematics");
INSERT INTO grade VALUES("3","Grade 11","STEM","Science, Technology, Engineering and Mathematics");
INSERT INTO grade VALUES("4","Grade 11","HUMSS","Humanities and Social Sciences (HUMSS)");
INSERT INTO grade VALUES("5","Grade 12","HUMSS","Humanities and Social Sciences (HUMSS)");
INSERT INTO grade VALUES("6","Grade 11","TVL AFA","Agricultural and Fisheries Arts");
INSERT INTO grade VALUES("7","Grade 12","TVL AFA","Agricultural and Fisheries Arts");
INSERT INTO grade VALUES("8","Grade 11","TVL HE","Home Economics");
INSERT INTO grade VALUES("9","Grade 12","TVL HE","Home Economics");



DROP TABLE section;

CREATE TABLE `section` (
  `section_Id` int(11) NOT NULL AUTO_INCREMENT,
  `section_grade_Id` int(11) NOT NULL,
  `section` varchar(255) NOT NULL,
  PRIMARY KEY (`section_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

INSERT INTO section VALUES("19","2","BIYO");
INSERT INTO section VALUES("20","4","SAN JUAN");
INSERT INTO section VALUES("21","4","HENOSA");
INSERT INTO section VALUES("22","4","FLORES");
INSERT INTO section VALUES("23","4","DELMUNDO");
INSERT INTO section VALUES("24","5","RIZAL");
INSERT INTO section VALUES("25","5","TRINIDAD");
INSERT INTO section VALUES("26","5","BENITEZ");
INSERT INTO section VALUES("27","6","Ciron Sr.");
INSERT INTO section VALUES("28","7","QUISUMBING");
INSERT INTO section VALUES("29","8","ESGUERRA");
INSERT INTO section VALUES("30","9","PALMA");
INSERT INTO section VALUES("34","3","AGUILAR");



DROP TABLE students;

CREATE TABLE `students` (
  `student_Id` int(11) NOT NULL AUTO_INCREMENT,
  `LRN` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `suffix` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `student_grade_Id` int(11) NOT NULL,
  `student_section_Id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `qr_image` varchar(255) NOT NULL,
  `date_registered` varchar(255) NOT NULL,
  `DELETED` varchar(20) NOT NULL DEFAULT 'False',
  PRIMARY KEY (`student_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=185 DEFAULT CHARSET=latin1;

INSERT INTO students VALUES("61","104474110005","Richard","Gabon","Baclig","","Male","3","34","1.jpg","../images-qr-codes/6386b4ee42d93.png","2022-11-30","False");
INSERT INTO students VALUES("62","104472120017","Arjhon Paul","Balmes","Carbonel","","Male","3","34","3.jpg","../images-qr-codes/6386b57055536.png","2022-11-30","False");
INSERT INTO students VALUES("63","107886120238","Tristan Jay","Rivera","Clores","","Male","3","34","12.jpg","../images-qr-codes/6386b5b420496.png","2022-11-30","False");
INSERT INTO students VALUES("64","104470110042","Roland Kent","Ramos","Fronda","","Male","3","34","2.jpg","../images-qr-codes/6386b61c19d38.png","2022-11-30","False");
INSERT INTO students VALUES("65","104470110045","Jesli William","Palaruan","Gante","","Male","3","34","4.jpg","../images-qr-codes/6386b6b79249f.png","2022-11-30","False");
INSERT INTO students VALUES("66","104478110002","Hazel","Sabado","Amazona","","Female","3","34","11.jpg","../images-qr-codes/6386b759d45d1.png","2022-11-30","False");
INSERT INTO students VALUES("67","104463110001","Aliah Mizelle","Pantalunan","Atulle","","Female","3","34","13.jpg","../images-qr-codes/6386b7dc0e886.png","2022-11-30","False");
INSERT INTO students VALUES("68","104476110005","Menchie","Catuiza","Calderon","","Female","3","34","14.jpg","../images-qr-codes/6386b81d780be.png","2022-11-30","False");
INSERT INTO students VALUES("69","104474100004","Mariella Ann","Barozo","Corpuz","","Female","3","34","15.jpg","../images-qr-codes/6386b86c00994.png","2022-11-30","False");
INSERT INTO students VALUES("70","104470120117","Precious Alisea","Gallego","Cuaresma","","Female","3","34","16.jpg","../images-qr-codes/6386b8c9a08a7.png","2022-11-30","False");
INSERT INTO students VALUES("71","136644090021","Mark John Lemuel","Carera","Aguado","","Male","4","20","a.jpg","../images-qr-codes/6386b9e40b879.png","2022-11-30","False");
INSERT INTO students VALUES("72","125726110011","Justine","Amansec","Baga","","Male","4","20","b.jpg","../images-qr-codes/6386ba2547eac.png","2022-11-30","False");
INSERT INTO students VALUES("73","104481110003","Christian Carl","Manaois","Cesar","","Male","4","20","c.jpg","../images-qr-codes/6386ba5835ab2.png","2022-11-30","False");
INSERT INTO students VALUES("74","103910120230","Mark Jean","Rebaula","Cunanan","","Male","4","20","d.jpg","../images-qr-codes/6386ba9f825b5.png","2022-11-30","False");
INSERT INTO students VALUES("75","104479080015","John Paul","Custodio","Dumamay","","Male","4","20","e.jpg","../images-qr-codes/6386bae839095.png","2022-11-30","False");
INSERT INTO students VALUES("76","104475110005","Michaela","Murillo","Carbonel","","Female","4","20","16.jpg","../images-qr-codes/6386bb42d3fec.png","2022-11-30","False");
INSERT INTO students VALUES("77","104496110017","Pauline","Geronimo","Castro","","Female","4","20","17.jpg","../images-qr-codes/6386bb79a6b3b.png","2022-11-30","False");
INSERT INTO students VALUES("78","104473110013","Jarenz","Hagunoy","Corpuz","","Female","4","20","18.jpg","../images-qr-codes/6386bbb8023bb.png","2022-11-30","False");
INSERT INTO students VALUES("79","104463110004","Maegan","Dela Cruz","Corpuz","","Female","4","20","19.jpg","../images-qr-codes/6386bbf027ca6.png","2022-11-30","False");
INSERT INTO students VALUES("80","157508120023","Stefanie","Marzan","Hinosa","","Female","4","20","19.jpg","../images-qr-codes/6386bd14a6a0c.png","2022-11-30","False");
INSERT INTO students VALUES("81","104478110019","Jade Marifel","Capalaran","Milar","","Female","4","20","20.jpg","../images-qr-codes/6386bd6e4864a.png","2022-11-30","False");
INSERT INTO students VALUES("82","10447009002","Harold","Supnet","Cacanindin","","Male","4","21","f.jpg","../images-qr-codes/6386bdf00b899.png","2022-11-30","False");
INSERT INTO students VALUES("83","104480130007","Ralph Adrian","Nolasco","Cacanindin","","Male","4","21","g.jpg","../images-qr-codes/6386be2300779.png","2022-11-30","False");
INSERT INTO students VALUES("84","104474100001","Christian","Balicha","Cagbay","","Male","4","21","h.jpg","../images-qr-codes/6386be5482249.png","2022-11-30","False");
INSERT INTO students VALUES("85","104475100008","Mark Bryan","Mandani","Cooper","","Male","4","21","i.jpg","../images-qr-codes/6386be89ee2e0.png","2022-11-30","False");
INSERT INTO students VALUES("86","104474110006","Rj","Alcantara","Culbengan","","Male","4","21","j.jpg","../images-qr-codes/6386becb4ec67.png","2022-11-30","False");
INSERT INTO students VALUES("87","104480110001","Juana Marie","Amansec","Abero","","Female","4","21","21.jpg","../images-qr-codes/6386bf0d7d758.png","2022-11-30","False");
INSERT INTO students VALUES("88","104473120034","Allysa Mae","Librero","Agoy","","Female","4","21","22.jpg","../images-qr-codes/6386bf6a0cd9d.png","2022-11-30","False");
INSERT INTO students VALUES("89","104480100002","Julie May","Olpindo","Amansec","","Female","4","21","23.jpg","../images-qr-codes/6386bf9ea81de.png","2022-11-30","False");
INSERT INTO students VALUES("90","104474110003","Hiezel Joy","Torcelino","Baclig","","Female","4","21","24.jpg","../images-qr-codes/6386bfdbe5677.png","2022-11-30","False");
INSERT INTO students VALUES("91","104467120054","Olive ","Pantalunan","Crogildo","","Female","4","21","25.jpg","../images-qr-codes/6386c01fe7885.png","2022-11-30","False");
INSERT INTO students VALUES("92","104473120029","Aljon","Acupan","Apigo","","Male","4","22","k.jpg","../images-qr-codes/6386c0a85459e.png","2022-11-30","False");
INSERT INTO students VALUES("93","104474110004","Jake Ashley","Linga","Baclig","","Male","4","22","l.jpg","../images-qr-codes/6386c0d60bc6d.png","2022-11-30","False");
INSERT INTO students VALUES("94","104472110008","John Carlo","Esteban","Bugayong","","Male","4","22","m.jpg","../images-qr-codes/6386c11a575a4.png","2022-11-30","False");
INSERT INTO students VALUES("95","104470110016","Rheden","Gavino","Busaing","","Male","4","22","n.jpg","../images-qr-codes/6386c149c7af8.png","2022-11-30","False");
INSERT INTO students VALUES("96","104463110002","Edeson Karl","Pacleb","Buya","","Male","4","22","o.jpg","../images-qr-codes/6386c18c6b04f.png","2022-11-30","False");
INSERT INTO students VALUES("97","104496110002","Gretchen","Tamayo","Abrero","","Female","4","22","26.jpg","../images-qr-codes/6386c1c0edce7.png","2022-11-30","False");
INSERT INTO students VALUES("98","400583150037","Jasmine Jade","Sabatin","Abrero","","Female","4","22","27.jpg","../images-qr-codes/6386c1feb49d1.png","2022-11-30","False");
INSERT INTO students VALUES("99","104476110001","Angel","Reyes","Agustin","","Female","4","22","28.jpg","../images-qr-codes/6386c2254eb63.png","2022-11-30","False");
INSERT INTO students VALUES("100","104473110003","Nicole","Acupan","Apongol","","Female","4","22","29.jpg","../images-qr-codes/6386c25261a12.png","2022-11-30","False");
INSERT INTO students VALUES("101","104479110001","Amy","Avicilia","Austria","","Female","4","22","30.jpg","../images-qr-codes/6386c28c9c27a.png","2022-11-30","False");
INSERT INTO students VALUES("102","104480110005","JB","Esbeg","Amansec","","Male","4","23","p.jpg","../images-qr-codes/6386c36724cac.png","2022-11-30","False");
INSERT INTO students VALUES("103","104478110004","Joseph Jr","Evangelista","Antonis","","Male","4","23","q.jpg","../images-qr-codes/6386c3b575325.png","2022-11-30","False");
INSERT INTO students VALUES("104","104475110003","Novelito","Dumo","Bihasa","","Male","4","23","r.jpg","../images-qr-codes/6386c45c65b03.png","2022-11-30","False");
INSERT INTO students VALUES("105","104476110006","Jayvee","Nidoy","Cunanan","","Male","4","23","s.jpg","../images-qr-codes/6386c497630d7.png","2022-11-30","False");
INSERT INTO students VALUES("106","104470150102","Roland Alexander","Garcia","Luna","","Male","4","23","t.jpg","../images-qr-codes/6386c4eee4eb3.png","2022-11-30","False");
INSERT INTO students VALUES("107","104478110003","Jia Angela","Mendoza","Antonis","","Female","4","23","31.jpg","../images-qr-codes/6386c575f2de9.png","2022-11-30","False");
INSERT INTO students VALUES("108","104473110006","Tricia May","German","Cabreros","","Female","4","23","32.jpg","../images-qr-codes/6386c5cc58a2d.png","2022-11-30","False");
INSERT INTO students VALUES("109","104473110009","Cristine","Manzano","Corpuz","","Female","4","23","33.jpg","../images-qr-codes/6386c61408e34.png","2022-11-30","False");
INSERT INTO students VALUES("110","104473110012","Jane","Manzano","Corpuz","","Female","4","23","34.jpg","../images-qr-codes/6386c644b5bb2.png","2022-11-30","False");
INSERT INTO students VALUES("111","104473120035","Ciara Jane","Melgazo","Dagdag","","Female","4","23","35.jpg","../images-qr-codes/6386c678168f4.png","2022-11-30","False");
INSERT INTO students VALUES("112","104475110001","Alen Milver","Peralta","Agua","","Male","6","27","u.jpg","../images-qr-codes/6386c7133911c.png","2022-11-30","False");
INSERT INTO students VALUES("113","104475100001","Jaynard","Gomez","Agua","","Male","6","27","v.jpg","../images-qr-codes/6386c741a166a.png","2022-11-30","False");
INSERT INTO students VALUES("114","104472090004","Joshua","Sobrevilla","Alberto","","Male","6","27","w.jpg","../images-qr-codes/6386c78146413.png","2022-11-30","False");
INSERT INTO students VALUES("115","104481110002","John Bert","Balderama","Anselmo","","Male","6","27","x.jpg","../images-qr-codes/6386c7abc7094.png","2022-11-30","False");
INSERT INTO students VALUES("116","104478110005","Joshua","Bocauto","Antonis","","Male","6","27","y.jpg","../images-qr-codes/6386c7f19941c.png","2022-11-30","False");
INSERT INTO students VALUES("117","104475110009","Apriline Ryeo","Versoza","Fabrigas","","Female","6","27","36.jpg","../images-qr-codes/6386c84061603.png","2022-11-30","False");
INSERT INTO students VALUES("118","105255120075","Ronaline","Tabelisma","Ronquilo","","Female","6","27","37.jpg","../images-qr-codes/6386c8b079b5b.png","2022-11-30","False");
INSERT INTO students VALUES("119","104481110010","Althea","Serrano","Tabelisma","","Female","6","27","38.jpg","../images-qr-codes/6386c8e183679.png","2022-11-30","False");
INSERT INTO students VALUES("120","104467110023","Marjorie","Baldemos","Tobel","","Female","6","27","39.jpg","../images-qr-codes/6386c91fcc03c.png","2022-11-30","False");
INSERT INTO students VALUES("121","104467110024","Rose Joy","Tumacder","Tobel","","Female","6","27","40.jpg","../images-qr-codes/6386c96f796fa.png","2022-11-30","False");
INSERT INTO students VALUES("122","104476110003","Jake ","Bernanrdo","Bautista","","Male","8","29","100.jpg","../images-qr-codes/6386ca72d8e07.png","2022-11-30","False");
INSERT INTO students VALUES("123","104463110003","Aldwin","Ramos","Combis","","Male","8","29","101.jpg","../images-qr-codes/6386caa636bba.png","2022-11-30","False");
INSERT INTO students VALUES("124","104473110025","Benjie","Quiliza","Ventanilla","","Male","8","29","102.jpg","../images-qr-codes/6386cb4436125.png","2022-11-30","False");
INSERT INTO students VALUES("125","104463110014","Mechias","Mina","Villanueva","","Male","8","29","104.jpg","../images-qr-codes/6386cb7f8be9a.png","2022-11-30","False");
INSERT INTO students VALUES("126","104247611000","Angel Faith","Salazar","Ancheta","","Female","8","29","41.jpg","../images-qr-codes/6386cbb8ed90a.png","2022-11-30","False");
INSERT INTO students VALUES("127","104496110007","Michaela","Guerrero","Apilado","","Female","8","29","42.jpg","../images-qr-codes/6386cbed712af.png","2022-11-30","False");
INSERT INTO students VALUES("128","104474110002","Valerie Ann","Manantan","Aquino","","Female","8","29","44.jpg","../images-qr-codes/6386cc215e7fa.png","2022-11-30","False");
INSERT INTO students VALUES("129","104463120007","Jullien","Calligeo","Avance","","Female","8","29","43.jpg","../images-qr-codes/6386cc65c3bff.png","2022-11-30","False");
INSERT INTO students VALUES("130","104469100033","Patricia","Bronola","Cinco","","Female","8","29","45.jpg","../images-qr-codes/6386cc9574d8d.png","2022-11-30","False");
INSERT INTO students VALUES("131","104473100002","Johnny","Larona","Allauigan","","Male","2","19","105.jpg","../images-qr-codes/6386cd45d4d69.png","2022-11-30","False");
INSERT INTO students VALUES("132","104473100007","Van Razel","Libed","Buenconsejo","","Male","2","19","106.jpg","../images-qr-codes/6386cd8146075.png","2022-11-30","False");
INSERT INTO students VALUES("133","104475100034","Drake","Jacoba","Colbongan","Jr","Male","2","19","107.jpg","../images-qr-codes/6386ce167c278.png","2022-11-30","False");
INSERT INTO students VALUES("134","104473100014","Nelsn Nyco","Macanas","Cruz","","Male","2","19","108.jpg","../images-qr-codes/6386ce482d60c.png","2022-11-30","False");
INSERT INTO students VALUES("135","104470100039","John Vincent","Valdez","Drapeza","","Male","2","19","109.jpg","../images-qr-codes/6386ce819eefc.png","2022-11-30","False");
INSERT INTO students VALUES("136","104463100003","Luveleah","Carera","Baniaga","","Female","2","19","46.jpg","../images-qr-codes/6386cebbb947d.png","2022-11-30","False");
INSERT INTO students VALUES("137","104488100010","Jessica","Tablazon","Bihasa","","Female","2","19","47.jpg","../images-qr-codes/6386cf10b49a6.png","2022-11-30","False");
INSERT INTO students VALUES("138","104478100009","Muzdalifah","Campos","Dela Cruz","","Female","2","19","48.jpg","../images-qr-codes/6386cf46ba8ae.png","2022-11-30","False");
INSERT INTO students VALUES("139","106644100004","Ryzelle","Maningding","Drequito","","Female","2","19","49.jpg","../images-qr-codes/6386cf70860fc.png","2022-11-30","False");
INSERT INTO students VALUES("140","104467100021","JN","Bural","Herminigildo","","Female","2","19","50.jpg","../images-qr-codes/6386cf95d5f90.png","2022-11-30","False");
INSERT INTO students VALUES("141","104473100004","Reymon","Noriel","Andrada","","Male","5","25","110.jpg","../images-qr-codes/6386d0e5b204e.png","2022-11-30","False");
INSERT INTO students VALUES("142","104467100008","Joshua","Tangson","Cabasal","","Male","5","25","111.jpg","../images-qr-codes/6386d1228532c.png","2022-11-30","False");
INSERT INTO students VALUES("143","104470100025","Marco Sebastian","Baturi","Canasa","","Male","5","25","112.jpg","../images-qr-codes/6386d14f24224.png","2022-11-30","False");
INSERT INTO students VALUES("144","104423130137","Jericho","Rita","Deloa","","Male","5","25","113.jpg","../images-qr-codes/6386d17cce747.png","2022-11-30","False");
INSERT INTO students VALUES("145","109406100159","Mark Joseph","Ingote","Hilig","","Male","5","25","114.jpg","../images-qr-codes/6386d1c7157d0.png","2022-11-30","False");
INSERT INTO students VALUES("146","104482100001","Sofia Joy","Mercado","Alapane","","Female","5","25","51.jpg","../images-qr-codes/6386d1ff9e4b2.png","2022-11-30","False");
INSERT INTO students VALUES("147","104476100001","Hayden Valerie","Glodobe","Bernardo","","Female","5","25","52.jpg","../images-qr-codes/6386d2385402e.png","2022-11-30","False");
INSERT INTO students VALUES("148","104481090003","Christine Jane","Manaois","Cesar","","Female","5","25","53.jpg","../images-qr-codes/6386d26a97a97.png","2022-11-30","False");
INSERT INTO students VALUES("149","104480100011","Piah","Dulatre","Estoque","","Female","5","25","54.jpg","../images-qr-codes/6386d29acf0f1.png","2022-11-30","False");
INSERT INTO students VALUES("150","104478100010","Rose Anne","Soria","Europa","","Female","5","25","55.jpg","../images-qr-codes/6386d2cb9e95b.png","2022-11-30","False");
INSERT INTO students VALUES("151","104467100009","Saturno","Amansec","Cabat","Jr","Male","5","26","115.jpg","../images-qr-codes/6386d35a44b96.png","2022-11-30","False");
INSERT INTO students VALUES("152","104482100015","Bernardo","Reyes","Dimaandal","Jr","Male","5","26","116.jpg","../images-qr-codes/6386d3ad3af04.png","2022-11-30","False");
INSERT INTO students VALUES("153","104482090010","Lian Zyrus","Riano","Espiritu","","Male","5","26","117.jpg","../images-qr-codes/6386d3e050acd.png","2022-11-30","False");
INSERT INTO students VALUES("154","104488100019","Kurt Rovic ","Nicer","Estoista","","Male","5","26","118.jpg","../images-qr-codes/6386d441bfb18.png","2022-11-30","False");
INSERT INTO students VALUES("155","120485080020","Wilson","Antao","Estrologo","","Male","5","26","119.jpg","../images-qr-codes/6386d47966598.png","2022-11-30","False");
INSERT INTO students VALUES("156","104471100003","Kristine","Ogean","Alegre","","Female","5","26","56.jpg","../images-qr-codes/6386d4bc82d46.png","2022-11-30","False");
INSERT INTO students VALUES("157","104470100012","Angelica","Sanchez","Ariola","","Female","5","26","57.jpg","../images-qr-codes/6386d4eb38ec8.png","2022-11-30","False");
INSERT INTO students VALUES("158","104482100002","Blesie Mae","Madrinian","Batoon","","Female","5","26","58.jpg","../images-qr-codes/6386d520aa01f.png","2022-11-30","False");
INSERT INTO students VALUES("159","104470100027","Jonalyn","Cuaresma","Chua","","Female","5","26","59.jpg","../images-qr-codes/6386d566c104d.png","2022-11-30","False");
INSERT INTO students VALUES("160","104471100020","Vangie Claire ","Somera","Garcia","","Female","5","26","60.jpg","../images-qr-codes/6386d75b9d7f3.png","2022-11-30","False");
INSERT INTO students VALUES("161","104510100023","Gyller Jemz","Subad","Saberola","","Male","7","28","120.jpg","../images-qr-codes/6386d8a7b42f1.png","2022-11-30","False");
INSERT INTO students VALUES("162","104482100003","Lady Mae","Madrinian","Batoon","","Female","7","28","61.jpg","../images-qr-codes/6386d8ef6840a.png","2022-11-30","False");
INSERT INTO students VALUES("163","104510070012","Catherine ","Subad","Padilla","","Female","7","28","62.jpg","../images-qr-codes/6386d91c05ebd.png","2022-11-30","False");
INSERT INTO students VALUES("164","104469100126","Ashley","Versoza","Rimorin","","Female","7","28","63.jpg","../images-qr-codes/6386d958d0902.png","2022-11-30","False");
INSERT INTO students VALUES("165","104468100018","Maria Luisa","Fabrigas","Suyat","","Female","7","28","64.jpg","../images-qr-codes/6386d9895ece9.png","2022-11-30","False");
INSERT INTO students VALUES("166","104463090004","Alex","Ramos","Combis","","Male","9","30","126.jpg","../images-qr-codes/6386da135cf66.png","2022-11-30","False");
INSERT INTO students VALUES("167","104470090042","Ranie","Manglapus","Drapeza","","Male","9","30","127.jpg","../images-qr-codes/6386da3cb364d.png","2022-11-30","False");
INSERT INTO students VALUES("168","104480100014","Joross","Umayan","Lumahan","","Male","9","30","128.jpg","../images-qr-codes/6386da7600f07.png","2022-11-30","False");
INSERT INTO students VALUES("169","104480100019","Vincent Mark","De Guzman","Montefalco","","Male","9","30","129.jpg","../images-qr-codes/6386daaf3cfb9.png","2022-11-30","False");
INSERT INTO students VALUES("170","104463090008","Charlie","Drapeza","Peralta","","Male","9","30","130.jpg","../images-qr-codes/6386dae26d444.png","2022-11-30","False");
INSERT INTO students VALUES("171","104480100009","Florence ","Manzanillo","Decano","","Female","9","30","66.jpg","../images-qr-codes/6386db12252da.png","2022-11-30","False");
INSERT INTO students VALUES("172","104472120036","Laica","Rodriguez","Mamugay","","Female","9","30","67.jpg","../images-qr-codes/6386db530fbee.png","2022-11-30","False");
INSERT INTO students VALUES("173","104478100002","Jonard","N","Bernardo","","Male","5","24","131.jpg","../images-qr-codes/6386f35904ed5.png","2022-11-30","False");
INSERT INTO students VALUES("174","104480100007","Gregson Li","Q","Castro","","Male","5","24","132.jpg","../images-qr-codes/6386f3e80a716.png","2022-11-30","False");
INSERT INTO students VALUES("175","104478090028","Laurence","E","Libed","","Male","5","24","133.jpg","../images-qr-codes/6386f457c8765.png","2022-11-30","False");
INSERT INTO students VALUES("176","104482100034","Jhonel","L","Sabatin","","Male","5","24","134.jpg","../images-qr-codes/6386f49fa4277.png","2022-11-30","False");
INSERT INTO students VALUES("177","104463090114","Orlan","P","Vidal","","Male","5","24","135.jpg","../images-qr-codes/6386f4d261882.png","2022-11-30","False");
INSERT INTO students VALUES("178","104480100001","Bea Vianca","P","Amansec","","Female","5","24","71.jpg","../images-qr-codes/6386f513e03d9.png","2022-11-30","False");
INSERT INTO students VALUES("179","104493100007","Zhamelle","Mallare","Beltran","","Female","5","24","72.jpg","../images-qr-codes/6386f54de8dfc.png","2022-11-30","False");
INSERT INTO students VALUES("180","104481100001","Khyrl","I","Abalos","","Female","5","24","73.jpg","../images-qr-codes/6386f58e9ca39.png","2022-11-30","False");
INSERT INTO students VALUES("181","104478100015","Ivy","A","Libed","","Female","5","24","74.jpg","../images-qr-codes/6386f5cc578c5.png","2022-11-30","False");
INSERT INTO students VALUES("182","104480100010","Jayma Rose Alphia","A","Estoque","","Female","5","24","75.jpg","../images-qr-codes/6386f61f598e2.png","2022-11-30","False");
INSERT INTO students VALUES("183","11111111111111111","Erwin","Cabag","Son","","Male","3","34","Screenshot (233).png","../images-qr-codes/63871fa5b0f26.png","2022-11-30","False");
INSERT INTO students VALUES("184","222332323223","Sample","Sample","Sample","","Female","3","34","316871853_513245900751036_1394436737231326868_n.jpg","../images-qr-codes/638979952e681.png","2022-12-02","False");



DROP TABLE subject;

CREATE TABLE `subject` (
  `subject_Id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_grade_Id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  PRIMARY KEY (`subject_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

INSERT INTO subject VALUES("2","2","(P.E)-Physical Education");
INSERT INTO subject VALUES("4","2","(21st )-21st Century Literature");
INSERT INTO subject VALUES("6","2","(Gen Bio 2)- General Biology 2");
INSERT INTO subject VALUES("8","2","(PR 2) –Practical Research 2");
INSERT INTO subject VALUES("10","2","(FPL)Filipino sa Piling Larang");
INSERT INTO subject VALUES("12","2","(Gen Physics 1)-General Physics 1 ");
INSERT INTO subject VALUES("14","2","(Entrep)Entrepreneurship");
INSERT INTO subject VALUES("16","2","(UCSP)Understanding Culture Society and Politics");
INSERT INTO subject VALUES("17","3","General Chemistry 1");
INSERT INTO subject VALUES("18","3","Oral communication");
INSERT INTO subject VALUES("19","3","(EAPP) English Academic AND Professional Purpose");
INSERT INTO subject VALUES("20","3","Physical Education");
INSERT INTO subject VALUES("21","3","Komunikasyon");
INSERT INTO subject VALUES("22","3","(IPhP)-Introduction to the Philosophy of the Human Person");
INSERT INTO subject VALUES("23","3","Precalculus");
INSERT INTO subject VALUES("24","3","General mathematics");
INSERT INTO subject VALUES("25","3","(E-TECH) Empowerment Technologies");
INSERT INTO subject VALUES("26","3","Earth Science");
INSERT INTO subject VALUES("27","5","(P.E)-Physical Education");
INSERT INTO subject VALUES("28","5","(PR 2) –Practical Research 2");
INSERT INTO subject VALUES("29","5","(Entrep)Entrepreneurship");
INSERT INTO subject VALUES("30","5","(IPhP)-Introduction to the Philosophy of the Human Person");
INSERT INTO subject VALUES("31","5","(MIL) Media  Information Literacy");
INSERT INTO subject VALUES("32","5","(PS)-Physical science");
INSERT INTO subject VALUES("33","5","(CNF)-Creative Non Fiction");
INSERT INTO subject VALUES("34","5","(DIASS)-Discipline in Applied Social Science");
INSERT INTO subject VALUES("35","5","(FPL)Filipino sa Piling Larang");
INSERT INTO subject VALUES("36","4","(P.E)-Physical Education");
INSERT INTO subject VALUES("37","4","Komunikasyon");
INSERT INTO subject VALUES("38","4","(21st )-21st Century Literature");
INSERT INTO subject VALUES("39","4","Philippine Politics");
INSERT INTO subject VALUES("40","4","Oral communication");
INSERT INTO subject VALUES("41","4","(EAPP) English Academic AND Professional Purpose");
INSERT INTO subject VALUES("42","4","(IWRBS)-Introduction to World Religions and Belief System");
INSERT INTO subject VALUES("43","4","(GenMath)-General Mathematics");
INSERT INTO subject VALUES("44","4","Personal Development");
INSERT INTO subject VALUES("45","6","Oral communication");
INSERT INTO subject VALUES("46","6","(EAPP) English Academic AND Professional Purpose");
INSERT INTO subject VALUES("47","6","(P.E)-Physical Education");
INSERT INTO subject VALUES("48","6","Komunikasyon");
INSERT INTO subject VALUES("49","6","(21st )-21st Century Literature");
INSERT INTO subject VALUES("50","6","(GenMath)-General Mathematics");
INSERT INTO subject VALUES("51","6","Personal Development");
INSERT INTO subject VALUES("52","6","Landscape Installation");
INSERT INTO subject VALUES("53","8","Oral communication");
INSERT INTO subject VALUES("54","8","(EAPP) English Academic AND Professional Purpose");
INSERT INTO subject VALUES("55","8","(P.E)-Physical Education");
INSERT INTO subject VALUES("56","8","Komunikasyon");
INSERT INTO subject VALUES("57","8","(21st )-21st Century Literature");
INSERT INTO subject VALUES("58","8","(GenMath)-General Mathematics");
INSERT INTO subject VALUES("59","8","Personal Development");
INSERT INTO subject VALUES("60","8","Hairdressing");
INSERT INTO subject VALUES("61","7","(P.E)-Physical Education");
INSERT INTO subject VALUES("62","7","(MIL) Media  Information Literacy");
INSERT INTO subject VALUES("63","7","(PR 2) –Practical Research 2");
INSERT INTO subject VALUES("64","7","(FPL)Filipino sa Piling Larang");
INSERT INTO subject VALUES("65","7","(PS)-Physical science");
INSERT INTO subject VALUES("66","7","(Entrep)Entrepreneurship");
INSERT INTO subject VALUES("67","7","Organic Agriculture");
INSERT INTO subject VALUES("68","7","(IPhP)-Introduction to the Philosophy of the Human Person");
INSERT INTO subject VALUES("69","9","(P.E)-Physical Education");
INSERT INTO subject VALUES("70","9","(PR 2) –Practical Research 2");
INSERT INTO subject VALUES("71","9","(MIL) Media  Information Literacy");
INSERT INTO subject VALUES("72","9","(FPL)Filipino sa Piling Larang");
INSERT INTO subject VALUES("73","9","(PS)-Physical science");
INSERT INTO subject VALUES("74","9","(Entrep)Entrepreneurship");
INSERT INTO subject VALUES("75","9","(IPhP)-Introduction to the Philosophy of the Human Person");
INSERT INTO subject VALUES("76","9","Barbering");



DROP TABLE users;

CREATE TABLE `users` (
  `user_Id` int(11) NOT NULL AUTO_INCREMENT,
  `ID_number` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_registered` date NOT NULL,
  `verification_code` varchar(255) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'User',
  `DELETED` varchar(25) NOT NULL DEFAULT 'False',
  PRIMARY KEY (`user_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4;

INSERT INTO users VALUES("40","Confirmed","Joshua","Bibat","Picart","","Male","2001-08-18","21","Malasin, Maria Aurora, Aurora","admin@gmail.com","9197275388","0192023a7bbd73250516f069df18b500","4297150.jpg","2022-09-10","406316","Admin","False");
INSERT INTO users VALUES("45","Pending","Michelle","Beltran","Fernandez","","Female","2001-04-15","21","Salay, Dipaculao, Aurora","michellefernandezgc@gmail.com","9071512347","0192023a7bbd73250516f069df18b500","307462731_485607496907481_897823672575987182_n.jpg","2022-10-22","","Admin","False");
INSERT INTO users VALUES("53","","Jean Rose","Mostoles","Gatchalian","","Female","2000-09-24","22","Laboy, Dipaculao, Aurora","jhenrosegatchalian@gmail.com","9165309528","6519bb71174fae1da7b7e802f8753044","304833810_1150120315638479_1199753740288469396_n.jpg","2022-11-30","","Admin","False");
INSERT INTO users VALUES("54","12365443","Maria Liza","Garcia","Fernandez","","Female","1990-08-21","33","Maligaya, Dipaculao, Aurora","fernandezmarializa@gmail.com","9444121210","97239440664498575e298a850c5a7b35","300562752_5304109156292584_1183111805701222121_n.jpg","2022-11-30","","User","False");
INSERT INTO users VALUES("55","","Cyrene","Oliveria","Nad","","Female","2000-11-20","22","Mucdol, Dipaculao, Aurora","cyrenenad20@gmail.com","9513388757","ee5623475605414ded3f4eeba8338538","310628292_1809309676080448_5286206293332377318_n.jpg","2022-11-30","","Admin","False");
INSERT INTO users VALUES("56","300693001","Anacleto ","Ricarte","Macayan","Jr","Male","1990-04-07","33","Wenceslao, Maria Aurora, Aurora","anacletojr.macayan@gmail.com","9382417533","f1ac76f47d1af11b470fa32279863786","macayan.jpg","2022-11-30","","User","False");
INSERT INTO users VALUES("57","300693002","Jeannette ","Nacino","Nad","","Female","1967-11-23","55","Poblacion 02, Maria Aurora, Aurora","jeannette.nad001@gmail.com","9503992538","c530c390c509fc7df9e5ea8f0b22b023","315519353_510903197765789_9125678371092741992_n.jpg","2022-11-30","","User","False");
INSERT INTO users VALUES("58","300693003","Jerry","Villaruz","Pido","","Male","1974-12-12","47","Reserva,Baler, Aurora","jerry.pido001@gmail.com","9171270389","a95e20513569a7daa7c94bdce5b69296","Pido.jpg","2022-11-30","","User","False");
INSERT INTO users VALUES("59","1232123","Sample","Sample","Sample","","Male","2020-06-09","23","Sample","sampleSample@gmail.com","9359428963","0192023a7bbd73250516f069df18b500","316871853_513245900751036_1394436737231326868_n.jpg","2022-12-02","","User","False");



