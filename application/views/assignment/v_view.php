<?php

/* GPL
 * GPL To change this license header, choose License Headers in Project Properties.
 * GPL To change this template file, choose Tools | Templates
 * GPL and open the template in the editor.
 */
/*
 * name        : Salman Farisi<salmandriva@gmail.com>
 * skype       : salmandriva
 * YM          : s4lm4ndrake
 * G+          : plus.google.com/salmandriva
 * blog/web    : http://ketikan10jari.wordpress.com
 * facebook    : facebook.com/salmandriva
 */
?>
<dl>
    <dd>Assigned To</dd>
    <dt><?php echo "{$list->firstname} {$list->lastname}"; ?></dt>
    <dd>Assigned</dd>
    <dt><?php echo date('d-m-Y', strtotime($list->assignment_date)); ?></dt>
    <dd>name</dd>
    <dt><?php echo $list->name; ?></dt>
    <dd>Code</dd>
    <dt><?php echo $list->code; ?></dt>
    <dd>Sn</dd>
    <dt><?php echo $list->sn; ?></dt>    
</dl>