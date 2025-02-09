

CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO admins VALUES("1","ABDUL WASAY","wasay@gamil.com","admin","admin");
INSERT INTO admins VALUES("2","wasay","admin@gmail.com","admin","admin");



CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO categories VALUES("2","Haematology");
INSERT INTO categories VALUES("3","Microbiology");
INSERT INTO categories VALUES("4","Clinical Pathology");
INSERT INTO categories VALUES("5","Serology");
INSERT INTO categories VALUES("6","Virology");
INSERT INTO categories VALUES("7","Immunology");
INSERT INTO categories VALUES("8","Histopathology");
INSERT INTO categories VALUES("9","Endocrinology");
INSERT INTO categories VALUES("10","Tumour Marker");
INSERT INTO categories VALUES("11","Chemistry");
INSERT INTO categories VALUES("12","BIO CHEMISTRY");
INSERT INTO categories VALUES("13","Special chemistry");
INSERT INTO categories VALUES("14","SERUM ELECTROLYES");
INSERT INTO categories VALUES("15","MYCOLOGY");
INSERT INTO categories VALUES("16","Bacteriology");
INSERT INTO categories VALUES("17"," ");



CREATE TABLE `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `email` varchar(60) NOT NULL,
  `reg_no` varchar(50) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `reg_no` (`reg_no`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO company VALUES("1","13","Bismillah Lab","03467998485","www.instagram/awposterdesigners.com","wasay@gmail.com","895-567-344-553-334-545","Abdul Wasy","fresh","Masood Market Street # 5 Shop 8 Dera Ismail Khan");
INSERT INTO company VALUES("2","17","asdf","asdf","www.example.com","user@gmail.com","123-123-123-123-123","asdf","1-5","Dera Ismail Khan");



CREATE TABLE `doctorpayment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO doctorpayment VALUES("1","2025-01-21","-1","86","Doctor Payment");
INSERT INTO doctorpayment VALUES("2","2025-01-21","-1","108","Doctor Payment");



CREATE TABLE `doctors` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_name` varchar(255) NOT NULL,
  `d_phone` varchar(15) NOT NULL,
  `d_address` text NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO doctors VALUES("1","Asif","000000000","Dera Ismail Khan","13");
INSERT INTO doctors VALUES("3","wasay khan","11111212121","Dera Ismail Khan","0");
INSERT INTO doctors VALUES("4","New Test Doc","11111212121","Dera Ismail Khan","13");



CREATE TABLE `expense` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO expense VALUES("1","14","200","2025-01-26","Rent");



CREATE TABLE `patient_test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO patient_test VALUES("25","18","8","1");
INSERT INTO patient_test VALUES("26","19","92","1");
INSERT INTO patient_test VALUES("27","20","7","1");
INSERT INTO patient_test VALUES("28","20","79","1");
INSERT INTO patient_test VALUES("29","25","92","0");
INSERT INTO patient_test VALUES("30","26","23","1");
INSERT INTO patient_test VALUES("31","26","92","1");
INSERT INTO patient_test VALUES("32","26","1","1");
INSERT INTO patient_test VALUES("33","27","26","1");
INSERT INTO patient_test VALUES("34","27","20","1");
INSERT INTO patient_test VALUES("35","28","45","0");
INSERT INTO patient_test VALUES("36","28","37","0");
INSERT INTO patient_test VALUES("37","28","90","0");



CREATE TABLE `patients` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(255) NOT NULL,
  `p_phone` varchar(15) NOT NULL,
  `p_age` varchar(5) NOT NULL,
  `p_sex` varchar(10) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `p_status` int(11) NOT NULL,
  `p_charges` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `p_cnic` varchar(13) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`p_id`),
  KEY `doctor_id` (`doctor_id`),
  CONSTRAINT `patients_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`d_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO patients VALUES("18","wasay khan","11111212121","23","male","1","1","100","13","1210111966165","2025-01-21 12:38:32");
INSERT INTO patients VALUES("19","New Test Patient","1234567890","23","male","1","0","500","13","1210111966165","2025-01-21 15:46:51");
INSERT INTO patients VALUES("20","Dr.Irhan Khan","11111212121","12","male","1","1","600","13","1210111966165","2025-01-26 15:42:05");
INSERT INTO patients VALUES("21","Waleed umer","09876655432","34","male","3","0","200","13","1210974","2025-01-25 15:45:47");
INSERT INTO patients VALUES("22","Haider","09877653424","32","male","1","0","1500","13","1210198767779","2025-01-24 11:45:47");
INSERT INTO patients VALUES("23","new with date","09876655432","34","male","1","0","200","13","1210974","2024-12-05 18:07:22");
INSERT INTO patients VALUES("24","date user","09877653424","32","male","1","0","1500","13","1210198767779","2024-11-01 18:07:22");
INSERT INTO patients VALUES("25","imran","11111212121","12","male","1","0","500","13","1210111966165","2025-01-26 18:32:53");
INSERT INTO patients VALUES("26","Test Patient","0300000000","90","female","1","1","1000","13","1210111966165","2025-01-28 13:47:01");
INSERT INTO patients VALUES("27","new test","11111212121","12","female","1","0","200","13","1210111966165","2025-01-28 19:13:54");
INSERT INTO patients VALUES("28","test patient","3439187576","24","male","1","0","900","13","1210111966165","2025-02-04 09:59:23");



