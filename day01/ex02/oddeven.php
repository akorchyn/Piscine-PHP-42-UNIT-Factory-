#!/usr/bin/php
<?php
    function    get_answer($line)
    {
        $num = intval($line);
        if (ord(line[0]) == 4)
            exit();
        else if (is_numeric($line))
        {
            if ($num % 2 == 1)
                print "The number " . $num . " is odd\n";
            else if ($num % 2 == 0)
                print "The number " . $num . " is even\n";
        }
        else
        {
            print "'" . $line . "' is not a number\n";
        }
    }

    $handle = fopen("php://stdin", "r");
    while ($handle)
    {
        print "Enter a number: ";
        $line = stream_get_line($handle, 3600, "\n");
        if (feof($handle))
        {
            print "^D\n";
            exit();
        }
        get_answer($line);
    }
?>