<?php
//本文件配置本项目环境变量
$dbServerArray = array(
        'Default' => array(
                'write' => 'mysql:host=localhost;port=3306;dbname=member|root|',
                'reads' => array(
                    'mysql:host=localhost;port=3306;dbname=member|root|',
                    'mysql:host=localhost;port=3306;dbname=member|root|',
                )
        )
);

