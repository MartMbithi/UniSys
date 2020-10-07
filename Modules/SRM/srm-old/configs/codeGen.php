<?php

//---------Password Reset Token generator -------------------------------------------//
    $length = 30;
    $tk = substr(str_shuffle("QWERTYUIOPLKJHGFDSAZXCVBNM1234567890"),1,$length);
    
//------------Dummy Password Generator----------------------------------------------//
    $length = 8;
    $rc= substr(str_shuffle("QWERTYUIOPLKJHGFDSAZXCVBNM1234567890"),1,$length);

// -------staff ID--------------------------------------------------------------------//
    $length = 12;
    $facultyID = bin2hex(random_bytes($length));

// -------Payroll ID--------------------------------------------------------------------//
    $length = 15;
    $payroll_id = bin2hex(random_bytes($length));

    $length = 1590;
    $assign_id = bin2hex(random_bytes($length));

// -------Member ID--------------------------------------------------------------------//
    $length = 15;
    $kb_id = bin2hex(random_bytes($length));

// ---Codes----------------------------------------------------------------//
    $alpha = 5;
    $beta = 5;
    $a = substr(str_shuffle("QWERTYUIOPLKJHGFDSAZXCVBNM"),1,$alpha);
    $b = substr(str_shuffle("1234567890"),1,$beta);

    $alpha = 10;
    $paycode = substr(str_shuffle("QWERTYUIOPLKJHGFDSAZXCVBNM1234567890"),1,$alpha);
