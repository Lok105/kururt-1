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
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
    <title><?php echo $content['company']; ?></title>
</head>
<body>
    <div style="text-align: left;width: 300px;"><span style="color: #4b4b4b;font-size: 22px;font-weight: 600;margin: 0 0 0 5px;"><?php echo $content['company']; ?></span></div>

    <div style="font-size: 16px;font-weight: 600;color: #28324e;font-family: Verdana,Arial;padding-bottom: 10px;margin-top: 5px;"><?php echo $content['theme']; ?></div>
   
    <table style="border: 1px solid #a38f84;padding: 15px;font-size: 15px;font-family: Verdana,Arial;font-weight: bold;color: #333;">
    <?= $this->fetch('content') ?>
    </table>
</body>
</html>