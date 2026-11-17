<?php

function canAccessSG() {
    $role = session()->get('role');
    return in_array($role, ['Super Admin', 'Gudang']);
}

function canAccessS() {
    $role = session()->get('role');
    return in_array($role, ['Super Admin']);
}