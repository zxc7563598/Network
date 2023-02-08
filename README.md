# Network

这是个 php 通用的网络请求模块，适用于任何框架

做这个的起因是因为项目中经常会对接各种各样奇怪的小三方，而他们的请求方式千奇百怪。

为每一个三方去封装网络请求会让代码变得杂乱，而为整个项目进行封装看似是个好办法，但每次创建新项目时又都要进行封装。

索性直接封装到 composer 中

目前姑且仅进行了 Curl 请求的封装，后续有时间会考虑继续进行扩展

## 安装方法

` composer require suqingan/network `

## 使用方式

```
<?php

use Suqingan\Network;
···
···

class xxx
{
    public function xxxx()
    {
        Network\请求方式::请求方法
    }
}
```

## 当前支持的请求方式

| 方式 | 说明               |
| :--- | :----------------- |
| Curl | 通过 cURL 进行请求 |

## 当前支持的请求方法

| 方法 | 说明        |
| :--- | :---------- |
| Get  | get 请求    |
| Post | post 请求   |
| Del  | delete 请求 |
| Put  | put 请求    |

> 通过 curl 进行 post 请求即为：Network\Curl::Post();

---