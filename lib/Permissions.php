<?php

namespace Trotch;

class Permissions
{
    /**
     * 0 --- no permission
     * 1 --x execute
     * 2 -w- write
     * 3 -wx write and execute
     * 4 r-- read
     * 5 r-x read and execute
     * 6 rw- read and write
     * 7 rwx read, write and execute
     *
     * @param int $chmod
     * @param string $group 'owner', 'group', 'other'
     * @param string $triplet 'r', 'w', 'x'
     * @return bool
     */
    function hasOctalAccess($chmod, $group, $triplet)
    {
        $group = strtolower($group);
        if ($group == 'owner') {
            $pos = 0;
        } elseif ($group == 'group') {
            $pos = 1;
        } elseif ($group == 'other') {
            $pos = 2;
        } else {
            return false;
        }

        if ($chmod == null || $chmod == -1) {
            // The chmod value was not explicitly set?
            return false;
        }

        $bit = $chmod{$pos};

        if ($triplet == 'r' && ($bit == 4 || $bit == 5 || $bit == 6 || $bit == 7)) {
            return true;
        } elseif ($triplet == 'w' && ($bit == 2 || $bit == 3 || $bit == 6 || $bit == 7)) {
            return true;
        } elseif ($triplet == 'x' && ($bit == 1 || $bit == 3 || $bit == 5 || $bit == 7)) {
            return true;
        } else {
            return false;
        }
    }


}