CREATE TABLE `saverecords` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trid` int(11) NOT NULL,
  `subid` int(11) NOT NULL,
  `result` varchar(255) NOT NULL DEFAULT 'blank_field_with_database',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO saverecords VALUES("1","2","25","7");
INSERT INTO saverecords VALUES("2","3","58","huihu");
INSERT INTO saverecords VALUES("3","4","150","67");
INSERT INTO saverecords VALUES("4","1","173","34");
INSERT INTO saverecords VALUES("5","1","174","34");
INSERT INTO saverecords VALUES("6","1","175","34");
INSERT INTO saverecords VALUES("7","1","176","34");
INSERT INTO saverecords VALUES("8","1","177","34");
INSERT INTO saverecords VALUES("9","1","178","34");
INSERT INTO saverecords VALUES("10","1","179","34");
INSERT INTO saverecords VALUES("11","1","180","34");
INSERT INTO saverecords VALUES("12","1","181","");
INSERT INTO saverecords VALUES("13","1","182","34");
INSERT INTO saverecords VALUES("14","1","183","34");
INSERT INTO saverecords VALUES("15","1","184","34");
INSERT INTO saverecords VALUES("16","1","185","34");
INSERT INTO saverecords VALUES("17","1","186","34");
INSERT INTO saverecords VALUES("18","10","49","lkajdf");
INSERT INTO saverecords VALUES("19","9","62","asdfsadf");
INSERT INTO saverecords VALUES("20","25","27","3.2");
INSERT INTO saverecords VALUES("21","27","26","2");
INSERT INTO saverecords VALUES("22","28","151","3.4");
INSERT INTO saverecords VALUES("23","28","152","5.8");
INSERT INTO saverecords VALUES("24","28","153","9.8");
INSERT INTO saverecords VALUES("25","30","53","Positive");
INSERT INTO saverecords VALUES("26","31","173","12");
INSERT INTO saverecords VALUES("27","31","174","12");
INSERT INTO saverecords VALUES("28","31","175","12");
INSERT INTO saverecords VALUES("29","31","176","12");
INSERT INTO saverecords VALUES("30","31","177","12");
INSERT INTO saverecords VALUES("31","31","178","12");
INSERT INTO saverecords VALUES("32","31","179","12");
INSERT INTO saverecords VALUES("33","31","180","12");
INSERT INTO saverecords VALUES("34","31","181","");
INSERT INTO saverecords VALUES("35","31","182","12");
INSERT INTO saverecords VALUES("36","31","183","12");
INSERT INTO saverecords VALUES("37","31","184","12");
INSERT INTO saverecords VALUES("38","31","185","12");
INSERT INTO saverecords VALUES("39","31","186","12");
INSERT INTO saverecords VALUES("40","32","1","");
INSERT INTO saverecords VALUES("41","32","2","Yellow");
INSERT INTO saverecords VALUES("42","32","3","Positive");
INSERT INTO saverecords VALUES("43","32","4","12");
INSERT INTO saverecords VALUES("44","32","5","Non");
INSERT INTO saverecords VALUES("45","32","6","Positive");
INSERT INTO saverecords VALUES("46","32","7","Positive");
INSERT INTO saverecords VALUES("47","32","8","");
INSERT INTO saverecords VALUES("48","32","9","Positive");
INSERT INTO saverecords VALUES("49","32","10","Positive");
INSERT INTO saverecords VALUES("50","32","11","Positive");
INSERT INTO saverecords VALUES("51","32","12","Positive");
INSERT INTO saverecords VALUES("52","32","13","Positive");
INSERT INTO saverecords VALUES("53","32","14","Positive");
INSERT INTO saverecords VALUES("54","32","15","Positive");
INSERT INTO saverecords VALUES("55","32","16","");
INSERT INTO saverecords VALUES("56","32","17","Positive");
INSERT INTO saverecords VALUES("57","32","18","Positive");
INSERT INTO saverecords VALUES("58","32","19","Positive");
INSERT INTO saverecords VALUES("59","32","20","Positive");
INSERT INTO saverecords VALUES("60","26","173","12");
INSERT INTO saverecords VALUES("61","26","174","12");
INSERT INTO saverecords VALUES("62","26","175","12");
INSERT INTO saverecords VALUES("63","26","176","12");
INSERT INTO saverecords VALUES("64","26","177","12");
INSERT INTO saverecords VALUES("65","26","178","12");
INSERT INTO saverecords VALUES("66","26","179","12");
INSERT INTO saverecords VALUES("67","26","180","12");
INSERT INTO saverecords VALUES("68","26","181","");
INSERT INTO saverecords VALUES("69","26","182","12");
INSERT INTO saverecords VALUES("70","26","183","12");
INSERT INTO saverecords VALUES("71","26","184","12");
INSERT INTO saverecords VALUES("72","26","185","12");
INSERT INTO saverecords VALUES("73","26","186","12");
INSERT INTO saverecords VALUES("74","33","56","450");
INSERT INTO saverecords VALUES("75","34","49","110");



CREATE TABLE `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `designation` varchar(244) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO staff VALUES("3","wasay khan","wasayitdik@gmail.com","12","Dera Ismail Khan","11111212121","13","doctor");



CREATE TABLE `subtest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tid` int(11) NOT NULL,
  `sub_name` varchar(255) NOT NULL,
  `refrange` text NOT NULL,
  `low` int(11) DEFAULT NULL,
  `high` int(11) DEFAULT NULL,
  `unit` varchar(100) NOT NULL,
  `other` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=233 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO subtest VALUES("1","1","Physical Examination","head","0","0","","");
