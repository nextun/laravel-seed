/*
Navicat PGSQL Data Transfer

Source Server         : LOCAL
Source Server Version : 90517
Source Host           : localhost:5432
Source Database       : dressfactory
Source Schema         : public

Target Server Type    : PGSQL
Target Server Version : 90517
File Encoding         : 65001

Date: 2019-06-21 11:04:37
*/


-- ----------------------------
-- Sequence structure for customer_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."customer_id_seq";
CREATE SEQUENCE "public"."customer_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 2
 CACHE 1;
SELECT setval('"public"."customer_id_seq"', 2, true);

-- ----------------------------
-- Sequence structure for order_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."order_id_seq";
CREATE SEQUENCE "public"."order_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 2
 CACHE 1;
SELECT setval('"public"."order_id_seq"', 2, true);

-- ----------------------------
-- Sequence structure for order_item_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."order_item_id_seq";
CREATE SEQUENCE "public"."order_item_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 3
 CACHE 1;
SELECT setval('"public"."order_item_id_seq"', 3, true);

-- ----------------------------
-- Sequence structure for product_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."product_id_seq";
CREATE SEQUENCE "public"."product_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 9
 CACHE 1;
SELECT setval('"public"."product_id_seq"', 9, true);

-- ----------------------------
-- Table structure for customer
-- ----------------------------
DROP TABLE IF EXISTS "public"."customer";
CREATE TABLE "public"."customer" (
"id" int4 DEFAULT nextval('customer_id_seq'::regclass) NOT NULL,
"name" varchar COLLATE "default",
"address" varchar(255) COLLATE "default",
"phone" varchar(15) COLLATE "default"
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of customer
-- ----------------------------
INSERT INTO "public"."customer" VALUES ('1', 'James Bond', 'Galle', '0114788854');
INSERT INTO "public"."customer" VALUES ('2', 'Selena Gomez', 'Kandy', '0778455512');

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS "public"."order";
CREATE TABLE "public"."order" (
"id" int4 DEFAULT nextval('order_id_seq'::regclass) NOT NULL,
"date" date NOT NULL,
"customer_id" int4 NOT NULL,
"status" bool DEFAULT true NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of order
-- ----------------------------
INSERT INTO "public"."order" VALUES ('1', '2019-06-16', '1', 't');
INSERT INTO "public"."order" VALUES ('2', '2019-06-16', '2', 't');

-- ----------------------------
-- Table structure for order_item
-- ----------------------------
DROP TABLE IF EXISTS "public"."order_item";
CREATE TABLE "public"."order_item" (
"id" int4 DEFAULT nextval('order_item_id_seq'::regclass) NOT NULL,
"product_id" int4 NOT NULL,
"qty" int4 DEFAULT 1 NOT NULL,
"order_id" int4 NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of order_item
-- ----------------------------
INSERT INTO "public"."order_item" VALUES ('1', '1', '5', '1');
INSERT INTO "public"."order_item" VALUES ('2', '2', '1', '1');
INSERT INTO "public"."order_item" VALUES ('3', '2', '2', '2');

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS "public"."product";
CREATE TABLE "public"."product" (
"id" int4 DEFAULT nextval('product_id_seq'::regclass) NOT NULL,
"name" varchar(100) COLLATE "default" NOT NULL,
"code" varchar(50) COLLATE "default" NOT NULL,
"price" varchar(20) COLLATE "default" NOT NULL,
"status" bool DEFAULT true
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO "public"."product" VALUES ('1', 'Ladies Hand Bag', 'ITM001', '2000', 't');
INSERT INTO "public"."product" VALUES ('2', 'Ladies T-Shirt', 'ITM002', '1500', 't');
INSERT INTO "public"."product" VALUES ('5', 'Hair Clip', 'ITM003', '200.50', 't');
INSERT INTO "public"."product" VALUES ('7', 'Gents Shirt', 'ITM005', '1250', 't');
INSERT INTO "public"."product" VALUES ('8', 'Hat', 'ITM006', '250', 't');
INSERT INTO "public"."product" VALUES ('9', 'Hair Band', 'ITM009', '23', 't');

-- ----------------------------
-- Alter Sequences Owned By 
-- ----------------------------
ALTER SEQUENCE "public"."customer_id_seq" OWNED BY "customer"."id";
ALTER SEQUENCE "public"."order_id_seq" OWNED BY "order"."id";
ALTER SEQUENCE "public"."order_item_id_seq" OWNED BY "order_item"."id";
ALTER SEQUENCE "public"."product_id_seq" OWNED BY "product"."id";

-- ----------------------------
-- Primary Key structure for table customer
-- ----------------------------
ALTER TABLE "public"."customer" ADD PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table order
-- ----------------------------
ALTER TABLE "public"."order" ADD PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table order_item
-- ----------------------------
ALTER TABLE "public"."order_item" ADD PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table product
-- ----------------------------
ALTER TABLE "public"."product" ADD PRIMARY KEY ("id");
