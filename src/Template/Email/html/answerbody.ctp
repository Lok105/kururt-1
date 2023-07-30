<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>

<tr>
    <td style="font-weight: 100;"><?php echo $content['body']; ?></td>
</tr>
<tr>
    <td style="font-weight: 100;padding-top: 30px;">Спасибо за ваше обращение!</td>
</tr>
<tr>
    <td style="font-weight: 100;">С уважением, администрация сайта <?php echo $content['company']; ?></td>
</tr>
<tr>
    <td style="padding-top: 30px;font-size: 14px;">Ваш запрос:</td>
</tr>
<tr>
    <td style="font-weight: 100;"><?php echo $content['body_old']; ?></td>
</tr>
<tr>
    <td style="padding-top: 20px;"><a style="color: #2969b0;font-size: 16px;font-weight: 100;" href = "http://<?php echo $_SERVER['HTTP_HOST']; ?>">Перейти на сайт</a></td>
</tr>
