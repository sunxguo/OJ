CREATE DATABASE  IF NOT EXISTS `oj` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `oj`;
-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: localhost    Database: oj
-- ------------------------------------------------------
-- Server version	5.5.25a

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `code`
--

DROP TABLE IF EXISTS `code`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `code` (
  `c_ID` int(11) NOT NULL AUTO_INCREMENT,
  `c_uID` int(11) NOT NULL COMMENT '用户ID',
  `c_pID` int(11) NOT NULL COMMENT '题目ID',
  `c_code` text NOT NULL,
  `c_status` int(11) DEFAULT NULL COMMENT '1 通过（Accepted,AC）、2 答案错误(Wrong Answer,WA)、3 超时(Time Limit Exceed,TLE)、4 超过输出限制（Output Limit Exceed,OLE)、5 超内存（Memory Limit Exceed,MLE）、6 运行时错误（Runtime Error,RE）、7 格式错误（Presentation Error,PE)、8 无法编译（Compile Error,CE）',
  `c_memory` int(11) DEFAULT NULL COMMENT '运行内存',
  `c_time` int(11) DEFAULT NULL COMMENT '运行时间',
  `c_creationDate` datetime NOT NULL COMMENT '代码提交时间',
  `c_type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '类别：1->练习;2->比赛;',
  `c_groupId` int(11) NOT NULL DEFAULT '1' COMMENT '所属组别的id',
  `c_compile` varchar(1000) DEFAULT NULL,
  `c_run` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`c_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `code`
--

LOCK TABLES `code` WRITE;
/*!40000 ALTER TABLE `code` DISABLE KEYS */;
INSERT INTO `code` VALUES (1,1,8,'测试',0,NULL,NULL,'2014-04-19 01:20:06',1,1,NULL,NULL),(2,1,8,'测试',0,NULL,NULL,'2014-04-19 01:21:01',1,1,NULL,NULL),(3,1,8,'<pre class=\"prettyprint lang-java\">import java.io.*;\r\nimport java.util.*;\r\npublic class Main\r\n{\r\n            public static void main(String args[]) throws Exception\r\n            {\r\n                    Scanner cin=new Scanner(System.in);\r\n                    int a=cin.nextInt(),b=cin.nextInt();\r\n                    System.out.println(a+b);\r\n            }\r\n}</pre>',0,NULL,NULL,'2014-04-19 01:28:41',1,1,NULL,NULL),(4,1,8,'gfsg',0,NULL,NULL,'2014-04-20 01:29:24',1,1,NULL,NULL),(5,1,19,'d',0,NULL,NULL,'2014-04-20 04:32:47',1,1,NULL,NULL),(6,1,8,'#include \"../Include/stdio.h\"\r\n#include \"../Include/stdlib.h\"\r\n\r\nvoid main()\r\n{\r\n    int i = 0;\r\n    while(i < 10)\r\n    {\r\n        printf(\"%d \", i);\r\n        i++;\r\n    }\r\n    printf(\"Hello world\\n\");\r\n    system(\"pause\");\r\n}',0,NULL,NULL,'2014-04-21 03:15:27',1,1,NULL,NULL),(7,1,8,'#include \"../Include/stdio.h\"\r\n#include \"../Include/stdlib.h\"\r\n\r\nvoid main()\r\n{\r\n    int i = 0;\r\n    while(i < 10)\r\n    {\r\n        printf(\"%d \", i);\r\n        i++;\r\n    }\r\n    printf(\"Hello world\\n\");\r\n    system(\"pause\");\r\n}',0,NULL,NULL,'2014-04-21 03:18:06',1,1,NULL,NULL),(8,1,10,'If you don\'t know ho',0,NULL,NULL,'2014-05-29 11:34:04',1,1,NULL,NULL);
/*!40000 ALTER TABLE `code` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `managers`
--

DROP TABLE IF EXISTS `managers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `managers` (
  `m_ID` int(11) NOT NULL AUTO_INCREMENT,
  `m_name` varchar(100) NOT NULL,
  `m_pwd` varchar(100) NOT NULL,
  `m_email` varchar(100) NOT NULL,
  PRIMARY KEY (`m_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='管理员';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `managers`
--

LOCK TABLES `managers` WRITE;
/*!40000 ALTER TABLE `managers` DISABLE KEYS */;
INSERT INTO `managers` VALUES (1,'jacksun','3c79f30f852da11844fad3200fdfa183','sunxguo@163.com');
/*!40000 ALTER TABLE `managers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `u_ID` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(100) NOT NULL,
  `u_pwd` varchar(100) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_regDate` date NOT NULL COMMENT '注册日期',
  PRIMARY KEY (`u_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='用户信息';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'sunxguo','123','sunxguo@163.com','2014-04-17'),(2,'MonkeyKing','123','sunxguo@163.com','2014-05-29');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grouppro`
--

DROP TABLE IF EXISTS `grouppro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grouppro` (
  `gp_ID` int(11) NOT NULL AUTO_INCREMENT,
  `gp_gID` varchar(45) NOT NULL,
  `gp_pID` int(11) NOT NULL COMMENT '题目的id',
  `gp_pNum` int(11) NOT NULL COMMENT '在比赛中的题号',
  PRIMARY KEY (`gp_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='有组织的题目，如比赛/作业的题目';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grouppro`
--

LOCK TABLES `grouppro` WRITE;
/*!40000 ALTER TABLE `grouppro` DISABLE KEYS */;
INSERT INTO `grouppro` VALUES (4,'4',10,3),(15,'4',8,5),(16,'5',8,1),(17,'5',10,2),(19,'5',14,2),(20,'4',14,4),(21,'11',8,1),(22,'11',10,2);
/*!40000 ALTER TABLE `grouppro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `languages` (
  `l_ID` int(11) NOT NULL AUTO_INCREMENT,
  `l_name` varchar(100) NOT NULL,
  PRIMARY KEY (`l_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languages`
--

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
INSERT INTO `languages` VALUES (0,'gcc');
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groupuser`
--

DROP TABLE IF EXISTS `groupuser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groupuser` (
  `gu_ID` int(11) NOT NULL AUTO_INCREMENT,
  `gu_uID` int(11) NOT NULL,
  `gu_gID` int(11) NOT NULL,
  `gu_exposition` text,
  `gu_creationDate` datetime NOT NULL,
  `gu_verification` varchar(45) NOT NULL,
  PRIMARY KEY (`gu_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groupuser`
--

LOCK TABLES `groupuser` WRITE;
/*!40000 ALTER TABLE `groupuser` DISABLE KEYS */;
INSERT INTO `groupuser` VALUES (1,1,9,'理由','2014-05-29 06:36:28','doing');
/*!40000 ALTER TABLE `groupuser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `problem`
--

DROP TABLE IF EXISTS `problem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `problem` (
  `p_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '问题ID',
  `p_Title` varchar(200) NOT NULL COMMENT '问题标题',
  `p_Content` text NOT NULL COMMENT '问题内容',
  `p_AuthorID` int(11) NOT NULL COMMENT '作者ID',
  `p_Date` date NOT NULL COMMENT '生成问题日期',
  `p_SubNum` int(11) NOT NULL COMMENT '总提交答案次数',
  `p_DealNum` int(11) NOT NULL COMMENT '解决问题次数',
  PRIMARY KEY (`p_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COMMENT='问题';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `problem`
--

LOCK TABLES `problem` WRITE;
/*!40000 ALTER TABLE `problem` DISABLE KEYS */;
INSERT INTO `problem` VALUES (8,'A+B Problem','<p class=\"pst\" style=\"background-color:#FFFFFF;font-family:Arial, Helvetica, sans-serif;font-size:18pt;font-weight:bold;color:blue;\">\n	Description\n</p>\n<div class=\"ptx\" style=\"margin:0px;padding:0px;font-size:medium;background-color:#FFFFFF;font-family:\'Times New Roman\', Times, serif;\">\n	Calculate a+b\n</div>\n<p class=\"pst\" style=\"background-color:#FFFFFF;font-family:Arial, Helvetica, sans-serif;font-size:18pt;font-weight:bold;color:blue;\">\n	Input\n</p>\n<div class=\"ptx\" style=\"margin:0px;padding:0px;font-size:medium;background-color:#FFFFFF;font-family:\'Times New Roman\', Times, serif;\">\n	Two integer a,b (0&lt;=a,b&lt;=10)\n</div>\n<p class=\"pst\" style=\"background-color:#FFFFFF;font-family:Arial, Helvetica, sans-serif;font-size:18pt;font-weight:bold;color:blue;\">\n	Output\n</p>\n<div class=\"ptx\" style=\"margin:0px;padding:0px;font-size:medium;background-color:#FFFFFF;font-family:\'Times New Roman\', Times, serif;\">\n	Output a+b\n</div>\n<p class=\"pst\" style=\"background-color:#FFFFFF;font-family:Arial, Helvetica, sans-serif;font-size:18pt;font-weight:bold;color:blue;\">\n	Sample Input\n</p>\n<pre class=\"sio\">1 2</pre>\n<p class=\"pst\" style=\"background-color:#FFFFFF;font-family:Arial, Helvetica, sans-serif;font-size:18pt;font-weight:bold;color:blue;\">\n	Sample Output\n</p>\n<pre class=\"sio\">3</pre>\n<p class=\"pst\" style=\"background-color:#FFFFFF;font-family:Arial, Helvetica, sans-serif;font-size:18pt;font-weight:bold;color:blue;\">\n	Hint\n</p>\n<div class=\"ptx\" style=\"margin:0px;padding:0px;font-size:medium;background-color:#FFFFFF;font-family:\'Times New Roman\', Times, serif;\">\n	Q: Where are the input and the output?&nbsp;<br />\nA: Your program shall always&nbsp;<span>read input from stdin (Standard Input) and write output to stdout (Standard Output)</span>. For example, you can use \'scanf\' in C or \'cin\' in C++ to read from stdin, and use \'printf\' in C or \'cout\' in C++ to write to stdout.&nbsp;<br />\nYou&nbsp;<span>shall not output any extra data</span>&nbsp;to standard output other than that required by the problem, otherwise you will get a \"Wrong Answer\".&nbsp;<br />\nUser programs are not allowed to open and read from/write to files. You will get a \"Runtime Error\" or a \"Wrong Answer\"if you try to do so.&nbsp;<br />\nHere is a sample solution to problem 1000 using C++/G++:&nbsp;<br />\n<pre>#include &lt;iostream&gt;\nusing namespace std;\nint main()\n{\n    int a,b;\n    cin &gt;&gt; a &gt;&gt; b;\n    cout &lt;&lt; a+b &lt;&lt; endl;\n    return 0;\n}</pre>\nIt\'s important that the return type of main() must be int when you use G++/GCC,or you may get compile error.&nbsp;<br />\nHere is a sample solution to problem 1000 using C/GCC:&nbsp;<br />\n<pre>#include &lt;stdio.h&gt;\nint main()\n{\n    int a,b;\n    scanf(\"%d %d\",&amp;a, &amp;b);\n    printf(\"%d\\n\",a+b);\n    return 0;\n}</pre>\nHere is a sample solution to problem 1000 using Pascal:&nbsp;<br />\n<pre>program p1000(Input,Output);\nvar\n  a,b:Integer;\nbegin\n   Readln(a,b);\n   Writeln(a+b);\nend.</pre>\nHere is a sample solution to problem 1000 using Java:&nbsp;<br />\nNow java compiler is jdk 1.5, next is program for 1000&nbsp;<br />\n<pre>import java.io.*;\nimport java.util.*;\npublic class Main\n{\n            public static void main(String args[]) throws Exception\n            {\n                    Scanner cin=new Scanner(System.in);\n                    int a=cin.nextInt(),b=cin.nextInt();\n                    System.out.println(a+b);\n            }\n}</pre>\nOld program for jdk 1.4&nbsp;<br />\n<pre>import java.io.*;\nimport java.util.*;\npublic class Main\n{\n    public static void main (String args[]) throws Exception\n    {\n        BufferedReader stdin = \n            new BufferedReader(\n                new InputStreamReader(System.in));\n        String line = stdin.readLine();\n        StringTokenizer st = new StringTokenizer(line);\n        int a = Integer.parseInt(st.nextToken());\n        int b = Integer.parseInt(st.nextToken());\n        System.out.println(a+b);\n    }\n}</pre>\nHere is a sample solution to problem 1000 using Fortran:&nbsp;<br />\n<pre>	PROGRAM P1000\n		IMPLICIT NONE\n		INTEGER :: A, B\n		READ(*,*) A, B\n		WRITE(*, \"(I0)\") A + B\n	END PROGRAM P1000</pre>\n</div>\n<p class=\"pst\" style=\"background-color:#FFFFFF;font-family:Arial, Helvetica, sans-serif;font-size:18pt;font-weight:bold;color:blue;\">\n	Source\n</p>\n<a href=\"http://poj.org/searchproblem?field=source&amp;key=POJ\">POJ</a>',0,'2014-04-16',0,0),(10,'Exponentiation','<p class=\"pst\" style=\"font-family:Arial, Helvetica, sans-serif;font-size:18pt;font-weight:bold;color:blue;\">\n	Description\n</p>\n<div class=\"ptx\" style=\"font-family:\'Times New Roman\', Times, serif;font-size:medium;\">\n	Problems involving the computation of exact values of very large magnitude and precision are common. For example, the computation of the national debt is a taxing experience for many computer systems.&nbsp;<br />\nThis problem requires that you write a program to compute the exact value of R<sup>n</sup>&nbsp;where R is a real number ( 0.0 &lt; R &lt; 99.999 ) and n is an integer such that 0 &lt; n &lt;= 25.\n</div>\n<p class=\"pst\" style=\"font-family:Arial, Helvetica, sans-serif;font-size:18pt;font-weight:bold;color:blue;\">\n	Input\n</p>\n<div class=\"ptx\" style=\"font-family:\'Times New Roman\', Times, serif;font-size:medium;\">\n	The input will consist of a set of pairs of values for R and n. The R value will occupy columns 1 through 6, and the n value will be in columns 8 and 9.\n</div>\n<p class=\"pst\" style=\"font-family:Arial, Helvetica, sans-serif;font-size:18pt;font-weight:bold;color:blue;\">\n	Output\n</p>\n<div class=\"ptx\" style=\"font-family:\'Times New Roman\', Times, serif;font-size:medium;\">\n	The output will consist of one line for each line of input giving the exact value of R^n. Leading zeros should be suppressed in the output. Insignificant trailing zeros must not be printed. Don\'t print the decimal point if the result is an integer.\n</div>\n<p class=\"pst\" style=\"font-family:Arial, Helvetica, sans-serif;font-size:18pt;font-weight:bold;color:blue;\">\n	Sample Input\n</p>\n<pre class=\"sio\">95.123 12\n0.4321 20\n5.1234 15\n6.7592  9\n98.999 10\n1.0100 12\n</pre>\n<p class=\"pst\" style=\"font-family:Arial, Helvetica, sans-serif;font-size:18pt;font-weight:bold;color:blue;\">\n	Sample Output\n</p>\n<pre class=\"sio\">548815620517731830194541.899025343415715973535967221869852721\n.00000005148554641076956121994511276767154838481760200726351203835429763013462401\n43992025569.928573701266488041146654993318703707511666295476720493953024\n29448126.764121021618164430206909037173276672\n90429072743629540498.107596019456651774561044010001\n1.126825030131969720661201</pre>\n<p class=\"pst\" style=\"font-family:Arial, Helvetica, sans-serif;font-size:18pt;font-weight:bold;color:blue;\">\n	Hint\n</p>\n<div class=\"ptx\" style=\"font-family:\'Times New Roman\', Times, serif;font-size:medium;\">\n	If you don\'t know how to determine wheather encounted the end of input:&nbsp;<br />\n<i>s</i>&nbsp;is a string and&nbsp;<i>n</i>&nbsp;is an integer&nbsp;<br />\n<pre><b>C++</b> while(cin&gt;&gt;s&gt;&gt;n)\n\n{\n\n...\n\n} <b>c</b> while(scanf(\"%s%d\",s,&amp;n)==2) //to  see if the scanf read in as many items as you want\n\n/*while(scanf(%s%d\",s,&amp;n)!=EOF) //this also work    */\n\n{\n\n...\n\n}</pre>\n</div>\n<p class=\"pst\" style=\"font-family:Arial, Helvetica, sans-serif;font-size:18pt;font-weight:bold;color:blue;\">\n	Source\n</p>\n<a href=\"http://poj.org/searchproblem?field=source&amp;key=East+Central+North+America+1988\">East Central North America 1988</a>',0,'2014-04-20',0,0),(11,'487-3279','<p class=\"pst\" style=\"font-family:Arial, Helvetica, sans-serif;font-size:18pt;font-weight:bold;color:blue;\">\n	Description\n</p>\n<div class=\"ptx\" style=\"font-family:\'Times New Roman\', Times, serif;font-size:medium;\">\n	Businesses like to have memorable telephone numbers. One way to make a telephone number memorable is to have it spell a memorable word or phrase. For example, you can call the University of Waterloo by dialing the memorable TUT-GLOP. Sometimes only part of the number is used to spell a word. When you get back to your hotel tonight you can order a pizza from Gino\'s by dialing 310-GINO. Another way to make a telephone number memorable is to group the digits in a memorable way. You could order your pizza from Pizza Hut by calling their ``three tens\'\' number 3-10-10-10.&nbsp;<br />\nThe standard form of a telephone number is seven decimal digits with a hyphen between the third and fourth digits (e.g. 888-1200). The keypad of a phone supplies the mapping of letters to numbers, as follows:&nbsp;<br />\nA, B, and C map to 2&nbsp;<br />\nD, E, and F map to 3&nbsp;<br />\nG, H, and I map to 4&nbsp;<br />\nJ, K, and L map to 5&nbsp;<br />\nM, N, and O map to 6&nbsp;<br />\nP, R, and S map to 7&nbsp;<br />\nT, U, and V map to 8&nbsp;<br />\nW, X, and Y map to 9&nbsp;<br />\nThere is no mapping for Q or Z. Hyphens are not dialed, and can be added and removed as necessary. The standard form of TUT-GLOP is 888-4567, the standard form of 310-GINO is 310-4466, and the standard form of 3-10-10-10 is 310-1010.&nbsp;<br />\nTwo telephone numbers are equivalent if they have the same standard form. (They dial the same number.)&nbsp;<br />\nYour company is compiling a directory of telephone numbers from local businesses. As part of the quality control process you want to check that no two (or more) businesses in the directory have the same telephone number.&nbsp;<br />\n</div>\n<p class=\"pst\" style=\"font-family:Arial, Helvetica, sans-serif;font-size:18pt;font-weight:bold;color:blue;\">\n	Input\n</p>\n<div class=\"ptx\" style=\"font-family:\'Times New Roman\', Times, serif;font-size:medium;\">\n	The input will consist of one case. The first line of the input specifies the number of telephone numbers in the directory (up to 100,000) as a positive integer alone on the line. The remaining lines list the telephone numbers in the directory, with each number alone on a line. Each telephone number consists of a string composed of decimal digits, uppercase letters (excluding Q and Z) and hyphens. Exactly seven of the characters in the string will be digits or letters.&nbsp;<br />\n</div>\n<p class=\"pst\" style=\"font-family:Arial, Helvetica, sans-serif;font-size:18pt;font-weight:bold;color:blue;\">\n	Output\n</p>\n<div class=\"ptx\" style=\"font-family:\'Times New Roman\', Times, serif;font-size:medium;\">\n	Generate a line of output for each telephone number that appears more than once in any form. The line should give the telephone number in standard form, followed by a space, followed by the number of times the telephone number appears in the directory. Arrange the output lines by telephone number in ascending lexicographical order. If there are no duplicates in the input print the line:&nbsp;<br />\nNo duplicates.&nbsp;<br />\n</div>\n<p class=\"pst\" style=\"font-family:Arial, Helvetica, sans-serif;font-size:18pt;font-weight:bold;color:blue;\">\n	Sample Input\n</p>\n<pre class=\"sio\">12\n4873279\nITS-EASY\n888-4567\n3-10-10-10\n888-GLOP\nTUT-GLOP\n967-11-11\n310-GINO\nF101010\n888-1200\n-4-8-7-3-2-7-9-\n487-3279\n</pre>\n<p class=\"pst\" style=\"font-family:Arial, Helvetica, sans-serif;font-size:18pt;font-weight:bold;color:blue;\">\n	Sample Output\n</p>\n<pre class=\"sio\">310-1010 2\n487-3279 4\n888-4567 3</pre>\n<p class=\"pst\" style=\"font-family:Arial, Helvetica, sans-serif;font-size:18pt;font-weight:bold;color:blue;\">\n	Source\n</p>\n<a href=\"http://poj.org/searchproblem?field=source&amp;key=East+Central+North+America+1999\">East Central North America 1999</a>\n',0,'2014-04-20',0,0),(12,'Hangover','<p class=\"pst\" style=\"font-family:Arial, Helvetica, sans-serif;font-size:18pt;font-weight:bold;color:blue;\">\n	Description\n</p>\n<div class=\"ptx\" style=\"font-family:\'Times New Roman\', Times, serif;font-size:medium;\">\n	<p>\n		How far can you make a stack of cards overhang a table? If you have one card, you can create a maximum overhang of half a card length. (We\'re assuming that the cards must be perpendicular to the table.) With two cards you can make the top card overhang the bottom one by half a card length, and the bottom one overhang the table by a third of a card length, for a total maximum overhang of 1/2&nbsp;+&nbsp;1/3&nbsp;=&nbsp;5/6 card lengths. In general you can make&nbsp;<i>n</i>&nbsp;cards overhang by 1/2&nbsp;+&nbsp;1/3&nbsp;+&nbsp;1/4&nbsp;+&nbsp;...&nbsp;+&nbsp;1/(<i>n</i>&nbsp;+&nbsp;1) card lengths, where the top card overhangs the second by 1/2, the second overhangs tha third by 1/3, the third overhangs the fourth by 1/4, etc., and the bottom card overhangs the table by 1/(<i>n</i>&nbsp;+&nbsp;1). This is illustrated in the figure below.\n	</p>\n<br />\n<img src=\"http://poj.org/images/1003/hangover.jpg\" width=\"424\" height=\"115\" /><br />\n</div>\n<p class=\"pst\" style=\"font-family:Arial, Helvetica, sans-serif;font-size:18pt;font-weight:bold;color:blue;\">\n	Input\n</p>\n<div class=\"ptx\" style=\"font-family:\'Times New Roman\', Times, serif;font-size:medium;\">\n	The input consists of one or more test cases, followed by a line containing the number 0.00 that signals the end of the input. Each test case is a single line containing a positive floating-point number c whose value is at least 0.01 and at most 5.20; c will contain exactly three digits.\n</div>\n<p class=\"pst\" style=\"font-family:Arial, Helvetica, sans-serif;font-size:18pt;font-weight:bold;color:blue;\">\n	Output\n</p>\n<div class=\"ptx\" style=\"font-family:\'Times New Roman\', Times, serif;font-size:medium;\">\n	For each test case, output the minimum number of cards necessary to achieve an overhang of at least c card lengths. Use the exact output format shown in the examples.\n</div>\n<p class=\"pst\" style=\"font-family:Arial, Helvetica, sans-serif;font-size:18pt;font-weight:bold;color:blue;\">\n	Sample Input\n</p>\n<pre class=\"sio\">1.00\n3.71\n0.04\n5.19\n0.00\n</pre>\n<p class=\"pst\" style=\"font-family:Arial, Helvetica, sans-serif;font-size:18pt;font-weight:bold;color:blue;\">\n	Sample Output\n</p>\n<pre class=\"sio\">3 card(s)\n61 card(s)\n1 card(s)\n273 card(s)</pre>\n<p class=\"pst\" style=\"font-family:Arial, Helvetica, sans-serif;font-size:18pt;font-weight:bold;color:blue;\">\n	Source\n</p>\n<a href=\"http://poj.org/searchproblem?field=source&amp;key=Mid-Central+USA+2001\">Mid-Central USA 2001</a>\n',0,'2014-04-20',0,0),(13,'Financial Management','<p class=\"pst\" style=\"font-family:Arial, Helvetica, sans-serif;font-size:18pt;font-weight:bold;color:blue;\">\n	Description\n</p>\n<div class=\"ptx\" style=\"font-family:\'Times New Roman\', Times, serif;font-size:medium;\">\n	Larry graduated this year and finally has a job. He\'s making a lot of money, but somehow never seems to have enough. Larry has decided that he needs to grab hold of his financial portfolio and solve his financing problems. The first step is to figure out what\'s been going on with his money. Larry has his bank account statements and wants to see how much money he has. Help Larry by writing a program to take his closing balance from each of the past twelve months and calculate his average account balance.\n</div>\n<p class=\"pst\" style=\"font-family:Arial, Helvetica, sans-serif;font-size:18pt;font-weight:bold;color:blue;\">\n	Input\n</p>\n<div class=\"ptx\" style=\"font-family:\'Times New Roman\', Times, serif;font-size:medium;\">\n	The input will be twelve lines. Each line will contain the closing balance of his bank account for a particular month. Each number will be positive and displayed to the penny. No dollar sign will be included.\n</div>\n<p class=\"pst\" style=\"font-family:Arial, Helvetica, sans-serif;font-size:18pt;font-weight:bold;color:blue;\">\n	Output\n</p>\n<div class=\"ptx\" style=\"font-family:\'Times New Roman\', Times, serif;font-size:medium;\">\n	The output will be a single number, the average (mean) of the closing balances for the twelve months. It will be rounded to the nearest penny, preceded immediately by a dollar sign, and followed by the end-of-line. There will be no other spaces or characters in the output.\n</div>\n<p class=\"pst\" style=\"font-family:Arial, Helvetica, sans-serif;font-size:18pt;font-weight:bold;color:blue;\">\n	Sample Input\n</p>\n<pre class=\"sio\">100.00\n489.12\n12454.12\n1234.10\n823.05\n109.20\n5.27\n1542.25\n839.18\n83.99\n1295.01\n1.75</pre>\n<p class=\"pst\" style=\"font-family:Arial, Helvetica, sans-serif;font-size:18pt;font-weight:bold;color:blue;\">\n	Sample Output\n</p>\n<pre class=\"sio\">$1581.42</pre>\n<p class=\"pst\" style=\"font-family:Arial, Helvetica, sans-serif;font-size:18pt;font-weight:bold;color:blue;\">\n	Source\n</p>\n<a href=\"http://poj.org/searchproblem?field=source&amp;key=Mid-Atlantic+2001\">Mid-Atlantic 2001</a>\n',0,'2014-04-20',0,0),(14,'I Think I Need a Houseboat','<p class=\"pst\" style=\"font-family:Arial, Helvetica, sans-serif;font-size:18pt;font-weight:bold;color:blue;\">\n	<span style=\"font-family:Microsoft YaHei;\">Description</span>\n</p>\n<div class=\"ptx\" style=\"font-family:\'Times New Roman\', Times, serif;font-size:medium;\">\n	<span style=\"font-family:Microsoft YaHei;\">Fred Mapper is considering purchasing some land in Louisiana to build his house on. In the process of investigating the land, he learned that the state of Louisiana is actually shrinking by 50 square miles each year, due to erosion caused by the Mississippi River. Since Fred is hoping to live in this house the rest of his life, he needs to know if his land is going to be lost to erosion.&nbsp;</span><br />\n<span style=\"font-family:Microsoft YaHei;\"> After doing more research, Fred has learned that the land that is being lost forms a semicircle. This semicircle is part of a circle centered at (0,0), with the line that bisects the circle being the X axis. Locations below the X axis are in the water. The semicircle has an area of 0 at the beginning of year 1. (Semicircle illustrated in the Figure.)&nbsp;</span><br />\n	<p align=\"center\">\n		<img border=\"0\" src=\"http://poj.org/images/1005/semicircle.GIF\" width=\"229\" height=\"201\" /> \n	</p>\n</div>\n<p class=\"pst\" style=\"font-family:Arial, Helvetica, sans-serif;font-size:18pt;font-weight:bold;color:blue;\">\n	<span style=\"font-family:Microsoft YaHei;\">Input</span>\n</p>\n<div class=\"ptx\" style=\"font-family:\'Times New Roman\', Times, serif;font-size:medium;\">\n	<span style=\"font-family:Microsoft YaHei;\">The first line of input will be a positive integer indicating how many data sets will be included (N). Each of the next N lines will contain the X and Y Cartesian coordinates of the land Fred is considering. These will be floating point numbers measured in miles. The Y coordinate will be non-negative. (0,0) will not be given.</span>\n</div>\n<p class=\"pst\" style=\"font-family:Arial, Helvetica, sans-serif;font-size:18pt;font-weight:bold;color:blue;\">\n	<span style=\"font-family:Microsoft YaHei;\">Output</span>\n</p>\n<div class=\"ptx\" style=\"font-family:\'Times New Roman\', Times, serif;font-size:medium;\">\n	<span style=\"font-family:Microsoft YaHei;\">For each data set, a single line of output should appear. This line should take the form of: “Property N: This property will begin eroding in year Z.” Where N is the data set (counting from 1), and Z is the first year (start from 1) this property will be within the semicircle AT THE END OF YEAR Z. Z must be an integer. After the last data set, this should print out “END OF OUTPUT.”</span>\n</div>\n<p class=\"pst\" style=\"font-family:Arial, Helvetica, sans-serif;font-size:18pt;font-weight:bold;color:blue;\">\n	<span style=\"font-family:Microsoft YaHei;\">Sample Input</span>\n</p>\n<pre class=\"sio\">2\n1.0 1.0\n25.0 0.0</pre>\n<p class=\"pst\" style=\"font-family:Arial, Helvetica, sans-serif;font-size:18pt;font-weight:bold;color:blue;\">\n	<span style=\"font-family:Microsoft YaHei;\">Sample Output</span>\n</p>\n<pre class=\"sio\">Property 1: This property will begin eroding in year 1.\nProperty 2: This property will begin eroding in year 20.\nEND OF OUTPUT.</pre>\n<p class=\"pst\" style=\"font-family:Arial, Helvetica, sans-serif;font-size:18pt;font-weight:bold;color:blue;\">\n	<span style=\"font-family:Microsoft YaHei;\">Hint</span>\n</p>\n<div class=\"ptx\" style=\"font-family:\'Times New Roman\', Times, serif;font-size:medium;\">\n	<span style=\"font-family:Microsoft YaHei;\">1.No property will appear exactly on the semicircle boundary: it will either be inside or outside.&nbsp;</span><br />\n<span style=\"font-family:Microsoft YaHei;\"> 2.This problem will be judged automatically. Your answer must match exactly, including the capitalization, punctuation, and white-space. This includes the periods at the ends of the lines.&nbsp;</span><br />\n<span style=\"font-family:Microsoft YaHei;\"> 3.All locations are given in miles.</span>\n</div>\n<p class=\"pst\" style=\"font-family:Arial, Helvetica, sans-serif;font-size:18pt;font-weight:bold;color:blue;\">\n	<span style=\"font-family:Microsoft YaHei;\">Source</span>\n</p>\n<a href=\"http://poj.org/searchproblem?field=source&amp;key=Mid-Atlantic+2001\"><span style=\"font-family:Microsoft YaHei;\">Mid-Atlantic 20</span><span style=\"font-family:Microsoft YaHei;\">01</span></a>',0,'2014-04-20',0,0),(24,'比赛','打豆豆',0,'2014-05-28',0,0),(25,'test','特',0,'2014-05-28',0,0),(26,'56','56',0,'2014-05-28',0,0),(27,'56','56',0,'2014-05-28',0,0),(28,'ff','ff',0,'2014-05-28',0,0);
/*!40000 ALTER TABLE `problem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contests`
--

DROP TABLE IF EXISTS `contests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contests` (
  `cont_ID` int(11) NOT NULL AUTO_INCREMENT,
  `cont_title` varchar(200) NOT NULL,
  `cont_content` text,
  `cont_startTime` datetime NOT NULL,
  `cont_endTime` datetime NOT NULL,
  `cont_url` varchar(200) DEFAULT '比赛别名地址',
  `cont_lang` varchar(1000) DEFAULT '语言',
  `cont_SubNum` int(11) DEFAULT '0',
  `cont_DealNum` int(11) DEFAULT '0',
  `cont_CreationTime` datetime DEFAULT NULL,
  `cont_AuthorID` int(11) DEFAULT NULL,
  PRIMARY KEY (`cont_ID`),
  UNIQUE KEY `cont_url_UNIQUE` (`cont_url`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contests`
--

LOCK TABLES `contests` WRITE;
/*!40000 ALTER TABLE `contests` DISABLE KEYS */;
INSERT INTO `contests` VALUES (4,'测试比赛','方','2014-05-06 05:05:00','2014-05-05 05:05:00','test','a:1:{i:0;s:1:\"0\";}',0,0,'2014-05-28 18:20:03',1),(5,'手机','ff','2014-05-06 05:05:00','2014-05-31 05:05:00','phone','a:1:{i:0;s:1:\"0\";}',0,0,'2014-05-29 17:44:00',1),(6,'手机','ff','2014-05-06 05:05:00','2014-05-31 05:05:00','phoneddd','a:1:{i:0;s:1:\"0\";}',0,0,'2014-05-29 17:44:25',1),(7,'手机','ff','2014-05-06 05:05:00','2014-05-31 05:05:00','sss','a:1:{i:0;s:1:\"0\";}',0,0,'2014-05-29 17:48:23',1),(8,'手机','ff','2014-05-06 05:05:00','2014-05-31 05:05:00','sss12','a:1:{i:0;s:1:\"0\";}',0,0,'2014-05-29 17:49:32',1),(9,'手机','ff','2014-05-06 05:05:00','2014-05-31 05:05:00','sss123','a:1:{i:0;s:1:\"0\";}',0,0,'2014-05-29 17:50:52',1),(10,'手机','44','2014-05-31 04:04:00','2014-06-14 04:04:00','444','a:1:{i:0;s:1:\"0\";}',0,0,'2014-05-29 17:52:32',1),(11,'随便','绥滨','2014-06-10 04:04:00','2014-06-11 04:04:00','suibian','a:1:{i:0;s:1:\"0\";}',0,0,'2014-06-03 10:41:32',1);
/*!40000 ALTER TABLE `contests` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-06-03 23:25:00