INSERT INTO subtest VALUES("2","1","Colour","","0","0","","");
INSERT INTO subtest VALUES("3","1","Volume","","0","0","","");
INSERT INTO subtest VALUES("4","1","pH","","0","0","","");
INSERT INTO subtest VALUES("5","1","Sugar","","0","0","","");
INSERT INTO subtest VALUES("6","1","Albumin","","0","0","","");
INSERT INTO subtest VALUES("7","1","BS & BP","","0","0","","");
INSERT INTO subtest VALUES("8","1","Microscopic Examination","head","0","0","","");
INSERT INTO subtest VALUES("9","1","Pus cell","","0","0","/HPF","");
INSERT INTO subtest VALUES("10","1","Cal.oxalat","","0","0","/HPF","");
INSERT INTO subtest VALUES("11","1","RBC","","0","0","/HPF","");
INSERT INTO subtest VALUES("12","1","A. Urates","","0","0","/HPF","");
INSERT INTO subtest VALUES("13","1","Epith Cell","","0","0","/HPF","");
INSERT INTO subtest VALUES("14","1","Micro organism","","0","0","/HPF","");
INSERT INTO subtest VALUES("15","1","Other","","0","0","/HPF","");
INSERT INTO subtest VALUES("16","1","CASTS","head","0","0","","");
INSERT INTO subtest VALUES("17","1","Granular Cast","","0","0","/HPF","");
INSERT INTO subtest VALUES("18","1","Hyaline Cast","","0","0","/HPF","");
INSERT INTO subtest VALUES("19","1","WBC Cast","","0","0","/HPF","");
INSERT INTO subtest VALUES("20","1","RBC  Cast","","0","0","/HPF","");
INSERT INTO subtest VALUES("21","2","ALBUMIN","3.5_____5.5","4","6","mg/dl","");
INSERT INTO subtest VALUES("22","3","C.P.K","UPTO_____195","0","195","U/l","");
INSERT INTO subtest VALUES("23","4","CA 125","UPTO_____35","0","35","U/mL","");
INSERT INTO subtest VALUES("24","5","TestoSterone","2.00_____8.00","2","8","ng/ml","");
INSERT INTO subtest VALUES("25","6","S.Total Proteins","6.0_____8.0","6","8","g/dl","");
INSERT INTO subtest VALUES("26","7","S.Albumin","3.5_____5.5","4","6","g/dl","");
INSERT INTO subtest VALUES("27","8","S.Glubulin","2.0_____3.5","2","4","g/dl","");
INSERT INTO subtest VALUES("28","9","HBsAg","","0","0","","(by Immunochrometic Method )");
INSERT INTO subtest VALUES("29","9","HBsAb","","0","0","","(by Immunochrometic Method )");
INSERT INTO subtest VALUES("30","9","HBeAg","","0","0","","(by Immunochrometic Method )");
INSERT INTO subtest VALUES("31","9","HBeAb","","0","0","","(by Immunochrometic Method )");
INSERT INTO subtest VALUES("32","9","HBcAb","","0","0","","(by Immunochrometic Method )");
INSERT INTO subtest VALUES("33","10","S.ALT/SGPT","10_____40","10","40","U/l","");
INSERT INTO subtest VALUES("34","11","S.AMYLASE","10_____125","10","125","U/l","");
INSERT INTO subtest VALUES("35","12","AST","10_____40","10","40","U/l","");
INSERT INTO subtest VALUES("36","13","B-HCG","Non Pregnant: < 5.0 <br>
3     Weeks  5-50<br>
4     Weeks  5-426<br>
5     Weeks  18-7,340<br>
6     Weeks  1,080-56,500<br>
7-8   Weeks  7,650-229,000<br>
9-12  Weeks  25,700-288,000<br>
13-16 Weeks 13,300-254,000<br>
17-24 Weeks 40,060-165,400<br>
25-40 Weeks 3,640-117,000<br>","5","117","mIU/ml","");
INSERT INTO subtest VALUES("37","14","DENGUE","head","0","0","","");
INSERT INTO subtest VALUES("38","14","IgG","","0","0","","");
INSERT INTO subtest VALUES("39","14","IgM","","0","0","","");
INSERT INTO subtest VALUES("40","14","DENGUE NS1","","0","0","","(by Immunochrometic Method )");
INSERT INTO subtest VALUES("41","15","Na (sodium)","136_____145","136","145","mmol/L","");
INSERT INTO subtest VALUES("42","15","K  (Potassium)","3.5_____5.5","4","6","mmol/L","");
INSERT INTO subtest VALUES("43","15","Cl (chloride)","96_____108","96","108","mmol/L","");
INSERT INTO subtest VALUES("44","16","GLUCOSE (F)","50_____115","50","115","mg/dl","");
INSERT INTO subtest VALUES("45","17","BLOOD GROUP","","0","0","","");
INSERT INTO subtest VALUES("46","17","RH FACTOR","","0","0","","");
INSERT INTO subtest VALUES("47","18","Haemoglobin","(M) 12.5_____18.0<br>
(F) 11.5_____16.5<br>","13","17","g/dl","");
INSERT INTO subtest VALUES("48","19","TLC(WBC)","4,000_____11,000","4","11","c/mm","");
INSERT INTO subtest VALUES("49","20","GLUCOSE (R)","65_____170","65","170","mg/dl","");
INSERT INTO subtest VALUES("50","21","IgG","","0","0","","");
INSERT INTO subtest VALUES("51","21","IgM","","0","0","","");
INSERT INTO subtest VALUES("52","22","GLYCATED HEMOGLOBIN (HbA1c)","Normal:                        5.5 - 6.5% <br>
GOOD CONTROL:        5.5 – 6.7%<br>
FAIR CONTROL:          6.8 – 7.7% <br>
POOR CONTROL:         > 7.7%<br>","6","8","%","");
INSERT INTO subtest VALUES("53","23","HBsAg","","0","0","","(by Immunochrometic Method )");
INSERT INTO subtest VALUES("54","24","HCV Ab","","0","0","","(by Immunochrometic Method )");
INSERT INTO subtest VALUES("55","25","HIV","","0","0","","(by Immunochrometic Method )");
INSERT INTO subtest VALUES("56","26","LDH","Upto_____480","0","480","U/1","");
INSERT INTO subtest VALUES("57","27","VDRL","","0","0","","(by Immunochrometic Method )");
INSERT INTO subtest VALUES("58","28","ICT.T.B","","0","0","","(by Immunochrometic Method )");
INSERT INTO subtest VALUES("59","29","Pv","","0","0","","");
INSERT INTO subtest VALUES("60","29","Pf","","0","0","","");
INSERT INTO subtest VALUES("61","30","MP","","0","0","","");
INSERT INTO subtest VALUES("62","31","URINE FOR PREGNANCY ","","0","0","","");
INSERT INTO subtest VALUES("63","32","R.A.Factor","Negative < 20<br>
Positive > 20<br>","20","40","IU/ml","");
INSERT INTO subtest VALUES("64","33","Neutrophil","40_____75","40","75","%","");
INSERT INTO subtest VALUES("65","33","Lymphocyte","20_____40","20","40","%","");
INSERT INTO subtest VALUES("66","33","Monocyte","01_____09","1","9","%","");
INSERT INTO subtest VALUES("67","33","Eosinophil","01_____05","1","5","%","");
INSERT INTO subtest VALUES("68","34","VITAMIN D3","Deficiency :< 10.00<br>
Insufficiency:10-30<br>
Sufficiency:30-100<br>","10","100","ng/ml","");
INSERT INTO subtest VALUES("69","35","S.ALT/SGPT","10_____40","10","40","U/l","");
INSERT INTO subtest VALUES("70","35","Alk.Phosphatase","(Adult) Upto___303 <br>
(Child) Upto___360 <br>","0","360","U/l","");
INSERT INTO subtest VALUES("71","35","BILIRUBIN (Total)","0.1_____1.2","0","1","mg/dl","");
INSERT INTO subtest VALUES("72","36","BILIRUBIN (Total)","0.1_____1.2","0","1","mg/dl","");
INSERT INTO subtest VALUES("73","36","Bilirubin Direct","0.0_____0.25","0","0","mg/dl","");
INSERT INTO subtest VALUES("74","36","Bilirubin Indirect","0.05_____0.75","0","1","mg/dl","");
INSERT INTO subtest VALUES("75","37","ALPHA FETOPROTEIN","<10.9","0","11","ng/ml","");
INSERT INTO subtest VALUES("76","38","D-DIMER","Negative < 500<br>
Positive > 500<br>","0","500","ng/mL","");
INSERT INTO subtest VALUES("77","39","Ferritin","(M) 30______350<br>
(F) 20______250<br>","20","350","ng/mL","");
INSERT INTO subtest VALUES("78","40","Free T4","8.9_____17.2","9","17","pg/mL","");
INSERT INTO subtest VALUES("79","41","Bleeding Time","2:30_____5:30","2","5","Minute","");
INSERT INTO subtest VALUES("80","42","Clotting Time","5_____11","5","11","Minute","");
INSERT INTO subtest VALUES("81","43","Brucella","head","0","0","","");
INSERT INTO subtest VALUES("82","43","Abortus","","0","0","","");
INSERT INTO subtest VALUES("83","43","Melitensis","","0","0","","");
INSERT INTO subtest VALUES("84","43","Result","","0","0","","");
INSERT INTO subtest VALUES("85","44","ASO Titer","<200","0","200","IU/ML","");
INSERT INTO subtest VALUES("86","44","TITER","<200","0","200","IU/ML","");
INSERT INTO subtest VALUES("87","45","RA Factor","<8","0","8","IU/ML","");
INSERT INTO subtest VALUES("88","45","TITER","<8","0","8","IU/ML","");
INSERT INTO subtest VALUES("89","46","C.R.P","<6","0","6","mg/l","");
INSERT INTO subtest VALUES("90","46","TITER","<6","0","6","mg/l","");
INSERT INTO subtest VALUES("91","47","S.URIC ACID","(M) 3.0______7.0 <br>
(F) 2.5______6.0 <br>","3","7","mg/dl","");
INSERT INTO subtest VALUES("92","48","RAF QN","Cutoff Value for Negative:  < 20 <br>
Cutoff Value for Positive: > 20 <br>","0","0","IU/ml","");
INSERT INTO subtest VALUES("93","48","Patient Value","","0","0","","");
INSERT INTO subtest VALUES("94","49","ASO (QUANTITATIVE)","Cutoff Value for Negative : < 200 <br>
Cutoff Value for Positive : > 200 <br>","0","0","IU/ml","");
INSERT INTO subtest VALUES("95","49","Patient Value","","0","0","","");
INSERT INTO subtest VALUES("96","50","HCV by ELISA","Cutoff Value for Negative : <0.90 <br>
Cutoff Value for Indeterminate:0.90,<1.0 <br>
Cutoff Value for Positive: >1.00 <br>","1","1","","");
INSERT INTO subtest VALUES("97","50","Result","","1","1","","");
INSERT INTO subtest VALUES("98","51","HBsAg by ELISA","Cutoff Value for Negative: <0.90 <br>
Cutoff Value for Indeterminate: 0.90,<1.0 <br>
Cutoff Value for Positive : >1.00 <br>","0","0","","");
INSERT INTO subtest VALUES("99","51","Result","","0","0","","");
INSERT INTO subtest VALUES("100","52","HCV by ELISA","Cutoff Value for Negative: <0.90 <br>
Cutoff Value for Positive: >1.0 <br>","1","1","","");
INSERT INTO subtest VALUES("101","52","Result","","0","0","","");
INSERT INTO subtest VALUES("102","53","HBsAg by ELISA","Cutoff Value for Negative:<0.90 <br>
Cutoff Value for Positive:>1.0 <br>","1","1","","");
INSERT INTO subtest VALUES("103","53","Result","","0","1","","");
INSERT INTO subtest VALUES("104","54","G6PD","20_____60","20","60","Minutes","");
INSERT INTO subtest VALUES("105","55","Activated Partial Thromboplastin Time","head","0","0","","");
INSERT INTO subtest VALUES("106","55","Control","","0","0","","");
INSERT INTO subtest VALUES("107","55","Patient","","0","0","","");
INSERT INTO subtest VALUES("108","56","Prothrambin Time","head","0","0","","");
INSERT INTO subtest VALUES("109","56","Control","","0","0","","");
INSERT INTO subtest VALUES("110","56","Patient","","0","0","","");
INSERT INTO subtest VALUES("111","57","Prothrambin Time","head","0","0","","");
INSERT INTO subtest VALUES("112","57","Control","","0","0","","");
INSERT INTO subtest VALUES("113","57","Patient","","0","0","","");
INSERT INTO subtest VALUES("114","57","INR","","0","0","","");
INSERT INTO subtest VALUES("115","58","Activated Partial Thromboplastin Time","head","0","0","","");
INSERT INTO subtest VALUES("116","58","Control","","0","0","","");
INSERT INTO subtest VALUES("117","58","Patient","","0","0","","");
INSERT INTO subtest VALUES("118","58","Prothrambin Time","head","0","0","","");
INSERT INTO subtest VALUES("119","58","Control","","0","0","","");
INSERT INTO subtest VALUES("120","58","Patient","","0","0","","");
INSERT INTO subtest VALUES("121","58","INR","","0","0","","");
INSERT INTO subtest VALUES("122","59","ESR","","0","0","","");
INSERT INTO subtest VALUES("123","60","CRP (QUANTITATIVE)","Cutoff Value for Negative:<10 <br>
Cutoff Value for Positive: >10 <br>","1","1","mg/L","");
INSERT INTO subtest VALUES("124","60","Result","","0","0","","");
INSERT INTO subtest VALUES("125","61","S.CREATININE","0.5_____1.2","1","1","mg/dl","");
INSERT INTO subtest VALUES("126","61","B.UREA","10_____50","10","50","mg/dl","");
INSERT INTO subtest VALUES("127","62","B.UREA","10_____50","10","50","mg/dl","");
INSERT INTO subtest VALUES("128","63","S.CREATININE","0.5_____1.2","1","1","mg/dl","");
INSERT INTO subtest VALUES("129","64","S.CALCIUM","8.5_____10.5","9","11","mg/dl","");
INSERT INTO subtest VALUES("130","65","Phosphorous","2.5_____4.5","3","5","mg/dl","");
INSERT INTO subtest VALUES("131","66","Covid19","head","0","0","","");
INSERT INTO subtest VALUES("132","66","Covid19  IgG","","0","0","","");
INSERT INTO subtest VALUES("133","66","Covid19 IgM","","0","0","","<b>Note:</b><br>
This is Covid-19 or Severe Acute Respiratory Syndrome Coronavirus 2 (SARS-CoV-2)IgM + IgG Antibodies test.
Positive Antibody Test means the patient was previously infected, at least 2-3 weeks prior to sample collection.
COVID-19 Antibody Test is recommended for the purposes of disease seroprevalence and surveillance studies.
<br><b>Comments:</b><br>
A Non-Reactive test result does not completely rule out the possibility of an infection with SARS-CoV-2, Serum sample from the very early (pre-seroconversion)phase can yield Non-Reactive findings. Therefore, this test cannotbe used to diagnose an acute infection. Also, over time, Antibody titers may decline and eventually become Non-Reactive.
  More studies on this Covid-19 in process and comments and diagnosis may change time to time.
");
INSERT INTO subtest VALUES("136","67","URINE FOR SUGAR","","0","0","","");
INSERT INTO subtest VALUES("137","68","URINE FOR ALBUMIN","","0","0","","");
INSERT INTO subtest VALUES("138","69","URINE FOR KETONES","","0","0","","");
INSERT INTO subtest VALUES("139","70","TROP I(Quantitative)","please see below","0","0","ng/ml","");
INSERT INTO subtest VALUES("140","70","RESULTS","","0","0","","Note:-<br> Due to the release kinetic of Tn-I a result below decision limit within the first hour of onset of symptoms does not rule out myocardial infarction with certainity.if myocardial infarction still suspected,repeat the test at appropriate intervals.A negative Trop-I result must not be as sole diagnostic criterion.");
INSERT INTO subtest VALUES("141","71","Troponin T","","0","0","","( by Immunochrometic Method )");
INSERT INTO subtest VALUES("142","72","TOXOPLASMA Anti bodies","","0","0","","");
INSERT INTO subtest VALUES("143","73","TOXOPLASMA","head","0","0","","");
INSERT INTO subtest VALUES("144","73","IgG","","0","0","","");
INSERT INTO subtest VALUES("145","73","IgM","","0","0","","");
INSERT INTO subtest VALUES("146","74","S.KETONE","UPTO_____05","0","5","mg/dl","");
INSERT INTO subtest VALUES("147","75","S PROTIN","6_____8","6","8","g/dl","");
INSERT INTO subtest VALUES("148","76","T3","Adult:      0.8-2.0 <br>
Pediatric: (1-10 year)0.82-2.82<br>
Male:      (11-15year)0.81-2.33 <br>
Female:    (11-15year)0.61-2.09<br>
Male:      (16-17year)0.71-2.12<br>
Female:    (16-17year)0.61-1.51 <br>","1","2","ng/ml","");
INSERT INTO subtest VALUES("149","77","T4","Adult:         5.4-11.5 <br>
Children:      6.4-13.3 <br>
Neonate:       11.8-23.6 <br>","5","24","ug/dl","");
INSERT INTO subtest VALUES("150","78","TSH","<b>Adult:</b> 20-54year 0.4-4.2 <br>
55-87year 0.5-8.9<br>
<b>Pregnancy:</b><br>
1st trimester 0.3-4.5<br>
2nd trimester 0.5-4.6 <br>
3rd trimester 0.8-5.2 <br>
<b>Children:</b><br>
30 Min after birth 25-100<br>
2-4 days  1.7-9.1<br>
1 year    0.4-8.6 <br>
2 years   0.4-7.6 <br>
3 years   0.3-6.7<br>
4 to 19 years 0.4-6.2<br>","0","6","uLU/M","");
INSERT INTO subtest VALUES("151","79","T3","Adult:      0.8-2.0 <br>
Pediatric: (1-10 year)0.82-2.82<br>
Male:      (11-15year)0.81-2.33 <br>
Female:    (11-15year)0.61-2.09<br>
Male:      (16-17year)0.71-2.12<br>
Female:    (16-17year)0.61-1.51 <br>","1","2","ng/ml","");
INSERT INTO subtest VALUES("152","79","T4","Adult:         5.4-11.5 <br>
Children:      6.4-13.3 <br>
Neonate:       11.8-23.6 <br>","5","24","ug/dl","");
INSERT INTO subtest VALUES("153","79","TSH","<b>Adult:</b> 20-54year 0.4-4.2 <br>
55-87year 0.5-8.9<br>
<b>Pregnancy:</b><br>
1st trimester 0.3-4.5<br>
2nd trimester 0.5-4.6 <br>
3rd trimester 0.8-5.2 <br>
<b>Children:</b><br>
30 Min after birth 25-100<br>
2-4 days  1.7-9.1<br>
1 year    0.4-8.6 <br>
2 years   0.4-7.6 <br>
3 years   0.3-6.7<br>
4 to 19 years 0.4-6.2<br>","0","6","","");
INSERT INTO subtest VALUES("154","80","PSA","<4.0","0","4","ng/ml","Interpretation:<br>
Elevated concentrations of PSA may be observed in old age, acute urinary retention urinary catheterization,prostatitis, benign prostatic hyperplasia, transuretheral resection, after prostatic massage, needle biopsy and following ejaculation as well as in carcinoma prostate.<br>
If PSA > 40 there is a high change of nodal or metastatic spread.<br>
If PSA > 100 there is almost certainly metastatic spread.<br>
The free-to-total ratio (%free PSA) is lower in PCa then in BPH and is specially usefull for the diagnosis of PCa when the total PSA concentration falls in the “grey zone” (4…10ng/ml)
");
INSERT INTO subtest VALUES("155","81","WIDAL","head","0","0","","");
INSERT INTO subtest VALUES("156","81","TO","","0","0","","");
INSERT INTO subtest VALUES("157","81","TH","","0","0","","");
INSERT INTO subtest VALUES("158","82","S.Cholestrol","<200","0","200","mg/dl","");
INSERT INTO subtest VALUES("159","82","Triglycerides","<200","0","200","mg/dl","");
INSERT INTO subtest VALUES("160","82","H.D.L","35_____65","35","65","mg/dl","");
INSERT INTO subtest VALUES("161","82","L.D.L","<150","0","150","mg/dl","");
INSERT INTO subtest VALUES("162","83","S.Cholestrol","<200","0","200","mg/dl","");
INSERT INTO subtest VALUES("163","84","Triglycerides","<200","0","200","mg/dl","");
INSERT INTO subtest VALUES("164","85","ICT TB","head","0","0","","");
INSERT INTO subtest VALUES("165","85","IgG","","0","0","","");
INSERT INTO subtest VALUES("166","85","IgM","","0","0","","");
INSERT INTO subtest VALUES("167","86","ICT T.B","","0","0","","(by Immunochrometic Method )");
INSERT INTO subtest VALUES("168","87","STOOL H.PYLORI Ag","","0","0","","(by Immunochrometic Method )");
INSERT INTO subtest VALUES("169","88","H.PYLORI","","0","0","","(by Immunochrometic Method )");
INSERT INTO subtest VALUES("170","89","LH","Mid cycle surge    9.6-80.0<br>
    Follicular phase <br>
    Firs half          1.5-8.0<br>
    Second half        2.0-8.0<br>
    Luteal phase       0.2-6.5<br>
    Male               1.1-7.0<br>

","10","8","mIU/ml","");
INSERT INTO subtest VALUES("171","90","FSH","Adult male     1.7-12.0<br>
    Adult female<br>
    First half      3.9-12.0<br>
    Second half     2.9-9.0<br>
    Mid cycle peak   6.3-24.0<br>
    Luteal phase      1.5-7.0<br>
    Postmenopausal   17.0-95.0<br>","2","95","mIU/ml","");
INSERT INTO subtest VALUES("172","91","S.Prolactin","Male             3.0-25 ng/ml<br>
    Female<br>
    Menstrual cycle:  5.0-35 ng/ml <br>
    Menopausal phase: 5.0-35 ng/ml<br>","3","35","ng/ml","");
INSERT INTO subtest VALUES("173","92","Haemoglobin","(M)   12.5______18.0 <br>
(F)   11.5______16.5","13","18","g/dl","");
INSERT INTO subtest VALUES("174","92","Total RBC","4.5_____6.5","5","7","X10^12/|","");
INSERT INTO subtest VALUES("175","92","HCT","38_____52","38","52","%","");
INSERT INTO subtest VALUES("176","92","MCV","75_____95","75","95","f|","");
INSERT INTO subtest VALUES("177","92","MCH","26_____32","26","32","pg","");
INSERT INTO subtest VALUES("178","92","MCHC","30_____37","30","37","g/d|","");
INSERT INTO subtest VALUES("179","92","Platelets","150,000_____450,000","150","450","c/mm","");
INSERT INTO subtest VALUES("180","92","TLC(WBC)","4,000_____11,000","4","11","c/mm","");
INSERT INTO subtest VALUES("181","92","DLC","head","0","0","","");
INSERT INTO subtest VALUES("182","92","Neutrophil","40_____75","40","75","%","");
INSERT INTO subtest VALUES("183","92","Lymphocyte","20_____50","20","50","%","");
INSERT INTO subtest VALUES("184","92","Monocyte","01_____09","1","9","%","");
INSERT INTO subtest VALUES("185","92","Eosinophils","01_____05","1","5","%","");
INSERT INTO subtest VALUES("186","92","Basophils","Less Than 1","0","1","%","");
INSERT INTO subtest VALUES("187","93","Platelets","150,000_____450,000","150","450","c/mm","");
INSERT INTO subtest VALUES("188","94","Physical Examination","head","0","0","","");
INSERT INTO subtest VALUES("189","94","Colour","","0","0","","");
INSERT INTO subtest VALUES("190","94","Mucus","","0","0","","");
INSERT INTO subtest VALUES("191","94","Consistency","","0","0","","");
INSERT INTO subtest VALUES("192","94","Blood","","0","0","","");
INSERT INTO subtest VALUES("193","94","Microscopic Examination","head","0","0","","");
INSERT INTO subtest VALUES("194","94","H.Nana","","0","0","/HPF","");
INSERT INTO subtest VALUES("195","94","A.lumbricoid","","0","0","/HPF","");
INSERT INTO subtest VALUES("196","94","Giardia","","0","0","/HPF","");
INSERT INTO subtest VALUES("197","94","A.Dudianal","","0","0","/HPF","");
INSERT INTO subtest VALUES("198","94","T,Trichiura","","0","0","/HPF","");
INSERT INTO subtest VALUES("199","94","Amoeba","","0","0","/HPF","");
INSERT INTO subtest VALUES("200","94","Pus Cell","","0","0","/HPF","");
INSERT INTO subtest VALUES("201","94","RBC","","0","0","/HPF ","");
INSERT INTO subtest VALUES("202","95","Bag No","","0","0","","");
INSERT INTO subtest VALUES("203","95","Patient Details","head","0","0","","");
INSERT INTO subtest VALUES("204","95","Patient’s Blood Group","","0","0","","");
INSERT INTO subtest VALUES("205","95","Rh Type","","0","0","","");
INSERT INTO subtest VALUES("206","95","Donor Details","head","0","0","","");
INSERT INTO subtest VALUES("207","95","Donor Name","","0","0","","");
INSERT INTO subtest VALUES("208","95","Donor’s Blood Group","","0","0","","");
INSERT INTO subtest VALUES("209","95","Rh Type","","0","0","","");
INSERT INTO subtest VALUES("210","95","Donor Screening","head","0","0","","");
INSERT INTO subtest VALUES("211","95","HBsAg","","0","0","","");
INSERT INTO subtest VALUES("212","95","Anti HCV","","0","0","","");
INSERT INTO subtest VALUES("213","95","HIV","","0","0","","");
INSERT INTO subtest VALUES("214","95","Cross Match","","0","0","","");
INSERT INTO subtest VALUES("215","96","SEMEN ANALYSIS REPORTS ","head","10","20","","");
INSERT INTO subtest VALUES("216","96","COLOUR","WHITE GRAY","0","0","","");
INSERT INTO subtest VALUES("217","96","VOLUME","> 1.5_____3.0","0","3","ML","");
INSERT INTO subtest VALUES("218","96","VISCOSITY","NORMAL/THICK/THIN ","0","0","","");
INSERT INTO subtest VALUES("219","96","PH","7.2_____8.0","7","8","","");
INSERT INTO subtest VALUES("220","96","ABSTINENCE","3 TO 5","3","5","DAYS","");
INSERT INTO subtest VALUES("221","96","PUS","01_____02","1","2","/HPF","");
INSERT INTO subtest VALUES("222","96","RBC","00_____00","0","0","/HPF","");
INSERT INTO subtest VALUES("223","96","EPITH CELLS","00_____00","0","0","/HPF","");
INSERT INTO subtest VALUES("224","96","LIQUFECATION TIME","20_____30","20","30","MINUTES","");
INSERT INTO subtest VALUES("225","96","MICROSCOPIC EXAMINATION","head","0","0","","");
INSERT INTO subtest VALUES("226","96","TOTAL COUNT","20_____120","20","120","MILLION/ML","");
INSERT INTO subtest VALUES("227","96","ACTIVE",">=40","0","40","%","");
INSERT INTO subtest VALUES("228","96","SLUGGISH","","0","0","%","");
INSERT INTO subtest VALUES("229","96","NON-MOTILE","","0","0","%","");
INSERT INTO subtest VALUES("230","96","MORPHOLOGY","head","0","0","","");
INSERT INTO subtest VALUES("231","96","NORMAL SHAPE","","0","0","","");
INSERT INTO subtest VALUES("232","96","ABNORMAL SHAPE","","0","0","","");



CREATE TABLE `test` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_category` int(11) NOT NULL,
  `t_group` varchar(50) NOT NULL,
  `t_name` varchar(255) NOT NULL,
  `t_short` varchar(255) NOT NULL,
  `t_charges` int(255) NOT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO test VALUES("1","17","Urine","URINE R/E","URINE R/E","500");
INSERT INTO test VALUES("2","2","Blood","ALBUMIN","ALBUMIN","100");
INSERT INTO test VALUES("3","2","Blood","C.P.K","C.P.K","100");
INSERT INTO test VALUES("4","2","Blood","CA 125","CA 125","100");
INSERT INTO test VALUES("5","2","Blood","TestoSterone","TestoSterone","100");
INSERT INTO test VALUES("6","2","Blood","S.Total Proteins","S.Total Proteins","100");
INSERT INTO test VALUES("7","2","Blood","S.Albumin","S.Albumin","100");
INSERT INTO test VALUES("8","2","Blood","S.Glubulin","S.Glubulin","100");
INSERT INTO test VALUES("9","5","Blood","HBV PROFILE","HBV PROFILE","500");
INSERT INTO test VALUES("10","11","Blood","S.ALT/SGPT","S.ALT","100");
INSERT INTO test VALUES("11","11","Blood","S.AMYLASE","S.AMYLASE","100");
INSERT INTO test VALUES("12","11","Blood","AST","AST","100");
INSERT INTO test VALUES("13","11","Blood","B-HCG","B-HCG","100");
INSERT INTO test VALUES("14","5","Blood","Dengue Profile","Dengue","500");
INSERT INTO test VALUES("15","11","Blood","S.ELECTROLYTES","S.ELECTROLYTES","500");
INSERT INTO test VALUES("16","2","Blood","GLUCOSE (F)","FBS","100");
INSERT INTO test VALUES("17","5","Blood","BLOOD GROUP","BLOOD GROUP","100");
INSERT INTO test VALUES("18","2","Blood","Haemoglobin","HB","100");
INSERT INTO test VALUES("19","2","Blood","TLC(WBC)","TLC","100");
INSERT INTO test VALUES("20","11","Blood","GLUCOSE (R)","RBS","100");
INSERT INTO test VALUES("21","5","Blood","TYPHIDOT","TYPHIDOT","300");
INSERT INTO test VALUES("22","13","Blood","HbA1c","HbA1c","200");
INSERT INTO test VALUES("23","5","Blood","HBsAg","HBsAg","100");
INSERT INTO test VALUES("24","5","Blood","HCV Ab","HCV Ab","100");
INSERT INTO test VALUES("25","5","Blood","HIV","HIV","100");
INSERT INTO test VALUES("26","11","Blood","LDH","LDH","100");
INSERT INTO test VALUES("27","5","Blood","VDRL","VDRL","100");
INSERT INTO test VALUES("28","5","Blood","ICT.T.B","ICT.T.B","100");
INSERT INTO test VALUES("29","17","Blood","MP ICT","MP ICT","300");
INSERT INTO test VALUES("30","5","Blood","MP","MP","100");
INSERT INTO test VALUES("31","5","Urine","URINE FOR PREGNANCY ","PREGNANCY ","300");
INSERT INTO test VALUES("32","2","Blood","R.A.Factor","RAF QN","100");
INSERT INTO test VALUES("33","2","Blood","DLC","DLC","400");
INSERT INTO test VALUES("34","11","Blood","VITAMIN D3","VITAMIN D3","100");
INSERT INTO test VALUES("35","11","Blood","LFTs","LFTs","500");
INSERT INTO test VALUES("36","11","Blood","BILIRUBIN Profile","BILIRUBIN","500");
INSERT INTO test VALUES("37","11","Blood","ALPHA FETOPROTEIN","ALPHA FETOPROTEIN","300");
INSERT INTO test VALUES("38","11","Blood","D-DIMER","D-DIMER","200");
INSERT INTO test VALUES("39","11","Bloood","Ferritin","Ferritin","300");
INSERT INTO test VALUES("40","11","Blood","Free T4","Free T4","300");
INSERT INTO test VALUES("41","2","Blood","Bleeding Time","BT","150");
INSERT INTO test VALUES("42","2","Blood","Clotting Time","CT","150");
INSERT INTO test VALUES("43","5","Blood","Brucella","Brucella","400");
INSERT INTO test VALUES("44","5","Blood","ASO Titer","ASO","150");
INSERT INTO test VALUES("45","5","Blood","RA Factor","RA Factor","150");
INSERT INTO test VALUES("46","5","Blood","C.R.P","C.R.P","150");
INSERT INTO test VALUES("47","11","blood","S.URIC ACID","S.URIC ACID","140");
INSERT INTO test VALUES("48","5","Blood","RF (QUANTITATIVE)","RAF QN","350");
INSERT INTO test VALUES("49","5","Blood","ASO (QUANTITATIVE)","ASO QN","150");
INSERT INTO test VALUES("50","5","Blood","HCV by ELISA","HCV by ELISA","400");
INSERT INTO test VALUES("51","5","Blood","HBsAg by ELISA","HBsAg by ELISA","400");
INSERT INTO test VALUES("52","5","Blood","HCV by ELISA","HCV by ELISA","300");
INSERT INTO test VALUES("53","5","Blood","HBsAg by ELISA","HBsAg by ELISA","400");
INSERT INTO test VALUES("54","5","Blood","G6PD","G6PD","300");
INSERT INTO test VALUES("55","5","Blood","Activated Partial Thromboplastin Time","APTT","300");
INSERT INTO test VALUES("56","5","Blood","Prothrambin Time","PT","400");
INSERT INTO test VALUES("57","5","Blood","PT INR","PT INR","500");
INSERT INTO test VALUES("58","5","Blood","PT / APTT / INR","PT APTT INR","500");
INSERT INTO test VALUES("59","5","Blood","ESR","ESR","600");
INSERT INTO test VALUES("60","5","Blood","CRP (QUANTITATIVE)","CRP QN","400");
INSERT INTO test VALUES("61","2","Blood","RFTs","RFTs","200");
INSERT INTO test VALUES("62","2","Blood","B.UREA","B.UREA","100");
INSERT INTO test VALUES("63","2","Blood","S.CREATININE","S.CREATININE","100");
INSERT INTO test VALUES("64","11","Blood","S.CALCIUM","S.CA++","400");
INSERT INTO test VALUES("65","2","Blood","Phosphorous","Phos","100");
INSERT INTO test VALUES("66","5","blood","Covid19","Covid19","600");
INSERT INTO test VALUES("67","5","Blood","URINE FOR SUGAR","URINE FOR SUGAR","400");
INSERT INTO test VALUES("68","5","Blood","URINE FOR ALBUMIN","URINE FOR ALBUMIN","300");
INSERT INTO test VALUES("69","5","Blood","URINE FOR KETONES","URINE FOR KETONES","150");
INSERT INTO test VALUES("70","11","Blood","TROP I(Quantitative)","TROP I","200");
INSERT INTO test VALUES("71","11","Blood","Troponin T","Troponin T","300");
INSERT INTO test VALUES("72","5","Blood","TOXOPLASMA Anti bodies","TOXOPLASMA Anti bodies","500");
INSERT INTO test VALUES("73","5","Blood","TOXOPLASMA IgG/IgM","TOXOPLASMA IgG/IgM","500");
INSERT INTO test VALUES("74","2","Blood","S.KETONE","S.KETONE","200");
INSERT INTO test VALUES("75","2","Blood","S PROTIN","S PROTIN","200");
INSERT INTO test VALUES("76","2","Blood","T3","T3","300");
INSERT INTO test VALUES("77","2","Blood","T4","T4","300");
INSERT INTO test VALUES("78","2","Blood","TSH","TSH","300");
INSERT INTO test VALUES("79","2","Blood","TFTs","TFTs","500");
INSERT INTO test VALUES("80","2","Blood","PSA","PSA","400");
INSERT INTO test VALUES("81","2","Blood","WIDAL","WIDAL","300");
INSERT INTO test VALUES("82","2","Blood","LIPID PROFILE","LIPID PROFILE","500");
INSERT INTO test VALUES("83","2","Blood","S.Cholestrol","S.Cholestrol","300");
INSERT INTO test VALUES("84","2","Blood","Triglycerides","Triglycerides","300");
INSERT INTO test VALUES("85","5","Blood","ICT TB lgG/lgM","ICT TB lgG/lgM","300");
INSERT INTO test VALUES("86","5","Blood","ICT T.B","ICT T.B","300");
INSERT INTO test VALUES("87","5","Blood","STOOL H.PYLORI Ag","STOOL H.PYLORI","400");
INSERT INTO test VALUES("88","5","Blood","H.PYLORI","H.PYLORI","300");
INSERT INTO test VALUES("89","2","Blood","LH","LH","400");
INSERT INTO test VALUES("90","2","Blood","FSH","FSH","500");
INSERT INTO test VALUES("91","2","Blood","S.Prolactin","S.Prolactin","150");
INSERT INTO test VALUES("92","2","Blood","CBC","CBC","500");
INSERT INTO test VALUES("93","2","Blood","Platelets","Platelets","100");
INSERT INTO test VALUES("94","2","blood","STOOL R/E","STOOL R/E","500");
INSERT INTO test VALUES("95","2","Blood","Cross Matching Blood Group","Cross Matching","300");
INSERT INTO test VALUES("96","17","Blood","SEMEN ANALYSIS","SEMEN ANALYSIS","1000");



CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO users VALUES("1","wasay","wasay@gmail.com","Pakistan@133","1");
INSERT INTO users VALUES("13","wasay khan","test@gmail.com","1234","1");
INSERT INTO users VALUES("14","wasay khan","test2@gmail.com","123","1");
INSERT INTO users VALUES("15","wasay khan","test3@gmail.com","123","1");
INSERT INTO users VALUES("16","wasay khan","user@gmail.com","123","0");
INSERT INTO users VALUES("17","New Test User","lab1@gmail.com","123","1");
INSERT INTO users VALUES("18","lab2","lab2@gmail.com","123","0");

