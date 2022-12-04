CREATE TABLE `sevenseas_sale_price` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `seq_no` int NOT NULL DEFAULT 0 COMMENT '批次',
  `level` varchar(10) NOT NULL DEFAULT '' COMMENT '等级',
  `no` varchar(255) NOT NULL DEFAULT '' COMMENT '编号',
  `coordinate` varchar(255) NOT NULL DEFAULT '' COMMENT '坐标',
  `distance` int NOT NULL DEFAULT 0 COMMENT '距离',
  `price` bigint unsigned NOT NULL DEFAULT 0 COMMENT '价格',
  `price_time` datetime NOT NULL DEFAULT '1000-01-01 00:00:00' COMMENT '出价时间',
  `link` varchar(500) NOT NULL DEFAULT '' COMMENT '详情链接',
  `owner` varchar(255) NOT NULL DEFAULT '' COMMENT '拥有者',
  `owner_link` varchar(500) NOT NULL DEFAULT '' COMMENT '拥有者链接',
  `level_img` varchar(500) NOT NULL DEFAULT '' COMMENT '等级图片',
  `created_at` int NOT NULL DEFAULT 0 COMMENT '创建时间',
  `updated_at` int NOT NULL DEFAULT 0 COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB COMMENT='7Seas成交价表';
